<?php

namespace App\Http\Controllers;

use App\CollectionLink;
use Illuminate\Http\Request;

class CollectionLinksController extends Controller
{
    public function add(Request $request)
    {
        $post = $request->all();
        $collectionId = $post['collection_id'];

        $link = new CollectionLink(array(
            'collection_id' => $collectionId,
            'parameter_id' => $post['parameter_id'],
            'url' => $post['url'],
            'remarks' => $post['remarks'],
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ));
        $link->save();
        return redirect()->action('CollectionsController@show', ['id' => $collectionId]);
    }
    public function destroy(Request $request, $id)
    {
        $link = CollectionLink::find($id);
        $collectionId = $link->collection_id;
        $link->delete($request->all());
        return redirect()->action('CollectionsController@show', ['id' => $collectionId]);
    }
}
