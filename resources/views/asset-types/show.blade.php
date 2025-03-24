@extends('layouts.master')
@section('title', 'Asset Type')
@section('content')
    <?php $model = 'Asset Type'; ?>

    @include('includes.header')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Asset Type Information</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-show table-bordered table-condensed table-striped table-hover">
                        <tbody>
                            <tr>
                                <th class="col-sm-3">Asset Type Name</th>
                                <td class="col-sm-9">{{ $assetType->name }}</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Remarks</th>
                                <td class="col-sm-9">{{ $assetType->remarks }}</td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">Media Type Name</th>
                                <td class="col-sm-9">{{ $assetType->parameterKey->display_name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <a class="btn btn-warning" href="{{ url('/asset-types/'.$assetType->id.'/edit') }}"><i class="fa fa-file"></i> Update</a>
            </div>
        </div>
    @include('includes.footer')
@endsection