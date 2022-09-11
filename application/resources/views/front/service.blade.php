@extends('front.layouts.main')
@section('page_title', __('Layanan'))
@include('front.include.breadcrumb')
@section('content')
@include('front.include.service')
@include('front.include.gallery')
@include('front.include.doctor')
@endsection