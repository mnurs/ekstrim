@extends('front.layouts.main')
@section('page_title', __('Home'))
@section('content')
<!-- hero-banner-area start here  -->
<section class="hero-banner-area">
    <div class="slider-hero-banenr">
        @foreach ($sliders as $slider)
        <div class="single-hero-banenr" style="background-image: url('{{asset(path_slider_image() . $slider->image) }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <h3 class="banner-subtitle"><i class="flaticon-pulse-line"></i> {{ $slider->small_heading }}</h3>
                        <h1 class="banner-title">{{ $slider->big_heading }}</h1>
                        <p class="banner-text">{{ $slider->description }}</p>
                        <a href="{{route('front.doctor')}}" class="primary-btn">{{ __('Kontak Konselor') }}</a>
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSdpIfBYP7xpwi5xkGNlk2kybHybLWPuVIUU_kvZVHDVvECvbg/viewform" target="_blank" class="primary-btn-outline">{{ __('Skrining HIV/AIDS ') }}</a>
                       <!-- 
                        <a href="{{url('/contact')}}" class="primary-btn-outline">{{ __('Skrining HIV/AIDS ') }}</a>
                         -->
                         
                         
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @if($notice != null)
    <div class="alert-area">
        <div class="container">
            <div class="alert alert-dismissible fade show" role="alert">
                <div class="alert-left">
                    <div class="media align-items-center alert-text">
                        <div class="icon"><i class="{{ $notice->icon }}"></i></div>
                        <div class="media-body">
                            <h4 class="mt-0">{{ $notice->title }}</h4>
                            <p class="mb-0">{{ $notice->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="alert-right">
                    <a href="{{ $notice->button_url }}" class="primary-btn">{{ $notice->button_text }}</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
<!-- hero-banner-area end here  -->
@include('front.include.about')
@include('front.include.counter')
@include('front.include.service')
@include('front.include.gallery')
@include('front.include.doctor')
@include('front.include.testimonial')
@include('front.include.news')
@endsection