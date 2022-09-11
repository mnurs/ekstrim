@extends('layouts.main')
@section('title', __('Create Patient'))
@push('head')
<!-- include summernote css/js -->
<link href="{{ asset('plugins/summernote/summernote.min.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-users bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('Patient')}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">{{ __('Patient')}}</a>
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
                    <h3>{{ __('Patient')}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{route('patient.store')}}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                                            <div class="col-md-6">
                                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="name" autofocus>
                                                @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ __($message) }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                                            <div class="col-md-6">
                                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="name" autofocus>
                                                @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ __($message) }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ __($message) }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="docat" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                                            <div class="col-md-6">
                                                <select class="form-select form-control" name="gender">
                                                        <option value="male">{{ __('Male') }}</option>
                                                        <option value="female">{{ __('Female') }}</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ __($message) }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                                @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ __($message) }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
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
        </div>
    </div>
</div>
@endsection
<!-- push external js -->
@push('script')
<script src="{{ asset('plugins/summernote/summernote.min.js') }}"></script>
<script src="{{asset('js/summernote.js')}}"></script>
@endpush