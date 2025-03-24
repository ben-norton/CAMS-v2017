@extends('layouts.master')
@section('title', 'Asset Types')
@section('content')
    <?php $model = 'Asset Types' ?>
    @include('includes.header')
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive" id="responsive-table">
                    <table id="asset-types-table" class="table table-condensed table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Asset Type</th>
                                <th>Media Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    @include('includes.footer')
@endsection
@push('scripts')
<script>
    $(function() {
        $('#asset-types-table').DataTable({
            processing: true,
            serverSide: true,
            pageLength: '50',
            ajax: '{{ url("datatables/asset-types-data") }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'asset_types.name'},
                {data: 'display_name', name: 'parameter_keys.display_name'},
                {data: 'action', name: 'action', className: 'print-hide', searchable: false},
            ],
        });
    });
</script>
@endpush