<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Asset;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $error = ['error' => 'No results found, please try with different keywords.'];
        if ($request->has('q')) {
            $assets = Asset::search($request->get('q'))->get();
            return $assets->count() ? $assets : $error;
        }
        return $error;
    }
}