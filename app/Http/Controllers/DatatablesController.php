<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\LinkType;
use App\Project;
use Auth;
use DB;
use Illuminate\Http\Request;
use Html;
use Datatables;

class DatatablesController extends Controller
{
    /**
     * Collections Datatable
     */
    public function getCollectionsRecords()
    {
        return view('collections.datatable');
    }
    public function getCollectionsData()
    {
        $models = DB::table('collections')
            ->select(['collections.id',
                'collections.collection_name'
            ]);
        return Datatables::of($models)
            ->addColumn('action', function ($model) {
                return '<a class="btn btn-sm btn-primary" href="/collections/'.$model->id.'/show">View</a>';
            })
            ->make(true);
    }

   

    /**
     * Asset Types Datatable
     */
    public function getAssetTypesRecords()
    {
        return view('asset-types.datatable');
    }
    public function getAssetTypesData()
    {
        $models = DB::table('asset_types')
            ->join('parameter_keys','asset_types.parameter_id','=','parameter_keys.id')
            ->select(['asset_types.id', 'asset_types.name', 'parameter_keys.display_name']);
        return Datatables::of($models)
            ->addColumn('action', function ($model) {
                return '<a class="btn btn-sm btn-primary" href="/asset-types/'.$model->id.'/show">View</a>';
            })
            ->make(true);
    }

    /**
     * Parameter Keys Datatable
     */
    public function getParameterKeysRecords()
    {
        return view('parameter-keys.datatable');
    }
    public function getParameterKeysData()
    {
        $models = DB::table('parameter_keys')
            ->select(['id','display_name','variable','parameter_type','source_name','source_url','model']);
        return Datatables::of($models)
            ->addColumn('action', function ($model) {
                return '<a class="btn btn-sm btn-primary" href="/parameter-keys/'.$model->id.'/show">View</a>'.
                    view('utils.destroy',array('url' => '/parameter-keys', 'id' => $model->id))->render();
            })
            ->make(true);
    }


    /**
     * Projects Datatable
     */
    public function getProjectsRecords()
    {
        return view('projects.datatable');
    }
    public function getProjectsData()
    {
        $models = DB::table('projects')
            ->select(['projects.id',
                'project_name',
                'project_url',
                DB::raw("CONCAT(contact_fname, ' ', contact_lname) as project_contact"),
                'contact_fname',
                'contact_lname',
                'contact_email',
                'contact_phone']);
        return Datatables::of($models)
            ->addColumn('action', function ($model) {
                return '<a class="btn btn-sm btn-primary" href="/projects/'.$model->id.'/show">View</a>';
            })
            ->filterColumn('project_contact', function($query, $keyword) {
                $query->whereRaw("CONCAT(contact_fname, ' ', contact_lname) like ?", ["%{$keyword}%"]);
            })
            ->editColumn('contact_email', function ($model) {
                return \Html::mailto($model->contact_email, $model->contact_email);
            })
            ->make(true);
    }

    public function getProjectsDataAlt()
    {
        $projects = Project::select([
                'projects.id',
                'project_name',
                'project_url',
                DB::raw("CONCAT(contact_fname, ' ', contact_lname) as project_contact"),
                'contact_fname',
                'contact_lname',
                'contact_email',
                'contact_phone']);
        return Datatables::of($projects)->make(true);
    }



    /**
     * Assets Datatable
     */

    public function getAssetsData(Request $request)
    {
        $models = DB::table('assets')
            ->join('asset_types', 'assets.asset_type_id', '=', 'asset_types.id')
            ->join('users', 'assets.uploaded_by', '=', 'users.id')
            ->leftjoin('collection_keys','assets.id','=','collection_keys.asset_id')
            ->leftjoin('assets_projects','assets.id','=','assets_projects.asset_id')
            ->distinct()
            ->select(['assets.id',
                'assets.title',
                'asset_types.name',
                'assets.original_filename',
                'assets.s3filename',
                'assets.asset_type_id',
                'collection_keys.collection_id',
                'assets_projects.project_id',
                DB::raw("CONCAT(users.fname, ' ', users.lname) as user_name")]);
        return Datatables::of($models)
            ->filter(function ($instance) use ($request) {
                if (!empty($request->get('asset_type'))) {
                    $instance->where(function ($q) use ($request) {
                        $a = $request->get('asset_type');
                        $q->where('assets.asset_type_id', '=', $a);
                    });
                }
                if (!empty($request->get('collection'))) {
                    $instance->where(function ($q) use ($request) {
                        $c = $request->get('collection');
                        $q->where('collection_keys.collection_id', '=', $c);
                    });
                }
                if (!empty($request->get('project'))) {
                    $instance->where(function ($q) use ($request) {
                        $p = $request->get('project');
                        $q->where('assets_projects.project_id', '=', $p);
                    });
                }

            })
            ->addColumn('action', function ($model) {
                return '<a class="btn btn-md btn-primary" href="/assets/'.$model->id.'/show">View</a>';
            })
            ->filterColumn('user_name', function($query, $keyword) {
                $query->whereRaw("CONCAT(users.fname, ' ', users.lname) like ?", ["%{$keyword}%"]);
            })
            ->make(true);
    }


    /**
     * Collection Key Types
     */
    public function getCollectionKeyTypesData()
    {
        $models = DB::table('collection_key_types')
            ->leftjoin('collection_keys', 'collection_key_types.id','=','collection_keys.key_type_id')
            ->select([
                'collection_key_types.id',
                'display_name',
                'variable',
                'data_type',
                DB::raw("COUNT(collection_keys.key_type_id) as count")
            ])
            ->groupBy([
                    'collection_key_types.id',
                    'collection_key_types.display_name',
                    'collection_key_types.variable',
                    'collection_key_types.data_type'
                ]);
        return Datatables::of($models)
            ->addColumn('action', function ($model) {
                return '<a class="btn btn-sm btn-primary" href="/collection-key-types/'.$model->id.'/show">View</a>'.
                    view('utils.destroy',array('url' => '/collection-key-types', 'id' => $model->id))->render();
            })
            ->make(true);
    }
}
