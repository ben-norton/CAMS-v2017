@extends('layouts.master')
@section('title', 'User Profile')
@section('content')
    <?php $model = 'User'; ?>
    <div class="page-title">
        <h2>{{ $model }}</h2>
    </div>
    <div class="page-content-wrap">
        @include('layouts.includes.status')
        <div class="row">
            <div class="col-md-6">

        @if (Auth::check())
            <div class="panel panel-default panel-show panel-user">
                <div class="panel-heading">
                    <h3 class="pull-left panel-title">User Profile: {{ $user->fname }} {{ $user->lname }}</h3>
                    <a class="btn btn-sm btn-warning pull-right" href="{{ url('/user/edit') }}"><i class="fa fa-refresh"></i> Edit User</a>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <div class="table" id="responsive-table">
                        <table class="table table-bordered table-striped table-hover">
                            <tbody>
                                <tr>
                                    <th>User ID:</th>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <th>User Name:</th>
                                    <td>{{ $user->fname }} {{ $user->lname }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                </tr>
                                <tr>
                                    <th>Roles: </th>
                                    <td>
                                        <ul class="roles">
                                            @foreach( $user->roles as $role )
                                                <li>{{ $role->display_name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    @include('includes.footer')
@endsection
