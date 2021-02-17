@extends('layouts.admin-panel.master')

@section('title', 'Slider View')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.slider_view') }}</h4>
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
                        <a href="#">{{ __('text.hero_settings') }}</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ __('text.slider_view') }}</a>
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
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">{{ __('text.sliders') }}</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>&nbsp;{{ __('text.add_image') }}
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
														<span class="fw-mediumbold">
														{{ __('text.new') }}</span>
                                                <span class="fw-light">
															{{ __('text.image') }}
														</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('text.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('slider-view.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="image">{{ __('text.image') }} ({{ __('text.size') }} 1920x1080)(.png, .jpg, .jpeg) <span class="text-red">*</span></label>
                                                            <input id="image" type="file" name="slider_image" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 ">
                                                        <div class="form-group form-group-default">
                                                            <label for="order">{{ __('text.order') }}</label>
                                                            <input id="order" type="number" name="order" class="form-control" placeholder="{{ __('text.order_here') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="spinner fa fa-spinner fa-spin"></i> {{ __('text.add') }}
                                            </button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('text.close') }}</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                @if(count($slider_views) > 0)
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th>{{ __('text.image') }}</th>
                                        <th>{{ __('text.order') }}</th>
                                        <th style="width: 10%">{{ __('text.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>{{ __('text.image') }}</th>
                                        <th>{{ __('text.order') }}</th>
                                        <th>{{ __('text.action') }}</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($slider_views as $slider_view)
                                        <tr>
                                            <td><img class="image-size image-margin" src="{{ asset('fibonacci/adminpanel/assets/img/slider/'.$slider_view->slider_image) }}" alt="banner image"></td>
                                            <td>{{ $slider_view->order }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('slider-view.edit',$slider_view->id) }}" data-toggle="tooltip"  class="btn btn-link btn-primary btn-lg" data-original-title="{{ __('text.edit_image') }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form class="d-inline-block" action="{{ route('slider-view.destroy', $slider_view->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                       <span data-toggle="modal" data-target="#deleteModel{{ $slider_view->id }}">
                                                            <button  type="button" data-toggle="tooltip"  class="btn btn-link btn-danger btn-lg" data-original-title="{{ __('text.remove') }}">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                       </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{ $slider_view->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('text.delete') }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('text.close') }}">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        {{ __('text.you_wont_be_able_to_revert_this') }}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('text.cancel') }}</button>
                                                                        <button type="submit" class="btn btn-success">{{ __('text.yes_delete_it') }}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @else
                                    {{ __('text.no_records_created_yet') }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
