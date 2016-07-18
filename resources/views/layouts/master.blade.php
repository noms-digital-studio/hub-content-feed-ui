<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" href="{{ elixir('css/app.css') }}" type="text/css"/>
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

            <div class="header-search">
                <input type="search" id="header-search" name="search" placeholder="Search the content store&hellip;">
            </div>
        </div>

        <div id="content" class="container">
            @yield('content')
        </div>
    </body>
</html>