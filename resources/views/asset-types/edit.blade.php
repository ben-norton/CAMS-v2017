@extends('layouts.master')
@section('title', 'Edit Asset Type')
@section('content')
    <?php $model = 'Asset Type'; ?>

    @include('includes.header')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Edit Asset Type</h2>
        </div>
        <div class="panel-body">
            {!! Form::model($assetType, ['method' => 'PATCH', 'action' => ['AssetTypesController@update', $assetType->id] ]) !!}
            @include('errors.form_error')
            @include('asset-types.form', ['btnclass' => 'btn btn-warning center-block', 'submitTextButton' => 'Update Asset Type'])
            {!! Form::close() !!}
        </div>
    </div>
    @include('includes.footer')
@endsection
