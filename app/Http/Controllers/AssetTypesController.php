<?php

namespace App\Http\Controllers;

use App\AssetType;
use App\Http\Requests\AssetTypeFormRequest;
use App\MediaType;
use App\ParameterKey;
use Illuminate\Http\Request;
use Session;
class AssetTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asset-types.datatable');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parameterKeys = ParameterKey::getParametersByType('media')->sortBy('display_name')->pluck('display_name','id');
        return view('asset-types.create', compact('parameterKeys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssetTypeFormRequest $request)
    {
        AssetType::create($request->all());
        Session::flash('flash_message', 'Asset Type added!');
        return redirect()->action('AssetTypesController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assetType = AssetType::find($id);
        return view('asset-types.show', compact('assetType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assetType = AssetType::whereId($id)->firstOrFail();
        $parameterKeys = ParameterKey::getParametersByType('media')->pluck('display_name', 'id');
        return view('asset-types.edit', compact('assetType','parameterKeys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AssetTypeFormRequest $request, $id)
    {
        $assetType = AssetType::findOrFail($id);
        $assetType->update($request->all());
        Session::flash('flash_message', 'Asset Type updated!');
        return redirect()->action('AssetTypesController@show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AssetType::destroy($id);
        Session::flash('flash_message', 'Asset Type deleted!');
        return redirect()->action('Asset Type Controller@index');
    }
}
