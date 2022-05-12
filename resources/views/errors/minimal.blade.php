<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('') }}dist/assets/css/bootstrap.css">
        <link rel="shortcut icon" href="{{ asset('') }}dist/assets/images/peduli-diri.ico" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('') }}dist/assets/css/app.css">

        <title>@yield('title')</title>

    </head>
    <body>
        <div id="error">
            <div class="container text-center pt-32">
                <h1 class='error-title'>404</h1>
                <p>
                    @yield('message')
                </p>
                <div>
                    @yield('content')
                </div>
            </div>
    
            <div class="footer pt-32">
                <p class="text-center">Copyright &copy; Peduli diri 2020</p>
            </div>
        </div>
    </body>
</html>
