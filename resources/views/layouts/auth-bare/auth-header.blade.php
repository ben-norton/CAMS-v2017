<!-- Authentication Horizontal Bar -->

<ul class="x-navigation x-navigation-horizontal x-navigation-auth">
    <li class="xn-logo">
        <a href="{{ url('/') }}">Collections Asset Manager</a>
    </li>
    <li class="xn-mini-logo">
        <a href="{{ url('/') }}">CAMS</a>
    </li>

    @if (Auth::guest())
        @if(Request::is('/login'))
            <li class="pull-right active"><a href="{{ url('/login') }}">Login</a></li>
        @else
            <li class="pull-right"><a href="{{ url('/login') }}">Login</a></li>
        @endif

        @if(Request::is('/register'))
            <!--
                <li class="pull-right active"><a href="{{ url('/register') }}">Register</a></li>
            -->
        @else
            <!--
                <li class="pull-right"><a href="{{ url('/register') }}">Register</a></li>
            -->
        @endif

    @else
        <li class="pull-right"><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
    @endif

    <li class="pull-right"><a href="{{ url('/') }}">Home</a></li>

</ul>
                
                 