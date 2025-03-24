@extends('layouts.master')
@section('title', 'Update Project')
@section('content')
    <?php $model = 'Project'; ?>
    @include('includes.header')
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::model($project, ['method' => 'PATCH', 'action' => ['ProjectsController@update', $project->id] ]) !!}
                        @include('errors.form_error')
                        @include('projects.form', ['btnclass' => 'btn btn-warning center-block', 'submitTextButton' => 'Update Project'])
                        {!! Form::close() !!}
                    </div>
                </div>
    @include('includes.footer')
@endsection
