<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 10px, 20px;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .title {
                font-size: 84px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <h2>Static Page Generator</h2>
                <p>Welcome to the api that enables you to generate static pages like html and markdown.</p>
                <p>The api will enable you create static pages (markdown and html) , store them for you and you can have them anytime.<br/>This is a documentation on how to use it.</p>
                <p>All the response payload is in json format with a format like so;</p>
                <code>
                    {
    'message':
        "response payload here"
}
                </code>
                <div>
                    @markdown($html)
                </div>
            </div>
        </div>
    </body>
</html>
