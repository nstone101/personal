<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') @if(isset($seo)) - {{ $seo->site_name }} @endif</title>

    <!-- Favicon -->
    @if(isset($site_info))
        <link href="{{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_info->favicon) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_info->favicon) }}" sizes="128x128" rel="shortcut icon" />
    @else
        <link href="{{ asset('fibonacci/adminpanel/assets/img/dummy/favicon.ico') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('fibonacci/adminpanel/assets/img/dummy/favicon.ico') }}" sizes="128x128" rel="shortcut icon" />
@endif

    <!-- Fonts and Icons -->
    <script src="{{ asset('fibonacci/adminpanel/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: [ '{{ url('/') }}/fibonacci/adminpanel/assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('fibonacci/adminpanel/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fibonacci/adminpanel/assets/css/atlantis.min.css') }}">

    <!-- DatetimePicker CSS -->
    <link rel="stylesheet" href="{{ asset('fibonacci/adminpanel/assets/css/datetimepicker.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('fibonacci/adminpanel/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fibonacci/adminpanel/assets/css/responsive.css') }}">

</head>
<body @if ($panel_mode->mode == 1 ) data-background-color="dark" @endif>

<div class="wrapper">
    <div class="main-header">
        <!-- Logo Header -->
        <div class="logo-header" @if ($panel_mode->mode == 1 ) data-background-color="dark" @else data-background-color="blue" @endif >
            <a href="{{url('admin-panel/dashboard')}}" class="logo">
                @if(isset($site_info))
                    <img src="{{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_info->white_logo) }}" class="navbar-brand" alt="navbar-brand icon">
                @else
                    <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/icon/logo.png') }}" class="navbar-brand" alt="navbar-brand icon">
                @endif
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
            </button>
            <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="icon-menu"></i>
                </button>
            </div>
        </div>
        <!-- End Logo Header -->

        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg" @if ($panel_mode->mode == 1 ) data-background-color="dark" @else data-background-color="blue2" @endif>
            <div class="container-fluid">
                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    <li class="nav-item dropdown hidden-caret">
                            <a href="{{ url('/') }}" target="_blank" class="btn btn-white btn-border btn-round mr-2"> <i class="far fa-eye"></i></a>

                    </li>
                    <li class="nav-item dropdown hidden-caret">
                        <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-comment-alt"></i>
                            @if (count($unapproval_reviews) > 0)
                                <span class="notification"></span>
                            @endif
                        </a>
                        <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
                            <li>
                                <div class="dropdown-title d-flex justify-content-between align-items-center">
                                    {{ __('text.feedbacks') }}
                                </div>
                            </li>
                            <li>
                                <div class="message-notif-scroll scrollbar-outer">
                                    <div class="notif-center">
                                        @foreach ($unapproval_reviews as $review)
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/profile.png') }}" alt="profile image">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">{{ $review->name }}</span>
                                                    <span class="block">
                                                        {{ \Illuminate\Support\Str::limit($review->feedback, 20, $end='...') }}
													</span>
                                                    <span class="time">
                                                       {{ $diff = Carbon\Carbon::parse($review->created_at)->diffForHumans(Carbon\Carbon::now()) }}
                                                    </span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="see-all" href="{{ url('admin-panel/client-section') }}">{{ __('text.see_all_comments') }}<i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown hidden-caret">
                        <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-envelope"></i>
                            @if (count($unread_messages) > 0)
                                <span class="notification"></span>
                                @endif
                        </a>
                        <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
                            <li>
                                <div class="dropdown-title d-flex justify-content-between align-items-center">
                                    {{ __('text.messages') }}
                                </div>
                            </li>
                            <li>
                                <div class="message-notif-scroll scrollbar-outer">
                                    <div class="notif-center">
                                        @foreach ($unread_messages as $message)
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/profile.png') }}" alt="profile image">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">{{ $message->name }}</span>
                                                    <span class="block">
                                                        {{ \Illuminate\Support\Str::limit($message->subject, 20, $end='...') }}
													</span>
                                                    <span class="time">
                                                       {{ $diff = Carbon\Carbon::parse($message->created_at)->diffForHumans(Carbon\Carbon::now()) }}
                                                    </span>
                                                </div>
                                            </a>
                                            @endforeach
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="see-all" href="{{ url('admin-panel/message') }}">{{ __('text.see_all_messages') }}<i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown hidden-caret">
                        <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-comment"></i>
                            @if (count($unapproval_comments) > 0)
                                <span class="notification"></span>
                            @endif
                        </a>
                        <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                            <li>
                                <div class="dropdown-title d-flex justify-content-between align-items-center">
                                    {{ __('text.comments') }}
                                </div>
                            </li>
                            <li>
                                <div class="notif-scroll scrollbar-outer">
                                    <div class="notif-center">
                                        @foreach($unapproval_comments as $comment)
                                            <a href="#">
                                                <div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
                                                <div class="notif-content">
													<span class="block">{{ \Illuminate\Support\Str::limit($comment->name, 20, $end='...') }} {{ __('text.commented') }}</span>
                                                    <span class="time">
                                                        {{ $diff = Carbon\Carbon::parse($comment->created_at)->diffForHumans(Carbon\Carbon::now()) }}
                                                       </span>
                                                </div>
                                            </a>
                                            @endforeach
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="see-all" href="{{ url('admin-panel/comment') }}">{{ __('text.see_all_comments') }} <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown hidden-caret">
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="fas fa-layer-group"></i>
                        </a>
                        <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                            <div class="quick-actions-header">
                                <span class="title mb-1">{{ __('text.quick_actions') }}</span>
                                <span class="subtitle op-8">{{ __('text.shortcuts') }}</span>
                            </div>
                            <div class="quick-actions-scroll scrollbar-outer">
                                <div class="quick-actions-items">
                                    <div class="row m-0">
                                        <a class="col-6 col-md-4 p-0" href="{{ url('admin-panel/blog') }}">
                                            <div class="quick-actions-item">
                                                <i class="flaticon-pen"></i>
                                                <span class="text">{{ __('text.create_new_post') }}</span>
                                            </div>
                                        </a>
                                        <a class="col-6 col-md-4 p-0" href="{{ url('admin-panel/workshop-project') }}">
                                            <div class="quick-actions-item">
                                                <i class="flaticon-file"></i>
                                                <span class="text">{{ __('text.create_new_project') }}</span>
                                            </div>
                                        </a>
                                        <a class="col-6 col-md-4 p-0" href="{{ url('admin-panel/service-section') }}">
                                            <div class="quick-actions-item">
                                                <i class="flaticon-interface-1"></i>
                                                <span class="text">{{ __('text.create_new_service') }}</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown hidden-caret">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                            <div class="avatar-sm">
                                @if(Auth::user()->profile_image != null)
                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/profile/'.Auth::user()->profile_image) }}" class="avatar-img rounded-circle" alt="profile image">
                                @else
                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/128x128.png') }}" class="avatar-img rounded-circle" alt="profile image">
                                @endif
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg">
                                            @if(Auth::user()->profile_image != null)
                                                <img src="{{ asset('fibonacci/adminpanel/assets/img/profile/'.Auth::user()->profile_image) }}" class="avatar-img rounded" alt="profile image">
                                            @else
                                                <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/128x128.png') }}" class="avatar-img rounded" alt="profile image">
                                            @endif
                                        </div>
                                        <div class="u-text">
                                            <h4>{{ Auth::user()->name }}</h4>
                                            <p class="text-muted">{{ Auth::user()->job }}</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url('admin-panel/profile/edit') }}">{{ __('text.my_profile') }}</a>
                                    <a class="dropdown-item" href="{{ url('admin-panel/profile/change-password') }}">{{ __('text.change_password') }}</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('text.logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar Header -->
    </div>

    <!-- Sidebar -->
    <div class="sidebar sidebar-style-2" @if ($panel_mode->mode == 1 ) data-background-color="dark2" @endif>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <div class="user">
                    <div class="avatar-sm float-left mr-2">
                        @if(Auth::user()->profile_image != null)
                        <img src="{{ asset('fibonacci/adminpanel/assets/img/profile/'.Auth::user()->profile_image) }}"  class="avatar-img rounded-circle" alt="profile image">
                            @else
                            <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/128x128.png') }}"  class="avatar-img rounded-circle" alt="profile image">
                        @endif
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{ Auth::user()->name }}
									<span class="user-level">{{ __('text.administrator') }}</span>
									<span class="caret"></span>
								</span>
                        </a>
                        <div class="clearfix"></div>
                        <div class="collapse in" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="{{ url('admin-panel/profile/edit') }}">
                                        <span class="link-collapse">{{ __('text.edit_profile') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('admin-panel/profile/change-password') }}">
                                        <span class="link-collapse">{{ __('text.change_password') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <span class="link-collapse"> {{ __('text.logout') }} </span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-primary">
                    <li class="nav-item {{ (request()->is('admin-panel/dashboard')) ? 'active' : '' }}">
                        <a href="{{ url('admin-panel/dashboard') }}">
                            <i class="fas fa-home"></i>
                            <p>{{ __('text.dashboard') }}</p>
                        </a>
                    </li>
                    <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
                        <h4 class="text-section">{{ __('text.interface') }}</h4>
                    </li>
                    <li class="nav-item {{ (request()->is('admin-panel/site-info') ||
                                            request()->is('admin-panel/homepage-version') ||
                                            request()->is('admin-panel/google-analytic') ||
                                            request()->is('admin-panel/external-url') ||
                                            request()->is('admin-panel/breadcrumbs') ||
                                            request()->is('admin-panel/social-media') ||
                                            request()->is('admin-panel/section') ||
                                            request()->is('admin-panel/*/edit-section') ||
                                            request()->is('admin-panel/color-picker') ||
                                            request()->is('admin-panel/seo')) ? 'active submenu' : '' }}">
                        <a data-toggle="collapse" href="#base">
                            <i class="fas fa-fw fa-cog"></i>
                            <p> {{ __('text.settings') }}</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ (request()->is('admin-panel/site-info') ||
                                                 request()->is('admin-panel/homepage-version') ||
                                                 request()->is('admin-panel/breadcrumbs') ||
                                                 request()->is('admin-panel/google-analytic') ||
                                                 request()->is('admin-panel/external-url') ||
                                                 request()->is('admin-panel/social-media') ||
                                                 request()->is('admin-panel/section') ||
                                                 request()->is('admin-panel/*/edit-section') ||
                                                 request()->is('admin-panel/color-picker') ||
                                                 request()->is('admin-panel/seo')) ? 'show' : '' }}" id="base">
                            <ul class="nav nav-collapse">
                                <li class="{{ (request()->is('admin-panel/site-info')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/site-info') }}">
                                        <span class="sub-item">{{ __('text.site_settings') }}</span>
                                    </a>
                                </li>
                                <li class="{{ (request()->is('admin-panel/homepage-version')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/homepage-version') }}">
                                        <span class="sub-item">{{ __('text.homepage_versions') }}</span>
                                    </a>
                                </li>
                                <li class="{{ (request()->is('admin-panel/breadcrumbs')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/breadcrumbs') }}">
                                        <span class="sub-item">{{ __('text.breadcrumb') }}</span>
                                    </a>
                                </li>
                                <li class="{{ (request()->is('admin-panel/google-analytic')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/google-analytic') }}">
                                        <span class="sub-item">{{ __('text.google_analytic') }}</span>
                                    </a>
                                </li>
                                <li class="{{ (request()->is('admin-panel/external-url')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/external-url') }}">
                                        <span class="sub-item">{{ __('text.external_url') }}</span>
                                    </a>
                                </li>
                                <li class="{{ (request()->is('admin-panel/social-media')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/social-media') }}">
                                        <span class="sub-item">{{ __('text.social_media') }}</span>
                                    </a>
                                </li>
                                <li class="{{ (request()->is('admin-panel/section')||
                                               request()->is('admin-panel/*/edit-section')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/section') }}">
                                        <span class="sub-item">{{ __('text.sections') }}</span>
                                    </a>
                                </li>
                                <li class="{{ (request()->is('admin-panel/color-picker')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/color-picker') }}">
                                        <span class="sub-item">{{ __('text.color') }}</span>
                                    </a>
                                </li>
                                <li class="{{ (request()->is('admin-panel/seo')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/seo') }}">
                                        <span class="sub-item">{{ __('text.seo') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ (request()->is('admin-panel/fixed-content') ||
                                            request()->is('admin-panel/static-view') ||
                                            request()->is('admin-panel/slider-view') ||
                                            request()->is('admin-panel/*/edit-slider-view') ||
                                            request()->is('admin-panel/video-view')) ? 'active submenu' : '' }}">
                        <a data-toggle="collapse" href="#sidebarLayouts">
                            <i class="fas fa-fw fa-wrench"></i>
                            <p>{{ __('text.hero_settings') }}</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ (request()->is('admin-panel/fixed-content') ||
                                                 request()->is('admin-panel/static-view') ||
                                                 request()->is('admin-panel/slider-view') ||
                                                 request()->is('admin-panel/*/edit-slider-view') ||
                                                 request()->is('admin-panel/video-view')) ? 'show' : '' }}" id="sidebarLayouts">
                            <ul class="nav nav-collapse">
                                <li class="{{ (request()->is('admin-panel/fixed-content')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/fixed-content') }}">
                                        <span class="sub-item">{{ __('text.fixed_content') }}</span>
                                    </a>
                                </li>
                                <li class="{{ (request()->is('admin-panel/static-view')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/static-view') }}">
                                        <span class="sub-item">{{ __('text.static_view') }}</span>
                                    </a>
                                </li>
                                <li class="{{ (request()->is('admin-panel/slider-view') ||
                                               request()->is('admin-panel/*/edit-slider-view')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/slider-view') }}">
                                        <span class="sub-item">{{ __('text.slider_view') }}</span>
                                    </a>
                                </li>
                                <li class="{{ (request()->is('admin-panel/video-view')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/video-view') }}">
                                        <span class="sub-item">{{ __('text.video_view') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ (request()->is('admin-panel/workshop-category') ||
                                            request()->is('admin-panel/*/edit-workshop-category') ||
                                            request()->is('admin-panel/workshop-project') ||
                                            request()->is('admin-panel/workshop-project/add-workshop-project') ||
                                            request()->is('admin-panel/*/edit-workshop-project') ||
                                            request()->is('admin-panel/workshop-slider') ||
                                            request()->is('admin-panel/*/edit-workshop-slider')) ? 'active submenu' : '' }}">
                        <a data-toggle="collapse" href="#sidebarLayouts2">
                            <i class="fas fa-briefcase"></i>
                            <p>{{ __('text.workshop') }}</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ (request()->is('admin-panel/workshop-category') ||
                                                 request()->is('admin-panel/*/edit-workshop-category') ||
                                                 request()->is('admin-panel/workshop-project') ||
                                                 request()->is('admin-panel/workshop-project/add-workshop-project') ||
                                                 request()->is('admin-panel/*/edit-workshop-project') ||
                                                 request()->is('admin-panel/workshop-slider') ||
                                                 request()->is('admin-panel/*/edit-workshop-slider') ) ? 'show' : '' }}" id="sidebarLayouts2">
                            <ul class="nav nav-collapse">
                                <li class="{{ (request()->is('admin-panel/workshop-category') ||
                                               request()->is('admin-panel/*/edit-workshop-category')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/workshop-category') }}">
                                        <span class="sub-item">{{ __('text.categories') }}</span>
                                    </a>
                                </li>
                                <li class="{{ (request()->is('admin-panel/workshop-project') ||
                                               request()->is('admin-panel/workshop-project/add-workshop-project') ||
                                               request()->is('admin-panel/*/edit-workshop-project')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/workshop-project') }}">
                                        <span class="sub-item">{{ __('text.projects') }}</span>
                                    </a>
                                </li>
                                <li class="{{ (request()->is('admin-panel/workshop-slider') ||
                                               request()->is('admin-panel/*/edit-workshop-slider')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/workshop-slider') }}">
                                        <span class="sub-item">{{ __('text.project_sliders') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ (request()->is('admin-panel/blog-category') ||
                                            request()->is('admin-panel/*/edit-blog-category') ||
                                            request()->is('admin-panel/blog') ||
                                            request()->is('admin-panel/*/edit-blog')) ? 'active submenu' : '' }}">
                        <a data-toggle="collapse" href="#sidebarLayouts3">
                            <i class="fab fa-blogger-b"></i>
                            <p>{{ __('text.blogs') }}</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ (request()->is('admin-panel/blog-category') ||
                                                 request()->is('admin-panel/*/edit-blog-category') ||
                                                 request()->is('admin-panel/blog') ||
                                                 request()->is('admin-panel/*/edit-blog')) ? 'show' : '' }}" id="sidebarLayouts3">
                            <ul class="nav nav-collapse">
                                <li class="{{ (request()->is('admin-panel/blog-category') ||
                                               request()->is('admin-panel/*/edit-blog-category')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/blog-category') }}">
                                        <span class="sub-item">{{ __('text.categories') }}</span>
                                    </a>
                                </li>
                                <li class="{{ (request()->is('admin-panel/blog') ||
                                               request()->is('admin-panel/*/edit-blog')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/blog') }}">
                                        <span class="sub-item">{{ __('text.blogs') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ (request()->is('admin-panel/gallery-category') ||
                                            request()->is('admin-panel/*/edit-gallery-category') ||
                                            request()->is('admin-panel/gallery') ||
                                            request()->is('admin-panel/*/edit-gallery')) ? 'active submenu' : '' }}">
                        <a data-toggle="collapse" href="#sidebarLayouts4">
                            <i class="fas fa-images"></i>
                            <p>{{ __('text.galleries') }}</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ (request()->is('admin-panel/gallery-category') ||
                                                 request()->is('admin-panel/*/edit-gallery-category') ||
                                                 request()->is('admin-panel/gallery') ||
                                                 request()->is('admin-panel/*/edit-gallery')) ? 'show' : '' }}" id="sidebarLayouts4">
                            <ul class="nav nav-collapse">
                                <li class="{{ (request()->is('admin-panel/gallery-category') ||
                                               request()->is('admin-panel/*/edit-gallery-category')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/gallery-category') }}">
                                        <span class="sub-item">{{ __('text.categories') }}</span>
                                    </a>
                                </li>
                                <li class="{{ (request()->is('admin-panel/gallery') ||
                                               request()->is('admin-panel/*/edit-gallery')) ? 'active' : '' }}">
                                    <a href="{{ url('admin-panel/gallery') }}">
                                        <span class="sub-item">{{ __('text.galleries') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ (request()->is('admin-panel/about-section')) ? 'active' : '' }}">
                        <a href="{{ url('admin-panel/about-section') }}">
                            <i class="fas fa-address-card"></i>
                            <p>{{ __('text.about_me') }}</p>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin-panel/resume-section') ||
                                            request()->is('admin-panel/*/edit-resume-section')) ? 'active' : '' }}">
                        <a href="{{ url('admin-panel/resume-section') }}">
                            <i class="fas fa-file-word"></i>
                            <p>{{ __('text.resume') }}</p>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin-panel/skill') ||
                                            request()->is('admin-panel/*/edit-skill')) ? 'active' : '' }}">
                        <a href="{{ url('admin-panel/skill') }}">
                            <i class="fas fa-toolbox"></i>
                            <p>{{ __('text.skills') }}</p>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin-panel/counter-section') ||
                                            request()->is('admin-panel/*/edit-counter-section')) ? 'active' : '' }}">
                        <a href="{{ url('admin-panel/counter-section') }}">
                            <i class="fas fa-clock"></i>
                            <p>{{ __('text.counter') }}</p>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin-panel/service-section') ||
                                            request()->is('admin-panel/*/edit-service-section')) ? 'active' : '' }}">
                        <a href="{{ url('admin-panel/service-section') }}">
                            <i class="fas fa-people-carry"></i>
                            <p>{{ __('text.services') }}</p>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin-panel/why-choose') ||
                                            request()->is('admin-panel/*/edit-why-choose')) ? 'active' : '' }}">
                        <a href="{{ url('admin-panel/why-choose') }}">
                            <i class="fas fa-bolt"></i>
                            <p>{{ __('text.why_choose') }}</p>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin-panel/team-section') ||
                                            request()->is('admin-panel/*/edit-team-section')) ? 'active' : '' }}">
                        <a href="{{ url('admin-panel/team-section') }}">
                            <i class="fas fa-users"></i>
                            <p>{{ __('text.team') }}</p>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin-panel/sponsor')) ? 'active' : '' }}">
                        <a href="{{ url('admin-panel/sponsor') }}">
                            <i class="fas fa-handshake"></i>
                            <p>{{ __('text.sponsor') }}</p>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin-panel/custom-section') ||
                                            request()->is('admin-panel/*/custom-section')) ? 'active' : '' }}">
                        <a href="{{ url('admin-panel/custom-section') }}">
                            <i class="fas fa-star"></i>
                            <p>{{ __('text.special') }}</p>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin-panel/any-page') ||
                                            request()->is('admin-panel/any-page/add-any-page') ||
                                            request()->is('admin-panel/*/any-page')) ? 'active' : '' }}">
                        <a href="{{ url('admin-panel/any-page') }}">
                            <i class="fas fa-file-alt"></i>
                            <p>{{ __('text.pages') }}</p>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin-panel/language-section') ||
                                            request()->is('admin-panel/*/language-section') ||
                                            request()->is('admin-panel/*/language-keyword')) ? 'active' : '' }}">
                        <a href="{{ url('admin-panel/language-section') }}">
                            <i class="fas fa-language"></i>
                            <p>{{ __('text.languages') }}</p>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin-panel/clear-cache')) ? 'active' : '' }}">
                        <a href="{{ url('admin-panel/clear-cache') }}">
                            <i class="fab fa-cloudscale"></i>
                            <p>{{ __('text.optimizer') }}</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">

        @yield('content')

        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright ml-auto">
                    2020, Powered <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.elsecolor.com">ElseColor</a>
                </div>
            </div>
        </footer>
    </div>

</div>

@yield('javascript')

<!-- Core JS Files -->
<script src="{{ asset('fibonacci/adminpanel/assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('fibonacci/adminpanel/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('fibonacci/adminpanel/assets/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('fibonacci/adminpanel/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('fibonacci/adminpanel/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('fibonacci/adminpanel/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Chart Circle JS -->
<script src="{{ asset('fibonacci/adminpanel/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables JS -->
<script src="{{ asset('fibonacci/adminpanel/assets/js/plugin/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('fibonacci/adminpanel/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- Atlantis JS -->
<script src="{{ asset('fibonacci/adminpanel/assets/js/atlantis.min.js') }}"></script>

<!-- DatetimePicker JS-->
<script src="{{ asset('fibonacci/adminpanel/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- CKEditor JS-->
<script src="{{ asset('fibonacci/adminpanel/assets/vendor/ckeditor5-build-classic/ckeditor.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('fibonacci/adminpanel/assets/js/custom.js') }}"></script>

</body>
</html>
