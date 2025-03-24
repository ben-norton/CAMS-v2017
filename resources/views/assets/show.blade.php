@extends('layouts.master')
@section('title', 'Asset')
@section('content')
    @include('assets.header')
    <div class="col-lg-6 col-md-12">
        <div class="panel panel-primary panel-specimens">
            <div class="panel-heading">
                <h3 class="panel-title">Asset Information</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-condensed">
                        <tbody>
                        <tr>
                            <th class="col-sm-4">Asset ID</th>
                            <td class="col-sm-8">{{ $asset->id }}</td>
                        </tr>
                        <tr>
                            <th>Photo Title</th>
                            <td>{{ $asset->title }}</td>
                        </tr>
                        <tr>
                            <th>Filename</th>
                            <td>{{ $asset->s3filename }}</td>
                        </tr>
                        <tr>
                            <th>Original Filename</th>
                            <td>{{ $asset->original_filename}}</td>
                        </tr>
                        <tr>
                            <th>Uploaded By</th>
                            <td><a href="mailto:{{ $asset->user->email }}">{{ $asset->user->fname}} {{ $asset->user->lname }}</a></td>
                        </tr>
                        <tr>
                            <th>Full Path</th>
                            <td><a href="{{ $asset->s3path }}" data-lightpanel-="single-gallery" data-title="{{ $asset->photo_title }}">{{ $asset->s3path }}</a> <button class="btn btn-default btn-sm btn-clip" data-clipboard-text="{{ $asset->s3path_lg }}"><i class="fa fa-clipboard"></i> Copy Link</button></td>
                        </tr>
                        <tr>
                            <th>Remarks</th>
                            <td>{{ $asset->remarks }}</td>
                        </tr>
                        <tr>
                            <th>Uploaded</th>
                            <td>{{ $asset->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Asset Type</th>
                            <td>{{ $asset->assetType->name }}</td>
                        </tr>
                        <tr>
                            <th>Media Type</th>
                            <td>{{ $asset->assetType->parameterKey->display_name }}</td>
                        </tr>
                        <tr>
                            <th colspan="2">Attribution/Citation</th>
                        </tr>
                        <tr>
                            <th>Attribution Required?</th>
                            <td>
                                @if($asset->attribution_required_yn == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Attribution/Citation</th>
                            <td>{{ $asset->attribution }}</td>
                        </tr>
                        <tr>
                            <th>Usage Restrictions?</th>
                            <td>
                                @if($asset->usage_restrictions_yn == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>License</th>
                            <td>{{ $asset->license_type }}</td>
                        </tr>
                        <tr>
                            <th>Restriction Remarks</th>
                            <td>{{ $asset->restriction_remarks }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <a class="btn btn-warning" href="{{ url('/assets/'.$asset->id.'/edit') }}"><i class="fa fa-file"></i> Update</a>
            </div>
        </div>
        @if($asset->assetType->parameterKey->variable == 'image')
        <div class="panel panel-primary panel-specimens exif-wrapper">
            <div class="panel-heading">
                <h3 class="panel-title">EXIF MetaData</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-condensed table-bordered table-striped table-hover table-static">
                        <tbody>
                        @if($exif)
                        @foreach(array_slice($exif, 0, 100) as $key => $value)
                        @if(!is_array($value))
                        <tr>
                            <th class="col-sm-4">{{ $key }}</th>
                            <td class="col-sm-8">{{ $value }}</td>
                        </tr>
                        @endif
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif
    <!-- Metadata -->
        <div class="panel panel-primary panel-associations">
            <div class="panel-heading">
                <h3 class="panel-title">Metadata</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="assignment-table" class="table table-bordered table-striped table-hover table-primary">
                        <thead>
                        <th class="col-sm-5">Metadata Key</th>
                        <th class="col-sm-5">Metadata Value</th>
                        <th class="col-sm-2">Action</th>
                        </thead>
                        <tbody>
                        @foreach($meta as $kv)
                            <tr id="metadata-{{ $kv->id }}">
                                <td>{{ $kv->display_name }}</td>
                                <td>{{ $kv->value }}</td>
                                <td>
                                    {!! Form::open(['method'=>'DELETE','route' => ['assets.metadata.destroy', $asset->id, $kv->key], 'style' => 'display:inline']) !!}
                                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"/></i>', array('type' => 'submit','class' => 'btn btn-danger btn-sm')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#metadataModal">
                    Add Metadata
                </button>
            </div>
        </div>
</div><!-- Left Column End -->

    <!-- Right Column -->
    <div class="col-lg-6 col-md-12">

        @if($asset->assetType->parameterkey->variable == 'image')
            <div class="gallery" id="links">
                <a href="{{ $asset->imgpath_md }}" title="{{ $asset->title }}" class="gallery-item" data-gallery>
                    <div class="image">
                        <img src="{{ $asset->imgpath_md }}" alt="{{ $asset->title }}" class="img-responsive" />
                    </div>
                    <div class="meta">
                    <!--<strong>{{ $asset->title }}</strong><span>Description</span> -->
                    </div>
                </a>
            </div>
        @endif

    <!-- Collection Keys -->
        <div class="panel panel-primary panel-associations">
            <div class="panel-heading">
                <h3 class="panel-title">Collection Keys</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="assignment-table" class="table table-bordered table-striped table-hover table-primary">
                        <thead>
                        <th class="col-sm-3">Key</th>
                        <th class="col-sm-3">Value</th>
                        <th class="col-sm-4">Collection</th>
                        <th class="col-sm-2">Action</th>
                        </thead>
                        <tbody>
                        @foreach($asset->collectionKeys as $collectionKey)
                            <tr id="specimen-{{ $collectionKey->id }}">
                                <td>{{ $collectionKey->keyType->display_name }}</td>
                                <td>{{ $collectionKey->key_value }}</td>
                                <td>{{ $collectionKey->collection->collection_name }}</td>
                                <td>{{ $collectionKey->id }}
                                    {!! Form::open(['method'=>'DELETE','route' => ['collection.keys.destroy', $collectionKey->id],
                                    'style' => 'display:inline']) !!}
                                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true" /></i>',
                                    array('type' => 'submit','class' => 'btn btn-danger btn-sm')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#collectionKeysModal">
                    Add Collection Key
                </button>
            </div>
        </div>

        <!-- Projects -->
        <div class="panel panel-primary panel-associations">
            <div class="panel-heading">
                <h3 class="panel-title">Projects</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="projects-table" class="table table-bordered table-striped table-hover table-primary">
                        <thead>
                        <th class="col-sm-5">Project Name</th>
                        <th class="col-sm-5">Project Contact</th>
                        <th class="col-sm-2">Action</th>
                        </thead>
                        <tbody>
                        @foreach($asset->projects as $project)
                            <tr id="specimen {{ $project->id }}">
                                <td>{{ $project->project_name }}</td>
                                <td><a href="mailto:{{ $project->contact_email }}">{{ $project->fname }} {{ $project->lname }}</a></td>
                                <td>
                                    {!! Form::open(['method'=>'DELETE','route' => ['assets.projects.destroy', $project->id, $asset->id], 'style' => 'display:inline']) !!} {!! Form::hidden('project_id',$project->id) !!} {!! Form::hidden('asset_id',$asset->id) !!} {!! Form::button('<i
                                    class="fa fa-trash" aria-hidden="true" /></i>', array('type' => 'submit','class' => 'btn btn-danger btn-sm')) !!} {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#projectModal">
                    Add Project
                </button>
            </div>
        </div>
    </div>
    <!-- Right Column End -->
</div>
@include('assets.modals.collection-keys')
@include('assets.modals.metadata')
@include('assets.modals.projects')
@endsection
