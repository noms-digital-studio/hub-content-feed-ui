<!DOCTYPE html>
<html>
    <head>
		<script src="/js/jquery-1.8.2.min.js"></script>
		<script src="/js/bxslider/jquery.bxslider.min.js"></script>
    <script src="/js/video.min.js"></script>
    <script src="/js/global.js" type="text/javascript"></script>


    <script>
    $(document).ready(function(){
    $("#AboutInfo").hide();
        $("#EpisodeLink").click(function(e){
            e.preventDefault();
            $("#AboutInfo").hide();
            $("#EpisodeInfo").show();
            $(this).addClass("active");
            $("#AboutLink").removeClass("active");
        });
        $("#AboutLink").click(function(e){
            e.preventDefault();
            $("#AboutInfo").show();
            $("#EpisodeInfo").hide();
            $("#EpisodeLink").removeClass("active");
            $(this).addClass("active");
        });
    });
    </script>

    <title>OICSS - @yield('title')</title>
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="/js/bxslider/jquery.bxslider.css" rel="stylesheet" />
    </head>

    <body>
        <div class="container" id="header">
            <h1><a href="/">The Hub</a></h1>

            <div class="row">
              <div class="col-xs-12">
                <ul class="nav-menu">
                  <li>
                    <h2><a href="/">Home</a></h2>
                  </li>
                  <li>
                   <h2><a href="/video" class="active">Video</a></h2>
                  </li>
                  </li>
                  <li>
                   <h2><a href="/radio">Radio</a></h2>
                  </li>
                </ul>
              </div>
            </div>

        </div>

        @yield('top_content')

        <div id="content" class="container">
            @yield('content')
        </div>
    </body>
</html>
