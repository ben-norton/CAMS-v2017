<?php

namespace App\Http\Controllers\Api\v1;
use DB;
use Response;
use App\Asset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
class GalleriesController extends Controller
{
    /**
     * Get All Project Images
     * @param $project
     * @return mixed
     */
    public function getProjectImages($project)
    {
        $assets = Asset::getProjectImages($project)->paginate(24);
        $response = [
            'pagination' => [
                'total' => $assets->total(),
                'per_page' => $assets->perPage(),
                'current_page' => $assets->currentPage(),
                'last_page' => $assets->lastPage(),
                'from' => $assets->firstItem(),
                'to' => $assets->lastItem()
            ],
            'data' => $assets
        ];
        return response()->json($response);
    }
    /**
     * Get All Private Project Images
     * @param $project
     * @return mixed
     */
    public function getPrivateProjectImages($project)
    {
        $assets = Asset::getPrivateProjectImages($project)->paginate(24);
        $response = [
            'pagination' => [
                'total' => $assets->total(),
                'per_page' => $assets->perPage(),
                'current_page' => $assets->currentPage(),
                'last_page' => $assets->lastPage(),
                'from' => $assets->firstItem(),
                'to' => $assets->lastItem()
            ],
            'data' => $assets
        ];
        return response()->json($response);
    }
    /**
     * Get All Project Images
     * @param $collectionId
     * @param $keyType
     * @param $keyValue
     * @return mixed
     */
    public function getCollectionImages($collectionId)
    {
    	if($collectionId) {
            $assets = Asset::getCollectionImages($collectionId)->distinct('asset_id')->paginate(24);
            $response = [
                'pagination' => [
                    'total' => $assets->total(),
                    'per_page' => $assets->perPage(),
                    'current_page' => $assets->currentPage(),
                    'last_page' => $assets->lastPage(),
                    'from' => $assets->firstItem(),
                    'to' => $assets->lastItem()
                ],
                'data' => $assets
            ];
        }
        else {
            $response = ['Collection ID is required'];
        }


        return response()->json($response);
    }

    public function getAssetTypeImages($assetTypeId)
    {
        $assets = Asset::getAssetTypeImages($assetTypeId)->distinct('asset_id')->paginate(48);
        $response = [
            'pagination' => [
                'total' => $assets->total(),
                'per_page' => $assets->perPage(),
                'current_page' => $assets->currentPage(),
                'last_page' => $assets->lastPage(),
                'from' => $assets->firstItem(),
                'to' => $assets->lastItem()
            ],
            'data' => $assets
        ];
        return response()->json($response);
    }


}
