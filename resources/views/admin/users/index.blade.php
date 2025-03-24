@extends('layouts.master')
@section('title', 'All users')
@section('content')
@if (Auth::check())
	@if ( Auth::user()->hasRole('administrator'))
		<div class="col-xs-12">
			<div class="panel panel-default panel-admin">
				<div class="panel-heading">
					<h3 class="pull-left panel-title">Users</h3>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">
					@if ($users->isEmpty())
						<p> There are no users.</p>
					@else
						<div id="responsive-table">
							<table class="col-md-12 table-bordered table-striped table-condensed cf">
								<thead class="cf">
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Joined</th>
										<th>Admin</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)
										<tr>
											<td data-title="Name">{!! $user->fame !!} {!! $user->lname !!}</td>
											<td data-title="Email">{!! $user->email !!}</td>
											<td data-title="Joined">{!! $user->created_at !!}</td>
											<td data-title="Role">
												@foreach($user->roles as $role)
													{{ $loop->first ? '' : ', ' }}
													{{ $role->display_name }}
												@endforeach
											</td>
											<td data-title="Action">
												<a class="btn btn-sm btn-primary" href="{!! action('Admin\UsersController@show', $user->id) !!}"><i class="fa fa-file"></i> Read</a>
												<a class="btn btn-sm btn-warning" href="{!! action('Admin\UsersController@edit', $user->id) !!}" ><i class="fa fa-refresh"></i> Edit</a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					@endif
				</div>
			</div>
		</div>
	@endif
@endif
@endsection

