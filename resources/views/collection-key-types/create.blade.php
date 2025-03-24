@extends('layouts.master')
@section('title', 'Create Collection Key Type')
@section('content')
    <?php $model = 'Collection Key Type'; ?>
    @include('includes.header')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Create Collection Key Type</h2>
        </div>
        <div class="panel-body">
            {!! Form::open(['route' => 'collection-key-types.create']) !!}
            @include('errors.form_error')
            @include('collection-key-types.form', ['btnclass' => 'btn btn-success center-block', 'submitTextButton' => 'Add Collection Key Type'])
            {!! Form::close() !!}
        </div>
    </div>
    @include('includes.footer')
@endsection
