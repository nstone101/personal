@extends('layouts.admin-panel.master')

@section('title', 'Special Section')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.special_section') }}</h4>
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
                        <a href="#">{{ __('text.special_section') }}</a>
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
                                <h4 class="card-title">{{ __('text.special_section') }}</h4>
                                <div class="ml-auto">
                                        <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#addRowModal2">
                                            <i class="fa fa-plus"></i>
                                            {{ __('text.add_special_section') }}
                                        </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="modal fade" id="addRowModal2" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">{{ __('text.new') }}</span>
                                                <span class="fw-light">{{ __('text.special_section') }}</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('text.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('custom-section.store') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="title">{{ __('text.title') }} <span class="text-red">*</span></label>
                                                            <input id="title" type="text" name="title" class="form-control"  placeholder="{{ __('text.title_here') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="description">{{ __('text.description') }} <span class="text-red">*</span></label>
                                                            <textarea id="editor"  class="form-control" name="description" placeholder="{{ __('text.description_here') }}"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="order">{{ __('text.order') }}</label>
                                                            <input id="order" type="number" name="order" class="form-control" placeholder="{{ __('text.order_here') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="btn_name">{{ __('text.btn_name') }}</label>
                                                            <input id="btn_name" type="text" name="btn_name" class="form-control" placeholder="{{ __('text.btn_name_here') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="btn_link">{{ __('text.btn_link') }}</label>
                                                            <input id="btn_link" type="text" name="btn_link" class="form-control" placeholder="{{ __('text.btn_link_here') }}">
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
                                @if (count($special_sections) > 0)
                                    <table id="add-row" class="display table table-striped table-hover" >
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th>{{ __('text.title') }}</th>
                                            <th>{{ __('text.order') }}</th>
                                            <th>{{ __('text.btn_name') }}</th>
                                            <th>{{ __('text.btn_link') }}</th>
                                            <th style="width: 10%">{{ __('text.action') }}</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th>{{ __('text.title') }}</th>
                                            <th>{{ __('text.order') }}</th>
                                            <th>{{ __('text.btn_name') }}</th>
                                            <th>{{ __('text.btn_link') }}</th>
                                            <th>{{ __('text.action') }}</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @php $i = 1; @endphp
                                        @foreach ($special_sections as $special_section)
                                            <tr>
                                                <th scope="row">{{ $i++ }}</th>
                                                <td>{{ $special_section->title }}</td>
                                                <td>{{ $special_section->order }}</td>
                                                <td>{{ $special_section->btn_name }}</td>
                                                <td><a href="{{ $special_section->btn_link }}" target="_blank">{{ $special_section->btn_link }}</a> </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ route('custom-section.edit',$special_section->id) }}" data-toggle="tooltip"  class="btn btn-link btn-primary btn-lg" data-original-title="{{__('text.edit_special_section')}}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form class="d-inline-block" action="{{ route('custom-section.destroy', $special_section->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <span data-toggle="modal" data-target="#deleteModel{{ $special_section->id }}">
                                                        <button type="button" data-toggle="tooltip"  class="btn btn-link btn-danger btn-lg" data-original-title="{{ __('text.remove') }}">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        </span>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteModel{{ $special_section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
