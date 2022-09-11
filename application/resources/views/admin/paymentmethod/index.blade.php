@extends('layouts.main')
@section('title', __('Payment Method Settings'))
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
                        <h5>{{ __('Payment Method')}}</h5>
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
                            <a href="#">{{ __('Payment Method')}}</a>
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
                    <h3>{{ __('Payment Method Settings')}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>{{ __('Payment Method Setting elements')}}</h3>
                                </div>
                                <div class="card-body">
                                    <form class="forms-sample" action="{{ route('paymentmethod.update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputName1">{{ __('Paypal Base Uri') }}</label>
                                            <input name="PAYPAL_BASE_URI" type="text" value="{{ !empty($pms) ? $pms->PAYPAL_BASE_URI : '' }}" class="form-control" id="exampleInputName1" placeholder="{{ __('Paypal Base uri') }}">
                                            <span class="text-danger">{{ __($errors->first('PAYPAL_BASE_URI')) }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">{{ __('Paypal Client Id') }}</label>
                                            <input name="PAYPAL_CLIENT_ID" type="text" value="{{ !empty($pms) ? $pms->PAYPAL_CLIENT_ID : '' }}" class="form-control" id="exampleInputName1" placeholder="{{ __('Paypal Client Id') }}">
                                            <span class="text-danger">{{ __($errors->first('PAYPAL_CLIENT_ID')) }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">{{ __('Paypal Client Secret') }}</label>
                                            <input name="PAYPAL_CLIENT_SECRET" type="text" value="{{ !empty($pms) ? $pms->PAYPAL_CLIENT_SECRET : '' }}" class="form-control" id="exampleInputName1" placeholder="{{ __('Paypal Client Id') }}">
                                            <span class="text-danger">{{ __($errors->first('PAYPAL_CLIENT_SECRET')) }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">{{ __('Stripe key') }}</label>
                                            <input name="STRIPE_KEY" type="text" value="{{ !empty($pms) ? $pms->STRIPE_KEY : '' }}" class="form-control" id="exampleInputName1" placeholder="{{ __('Stripe Key') }}">
                                            <span class="text-danger">{{ __($errors->first('STRIPE_KEY')) }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">{{ __('Stripe Secret') }}</label>
                                            <input name="STRIPE_SECRET" type="text" value="{{ !empty($pms) ? $pms->STRIPE_SECRET : '' }}" class="form-control" id="exampleInputName1" placeholder="{{ __('Stripe Secret') }}">
                                            <span class="text-danger">{{ __($errors->first('STRIPE_SECRET')) }}</span>
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