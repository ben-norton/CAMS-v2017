<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Collections Asset Manager">
    <meta name="author" content="Ben Norton">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{!! asset('images/favicon.ico') !!}" type="image/x-icon" />
    <title>@yield('title')</title>
    <script type="text/javascript" src="{!! asset('js/modernizr.js') !!}"></script>
    <link rel="stylesheet" type="text/css" href="{!! asset('styles/normalize.css') !!}" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Bellefair|Open+Sans">
    <link rel="stylesheet" type="text/css" href="{!! asset('ionicons/css/ionicons.min.css') !!}">
    <link rel="stylesheet" type="text/css" id="theme" href="{!! asset('atlant/css/jquery/jquery-ui.min.css') !!}" />
    <link rel="stylesheet" type="text/css" id="theme" href="{!! asset('atlant/css/theme-default-custom.css') !!}" />
    <link rel="stylesheet" type="text/css" href="{!! asset('styles/main.css') !!}" />
    <link rel="stylesheet" type="text/css" href="{!! asset('styles/frontend.css') !!}" />
    @yield('styles')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
		@include('layouts.auth-bare.auth-sidebar')

<div class="wrapper-auth page-container page-navigation-top wrapper-auth-bare" id="page-wrapper">
		@include('layouts..auth-bare.auth-header')
    <div class="auth-inner-wrapper">
        @yield('content')

    </div>
</div>

<!-- Scripts -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="{!! asset('atlant/js/plugins.js') !!}"></script>
<script type="text/javascript" src="{!! asset('atlant/js/actions.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/auth-slidebar.js') !!}"></script>
@stack('scripts')
</body>
</html>
