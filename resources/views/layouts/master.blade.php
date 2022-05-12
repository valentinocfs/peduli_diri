<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Peduli Diri</title>

    <link rel="stylesheet" href="{{ asset('') }}dist/assets/css/bootstrap.css">

    <link rel="stylesheet" href="{{ asset('') }}dist/assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="{{ asset('') }}dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('') }}dist/assets/css/app.css">
    <link rel="shortcut icon" href="{{ asset('') }}dist/assets/images/peduli-diri.ico" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            @include('layouts.sidebar')
        </div>
        <div id="main">
            @include('layouts.navbar')

            <div class="main-content container-fluid">
                @yield('content')

            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; Peduli Diri</p>
                    </div>
                    <div class="float-end">
                        {{-- <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a
                                href="http://ahmadsaugi.com">Ahmad Saugi</a></p> --}}
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('') }}dist/assets/js/feather-icons/feather.min.js"></script>
    <script src="{{ asset('') }}dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('') }}dist/assets/js/app.js"></script>

    <script src="{{ asset('') }}dist/assets/vendors/chartjs/Chart.min.js"></script>
    <script src="{{ asset('') }}dist/assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('') }}dist/assets/js/pages/dashboard.js"></script>

    <script src="{{ asset('') }}dist/assets/js/main.js"></script>
</body>

</html>