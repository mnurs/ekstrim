@extends('layouts.main')
@section('title', __('SMTP Settings'))
@push('head')
<!-- include summernote css/js -->
<link href="{{ asset('plugins/summernote/summernote.min.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-6">
                <div class="page-header-title">
                    <i class="ik ik-sites bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('Site')}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">{{ __('Site')}}</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- start message area-->
        @include('include.message')
        <!-- end message area-->
        <div class="col-md-12">
            <div class="card p-3">
                <div class="card-header">
                    <h3>{{ __('SMTP Settings')}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>{{ __('SMTP elements')}}</h3>
                                </div>
                                <div class="card-body">
                                    <form class="forms-sample" action="{{ route('smtp.update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputName1">{{ __('Mail Driver') }}</label>
                                            <input name="MAIL_MAILER" type="text" value="{{ !empty($smtp) ? $smtp->MAIL_MAILER : '' }}" class="form-control" id="exampleInputName1" placeholder="{{ __('Mail Driver') }}">
                                            <span class="text-danger">{{ __($errors->first('MAIL_MAILER')) }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">{{ __('Mail Host') }}</label>
                                            <input name="MAIL_HOST" type="text" value="{{ !empty($smtp) ? $smtp->MAIL_HOST : '' }}" class="form-control" id="exampleInputName1" placeholder="{{ __('Mail Host') }}">
                                            <span class="text-danger">{{ __($errors->first('MAIL_HOST')) }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">{{ __('Mail Port') }}</label>
                                            <input name="MAIL_PORT" type="text" value="{{ !empty($smtp) ? $smtp->MAIL_PORT : '' }}" class="form-control" id="exampleInputName1" placeholder="{{ __('Mail Port') }}">
                                            <span class="text-danger">{{ __($errors->first('MAIL_PORT')) }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">{{ __('Mail Username') }}</label>
                                            <input name="MAIL_USERNAME" type="text" value="{{ !empty($smtp) ? $smtp->MAIL_USERNAME : '' }}" class="form-control" id="exampleInputName1" placeholder="{{ __('Mail Username') }}">
                                            <span class="text-danger">{{ __($errors->first('MAIL_USERNAME')) }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">{{ __('Mail Password') }}</label>
                                            <input name="MAIL_PASSWORD" type="text" value="{{ !empty($smtp) ? $smtp->MAIL_PASSWORD : '' }}" class="form-control" id="exampleInputName1" placeholder="{{ __('Mail Password') }}">
                                            <span class="text-danger">{{ __($errors->first('MAIL_PASSWORD')) }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">{{ __('Mail Encryption') }}</label>
                                            <input name="MAIL_ENCRYPTION" type="text" value="{{ !empty($smtp) ? $smtp->MAIL_ENCRYPTION : '' }}" class="form-control" id="exampleInputName1" placeholder="{{ __('Mail Encrytion') }}">
                                            <span class="text-danger">{{ __($errors->first('MAIL_ENCRYPTION')) }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">{{ __('Mail From Address') }}</label>
                                            <input name="MAIL_FROM_ADDRESS" type="text" value="{{ !empty($smtp) ? $smtp->MAIL_FROM_ADDRESS : '' }}" class="form-control" id="exampleInputName1" placeholder="{{ __('Mail From Address') }}">
                                            <span class="text-danger">{{ __($errors->first('MAIL_FROM_ADDRESS')) }}</span>
                                        </div>
                                        <br>
                                        <br>
                                        <button type="submit" class="btn btn-primary mr-2">{{ __('Submit')}}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- push external js -->
@push('script')
<script src="{{ asset('plugins/summernote/summernote.min.js') }}"></script>
<script src="{{asset('js/summernote.js')}}"></script>
@endpush