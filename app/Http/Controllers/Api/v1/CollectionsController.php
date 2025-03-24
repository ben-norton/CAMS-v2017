<?php

namespace App\Http\Controllers\Api\v1;
use DB;
use App\CollectionLink;
use App\Collection;
use App\CollectionStat;
use App\Transformers\CollectionTransformer;
use App\Transformers\CollectionLinksTransformer;
use App\Transformers\CollectionStatsTransformer;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CollectionsController extends Controller
{
    public function index() {

        try {
            $statusCode = 200;
            $collections = Collection::all();
            $data = [];
            foreach($collections as $collection) {
                $meta = [
                    'id' => $collection->id,
                    'formalName' => $collection->collection_name,
                    'shortName' => $collection->collection_shortname,
                    'slug' => $collection->collection_slug,
                    "collectionManager" => [
                        "firstName" => $collection->collection_manager_fname,
                        "lastName" => $collection->collection_manager_lname,
                        "email" => $collection->collection_manager_email,
                        "phone" => $collection->collection_manager_phone,
                    ],
                    "curator" => [
                        'firstName' => $collection->curator_fname,
                        'lastName' => $collection->curator_lname,
                        'email' => $collection->curator_email,
                        'phone' => $collection->curator_phone,
                    ]
                ];
                // Collection Links
                $links = [];
                    foreach ($collection->links as $link) {
                        $links[] = [
                            'link_name' => $link->parameterKey->display_name,
                            'url' => $link->url,
                            'link_remarks' => $link->remarks,
                            'collection' => $link->collection->collection_name,
                            'collection_id' => $link->collection_id
                        ];
                    }
                $stats = [];
                foreach ($collection->stats as $stat) {
                    $stats[] = [
                        'stat_name' => $stat->parameterKey->display_name,
                        'variable' => $stat->parameterKey->variable,
                        'parameter_id' => $stat->parameter_id,
                        'stat_string' => $stat->value_str,
                        'stat_decimal' => $stat->value_dec,
                        'stat_integer' => $stat->value_int,
                        'frequency' => $stat->frequency,
                        'day' => $stat->stat_day,
                        'month' => $stat->stat_month,
                        'year' => $stat->stat_year,
                        'created_at' => $stat->created_at,
                        'created' => $stat->created_at->format('m/d/Y'),
                        'remarks' => $stat->remarks,
                        'source' => $stat->source,
                    ];
                }
                $data[] = [
                    'metadata' => $meta,
                    'links' => $links,
                    'stats' => $stats
                ];

            }
            $response = [
                "data" => $data
            ];
        }
        catch (Exception $e) {
            $statusCode = 400;
        }
        finally {
            return Response::json($response, $statusCode);
        }
    }



    public function getCollection($id) {
        try {
            $statusCode = 200;
            $response = [
                'collection'  => []
            ];

            $collection = Collection::with(['links', 'stats'])->find($id);
            $response = fractal($collection, new CollectionTransformer);

        }
        catch (Exception $e) {
            $statusCode = 400;
        }
        finally {
            return Response::json($response, $statusCode);
        }
    }

    public function getCollectionLinks($id) {
        try {
            $statusCode = 200;
            $response = [
                'collection'  => []
            ];
            $collection = Collection::find($id);
            $links = $collection->links;
            $response = fractal($links, new CollectionLinksTransformer);
        }
        catch (Exception $e) {
            $statusCode = 400;
        }
        finally {
            return Response::json($response, $statusCode);
        }
    }

	public function getCollectionStats($id) {
        try {
            $statusCode = 200;
            $response = [
                'collection'  => []
            ];

//            $links = CollectionLink::where('collection_id','=',$collectionId)->all();
            $collection = Collection::find($id);
            $stats = $collection->stats;
            $response = fractal($stats, new CollectionStatsTransformer);
        }
        catch (Exception $e) {
            $statusCode = 400;
        }
        finally {
            return Response::json($response, $statusCode);
        }
    }
    /**
    ** Get Specific Collection Stat based on Collection ID (id) and Parameter ID (stat)
    */
    public function getCollectionStat($id, $parameter) {
        try {
            $statusCode = 200;
            $response = [
                'collection'  => []
            ];

            $collection = Collection::find($id);
            $stats = $collection->stats->where('parameter_id','=',$parameter);
            $response = fractal($stats, new CollectionStatsTransformer);
        }
        catch (Exception $e) {
            $statusCode = 400;
        }
        finally {
            return Response::json($response, $statusCode);
        }
    }

    public function searchCollections($term) {
        try {
            $statusCode = 200;
            $response = [
                'collections'  => []
            ];
            $collections = Collection::where('collection_name', 'like', '%'.$term.'%')->get();
            $response = fractal($collections, new CollectionTransformer);
        }
        catch (Exception $e) {
            $statusCode = 400;
        }
        finally {
            return Response::json($response, $statusCode);
        }
    }
    public function getCollectionsWithAssets() {
        try {
            $statusCode = 200;
            $response = [
                'collection'  => []
            ];

			$collections = Collection::whereIn('id', function($query) {
				$query->select('collection_keys.collection_id')
	              ->from('collection_keys')
	              ->whereRaw('collection_keys.collection_id = collections.id');
				})
			->get();
            $response = fractal($collections, new CollectionTransformer);
        }
        catch (Exception $e) {
            $statusCode = 400;
        }
        finally {
            return Response::json($response, $statusCode);
        }
    }
}
