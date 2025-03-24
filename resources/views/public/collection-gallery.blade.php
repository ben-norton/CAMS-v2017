@extends('layouts.public-gallery')
@section('title','Gallery')
@section('content')
    <div class="page-title row">
	    <div class="col-md-4 col-sm-12">
	        <h2>Collection Gallery</h2>
	    </div>
	    <div class="col-md-8 col-sm-12">
	        <div class="home-btn-wrapper pull-right">
	        	<a href="{{ url('/') }}" class="btn btn-md btn-primary">Return to Portal</a>
	        </div>	    
	    </div>
	    <div class="clearfix"></div>
    </div>
    <div class="page-content-wrap public-gallery-wrapper">
        <div class="row">
            <div class="gallery col-xs-12">
                <div id="v-app">
                    <h3 class="gallery-title">{{ $collection->collection_name }}</h3>
                    <vue-collection-gallery></vue-collection-gallery>
                </div>
            </div>
        </div>
    </div>
    <script>
        var resource_id = {{ $id }};
    </script>
@endsection
@push('scripts')
@endpush