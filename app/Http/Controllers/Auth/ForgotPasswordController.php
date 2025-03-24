<?php

namespace App\Http\Controllers\Auth;
use App\AssetType;
use App\Project;
use App\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');
        $projects = Project::hasGallery();
        $collections = Collection::hasGallery();
        $assetTypes = AssetType::hasGallery();
        return view('auth.passwords.reset', compact('projects','collections','assetTypes'))
            ->with(
                ['token' => $token, 'email' => $request->email]
            );
    }
    
  }