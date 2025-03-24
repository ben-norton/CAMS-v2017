<?php

namespace App\Http\Controllers;

use App\Asset;

use Illuminate\Http\Request;

class AssetMetadataController extends Controller
{
    public function add(Request $request)
    {
        $post = $request->all();
        $assetId = $post['asset_id'];
        $asset = Asset::find($assetId);
        $asset->addMeta($post['metakey'], $post['metavalue']);

        return redirect()->action('DigitalAssetsController@show', ['id' => $assetId]);
    }

    public function destroy($id, $key)
    {
        $asset = Asset::find($id);
        $asset->deleteMeta($key);
        return redirect()->action('DigitalAssetsController@show', ['id' => $asset->id]);
    }
}
