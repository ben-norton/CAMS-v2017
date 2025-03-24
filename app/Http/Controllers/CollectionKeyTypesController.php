<?php

namespace App\Http\Controllers;

use Session;
use App\Collection;
use App\CollectionKeyType;
use Illuminate\Http\Request;
use App\Http\Requests\CollectionKeyTypesFormRequest;

class CollectionKeyTypesController extends Controller
{
    public function index()
    {
        return view('collection-key-types.datatable');
    }
    public function create()
    {
        $collections = Collection::all();
        return view('collection-key-types.create', compact('collections'));
    }

    public function store(CollectionKeyTypesFormRequest $request)
    {
        CollectionKeyType::create($request->all());
        Session::flash('flash_message', 'Collection Key Type added!');
        return redirect()->action('CollectionKeyTypesController@index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cktype = CollectionKeyType::find($id);
        return view('collection-key-types.show', compact('cktype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cktype = CollectionKeyType::findOrFail($id);
        return view('collection-key-types.edit', compact('cktype',));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CollectionKeyTypesFormRequest $request, $id)
    {
        $cktype = CollectionKeyType::findOrFail($id);
        $cktype->update($request->all());
        Session::flash('flash_message', 'Collection Key Type updated!');
        return redirect()->action('CollectionKeyTypesController@show', ['id' => $id]);
    }
    public function destroy($id)
    {
        CollectionKeyType::destroy($id);
        Session::flash('flash_message', 'Collection Key Type deleted!');
        return redirect()->action('CollectionKeyTypesController@index');
    }


}
