@extends('layouts.master')
@section('title', 'Collections')
@section('content')
    <div class="page-title">
        <h2>Collections</h2>
    </div>
    <div class="page-content-wrap">
        @include('layouts.includes.status')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive" id="responsive-table">
                            <table id="collections-table" class="table table-condensed table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Collection Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(function() {
        $('#collections-table').DataTable({
            processing: true,
            serverSide: true,
            pageLength: '50',
            ajax: '{{ url("datatables/collections-data") }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'collection_name', name: 'collection_name'},
                {data: 'action', name: 'action', className: 'print-hide', searchable: false},
            ],
        });
    });
</script>
@endpush