@extends('layouts.admin-panel.master')

@section('title', 'Clients')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.clients') }}</h4>
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
                        <a href="#">{{ __('text.clients') }}</a>
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
                                <h4 class="card-title">{{ __('text.clients') }}</h4>
                                <form class="d-block  ml-auto" action="{{ route('client-section.mark_all_approval_update') }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-primary btn-round ml-auto">
                                        <i class="fas fa-bookmark"></i> {{ __('text.mark_all_as_approval') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(count($clients) > 0)
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('text.image') }}</th>
                                        <th>{{ __('text.feedback') }}</th>
                                        <th>{{ __('text.name') }}</th>
                                        <th>{{ __('text.job') }}</th>
                                        <th>{{ __('text.star') }}</th>
                                        <th style="width: 15%">{{ __('text.approval_status') }}</th>
                                        <th style="width: 10%">{{ __('text.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('text.image') }}</th>
                                        <th>{{ __('text.feedback') }}</th>
                                        <th>{{ __('text.name') }}</th>
                                        <th>{{ __('text.job') }}</th>
                                        <th>{{ __('text.star') }}</th>
                                        <th style="width: 15%">{{ __('text.approval_status') }}</th>
                                        <th style="width: 10%">{{ __('text.action') }}</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($clients as $client)
                                        <tr>
                                            <th>{{ $i++ }}</th>
                                            <td>
                                                @if (is_null($client->client_image))
                                                    <i class="fas fa-user-alt custom-font-size image-margin img-fluid"></i>
                                                    @else
                                                    <img class="image-size image-margin img-fluid" src="{{ asset('fibonacci/adminpanel/assets/img/client/'.$client->client_image) }}" alt="feedback image">
                                                @endif
                                            </td>
                                            <td>{{ $client->feedback }}</td>
                                            <td>{{ $client->name }}</td>
                                            <td>{{ $client->job }}</td>
                                            <td>{{ $client->star }}</td>
                                            <td>
                                                @if ($client->approval == 0)
                                                    <span>{{ __('text.pending_approval') }}</span>
                                                @else
                                                    <span>{{ __('text.approval') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    @if ($client->approval == 0)
                                                        <form class="d-block" action="{{ route('client-section.update', $client->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" data-toggle="tooltip"  class="btn btn-link btn-primary btn-lg" data-original-title="{{ __('text.mark') }}">
                                                                <i class="fas fa-bookmark"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                    <form class="d-inline-block" action="{{ route('client-section.destroy', $client->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="modal" data-target="#deleteModel{{ $client->id }}">
                                                    <button type="button" data-toggle="tooltip"  class="btn btn-link btn-danger btn-lg" data-original-title="{{ __('text.remove') }}">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                 </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
