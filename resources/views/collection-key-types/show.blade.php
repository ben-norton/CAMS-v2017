@extends('layouts.master')
@section('title', 'Collection Key Type')
@section('content')
    <?php $model = 'Collection Key Type'; ?>

    @include('includes.header')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Collection Key Type Information</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-show table-bordered table-condensed table-striped table-hover">
                    <tbody>
                    <tr>
                        <th class="col-sm-3">Collection Key Type Name</th>
                        <td class="col-sm-9">{{ $cktype->display_name }}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">Variable</th>
                        <td class="col-sm-9">{{ $cktype->variable }}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">Remarks</th>
                        <td class="col-sm-9">{{ $cktype->remarks }}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">Created</th>
                        <td class="col-sm-9">{{ $cktype->created_at }}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">Last Updated</th>
                        <td class="col-sm-9">{{ $cktype->updated_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-footer">
            <a class="btn btn-warning" href="{{ url('/collection-key-types/'.$cktype->id.'/edit') }}"><i class="fa fa-file"></i> Update</a>
        </div>
    </div>
    @include('includes.footer')
@endsection