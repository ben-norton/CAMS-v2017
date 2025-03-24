@extends('layouts.gallery')
@section('title','Project Gallery')
@section('content')
@if(Auth::user()->hasRole(array('administrator','staff')))
    <div class="page-title">
        <h2>Galleries - Select Project</h2>
    </div>
    <div class="page-content-wrap">
        @foreach($projects->chunk(3) as $chunk)
            <div class="row project-panels">
                @foreach($chunk as $project)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="hovereffect">
									@foreach($project->assets as $asset)
										@if($loop->first)
											<img src="{{ $asset->imgpath_md }}" alt="{{ $asset->title }}" class="img-responsive">
										@endif
									@endforeach
                                    <div class="overlay">
                                        <h2>{{ $project->project_name }}</h2>
                                        <a href="{{ url('/galleries/project/'.$project->id) }}" class="info">VIEW GALLERY</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endif
    <style>
        .project-panels .panel .panel-body h3 {
            text-align: center;
        }
    </style>
@endsection
@push('scripts')
@endpush