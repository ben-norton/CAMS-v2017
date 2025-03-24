@extends('layouts.master')
@section('title', 'Projects')
@section('content')
    <?php $model = 'Projects'; ?>
    @include('includes.header')
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive" id="responsive-table">
                    <table id="projects-table" class="table table-condensed table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Project Name</th>
                            <th>Project URL</th>
                            <th>Project Contact</th>
                            <th>Contact Email</th>
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
        $('#projects-table').DataTable({
            processing: true,
            serverSide: true,
            pageLength: '50',
            ajax: '{{ url("datatables/projects-data") }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'project_name', name: 'project_name'},
                {data: 'project_url', name: 'project_url'},
                {data: 'project_contact', name: 'project_contact'},
                {data: 'contact_email', name: 'contact_email'},
                {data: 'action', name: 'action', className: 'print-hide', searchable: false},
            ],
        });
    });
</script>
@endpush