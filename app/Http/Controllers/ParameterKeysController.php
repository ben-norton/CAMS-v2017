<?php

namespace App\Http\Controllers;
use App\Http\Requests\ParameterKeysFormRequest;
use App\ParameterKey;
use App\StaticArray;
use Session;
use Illuminate\Http\Request;

class ParameterKeysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('parameter-keys.datatable');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = StaticArray::$models;
        $parameterTypes = StaticArray::$parameterTypes;
        return view('parameter-keys.create', compact('models', 'parameterTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParameterKeysFormRequest $request)
    {
        ParameterKey::create($request->all());
        Session::flash('flash_message', 'Parameter Key added!');
        return redirect()->action('ParameterKeysController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parameter = ParameterKey::find($id);
        return view('parameter-keys.show', compact('parameter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parameter = ParameterKey::findOrFail($id);
        $models = StaticArray::$models;
        $parameterTypes = StaticArray::$parameterTypes;
        return view('parameter-keys.edit', compact('parameter','models','parameterTypes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParameterKeysFormRequest $request, $id)
    {
        $parameter = ParameterKey::findOrFail($id);
        $parameter->update($request->all());
        Session::flash('flash_message', 'Parameter Key updated!');
        return redirect()->action('ParameterKeysController@show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ParameterKey::destroy($id);
        Session::flash('flash_message', 'Parameter Key deleted!');
        return redirect()->action('ParameterKeysController@index');
    }
}
