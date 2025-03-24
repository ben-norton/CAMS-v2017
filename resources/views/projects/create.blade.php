@extends('layouts.master')
@section('title', 'Create Project')
@section('content')
    <?php $model = 'Project'; ?>
    @include('includes.header')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Create Project</h2>
        </div>
        <div class="panel-body">
            {!! Form::open(['route' => 'projects.create']) !!}
            @include('errors.form_error')
            @include('projects.form', ['btnclass' => 'btn btn-success center-block', 'submitTextButton' => 'Add Project'])
            {!! Form::close() !!}
        </div>
    </div>
    @include('includes.footer')
@endsection
