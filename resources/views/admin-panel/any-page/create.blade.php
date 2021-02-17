@extends('layouts.admin-panel.master')

@section('title', 'Create Page')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.create_page') }}</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ url('admin-panel') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ __('text.create_page') }}</a>
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
                            <h4 class="card-title">{{ __('text.create_page') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('any-page.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="pageTitle">{{ __('text.page_title') }} <span class="text-red">*</span></label>
                                        <input id="pageTitle" name="page_title" class="form-control" placeholder="{{ __('text.page_title_here') }}" required>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="editor">{{ __('text.description') }} <span class="text-red">*</span></label>
                                        <textarea id="editor" class="form-control"  name="description" placeholder="{{ __('text.description_here') }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="order">{{ __('text.order') }}</label>
                                        <input id="order" type="number" name="order" class="form-control" placeholder="{{ __('text.order_here') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="status">{{ __('text.status') }}</label>
                                        <select name="status" class="form-control" id="status">
                                            <option></option>
                                            <option value="1">{{ __('text.active') }}</option>
                                            <option value="0">{{ __('text.inactive') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="breadcrumbImage">{{ __('text.breadcrumb') }} ({{ __('text.size') }} 1920x750)(.png, .jpg, .jpeg)</label>
                                        <input id="breadcrumbImage" type="file" name="breadcrumb_image" class="form-control-file">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">
                                        <i class="spinner fa fa-spinner fa-spin"></i> {{ __('text.create') }}
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