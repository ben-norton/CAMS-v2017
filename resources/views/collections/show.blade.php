@extends('layouts.master')
@section('title', 'Collection')
@section('content')
    <div class="page-title">
        <h2>Collections</h2>
    </div>
    <div class="page-content-wrap">
        @include('layouts.includes.status')
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Collection Information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-show table-bordered table-condensed table-striped table-hover">
	                            <tbody>
	                            <tr>
	                                <th class="col-sm-4">Collection</th>
	                                <td class="col-sm-8">{{ $collection->collection_name }}</td>
	                            </tr>
	                            <tr>
	                                <th>Collection ID</th>
	                                <td>{{ $collection->id }}</td>
	                            </tr>
	                            <tr>
	                                <th>Collection Slug</th>
	                                <td>{{ $collection->collection_slug }}</td>
	                            </tr>
	                            <tr>
	                                <th>Collection Shortname</th>
	                                <td>{{ $collection->collection_shortname }}</td>
	                            </tr>
	                            <tr>
	                                <th>Collection Code</th>
	                                <td>{{ $collection->collection_code }}</td>
	                            </tr>
	                            <tr>
	                                <th>Collection Manager:</th>
	                                <td>{{ $collection->collection_manager_fname }} {{ $collection->collection_manager_lname }}</td>
	                            </tr>
	                            <tr>
	                                <th>Collection Manager Email:</th>
	                                <td><span class="email-link"><a href="mailto:{{ $collection->collection_manager_email }}">{{ $collection->collection_manager_email }}</a></span></td>
	                            </tr>
	                            <tr>
	                                <th>Collection Manager Phone:</th>
	                                <td>{{ $collection->collection_manager_phone }}</td>
	                            </tr>
	                            <tr>
	                                <th>Curator:</th>
	                                <td>{{ $collection->curator_fname }} {{ $collection->curator_lname }}</td>
	                            </tr>
	                            <tr>
	                                <th>Curator Email:</th>
	                                <td><span class="email-link"><a href="mailto:{{ $collection->curator_email }}">{{ $collection->curator_email }}</a></span></td>
	                            </tr>
	                            <tr>
	                                <th>Curator Phone:</th>
	                                <td>{{ $collection->curator_phone }}</td>
	                            </tr>
                                </tbody>
                        	</table>
                    	</div>
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-warning" href="{{ url('/collections/'.$collection->id.'/edit') }}"><i class="fa fa-file"></i> Update</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Collection Stats</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-show table-bordered table-condensed table-striped table-hover">
                                    <tbody>
                                        @foreach($collection->stats as $stat)
                                            <tr>
                                                <th>{{ $stat->parameterKey->display_name }}</th>
                                                <td>
                                                    @if(!empty($stat->value_str))
                                                        {{ $stat->value_str }}
                                                    @elseif(!empty($stat->value_dec))
                                                        {{ $stat->value_dec }}
                                                    @endif
                                                </td>
                                                <td>{{ $stat->frequency }}</td>
                                                <td>
                                                    @if($stat->frequency == 'yearly')
                                                        {{ $stat->stat_year }}
                                                    @elseif($stat->frequency == 'monthly'))
                                                        {{ $stat->stat_month }}-{{ $stat->stat_year }}
                                                    @elseif($stat->frequency == 'daily')
                                                        {{ $stat->stat_day }}-{{ $stat->stat_month }}-{{ $stat->stat_year }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ $stat->source }}</td>
                                                <td>{{ $stat->remarks }}</td>
                                                <td>{{ $stat->external_link }}</td>
                                                <td>
                                                    {!! Form::open(['method'=>'DELETE','route' => ['stats.destroy', $stat->id], 'style' => 'display:inline']) !!}
                                                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"/></i>', array('type' => 'submit','class' => 'btn btn-danger btn-sm')) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#collectionStatsModal">
                                Add Stat
                            </button>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Collection Links</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-show table-bordered table-condensed table-striped table-hover">
                                    <tbody>
                                    @foreach($collection->links as $link)
                                        <tr>
                                            <th>{{ $link->parameterKey->display_name }}</th>
                                            <td><a href="{{ $link->url }}">{{ $link->url }}</a></td>
                                            <td>
                                                {!! Form::open(['method'=>'DELETE','route' => ['link.destroy', $link->id], 'style' => 'display:inline']) !!}
                                                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"/></i>', array('type' => 'submit','class' => 'btn btn-danger btn-sm')) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="row">
                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#collectionLinksModal">
                                    Add Link
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('collections.modals.collection-links')
    @include('collections.modals.collection-stats')
@endsection