@extends('layouts.frontend.master')

@section('title', 'All Projects')

@section('content')

    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section section" style="@if (isset($breadcrumb)) background-image: url('{{ asset('fibonacci/adminpanel/assets/img/breadcrumb/'.$breadcrumb->breadcrumb_image) }}'); @else background-image: url('{{ asset('fibonacci/adminpanel/assets/img/dummy/1903x750.png') }}'); @endif">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-inner text-center">
                        <h1>{{ __('frontend.portfolio') }}</h1>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{url('/')}}">{{ __('frontend.home') }}</a>
                            </li>
                            <li>
                                {{ __('frontend.portfolio') }}
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

    <!-- Portfolio Start -->
    @if (count($workshop_projects) > 0)
        <section class="section portfolio-section pb-minus-70">
            <div class="container">
                <!-- .row -->
                <div class="portfolio-filter-wrap">
                    <div class="portfolio-filter d-flex align-items-center justify-content-center">
                        <a href="#0" data-gallery-filter="*" class="current">All</a>
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
        <section class="section portfolio-section pb-minus-70">
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
    <!-- Portfolio End -->

@endsection
