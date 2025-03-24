<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="slide-nav">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-toggle"> 
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
	    	<a class="navbar-brand" href="#">CAMS</a>
		</div>
		<div id="slidemenu">
			<ul class="nav navbar-nav frontend-nav">
				<li><a href="{{ url('/login') }}">Login</a></li>
<!--				<li><a href="{{ url('/register') }}">Register</a></li> -->
				<li class="xn-title">Galleries</li>
				<li class="dropdown">
				 	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Collections<i class="fa fa-caret-down"></i></a>
				  	<ul class="dropdown-menu">
				  		@foreach($collections as $collection)
						   <li><a href="{{ url('/gallery/collection/'.$collection->id) }}">{{ $collection->collection_name }}</a></li>
						@endforeach  
					</ul>
				</li>
				<li class="dropdown">
				 	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Projects <i class="fa fa-caret-down"></i></a>
				  	<ul class="dropdown-menu">
				  		@foreach($projects as $project)
						   <li><a href="{{ url('/gallery/project/'.$project->id) }}">{{ $project->project_name }}</a></li>
						@endforeach
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Asset Types <i class="fa fa-caret-down"></i></a>
					<ul class="dropdown-menu">
						@foreach($assetTypes as $assetType)
							<li><a href="{{ url('/gallery/asset-type/'.$assetType->id) }}">{{ $assetType->name }}</a></li>
						@endforeach

					</ul>
				</li>
				@if(Request::is('/'))
					<li class="active"><a href="{{ url('/') }}">Home</a></li>
				@else
					<li><a href="{{ url('/') }}">Home</a></li>
				@endif



			</ul>
		</div>
	</div>
</div>