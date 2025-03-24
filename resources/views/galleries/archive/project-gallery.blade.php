@extends('layouts.gallery')
@section('title','Project Gallery')
@section('content')
    <div class="page-title">
        <h2>Project Gallery</h2>
    </div>
    <div class="page-content-wrap">
        <div class="row">
            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="v-app">
                    <vue-project-gallery></vue-project-gallery>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush