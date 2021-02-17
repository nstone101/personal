@extends('layouts.frontend.master')

@section('title', 'Gallery')

@section('content')

    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section section" style="@if (isset($breadcrumb)) background-image: url('{{ asset('fibonacci/adminpanel/assets/img/breadcrumb/'.$breadcrumb->breadcrumb_image) }}'); @else background-image: url('{{ asset('fibonacci/adminpanel/assets/img/dummy/1903x750.png') }}'); @endif">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-inner text-center">
                        <h1>{{ $gallery_category->category_name }}</h1>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{url('/')}}">{{ __('frontend.home') }}</a>
                            </li>
                            <li>
                                {{ $gallery_category->category_name }}
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

    <!-- Portfolio Grid Section Start -->
    <section class="portfolio-grid-section pb-minus-70 section">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-4">
                    <div class="gallery-select-filter-wrap">
                        <form class="form-inline" action="{{ route('gallery-page.category-select') }}" method="POST">
                            @csrf
                            <div class="form-group mr-2">
                                <select name="gallery_category_name" class="custom-select" required>
                                    @foreach ($gallery_categories as $category)
                                        <option value="{{ $category->slug }}" {{ $category->id === $gallery_category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="select-button">{{ __('frontend.select') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- .row -->
            <div class="row portfolio-grid">
                @if (count($galleries) > 0)
                    @foreach ($galleries as $gallery)
                        <div class="col-md-6 col-lg-4 glry-item col-sm-12">
                            <div class="portfolio-inner">
                                <div class="portfolio-back">
                                    <div class="portfolio-buttons">
                                        <a href="{{ asset('fibonacci/adminpanel/assets/img/gallery/'.$gallery->gallery_image) }}" class="portfolio-zoom-link">
                                            <i class="fas fa-search"></i>
                                        </a>
                                        @if ($gallery->external_url != '')
                                            <a href="{{ $gallery->external_url }}" class="portfolio-details-link">
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                            @endif
                                    </div>
                                </div>
                                <img src="{{ asset('fibonacci/adminpanel/assets/img/gallery/'.$gallery->gallery_image) }}"  alt="{{ $gallery->gallery_image }}" class="img-fluid portfolio-img">
                                <h6 class="project-title">{{ $gallery->display_name }} <span>{{ $gallery->note }}</span></h6>
                            </div>
                        </div>
                    @endforeach

                    @else
                    <div class="col">
                        <span>{{ __('frontend.no_records_created_yet') }}</span>
                    </div>
                @endif
            </div>
            <!-- .row -->
            @if (count($galleries) > 0)
            <div class="pagination-wrap">
                {{ $galleries->links() }}
            </div>
                @endif
        </div>
        <!-- .container -->
    </section>
    <!-- Portfolio Grid Section End -->

@endsection
