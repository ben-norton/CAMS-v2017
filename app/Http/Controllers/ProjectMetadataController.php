<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectMetadataController extends Controller
{
    public function add(Request $request)
    {
        $post = $request->all();
        $projectId = $post['project_id'];
        $project = Project::find($projectId);
        $project->addMeta($post['metakey'], $post['metavalue']);

        return redirect()->action('ProjectsController@show', ['id' => $projectId]);
    }

    public function destroy($id, $key)
    {
        $project = Project::find($id);
        $project->deleteMeta($key);
        return redirect()->action('ProjectsController@show', ['id' => $project->id]);
    }
}
