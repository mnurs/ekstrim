@extends('front.layouts.main')
@section('page_title', __('Buat Janji Konselor'))
@section('content')
<!-- breadcrumb area start here   -->
<section class="breadcrumb-area cus-bg-img">
    <div class="container">
        <h2 class="page-title">{{ __('Buat Janji Konselor') }}</h2>
        <ul class="breadcrumb-page">
            <li><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
            <li>{{ __('Janji dengan konselor anda') }}</li>
        </ul>
    </div>
</section>
<!-- breadcrumb area end here   -->
<div class="main-section-wrap section" id="js_variable_data" data-jsvar='{{ $redirectPatientVariables }}'>
    <div class="container">
        @if(Session::has('success'))
        {{ view_html(Toastr::message()) }}
        <h2>{{Session::get('success')}}</h2>
        @endif
        <div class="section-wraper" id="cong" class="small-cong">
            <div class="tab-content" id="DashboardTabContent">
                <div class="tab-pane fade show active" id="tabthree" role="tabpanel" aria-labelledby="tabthree-tab">
                    <div class="new-appointment-form">
                        <form id="new-appointment-form" method="POST" action="{{route('appointment')}}">
                            @csrf
                            <!-- Circles which indicates the steps of the form: -->
                            <div class="form-progres-step small-cong">
                                <div class="step"><span>{{ __('01') }}</span></div>
                                <div class="step"><span>{{ __('02') }}</span></div>
                                <div class="step"><span>{{ __('03') }}</span></div>
                            </div>
                            <!-- One "tab" for each step in the form: -->
                            <input type="hidden" name="slot_id" id="slotid">
                            <input type="hidden" id="appinput" value="" name="appinput">
                            <div class="tab">
                                <h3 class="form-title">{{ __('Pilih Layanan') }}</h3>
                                <h4 class="form-inner-title">{{ __('Pilih Layanan & Tanggal') }}</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="date" name="appdate" class="form-control" id="date" placeholder="{{ __('Select Date') }}" />
                                            <span class="form-icon"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="apptime-select">
                                            <i class="fas fa-chevron-down"></i>
                                            <select name="apptime" id="apptime">
                                                <option value="">{{ __('Pilih Waktu') }}</option>
                                                @foreach ($docslots as $docslot)
                                                <option value="{{$docslot->id}}" data-time="{{$docslot->start_time}}-{{$docslot->end_time}}">
                                                    {{Carbon\Carbon::parse($docslot->start_time)->format('h:i A')}}- {{Carbon\Carbon::parse($docslot->end_time)->format('h:i A')}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="selectdoctory" value="{{$doctorselected->id}}">
                                <input type="hidden" name="slot_id" value="">
                                <input type="hidden" id="paypaldocservice" name="DoctorsService" value="{{$doctorselected->category->name}}">
                            </div>
                            <div class="tab">
                                <h3 class="form-title">{{ __('Check Infomation Place Comment') }}</h3>
                                <h4 class="form-inner-title"></h4>
                                <div class="appoinment-table mb-30">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>{{ __('Tanggal') }}</td>
                                                    <td>{{ __('Waktu Buat Janji') }}</td>
                                                    <td>{{ __('Hari') }}</td>
                                                    <!-- breadcrumb area end here   
                                                    <td>{{ __('Consultancy Fee') }} </td>-->
                                                    <td>{{ __('Profesi Konselor') }}</td>
                                                </tr>
                                                <tr>
                                                    <td id="app_date"></td>
                                                    <td id="app_time"></td>
                                                    <td id="app_day"></td>
                                                     <!--<td id="app_fees"></td>-->
                                                    <td id="app_specialist"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Komentar">{{ __('Komentar') }}</label>
                                    <textarea name="comment" class="form-control comment-box" id="Comment" rows="3" placeholder="{{ __("Masukkan Pesan anda disini.") }} "></textarea>
                                </div>
                            </div>
                            <div class="tab">
                                <h3 class="form-title">{{ __('Keterangan') }}</h3>
                                <div class="row mt-3"><!--
                                    <div class="col">
                                        <div class="form-group" id="toggler">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                @foreach($paymentPlatforms as $paymentPlatform)
                                                <label class="btn btn-outline-secondary rounded m-2 p-1" data-target="#{{$paymentPlatform->name}}Collapse" data-toggle="collapse">
                                                    <input required value="option{{$paymentPlatform->id}}" id="radio{{$paymentPlatform->id}}" type="radio" name="payment_platform">
                                                    <!--<img class="img-thumbnail" src="{{asset($paymentPlatform->image)}}" alt="{{ __('image') }}">
                                                </label>
                                                @endforeach
                                            </div>
                                            @foreach ($paymentPlatforms as $paymentPlatform)
                                            <div id="{{$paymentPlatform->name}}Collapse" class="collapse" data-parent="#toggler">
                                                @includeIf('components.'. strtolower($paymentPlatform->name) .'-collapse')
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                            <div class="form-btn">
                                <button type="button" id="prevBtn">{{ __('Sebelumnya') }}</button>
                                <button type="button" id="nextBtn">{{ __('Lanjut') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="congratulation-wrap d-none">
                <div class="congratulation-box text-center">
                    <img class="congratulation-img" src="{{asset('front/assets/images/congratulation.png')}}" alt="{{ __('congratulation') }}" />
                    <h3 class="congratulation-title">{{ __('Selamat') }}</h3>
                    <p class="congratulation-text">{{ __(' Booking untuk janji bertemu menunggu persetujuan Konselor. Mohon menunggu') }}</p>
                    <a id="closebtn" class="close-btn">{{ __('Close') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- paypal form -->
<form id="paypalform" action="{{route('pay')}}" method="POST">
    @csrf
    <input type="hidden" name="selectdoctory" id="paypal_docid" value='{{ $doctorselected->id }}'>
    <input type="hidden" name="appinput" id="paypal_appinput" value=''>
    <input type="hidden" name="slot_id" id="paypal_slotid" value=''>
    <input type="hidden" name="comment" id="paypal_comment" value=''>
    <input type="hidden" name="paymentmethod" value='paypal'>
    <input type="hidden" name="doctorsService" id="paypal_doctorservice" value=''>
    <input type="hidden" name="appdate" id="paypal_appdate" value=''>
    <input type="hidden" name="apptime" id="paypal_apptime" value=''>
    <input id="paypalvalue" name="value" type="hidden" value="">
    <input name="currency" type="hidden" value="usd">
    <input name="payment_platform" type="hidden" value="1">
</form>
<!-- paypal form -->
@endsection
@push('script')
<script src="{{ asset('front/js/redirect-patient.js') }}"></script>
@endpush