@extends('layouts.admin-panel.master')

@section('title', 'Edit Page')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.edit_page') }}</h4>
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
                        <a href="#">{{ __('text.edit_page') }}</a>
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
                            <h4 class="card-title">{{ __('text.edit_page') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('any-page.update', $any_page->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="pageTitle">{{ __('text.page_title') }} <span class="text-red">*</span></label>
                                            <input id="pageTitle" name="page_title" class="form-control" value="{{ $any_page->page_title }}" placeholder="{{ __('text.page_title_here') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="editor">{{ __('text.description') }} <span class="text-red">*</span></label>
                                            <textarea id="editor" class="form-control"  name="description" placeholder="{{ __('text.description_here') }}">@php echo html_entity_decode($any_page->description); @endphp</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="order">{{ __('text.order') }}</label>
                                            <input id="order" type="number" name="order" class="form-control" value="{{ $any_page->order }}" placeholder="{{ __('text.order_here') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="status">{{ __('text.status') }}</label>
                                            <select class="form-control" name="status" id="status">
                                                <option></option>
                                                <option value="1" {{ $any_page->status === 1 ? 'selected' : '' }}>{{ __('text.active') }}</option>
                                                <option value="0" {{ $any_page->status === 0 ? 'selected' : '' }}>{{ __('text.inactive') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="breadcrumbImage">{{ __('text.image') }} ({{ __('text.size') }} 1920x750)(.png, .jpg, .jpeg)</label>
                                            <input id="breadcrumbImage" type="file" name="breadcrumb_image" class="form-control-file">
                                            @if ($any_page->breadcrumb_image == '')
                                                <i class="far fa-image custom-font-size image-margin img-fluid d-block text-center"></i>
                                            @else
                                                <img class="image-size margin-top-20  img-fluid" src="{{ asset('fibonacci/adminpanel/assets/img/breadcrumb/page-breadcrumb/'.$any_page->breadcrumb_image) }}" alt="breadcrumb image">
                                            @endif
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