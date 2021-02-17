<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fibonacci') }}</title>

    <!-- Favicon -->
    @if(isset($site_info))
        <link href="{{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_info->favicon) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_info->favicon) }}" sizes="128x128" rel="shortcut icon" />
    @else
        <link href="{{ asset('fibonacci/adminpanel/assets/img/dummy/favicon.ico') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('fibonacci/adminpanel/assets/img/dummy/favicon.ico') }}" sizes="128x128" rel="shortcut icon" />

@endif

    <!-- Fonts -->
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('fibonacci/adminpanel/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fibonacci/adminpanel/assets/css/atlantis.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('fibonacci/adminpanel/assets/css/style.css') }}">

</head>
<body class="bg-primary">

<main>
    @yield('content')
</main>

<!--   Core JS Files   -->
<script src="{{ asset('fibonacci/adminpanel/assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('fibonacci/adminpanel/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('fibonacci/adminpanel/assets/js/core/bootstrap.min.js') }}"></script>

</body>
</html>
