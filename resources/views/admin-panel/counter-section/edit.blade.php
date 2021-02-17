@extends('layouts.admin-panel.master')

@section('title', 'Edit Counter')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.edit_counter') }}</h4>
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
                        <a href="#">{{ __('text.edit_counter') }}</a>
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
                            <h4 class="card-title">{{ __('text.edit_counter') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('counter-section.update', $counter->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="icon">{{ __('text.icon') }} <span class="text-red">*</span></label>
                                            <input id="icon" type="text" name="icon" class="form-control" value="{{ $counter->icon }}" placeholder="fas fa-user" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="timer">{{ __('text.timer') }}  <span class="text-red">*</span></label>
                                            <input id="timer" type="number" name="timer" class="form-control" value="{{ $counter->timer }}" placeholder="{{ __('text.timer_here') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="heading">{{ __('text.heading') }}  <span class="text-red">*</span></label>
                                            <input id="heading" type="text" name="heading" class="form-control" value="{{ $counter->heading }}" placeholder="{{ __('text.heading_here') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <i><span class="text-red">{{ __('text.example_icon_usage') }}</span> fas fa-user</i><br>
                                            <i><span class="text-red">{{ __('text.free_use') }}</span><a href="https://fontawesome.com/" target="_blank"> {{ __('Font Awesome') }}</a></i>
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
