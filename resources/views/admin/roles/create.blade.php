@extends('layouts.master')
@section('title', 'Create A New Role')

@section('content')
    @if (Auth::check())
        @if ( Auth::user()->hasRole('administrator'))
            <div class="page-title">                    
		        <h1>Create a Role</h1>
		    </div>
			<div class="page-content-wrap">
				<div class="row">
			        <div class="col-md-12">
				         @include('layouts.includes.status')
			            <div class="panel panel-default">
			                <div class="panel-body">
                                <form class="form-horizontal" method="post">

                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach

                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                                <fieldset>
                                    <legend>Create a new role</legend>
                                    <div class="form-group">
                                        <label for="name" class="col-md-3 control-label">Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="input-md form-control" id="name" name="name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="display_name" class="col-md-3 control-label">Display Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="input-md form-control" id="display_name" name="display_name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="col-md-2 control-label">Description</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" rows="3" id="description" name="description"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12 center-block text-center">
                                            <button type="reset" class="btn btn-default">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </fieldset>
	                            </form>
	                        </div>
	                    </div>
	                </div>
	            </div>
			</div>
        @endif
    @endif
@endsection

