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
    <link rel="stylesheet" type="text/css" href="{{ asset('icons/tabler/webfont/tabler-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{!! asset('styles/fileinput.min.css') !!}" media="all" />
    <link rel="stylesheet" type="text/css" href="{!! asset('styles/select2.min.css') !!}" />
    <link rel="stylesheet" type="text/css" href="{!! asset('styles/buttons.css') !!}" />
    <link rel="stylesheet" type="text/css" href="{!! asset('styles/preloader.css') !!}" />
    <link rel="stylesheet" type="text/css" id="theme" href="{!! asset('atlant/css/jquery/jquery-ui.min.css') !!}" />
    <link rel="stylesheet" type="text/css" id="theme" href="{!! asset('atlant/css/theme-night.css') !!}" />
    <link rel="stylesheet" type="text/css" id="theme" href="{!! asset('atlant/css/blueimp/blueimp-gallery.min.css') !!}" />
    <link rel="stylesheet" type="text/css" href="{!! asset('styles/hover-effect.css') !!}" />
    <link rel="stylesheet" type="text/css" href="{!! asset('styles/main.css') !!}" />
    @yield('styles')
</head>
<body>
<div class="animationload"></div>
<div class="wrapper page-container">
    <div class="page-sidebar">
        @include('layouts.includes.sidebar')
    </div>
    <div class="page-content">
        @include('layouts.includes.navbar')
        @yield('content')
        @include('layouts.includes.footer')
    </div>
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


<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>

<script type="text/javascript" src="{!! asset('atlant/js/plugins.js') !!}"></script>
<script type="text/javascript" src="{!! asset('atlant/js/actions.js') !!}"></script>

@stack('scripts')
<script type="text/javascript">
	$(document).ready(function() {
		$(".animationload").delay(350).fadeOut("slow");
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
