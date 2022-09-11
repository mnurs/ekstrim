@extends('front.layouts.main')
@section('page_title', __('Tentang Kami'))
@include('front.include.breadcrumb')
@section('content')
@include('front.include.about')
@include('front.include.testimonial')
@include('front.include.doctor')
@endsection
