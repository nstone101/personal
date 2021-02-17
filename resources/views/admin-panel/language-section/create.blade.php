@extends('layouts.admin-panel.master')

@section('title', 'Languages')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.languages') }}</h4>
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
                        <a href="#">{{ __('text.languages') }}</a>
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
                            <h4 class="card-title">{{ __('text.languages') }}</h4>
                        </div>
                        <div class="card-body">
                                <form action="{{ route('language-section.update_language') }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label for="language">{{ __('text.language') }}</label>
                                                <select class="form-control" name="language" id="language" required>
                                                    <option></option>
                                                    @foreach ($languages as $language)
                                                        <option value="{{ $language->language_code }}" {{ $language->status === 1 ? 'selected' : '' }}>{{ $language->language_name }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">
                                                 {{ __('text.update') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">{{ __('text.languages') }}</h4>
                                <div class="ml-auto">
                                    <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#addRowModal2">
                                        <i class="fa fa-plus"></i>
                                        {{ __('text.add_language') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="addRowModal2" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">{{ __('text.new') }}</span>
                                                <span class="fw-light">{{ __('text.language') }}</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('text.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('language-section.store') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="language_name">{{ __('text.language_name') }} <span class="text-red">*</span></label>
                                                            <input id="language_name" type="text" name="language_name" class="form-control" placeholder="{{ __('text.language_name_here') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="language_code">{{ __('text.language_code') }} <span class="text-red">*</span></label>
                                                            <input id="language_code" type="text" name="language_code" class="form-control" placeholder="{{ __('example:af, ar, be, bn, de, en, fr, tr, it, es, ja, ru, hi, pt, id') }}" required>
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
                                @if (count($languages) > 0)
                                    <table id="add-row" class="display table table-striped table-hover" >
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th>{{ __('text.language_name') }}</th>
                                            <th>{{ __('text.language_code') }}</th>
                                            <th>{{ __('text.status') }}</th>
                                            <th>{{ __('text.keyword') }}</th>
                                            <th style="width: 10%">{{ __('text.action') }}</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th>{{ __('text.language_name') }}</th>
                                            <th>{{ __('text.language_code') }}</th>
                                            <th>{{ __('text.status') }}</th>
                                            <th>{{ __('text.keyword') }}</th>
                                            <th>{{ __('text.action') }}</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach ($languages as $language)
                                            <tr>
                                                <th scope="row">{{ $i++ }}</th>
                                                <td>{{ $language->language_name }}</td>
                                                <td>{{ $language->language_code }}</td>
                                                <td>
                                                    @if($language->status === 0)
                                                        <span class="badge badge-danger">{{ __('text.disable') }}</span>
                                                    @else
                                                        <span class="badge badge-success">{{ __('text.enable') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('language-keyword.edit', $language->id) }}"  class="btn btn-link btn-primary btn-lg">
                                                        {{ __('text.keyword') }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ route('language-section.edit', $language->id) }}" data-toggle="tooltip"  class="btn btn-link btn-primary btn-lg" data-original-title="{{__('text.edit_language')}}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        @if ($language->id != 1)
                                                            <form class="d-inline-block" action="{{ route('language-section.destroy', $language->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <span data-toggle="modal" data-target="#deleteModel{{ $language->id }}">
                                                        <button type="button" data-toggle="tooltip"  class="btn btn-link btn-danger btn-lg" data-original-title="{{ __('text.remove') }}">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        </span>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="deleteModel{{ $language->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                            @endif
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
