@extends('layouts.master')
@section('name', 'Edit a user')
@section('content')
    <?php $model = 'User'; ?>
    <div class="page-title">
        <h2>{{ $model }}</h2>
    </div>
    <div class="page-content-wrap">
        @include('layouts.includes.status')
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default panel-edit panel-admin">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit User</h3>
                </div>
                <div class="panel-body">
                    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['Admin\UsersController@update', $user->id] ]) !!}
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
                                <label for="role" class="col-md-2 control-label">Role</label>
                                <div class="col-md-10">
                                    <select class="form-control input-md" id="role" name="role[]" multiple>
                                        @foreach($roles as $role)
                                            <option value="{!! $role->id !!}" @if(in_array($role->id, $selectedRoles))
                                            selected="selected" @endif >{!! $role->display_name !!}
                                            </option>
                                        @endforeach
                                    </select>
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
                    {!! Form::close() !!}
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection




