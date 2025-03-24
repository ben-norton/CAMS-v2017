@extends('layouts.master')
@section('title', 'Create Asset Type')
@section('content')
<?php $model = 'Asset Type'; ?>
    @include('includes.header')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">Create Asset Type</h2>
            </div>
            <div class="panel-body">
                {!! Form::open(['route' => 'asset-types.create']) !!}
                @include('errors.form_error')
                @include('asset-types.form', ['btnclass' => 'btn btn-success center-block', 'submitTextButton' => 'Add Asset Type'])
                {!! Form::close() !!}
            </div>
        </div>
    @include('includes.footer')
@endsection
