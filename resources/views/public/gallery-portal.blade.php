@extends('layouts.public-gallery')
@section('title','Gallery Portal')
@section('content')
    <div class="page-title row">
	    <div class="col-md-12 col-sm-12">
	        <h2>Gallery Portal</h2>
        </div>
	    <div class="clearfix"></div>
    </div>
    <div class="page-content-wrap public-gallery-wrapper portal-wrapper">
        @if(!$collections->isEmpty())
        <div class="row">
            <div class="gallery col-xs-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2>Collections</h2>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    @foreach($collections as $collection)
                                        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
                                            <a href="{{ url('gallery/collection/'.$collection->id) }}" class="tile tile-danger">
                                                <span>{{ $collection->collection_name }}</span>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(!$projects->isEmpty())
        <div class="row">
            <div class="gallery collections-galleries col-xs-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2>Projects</h2>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    @foreach($projects as $project)
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <a href="{{ url('gallery/project/'.$project->id) }}" class="tile tile-primary">
                                                <span>{{ $project->project_name }}</span>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(!$assetTypes->isEmpty())
        <div class="row">
            <div class="gallery collections-galleries col-xs-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2>Asset Types</h2>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    @foreach($assetTypes as $at)
                                        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
                                            <a href="{{ url('gallery/asset-type/'.$at->id) }}" class="tile tile-success">
                                                <span>{{ $at->name }}</span>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

</div>
@endsection
@push('scripts')
@endpush