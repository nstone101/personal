@extends('layouts.admin-panel.master')

@section('title', 'Color Picker')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.color') }}</h4>
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
                        <a href="#">{{ __('text.color') }}</a>
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
                            <h4 class="card-title">{{ __('text.color') }}</h4>
                        </div>
                        <div class="card-body">
                            @if(isset($color_picker))
                                <form action="{{ route('color-picker.update', $color_picker->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="color_code">{{ __('text.color_code') }} <span class="text-red">*</span></label>
                                                <input id="color_code" type="text" name="color_code" class="form-control" value="{{ $color_picker->color_code }}" placeholder="{{ __('#00e878') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="rgba">{{ __('text.rgba') }} <span class="text-red">*</span></label>
                                                <input id="rgba" type="text" name="rgba" class="form-control" value="{{ $color_picker->rgba }}" placeholder="{{ __('255, 85, 0') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="footer_color_code">{{ __('text.footer_color_code') }} <span class="text-red">*</span></label>
                                                <input id="footer_color_code" type="text" name="footer_color_code" class="form-control" value="{{ $color_picker->footer_color_code }}" placeholder="{{ __('#141414') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="copyright_code">{{ __('text.copyright_code') }} <span class="text-red">*</span></label>
                                                <input id="copyright_code" type="text" name="copyright_code" class="form-control" value="{{ $color_picker->color_code }}" placeholder="{{ __('#1a1a1a') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group margin-bottom-20 p-0">
                                                <i><span class="text-red d-block">Default Color Code: #ff5500</span></i>
                                                <i><span class="text-red d-block">Default Button Wave Effect: 255, 85, 0</span></i>
                                                <i><span class="text-red d-block">Default Footer Color Code: #141414</span></i>
                                                <i><span class="text-red d-block">Default Copyright Code: #1a1a1a</span></i>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <button type="submit" class="btn btn-success">
                                                <i class="spinner fa fa-spinner fa-spin"></i> {{ __('text.update') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('color-picker.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="color_code">{{ __('text.color_code') }} <span class="text-red">*</span></label>
                                                <input id="color_code" type="text" name="color_code" class="form-control"  placeholder="{{ __('#00e878') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="rgba">{{ __('text.rgba') }} <span class="text-red">*</span></label>
                                                <input id="rgba" type="text" name="rgba" class="form-control" placeholder="{{ __('255, 85, 0') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="footer_color_code">{{ __('text.footer_color_code') }} <span class="text-red">*</span></label>
                                                <input id="footer_color_code" type="text" name="footer_color_code" class="form-control" placeholder="{{ __('#141414') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="copyright_code">{{ __('text.copyright_code') }} <span class="text-red">*</span></label>
                                                <input id="copyright_code" type="text" name="copyright_code" class="form-control" placeholder="{{ __('#1a1a1a') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group margin-bottom-20 p-0">
                                                <i><span class="text-red d-block">Default Color Code: #ff5500</span></i>
                                                <i><span class="text-red d-block">Default Button Wave Effect: 255, 85, 0</span></i>
                                                <i><span class="text-red d-block">Default Footer Color Code: #141414</span></i>
                                                <i><span class="text-red d-block">Default Copyright Code: #1a1a1a</span></i>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
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
