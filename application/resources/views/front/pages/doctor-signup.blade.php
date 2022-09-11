@extends('front.layouts.main')
@section('content')
<!-- breadcrumb area start here   -->
<section class="breadcrumb-area cus-bg-img">
    <div class="container">
        <h2 class="page-title">{{ __('Daftar') }}</h2>
        <ul class="breadcrumb-page">
            <li><a href="{{ route('front.index') }}">{{ __('Beranda') }}</a></li>
            <li>{{ __('Daftar') }}</li>
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
                        <h2 class="form-title">{{ __('Daftar sebagai Konselor di Ekstrim') }}</h2>
                        <form method="POST" action="{{ route('user.create') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" id="fname" name="fname" value="{{ old('fname') }}" placeholder="{{ __('Nama Depan') }}" />
                                <i class="fas fa-user form-icon"></i>
                                <span class="text-danger">{{ __($errors->first('fname')) }}</span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="lname" name="lname" value="{{ old('lname') }}" placeholder="{{ __('Nama Belakang') }}" />
                                <i class="fas fa-user form-icon"></i>
                                <span class="text-danger">{{ __($errors->first('lname')) }}</span>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}" />
                                <i class="fas fa-envelope form-icon"></i>
                                <span class="text-danger">{{ __($errors->first('email')) }}</span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('Password') }}" />
                                <i class="fas fa-lock form-icon"></i>
                                <span class="text-danger">{{ __($errors->first('password')) }}</span>
                            </div>
                            <input type="hidden" name="role" value="doctor">
                            <div class="form-group form-check">
                                <input type="checkbox" name="agree" value="on" class="form-check-input" id="Agree">
                                <label class="form-check-label" for="Agree">{{ __('Saya setuju dengan semua aturan dan ketentuan.') }}</label>
                                <br>
                                <span class="text-danger">{{ __($errors->first('Setuju')) }}</span>
                            </div>
                            <div class="form-bottom">
                                <button type="submit" class="primary-btn">{{ __('Daftar Account') }}</button>
                                <p class="form-bottom-text">{{ __('Anda sudah memiliki akun') }} <a href="{{route('signin')}}">{{ __('Masuk') }}</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- register area star here  -->
<!-- brand area start here  -->
@endsection
@push('script')
@endpush
