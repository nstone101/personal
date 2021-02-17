@extends('layouts.admin-panel.master')

@section('title', 'Edit Skill Item')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.edit_skill_item') }}</h4>
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
                        <a href="#">{{ __('text.edit_skill_item') }}</a>
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
                            <h4 class="card-title">{{ __('text.edit_skill_item') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('skill.update', $skill_item->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="text">{{ __('text.text') }} <span class="text-red">*</span></label>
                                        <input id="text" type="text" name="text" class="form-control" value="{{ $skill_item->text }}"  placeholder="{{ __('text.text_here') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="percent">{{ __('text.percent') }} <span class="text-red">*</span></label>
                                        <input id="percent" type="number" name="percent" class="form-control"  value="{{ $skill_item->percent }}"  placeholder="{{ __('text.percent_rate_here') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="order">{{ __('text.order') }}</label>
                                        <input id="order" type="number" name="order" class="form-control" value="{{ $skill_item->order }}"  placeholder="{{ __('text.order_here') }}">
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
