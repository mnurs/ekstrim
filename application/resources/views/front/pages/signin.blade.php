@extends('front.layouts.main')
@section('page_title', __('Masuk'))
@section('content')
<!-- breadcrumb area start here   -->
<section class="breadcrumb-area cus-bg-img">
    <div class="container">
        <h2 class="page-title">{{ __('Masuk') }}</h2>
        <ul class="breadcrumb-page">
            <li><a href="{{ route('front.index') }}">{{ __('Beranda') }}</a></li>
            <li>{{ __('Masuk') }}</li>
        </ul>
    </div>
</section>
<!-- breadcrumb area end here   -->
<!-- register area star here  -->
<div class="register-area section">
    <div class="container">
        <div class="register-wrap">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="register-image">
                        <img src="{{asset('front/assets/images/register-image.png')}}" alt="{{ __('register-image') }}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="register-form">
                        <h2 class="form-title">{{ __('Masuk ke Sistem Ekstrim') }}</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('Enter  Email') }}" />
                                <i class="fas fa-envelope form-icon"></i>
                                <span class="text-danger">{{ __($errors->first('email')) }}</span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('Enter Password') }}" />
                                <i class="fas fa-lock form-icon"></i>
                                <span class="text-danger">{{ __($errors->first('password')) }}</span>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="Agree">
                                <label class="form-check-label" for="Agree" id="item_checkbox" name="item_checkbox" value="option1">{{ __('Tetap Ingat') }}</label>
                                <a href="{{ route('forgetpassword') }}" class="float-right forget-password">{{ __('Lupa Password') }}</a>
                            </div>
                            <div class="form-bottom">
                                <button type="submit" class="primary-btn">{{ __('Login Akun') }}</button>
                                <p class="form-bottom-text">{{ __("Belum punya Akun? Silahkan") }}, <a href="{{route('patient.signup')}}">{{ __('Daftar') }}</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- register area star here  -->
@endsection


