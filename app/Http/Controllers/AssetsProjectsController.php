<?php

namespace App\Http\Controllers;
use Response;
use App\AssetProject;
use Illuminate\Http\Request;
use DB;
class AssetsProjectsController extends Controller
{
    public function add(Request $request)
    {
        $post = $request->all();
        $aid = $post['asset_id'];
        $pid = $post['project_id'];

        $model = new AssetProject;
        $model->asset_id = $aid;
        $model->project_id = $pid;
        $model->remarks = $post['remarks'];
        $model->created_at = \Carbon\Carbon::now();
        $model->updated_at = \Carbon\Carbon::now();
        $model->save();

        return redirect()->action('DigitalAssetsController@show', ['id' => $aid]);
    }
    public function destroy(Request $request, $projectId, $assetId)
    {
        $post = $request->all();
        $aid = $post['asset_id'];
        $pid = $post['project_id'];

        DB::table('assets_projects')
            ->where('project_id','=',$pid)
            ->where('asset_id','=',$aid)
            ->delete();
        return redirect()->action('DigitalAssetsController@show', ['id' => $aid]);
    }
}
