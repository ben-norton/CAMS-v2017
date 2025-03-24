<?php

namespace App\Http\Controllers;
use App\Project;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
	**/
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home()
    {
        $laravel = app();
        $environ = $laravel->environment();
        $version = $laravel->version();
        $projects = Project::all();
        return view('home', compact('projects','laravel','environ','version'));
    }
    public function dashboard()
    {
//        if ( Auth::user()->hasRole('administrator') )
//        {
            $user = Auth::user();
            $laravel = app();
            $environ = $laravel->environment();
            $version = $laravel->version();
            return view('dashboard', compact('laravel','environ', 'version'));
//        }
//        else if ( Auth::user()->hasRole('staff') )
//        {
//            return view('dashboard');
//        }
//        else {
//            return redirect()->action('PagesController@home');
//        }
    }
    public function getApi()
    {
        return view('api.show');
    }
    public function unauthorized()
    {
        return view('unauthorized');
    }    
   
}

