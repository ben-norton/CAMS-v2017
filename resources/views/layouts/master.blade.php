<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Collections Asset Manager">
    <meta name="author" content="Ben Norton">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link rel="stylesheet" type="text/css" href="{!! asset('styles/tippy.css') !!}" />    
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
@yield('dialogs')
<!-- Scripts -->
<script type="text/javascript" src="{{ asset('vendor/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Datatables -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="{!! asset('js/jszip.min.js') !!}"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- Plugins -->
<script type="text/javascript" src="{!! asset('atlant/js/plugins/icheck/icheck.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('atlant/js/plugins/scrolltotop/scrolltopcontrol.js') !!}"></script>
<script type="text/javascript" src="{!! asset('atlant/js/plugins/tocify/jquery.tocify.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('atlant/js/plugins/blueimp/jquery.blueimp-gallery.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('atlant/js/plugins/bootstrap/bootstrap-datepicker.js') !!}"></script>

<script type="text/javascript" src="{!! asset('atlant/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('atlant/js/plugins/scrolltotop/scrolltopcontrol.js') !!}"></script>

<script type="text/javascript" src="{!! asset('js/select2.full.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/clipboard.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/fileinput.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/fa.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/tippy.min.js') !!}"></script>

<!-- Atlant -->
<!--<script type="text/javascript" src="{!! asset('atlant/js/settings.js') !!}"></script>-->
<script type="text/javascript" src="{!! asset('atlant/js/plugins.js') !!}"></script>
<script type="text/javascript" src="{!! asset('atlant/js/actions.js') !!}"></script>

@stack('scripts')

<script type="text/javascript">

    $(function() {
		var toc = $("#tocify").tocify({context: ".tocify-content", showEffect: "fadeIn",extendPage:false,selectors: "h2, h3, h4" });
    });
    $(document).ready(function() {
        setTimeout(function () {
            $(".animationload").fadeOut(1000);
        }, 1000);

        var clipboard = new Clipboard('.btn-clip');
        $('a[href^="mailto:"]').addClass('email');
        $("input[type='file']").fileinput({
            showUpload: false,
            showPreview: false,
        })
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

    };
	tippy('.tip', {
	  animation: 'fade',
	  size: 'big',
	  duration: 400,
	  arrow: true
	})
</script>
</body>
</html>
