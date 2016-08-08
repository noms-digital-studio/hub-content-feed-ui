<!DOCTYPE html>
<html>
    <head>
    		<script src="/js/jquery-1.8.2.min.js"></script>
    		<script src="/js/bxslider/jquery.bxslider.min.js"></script>
        <script src="/js/video.min.js"></script>
        <script src="/js/global.js" type="text/javascript"></script>

        <title>OICSS - @yield('title')</title>
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css" />
        <link href="/js/bxslider/jquery.bxslider.css" rel="stylesheet" />
        <link href="/css/sprite.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        @if (Request::is('/') || Request::is('hub/*'))
        @else
        <div class="container" id="header">
            <h1><a href="/">{{ trans('navigation.title') }}</a></h1>

            <div class="row">
        				<div class="col-xs-12">
          					<ul class="nav-menu">
            						<li>
            							  <h2><a href="{{ action('VideosController@showVideoLandingPage') }}" class="active">{{ trans('navigation.video') }}</a></h2>
            						</li>
            						</li>
            						<li>
    							          <h2><a href="/radio">{{ trans('navigation.radio') }}</a></h2>
            						</li>
          					</ul>
        				</div>
            </div>
        </div>
		    @endif

        @yield('top_content')

        <div id="content" class="container">
            @yield('content')
        </div>
    </body>
</html>
