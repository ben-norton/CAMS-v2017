@extends('layouts.master')
@section('title', 'Project')
@section('content')
    <div class="page-title">
        <h2>Projects</h2>
    </div>
    <div class="page-content-wrap">
        @include('layouts.includes.status')
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Project Information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-show table-bordered table-condensed table-striped table-hover">
                                <tbody>
                                <tr>
                                    <th class="col-sm-3">Collection</th>
                                    <td class="col-sm-9">{{ $project->project_name }}</td>
                                </tr>
                                <tr>
                                    <th>Project ID</th>
                                    <td>{{ $project->id }}</td>
                                </tr>
                                <tr>
                                    <th>Project Slug</th>
                                    <td>{{ $project->project_slug }}</td>
                                </tr>
                                <tr>
                                    <th>Project Shortname</th>
                                    <td>{{ $project->project_shortname }}</td>
                                </tr>
                                <tr>
                                    <th>Project URL</th>
                                    <td><a href="{{ $project->project_url }}">{{ $project->project_url }}</a></td>
                                </tr>
                                <tr>
                                    <th>AWS s3 Bucket Name</th>
                                    <td>{{ $project->s3_bucket_name }}</td>
                                </tr>
                                <tr>
                                    <th>Active</th>
                                    <td>
                                        @if($project->active_yn == 1)
                                            Yes
                                            @else
                                            No
                                            @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Start Date</th>
                                    <td>{{ $project->start_date }}</td>
                                </tr>
                                <tr>
                                    <th>End Date</th>
                                    <td>{{ $project->end_date }}</td>
                                </tr>
                                <tr>
                                    <th>Remarks</th>
                                    <td>{{ $project->remarks }}</td>
                                </tr>
                                <tr>
                                    <th>Contact:</th>
                                    <td>{{ $project->contact_fname }} {{ $project->contact_lname }}</td>
                                </tr>
                                <tr>
                                    <th>Contact Email:</th>
                                    <td><span class="email-link"><a href="mailto:{{ $project->contact_email }}">{{ $project->contact_email }}</a></span></td>
                                </tr>
                                <tr>
                                    <th>Contact Phone:</th>
                                    <td>{{ $project->contact_phone }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-warning" href="{{ url('/projects/'.$project->id.'/edit') }}"><i class="fa fa-file"></i> Update</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
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
                                            {!! Form::open(['method'=>'DELETE','route' => ['projects.metadata.destroy', $project->id, $kv->key], 'style' => 'display:inline']) !!}
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
            </div>
        </div>
    @include('projects.modals.metadata')
@endsection