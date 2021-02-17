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
    <meta property="fb:app_id" content="@if (isset($seo)){{ $seo->fb_app_id }} @endif">
    <meta property="og:title" content="@yield('title') @if (isset($seo)) - {{ $seo->site_name }} @endif">
    <meta property="og:url" content="@if (isset($seo)){{ url()->current() }} @endif">
    <meta property="og:description" content="@if (isset($workshop_project)){{ \Illuminate\Support\Str::limit($workshop_project->description, 120, $end='...') }} @elseif (isset($blog)){{ \Illuminate\Support\Str::limit($blog->short_description, 120, $end='...') }} @endif">
    <meta property="og:image" content="@if (isset($workshop_project)){{ asset('fibonacci/adminpanel/assets/img/portfolio/thumbnail2/'.$workshop_project->preview_image) }}@elseif (isset($blog)) @if ($blog->blog_image != '')
           {{ asset('fibonacci/adminpanel/assets/img/blog/'.$blog->blog_image) }}
    @endif @endif">
    <meta itemprop="image" content="@if (isset($workshop_project)){{ asset('fibonacci/adminpanel/assets/img/portfolio/thumbnail2/'.$workshop_project->preview_image) }}@elseif (isset($blog)) @if ($blog->blog_image != '')
    {{ asset('fibonacci/adminpanel/assets/img/blog/'.$blog->blog_image) }}
    @endif @endif">
    <meta property="og:type" content="article">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="@if (isset($workshop_project)){{ asset('fibonacci/adminpanel/assets/img/portfolio/thumbnail2/'.$workshop_project->preview_image) }}@elseif (isset($blog)) @if ($blog->blog_image != '')
    {{ asset('fibonacci/adminpanel/assets/img/blog/'.$blog->blog_image) }}
    @endif @endif">
    <meta property="twitter:title" content="@yield('title') @if (isset($seo)) - {{ $seo->site_name }} @endif">
    <meta property="twitter:description" content="@if (isset($workshop_project)){{ \Illuminate\Support\Str::limit($workshop_project->description, 120, $end='...') }} @elseif (isset($blog)){{ \Illuminate\Support\Str::limit($blog->short_description, 120, $end='...') }} @endif">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>@yield('title') @if (isset($seo)) - {{ $seo->site_name }} @endif</title>

    @if (isset($site_infos))
    <!-- Favicon -->
        <link href="{{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_infos->favicon) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_infos->favicon) }}" sizes="128x128" rel="shortcut icon" />
    @endif

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('fibonacci/frontend/assets/fonts/flat_icons/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('fibonacci/frontend/assets/fonts/font_awesome/css/all.css')}}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i,800&display=swap&subset=greek-ext,latin-ext" rel="stylesheet">
    @if ($section_arr['rtl_mode'] == 1)
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    @endif

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('fibonacci/frontend/assets/css/frameworks.css')}}">
    @if ($section_arr['rtl_mode'] == 1)
        <link rel="stylesheet" href="{{ asset('fibonacci/frontend/assets/css/rtl.css') }}">
    @endif

    <!-- Theme Main CSS -->
    <link rel="stylesheet" href="{{ asset('fibonacci/frontend/assets/css/style.css')}}">
    @if (isset($color_picker))
        <style>
            .default-button {
                background: {{ $color_picker->color_code }};
            }
            .default-button:hover {
                background: {{ $color_picker->color_code }};
            }
            .down-scroll {
                background: {{ $color_picker->color_code }};
            }
            .scroll-top-btn {
                background: {{ $color_picker->color_code }};
            }
            .services-box .services-box-body > i {
                background: {{ $color_picker->color_code }};
            }
            .portfolio-single-section .portfolio-carousel .owl-nav .owl-prev, .portfolio-single-section .portfolio-carousel .owl-nav .owl-next{
                background: {{ $color_picker->color_code }};
            }
            .inner-header-title:before {
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
            .blog-sidebar .blog-widgets .blog-search-btn {
                background: {{ $color_picker->color_code }};
            }
            .blog-single-inner .blog-links a i {
                color: {{ $color_picker->color_code }};
            }
            .blog-sidebar .recent-post-item .recent-post-date i {
                color: {{ $color_picker->color_code }};
            }
            .blog-item .blog-inner > .blog-meta span i {
                color: {{ $color_picker->color_code }};
            }
            .blog-sidebar .recent-post-item .recent-post-title:hover {
                color: {{ $color_picker->color_code }};
            }
            .blog-sidebar .blog-category-list li a:hover {
                color: {{ $color_picker->color_code }};
            }
            .blog-item .blog-inner .blog-title > a:hover {
                color: {{ $color_picker->color_code }};
            }
            .blog-item .blog-inner .blog-more-link {
                background: {{ $color_picker->color_code }};
            }
            .blog-item .blog-inner .blog-more-link:hover {
                background: {{ $color_picker->color_code }};
            }
            .footer .footer-top .footer-social li .footer-social-link:hover {
                background: {{ $color_picker->color_code }};
            }
            .header .nav-link.active::after {
                background-color: {{ $color_picker->color_code }};
            }
            .header .nav-link:not(.active)::after {
                background-color: {{ $color_picker->color_code }};
            }
            .why-choose-me-inner .why-choose-me-box .why-choose-me-item .why-choose-me-icon i {
                background: {{ $color_picker->color_code }};
            }
            .portfolio-single-section .project-details .project-share li a {
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
            }
            .header.header-shrink .nav-btn-item .nav-btn {
                color: {{ $color_picker->color_code }};
                border: 2px solid {{ $color_picker->color_code }};
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
<div class="page-wrapper" data-scroll-index="0">

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
                            <a class="nav-link active" href="{{url('/')}}">{{ __('frontend.home') }}</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- .navbar-nav -->
        </div>
        <!-- .container -->
    </header>
    <!-- Header End  -->

    <!-- Main Start -->
    <main class="site-main">

        @yield('content')

    </main>
    <!-- Main End -->

    <!-- Footer Start -->
    @if (isset($site_infos))
        <footer class="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="footer-widget-box text-center">
                                <img src="{{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_infos->footer_logo) }}" class="img-fluid" alt="footer-logo icon">
                                @if (isset($social_media))
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

    <a href="#" class="scroll-top-btn" data-scroll-goto="0">
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
    <!-- Preloader  -->
</div>
<!-- Page Wrapper End -->


<!-- Scripts -->
<script src="{{ asset('fibonacci/frontend/assets/js/jquery.js') }}"></script>
<script src="{{ asset('fibonacci/frontend/assets/js/plugins.js') }}"></script>

<!-- Theme Main Js -->
@if ($section_arr['rtl_mode'] == 1)
    <script src="{{ asset('fibonacci/frontend/assets/js/rtl.js') }}"></script>
@else
    <script src="{{ asset('fibonacci/frontend/assets/js/main.js') }}"></script>
@endif

</body>
</html>