@extends('layouts.admin-panel.master')

@section('title', 'Settings')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.site_settings') }}</h4>
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
                        <a href="#">{{ __('text.site_settings') }}</a>
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
                            <h4 class="card-title">{{ __('text.site_settings') }}</h4>
                        </div>
                        <div class="card-body">
                            @if (isset($site_info))
                                <form action="{{ route('site-info.update', $site_info->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="copyright">{{ __('text.copyright') }} <span class="text-red">*</span></label>
                                        <input id="copyright" type="text" name="copyright" class="form-control" value="{{ $site_info->copyright }}" placeholder="{{ __('text.copyright') }}" required>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                    <div class="form-group p-0">
                                        <label for="faviconImage">{{ __('text.favicon') }} ({{ __('text.max') }} 128x128)(.ico, .png)</label>
                                        <input id="faviconImage" type="file" name="favicon" class="form-control-file">
                                    </div>
                                    <div class="card custom-card margin-top-20">
                                        <div class="card-header custom-header bg-light-grey">
                                            <h6>{{ __('text.current_favicon') }}</h6>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_info->favicon) }}"  class="img-fluid mx-auto d-block" alt="favicon icon">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                    <div class="form-group p-0">
                                        <label  for="whiteLogo">{{ __('text.white_logo') }} ({{ __('text.size') }} 124x32)(.png, .svg)</label>
                                        <input id="whiteLogo" type="file" name="white_logo" class="form-control-file">
                                    </div>
                                    <div class="card custom-card margin-top-20">
                                        <div class="card-header custom-header bg-light-grey">
                                            <h6>{{ __('text.current_white_logo') }}</h6>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_info->white_logo) }}"  class="img-fluid mx-auto d-block" alt="logo icon">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                    <div class="form-group p-0">
                                        <label for="blackLogo">{{ __('text.colored_logo') }} ({{ __('text.size') }} 124x32)(.png, .svg) <span class="text-red">*</span></label>
                                        <input id="blackLogo" type="file" name="colored_logo" class="form-control-file">
                                    </div>
                                    <div class="card custom-card margin-top-20">
                                        <div class="card-header custom-header bg-light-grey">
                                            <h6>{{ __('text.current_colored_logo') }}</h6>
                                        </div>

                                        <div class="card-body">
                                            <img src="{{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_info->colored_logo) }}"  class="img-fluid mx-auto d-block" alt="logo icon">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                    <div class="form-group p-0">
                                        <label for="footer_logo">{{ __('text.footer_logo') }} ({{ __('text.size') }} 208x55)(.png, .svg) <span class="text-red">*</span></label>
                                        <input id="footer_logo" type="file" name="footer_logo" class="form-control-file">
                                    </div>
                                    <div class="card custom-card margin-top-20">
                                        <div class="card-header custom-header bg-light-grey">
                                            <h6>{{ __('text.current_footer_logo') }}</h6>
                                        </div>

                                        <div class="card-body">
                                            <img src="{{ asset('fibonacci/adminpanel/assets/img/icon/'.$site_info->footer_logo) }}"  class="img-fluid mx-auto d-block" alt="footer-logo icon">
                                        </div>
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
                                <form action="{{ route('site-info.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="copyright">{{ __('text.copyright') }} <span class="text-red">*</span></label>
                                                <input id="copyright"  type="text" name="copyright" class="form-control" placeholder="{{ __('text.copyright') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="form-group p-0">
                                                <label for="faviconImage">{{ __('text.favicon') }} ({{ __('text.max') }} 128x128)(.ico, .png) <span class="text-red">*</span></label>
                                                <input id="faviconImage" type="file" name="favicon" class="form-control-file" required>
                                            </div>
                                            <div class="card custom-card margin-top-20">
                                                <div class="card-header custom-header bg-light-grey">
                                                    <h6>{{ __('text.current_favicon') }}</h6>
                                                </div>
                                                <div class="card-body">
                                                    <span>{{ __('text.not_yet_created') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="form-group p-0">
                                                <label  for="whiteLogo">{{ __('text.white_logo') }} ({{ __('text.size') }} 124x32)(.png, .svg) <span class="text-red">*</span></label>
                                                <input id="whiteLogo" type="file" name="white_logo" class="form-control-file" required>
                                            </div>
                                            <div class="card custom-card margin-top-20">
                                                <div class="card-header custom-header bg-light-grey">
                                                    <h6>{{ __('text.current_white_logo') }}</h6>
                                                </div>
                                                <div class="card-body">
                                                    <span>{{ __('text.not_yet_created') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="form-group p-0">
                                                <label for="blackLogo">{{ __('text.colored_logo') }} ({{ __('text.size') }} 124x32)(.png, .svg) <span class="text-red">*</span></label>
                                                <input id="blackLogo" type="file" name="colored_logo" class="form-control-file" required>
                                            </div>
                                            <div class="card custom-card margin-top-20">
                                                <div class="card-header custom-header bg-light-grey">
                                                    <h6>{{ __('text.current_colored_logo') }}</h6>
                                                </div>
                                                <div class="card-body">
                                                    <span>{{ __('text.not_yet_created') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="form-group p-0">
                                                <label for="preloader">{{ __('text.footer_logo') }} ({{__('text.size')}} 208x55)(.png, .svg) <span class="text-red">*</span></label>
                                                <input id="preloader" type="file" name="footer_logo" class="form-control-file" required>
                                            </div>
                                            <div class="card custom-card margin-top-20">
                                                <div class="card-header custom-header bg-light-grey">
                                                    <h6>{{ __('text.current_footer_logo') }} </h6>
                                                </div>
                                                <div class="card-body">
                                                    <span>{{ __('text.not_yet_created') }}</span>
                                                </div>
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
