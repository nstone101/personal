<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="@if (isset($seo)) {{$seo->site_name}} @endif">
    <meta name="description" content="@if (isset($seo)){{ $seo->site_description }}@endif">
    <meta name="keywords" content="@if (isset($seo)){{ $seo->site_keywords }}@endif">
    <meta name="author" content="elsecolor">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ __('frontend.home') }} @if (isset($seo)) - {{ $seo->site_name }} @endif</title>

    @if (isset($site_infos))
    <!-- Favicon -->
        <link href="{{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_infos->favicon) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_infos->favicon) }}" sizes="128x128" rel="shortcut icon" />
    @endif

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i,800&display=swap&subset=greek-ext,latin-ext" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('fibonacci/frontend/assets/css/frameworks.css') }}">

    <!-- Theme Main CSS -->
    <link rel="stylesheet" href="{{ asset('fibonacci/frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fibonacci/adminpanel/assets/vendor/maintenance-mode/css/style.css') }}">

</head>
<body>

<div class="wrapper">
    <ul class="scene unselectable" data-friction-x="0.1" data-friction-y="0.1" data-scalar-x="25" data-scalar-y="15" id="scene">

        <!-- Start Background -->
        <li class="layer" data-depth="0.10">
            <div class="background">
            </div>
        </li>
        <!-- End Background -->

        <!-- Start Content Styles -->
        <li class="layer" data-depth="0.20">
            <div class="title">
                <h2>
                    @if (isset($seo)) {{ $seo->site_name }} @else FIBONACCI @endif
                </h2>
                <span class="line"></span>
            </div>
        </li>

        <li class="layer" data-depth="0.30">
            <div class="hero">
                <h1>
                    {{ __('frontend.we_are_coming_soon') }}
                </h1>
            </div>
        </li>
        <!-- End Content Styles -->

        <!-- Start Text -->
        <li class="layer" data-depth="0.20">
            <div class="contact">
            @if (isset($site_infos))
                {{ $site_infos->copyright }}
               @else
                    © Copyright. 2020 Powered by ElseColor
                @endif
            </div>
        </li>
        <!-- End Text -->
    </ul>
</div>

@if ($section_arr['preloader'] == 1)
    <div class="preloader-wrap">
        <div class="preloader-inner">
            <div id="loader"></div>
        </div>
    </div>
@endif
<!-- Preloader -->

<!-- Core JS Files -->
<script src="{{ asset('fibonacci/adminpanel/assets/vendor/maintenance-mode/js/jquery.js') }}"></script>
<script src="{{ asset('fibonacci/adminpanel/assets/vendor/maintenance-mode/js/plugins.js') }}"></script>
<script src="{{ asset('fibonacci/adminpanel/assets/vendor/maintenance-mode/js/main.js') }}"></script>

</body>
</html>