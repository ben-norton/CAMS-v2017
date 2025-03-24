@extends('layouts.gallery')
@section('title', 'Asset')
@section('content')
    @include('assets.header')
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="v-app">
                    <vue-asset-search></vue-asset-search>
                </div>
            </div>
        </div>
    </div>
    @include('assets.footer')
@endsection
