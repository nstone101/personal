@extends('layouts.admin-panel.master')

@section('title', 'Seo')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.seo') }}</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ url('admin-panel/dashboard') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ __('text.settings') }}</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ __('text.seo') }}</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-12">
                    @if ($message = Session::get('success'))
                        <div id="alert_message" class="alert alert-success custom-alert alert-dismissible fade show" role="alert">
                            <span>{{ $message }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div id="alert_message" class="alert alert-danger custom-alert alert-dismissible fade show" role="alert">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('text.seo') }}</h4>
                        </div>
                        <div class="card-body">
                            @if (isset($seo))
                                <form action="{{ route('seo.update', $seo->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="name">{{ __('text.site_title') }} ({{ __('text.characters_left_70') }}) <span class="text-red">*</span></label>
                                        <input id="name" type="text" name="site_name" class="form-control" value="{{ $seo->site_name }}"  placeholder="{{ __('text.title_must_be_within_70_characters') }}" required>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="desc">{{ __('text.site_description') }} ({{ __('text.characters_left_150') }}) <span class="text-red">*</span></label>
                                        <textarea id="desc"  name="site_description" class="form-control" rows="5" placeholder="{{ __('text.description_must_be_within_150_characters') }}" required>{{ $seo->site_description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="keyword">{{ __('text.site_keywords') }} ({{ __('text.seperate_with_commas') }}) <span class="text-red">*</span></label>
                                        <textarea id="keyword"  name="site_keywords" class="form-control" rows="5" placeholder="{{ __('text.keywords') }}" required>{{ $seo->site_keywords }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="fb_app_id" data-toggle="tooltip" title="{{ __('In order to use Facebook Insights you must add the app ID to your page. Insights lets you view analytics for traffic to your site from Facebook. Find the app ID in your App Dashboard.') }}">{{ __('fb:app_id') }}</label>
                                        <input id="fb_app_id" type="text" name="fb_app_id" class="form-control" value="{{ $seo->fb_app_id }}" placeholder="{{ __('151295074873255') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">
                                        <i class="spinner fa fa-spinner fa-spin"></i> {{ __('text.update') }}
                                    </button>
                                </div>
                            </div>
                                </form>
                                @else
                                <form action="{{ route('seo.store') }}" method="POST">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="name">{{ __('text.site_title') }} ({{ __('text.characters_left_70') }}) <span class="text-red">*</span></label>
                                                <input id="name" type="text" name="site_name" class="form-control"   placeholder="{{ __('text.title_must_be_within_70_characters') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="desc">{{ __('text.site_description') }} ({{ __('text.characters_left_150') }}) <span class="text-red">*</span></label>
                                                <textarea id="desc"  name="site_description" class="form-control" rows="5" placeholder="{{ __('text.description_must_be_within_150_characters') }}" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="keyword">{{ __('text.site_keywords') }} ({{ __('text.seperate_with_commas') }}) <span class="text-red">*</span></label>
                                                <textarea id="keyword"  name="site_keywords" class="form-control" rows="5" placeholder="{{ __('text.keywords') }}" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="fb_app_id" data-toggle="tooltip" title="{{ __('In order to use Facebook Insights you must add the app ID to your page. Insights lets you view analytics for traffic to your site from Facebook. Find the app ID in your App Dashboard.') }}">{{ __('fb:app_id') }}</label>
                                                <input id="fb_app_id" type="text" name="fb_app_id" class="form-control" placeholder="{{ __('151295074873255') }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">
                                                <i class="spinner fa fa-spinner fa-spin"></i> {{ __('text.create') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
