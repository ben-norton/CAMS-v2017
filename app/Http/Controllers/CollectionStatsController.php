<?php

namespace App\Http\Controllers;

use App\CollectionStat;
use Illuminate\Http\Request;

class CollectionStatsController extends Controller
{
    public function add(Request $request)
    {
        $post = $request->all();
        $collectionId = $post['collection_id'];

        $stat = new CollectionStat;
        $stat->value_dec = $post['value_dec'];
        $stat->value_str = $post['value_str'];
		$stat->frequency = $post['frequency'];
		$stat->stat_day = $post['stat_day'];
		$stat->stat_month = $post['stat_month'];
		$stat->stat_year = $post['stat_year'];
		$stat->external_link = $post['external_link'];
        $stat->source = $post['source'];
        $stat->remarks = $post['remarks'];
        $stat->parameter_id = $post['parameter_id'];
        $stat->collection_id = $collectionId;
        $stat->created_at = \Carbon\Carbon::now();
        $stat->updated_at = \Carbon\Carbon::now();
        $stat->save();

        return redirect()->action('CollectionsController@show', ['id' => $collectionId]);
    }
    public function destroy(Request $request, $id)
    {
        $stat = CollectionStat::find($id);
        $collectionId = $stat->collection_id;
        $stat->delete($request->all());
        return redirect()->action('CollectionsController@show', ['id' => $collectionId]);
    }
}
