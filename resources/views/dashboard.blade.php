@extends('layouts.master')
@section('title','Dashboard')
@section('content')
    <div class="page-title">
        <h2>Dashboard</h2>
    </div>
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="well">
                            <h3>Welcome to the Collections Asset Manager Dashboard</h3>
                        </div>
                        <a href="{{ url('/assets/create') }}" class="btn btn-success btn-lg">Create An Asset</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
            