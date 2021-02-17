@extends('layouts.admin-panel.master')

@section('title', 'Why Choose Section')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.why_choose') }}</h4>
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
                        <a href="#">{{ __('text.why_choose') }}</a>
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
                                <h4 class="card-title">{{ __('text.skills') }}</h4>
                                <div class="ml-auto">
                                    <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#addRowModal">
                                        <i class="fa fa-plus"></i>
                                        {{ __('text.add_background') }}
                                    </button>
                                    @if (isset($why_choose_section))
                                        <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#addRowModal2">
                                            <i class="fa fa-plus"></i>
                                            {{ __('text.add_item') }}
                                        </button>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
														<span class="fw-mediumbold">{{ __('text.new') }}</span>
                                                <span class="fw-light">{{ __('text.background') }}</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('text.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @if (isset($why_choose_section))
                                            <form action="{{ route('why-choose-background.update', $why_choose_section->id) }}" method="POST" enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                        <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="title">{{ __('text.title') }} <span class="text-red">*</span></label>
                                                            <input id="title" type="text" name="title" class="form-control" value="{{ $why_choose_section->title }}" placeholder="{{ __('text.title_here') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="desc">{{ __('text.description') }}  <span class="text-red">*</span></label>
                                                            <textarea id="desc" name="description" class="form-control" rows="3" placeholder="{{ __('text.description_here') }}" required>{{ $why_choose_section->description }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="image">{{ __('text.image') }} ({{ __('text.size') }} 520x520)(.png, .jpg, .jpeg)</label>
                                                            <input id="image" type="file" name="why_choose_image" class="form-control">
                                                        </div>
                                                        <div class="card margin-top-10">
                                                            <div class="card-header custom-header bg-light-grey">
                                                                <h6>{{ __('text.current_image') }}</h6>
                                                            </div>
                                                            <div class="card-body">
                                                                <img src="{{ asset('fibonacci/adminpanel/assets/img/why-choose/'.$why_choose_section->why_choose_image) }}" class="img-fluid mx-auto d-block image-size" alt="why-choose image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="spinner fa fa-spinner fa-spin"></i> {{ __('text.update') }}
                                            </button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('text.close') }}</button>
                                        </div>
                                            </form>
                                        @else
                                            <form action="{{ route('why-choose-background.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group form-group-default">
                                                                <label for="title">{{ __('text.title') }} <span class="text-red">*</span></label>
                                                                <input id="title" type="text" name="title" class="form-control" placeholder="{{ __('text.title_here') }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group form-group-default">
                                                                <label for="desc">{{ __('text.description') }} <span class="text-red">*</span></label>
                                                                <textarea id="desc"  name="description" class="form-control" rows="3" placeholder="{{ __('text.description_here') }}" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group form-group-default">
                                                                <label for="image">{{ __('text.image') }} ({{ __('text.size') }} 520x520)(.png, .jpg, .jpeg) <span class="text-red">*</span></label>
                                                                <input id="image" type="file" name="why_choose_image" class="form-control" required>
                                                            </div>
                                                            <div class="card margin-top-10">
                                                                <div class="card-header custom-header bg-light-grey">
                                                                    <h6>{{ __('text.current_image') }}</h6>
                                                                </div>
                                                                <div class="card-body">
                                                                    <span>{{ __('text.not_yet_created') }}</span>
                                                                </div>
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
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="addRowModal2" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
														<span class="fw-mediumbold">{{ __('text.new') }}</span>
                                                <span class="fw-light">{{ __('text.item') }}</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="text.close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('why-choose.store') }}" method="POST">
                                            @csrf
                                        <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="item">{{ __('text.text') }} <span class="text-red">*</span></label>
                                                            <input id="item" type="text" name="item" class="form-control" placeholder="{{ __('text.text_here') }}" required>
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
                                @if (count($why_choose_items) > 0)
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('text.item') }}</th>
                                        <th style="width: 10%">{{ __('text.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('text.item') }}</th>
                                        <th>{{ __('text.action') }}</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($why_choose_items as $why_choose_item)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $why_choose_item->item }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('why-choose.edit',$why_choose_item->id) }}" data-toggle="tooltip"  class="btn btn-link btn-primary btn-lg" data-original-title="{{ __('text.edit_item') }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form class="d-inline-block" action="{{ route('why-choose.destroy', $why_choose_item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="modal" data-target="#deleteModel{{ $why_choose_item->id }}">
                                                        <button type="button" data-toggle="tooltip"  class="btn btn-link btn-danger btn-lg" data-original-title="{{ __('text.remove') }}">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{ $why_choose_item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('Delete') }}</h5>
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
