@extends('layouts.admin-panel.master')

@section('title', 'Social Media')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.social_media') }}</h4>
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
                        <a href="#">{{ __('text.social_media') }}</a>
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
                                <h4 class="card-title">{{ __('text.social_media') }}</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    {{ __('text.add_social_media') }}
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
                                                <span class="fw-mediumbold">{{ __('text.new') }}</span>
                                                <span class="fw-light">{{ __('text.social_media') }}</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('text.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('social-media.store') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="social_media">{{ __('text.icon') }} <span class="text-red">*</span></label>
                                                            <select class="form-control" name="social_media" id="social_media" required>
                                                                <option></option>
                                                                <option value="fab fa-facebook-f">Facebook</option>
                                                                <option value="fab fa-twitter">Twitter</option>
                                                                <option value="fab fa-google-plus-g">Google Plus</option>
                                                                <option value="fab fa-youtube">Youtube</option>
                                                                <option value="fab fa-instagram">Instagram</option>
                                                                <option value="fab fa-vk">VK</option>
                                                                <option value="fab fa-weibo">Weibo</option>
                                                                <option value="fab fa-weixin">WeChat</option>
                                                                <option value="fab fa-meetup">Meetup</option>
                                                                <option value="fab fa-wikipedia-w">Wikipedia</option>
                                                                <option value="fab fa-quora">Quora</option>
                                                                <option value="fab fa-pinterest">Pinterest</option>
                                                                <option value="fab fa-dribbble">Dribbble</option>
                                                                <option value="fab fa-linkedin-in">Linkedin</option>
                                                                <option value="fab fa-behance-square">Behance</option>
                                                                <option value="fab fa-wordpress">WordPress</option>
                                                                <option value="fab fa-blogger-b">Blogger</option>
                                                                <option value="fab fa-whatsapp">Whatsapp</option>
                                                                <option value="fab fa-telegram">Telegram</option>
                                                                <option value="fab fa-skype">Skype</option>
                                                                <option value="fab fa-amazon">Amazon</option>
                                                                <option value="fab fa-stack-overflow">Stack Overflow</option>
                                                                <option value="fab fa-stack-exchange">Stack Exchange</option>
                                                                <option value="fab fa-github">Github</option>
                                                                <option value="fab fa-android">Android</option>
                                                                <option value="fab fa-vimeo-v">Vimeo</option>
                                                                <option value="fab fa-tumblr">Tumblr</option>
                                                                <option value="fab fa-vine">Vine</option>
                                                                <option value="fab fa-twitch">Twitch</option>
                                                                <option value="fab fa-flickr">Flickr</option>
                                                                <option value="fab fa-yahoo">Yahoo</option>
                                                                <option value="fab fa-reddit">Reddit</option>
                                                                <option value="fas fa-rss">Rss</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 ">
                                                        <div class="form-group form-group-default">
                                                            <label for="link">{{__('text.link')}}</label>
                                                            <input id="link" type="text" name="link" class="form-control" placeholder="{{ __('text.link_here') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <div class="form-group form-group-default">
                                                            <label class="text-gray-800" for="status">{{ __('text.status') }}</label>
                                                            <select class="form-control" name="status" id="status">
                                                                <option></option>
                                                                <option value="1">{{ __('text.active') }}</option>
                                                                <option value="0">{{ __('text.inactive') }}</option>
                                                            </select>
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
                                @if (count($socials) > 0)
                                    <table id="add-row" class="display table table-striped table-hover" >
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th>{{ __('text.social_media') }}</th>
                                            <th>{{ __('text.link') }}</th>
                                            <th>{{ __('text.status') }}</th>
                                            <th style="width: 10%">{{ __('text.action') }}</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th>{{ __('text.social_media') }}</th>
                                            <th>{{ __('text.link') }}</th>
                                            <th>{{ __('text.status') }}</th>
                                            <th style="width: 10%">{{ __('text.action') }}</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($socials as $social)
                                            <tr>
                                                <th>{{ $i++ }}</th>
                                                <td><i class="{{ $social->social_media }}"></i></td>
                                                <td>{{ $social->link }}</td>
                                                <td>
                                                    <form action="{{ route('social-media.update_status', $social->id) }}" method="POST">
                                                        @method('PATCH')
                                                        @csrf
                                                        @if ($social->status == 1)
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
                                                        <a href="{{ route('social-media.edit',$social->id) }}" data-toggle="tooltip"  class="btn btn-link btn-primary btn-lg" data-original-title="{{ __('text.edit_social') }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form class="d-inline-block" action="{{ route('social-media.destroy', $social->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <span data-toggle="modal" data-target="#deleteModel{{ $social->id }}">
                                                        <button type="button" data-toggle="tooltip"  class="btn btn-link btn-danger btn-lg" data-original-title="{{ __('text.remove') }}">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        </span>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteModel{{ $social->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
