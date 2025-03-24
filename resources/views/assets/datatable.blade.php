@extends('layouts.master')
@section('title', 'Assets')
@section('content')
  @include('assets.header')
	<div class="panel panel-default" id="panel-filter">
		<div class="panel-heading">
			<h4 class="panel-title">
				Search/Filter Table
			</h4>
		</div>
		<div class="panel-body" id="filterPanel">
			<div class="row filter-wrapper">
				<form method="POST" id="search-form" class="form-horizontal datatable-filter-form" role="form">
					<div class="col-lg-3 col-md-3 col-sm-12">
						<div class="form-group">
							<label for="asset_type">Asset Type</label>
							<select class="form-control input-sm" name="asset_type">
								<option value=""></option>
								@foreach($assetTypes as $assetType)
									<option value="{{ $assetType->id }}">{{ $assetType->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12">
						<div class="form-group">
							<label for="collection">Collection</label>
							<select class="form-control input-sm" name="collection">
								<option value=""></option>
								@foreach($collections as $collection)
									<option value="{{ $collection->id }}">{{ $collection->collection_name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12">
						<div class="form-group">
							<label for="project">Project</label>
							<select class="form-control input-sm" name="project">
								<option value=""></option>
								@foreach($projects as $project)
									<option value="{{ $project->id }}">{{ $project->project_name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12">
						<div class="btn-group">
							<button type="submit" class="btn btn-primary btn-md">Filter</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
  	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12">
		            <div class="table-responsive" id="responsive-table">
		                <table id="assets-table" class="table table-condensed table-bordered table-striped table-hover">
		                    <thead>
		                        <tr>
		                            <th>ID</th>
		                            <th>Asset Title</th>
		                            <th>Type</th>
		                            <th>Original Filename</th>
		                            <th>Action</th>
		                        </tr>
		                    </thead>
		                </table>
		            </div>
		        </div>
		    </div>        
        </div>
    </div>
    @include('assets.footer')
@endsection
@push('scripts')
<script>
    $(function() {
        var oTable = $('#assets-table').DataTable({
            processing: true,
            serverSide: true,
			saveState: true,
            language: {
                "processing": "Hang on." //add a loading image,simply putting <img src="loader.gif" /> tag.
            },
             ajax: {
                url: '{{ url("datatables/assets-data") }}',
                data: function (d) {
                    d.asset_type = $('select[name=asset_type]').val();
                    d.collection = $('select[name=collection]').val();
                    d.project = $('select[name=project]').val();
                }
            },
            pageLength: '50',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'title', name: 'assets.title'},
                {data: 'name', name: 'asset_types.name'},
                {data: 'original_filename', name: 'original_filename'},
                {data: 'action', name: 'action', className: 'print-hide', searchable: false},
            ],
        });
     $('#search-form').on('submit', function(e) {
            oTable.draw();
            e.preventDefault();
        });
    });
</script>
@endpush
