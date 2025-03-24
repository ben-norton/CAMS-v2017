@extends('layouts.master')
@section('title', 'All roles')
@section('content')
 @if (Auth::check())
        @if ( Auth::user()->hasRole('administrator'))
            <div class="page-title">                    
		        <h1>Roles</h1>
		    </div>
			<div class="page-content-wrap">
				<div class="row">
			        <div class="col-md-12">
				         @include('layouts.includes.status')
			            <div class="panel panel-default">
			                <div class="panel-body">
                            @if ($roles->isEmpty())
                                <p> There is no role.</p>
                            @else
                                <div id="responsive-table">
                                    <table class="col-md-12 table-bordered table-striped table-condensed">
                                        <thead class="cf">
                                            <tr>
                                                <th>Name</th>
                                                <th>Display Name</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($roles as $role)
                                            <tr>
                                                <td>{!! $role->name !!}</td>
                                                <td>{!! $role->display_name !!}</td>
                                                <td>{!! $role->description !!}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                       </div>
	                    </div>
	                </div>
	            </div>
			</div>
        @endif
    @endif
@endsection

