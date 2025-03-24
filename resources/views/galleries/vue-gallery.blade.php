@extends('layouts.gallery')
@section('title','Gallery')
@section('content')
    <div class="page-title">
        <h2>{{ $galleryType }} Gallery</h2>
    </div>
    <div class="page-content-wrap">
        <div class="row">
            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
	            @if(Auth::user()->hasRole(array('administrator','staff')))
                <div id="v-app">
                    @if($galleryType == 'Project')
                        <h3>{{ $project->project_name }}</h3>
                        <vue-project-gallery></vue-project-gallery>
                    @elseif($galleryType == 'Collection')
                        <h3>{{ $collection->collection_name }}</h3>
                        <vue-collection-gallery></vue-collection-gallery>
                    @endif
                </div>
                @else
                	<h3>Unauthorized.</h3>
                @endif
            </div>
        </div>
    </div>
    <script>
        var resource_id = {{ $id }};
    </script>
@endsection
@push('scripts')
@endpush