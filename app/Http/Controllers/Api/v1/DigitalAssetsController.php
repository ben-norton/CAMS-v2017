<?php

namespace App\Http\Controllers\Api\v1;

use App\CollectionKeyType;
use DB;
use App\Transformers\CollectionImageTransformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Response;
use Image;
use App\Asset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\ProjectAssetTransformer;
use App\Http\Requests\AssetApiRequest;

class DigitalAssetsController extends Controller
{
	public function asset(Request $request)
    {
    	if($request->has('assetId')) {
			$item = Asset::whereId($request->get('assetId'))->with('collectionKeys')->first(); 
			   	
		    $response = [
		        "status" => [
					"code" => 200,
					"message" => "Success"
				],
	    	    'data' => $item,
	    	    "metadata" => [
					"request" => [
						"request-uri" => $request->fullUrl(),
	            		"parameters" => $request->query()
	            	]
				]
	        ];
		} else {
			 $response = [
		        "status" => [
					"code" => 422,
					"message" => "assetId is a required query parameter"
				],
			];
		}
        return response()->json($response);
    }
    /**
     * Get Single Asset
     * @return mixed
     */
    public function getAsset(Request $request, $id)
    {
        $item = Asset::whereId($id)->with('collectionKeys')->first();
        $response = [
	        "status" => [
				"code" => 200,
				"message" => "Success"
			],
    	    'data' => $item,
    	    "metadata" => [
				"request" => [
					"request-uri" => $request->fullUrl(),
            		"parameters" => $request->query()
            	]
			]
        ];

        return response()->json($response);
    }

    public function getAssetResource(AssetApiRequest $request)
    {
        if($request->has('guid')) {
            $guid = $request->get('guid');
            $item = Asset::where('guid','=',$guid)->with('collectionKeys')->first();
        } else {
            $id = $request->get('id');
            $item = Asset::whereId($id)->with('collectionKeys')->first();
        }
        $response = [
            "status" => [
                "code" => 200,
                "message" => "Success"
            ],
            'data' => $item,
            "metadata" => [
                "request" => [
                    "request-uri" => $request->fullUrl(),
                    "parameters" => $request->query()
                ]
            ]
        ];

        return response()->json($response);
    }

/*
    /**
     * Get 25 Most Recently Updated Assets
     * @return mixed
     */
    public function getRecent() {
    	
        try {
            $statusCode = 200;
            $results = [];
            
            $assets = Asset::orderBy('id','desc')->take(25)->get();
            foreach ($assets as $a) {
				$results[] = [
		            'asset id' => $a->id,
                    'guid' => $a->guid,
		            'title' => $a->title,
		            'original_filename' => $a->original_filename,
		            'filename' => $a->s3filename,
		            'path' => $a->s3path,
		            'remarks' => $a->remarks,
		            'source' => $a->source,
		            'type' => $a->assetType->name,
            	];
            }
		    $response = [
		        'assets' => $results,
		    ];
        }
        catch (Exception $e) {
            $statusCode = 400;
        }
        finally {
            return Response::json($response, $statusCode);
        }
        
    }
    /**
     * Get All Collection Keys
     * @return mixed
     *
     */
    public function getCollectionKeyTypes()
    {
        try {
            $statusCode = 200;
            $response = [
                'key_types'  => []
            ];

            $keyTypes = CollectionKeyType::all();

            foreach($keyTypes as $keyType) {
                $response['key_types'][] = [
                    'id' => $keyType->id,
                    'display_name' => $keyType->display_name,
                    'variable' => $keyType->variable,
                ];
            }
        }
        catch (Exception $e) {
            $statusCode = 400;
        }
        finally {
            return Response::json($response, $statusCode);
        }
    }

    /**
     * Get All Images associated with a Collection Object
     * @param $collectionId
     * @param $keyType
     * @param $keyValue
     * @return mixed
     */
    public function getCollectionObjectImages($collectionId, $keyType, $keyValue)
    {
        try {
            $statusCode = 200;
            $response = [
                'images'  => []
            ];

            $assets = Asset::getObjectImages($collectionId,$keyType,$keyValue);
            foreach($assets as $asset) {
                $response['images'][] = [
                    'guid' => $asset->guid,
                    'title' => $asset->title,
                    'remarks' => $asset->remarks,
                    'source' => $asset->source,
                    'url_lg' => $asset->imgpath_lg,
                    'url_md' => $asset->imgpath_md,
                    'url_sm' => $asset->imgpath_thumb,
                    'type' => $asset->assetType->name,
                    'public_yn' => $asset->public_yn,
                    'key_type' => $asset->display_name,
                    'key_value' => $asset->key_value,
                    'collection_name' => $asset->collection_name,
                ];
            }
        }
        catch (Exception $e) {
            $statusCode = 400;
        }
        finally {
            return Response::json($response, $statusCode);
        }
    }

	/**
     * Get All Images associated with a Collection Object using LIKE
     * @param $collectionId
     * @param $keyType
     * @param $keyValue
     * @return mixed
     */
    public function searchCollectionObjectImages(Request $request)
    {
    	$collectionId = $request->get('collection_id');
    	$keyType = $request->get('key_type_id');
    	$keyValue = $request->get('key_value');

        $assets = Asset::getObjectImagesSearch($collectionId,$keyType,$keyValue);
		$response['input'][] = [
			'collection_id' => $collectionId,
			'key_type_id' => $keyType,
			'key_value' => $keyValue,
			];
        foreach($assets as $asset) {
            $response['images'][] = [
                'guid' => $asset->guid,
                'title' => $asset->title,
                'remarks' => $asset->remarks,
                'source' => $asset->source,
                'url_lg' => $asset->imgpath_lg,
                'url_md' => $asset->imgpath_md,
                'url_sm' => $asset->imgpath_thumb,
                'type' => $asset->assetType->name,
                'public_yn' => $asset->public_yn,
                'key_type' => $asset->display_name,
                'key_value' => $asset->key_value,
                'collection_name' => $asset->collection_name,
            ];
        }
        return Response::json($response);
    }
    /**
     * Get All Assets associated with a Collection Object
     * @param $collectionId
     * @param $keyType
     * @param $keyValue
     * @return mixed
     */
    public function getCollectionObjectAssets($collectionId, $keyType, $keyValue)
    {
        try {
            $statusCode = 200;
            $response = [
                'assets'  => []
            ];

            $assets = Asset::getObjectAssets($collectionId,$keyType,$keyValue);
            foreach($assets as $asset) {
                $response['assets'][] = [
                    'guid' => $asset->guid,
                    'title' => $asset->title,
                    'remarks' => $asset->remarks,
                    'source' => $asset->source,
                    'filename' => $asset->s3filename,
                    'path' => $asset->s3path,
                    'type' => $asset->assetType->name,
                    'public_yn' => $asset->public_yn,
                    'key_type' => $asset->display_name,
                    'key_value' => $asset->key_value,
                    'collection_name' => $asset->collection_name,
                ];
            }
        }
        catch (Exception $e) {
            $statusCode = 400;
        }
        finally {
            return Response::json($response, $statusCode);
        }
    }



/**
	* Get Specimens Images using Specimen Identifiers
	* @param $request->collectionId
	* @param $request->pcn	- Previous Catalog Number
	* @param $request->cn	- Catalog Number
	* @param $request->an	- Accession Number
	* @param $request->pan	- Previous Accession Number
	* @param $request->fn	- Field Number
	*/
    public function getSpecimenImages(Request $request)
    {
    	$count = count($_GET);
    	if($count > 0) {
    		$response = [];
	    	$variableArray = [];
	    	$collectionId = $request->get('collectionId');
	    	if($request->has('pcn')) {
	    		$pcnvalue = $request->get('pcn');
	    		$pcnkey = 3;
	    		$pcnArray = [$pcnkey => $pcnvalue];
	    		$variableArray[] = $pcnArray;
	    	}
	    	
	    	if($request->has('cn')) {
	    		$cnvalue = $request->get('cn');
	    		$cnkey = 1;
	    		$cnArray = [$cnkey => $cnvalue];
	    		$variableArray[] = $cnArray;
	    	}
	    	if($request->has('catalogNumber')) {
	    		$cnvalue = $request->get('catalogNumber');
	    		$cnkey = 1;
	    		$cnArray = [$cnkey => $cnvalue];
	    		$variableArray[] = $cnArray;
	    	}

	    	if($request->has('an')) {
	    		$value = $request->get('an');
	    	}
	    	if($request->has('accessionNumber')) {
	    		$value = $request->get('accessionNumber');
	    	}
	    	
	    	if($request->has('pan')) {
	    		$value = $request->get('pan');
	    	}
	    	if($request->has('prevAccessionNumber')) {
	    		$value = $request->get('prevAccessionNumber');
	    	}
	    	
	    	if($request->has('fn')) {
	    		$fnvalue = $request->get('fn');
	    		$fnkey = 2;
	    		$fnArray = [$fnkey => $fnvalue];
	    		$variableArray[] = $fnArray;
	    	}
	    	if($request->has('fieldNumber')) {
	    		$fnvalue = $request->get('fieldNumber');
	    		$fnkey = 2;
	    		$fnArray = [$fnkey => $fnvalue];
	    		$variableArray[] = $fnArray;
	    	}
			//dump($variableArray);

			$imageArray = [];
			foreach($variableArray as $key => $item) {
					$k = key($item);
				foreach($item as $v) {
					$imageArray[] = Asset::getSpecimenImages($collectionId,$k,$v);
					$response['input'][] = [
						'collection_id' => $collectionId,
						'key_type_id' => $k,
						'key_value' => $v,
					];
				}
			};
	        foreach($imageArray as $item) {
		        foreach($item as $asset) {
	            	$response['images'][] = [
                        'guid' => $asset->guid,
		                'title' => $asset->title,
		                'remarks' => $asset->remarks,
		                'source' => $asset->source,
		                'url_lg' => $asset->imgpath_lg,
		                'url_md' => $asset->imgpath_md,
		                'url_sm' => $asset->imgpath_thumb,
		                'type' => $asset->assetType->name,
		                'public_yn' => $asset->public_yn,
		                'key_type' => $asset->display_name,
		                'key_value' => $asset->key_value,
		                'collection_name' => $asset->collection_name,
	            	];
	        	}
	        }
	        return Response::json($response);
	    }
	    else {
	    	$msg = 'Please include a parameter in the request.';
	    	return $msg;
	    }
	}
}
