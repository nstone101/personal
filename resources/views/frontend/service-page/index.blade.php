@extends('layouts.frontend.master')

@section('title', 'Services')

@section('content')

    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section section" style="@if (isset($breadcrumb)) background-image: url('{{ asset('fibonacci/adminpanel/assets/img/breadcrumb/'.$breadcrumb->breadcrumb_image) }}'); @else background-image: url('{{ asset('fibonacci/adminpanel/assets/img/dummy/1903x750.png') }}'); @endif">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-inner text-center">
                        <h1>{{ __('frontend.services') }}</h1>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{url('/')}}">{{ __('frontend.home') }}</a>
                            </li>
                            <li>
                                {{ __('frontend.services') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    <!-- Breadcrumb Section end -->

    <!-- Services Page Section Start -->
    @if (count($services) > 0)
        <section class="services-page-section section">
            <div class="container">
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-md-6 col-lg-4 col-sm-12 services-item-resp">
                            <div class="services-box">
                                <div class="services-box-body">
                                    <i class="{{ $service->icon }}"></i>
                                    <h5>{{ $service->title }}</h5>
                                    <p>{{ $service->description }}</p>
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
        <section class="services-page-section section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 col-sm-12 services-item-resp">
                        <div class="services-box">
                            <div class="services-box-body">
                                <i class="fas fa-draw-polygon"></i>
                                <h5>Logo Design</h5>
                                <p>
                                    Get top Graphic Design professionals to create your business or personal logos and infographics. From minimal and modern, flat, 3D, character, creative iconography, and of course brilliant text logos without limits. We'll keep making them until we get it right. Our service prices start at $120 for a branding and style guide as well as a text or modern minimal logo design custom made to stand out in 2021. Ask about our re-branding services, it's an even greater standout service that we provide that includes logo design, as well as naming, domain acquisitioning and negotiating (*if the domain exists but is owned we will negotiate for it at the lowest possible price, our ability to do it better than most is our over 500 premium domains that we own and register privately at any given time, we're one of the largest private holders of domain names in business space with TLDs .com, .digital .co, .net, and .io but there's more, all of our domains are high demand and we deal in these negotiations with private domain owners and brokers, and domain registrars or hosting providers all the time and our ability to trade profitable domains gives us the upper hand on most negotiations whether it's through another broker we trade valuable domains in exchange for their purchasing our wanted domain or we directly buy or trade for your special specific brands domain to-be, if required. More times than not, we can get you a more clever, shorter (5-6 letter domain or high demand keyword domains with unique and creative play on your brand.. i.e. Kansas City's incubator - InKCubate.com, bitnovia.com, agrim.site) know how to maximize the most out of domains for SEO purposes so doing the naming, branding, and domains altogether are a major step and a time consuming part of starting or re-launching a business under a newly created brand or public image.)
                                </p>
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
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
    @endif
    <!-- Services Page Section End -->

    <!-- Why Choose Me Start -->
    @if ($section_arr['why_choose'] == 1)
    @if (isset($why_choose_section))
        <section class="why-choose-me section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 services-image">
                        <img src="{{ asset('fibonacci/adminpanel/assets/img/why-choose/'.$why_choose_section->why_choose_image) }}"  class="img-fluid" alt="why-choose image">
                    </div>
                    <div class="col-lg-6">
                        <div class="why-choose-me-inner">
                            <h4 class="why-choose-me-title">{{ $why_choose_section->title }}</h4>
                            <p class="why-choose-me-text">{{ $why_choose_section->description }}</p>
                            <div class="row">
                               @foreach ($why_choose_items as $why_choose_item)
                                    <div class="col-md-6 why-choose-me-box">
                                        <div class="why-choose-me-item">
                                            <div class="why-choose-me-icon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <h6>{{ $why_choose_item->item }}</h6>
                                        </div>
                                    </div>
                                   @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        @else
        <section class="why-choose-me section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 services-image">
                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/520x520.png') }}" class="img-fluid" alt="why-choose image">
                    </div>
                    <div class="col-lg-6">
                        <div class="why-choose-me-inner">
                            <h4 class="why-choose-me-title">why should you work with me ?</h4>
                            <p class="why-choose-me-text">
                                Many reasons, but namely because i'm a professional with a great bag of highly useful skills including taking on multiple roles or large projects and being able to dissect what needs to be done, organize that information for development and design for executives and non-technical personnel as well as advanced teams of developers and engineers. My company takes on projects from other companies because we do just that with our spin on optimization and automation of tasks and practices. Cloud computing now allows for even higher levels of coordination of efforts into well-oiled multi-functional and centralized systems of technology management.
                            </p>
                            <p class="why-choose-me-text">
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it
                                to make a type specimen book.
                            </p>
                            <div class="row">
                                <div class="col-md-6 why-choose-me-box">
                                    <div class="why-choose-me-item">
                                        <div class="why-choose-me-icon">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <h6>Full Responsive Design</h6>
                                    </div>
                                </div>
                                <div class="col-md-6 why-choose-me-box">
                                    <div class="why-choose-me-item">
                                        <div class="why-choose-me-icon">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <h6>Unique & Modern Design</h6>
                                    </div>
                                </div>
                                <div class="col-md-6 why-choose-me-box">
                                    <div class="why-choose-me-item">
                                        <div class="why-choose-me-icon">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <h6>Enterprise IT &amp; Data Compliance</h6>
                                    </div>
                                </div>
                                <div class="col-md-6 why-choose-me-box">
                                    <div class="why-choose-me-item">
                                        <div class="why-choose-me-icon">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <h6>Seo & Digital Marketing</h6>
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
    <!-- Why Choose Me End -->

    <!-- Partners Carousel Section Start -->
    @if ($section_arr['sponsor'] == 1)
    @if (count($sponsors) > 0)
        <section class="partners">
            <div class="container">
                <div class="partners-carousel owl-carousel owl-theme">
                    @foreach ($sponsors as $sponsor)
                        <div class="client-box item">
                            <img src="{{ asset('fibonacci/adminpanel/assets/img/partner/'.$sponsor->sponsor_image) }}" class="img-fluid"  alt="partners image">
                        </div>
                        @endforeach
                </div>
            </div>
        </section>
        @else
        <section class="partners">
            <div class="container">
                <div class="partners-carousel owl-carousel owl-theme">
                    <!-- Clients Item 1 -->
                    <div class="client-box item">
                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/150x150.png') }}" class="img-fluid"  alt="partners image">
                    </div>
                    <!-- Clients Item 2 -->
                    <div class="client-box item">
                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/150x150.png') }}" class="img-fluid"  alt="partners image">
                    </div>
                    <div class="client-box item">
                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/150x150.png') }}" class="img-fluid"  alt="partners image">
                    </div>
                    <div class="client-box item">
                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/150x150.png') }}" class="img-fluid"  alt="partners image">
                    </div>
                    <div class="client-box item">
                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/150x150.png') }}" class="img-fluid"  alt="partners image">
                    </div>
                    <div class="client-box item">
                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/150x150.png') }}" class="img-fluid" alt="partners image">
                    </div>
                    <div class="client-box item">
                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/150x150.png') }}" class="img-fluid" alt="partners image">
                    </div>
                    <div class="client-box item">
                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/150x150.png') }}" class="img-fluid" alt="partners image">
                    </div>
                </div>
            </div>
        </section>
        @endif
        @endif
    <!-- Partners Carousel Section End -->

@endsection
