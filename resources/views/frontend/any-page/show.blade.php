@extends('layouts.frontend.master')

@section('title', 'Page')

@section('content')

    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section section" style="
    @if($any_page->breadcrumb_image != '')  background-image: url('{{ asset('fibonacci/adminpanel/assets/img/breadcrumb/page-breadcrumb/'.$any_page->breadcrumb_image) }}');
    @elseif (isset($breadcrumb)) background-image: url('{{ asset('fibonacci/adminpanel/assets/img/breadcrumb/'.$breadcrumb->breadcrumb_image) }}');
    @else background-image: url('{{ asset('fibonacci/adminpanel/assets/img/dummy/1903x750.png') }}');
    @endif">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-inner text-center">
                        <h1>{{ $any_page->page_title }}</h1>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{url('/')}}">{{ __('frontend.home') }}</a>
                            </li>
                            <li>
                                {{ $any_page->page_title }}
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

    <!-- Blog Single Section Start -->
    <section class="portfolio-single-section blog-single-section section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if ($message = Session::get('success'))
                        <div id="alert_message" class="alert alert-success custom-alert alert-dismissible fade show mb-50" role="alert">
                            <span>{{ __($message) }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('frontend.close') }}">
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
            <div class="blog-single-inner">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <p class="blog-inner-text">@php echo html_entity_decode($any_page->description); @endphp</p>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="blog-sidebar">
                            <div class="blog-widgets">
                                <div class="project-details">
                                    <h5 class="inner-header-title">{{ __('frontend.page_share') }}</h5>
                                    <ul class="project-share">
                                        <li>
                                            <a href="{{$any_page->getShareUrl('whatsapp')}}" class="project-share-link" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{$any_page->getShareUrl('twitter')}}" class="project-share-link" target="_blank"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{$any_page->getShareUrl('pinterest')}}" class="project-share-link" target="_blank"><i class="fab fa-pinterest"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .row -->
            </div>
        </div>
        <!-- .container -->
    </section>
    <!-- Blog Single Section End -->

@endsection
