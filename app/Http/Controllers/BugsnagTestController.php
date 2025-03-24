<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class BugsnagTestController extends Controller
{
    public function test()
	{
		Bugsnag::notifyException(new RuntimeException("Test error"));
		$error = new RuntimeException("Test Error");
		return $error;	
	}
}
