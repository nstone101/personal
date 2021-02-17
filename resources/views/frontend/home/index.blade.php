<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="@if (isset($seo)){{$seo->site_name}} @endif">
    <meta name="description" content="@if (isset($seo)){{ $seo->site_description }} @endif">
    <meta name="keywords" content="@if (isset($seo)){{ $seo->site_keywords }} @endif">
    <meta name="author" content="elsecolor">
    <meta property="fb:app_id" content="@if (isset($seo)){{ $seo->fb_app_id }} @endif">
    <meta property="og:title" content="@if (isset($seo)){{ $seo->site_name }} @endif">
    <meta property="og:url" content="@if (isset($seo)){{ url()->current() }} @endif">
    <meta property="og:description" content="@if (isset($seo)){{ $seo->site_description }} @endif">
    <meta property="og:image" content="@if (isset($site_infos)){{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_infos->favicon) }} @endif">
    <meta itemprop="image" content="@if (isset($site_infos)){{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_infos->favicon) }} @endif">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="@if (isset($site_infos)){{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_infos->favicon) }} @endif">
    <meta property="twitter:title" content="@if (isset($seo)){{ $seo->site_name }} @endif">
    <meta property="twitter:description" content="@if (isset($seo)){{ $seo->site_description }} @endif">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ __('frontend.home') }} @if (isset($seo)) - {{ $seo->site_name }} @endif</title>

    @if (isset($site_infos))
    <!-- Favicon -->
        <link href="{{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_infos->favicon) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_infos->favicon) }}" sizes="128x128" rel="shortcut icon" />
    @endif

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('fibonacci/frontend/assets/fonts/flat_icons/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('fibonacci/frontend/assets/fonts/font_awesome/css/all.css') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i,800&display=swap&subset=greek-ext,latin-ext" rel="stylesheet">
    @if ($section_arr['rtl_mode'] == 1)
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    @endif

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('fibonacci/frontend/assets/css/frameworks.css') }}">

    <!-- Theme Main CSS -->
    <link rel="stylesheet" href="{{ asset('fibonacci/frontend/assets/css/style.css') }}">
    @if ($section_arr['rtl_mode'] == 1)
        <link rel="stylesheet" href="{{ asset('fibonacci/frontend/assets/css/rtl.css') }}">
        @endif

    @if (isset($color_picker))
        <style>
            .hero-section .hero-section-inner .hero-title {
                color: {{ $color_picker->color_code }};
            }
            .default-button {
                background: {{ $color_picker->color_code }};
            }
            .default-button:hover {
                background: {{ $color_picker->color_code }};
            }

            .outline-button {
                color: {{ $color_picker->color_code }};
            }

            .down-scroll {
                background: {{ $color_picker->color_code }};
            }

            .about-inner .about-title b {
                color: {{ $color_picker->color_code }};
            }
            .scroll-top-btn {
                background: {{ $color_picker->color_code }};
            }

            .section .section-heading .section-title span {
                color: {{ $color_picker->color_code }};
            }
            .section .section-heading .section-title:after, .section .section-heading .section-title:before {
                background: {{ $color_picker->color_code }};
            }
            .about-image-pattern:before {
                background: {{ $color_picker->color_code }};
            }
            .resume-tab-content .experience-item .experience-item-inner .experience-item-header i {
                background: {{ $color_picker->color_code }};
            }
            .resume-tab-content .experience-item .experience-item-inner .experience-item-body .experience-date {
                color: {{ $color_picker->color_code }};
            }
            .skills-inner .skills-title b {
                color: {{ $color_picker->color_code }};
            }
            .skills-image .skills-image-pattern:before {
                background: {{ $color_picker->color_code }};
            }
            .skills-progress-wrap .skills-item .skills-progress-bar .skills-progress-value {
                background: {{ $color_picker->color_code }};
            }
            .counters-wrap .counter-item .counter-body i {
                background: {{ $color_picker->color_code }};
            }
            .services-box .services-box-body > i {
                background: {{ $color_picker->color_code }};
            }
            .services-box .services-box-body .services-more-link {
                background: {{ $color_picker->color_code }};
            }
            .services-box .services-box-body .services-more-link:hover {
                background: {{ $color_picker->color_code }};
            }
            .portfolio-filter-wrap .portfolio-filter a.current {
                background: {{ $color_picker->color_code }};
            }
            .portfolio-filter-wrap .portfolio-filter a.current:after {
                background-color: {{ $color_picker->color_code }};
            }
            .portfolio-filter-wrap .portfolio-filter a:after {
                background-color: {{ $color_picker->color_code }};
            }
            .portfolio-filter-wrap .portfolio-filter a {
                border: 2px solid {{ $color_picker->color_code }};
            }
            .glry-item .portfolio-back .portfolio-buttons a {
                color: {{ $color_picker->color_code }};
            }
            .team-card .team-body .team-social a:hover {
                background: {{ $color_picker->color_code }};
            }
            .banner-wrap {
                background: {{ $color_picker->color_code }};
            }
            .testimonial-item .testimonial-item-body .testimonial-details > span {
                color: {{ $color_picker->color_code }};
            }
            .testimonial-item .testimonial-item-body .testimonial-rating i {
                color: {{ $color_picker->color_code }};
            }
            .team-card .team-body span {
                color: {{ $color_picker->color_code }};
            }
            .team-card .team-body .team-social a {
                background: {{ $color_picker->color_code }};
            }
            .blog-item .blog-inner > .blog-meta span i {
                color: {{ $color_picker->color_code }};
            }
            .blog-item .blog-inner .blog-title > a:hover {
                color: {{ $color_picker->color_code }};
            }
            .blog-item .blog-inner .blog-more-link:hover {
                background: {{ $color_picker->color_code }};
            }
            .blog-item .blog-inner .blog-more-link {
                background: {{ $color_picker->color_code }};
            }
            .header .nav-link.active::after {
                background-color: {{ $color_picker->color_code }};
            }
            .header .nav-link:not(.active)::after {
                background-color: {{ $color_picker->color_code }};
            }
            .about-inner .about-video-btn {
                background: {{ $color_picker->color_code }};
            }
            .about-inner .about-video-btn:hover {
                background: {{ $color_picker->color_code }};
            }
            .footer .footer-top .footer-social li .footer-social-link {
                background: {{ $color_picker->copyright_code }};
            }
            .footer .footer-top .footer-social li .footer-social-link:hover {
                background: {{ $color_picker->color_code }};
            }
            .footer {
                background: {{ $color_picker->footer_color_code }};
            }
            .footer .copyright {
                background: {{ $color_picker->copyright_code }};
            }
            .preloader-wrap .preloader-inner #loader {
                border-top-color: {{ $color_picker->color_code }};
                border-right-color: {{ $color_picker->color_code }};
            }
            .select-button {
                background: {{ $color_picker->color_code }};
            }
            .glry-item .portfolio-inner .project-title span {
                color: {{ $color_picker->color_code }};
            }
            .glry-item .portfolio-back .portfolio-buttons a {
                color: {{ $color_picker->color_code }};
            }
            .pagination-wrap .pagination-link:hover, .pagination-wrap .pagination-link.active {
                background: {{ $color_picker->color_code }};
            }
            .pagination .page-item.active .page-link,
            .pagination .page-item:hover .page-link  {
                background: {{ $color_picker->color_code }};
            }
            .pagination .page-link.active {
                background: {{ $color_picker->color_code }};
            }
            .header .nav-btn-item .nav-btn:hover {
                color: {{ $color_picker->color_code }};
            }
            .header .nav-item.dropdown .dropdown-menu .dropdown-item:hover {
                background: {{ $color_picker->color_code }};
                border-bottom-color: {{ $color_picker->color_code }};
            }
            .header .nav-item:hover > a {
                color: {{ $color_picker->color_code }};
            }
            .header .nav-item .nav-link:after {
                background: {{ $color_picker->color_code }};
            }
            .header .nav-item .nav-link:not(.active):after {
                background: {{ $color_picker->color_code }};
            }
            .header-shrink .nav-item .nav-link.active, .header-shrink .nav-item .nav-link:hover {
                color: {{ $color_picker->color_code }};
            }
            .header.header-shrink .nav-btn-item .nav-btn {
                color: {{ $color_picker->color_code }};
            }

            .header.header-shrink .nav-btn-item .nav-btn:hover {
                background: {{ $color_picker->color_code }};
                color: #fff!important;
            }
            .header.header-shrink .nav-btn-item .nav-btn {
                color: {{ $color_picker->color_code }};
                border: 2px solid {{ $color_picker->color_code }};
            }
            .header .nav-item:hover > a {
                color: {{ $color_picker->color_code }}!important;
            }

            /* ---------------------------------------------------------------- */
            /* Responsive Media Query
             * Medium devices (tablets, less than 992px)
            /* ---------------------------------------------------------------- */
            @media only screen and (max-width: 991.98px) {
                .header .nav-btn-item .nav-btn {
                    color: {{ $color_picker->color_code }};
                    border: 2px solid {{ $color_picker->color_code }};
                }
                .header .main-menu .navbar-nav .nav-link.active {
                    background: {{ $color_picker->color_code }};
                    border-color: {{ $color_picker->color_code }};
                }
                .header .main-menu .navbar-nav .nav-link:not(.active):hover {
                    background: {{ $color_picker->color_code }};
                    border-color: {{ $color_picker->color_code }};
                }
                .header .main-menu .nav-item .dropdown-menu .dropdown-item:hover {
                    background: {{ $color_picker->color_code }};
                }
                /* Header Shrink */
                .header-shrink .nav-item:hover .nav-link {
                    color: {{ $color_picker->color_code }};
                }
                .header-shrink .nav-item .nav-link.active, .header-shrink .nav-item .nav-link:hover {
                    color: {{ $color_picker->color_code }};
                }
                .header-shrink .nav-item .nav-link:after {
                    background: {{ $color_picker->color_code }};
                }
                .header-shrink .nav-item .nav-link:not(.active):after {
                    background: {{ $color_picker->color_code }};
                }
                .header .nav-btn-item .nav-btn {
                    color: {{ $color_picker->color_code }};
                    border: 2px solid {{ $color_picker->color_code }};
                }
                .header .nav-btn-item .nav-btn:hover {
                    background: {{ $color_picker->color_code }};
                }
            }
            @-webkit-keyframes pulseOrange {
                0% {
                    -webkit-box-shadow: 0 0 0 0 rgba({{ $color_picker->rgba }}, 0.4);
                    box-shadow: 0 0 0 0 rgba({{ $color_picker->rgba }}, 0.4);
                }
                70% {
                    -webkit-box-shadow: 0 0 0 20px rgba({{ $color_picker->rgba }}, 0);
                    box-shadow: 0 0 0 20px rgba({{ $color_picker->rgba }}, 0);
                }
                100% {
                    -webkit-box-shadow: 0 0 0 0 rgba({{ $color_picker->rgba }}, 0);
                    box-shadow: 0 0 0 0 rgba({{ $color_picker->rgba }}, 0);
                }
            }

            @keyframes pulseOrange {
                0% {
                    -webkit-box-shadow: 0 0 0 0 rgba({{ $color_picker->rgba }}, 0.4);
                    box-shadow: 0 0 0 0 rgba({{ $color_picker->rgba }}, 0.4);
                }
                70% {
                    -webkit-box-shadow: 0 0 0 20px rgba({{ $color_picker->rgba }}, 0);
                    box-shadow: 0 0 0 20px rgba({{ $color_picker->rgba }}, 0);
                }
                100% {
                    -webkit-box-shadow: 0 0 0 0 rgba({{ $color_picker->rgba }}, 0);
                    box-shadow: 0 0 0 0 rgba({{ $color_picker->rgba }}, 0);
                }
            }

            @-webkit-keyframes scrollPulse {
                0% {
                    -webkit-box-shadow: 0 0 0 0 rgba({{ $color_picker->rgba }}, 0.4);
                    box-shadow: 0 0 0 0 rgba({{ $color_picker->rgba }}, 0.4);
                }
                70% {
                    -webkit-box-shadow: 0 0 0 10px rgba({{ $color_picker->rgba }}, 0);
                    box-shadow: 0 0 0 10px rgba({{ $color_picker->rgba }}, 0);
                }
                100% {
                    -webkit-box-shadow: 0 0 0 0 rgba({{ $color_picker->rgba }}, 0);
                    box-shadow: 0 0 0 0 rgba({{ $color_picker->rgba }}, 0);
                }
            }

            @keyframes scrollPulse {
                0% {
                    -webkit-box-shadow: 0 0 0 0 rgba({{ $color_picker->rgba }}, 0.4);
                    box-shadow: 0 0 0 0 rgba({{ $color_picker->rgba }}, 0.4);
                }
                70% {
                    -webkit-box-shadow: 0 0 0 10px rgba({{ $color_picker->rgba }}, 0);
                    box-shadow: 0 0 0 10px rgba({{ $color_picker->rgba }}, 0);
                }
                100% {
                    -webkit-box-shadow: 0 0 0 0 rgba({{ $color_picker->rgba }}, 0);
                    box-shadow: 0 0 0 0 rgba({{ $color_picker->rgba }}, 0);
                }
            }

        </style>
        @endif

    @if (isset($google_analytic))
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $google_analytic->google_analytic_code }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ $google_analytic->google_analytic_code }}');
        </script>
    @endif

</head>
<body @if ($section_arr['rtl_mode'] == 1) class="rtl" @endif data-spy="scroll" data-target="#fixedNavbar">

<!-- Page Wrapper Start -->
<div class="page-wrapper">

    <!-- Header Start -->
    <header class="header fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg p-0">
                <a class="navbar-brand" href="{{ url('/') }}">
                    @if (isset($site_infos))
                        <img src="{{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_infos->white_logo) }}" alt="logo icon" class="img-fluid logo-transparent">
                        <img src="{{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_infos->colored_logo) }}" alt="logo icon" class="img-fluid logo-normal">
                    @else
                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/icon/logo_white.png') }}" alt="logo icon" class="img-fluid logo-transparent">
                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/icon/logo_black.png') }}" alt="logo icon" class="img-fluid logo-normal">
                    @endif
                </a>
                <!-- .logo -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fixedNavbar" aria-controls="fixedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="togler-icon-inner">
                            <span class="line-1"></span>
                        <span class="line-2"></span>
                        <span class="line-3"></span>
                        </span>
                </button>
                <div class="collapse navbar-collapse main-menu justify-content-end" id="fixedNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" data-scroll-nav="1">{{ __('frontend.home') }}</a>
                        </li>
                        @if ($section_arr['about_me'] == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-scroll-nav="2">{{ __('frontend.about') }}</a>
                            </li>
                            @endif
                        @if ($section_arr['services'] == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-scroll-nav="3">{{ __('frontend.services') }}</a>
                        </li>
                        @endif
                        @if ($section_arr['works'] == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-scroll-nav="4">{{ __('frontend.portfolio') }}</a>
                        </li>
                        @endif
                        @if ($section_arr['clients'] == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-scroll-nav="5">{{ __('frontend.testimonial') }}</a>
                        </li>
                        @endif
                        @if ($section_arr['gallery'] == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-scroll-nav="6">{{ __('frontend.gallery') }}</a>
                            </li>
                        @endif
                        @if ($section_arr['blogs'] == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-scroll-nav="7">{{ __('frontend.blog') }}</a>
                        </li>
                        @endif
                        @if ($section_arr['contact'] == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-scroll-nav="8">{{ __('frontend.contact') }}</a>
                        </li>
                            @endif
                        @if ($section_arr['pages'] == 1)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('frontend.pages') }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="pagesDropdownMenu">
                                    @foreach ($any_pages as $any_page)
                                        <a class="dropdown-item" href="{{ url('page/'.$any_page->slug) }}">{{ $any_page->page_title }}</a>
                                        @endforeach
                                </div>
                            </li>
                        @endif
                        @if (isset($external_url))
                            @if ($external_url->status == 1)
                                <li class="nav-item nav-btn-item">
                                    <a class="nav-btn" href="{{$external_url->btn_link}}">{{ $external_url->btn_name }}</a>
                                </li>
                            @endif
                            @endif
                    </ul>
                </div>
            </nav>
            <!-- .navbar-nav -->
        </div>
        <!-- .container -->
    </header>
    <!-- Header End -->

    <!-- Main Start -->
    <main class="site-main" id="mainWrapper">

        <!-- Hero Section Start -->
        @if (isset($homepage_version))
            @if ($homepage_version->choose_version == 1)
                <section class="hero-section flex-box-center" data-scroll-index="1"  style="background-image: url({{ asset('fibonacci/adminpanel/assets/img/bg/'.$static_view->static_image) }});">
                    <div class="container">
                        @if (isset($fixed_content))
                            <div class="row hero-row align-items-center">
                                <div class="col-lg-7 col-xl-6">
                                    <div class="hero-section-inner wow fadeInUp" data-wow-delay="0.1s">
                                        <h1 class="hero-title">{{ $fixed_content->colored_title }} <br><span id="typed-text"></span></h1>
                                        <p class="hero-text">{{ $fixed_content->description }}</p>
                                        <div class="btn-group">
                                            <a href="#" data-scroll-nav="8" class="default-button">{{ __('frontend.hire_me') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                        @else
                            <div class="row hero-row align-items-center h-100">
                                <div class="col-lg-7 col-xl-6">
                                    <div class="hero-section-inner wow fadeInUp" data-wow-delay="0.1s">
                                        <h1 class="hero-title">I'm <br><span id="typed-text"></span></h1>
                                        <p class="hero-text">I work freelance. Sometimes you want to implement the projects you want.
                                            You don't want to make mistakes because time is valuable.
                                            I can advance you and your brand with my ideas.</p>
                                        <div class="btn-group">
                                            <a href="#" data-scroll-nav="8" class="default-button">{{ __('Hire Me') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                        @endif
                    </div>
                    <!-- .container -->
                    <a href="#" data-scroll-nav="2" class="down-scroll wow zoomIn">
                        <i class="fa fa-arrow-down"></i>
                    </a>
                </section>
            @elseif ($homepage_version->choose_version == 2)
                <section class="hero-section jarallax flex-box-center hero-slider-wrap" id="heroSliderContainer" data-scroll-index="1">
                    <div class="container h-100">
                        @if (isset($fixed_content))
                            <div class="row hero-row align-items-center h-100">
                                <div class="col-lg-7 col-xl-6">
                                    <div class="hero-section-inner wow fadeInUp" data-wow-delay="0.1s">
                                        <h1 class="hero-title">{{ $fixed_content->colored_title }} <br><span id="typed-text-slider"></span></h1>
                                        <p class="hero-text">{{ $fixed_content->description }}</p>
                                        <div class="btn-group">
                                            <a href="#" data-scroll-nav="8" class="default-button">{{ __('frontend.hire_me') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                        @else
                            <div class="row hero-row align-items-center h-100">
                                <div class="col-lg-7 col-xl-6">
                                    <div class="hero-section-inner wow fadeInUp" data-wow-delay="0.1s">
                                        <h1 class="hero-title">I'm <br><span id="typed-text-slider"></span></h1>
                                        <p class="hero-text">I work freelance. Sometimes you want to implement the projects you want.
                                            You don't want to make mistakes because time is valuable.
                                            I can advance you and your brand with my ideas.</p>
                                        <div class="btn-group">
                                            <a href="#" data-scroll-nav="8" class="default-button">{{ __('Hire Me') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                            @endif
                    </div>
                    <!-- .container -->
                    <a href="#" data-scroll-nav="2" class="down-scroll wow zoomIn">
                        <i class="fa fa-arrow-down"></i>
                    </a>
                </section>
            @elseif ($homepage_version->choose_version == 3)
                <section class="hero-section flex-box-center hero_video"
                         @if (isset($static_view))
                         style="background-image: url({{ asset('fibonacci/adminpanel/assets/img/bg/'.$static_view->static_image) }});"
                         @else
                         style="background-image: url({{ asset('fibonacci/adminpanel/assets/img/dummy/1920x1080.png') }});"
                         @endif
                         data-scroll-index="1">
                    <div id="video-background" class="player bg-overlay" data-property="{videoURL:'{{ $video_view->video_link }}',containment:'.hero_video',showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}"></div>
                    <div class="hero-overlay"></div>
                    <div class="container video-content">
                        @if (isset($fixed_content))
                            <div class="row hero-row align-items-center">
                                <div class="col-lg-7 col-xl-6">
                                    <div class="hero-section-inner wow fadeInUp" data-wow-delay="0.1s">
                                        <h1 class="hero-title">{{ $fixed_content->colored_title }} <br><span id="typed-text"></span></h1>
                                        <p class="hero-text">{{ $fixed_content->description }}</p>
                                        <div class="btn-group">
                                            <a href="#"  data-scroll-nav="8" class="default-button">{{ __('frontend.hire_me') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                        @else
                            <div class="row hero-row align-items-center h-100">
                                <div class="col-lg-7 col-xl-6">
                                    <div class="hero-section-inner wow fadeInUp" data-wow-delay="0.1s">
                                        <h1 class="hero-title">I'm <br><span id="typed-text"></span></h1>
                                        <p class="hero-text">I work freelance. Sometimes you want to implement the projects you want.
                                            You don't want to make mistakes because time is valuable.
                                            I can advance you and your brand with my ideas.</p>
                                        <div class="btn-group">
                                            <a href="#" data-scroll-nav="8" class="default-button">{{ __('Hire Me') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                        @endif
                    </div>
                    <!-- .container -->
                    <a href="#" data-scroll-nav="2" class="down-scroll wow zoomIn">
                        <i class="fa fa-arrow-down"></i>
                    </a>
                </section>
            @elseif ($homepage_version->choose_version == 4)
                <section class="hero-section flex-box-center" data-scroll-index="1" style="background-image: url({{ asset('fibonacci/adminpanel/assets/img/bg/'.$static_view->static_image) }});">
                    <div id="heroparticles"></div>
                    <div class="container">
                        @if (isset($fixed_content))
                            <div class="row hero-row align-items-center">
                                <div class="col-lg-7 col-xl-6">
                                    <div class="hero-section-inner wow fadeInUp" data-wow-delay="0.1s">
                                        <h1 class="hero-title">{{ $fixed_content->colored_title }} <br><span id="typed-text"></span></h1>
                                        <p class="hero-text">{{ $fixed_content->description }}</p>
                                        <div class="btn-group">
                                            <a href="#" data-scroll-nav="8" class="default-button">{{ __('frontend.hire_me') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                        @else
                            <div class="row hero-row align-items-center h-100">
                                <div class="col-lg-7 col-xl-6">
                                    <div class="hero-section-inner wow fadeInUp" data-wow-delay="0.1s">
                                        <h1 class="hero-title">I'm <br><span id="typed-text"></span></h1>
                                        <p class="hero-text">I work freelance.Sometimes you want to implement the projects you want.
                                            You don't want to make mistakes because time is valuable.
                                            I can advance you and your brand with my ideas.</p>
                                        <div class="btn-group">
                                            <a href="#" data-scroll-nav="8" class="default-button">{{ __('Hire Me') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                        @endif
                    </div>
                    <!-- .container -->
                    <a href="#" data-scroll-nav="2" class="down-scroll wow zoomIn">
                        <i class="fa fa-arrow-down"></i>
                    </a>
                </section>
            @elseif ($homepage_version->choose_version == 5)
                <section class="hero-section bg-jarallax-overlay  hero-ripless-banner flex-box-center" style="background-image: url('{{ asset('fibonacci/adminpanel/assets/img/bg/'.$static_view->static_image) }}');" data-scroll-index="1">
                    <div class="container">
                        @if (isset($fixed_content))
                            <div class="row hero-row align-items-center">
                                <div class="col-lg-7 col-xl-6">
                                    <div class="hero-section-inner wow fadeInUp" data-wow-delay="0.1s">
                                        <h1 class="hero-title">{{ $fixed_content->colored_title }} <br><span id="typed-text"></span></h1>
                                        <p class="hero-text">{{ $fixed_content->description }}</p>
                                        <div class="btn-group">
                                            <a href="#" data-scroll-nav="8" class="default-button">{{ __('frontend.hire_me') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                        @else
                            <div class="row hero-row align-items-center h-100">
                                <div class="col-lg-7 col-xl-6">
                                    <div class="hero-section-inner wow fadeInUp" data-wow-delay="0.1s">
                                        <h1 class="hero-title">I'm <br><span id="typed-text"></span></h1>
                                        <p class="hero-text">I work freelance. Sometimes you want to implement the projects you want.
                                            You don't want to make mistakes because time is valuable.
                                            I can advance you and your brand with my ideas.</p>
                                        <div class="btn-group">
                                            <a href="#" data-scroll-nav="8" class="default-button">{{ __('Hire Me') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                        @endif
                    </div>
                    <!-- .container -->
                    <a href="#" data-scroll-nav="2" class="down-scroll wow zoomIn">
                        <i class="fa fa-arrow-down"></i>
                    </a>
                </section>
            @elseif ($homepage_version->choose_version == 6)
                <section class="hero-section glitch-img-banner flex-box-center" data-scroll-index="1">
                    <div class="overlay-glitch"></div>
                    <div class="container">
                        @if (isset($fixed_content))
                            <div class="row hero-row align-items-center">
                                <div class="col-lg-7 col-xl-6">
                                    <div class="hero-section-inner wow fadeInUp" data-wow-delay="0.1s">
                                        <h1 class="hero-title">{{ $fixed_content->colored_title }} <br><span id="typed-text"></span></h1>
                                        <p class="hero-text">{{ $fixed_content->description }}</p>
                                        <div class="btn-group">
                                            <a href="#" data-scroll-nav="8" class="default-button">{{ __('frontend.hire_me') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                        @else
                            <div class="row hero-row align-items-center h-100">
                                <div class="col-lg-7 col-xl-6">
                                    <div class="hero-section-inner wow fadeInUp" data-wow-delay="0.1s">
                                        <h1 class="hero-title">I'm <br><span id="typed-text"></span></h1>
                                        <p class="hero-text">I work freelance. Sometimes you want to implement the projects you want.
                                            You don't want to make mistakes because time is valuable.
                                            I can advance you and your brand with my ideas.</p>
                                        <div class="btn-group">
                                            <a href="#" data-scroll-nav="8" class="default-button">{{ __('Hire Me') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                        @endif
                    </div>
                    <!-- .container -->
                    <a href="#" data-scroll-nav="2" class="down-scroll wow zoomIn">
                        <i class="fa fa-arrow-down"></i>
                    </a>
                    <div class="glitch-img" style="background-image: url('{{ asset('fibonacci/adminpanel/assets/img/bg/'.$static_view->static_image) }}');"></div>
                </section>
            @else
            <!-- Featured Blog Start -->
                @if (count($featured_posts) > 0)
                    <section class=" blog" data-scroll-index="1">
                        <div class="container-fluid pr-0 pl-0">
                            <!-- .row -->
                            <div class="blogs-carousel owl-carousel owl-theme">
                                @foreach ($featured_posts as $featured_post)
                                    <div class="item">
                                        <div class="latest-blog-resp">
                                            <div class="blog-item position-relative">
                                                <div class="blog-img position-relative rounded-0">
                                                    <div class="bg-overlay"></div>
                                                    <a href="{{ url('blog/'.$featured_post->slug) }}">
                                                        @if  ($featured_post->blog_image == '')
                                                            <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/no_image.jpg') }}" class="img-fluid round-item" alt="blog image">
                                                        @else
                                                            <img src="{{ asset('fibonacci/adminpanel/assets/img/blog/thumbnail1/'.$featured_post->blog_image) }}" class="img-fluid round-item" alt="blog image">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="blog-inner featured-blog-inner">
                                                    <div class="blog-meta">
                                                        <span class="mr-2 text-white"><i class="mdi mdi-calendar-account-outline text-white"></i>{{ __('frontend.by_admin')  }}</span>
                                                        <span class="text-white"><i class="mdi mdi-calendar-range text-white"></i>{{Carbon\Carbon::parse($featured_post->created_at)->isoFormat('MMMM')}} {{Carbon\Carbon::parse($featured_post->created_at)->isoFormat('DD')}}</span>
                                                    </div>
                                                    <h5 class="blog-title text-white">
                                                        <a href="{{ url('blog/'.$featured_post->slug) }}" class="text-white">{{ $featured_post->title }}</a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                @else
                    <section class=" blog" data-scroll-index="1">
                        <div class="container-fluid pr-0 pl-0">
                            <!-- .row -->
                            <div class="blogs-carousel owl-carousel owl-theme">
                                <div class="item">
                                    <div class="latest-blog-resp">
                                        <div class="blog-item position-relative">

                                            <div class="blog-img position-relative rounded-0">
                                                <div class="bg-overlay"></div>
                                                <a href="#">
                                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/600x400.png') }}" class="img-fluid round-item" alt="blog image">
                                                </a>
                                            </div>
                                            <div class="blog-inner featured-blog-inner">
                                                <div class="blog-meta">
                                                    <span class="mr-2 text-white"><i class="mdi mdi-calendar-account-outline text-white"></i>By Admin</span>
                                                    <span class="text-white"><i class="mdi mdi-calendar-range text-white"></i>April 14</span>
                                                </div>
                                                <h5 class="blog-title text-white">
                                                    <a href="#" class="text-white">2020's best portfolio examples</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="latest-blog-resp">
                                        <div class="blog-item position-relative">

                                            <div class="blog-img position-relative rounded-0">
                                                <div class="bg-overlay"></div>
                                                <a href="#">
                                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/600x400.png') }}" class="img-fluid round-item" alt="blog image">
                                                </a>
                                            </div>
                                            <div class="blog-inner featured-blog-inner">
                                                <div class="blog-meta">
                                                    <span class="mr-2 text-white"><i class="mdi mdi-calendar-account-outline text-white"></i>By Admin</span>
                                                    <span class="text-white"><i class="mdi mdi-calendar-range text-white"></i>April 14</span>
                                                </div>
                                                <h5 class="blog-title text-white">
                                                    <a href="#" class="text-white">8 Design Principle Samples.</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="latest-blog-resp">
                                        <div class="blog-item position-relative">
                                            <div class="blog-img position-relative rounded-0">
                                                <div class="bg-overlay"></div>
                                                <a href="#">
                                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/600x400.png') }}" class="img-fluid round-item" alt="blog image">
                                                </a>
                                            </div>
                                            <div class="blog-inner featured-blog-inner">
                                                <div class="blog-meta">
                                                    <span class="mr-2 text-white"><i class="mdi mdi-calendar-account-outline text-white"></i>By Admin</span>
                                                    <span class="text-white"><i class="mdi mdi-calendar-range text-white"></i>April 14</span>
                                                </div>
                                                <h5 class="blog-title text-white">
                                                    <a href="#" class="text-white">Logo Design And Card Mockup.</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .container-fluid -->
                    </section>
                @endif
            <!-- Featured Blog End -->
            @endif
        @else
            <section class="hero-section flex-box-center" data-scroll-index="1" style="background-image: url({{ asset('fibonacci/adminpanel/assets/img/dummy/1920x1080.png') }});">
                <div class="container">
                    @if (isset($fixed_content))
                        <div class="row hero-row align-items-center">
                            <div class="col-lg-7 col-xl-6">
                                <div class="hero-section-inner wow fadeInUp" data-wow-delay="0.1s">
                                    <h1 class="hero-title">{{ $fixed_content->colored_title }} <br><span id="typed-text"></span></h1>
                                    <p class="hero-text">{{ $fixed_content->description }}</p>
                                    <div class="btn-group">
                                        <a href="#" data-scroll-nav="8" class="default-button">{{ __('frontend.hire_me') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    @else
                        <div class="row hero-row align-items-center h-100">
                            <div class="col-lg-7 col-xl-6">
                                <div class="hero-section-inner wow fadeInUp" data-wow-delay="0.1s">
                                    <h1 class="hero-title">I'm <br><span id="typed-text"></span></h1>
                                    <p class="hero-text">I work freelance. Sometimes you want to implement the projects you want.
                                        You don't want to make mistakes because time is valuable.
                                        I can advance you and your brand with my ideas.</p>
                                    <div class="btn-group">
                                        <a href="#" data-scroll-nav="8" class="default-button">{{ __('Hire Me') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    @endif
                </div>
                <!-- .container -->
                <a href="#" data-scroll-nav="2" class="down-scroll wow zoomIn">
                    <i class="fa fa-arrow-down"></i>
                </a>
            </section>
        @endif
        <!-- Hero Section End -->

        <!-- Special Start -->
        @if ($section_arr['special_section'] == 1)
            @foreach ($special_sections as $special_section)
                <section class="section">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-7">
                                <div class="section-heading mb-0">
                                        @php
                                            // Explode
                                             $str = $special_section->title;
                                             $arr =  explode(" ", $str);
                                        @endphp
                                        <h2 class="section-title">
                                            @for ($i = 0; $i < count($arr); $i++)
                                                @if ($i == 0  )
                                                    {{ $arr[0] }}
                                                @else
                                                    <span class="m-0">{{ $arr[$i] }} </span>
                                                @endif
                                            @endfor
                                        </h2>
                                        <p class="section-sub-title">@php echo html_entity_decode($special_section->description); @endphp</p>
                                    @if ($special_section->btn_name != '')
                                        <div class="btn-group margin-top-30">
                                            <a href="{{ $special_section->btn_link }}" class="default-button">{{ $special_section->btn_name }}</a>
                                        </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .container -->
                </section>
            @endforeach
        @endif
    <!-- Special End -->

        <!-- About Me Start -->
        @if ($section_arr['about_me'] == 1)
            @if(isset($about_section))
                <section class="about section" data-scroll-index="2">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-lg-6">
                                <div class="about-image-pattern text-center">
                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/about/'.$about_section->about_image) }}" class="img-fluid round-item" alt="about Image">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="about-inner">
                                    <h4 class="about-title">
                                        @php
                                            // Explode
                                            $str = $about_section->title;
                                            $arr = explode(" ", $str);
                                        @endphp
                                        @for ($i = 0; $i < count($arr); $i++)
                                            @if ($i == 0  )
                                                {{ $arr[0] }}
                                            @elseif ($i == 1)
                                                <b>{{ $arr[1] }}</b>
                                            @elseif ($i == 2)
                                                <b>{{ $arr[2] }}</b>
                                            @else
                                                <span>{{ $arr[$i] }}</span>
                                            @endif
                                        @endfor
                                    </h4>
                                    <p class="about-text">
                                        {{ $about_section->about_me }}
                                    </p>
                                    <ul class="about-list">
                                        @foreach ($about_section_infos as $info)
                                            <li class="d-flex justify-content-between">
                                                <b>{{ $info->name }}</b>
                                                <span>{{ $info->description }}</span>
                                            </li>
                                            @endforeach
                                    </ul>
                                    <div class="btn-group d-flex align-items-center">
                                        @if (isset($about_section->cv_file))
                                            <a href="{{  asset('fibonacci/adminpanel/assets/img/about/'.$about_section->cv_file) }}" class="default-button"  download>{{ __('frontend.download_cv') }}</a>
                                        @endif
                                        @if ($about_section->video_link != '')
                                            <a href="{{ $about_section->video_link }}" class="about-video-btn popup-youtube @if ($about_section->cv_file != '') ml-3 @endif" data-wow-delay="0.5s">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                </section>
            @else
                <section class="about section" data-scroll-index="2">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-lg-6">
                                <div class="about-image-pattern text-center">
                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/520x520.png') }}"  class="img-fluid round-item" alt="about Image">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="about-inner">
                                    <h4 class="about-title">
                                        I'm <b>Leonardo Fibonacci</b>
                                        <span>UI/UX & Designer.</span>
                                    </h4>
                                    <p class="about-text">
                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                        totam rem aperiam, eaque ipsa izuf es quae ab illo  veritatis et quasi beatae
                                        vitae dicta sunt explicabo.
                                    <ul class="about-list">
                                        <li class="d-flex justify-content-between">
                                            <b>{{ __('Name') }}</b>
                                            <span>Leonardo Fibonacci</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <b>{{ __('Age') }}</b>
                                            <span>25</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <b>{{ __('Email') }}</b>
                                            <span>example@gmail.com</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <b>{{ __('Country') }}</b>
                                            <span>ITALY</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <b>{{ __('City') }}</b>
                                            <span>Pisa</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <b>{{ __('Address') }}</b>
                                            <span>Pisa Tower, Piazza del Duomo, 56126 Pisa PI</span>
                                        </li>
                                    </ul>
                                    <div class="btn-group d-flex align-items-center">
                                        <a href="#0" class="default-button">{{ __('Download Cv') }}</a>
                                        <a href="https://www.youtube.com/watch?v=yTHTo28hwTQ" class="about-video-btn popup-youtube ml-3" data-wow-delay="0.5s">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                </section>
            @endif
            @endif
        <!-- About Me End -->

        <!-- Experience Start -->
        @if ($section_arr['resume'] == 1)
        @if(count($resume_boxs) > 0)
            <section class="experience section minus-30">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7">
                            <div class="section-heading">
                                @foreach ($sections as $section)
                                    @if ($section->section === "resume")
                                        @php
                                            // Explode
                                             $str = $section->heading;
                                             $arr =  explode(" ", $str);
                                        @endphp
                                        <h2 class="section-title">
                                            @for ($i = 0; $i < count($arr); $i++)
                                                @if ($i == 0  )
                                                    {{ $arr[0] }}
                                                @else
                                                    <span class="m-0">{{ $arr[$i] }} </span>
                                                @endif
                                            @endfor
                                        </h2>
                                        <p class="section-sub-title">{{ $section->description }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                    <div class="resume-tab-content-wrap">
                        <div class="resume-tab-content">
                            <div class="row justify-content-between">
                                @foreach ($resume_boxs as $resume_box)
                                    <div class="col-md-6 experience-item">
                                        <div class="experience-item-inner">
                                            <div class="experience-item-header">
                                                <i class="{{ $resume_box->icon }}"></i>
                                            </div>
                                            <div class="experience-item-body">
                                                <h5>{{ $resume_box->title }}</h5>
                                                <span class="experience-date">{{ $resume_box->start_year }} / {{ $resume_box->end_year }}</span>
                                                <p>{{ $resume_box->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                            <!-- .row -->
                        </div>
                    </div>
                </div>
                <!-- .container -->
            </section>
            @else
            <section class="experience section minus-30">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7">
                            <div class="section-heading">
                                <h2 class="section-title">My<span>Resume</span></h2>
                                <p class="section-sub-title">
                                    If you are going to use a passage of Lorem Ipsum, you need to
                                    be sure there isn't anything embarrassing hidden in the middle of text.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                    <div class="resume-tab-content-wrap">
                        <div class="resume-tab-content">
                            <div class="row justify-content-between">
                                <div class="col-md-6 experience-item">
                                    <div class="experience-item-inner">
                                        <div class="experience-item-header">
                                            <i class="fab fa-facebook-f facebook-icon"></i>
                                        </div>
                                        <div class="experience-item-body">
                                            <h5>Art Designer</h5>
                                            <span class="experience-date">2014 / 2015</span>
                                            <p>
                                                It is a long established fact that a reader will be distracted
                                                by the readable content of a page when looking at its layout.
                                                The point of using Lorem Ipsum is that it has a more-or-less...
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 experience-item">
                                    <div class="experience-item-inner">
                                        <div class="experience-item-header">
                                            <i class="fab fa-dribbble dribbble-icon"></i>
                                        </div>
                                        <div class="experience-item-body">
                                            <h5>Web Designer</h5>
                                            <span class="experience-date">2015 / 2016</span>
                                            <p>
                                                It is a long established fact that a reader will be distracted
                                                by the readable content of a page when looking at its layout.
                                                The point of using Lorem Ipsum is that it has a more-or-less...
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 experience-item">
                                    <div class="experience-item-inner">
                                        <div class="experience-item-header">
                                            <i class="fab fa-twitter"></i>
                                        </div>
                                        <div class="experience-item-body">
                                            <h5>UI/UX Designer</h5>
                                            <span class="experience-date">2016 / 2017</span>
                                            <p>
                                                It is a long established fact that a reader will be distracted
                                                by the readable content of a page when looking at its layout.
                                                The point of using Lorem Ipsum is that it has a more-or-less...
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 experience-item">
                                    <div class="experience-item-inner">
                                        <div class="experience-item-header">
                                            <i class="fab fa-themeisle"></i>
                                        </div>
                                        <div class="experience-item-body">
                                            <h5>Web Developer</h5>
                                            <span class="experience-date">2017 / 2018</span>
                                            <p>
                                                It is a long established fact that a reader will be distracted
                                                by the readable content of a page when looking at its layout.
                                                The point of using Lorem Ipsum is that it has a more-or-less...
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 experience-item">
                                    <div class="experience-item-inner">
                                        <div class="experience-item-header">
                                            <i class="fab fa-php"></i>
                                        </div>
                                        <div class="experience-item-body">
                                            <h5>Php Programming</h5>
                                            <span class="experience-date">2014 / 2015</span>
                                            <p>
                                                It is a long established fact that a reader will be distracted
                                                by the readable content of a page when looking at its layout.
                                                The point of using Lorem Ipsum is that it has a more-or-less...
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 experience-item">
                                    <div class="experience-item-inner">
                                        <div class="experience-item-header">
                                            <i class="fa fa-code"></i>
                                        </div>
                                        <div class="experience-item-body">
                                            <h5>HTML5 & CSS3</h5>
                                            <span class="experience-date">2015 / 2016</span>
                                            <p>
                                                It is a long established fact that a reader will be distracted
                                                by the readable content of a page when looking at its layout.
                                                The point of using Lorem Ipsum is that it has a more-or-less...
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                        </div>
                    </div>
                </div>
                <!-- .container -->
            </section>
            @endif
            @endif
        <!-- Experience End -->

        <!-- Skills Start -->
        @if ($section_arr['skills'] == 1)
       @if(isset($skill_section))
            <section class="section skills-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xl-7">
                            <div class="section-heading">
                                @foreach ($sections as $section)
                                    @if ($section->section === "skills")
                                        @php
                                            // Explode
                                             $str = $section->heading;
                                             $arr =  explode(" ", $str);
                                        @endphp
                                        <h2 class="section-title">
                                            @for ($i = 0; $i < count($arr); $i++)
                                                @if ($i == 0  )
                                                    {{ $arr[0] }}
                                                @else
                                                    <span class="m-0">{{ $arr[$i] }} </span>
                                                @endif
                                            @endfor
                                        </h2>
                                        <p class="section-sub-title">{{ $section->description }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-6 skills-image">
                            <div class="skills-image-pattern text-center" data-wow-delay="0.25s">
                                <img src="{{ asset('fibonacci/adminpanel/assets/img/skill/'.$skill_section->skill_image) }}" class="img-fluid round-item" alt="skill Image">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6" data-wow-delay="0.3s">
                            <div class="skills-inner">
                                <h4 class="skills-title">
                                    @php
                                        // Explode
                                         $str = $skill_section->title;
                                         $arr =  explode(" ", $str);
                                    @endphp
                                    @for ($i = 0; $i < count($arr); $i++)
                                        @if ($i == 0  )
                                            {{ $arr[0] }}
                                        @elseif ($i == 1)
                                            {{ $arr[1] }}
                                        @elseif ($i == 2)
                                            <b>{{ $arr[2] }}</b>
                                        @else
                                            <span>{{ $arr[$i] }}</span>
                                        @endif
                                    @endfor
                                </h4>
                                <p class="skills-text">{{ $skill_section->description }}</p>
                                <div class="skills-progress-wrap">
                                    @foreach ($skill_items as $skill_item)
                                        <div class="skills-item clearfix">
                                            <div class="skills-item-text">
                                                <h6>{{ $skill_item->text }}<span class="skill-percent"></span></h6>
                                            </div>
                                            <div class="skills-progress-bar">
                                                <div class="skills-progress-value slideInLeft wow" data-percent="{{ $skill_item->percent }}" data-wow-delay="0.2s"></div>
                                            </div>
                                        </div>
                                        @endforeach
                                </div>
                                <div class="btn-group">
                                   @if (count($skill_items) > 0)
                                        <a href="#" data-scroll-nav="8" class="default-button">{{ __('frontend.hire_me') }}</a>
                                       @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </section>
           @else
            <section class="section skills-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xl-7">
                            <div class="section-heading">
                                <h2 class="section-title">My<span>Skills</span></h2>
                                <p class="section-sub-title">
                                    If you are going to use a passage of Lorem Ipsum, you need to
                                    be sure there isn't anything embarrassing hidden in the middle of text.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-6 skills-image">
                            <div class="skills-image-pattern text-center" data-wow-delay="0.25s">
                                <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/520x520.png') }}" class="img-fluid round-item" alt="skill image" >
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6" data-wow-delay="0.3s">
                            <div class="skills-inner">
                                <h4 class="skills-title">
                                    5 years <b>experience </b>
                                    <span>& customer satisfaction.</span>

                                </h4>
                                <p class="skills-text">
                                    Sed ut perspiciatis unde omnis iste natus error sit
                                    voluptatem accusantium doloremque laudantium,
                                    totam rem aperiam, eaque ipsa izuf es quae ab
                                    illo veritatis et quasi beatae vitae dicta sunt explicabo.
                                </p>
                                <div class="skills-progress-wrap">
                                    <div class="skills-item clearfix">
                                        <div class="skills-item-text">
                                            <h6>Html5 & Css3<span class="skill-percent"></span></h6>
                                        </div>
                                        <div class="skills-progress-bar">
                                            <div class="skills-progress-value slideInLeft wow" data-percent="80" data-wow-delay="0.2s"></div>
                                        </div>
                                    </div>
                                    <div class="skills-item clearfix">
                                        <div class="skills-item-text">
                                            <h6>Sass & Angular Js<span class="skill-percent"></span></h6>
                                        </div>
                                        <div class="skills-progress-bar">
                                            <div class="skills-progress-value slideInLeft wow" data-percent="70" data-wow-delay="0.2s"></div>
                                        </div>
                                    </div>
                                    <div class="skills-item clearfix">
                                        <div class="skills-item-text">
                                            <h6>jQuery & Javascript <span class="skill-percent"></span></h6>
                                        </div>
                                        <div class="skills-progress-bar">
                                            <div class="skills-progress-value slideInLeft wow" data-percent="75" data-wow-delay="0.2s"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <a href="#"  data-scroll-nav="8" class="default-button">Hire Me</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </section>
           @endif
           @endif
        <!-- Skills End -->

        <!-- Counters Start -->
        @if ($section_arr['counter'] == 1)
        @if (count($counters) > 0)
            <section class="counters-wrap section">
                <div class="container">
                    <div class="row">
                        @foreach ($counters as $counter)
                            <div class="col-md-6 col-lg-3 col-sm-6 counter-item">
                                <div class="counter-body">
                                    <i class="{{ $counter->icon }}"></i>
                                    <span class="counter">{{ $counter->timer }}</span>
                                    <h5>{{ $counter->heading }}</h5>
                                </div>
                            </div>
                            @endforeach
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </section>
        @else
            <section class="counters-wrap section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 col-sm-6 counter-item">
                            <div class="counter-body">
                                <i class="fa fa-smile"></i>
                                <span class="counter">1800</span>
                                <h5>Lorem Ipsum</h5>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 col-sm-6 counter-item">
                            <div class="counter-body">
                                <i class="fa fa-award"></i>
                                <span class="counter">500</span>
                                <h5>Lorem Ipsum</h5>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 col-sm-6 counter-item">
                            <div class="counter-body">
                                <i class="fa fa-file"></i>
                                <span class="counter">1500</span>
                                <h5>Lorem Ipsum</h5>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 col-sm-6 counter-item">
                            <div class="counter-body">
                                <i class="fas fa-briefcase"></i>
                                <span class="counter">2500</span>
                                <h5>Lorem Ipsum</h5>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </section>
            @endif
            @endif
        <!-- Counters End -->

        <!-- My Services Start -->
        @if ($section_arr['services'] == 1)
        @if (count($services) > 0)
            <section class="services section minus-30" data-scroll-index="3">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <div class="section-heading">
                                @foreach($sections as $section)
                                    @if($section->section === "services")
                                        @php
                                            // Explode
                                             $str = $section->heading;
                                             $arr =  explode(" ", $str);
                                        @endphp
                                        <h2 class="section-title">
                                            @for ($i = 0; $i < count($arr); $i++)
                                                @if ($i == 0  )
                                                    {{ $arr[0] }}
                                                @else
                                                    <span class="m-0">{{ $arr[$i] }} </span>
                                                @endif
                                            @endfor
                                        </h2>
                                        <p class="section-sub-title">{{ $section->description }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                    <div class="row">
                        @foreach($services as $service)
                            <div class="col-md-6 col-lg-4 col-sm-12 services-item-resp">
                                <div class="services-box">
                                    <div class="services-box-body">
                                        <i class="{{ $service->icon }}"></i>
                                        <h5>{{ $service->title }}</h5>
                                        <p>{{ $service->description }}</p>
                                        <a href="{{url('service')}}" class="services-more-link">{{ __('frontend.read_more') }} <i class="fa fa-angle-right ml-2"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </section>
        @else
            <section class="services section minus-30" data-scroll-index="3">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <div class="section-heading">
                                <h2 class="section-title">My<span>Services</span></h2>
                                <p class="section-sub-title">
                                    If you are going to use a passage of Lorem Ipsum, you need to
                                    be sure there isn't anything embarrassing hidden in the middle of text.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-sm-12 services-item-resp">
                            <div class="services-box">
                                <div class="services-box-body">
                                    <i class="fas fa-draw-polygon"></i>
                                    <h5>Logo Design</h5>
                                    <p>
                                        Sed ut perspiciatis omnis iste natus error sit
                                        laudantium, illo veritatis et quasi beatae vitae dicta sunt explicabo.
                                    </p>
                                    <a href="#" class="services-more-link">Read More <i class="fa fa-angle-right ml-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-sm-12 services-item-resp">
                            <div class="services-box">
                                <div class="services-box-body">
                                    <i class="fab fa-uikit"></i>
                                    <h5>UI/UX Design</h5>
                                    <p>
                                        Sed ut perspiciatis omnis iste natus error sit
                                        laudantium, illo veritatis et quasi beatae vitae dicta sunt explicabo.
                                    </p>
                                    <a href="#" class="services-more-link">Read More <i class="fa fa-angle-right ml-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-sm-12 services-item-resp">
                            <div class="services-box">
                                <div class="services-box-body">
                                    <i class="fas fa-bullhorn"></i>
                                    <h5>Search Optimization</h5>
                                    <p>
                                        Sed ut perspiciatis omnis iste natus error sit
                                        laudantium, illo veritatis et quasi beatae vitae dicta sunt explicabo.
                                    </p>
                                    <a href="#" class="services-more-link">Read More <i class="fa fa-angle-right ml-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-sm-12 services-item-resp">
                            <div class="services-box">
                                <div class="services-box-body">
                                    <i class="fas fa-ruler-combined"></i>
                                    <h5>Web Design</h5>
                                    <p>
                                        Sed ut perspiciatis omnis iste natus error sit
                                        laudantium, illo veritatis et quasi beatae vitae dicta sunt explicabo.
                                    </p>
                                    <a href="#" class="services-more-link">Read More <i class="fa fa-angle-right ml-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-sm-12 services-item-resp">
                            <div class="services-box">
                                <div class="services-box-body">
                                    <i class="fas fa-lightbulb"></i>
                                    <h5>Digital Marketing</h5>
                                    <p>
                                        Sed ut perspiciatis omnis iste natus error sit
                                        laudantium, illo veritatis et quasi beatae vitae dicta sunt explicabo.
                                    </p>
                                    <a href="#" class="services-more-link">Read More <i class="fa fa-angle-right ml-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-sm-12 services-item-resp">
                            <div class="services-box">
                                <div class="services-box-body">
                                    <i class="fas fa-laptop"></i>
                                    <h5>Responsive Design</h5>
                                    <p>
                                        Sed ut perspiciatis omnis iste natus error sit
                                        laudantium, illo veritatis et quasi beatae vitae dicta sunt explicabo.
                                    </p>
                                    <a href="#" class="services-more-link">Read More <i class="fa fa-angle-right ml-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </section>
    @endif
    @endif
        <!-- My Services End -->

        <!-- Portfolio Start -->
        @if ($section_arr['works'] == 1)
        @if (count($workshop_projects) > 0)
            <section class="section portfolio-section pb-minus-70" data-scroll-index="4">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <div class="section-heading">
                                @foreach ($sections as $section)
                                    @if ($section->section === "works")
                                        @php
                                            // Explode
                                             $str = $section->heading;
                                             $arr =  explode(" ", $str);
                                        @endphp
                                        <h2 class="section-title">
                                            @for ($i = 0; $i < count($arr); $i++)
                                                @if ($i == 0  )
                                                    {{ $arr[0] }}
                                                @else
                                                    <span class="m-0">{{ $arr[$i] }} </span>
                                                @endif
                                            @endfor
                                        </h2>
                                        <p class="section-sub-title">{{ $section->description }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                    <div class="portfolio-filter-wrap">
                        <div class="portfolio-filter d-flex align-items-center justify-content-center">
                            <a href="#0" data-gallery-filter="*" class="current">{{ __('frontend.all') }}</a>
                            @foreach ($grouped_workshop_categories as $category)
                                <a href="#0" data-gallery-filter=".{{ $category[0]->workshop_category_slug }}">{{ $category[0]->category_name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <!-- .row -->
                    <div class="portfolio-gallery portfolio-grid row">
                        @foreach ($workshop_projects as $project)
                            @if ($project->workshop_category->id % 2 != 0)
                                <div class="col-md-6 col-lg-4 glry-item col-sm-12 {{ $project->workshop_category->workshop_category_slug }}">
                                    <div class="portfolio-inner">
                                        <div class="portfolio-back">
                                            <div class="portfolio-buttons">
                                                <a href="{{ asset('fibonacci/adminpanel/assets/img/portfolio/thumbnail2/'.$project->preview_image) }}" class="portfolio-zoom-link">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                                <a href="{{url('portfolio/'.$project->slug)}}" class="portfolio-details-link">
                                                    <i class="fas fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/portfolio/thumbnail2/'.$project->preview_image) }}" alt="Portfolio Img" class="img-fluid portfolio-img">
                                        <h6 class="project-title">{{ $project->project_name }}</h6>
                                    </div>
                                </div>
                                @else
                                <div class="col-md-6 col-lg-4 glry-item col-sm-12 {{ $project->workshop_category->workshop_category_slug }}">
                                    <div class="portfolio-inner">
                                        <div class="portfolio-back">
                                            <div class="portfolio-buttons">
                                                <a href="{{ asset('fibonacci/adminpanel/assets/img/portfolio/thumbnail1/'.$project->preview_image) }}" class="portfolio-zoom-link">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                                <a href="{{url('portfolio/'.$project->slug)}}" class="portfolio-details-link">
                                                    <i class="fas fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/portfolio/thumbnail1/'.$project->preview_image) }}" alt="Portfolio Img" class="img-fluid portfolio-img">
                                        <h6 class="project-title">{{ $project->project_name }}</h6>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </section>
            @else
            <section class="section portfolio-section pb-minus-70" data-scroll-index="4">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <div class="section-heading">
                                <h2 class="section-title">My<span>Works</span></h2>
                                <p class="section-sub-title">
                                    If you are going to use a passage of Lorem Ipsum, you need to
                                    be sure there isn't anything embarrassing hidden in the middle of text.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--// .row //-->
                    <div class="portfolio-filter-wrap">
                        <div class="portfolio-filter d-flex align-items-center justify-content-center">
                            <a href="#0" data-gallery-filter="*" class="current">All</a>
                            <a href="#0" data-gallery-filter=".web">Web</a>
                            <a href="#0" data-gallery-filter=".logo">Logo</a>
                            <a href="#0" data-gallery-filter=".branding">Branding</a>
                        </div>
                    </div>
                    <!--// .row //-->
                    <div class="portfolio-gallery portfolio-grid row">
                        <div class="col-md-6 col-lg-4 glry-item col-sm-12 web">
                            <div class="portfolio-inner">
                                <div class="portfolio-back">
                                    <div class="portfolio-buttons">
                                        <a href="{{ asset('fibonacci/adminpanel/assets/img/dummy/1000x1000.png') }}" class="portfolio-zoom-link">
                                            <i class="fas fa-search"></i>
                                        </a>
                                        <a href="#" class="portfolio-details-link">
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/1000x1000.png') }}" class="img-fluid portfolio-img" alt="Portfolio Img">
                                <h6 class="project-title">Web Design</h6>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 glry-item col-sm-12 logo">
                            <div class="portfolio-inner">
                                <div class="portfolio-back">
                                    <div class="portfolio-buttons">
                                        <a href="{{ asset('fibonacci/adminpanel/assets/img/dummy/900x1200.png') }}" class="portfolio-zoom-link">
                                            <i class="fas fa-search"></i>
                                        </a>
                                        <a href="#" class="portfolio-details-link">
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/900x1200.png') }}" class="img-fluid portfolio-img" alt="Portfolio Img">
                                <h6 class="project-title">Logo Design</h6>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 glry-item col-sm-12 branding">
                            <div class="portfolio-inner">
                                <div class="portfolio-back">
                                    <div class="portfolio-buttons">
                                        <a href="{{ asset('fibonacci/adminpanel/assets/img/dummy/1000x1000.png') }}" class="portfolio-zoom-link">
                                            <i class="fas fa-search"></i>
                                        </a>
                                        <a href="#" class="portfolio-details-link">
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/1000x1000.png') }}" class="img-fluid portfolio-img" alt="Portfolio Img">
                                <h6 class="project-title">Branding Design</h6>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 glry-item col-sm-12 logo">
                            <div class="portfolio-inner">
                                <div class="portfolio-back">
                                    <div class="portfolio-buttons">
                                        <a href="{{ asset('fibonacci/adminpanel/assets/img/dummy/900x1200.png') }}" class="portfolio-zoom-link">
                                            <i class="fas fa-search"></i>
                                        </a>
                                        <a href="#" class="portfolio-details-link">
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/900x1200.png') }}" class="img-fluid portfolio-img" alt="Portfolio Img">
                                <h6 class="project-title">Logo Design</h6>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 glry-item col-sm-12 logo">
                            <div class="portfolio-inner">
                                <div class="portfolio-back">
                                    <div class="portfolio-buttons">
                                        <a href="{{ asset('fibonacci/adminpanel/assets/img/dummy/900x1200.png') }}" class="portfolio-zoom-link">
                                            <i class="fas fa-search"></i>
                                        </a>
                                        <a href="#" class="portfolio-details-link">
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/900x1200.png') }}" class="img-fluid portfolio-img" alt="Portfolio Img">
                                <h6 class="project-title">Logo Design</h6>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 glry-item col-sm-12 web">
                            <div class="portfolio-inner">
                                <div class="portfolio-back">
                                    <div class="portfolio-buttons">
                                        <a href="{{ asset('fibonacci/adminpanel/assets/img/dummy/1000x1000.png') }}" class="portfolio-zoom-link">
                                            <i class="fas fa-search"></i>
                                        </a>
                                        <a href="#" class="portfolio-details-link">
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/1000x1000.png') }}" class="img-fluid portfolio-img" alt="Portfolio Img">
                                <h6 class="project-title">Web Design</h6>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </section>
            @endif
            @endif
        <!-- Portfolio End -->

        <!-- Banner Start -->
        @if ($section_arr['call_to_action'] == 1)
        <div class="banner-wrap section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-sm-12">
                        <div class="banner-inner">
                            <h4 class="banner-title">{{ __('frontend.do_you_need_a_project') }}</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12 text-right banner-right">
                        <a href="#" class="outline-button" data-scroll-nav="8">{{ __('frontend.hire_me') }}</a>
                    </div>
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </div>
        @endif
        <!-- Banner End -->

        <!-- Testimonials Start -->
        @if ($section_arr['clients'] == 1)
        @if ($clients->count() > 0)
            <section id="testimonials" class="section testimonials bg-light-grey" data-scroll-index="5">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <div class="section-heading">
                                @foreach ($sections as $section)
                                    @if ($section->section === "clients")
                                        @php
                                            // Explode
                                             $str = $section->heading;
                                             $arr =  explode(" ", $str);
                                        @endphp
                                        <h2 class="section-title">
                                            @for ($i = 0; $i < count($arr); $i++)
                                                @if ($i == 0  )
                                                    {{ $arr[0] }}
                                                @else
                                                    <span class="m-0">{{ $arr[$i] }} </span>
                                                @endif
                                            @endfor
                                        </h2>
                                        <p class="section-sub-title">{{ $section->description }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg">
                            @if ($message = Session::get('success'))
                                <div id="alert_message" class="alert alert-success custom-alert alert-dismissible fade show mb-50" role="alert">
                                    <span>{{ __($message) }}</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                                @if ($message = Session::get('warning'))
                                    <div id="alert_message" class="alert alert-warning custom-alert alert-dismissible fade show mb-50" role="alert">
                                        <span>{{ __($message) }}</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            @if ($errors->any())
                                <div id="alert_message" class="alert alert-danger custom-alert alert-dismissible fade show mb-50" role="alert">
                                    <strong>{{ __('Whoops') }}!</strong> {{ __('There were some problems with your input') }}.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- .row -->
                    <div class="testimonials-carousel owl-carousel owl-theme @if ($section_arr['rtl_mode'] == 1) owl-rtl @endif">
                        @foreach ($clients as $client)
                                <div class="item">
                                    <div class="testimonial-item">
                                        <div class="testimonial-img">
                                            @if (is_null($client->client_image))
                                                <i class="fas fa-user-alt"></i>
                                            @else
                                                <img src="{{ asset('fibonacci/adminpanel/assets/img/client/'.$client->client_image) }}" class="img-fluid" alt="feedback image">
                                            @endif
                                        </div>
                                        <div class="testimonial-item-body">
                                            <div class="testimonial-details">
                                                <h5>{{ $client->name }}</h5>
                                                <span>{{ $client->job }}</span>
                                            </div>
                                            <blockquote class="testimonial-text">
                                                <q>{{ $client->feedback }}</q>
                                            </blockquote>
                                            <div class="testimonial-rating">
                                                @for ($i = 0; $i < $client->star; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12 text-center margin-top-30">
                            <div class="btn-group">
                                <a href="" class="default-button"  data-toggle="modal" data-target="#addRowModal">{{ __('frontend.send_review') }}</a>
                            </div>
                            <div class="card-body">
                                <!-- Modal -->
                                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header no-bd">
                                                <h5 class="modal-title">
                                                    <span class="fw-mediumbold">{{ __('frontend.new') }}</span>
                                                    <span class="fw-light">{{ __('frontend.feedback') }}</span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('frontend.close') }}">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group text-left">
                                                                <label for="clientImage">{{ __('frontend.image') }} ({{ __('frontend.size') }} 120x120)(.png, .jpg, .jpeg)</label>
                                                                <input id="clientImage"type="file" name="client_image"  class="form-input">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" name="name" class="form-input" placeholder="{{ __('frontend.your_name') }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" name="job" class="form-input" placeholder="{{ __('frontend.your_job') }}" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <textarea type="text" name="feedback" class="form-input"  cols="20" rows="5" placeholder="{{ __('frontend.your_feedback') }}" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <select class="form-input" name="star" id="star" required>
                                                                    <option value="" disabled selected>{{ __('frontend.select_rating') }}</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer no-bd">
                                                    <button type="submit" class="default-button contact-btn">
                                                        <i class="spinner fa fa-spinner fa-spin"></i> {{ __('frontend.add') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .container -->
            </section>
        @else
            <section id="testimonials" class="section testimonials bg-light-grey" data-scroll-index="5">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <div class="section-heading">
                                <h2 class="section-title">My<span>Clients</span></h2>
                                <p class="section-sub-title">
                                    If you are going to use a passage of Lorem Ipsum, you need to
                                    be sure there isn't anything embarrassing hidden in the middle of text.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg">
                            @if ($message = Session::get('success'))
                                <div id="alert_message" class="alert alert-success custom-alert alert-dismissible fade show mb-50" role="alert">
                                    <span>{{ __($message) }}</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if ($message = Session::get('warning'))
                                <div id="alert_message" class="alert alert-warning custom-alert alert-dismissible fade show mb-50" role="alert">
                                    <span>{{ __($message) }}</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div id="alert_message" class="alert alert-danger custom-alert alert-dismissible fade show mb-50" role="alert">
                                    <strong>{{ __('Whoops') }}!</strong> {{ __('There were some problems with your input') }}.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- .row -->
                    <!-- .row -->
                    <div class="testimonials-carousel owl-carousel owl-theme @if ($section_arr['rtl_mode'] == 1) owl-rtl @endif">
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="testimonial-img">
                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/120x120.png') }}" class="img-fluid" alt="feedback image">
                                </div>
                                <div class="testimonial-item-body">
                                    <div class="testimonial-details">
                                        <h5>James Daniels</h5>
                                        <span>Web Designer</span>
                                    </div>
                                    <blockquote class="testimonial-text">
                                        <q>
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                            accusantium doloremque laudantium, totam rem aperiam,
                                        </q>
                                    </blockquote>
                                    <div class="testimonial-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="testimonial-img">
                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/120x120.png') }}" class="img-fluid" alt="feedback image">
                                </div>
                                <div class="testimonial-item-body">
                                    <div class="testimonial-details">
                                        <h5>Eduardo William</h5>
                                        <span>UI/UX Designer</span>
                                    </div>
                                    <blockquote class="testimonial-text">
                                        <q>
                                            Sed ut perspiciatis unde omnis iste natus error sit
                                            voluptatem accusantium doloremque laudantium, totam rem aperiam,
                                        </q>
                                    </blockquote>
                                    <div class="testimonial-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center margin-top-30">
                            <div class="btn-group">
                                <a href="" class="default-button"  data-toggle="modal" data-target="#addRowModal">Send Review</a>
                            </div>
                            <div class="card-body">
                                <!-- Modal -->
                                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header no-bd">
                                                <h5 class="modal-title">
                                                    <span class="fw-mediumbold">{{ __('frontend.new') }}</span>
                                                    <span class="fw-light">{{ __('frontend.feedback') }}</span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('frontend.close') }}">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                                <div class="form-group text-left">
                                                                    <label for="clientImage">{{ __('frontend.image') }} ({{ __('frontend.size') }} 120x120)(.png, .jpg, .jpeg)</label>
                                                                    <input id="clientImage"type="file" name="client_image"  class="form-input">
                                                                </div>
                                                        </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <input type="text" name="name" class="form-input" placeholder="{{ __('frontend.your_name') }}" required>
                                                                </div>
                                                            </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" name="job" class="form-input" placeholder="{{ __('frontend.your_job') }}" required>
                                                            </div>
                                                        </div>

                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <textarea type="text" name="feedback" class="form-input"  cols="20" rows="5" placeholder="{{ __('frontend.your_feedback') }}" required></textarea>
                                                                </div>
                                                            </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <select class="form-input" name="star" id="star" required>
                                                                    <option disabled selected>{{ __('frontend.select_rating') }}</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer no-bd">
                                                    <button type="submit" class="default-button contact-btn">
                                                        <i class="spinner fa fa-spinner fa-spin"></i> {{ __('frontend.add') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </section>
        @endif
        @endif
        <!-- Testimonials End -->

        <!-- Gallery Start -->
        @if ($section_arr['gallery'] == 1)
            @if ($gallery_categories->count() > 0)
                <section class="section pb-minus-70 my-gallery"  data-scroll-index="6">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7">
                                <div class="section-heading">
                                    @foreach ($sections as $section)
                                        @if ($section->section === "gallery")
                                            @php
                                                // Explode
                                                 $str = $section->heading;
                                                 $arr =  explode(" ", $str);
                                            @endphp
                                            <h2 class="section-title">
                                                @for ($i = 0; $i < count($arr); $i++)
                                                    @if ($i == 0  )
                                                        {{ $arr[0] }}
                                                    @else
                                                        <span class="m-0">{{ $arr[$i] }} </span>
                                                    @endif
                                                @endfor
                                            </h2>
                                            <p class="section-sub-title">{{ $section->description }}</p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                        <div class="row">
                            @foreach ($gallery_categories as $gallery_category)
                                <div class="col-md-6 col-lg-4">
                                    <div class="gallery-item">
                                        <a href="{{ url('gallery/'.$gallery_category->slug) }}">
                                            @if ($gallery_category->category_image == '')
                                                <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/category.jpg') }}" class="img-fluid round-item" alt="category image">
                                            @else
                                                <img src="{{ asset('fibonacci/adminpanel/assets/img/gallery/category/'.$gallery_category->category_image) }}" class="img-fluid round-item" alt="category image">
                                            @endif
                                        </a>
                                        <div class="gallery-text">
                                            <h5>{{ $gallery_category->category_name }}</h5>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    </div>
                </section>
            @else
                <section class="section pb-minus-70 my-gallery" data-scroll-index="6">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7">
                                <div class="section-heading">
                                    <h2 class="section-title">My<span>Gallery</span></h2>
                                    <p class="section-sub-title">
                                        If you are going to use a passage of Lorem Ipsum, you need to
                                        be sure there isn't anything embarrassing hidden in the middle of text.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--// .row //-->
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="gallery-item">
                                    <a href="#">
                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/600x600.png') }}" class="img-fluid round-item" alt="gallery image">
                                    </a>
                                    <div class="gallery-text">
                                        <h5>Art Design</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="gallery-item">
                                    <a href="#">
                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/600x600.png') }}" class="img-fluid round-item" alt="gallery image">
                                    </a>
                                    <div class="gallery-text">
                                        <h5>Industry</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="gallery-item">
                                    <a href="#">
                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/600x600.png') }}" class="img-fluid round-item" alt="gallery image">
                                    </a>
                                    <div class="gallery-text">
                                        <h5>Business</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="gallery-item">
                                    <a href="#">
                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/600x600.png') }}" class="img-fluid round-item" alt="gallery image">
                                    </a>
                                    <div class="gallery-text">
                                        <h5>Customers</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="gallery-item">
                                    <a href="#">
                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/600x600.png') }}" class="img-fluid round-item" alt="gallery image">
                                    </a>
                                    <div class="gallery-text">
                                        <h5>Contracts</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="gallery-item">
                                    <a href="#">
                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/600x600.png') }}" class="img-fluid round-item" alt="gallery image">
                                    </a>
                                    <div class="gallery-text">
                                        <h5>Ideas</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endif
    <!-- Gallery End -->

        <!-- My Team Start -->
        @if ($section_arr['team'] == 1)
        @if(count($teams) > 0)
            <section class="section my-team">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <div class="section-heading">
                                @foreach($sections as $section)
                                    @if($section->section === "team")
                                        @php
                                            // Explode
                                             $str = $section->heading;
                                             $arr =  explode(" ", $str);
                                        @endphp
                                        <h2 class="section-title">
                                            @for($i = 0; $i < count($arr); $i++)
                                                @if($i == 0  )
                                                    {{ $arr[0] }}
                                                @else
                                                    <span class="m-0">{{ $arr[$i] }} </span>
                                                @endif
                                            @endfor
                                        </h2>
                                        <p class="section-sub-title">{{$section->description}}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                    <div class="row justify-content-center">
                        @foreach($teams as $team)
                            <div class="col-md-6 col-sm-12 col-lg-4 team-card-resp">
                                <div class="team-card">
                                    <div class="team-img-pattern">
                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/team/'.$team->team_image) }}" class="img-fluid" alt="team image">
                                    </div>
                                    <div class="team-body">
                                        <h5>{{ $team->name }}</h5>
                                        <span>{{ $team->job }}</span>
                                        <div class="team-social">
                                            <a href="@if(isset($team->facebook)) {{$team->facebook}} @else # @endif"><i class="fab fa-facebook-f"></i></a>
                                            <a href="@if(isset($team->twitter)) {{$team->twitter}} @else # @endif"><i class="fab fa-twitter"></i></a>
                                            <a href="@if(isset($team->instagram)) {{$team->instagram}} @else # @endif"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </section>
        @else
            <section class="section my-team">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <div class="section-heading">
                                <h2 class="section-title">My<span>Team</span></h2>
                                <p class="section-sub-title">
                                    If you are going to use a passage of Lorem Ipsum, you need to
                                    be sure there isn't anything embarrassing hidden in the middle of text.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-sm-12 col-lg-4 team-card-resp">
                            <div class="team-card">
                                <div class="team-img-pattern">
                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/600x600.png') }}" class="img-fluid" alt="team image">
                                </div>
                                <div class="team-body">
                                    <h5>Jeremy Perkins</h5>
                                    <span>Web Designer</span>
                                    <div class="team-social">
                                        <a href="#0"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#0"><i class="fab fa-twitter"></i></a>
                                        <a href="#0"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-4 team-card-resp">
                            <div class="team-card">
                                <div class="team-img-pattern">
                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/600x600.png') }}" class="img-fluid" alt="team image">
                                </div>
                                <div class="team-body">
                                    <h5>Adrian Boyd</h5>
                                    <span>UI/UX Designer</span>
                                    <div class="team-social">
                                        <a href="#0"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#0"><i class="fab fa-twitter"></i></a>
                                        <a href="#0"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-4 team-card-resp">
                            <div class="team-card">
                                <div class="team-img-pattern">
                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/600x600.png') }}" class="img-fluid" alt="team image">
                                </div>
                                <div class="team-body">
                                    <h5>Alexander Doe</h5>
                                    <span>Project Supervisor</span>
                                    <div class="team-social">
                                        <a href="#0"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#0"><i class="fab fa-twitter"></i></a>
                                        <a href="#0"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </section>
        @endif
        @endif
        <!-- My Team End -->

        @if ($section_arr['blogs'] == 1)
        @if ($section_arr['featured_mode'] != 1)
            <!-- Latest Blog Start -->
                @if (count($recent_posts) > 0)
                    <section class="section blog" data-scroll-index="7">
                        <div class="container">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-lg-7">
                                    <div class="section-heading">
                                        @foreach ($sections as $section)
                                            @if ($section->section === "blogs")
                                                @php
                                                    // Explode
                                                     $str = $section->heading;
                                                     $arr =  explode(" ", $str);
                                                @endphp
                                                <h2 class="section-title">
                                                    @for ($i = 0; $i < count($arr); $i++)
                                                        @if ($i == 0  )
                                                            {{ $arr[0] }}
                                                        @else
                                                            <span class="m-0">{{ $arr[$i] }} </span>
                                                        @endif
                                                    @endfor
                                                </h2>
                                                <p class="section-sub-title">{{ $section->description }}</p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                            <div class="row justify-content-center">
                                @foreach ($recent_posts as $recent_post)
                                    <div class="col-md-6 col-lg-4 latest-blog-resp">
                                        <div class="blog-item">
                                            <div class="blog-img">
                                                <a href="{{ url('blog/'.$recent_post->slug) }}">
                                                    @if ($recent_post->blog_image == '')
                                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/no_image.jpg') }}" class="img-fluid round-item" alt="blog image">
                                                    @else
                                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/blog/thumbnail1/'.$recent_post->blog_image) }}" class="img-fluid round-item" alt="blog image">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="blog-inner">
                                                <div class="blog-meta">
                                                    <span class="mr-2"><i class="mdi mdi-calendar-account-outline"></i>{{ __('frontend.by_admin')  }}</span>
                                                    <span><i class="mdi mdi-calendar-range"></i>{{Carbon\Carbon::parse($recent_post->created_at)->isoFormat('MMMM')}} {{Carbon\Carbon::parse($recent_post->created_at)->isoFormat('DD')}}</span>
                                                </div>
                                                <h5 class="blog-title">
                                                    <a href="{{ url('blog/'.$recent_post->slug) }}">{{ $recent_post->title }}</a>
                                                </h5>
                                                <p class="blog-desc">{{ $recent_post->short_description }}</p>
                                                <a href="{{ url('blog/'.$recent_post->slug) }}" class="blog-more-link">{{ __('frontend.read_more') }} <i class="fa fa-angle-right ml-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @if (count($recent_posts) === 3)
                                    <div class="col-12 text-center margin-top-30">
                                        <div class="btn-group">
                                            <a href="{{ url('blog') }}"  class="default-button">{{ __('frontend.view_all') }}</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- .row -->
                        </div>
                        <!-- .container -->
                    </section>
                @else
                    <section class="section blog" data-scroll-index="7">
                        <div class="container">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-lg-7">
                                    <div class="section-heading">
                                        <h2 class="section-title">My<span>Blog</span></h2>
                                        <p class="section-sub-title">
                                            If you are going to use a passage of Lorem Ipsum, you need to
                                            be sure there isn't anything embarrassing hidden in the middle of text.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-lg-4 latest-blog-resp">
                                    <div class="blog-item">
                                        <div class="blog-img">
                                            <a href="#">
                                                <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/600x400.png') }}" class="img-fluid round-item" alt="blog image">
                                            </a>
                                        </div>
                                        <div class="blog-inner">
                                            <div class="blog-meta">
                                                <span class="mr-2"><i class="mdi mdi-calendar-account-outline"></i>By Admin</span>
                                                <span><i class="mdi mdi-calendar-range"></i>April 14</span>
                                            </div>
                                            <h5 class="blog-title">
                                                <a href="#">2019's best portfolio design examples</a>
                                            </h5>
                                            <p class="blog-desc">
                                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
                                            </p>
                                            <a href="#" class="blog-more-link">Read More <i class="fa fa-angle-right ml-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 latest-blog-resp">
                                    <div class="blog-item">
                                        <div class="blog-img">
                                            <a href="#">
                                                <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/600x400.png') }}" class="img-fluid round-item" alt="blog image">
                                            </a>
                                        </div>
                                        <div class="blog-inner">
                                            <div class="blog-meta">
                                                <span class="mr-2"><i class="mdi mdi-calendar-account-outline"></i>By Admin</span>
                                                <span><i class="mdi mdi-calendar-range"></i>May 22</span>
                                            </div>
                                            <h5 class="blog-title">
                                                <a href="#">8 Design principle and trend design samples.</a>
                                            </h5>
                                            <p class="blog-desc">
                                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
                                            </p>
                                            <a href="#" class="blog-more-link">Read More <i class="fa fa-angle-right ml-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 latest-blog-resp">
                                    <div class="blog-item">
                                        <div class="blog-img">
                                            <a href="#">
                                                <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/600x400.png') }}" class="img-fluid round-item"  alt="blog image">
                                            </a>
                                        </div>
                                        <div class="blog-inner">
                                            <div class="blog-meta">
                                                <span class="mr-2"><i class="mdi mdi-calendar-account-outline"></i>By Admin</span>
                                                <span><i class="mdi mdi-calendar-range"></i>March 18</span>
                                            </div>
                                            <h5 class="blog-title">
                                                <a href="#">Logo design and card mockup.</a>
                                            </h5>
                                            <p class="blog-desc">
                                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
                                            </p>
                                            <a href="#" class="blog-more-link">Read More <i class="fa fa-angle-right ml-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center margin-top-30">
                                    <div class="btn-group">
                                        <a href="#"  class="default-button">View All</a>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                        </div>
                        <!-- .container -->
                    </section>
                @endif
                <!-- Latest Blog End -->
            @else
            <!-- Featured Blog Start -->
            @if (count($featured_posts) > 0)
                    <section class="section blog" data-scroll-index="7">
                    <div class="container-fluid pr-0 pl-0">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-7">
                                <div class="section-heading">
                                    @foreach ($sections as $section)
                                        @if ($section->section === "blogs")
                                            @php
                                                // Explode
                                                 $str = $section->heading;
                                                 $arr =  explode(" ", $str);
                                            @endphp
                                            <h2 class="section-title">
                                                @for ($i = 0; $i < count($arr); $i++)
                                                    @if ($i == 0  )
                                                        {{ $arr[0] }}
                                                    @else
                                                        <span class="m-0">{{ $arr[$i] }} </span>
                                                    @endif
                                                @endfor
                                            </h2>
                                            <p class="section-sub-title">{{ $section->description }}</p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                        <div class="blogs-carousel owl-carousel owl-theme">
                            @foreach ($featured_posts as $featured_post)
                                <div class="item">
                                    <div class="latest-blog-resp">
                                        <div class="blog-item position-relative">
                                            <div class="blog-img position-relative rounded-0">
                                                <div class="bg-overlay"></div>
                                                <a href="{{ url('blog/'.$featured_post->slug) }}">
                                                    @if  ($featured_post->blog_image == '')
                                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/no_image.jpg') }}" class="img-fluid round-item" alt="blog image">
                                                    @else
                                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/blog/thumbnail1/'.$featured_post->blog_image) }}" class="img-fluid round-item" alt="blog image">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="blog-inner featured-blog-inner">
                                                <div class="blog-meta">
                                                    <span class="mr-2 text-white"><i class="mdi mdi-calendar-account-outline text-white"></i>{{ __('frontend.by_admin')  }}</span>
                                                    <span class="text-white"><i class="mdi mdi-calendar-range text-white"></i>{{Carbon\Carbon::parse($featured_post->created_at)->isoFormat('MMMM')}} {{Carbon\Carbon::parse($featured_post->created_at)->isoFormat('DD')}}</span>
                                                </div>
                                                <h5 class="blog-title text-white">
                                                    <a href="{{ url('blog/'.$featured_post->slug) }}" class="text-white">{{ $featured_post->title }}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    </section>
                @else
                    <section class="section blog" data-scroll-index="7">
                        <div class="container-fluid pr-0 pl-0">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-lg-7">
                                    <div class="section-heading">
                                        <h2 class="section-title">My<span>Blog</span></h2>
                                        <p class="section-sub-title">
                                            If you are going to use a passage of Lorem Ipsum, you need to
                                            be sure there isn't anything embarrassing hidden in the middle of text.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                            <div class="blogs-carousel owl-carousel owl-theme">
                                <div class="item">
                                    <div class="latest-blog-resp">
                                        <div class="blog-item position-relative">

                                            <div class="blog-img position-relative rounded-0">
                                                <div class="bg-overlay"></div>
                                                <a href="#">
                                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/600x400.png') }}" class="img-fluid round-item" alt="blog image">
                                                </a>
                                            </div>
                                            <div class="blog-inner featured-blog-inner">
                                                <div class="blog-meta">
                                                    <span class="mr-2 text-white"><i class="mdi mdi-calendar-account-outline text-white"></i>By Admin</span>
                                                    <span class="text-white"><i class="mdi mdi-calendar-range text-white"></i>April 14</span>
                                                </div>
                                                <h5 class="blog-title text-white">
                                                    <a href="#" class="text-white">2020's best portfolio examples</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="latest-blog-resp">
                                        <div class="blog-item position-relative">

                                            <div class="blog-img position-relative rounded-0">
                                                <div class="bg-overlay"></div>
                                                <a href="#">
                                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/600x400.png') }}" class="img-fluid round-item" alt="blog image">
                                                </a>
                                            </div>
                                            <div class="blog-inner featured-blog-inner">
                                                <div class="blog-meta">
                                                    <span class="mr-2 text-white"><i class="mdi mdi-calendar-account-outline text-white"></i>By Admin</span>
                                                    <span class="text-white"><i class="mdi mdi-calendar-range text-white"></i>April 14</span>
                                                </div>
                                                <h5 class="blog-title text-white">
                                                    <a href="#" class="text-white">8 Design Principle Samples.</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="latest-blog-resp">
                                        <div class="blog-item position-relative">
                                            <div class="blog-img position-relative rounded-0">
                                                <div class="bg-overlay"></div>
                                                <a href="#">
                                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/600x400.png') }}" class="img-fluid round-item" alt="blog image">
                                                </a>
                                            </div>
                                            <div class="blog-inner featured-blog-inner">
                                                <div class="blog-meta">
                                                    <span class="mr-2 text-white"><i class="mdi mdi-calendar-account-outline text-white"></i>By Admin</span>
                                                    <span class="text-white"><i class="mdi mdi-calendar-range text-white"></i>April 14</span>
                                                </div>
                                                <h5 class="blog-title text-white">
                                                    <a href="#" class="text-white">Logo Design And Card Mockup.</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .container-fluid -->
                    </section>
                @endif
            <!-- Featured Blog End -->
            @endif
            @endif

        <!-- Contact Me Start -->
        @if ($section_arr['contact'] == 1)
        <section  id="messages" class="contact section" data-scroll-index="8">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-7">
                        <div class="section-heading">
                            @foreach ($sections as $section)
                                @if ($section->section === "contact")
                                    @php
                                        // Explode
                                         $str = $section->heading;
                                         $arr =  explode(" ", $str);
                                    @endphp
                                    <h2 class="section-title">
                                        @for ($i = 0; $i < count($arr); $i++)
                                            @if ($i == 0  )
                                                {{ $arr[0] }}
                                            @else
                                                <span class="m-0">{{ $arr[$i] }} </span>
                                            @endif
                                        @endfor
                                    </h2>
                                    <p class="section-sub-title">{{ $section->description }}</p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- .row -->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        @if ($message = Session::get('success_message'))
                            <div id="alert_message_2" class="alert alert-success custom-alert alert-dismissible fade show mb-50" role="alert">
                                <span>{{ __($message) }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div id="alert_message_2" class="alert alert-danger custom-alert alert-dismissible fade show mb-50" role="alert">
                                <strong>{{ __('Whoops') }}!</strong> {{ __('There were some problems with your input') }}.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- .row -->
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <form id="contactForm" action="{{ route('contact-page.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-input" name="name" id="contactName"  placeholder="{{ __('frontend.your_name') }}" required>
                                        <span class="mdi mdi-account-outline"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" class="form-input" name="email" id="contactEmail" placeholder="{{ __('frontend.your_email') }}" required>
                                        <span class="mdi mdi-email-outline"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" class="form-input" name="subject" id="contactSubject" placeholder="{{ __('frontend.subject_here') }}" required>
                                        <span class="mdi mdi-email-outline"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea id="contactMessage" class="form-input" name="message" placeholder="{{ __('frontend.your_message') }}" cols="20" rows="5" required></textarea>
                                        <span class="mdi mdi-email-open-outline"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <div class="contact-btn-wrap">
                                        <button type="submit" id="contactBtn" class="default-button contact-btn">
                                            <i class="spinner fa fa-spinner fa-spin"></i> {{ __('frontend.send_message') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                        </form>
                    </div>
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        @endif
        <!-- Contact Me End -->
    </main>
    <!-- Main Area End -->

    <!-- Footer Start -->
    @if(isset($site_infos))
        <footer class="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="footer-widget-box text-center">
                                <img src="{{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_infos->footer_logo) }}" class="img-fluid" alt="footer-logo icon">
                                @if(isset($social_media))
                                    <ul class="footer-social">
                                        @foreach ($social_media as $social)
                                            @if ($social->status == 1)
                                                <li>
                                                    <a href="@if(isset($social->link)) {{ $social->link }} @else # @endif" class="footer-social-link">
                                                        <i class="{{ $social->social_media }}"></i>
                                                    </a>
                                                </li>
                                                @endif
                                            @endforeach
                                    </ul>
                                @else
                                    <ul class="footer-social">
                                        <li>
                                            <a href="#0" class="footer-social-link">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#0" class="footer-social-link">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#0" class="footer-social-link">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#0" class="footer-social-link">
                                                <i class="fab fa-dribbble"></i>
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </div>
            <!-- .footer-top -->
            <div class="copyright">
                <div class="container">
                    <p class="copyright-text">{{ $site_infos->copyright }}</p>
                </div>
                <!-- .container -->
            </div>
            <!-- .copyright -->
        </footer>
    @else
        <footer class="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="footer-widget-box text-center">
                                <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/icon/logo_footer.png') }}" class="img-fluid" alt="footer-logo icon">
                                <ul class="footer-social">
                                    <li>
                                        <a href="#" class="footer-social-link">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="footer-social-link">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="footer-social-link">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="footer-social-link">
                                            <i class="fab fa-dribbble"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </div>
            <!-- .footer-top -->
            <div class="copyright">
                <div class="container">
                    <p class="copyright-text">© Copyright. <span id="fullYearCopyright"></span> Powered by ElseColor</p>
                </div>
                <!-- .container -->
            </div>
            <!-- .copyright -->
        </footer>
@endif
<!-- Footer End -->

    <a href="#" class="scroll-top-btn" data-scroll-goto="1">
        <span class="fa fa-arrow-up"></span>
    </a>
    <!-- Back To Top -->
    @if ($section_arr['preloader'] == 1)
    <div class="preloader-wrap">
        <div class="preloader-inner">
            <div id="loader"></div>
        </div>
    </div>
    @endif
    <!-- Preloader -->

</div>
<!-- Page Wrapper End -->


<!-- Scripts -->
<script src="{{ asset('fibonacci/frontend/assets/js/jquery.js') }}"></script>
<script src="{{ asset('fibonacci/frontend/assets/js/typed.js') }}"></script>
<script src="{{ asset('fibonacci/frontend/assets/js/plugins.js') }}"></script>
<script src="{{ asset('fibonacci/frontend/assets/js/particles.js') }}"></script>

<!-- Theme Main Js -->
@if ($section_arr['rtl_mode'] == 1)
    <script src="{{ asset('fibonacci/frontend/assets/js/rtl.js') }}"></script>
    @else
    <script src="{{ asset('fibonacci/frontend/assets/js/main.js') }}"></script>
@endif

@if (isset($fixed_content) && isset($homepage_version))
    @if (in_array($homepage_version->choose_version, array(1, 3, 4, 5, 6)))
        <!-- Typed Text Js -->
        <script>
            var options = {
                strings: ["{{ $fixed_content->animated_title_1 }}", "{{ $fixed_content->animated_title_2 }}"],
                typeSpeed: 40,
                backSpeed: 40,
                loop: true
            };
            var typed = new Typed("#typed-text", options);
        </script>
        @endif
    @elseif (isset($fixed_content))
    <!-- Typed Text Js -->
    <script>
        var options = {
            strings: ["{{ $fixed_content->animated_title_1 }}", "{{ $fixed_content->animated_title_2 }}"],
            typeSpeed: 40,
            backSpeed: 40,
            loop: true
        };
        var typed = new Typed("#typed-text", options);
    </script>
@else
    <!-- Typed Text(Default) Js -->
    <script>
        var options = {
            strings: ["Web Designer", "Web Developer"],
            typeSpeed: 40,
            backSpeed: 40,
            loop: true
        };
        var typed = new Typed("#typed-text", options);
    </script>
@endif

@if (isset($video_view))
    <!-- Youtube Video -->
    <script>
        jQuery(document).ready(function() {
            jQuery("#video-background").mb_YTPlayer();
        });
    </script>
@endif

@if (isset($sliders) && isset($homepage_version))
    @if ($homepage_version->choose_version == 2)
        <!-- Vegas Slider  -->
        <script>
            jQuery(document).ready(function() {
                jQuery("#heroSliderContainer").vegas({
                    slides: [
                            @foreach($sliders as $slider)
                        {
                            src: "{{ asset('fibonacci/adminpanel/assets/img/slider/'.$slider->slider_image) }}"
                        },
                        @endforeach
                    ],
                    overlay: true,
                    transition: 'fade2',
                    animation: 'kenburnsUpLeft'
                });

                @if (isset($fixed_content))
                <!-- Typed Text Js -->
                var options = {
                    strings: ["{{ $fixed_content->animated_title_1 }}", "{{ $fixed_content->animated_title_2 }}"],
                    typeSpeed: 40,
                    backSpeed: 40,
                    loop: true
                };
                var typed = new Typed("#typed-text-slider", options);
                @else
                <!-- Typed Text Js -->
                    var options = {
                        strings: ["Web Designer", "Web Developer"],
                        typeSpeed: 40,
                        backSpeed: 40,
                        loop: true
                    };
                var typed = new Typed("#typed-text-slider", options);
                @endif
            });
        </script>
    @endif
@endif


</body>
</html>