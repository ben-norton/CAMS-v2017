@extends('layouts.master')
@section('title', 'Parameter Key')
@section('content')
    <?php $model = 'Parameter Key'; ?>

    @include('includes.header')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Parameter Key Information</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-show table-bordered table-condensed table-striped table-hover">
                    <tbody>
                    <tr>
                        <th class="col-sm-3">Parameter Key Name</th>
                        <td class="col-sm-9">{{ $parameter->display_name }}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">Variable</th>
                        <td class="col-sm-9">{{ $parameter->variable }}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">Model</th>
                        <td class="col-sm-9">{{ $parameter->model }}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">Type</th>
                        <td class="col-sm-9">{{ $parameter->parameter_type }}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">Source</th>
                        <td class="col-sm-9">{{ $parameter->source_name }}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">Source URL</th>
                        <td class="col-sm-9"><a href="{{ $parameter->source_url }}">{{ $parameter->source_url }}</a></td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">Remarks</th>
                        <td class="col-sm-9">{{ $parameter->remarks }}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">Created</th>
                        <td class="col-sm-9">{{ $parameter->created_at }}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">Last Updated</th>
                        <td class="col-sm-9">{{ $parameter->updated_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-footer">
            <a class="btn btn-warning" href="{{ url('/parameter-keys/'.$parameter->id.'/edit') }}"><i class="fa fa-file"></i> Update</a>
        </div>
    </div>
    @include('includes.footer')
@endsection