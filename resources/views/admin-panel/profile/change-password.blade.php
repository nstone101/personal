@extends('layouts.admin-panel.master')

@section('title', 'Change Password')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.change_password') }}</h4>
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
                        <a href="#">{{ __('text.change_password') }}</a>
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
                    @if ($message = Session::get('warning'))
                        <div id="alert_message" class="alert alert-warning custom-alert alert-dismissible fade show" role="alert">
                            <span>{{ $message }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div id="alert_message" class="alert alert-danger custom-alert alert-dismissible fade show" role="alert">
                            <strong>{{ __('Whoops!') }}</strong> {{ __('There were some problems with your input.') }}<br><br>
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
                            <h4 class="card-title">{{ __('text.change_password') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.change_password_update') }}" method="POST">
                                @method('PUT')
                                @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="currentPass">{{ __('text.current_password') }} <span class="text-red">*</span></label>
                                        <input id="currentPass" name="current_password" type="password" class="form-control"  placeholder="{{ __('text.current_password_here') }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="password">{{ __('text.new_password') }} <span class="text-red">*</span></label>
                                        <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('text.new_password_here') }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="confirmPass">{{ __('text.confirm_password') }} <span class="text-red">*</span></label>
                                        <input id="confirmPass" name="password_confirmation" type="password" class="form-control" placeholder="{{ __('text.confirm_password_here') }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">
                                        <i class="spinner fa fa-spinner fa-spin"></i> {{ __('text.update') }}
                                    </button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
