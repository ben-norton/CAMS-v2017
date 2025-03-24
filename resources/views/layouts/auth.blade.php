<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Collections Digital Asset Manager">
    <meta name="author" content="Ben Norton">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{!! asset('images/favicon.ico') !!}" type="image/x-icon" />
    <title>@yield('title')</title>
    <script type="text/javascript" src="{!! asset('js/modernizr.js') !!}"></script>
    <link rel="stylesheet" type="text/css" href="{!! asset('styles/normalize.css') !!}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Bellefair|Open+Sans">
    <link rel="stylesheet" type="text/css" href="{!! asset('icons/ionicons/css/ionicons.min.css') !!}">
    <link rel="stylesheet" type="text/css" id="theme" href="{!! asset('atlant/css/jquery/jquery-ui.min.css') !!}" />
    <link rel="stylesheet" type="text/css" id="theme" href="{!! asset('atlant/css/theme-default-custom.css') !!}" />
    <link rel="stylesheet" type="text/css" href="{!! asset('styles/main.css') !!}" />
    <link rel="stylesheet" type="text/css" href="{!! asset('styles/frontend.css') !!}" />
    @yield('styles')
</head>
<body>
		@include('layouts.includes.auth-sidebar')

<div class="wrapper-auth page-container page-navigation-top" id="page-wrapper">
		@include('layouts.includes.auth-header')
    <div class="auth-inner-wrapper">
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script type="text/javascript" src="{{ asset('vendor/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{!! asset('atlant/js/plugins.js') !!}"></script>
<script type="text/javascript" src="{!! asset('atlant/js/actions.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/auth-slidebar.js') !!}"></script>
@stack('scripts')
</body>
</html>
