<?php

namespace App\Http\Controllers\Api\v1;

use App\AssetType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssetTypesDataController extends Controller
{
    public function getAssetTypes()
    {
        $response = [];
        $assetTypes = AssetType::all();
        $response = [
            'data' => $assetTypes
        ];
        return response()->json($response);
    }
}
