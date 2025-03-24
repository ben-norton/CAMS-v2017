@extends('layouts.master')
@section('title','Welcome')
@section('content')
	<div class="page-title">                    
        <h2>HOME</h2>
    </div>
	<div class="page-content-wrap">
		<div class="row">
	        <div class="col-md-12">
	            <div class="panel panel-default">
	                <div class="panel-body">
						<div class="well">
							<h3>Welcome to Collections Asset Manager</h3>
							<h4>Thanks for registering. Please contact the system administrator for access to the application. Thanks.</h4>
							<ul class="sys-info">
								<li>Roles:
									@foreach( Auth::user()->roles as $r)
										{{ $r->name }}
									@endforeach
								</li>
								<li>Laravel Version: {{ $version }}</li>

							</ul>
						</div>
	                </div>
	            </div>
	        </div>
	    </div>
    </div>
@endsection
            