@extends('layouts.master')
@section('title', 'Edit Asset')
@section('content')
    @include('assets.header')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">Edit Asset</h2>
            </div>
            <div class="panel-body">
                {!! Form::model($asset, ['method' => 'PATCH', 'action' => ['DigitalAssetsController@update', $asset->id] ]) !!}
                    @include('errors.form_error')
                    @include('assets.edit-form', ['btnclass' => 'btn btn-success center-block', 'submitTextButton' => 'Edit Asset'])
                {!! Form::close() !!}
            </div>
        </div>
    @include('assets.footer')
@endsection
