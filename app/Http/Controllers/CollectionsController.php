<?php

namespace App\Http\Controllers;
use App\ParameterKey;
use App\Collection;
use App\LinkType;
use App\StatType;
use Illuminate\Http\Request;
use App\StaticArray;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CollectionsFormRequest;
class CollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('collections.datatable');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('collections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollectionsFormRequest $request)
    {
        Collection::create($request->all());
        Session::flash('flash_message', 'Collection added!');
        return redirect()->action('CollectionsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collection = Collection::find($id);
        $linkTypes = ParameterKey::getParametersByType('link')->sortBy('display_name')->pluck('display_name','id');
        $statTypes = ParameterKey::getParametersByType('statistic')->sortBy('display_name')->pluck('display_name','id');
        $frequencies = StaticArray::$frequencies;
        $statMonths = StaticArray::$statMonths;
        return view('collections.show', compact('collection','linkTypes','statTypes','frequencies','statMonths'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = Collection::whereId($id)->firstOrFail();
        return view('collections.edit', compact('collection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CollectionsFormRequest $request, $id)
    {
        $collection = Collection::findOrFail($id);
        $collection->update($request->all());
        Session::flash('flash_message', 'Collection updated!');
        return redirect()->action('CollectionsController@show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Collection::destroy($id);
        Session::flash('flash_message', 'Collection deleted!');
        return redirect()->action('CollectionsController@index');
    }
}
