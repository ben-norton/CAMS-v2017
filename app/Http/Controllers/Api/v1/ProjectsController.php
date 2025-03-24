<?php

namespace App\Http\Controllers\Api\v1;
use Response;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
    public function getProjects()
    {
        try {
            $statusCode = 200;
            $projects = Project::all();
        }
        catch (Exception $e) {
            $statusCode = 400;
        }
        finally {
            return Response::json($projects, $statusCode);
        }
    }
    public function getProjectsAssets()
    {
        try {
            $statusCode = 200;
            $projects = Project::with('assets')->get();
        }
        catch (Exception $e) {
            $statusCode = 400;
        }
        finally {
            return Response::json($projects, $statusCode);
        }
    }
}
