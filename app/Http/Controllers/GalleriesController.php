<?php

namespace App\Http\Controllers;
use App\Asset;
use App\Collection;
use DB;
use App\Project;
use Response;
use Illuminate\Http\Request;
class GalleriesController extends Controller
{
    public function selectCollection()
    {
        $collections = Collection::all();
        return view('galleries.collection-select', compact('collections'));
    }
    public function selectProject()
    {
//        $projects = Project::with('assets')->get();
        $projects = Project::all();
        $projects = $projects->filter(function ($project) {
            return $project->assets->count() > 0;
        });

        $assets = [];

        foreach($projects as $project) {
            if($project->assets->count() > 0) {
                $assets[] = Asset::getRandomProjectImage($project->id);
            }
        }

        return view('galleries.project-select', compact('projects','assets'));
    }
    public function collectionGallery($id)
    {
        $galleryType = "Collection";
        $collection = Collection::find($id);
        return view('galleries.vue-gallery', compact('galleryType', 'collection','id'));
    }
    public function projectGallery($id)
    {
        $galleryType = 'Project';
        $project = Project::find($id);
        return view('galleries.vue-gallery', compact('galleryType', 'project','id'));
    }
	public function projects()
    {
    	$projects = Project::all();
    	$projects = $projects->filter(function ($project) {
            return $project->assets->count() > 0;
        });

		foreach($projects as $project) {
			foreach($project->assets as $as) {
			}
		}
        return view('galleries.project-select', compact('projects'));
    }


}
