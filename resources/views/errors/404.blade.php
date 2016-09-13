<!DOCTYPE html>
<html>
    <head>
        <title>404 Error</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #000;
                display: table;
                font-weight: 100;
                font-family: "Open Sans", sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 180px;
                margin-top: -200px;
                margin-bottom: 15px;
                color: #cccccc;
                display: inline;
            }

            .error {
                font-weight: bold;
                font-size: 25px;
            }

            #back {
                border: 1px solid #b3b3b3;
                padding: 10px 23px;
                background: #fff;
                border-radius: 25px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">4</div>
                <img src="/img/icon-hub-medium.png">
                <div class="title">4</div>
                <div class ="error">Page not found</div>
                <p>The page you are looking for cannot be found.</p>
                <a href ="/"><button id="back">{{ trans('navigation.title') }}</button</a>
            </div>
        </div>
    </body>
</html>
