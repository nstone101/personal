@extends('layouts.admin-panel.master')

@section('title', 'Edit Special Section')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.edit_special_section') }}</h4>
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
                        <a href="#">{{ __('text.edit_special_section') }}</a>
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
                            <h4 class="card-title">{{ __('text.edit_special_section') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('custom-section.update', $special_section->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="title">{{ __('text.title') }} <span class="text-red">*</span></label>
                                        <input id="title" type="text" name="title" class="form-control" value="{{ $special_section->title }}"  placeholder="{{ __('text.title_here') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="description">{{ __('text.description') }} <span class="text-red">*</span></label>
                                        <textarea id="editor"  class="form-control" name="description" placeholder="{{ __('text.description_here') }}">@php echo html_entity_decode($special_section->description); @endphp</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="order">{{ __('text.order') }}</label>
                                        <input id="order" type="number" name="order" class="form-control" value="{{ $special_section->order }}"  placeholder="{{ __('text.order_here') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group  p-0 margin-bottom-20 mt-0">
                                        <label for="btn_name">{{ __('text.btn_name') }}</label>
                                        <input id="btn_name" type="text" name="btn_name" class="form-control"  value="{{ $special_section->btn_name }}" placeholder="{{ __('text.btn_name_here') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group  p-0 margin-bottom-20 mt-0">
                                        <label for="btn_link">{{ __('text.btn_link') }}</label>
                                        <input id="btn_link" type="text" name="btn_link" class="form-control"  value="{{ $special_section->btn_link }}" placeholder="{{ __('text.btn_link_here') }}">
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
