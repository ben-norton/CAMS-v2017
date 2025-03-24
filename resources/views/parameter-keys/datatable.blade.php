@extends('layouts.master')
@section('title', 'Parameter Keys')
@section('content')
    <?php $model = 'Parameter Keys'; ?>

    @include('includes.header')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive" id="responsive-table">
                <table id="link-types-table" class="table table-condensed table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Display Name</th>
                            <th>Model</th>
                            <th>Type</th>
                            <th>URL</th>
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
        $('#link-types-table').DataTable({
            processing: true,
            serverSide: true,
            pageLength: '50',
            ajax: '{{ url("datatables/parameter-keys-data") }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'display_name', name: 'display_name'},
                {data: 'model', name: 'model'},
                {data: 'parameter_type', name: 'parameter_type'},
                {data: 'source_url', name: 'source_url'},
            ],
        });
    });
</script>
@endpush