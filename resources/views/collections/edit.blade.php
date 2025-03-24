@extends('layouts.master')
@section('title', 'Update Collection')
@section('content')
    <div class="page-title">
        <h2>Collections</h2>
    </div>
    <div class="page-content-wrap">
        @include('layouts.includes.status')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::model($collection, ['method' => 'PATCH', 'action' => ['CollectionsController@update', $collection->id] ]) !!}
                        @include('errors.form_error')
                        @include('collections.form', ['btnclass' => 'btn btn-warning center-block', 'submitTextButton' => 'Update Collection'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
