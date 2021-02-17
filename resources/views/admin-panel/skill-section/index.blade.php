@extends('layouts.admin-panel.master')

@section('title', 'Skills')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.skills') }}</h4>
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
                        <a href="#">{{ __('text.skills') }}</a>
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
                                    @if(isset($skill_section))
                                        <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#addRowModal2">
                                            <i class="fa fa-plus"></i>
                                            {{ __('text.add_skill') }}
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
                                                <span class="fw-light">{{ __('text.skill_background') }}</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('text.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @if(isset($skill_section))
                                            <form action="{{ route('skill-background.update', $skill_section->id) }}" method="POST" enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                        <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="title">{{ __('text.title') }} <span class="text-red">*</span></label>
                                                            <input id="title" type="text" name="title" class="form-control" value="{{ $skill_section->title }}" placeholder="{{ __('text.title_here') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="desc">{{ __('text.description') }}  <span class="text-red">*</span></label>
                                                            <textarea id="desc" name="description" class="form-control" rows="3" placeholder="{{ __('text.description_here') }}" required>{{ $skill_section->description }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="image">{{ __('text.image') }} ({{ __('text.size') }} 520x520)(.png, .jpg, .jpeg)</label>
                                                            <input id="image" type="file" name="skill_image" class="form-control">
                                                        </div>
                                                        <div class="card margin-top-10">
                                                            <div class="card-header custom-header bg-light-grey">
                                                                <h6>{{ __('text.current_image') }}</h6>
                                                            </div>
                                                            <div class="card-body">
                                                                <img src="{{ asset('fibonacci/adminpanel/assets/img/skill/'.$skill_section->skill_image) }}" class="img-fluid mx-auto d-block image-size" alt="skill image">
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
                                            <form action="{{ route('skill-background.store') }}" method="POST" enctype="multipart/form-data">
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
                                                                <textarea id="desc"  name="description" class="form-control" rows="3" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group form-group-default">
                                                                <label for="image">{{ __('text.image') }} ({{ __('text.size') }} 520x520)(.png, .jpg, .jpeg) <span class="text-red">*</span></label>
                                                                <input id="image" type="file" name="skill_image" class="form-control" required>
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
                                                <span class="fw-light">{{ __('text.skill') }}</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('text.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('skill.store') }}" method="POST">
                                            @csrf
                                        <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="text">{{ __('text.text') }} <span class="text-red">*</span></label>
                                                            <input id="text" type="text" name="text" class="form-control" placeholder="{{ __('text.text_here') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="percent">{{ __('text.percent') }} <span class="text-red">*</span></label>
                                                            <input id="percent" type="number" name="percent" class="form-control" placeholder="{{ __('text.percent_rate_here') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
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
                                @if (count($skill_items) > 0)
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('text.text') }}</th>
                                        <th>{{ __('text.percent') }}</th>
                                        <th>{{ __('text.order') }}</th>
                                        <th style="width: 10%">{{ __('text.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('text.text') }}</th>
                                        <th>{{ __('text.percent') }}</th>
                                        <th>{{ __('text.order') }}</th>
                                        <th>{{ __('text.action') }}</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($skill_items as $skill_item)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $skill_item->text }}</td>
                                            <td>%{{ $skill_item->percent }}</td>
                                            <td>{{ $skill_item->order }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('skill.edit',$skill_item->id) }}" data-toggle="tooltip"  class="btn btn-link btn-primary btn-lg" data-original-title="{{__('text.edit_skill')}}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form class="d-inline-block" action="{{ route('skill.destroy', $skill_item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="modal" data-target="#deleteModel{{ $skill_item->id }}">
                                                        <button type="button" data-toggle="tooltip"  class="btn btn-link btn-danger btn-lg" data-original-title="{{ __('text.remove') }}">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{ $skill_item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
