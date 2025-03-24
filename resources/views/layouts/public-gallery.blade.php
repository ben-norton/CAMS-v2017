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
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Bellefair|Open+Sans">
    <link rel="stylesheet" type="text/css" href="{!! asset('icons/ionicons/css/ionicons.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('styles/fileinput.min.css') !!}" media="all" />
    <link rel="stylesheet" type="text/css" href="{!! asset('styles/select2.min.css') !!}" />
    <link rel="stylesheet" type="text/css" href="{!! asset('styles/buttons.css') !!}" />
    <link rel="stylesheet" type="text/css" href="{!! asset('styles/preloader.css') !!}" />
    <link rel="stylesheet" type="text/css" id="theme" href="{!! asset('atlant/css/jquery/jquery-ui.min.css') !!}" />
    <link rel="stylesheet" type="text/css" id="theme" href="{!! asset('atlant/css/theme-night.css') !!}" />
    <link rel="stylesheet" type="text/css" id="theme" href="{!! asset('atlant/css/blueimp/blueimp-gallery.min.css') !!}" />
    <link rel="stylesheet" type="text/css" href="{!! asset('styles/main.css') !!}" />
    <link rel="stylesheet" type="text/css" href="{!! asset('styles/frontend.css') !!}" />
    @yield('styles')
</head>
<body>
    <div class="animationload"></div>

    @include('layouts.includes.auth-sidebar')
<div class="wrapper-auth page-container page-navigation-top" id="page-wrapper">
    @include('layouts.includes.auth-header')
    @yield('content')
    @include('layouts.includes.footer')
</div>

<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>

<script type="text/javascript" src="{{ asset('vendor/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{!! asset('atlant/js/plugins/blueimp/jquery.blueimp-gallery.min.js') !!}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/vue"></script>
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>
<script type="text/javascript" src="{!! asset('atlant/js/plugins.js') !!}"></script>
<script type="text/javascript" src="{!! asset('atlant/js/actions.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/auth-slidebar.js') !!}"></script>
@stack('scripts')
<script type="text/javascript">
	$(document).ready(function () {
		setTimeout(function () {
			$(".animationload").fadeOut(1000);
		}, 1000);
	});
    if(document.getElementById("links")) {
        document.getElementById('links').onclick = function (event) {
            event = event || window.event;
            var target = event.target || event.srcElement;
            var link = target.src ? target.parentNode : target;
            var options = {
                index: link,
                event: event,
                onclosed: function(){
                    setTimeout(function(){
                        $("body").css("overflow","");
                    },200);
                }
            };
            var links = this.getElementsByTagName('a');
            blueimp.Gallery(links, options);
        };

    }
</script>

</body>
</html>
