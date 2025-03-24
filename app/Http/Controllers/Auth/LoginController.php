<?php

namespace App\Http\Controllers\Auth;
use App\AssetType;
use App\Project;
use App\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }
    
        /**
    * Override default show registration form 
    */
    public function showLoginForm()
    {
//        $projects = Project::all();
//        $collections = Collection::all();
//        $assetTypes = AssetType::all();
        $projects = Project::hasGallery();
        $collections = Collection::hasGallery();
        $assetTypes = AssetType::hasGallery();
        return view('auth.login', compact('projects','collections','assetTypes'));
    }
}
