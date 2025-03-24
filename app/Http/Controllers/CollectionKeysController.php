<?php

namespace App\Http\Controllers;
use App\AssetCollection;
use App\Collection;
use App\CollectionKey;
use App\ParameterKey;
use App\StaticArray;
use Illuminate\Http\Request;

class CollectionKeysController extends Controller
{
    public function add(Request $request)
    {
        $post = $request->all();
        $assetId = $post['asset_id'];

        $collectionKey = new CollectionKey;
        $collectionKey->asset_id = $assetId;
        $collectionKey->collection_id = $post['collection_id'];
        $collectionKey->key_type_id = $post['key_type_id'];
        $collectionKey->key_value = $post['key_value'];
        $collectionKey->remarks = $post['remarks'];
        $collectionKey->created_at = \Carbon\Carbon::now();
        $collectionKey->updated_at = \Carbon\Carbon::now();
        $collectionKey->save();

        $collectionAsset = New AssetCollection;
        $collectionAsset->asset_id = $assetId;
        $collectionAsset->collection_id = $post['collection_id'];
        $collectionAsset->created_at = \Carbon\Carbon::now();
        $collectionAsset->updated_at = \Carbon\Carbon::now();
        $collectionKey->save();

        return redirect()->action('DigitalAssetsController@show', ['id' => $assetId]);
    }
//    public function destroy(Request $request, $id)
    public function destroyKeyRelations($id)
    {
        $collectionKey = CollectionKey::find($id);
        $assetId = $collectionKey->asset_id;
        $collectionKey->delete();
        return redirect()->action('DigitalAssetsController@show', ['id' => $assetId]);
    }
}
