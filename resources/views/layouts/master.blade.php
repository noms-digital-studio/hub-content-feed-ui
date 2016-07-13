<!DOCTYPE html>
<html>
    <head>
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