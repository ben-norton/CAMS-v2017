@extends('layouts.public-gallery')
@section('title', 'Asset')
@section('content')
    @include('layouts.includes.public-asset-header')
    <div class="row">
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
                                <th class="col-sm-4">Asset GUID</th>
                                <td class="col-sm-8">{{ $asset->guid }}</td>
                            </tr>
                            <tr>
                                <th class="col-sm-4">Asset URI</th>
                                <td class="col-sm-8">
                                    <a href="{{ url('') }}/api/v1/resources/asset?guid={{ $asset->guid }}">{{ url('') }}/api/v1/resources/asset?guid={{ $asset->guid }}</a>
                                </td>
                            </tr>
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
                                <th>Remarks</th>
                                <td>{{ $asset->remarks }}</td>
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
                                <th>Attribution Required?</th>
                                <td>
                                    @if($asset->attribution_required_yn == 1)
                                        Attribution Required
                                    @else
                                        Attribution Not Required
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
                            </thead>
                            <tbody>
                                @foreach($meta as $kv)
                                    <tr id="metadata-{{ $kv->id }}">
                                        <td>{{ $kv->display_name }}</td>
                                        <td>{{ $kv->value }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

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
                        </div>
                    </a>
                </div>
            @endif

            <!-- Collection Keys -->
            @if(count($asset->collectionKeys) > 0)
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
                            </thead>
                            <tbody>
                            @foreach($asset->collectionKeys as $collectionKey)
                                <tr id="specimen-{{ $collectionKey->id }}">
                                    <td>{{ $collectionKey->keyType->display_name }}</td>
                                    <td>{{ $collectionKey->key_value }}</td>
                                    <td>{{ $collectionKey->collection->collection_name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
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
                            </thead>
                            <tbody>
                            @foreach($asset->projects as $project)
                                <tr id="specimen {{ $project->id }}">
                                    <td>{{ $project->project_name }}</td>
                                    <td><a href="mailto:{{ $project->contact_email }}">{{ $project->fname }} {{ $project->lname }}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <!-- Right Column End -->
        </div>

    </div>

@endsection
