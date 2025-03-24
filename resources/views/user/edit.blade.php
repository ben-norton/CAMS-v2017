@extends('layouts.master')
@section('title', 'Update User')
@section('content')
    <?php $model = 'User'; ?>
    @include('includes.header')
    @if (Auth::check())
            <div class="panel panel-default panel-edit panel-user">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit User</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post">
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                        {!! csrf_field() !!}
                        <fieldset>
                            <div class="form-group">
                                <label for="name" class="col-md-2 control-label">First Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control input-md" id="fname" name="fname" value="{{ $user->fname }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-2 control-label">Last Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control input-md" id="lname" name="lname" value="{{ $user->lname }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-2 control-label">Email</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control input-md" id="email" name="email" value="{{ $user->email }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-2 control-label">Password</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control input-md" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-2 control-label">Confirm password</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control input-md" name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 center-block text-center">
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                    <button type="submit" class="btn btn-primary btn-edit">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
    @endif
    @include('includes.footer')
@endsection




