<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" href="{{ elixir('css/app.css') }}" type="text/css"/>		
		<script src="/js/jquery-1.8.2.min.js"></script>		
		<script src="/js/jquery.bxslider.min.js"></script>		
		<script src="/js/global.js" type="text/javascript"></script>
		<link href="/css/jquery.bxslider.css" rel="stylesheet" />
        <title>OICSS - @yield('title')</title>
    </head>

    <body>
        <div id="header">
            <h1><a href="/">OICSS</a></h1>

            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/video">Video</a></li>
                <li><a href="/radio">Radio</a></li>
            </ul>
        </div>
        <div id="content" class="container">
            @yield('content')
        </div>
    </body>
</html>