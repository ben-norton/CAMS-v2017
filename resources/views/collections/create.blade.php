@extends('layouts.master')
@section('title', 'Create Collection')
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
                        {!! Form::open(['route' => 'collections.create']) !!}
                        @include('errors.form_error')
                        @include('collections.form', ['btnclass' => 'btn btn-success center-block', 'submitTextButton' => 'Add Collection'])
                        {!! Form::close() !!}
                    </div>
                </div>
 	       </div>
        </div>
    </div>
@endsection
