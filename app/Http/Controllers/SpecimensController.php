<?php

namespace App\Http\Controllers;
use Response;
use App\Specimen;
use Illuminate\Http\Request;

class SpecimensController extends Controller
{
    public function add(Request $request)
    {
        $post = $request->all();
        $assetId = $post['asset_id'];

        $specimen = new Specimen;
        $specimen->asset_id = $assetId;
        $specimen->collection_id = $post['collection_id'];
        $specimen->identifier_id = $post['identifier_id'];
        $specimen->identifier_value = $post['identifier_value'];
        $specimen->remarks = $post['remarks'];
        $specimen->created_at = \Carbon\Carbon::now();
        $specimen->updated_at = \Carbon\Carbon::now();
        $specimen->save();

        return redirect()->action('DigitalAssetsController@show', ['id' => $assetId]);
    }
    public function destroy(Request $request, $id)
    {
        $specimen = Specimen::find($id);
        $assetId = $specimen->asset_id;
        $specimen->delete($request->all());
        return redirect()->action('DigitalAssetsController@show', ['id' => $assetId]);
    }
}
