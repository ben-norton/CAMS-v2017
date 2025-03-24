@extends('layouts.master')
@section('title','Unauthorized')
@section('content')
    <div class="page-title">
        <h2>401</h2>
    </div>
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="well">
                            <h4>You are unauthorized to view the intended page.</h4>
                            <h4>Please contact the system administrator for access to the application. Thanks.</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
