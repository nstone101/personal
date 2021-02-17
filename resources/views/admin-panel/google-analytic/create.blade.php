@extends('layouts.admin-panel.master')

@section('title', 'Google Analytic')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.google_analytic') }}</h4>
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
                        <a href="#">{{ __('text.google_analytic') }}</a>
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
                            <h4 class="card-title">{{ __('text.google_analytic') }}</h4>
                        </div>
                        <div class="card-body">
                            @if(isset($google_analytic))
                                <form action="{{ route('google-analytic.update', $google_analytic->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="google_analytic_code">{{ __('text.google_analytic_code') }} <span class="text-red">*</span></label>
                                        <input id="google_analytic_code" type="text" name="google_analytic_code" class="form-control" value="{{ $google_analytic->google_analytic_code }}" placeholder="{{ __('UA-128285582-7') }}" required>
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
                                <form action="{{ route('google-analytic.store') }}" method="POST">
                                    @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="google_analytic_code">{{ __('text.google_analytic_code') }} <span class="text-red">*</span></label>
                                                    <input id="google_analytic_code" type="text" name="google_analytic_code" class="form-control"  placeholder="{{ __('UA-128285582-7') }}" required>
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
