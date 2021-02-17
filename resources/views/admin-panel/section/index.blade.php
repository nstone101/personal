@extends('layouts.admin-panel.master')

@section('title', 'Sections')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.sections') }}</h4>
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
                        <a href="#">{{ __('text.settings') }}</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ __('text.sections') }}</a>
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
                                <h4 class="card-title">{{ __('text.sections') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th style="width: 12%">{{ __('text.heading') }}</th>
                                        <th>{{ __('text.description') }}</th>
                                        <th>{{ __('text.section') }}</th>
                                        <th>{{ __('text.status') }}</th>
                                        <th style="width: 10%">{{ __('text.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('text.heading') }}</th>
                                        <th>{{ __('text.description') }}</th>
                                        <th>{{ __('text.section') }}</th>
                                        <th>{{ __('text.status') }}</th>
                                        <th>{{ __('text.action') }}</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($sections as $section)
                                        <tr>
                                            <th>{{ $i++ }}</th>
                                            <td>{{ $section->heading }}</td>
                                            <td>{{ $section->description }}</td>
                                            <td>{{ $section->section }}</td>
                                            <td>
                                                <form action="{{ route('section.update_status', $section->id) }}" method="POST">
                                                    @method('PATCH')
                                                    @csrf
                                                @if ($section->status == 1)
                                                    <button type="submit" class="btn btn-danger">
                                                         {{ __('text.disable') }}
                                                    </button>
                                                @else
                                                    <button type="submit" class="btn btn-success">
                                                         {{ __('text.enable') }}
                                                    </button>
                                                @endif
                                                </form>
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('section.edit',$section->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="{{ __('text.edit_section') }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">{{ __('text.other_section') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                   @foreach ($other_sections as $other_section)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                            <div class="card custom-card margin-top-20">
                                                <div class="card-header custom-header bg-light-grey">
                                                    <h6>{{ $other_section->section }}</h6>
                                                </div>
                                                <div class="card-body">
                                                    <form  action="{{ route('section.update_status_other', $other_section->id) }}" method="POST">
                                                        @method('PATCH')
                                                        @csrf
                                                    @if ($other_section->status == 1)
                                                        <button type="submit" class="btn btn-danger">
                                                            {{ __('text.disable') }}
                                                        </button>
                                                    @else
                                                        <button type="submit" class="btn btn-success">
                                                            {{ __('text.enable') }}
                                                        </button>
                                                    @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                       @endforeach
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
