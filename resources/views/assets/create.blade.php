@extends('layouts.master')
@section('title', 'Create Asset')
@section('content')
    @include('assets.header')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Create Asset</h2>
        </div>
        <div class="panel-body">
            {!! Form::open(['route' => 'assets.create','files' => true]) !!}
            @include('errors.form_error')
            @include('assets.form', ['btnclass' => 'btn btn-success center-block', 'submitTextButton' => 'Add Asset'])
            {!! Form::close() !!}
        </div>
    </div>
    @include('assets.footer')
@endsection
