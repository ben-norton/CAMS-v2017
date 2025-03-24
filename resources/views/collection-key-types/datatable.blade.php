@extends('layouts.master')
@section('title', 'Collection Key Types')
@section('content')
    <?php $model = 'Collection Key Types'; ?>

    @include('includes.header')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive" id="responsive-table">
                <table id="cktypes-table" class="table table-condensed table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Display Name</th>
                            <th>Variable</th>
                            <th>Count</th>
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
        $('#cktypes-table').DataTable({
            processing: true,
            serverSide: true,
            pageLength: '50',
            ajax: '{{ url("datatables/collection-key-types-data") }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'display_name', name: 'display_name'},
				{data: 'variable', name: 'variable'},
                {data: 'count', name: 'count'},
            ],
        });
    });
</script>
@endpush