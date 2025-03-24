@extends('layouts.master')
@section('title', 'Create Parameter Key')
@section('content')
    <?php $model = 'Parameter Key'; ?>
    @include('includes.header')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Create Parameter Key</h2>
        </div>
        <div class="panel-body">
            {!! Form::open(['route' => 'parameter-keys.create']) !!}
            @include('errors.form_error')
            @include('parameter-keys.form', ['btnclass' => 'btn btn-success center-block', 'submitTextButton' => 'Add Parameter Key'])
            {!! Form::close() !!}
        </div>
    </div>
    @include('includes.footer')
@endsection
