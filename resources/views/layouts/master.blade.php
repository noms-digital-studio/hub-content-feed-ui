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
        <div class="video-nav-wrap-{{ $navColour or 'Default' }}">
          <div class="container" id="header">
            <div class="row">
              <div class="col-xs-12">
                <a href="/">
                  <img src="/img/icon-back-white.png" id="return-to-the-hub-arrow">
                    <div id="return-to-the-hub-text">
                      {{ trans('navigation.title') }}
                    </div>
                </a>
              	<h2 class="page-title">
                  <a href="{{ action('VideosController@showVideoLandingPage') }}">
                    <img src="/img/icon-video.png">
                    {{ trans('navigation.video') }}
                  </a>
                </h2>
          		</div>
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
