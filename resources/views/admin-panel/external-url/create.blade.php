@extends('layouts.admin-panel.master')

@section('title', 'External Url')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.external_url') }}</h4>
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
                        <a href="#">{{ __('text.external_url') }}</a>
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
                            <h4 class="card-title">{{ __('text.external_url') }}</h4>
                        </div>
                        <div class="card-body">
                            @if(isset($external_url))
                                <form action="{{ route('external-url.update', $external_url->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="btn_name">{{ __('text.btn_name') }} <span class="text-red">*</span></label>
                                                <input id="btn_name" type="text" name="btn_name" class="form-control" value="{{ $external_url->btn_name }}" placeholder="{{ __('text.btn_name_here') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="btn_link">{{ __('text.external_url') }} <span class="text-red">*</span></label>
                                                <input id="btn_link" type="text" name="btn_link" class="form-control" value="{{ $external_url->btn_link }}" placeholder="{{ __('text.external_url_here') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="status">{{ __('text.status') }}</label>
                                                <select class="form-control" name="status" id="status">
                                                    <option></option>
                                                    <option value="1" {{ $external_url->status === 1 ? 'selected' : '' }}>{{ __('text.active') }}</option>
                                                    <option value="0" {{ $external_url->status === 0 ? 'selected' : '' }}>{{ __('text.inactive') }}</option>
                                                </select>
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
                                <form action="{{ route('external-url.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="btn_name">{{ __('text.btn_name') }} <span class="text-red">*</span></label>
                                                <input id="btn_name" type="text" name="btn_name" class="form-control"  placeholder="{{ __('text.btn_name_here') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="btn_link">{{ __('text.external_url') }} <span class="text-red">*</span></label>
                                                <input id="btn_link" type="text" name="btn_link" class="form-control"  placeholder="{{ __('text.external_url_here') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="status">{{ __('text.status') }}</label>
                                                <select class="form-control" name="status" id="status">
                                                    <option></option>
                                                    <option value="1">{{ __('text.active') }}</option>
                                                    <option value="0">{{ __('text.inactive') }}</option>
                                                </select>
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
