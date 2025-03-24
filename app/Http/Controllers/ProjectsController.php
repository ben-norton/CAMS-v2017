<?php

namespace App\Http\Controllers;
use App\Project;
use Session;
use App\Http\Requests\ProjectsFormRequest;
use Illuminate\Http\Request;
use DB;
use App\MetadataKeys;
class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.datatable');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectsFormRequest $request)
    {
        Project::create($request->all());
        Session::flash('flash_message', 'Project added!');
        return redirect()->action('ProjectsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $meta = DB::table('projects_meta')
            ->join('metadata_keys','projects_meta.metakey_id','=','metadata_keys.id')
            ->where('projects_meta.metable_id','=',$id)
            ->get();
        $metakeys = MetadataKeys::getKeysByModel('App\Project');
        return view('projects.show',compact('project','meta','metakeys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $project = Project::whereId($id)->firstOrFail();
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectsFormRequest $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->update($request->all());
        Session::flash('flash_message', 'Project updated!');
        return redirect()->action('ProjectsController@show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::destroy($id);
        Session::flash('flash_message', 'Project deleted!');
        return redirect()->action('ProjectsController@index');
    }
}
