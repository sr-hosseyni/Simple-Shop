<!-- Stored in resources/views/layouts/app.blade.php -->

<html>
    <head>
        <title>BCS - @yield('title')</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="css/app.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    @yield('content')
                </div>
                <div class="col-sm-4">
                    @section('sidebar')
                    @show
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/app.js"></script>
        <script type="text/javascript" src="js/all.min.js"></script>
    </body>
</html>