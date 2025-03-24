<!-- Authentication Horizontal Bar -->

<ul class="x-navigation x-navigation-horizontal x-navigation-auth">
    <li class="xn-logo">
        <a href="{{ url('/') }}">Collections Asset Manager</a>
    </li>
    <li class="xn-mini-logo">
        <a href="{{ url('/') }}">CAMS</a>
    </li>

    @if (Auth::guest())
        <li class="pull-right"><a href="{{ url('/login') }}">Login</a></li>
<!--        <li class="pull-right"><a href="{{ url('/register') }}">Register</a></li> -->
    @else
        <li class="pull-right"><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
    @endif
    @if(!$collections->isEmpty())
        <li class="pull-right">
            <a href="#">Collections</a>
            <ul class="xn-drop-left xn-drop-white animated zoomIn">
                @foreach($collections as $collection)
                   <li><a href="{{ url('/gallery/collection/'.$collection->id) }}">{{ $collection->collection_name }}</a></li>
                @endforeach
            </ul>
        </li>
    @endif
    @if(!$projects->isEmpty())
        <li class="pull-right">
            <a href="#">Projects</a>
            <ul class="xn-drop-left xn-drop-white animated zoomIn">
                @foreach($projects as $project)
                   <li><a href="{{ url('/gallery/project/'.$project->id) }}">{{ $project->project_name }}</a></li>
                @endforeach
            </ul>
        </li>
    @endif
    @if(!$assetTypes->isEmpty())
        <li class="pull-right">
        <a href="#">Asset Types</a>
        <ul class="xn-drop-left xn-drop-white animated zoomIn">
            @foreach($assetTypes as $assetType)
                <li><a href="{{ url('/gallery/asset-type/'.$assetType->id) }}">{{ $assetType->name }}</a></li>
            @endforeach
        </ul>
    </li>
    @endif
    @if(Request::is('/'))
        <li class="active pull-right"><a href="{{ url('/') }}">Home</a></li>
    @else
        <li class="pull-right"><a href="{{ url('/') }}">Home</a></li>
    @endif
</ul>
                
                 