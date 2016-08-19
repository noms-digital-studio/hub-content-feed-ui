<!DOCTYPE html>
<html>
    <head>
    		<script src="/js/jquery-1.8.2.min.js"></script>
    		<script src="/js/bxslider/jquery.bxslider.min.js"></script>
        <script src="/js/video.min.js"></script>
        <script src="/js/global.js" type="text/javascript"></script>
        <script src="/js/jquery.modal.min.js" type="text/javascript" charset="utf-8"></script>

        <title>OICSS - @yield('title')</title>
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css" />
        <link href="/js/bxslider/jquery.bxslider.css" rel="stylesheet" />
        <link href="/css/sprite.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        @if (Request::is('/') || Request::is('hub/*'))
        @else
            @yield('header')
		    @endif

        @yield('top_content')

        <div id="content" class="container">
            @yield('content')
        </div>
    </body>
</html>
