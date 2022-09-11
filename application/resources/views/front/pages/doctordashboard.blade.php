@extends('front.layouts.main')
@section('page_title', __('Konselor Dashboard'))
@section('content')
<!-- breadcrumb area start here   -->
<section class="breadcrumb-area cus-bg-img">
    <div class="container">
        <h2 class="page-title">{{ __('Konselor Dashboard') }}</h2>
        <ul class="breadcrumb-page">
            <li><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
            <li>{{ __('Dashboard') }}</li>
        </ul>
    </div>
</section>
<!-- breadcrumb area end here   -->
<div class="main-section-wrap section" id="js_variable_data" data-jsvar='{{ $doctorVariables }}'>
    <div class="container">
        <div class="section-header">
            <div class="section-header-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-9">
                        <div class="tab-menu menu-style-two">
                            <ul class="nav nav-tabs" id="DashboardTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="tabone-tab" data-toggle="tab" href="#tabone" role="tab" aria-controls="tabone" aria-selected="true">
                                        <i class="fas fa-home"></i> <span>{{ __('Dashboard') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tabtwo-tab" data-toggle="tab" href="#tabtwo" role="tab" aria-controls="tabtwo" aria-selected="false">
                                        <i class="fas fa-calendar-check"></i> <span> {{ __('Semua Appointment') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tabfour-tab" data-toggle="tab" href="#tabfour" role="tab" aria-controls="tabfour" aria-selected="false">
                                        <i class="fas fa-user"></i><span>{{ __('Profil') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="search-form">
                            <form action="#">
                                <div class="search-input">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="section-wraper">
            <div class="tab-content" id="DashboardTabContent">
                <div class="tab-pane fade show active" id="tabone" role="tabpanel" aria-labelledby="tabone-tab">
                    <div class="dashboard-box">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="single-box">
                                    <div class="media align-items-center">
                                        <img src="{{asset('front/assets/images/box-image-4.png')}}" class="box-image mr-4" alt="{{ __('box image') }}" />
                                        <div class="media-body">
                                            <h4 class="counter-title mt-0">{{ __('Jumlah Pasien') }}</h4>
                                            <h2 class="counter">{{$totalpatient}}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="single-box">
                                    <div class="media align-items-center">
                                        <img src="{{asset('front/assets/images/box-image-5.png')}}" class="box-image mr-4" alt="{{ __('box image') }}" />
                                        <div class="media-body">
                                            <h4 class="counter-title mt-0">{{ __('Appoinment Baru') }}</h4>
                                            <h2 class="counter color-two">{{$newAppointment}}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="single-box">
                                    <div class="media align-items-center">
                                        <img src="{{asset('front/assets/images/box-image-6.png')}}" class="box-image mr-4" alt="{{ __('box image') }}" />
                                        <div class="media-body">
                                            <h4 class="counter-title mt-0">{{ __('Janji Pending') }}</h4>
                                            <h2 class="counter color-three">{{$pendingAppointment}}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- breadcrumb area start here

                            <div class="col-lg-3 col-md-6">
                                <div class="single-box">
                                    <div class="media align-items-center">
                                        <img src="{{asset('front/assets/images/box-image-7.png')}}" class="box-image mr-4" alt="{{ __('box image') }}" />
                                        <div class="media-body">
                                            <h4 class="counter-title mt-0">{{ __('Total Earnings') }}</h4>
                                            <h2 class="counter color-four">{{auth()->user()->doctor->earning->pluck('earning')->sum()}}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                               -->
                        </div>
                    </div>
                    <div class="section-heading-area">
                        <h2 class="section-title">{{ __('Semua Appointment Requests') }}</h2>
                    </div>
                    <div class="primary-table">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('Nama Pasien') }}</th>
                                        <th scope="col">{{ __('Tanggal') }}</th>
                                        <th scope="col">{{ __('Waktu') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Aksi') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="dashboardpagi">
                                    @include('front.pages.doctordashboardpagi')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabtwo" role="tabpanel" aria-labelledby="tabtwo-tab">
                    <div class="section-heading-area">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h2 class="section-title">{{ __('Semua Appoinment') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="section-inner-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="inner-tabs-menu">
                                    <ul class="nav nav-tabs" id="AppominmentTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="TodayAppominment-tab" data-toggle="tab" href="#TodayAppominment" role="tab" aria-controls="TodayAppominment" aria-selected="true">{{ __('Janji Hari Ini') }}</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="PastAppominment-tab" data-toggle="tab" href="#PastAppominment" role="tab" aria-controls="PastAppominment" aria-selected="false">{{ __('Semua Janji') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="inner-header-right">
                                    <div class="appoinment-search">
                                        <form action="#">
                                            <div class="input-wrap">
                                                <div class="search-input">
                                                    <input type="text" class="form-control" name="appoinmentsearch" id="appoinmentsearch" placeholder="{{ __('Cari Appoinment') }}" />
                                                    <button class="search-btn"><i class="fas fa-search"></i></button>
                                                </div>
                                                <div class="date-input">
                                                    <input type="text" class="form-control" name="appoinmentdate" id="appoinmentdate" placeholder="{{ __('Pilih Tanggal') }}" />
                                                    <span class="form-icon"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="AppominmentTabContent">
                        <div class="tab-pane fade show active" id="TodayAppominment" role="tabpanel" aria-labelledby="TodayAppominment-tab">
                            @include('front.pages.doctor_today_pagination')
                            <div class="primary-table d-none" id="searchheadtoday">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">{{ __('Nama Konselor') }}</th>
                                                <th scope="col">{{ __('Tanggal') }}</th>
                                                <th scope="col">{{ __('Waktu') }}</th>
                                                <th scope="col">{{ __('Aksi') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody id="searchbodytoday">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="PastAppominment" role="tabpanel" aria-labelledby="PastAppominment-tab">
                            @include('front.pages.doctor_past_pagination')
                            <!-- searchtable start -->
                            <div class="primary-table d-none" id="searchhead">
                                <div class="table-responsive">
                                    <table class="table" id="todaypagination">
                                        <thead>
                                            <tr>
                                                <th scope="col">{{ __('Nama Pasien') }}</th>
                                                <th scope="col">{{ __('Tanggal') }}</th>
                                                <th scope="col">{{ __('Waktu') }}</th>
                                                <th scope="col">{{ __('Aksi') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody id="searchbody">
                                        </tbody>
                                    </table>
                                </div>
                                <!-- searchtable end -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabfour" role="tabpanel" aria-labelledby="tabfour-tab">
                    <div class="section-heading-area">
                        <h2 class="section-title">{{ __('Profile') }}</h2>
                    </div>
                    <div class="profile-area">
                        <div class="profile-bottom">
                            <div class="row">
                                <div class="col-xl-10 offset-xl-1">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4">
                                            <div class="profile-top">
                                                <div class="profile-thumbnail">
                                                    <img src="{{ isset(Auth::user()->image) ? asset(path_user_image().Auth::user()->image) : Avatar::create(Auth::user()->name)->toBase64()}}" class="profile-image mr-3" alt="{{ __('profile') }}" />
                                                </div>
                                                <div class="profile-info">
                                                    <h3 class="user-name mt-0">{{Auth::user()->name}}</h3>
                                                    <h4 class="user-age">{{ __('Age:') }} {{Auth::user()->age}} Years</h4>
                                                    <button class="profile-btn" type="button" data-toggle="modal" data-target="#editeprofilemodal"><i class="far fa-edit"></i>
                                                        {{ __('Edit Info') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-md-8">
                                            <div class="profile-left">
                                                <div class="secondary-form">
                                                    <form>
                                                        <h3 class="form-title">{{ __('Basic Information') }}</h3>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class="form-group">
                                                                    <label>{{ __('Email') }}</label>
                                                                    <input type="text" class="form-control" placeholder="{{Auth::user()->email}}" readonly />
                                                                    <span class="text-danger">{{ __($errors->first('email')) }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class="form-group">
                                                                    <label>{{ __('Gender') }}</label>
                                                                    <input type="text" class="form-control" placeholder="{{Auth::user()->gender}}" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class="form-group">
                                                                    <label>{{ __('BirthDay') }}</label>
                                                                    <input type="text" class="form-control" placeholder="{{ date('d M Y',strtotime(Auth::user()->dob)) }}" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h3 class="form-title mt-20">{{ __('Address Information') }}</h3>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class="form-group">
                                                                    <label>{{ __('Street Address') }}</label>
                                                                    <input type="text" class="form-control" placeholder="{{Auth::user()->address}}" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class="form-group">
                                                                    <label>{{ __('City') }}</label>
                                                                    <input type="text" class="form-control" placeholder="{{Auth::user()->city}}" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class="form-group">
                                                                    <label>{{ __('Zip Code') }}</label>
                                                                    <input type="text" class="form-control" placeholder="{{Auth::user()->code}}" readonly />
                                                                </div>
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
            </div>
        </div>
    </div>
</div>
<!-- Edite Profile Modal -->
<div class="modal fade" id="editeprofilemodal">
    <div class="modal-dialog modal-dialog-centered editeprofilemodal">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div class="section-heading-area">
                    <h2 class="section-title">{{ __('Edit Profil') }}</h2>
                </div>
                <div class="edite-profile-area">
                    <div class="primary-form">
                        <form action="{{route('user.profile', auth()->user()->id)}}" method="POST" id="editform" enctype="multipart/form-data">
                            @csrf
                            <div class="profile-image-area">
                                <div class="profile-image">
                                    <span id="openfile">
                                        <img id="target" class="cus-doctor-img-edit" src="{{ isset(Auth::user()->image) ? asset(path_user_image().Auth::user()->image) : Avatar::create(Auth::user()->name)->toBase64()}}">
                                    </span>
                                </div>
                                <div class="custom-fileuplode">
                                    <input type="file" id="file-input" name="image" class="form-control-file" >
                                </div>
                            </div>
                            <h4 class="form-inner-title">{{ __('Pilih Layanan & Tanggal') }}</h4>
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name" value="{{Auth::user()->name}}" placeholder="{{isset(Auth::user()->name) ? Auth::user()->name : __('Enter your name')}}" required />
                                        <small class="text-danger d-none nameerror">{{ __('Isian Nama diperlukan') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email2" value="{{Auth::user()->email}}" placeholder="{{isset(Auth::user()->email) ? Auth::user()->email : __('Enter your email')}}" />
                                        <small class=" text-danger d-none emailerror">{{ __('Isian Email diperlukan') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="dob" id="group" value="{{ date('Y-m-d',strtotime(Auth::user()->dob)) }}" placeholder="{{isset(Auth::user()->dob) ? Auth::user()->dob : __('Enter your date of birth')}}" />
                                        <small class=" text-danger d-none dateerror">{{ __('Isian Tanggal diperlukan') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="age" id="age" value="{{Auth::user()->age}}" placeholder="{{isset(Auth::user()->age) ? Auth::user()->age : __('Enter your age')}}" />
                                        <small class=" text-danger d-none ageerror">{{ __('Isian Usia diperlukan') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="gender-group">
                                        <span>{{ __('Gender :') }}</span>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" @if(isset(Auth::user()->gender))
                                            @if(Auth::user()->gender == 'male')
                                            checked
                                            @endif
                                            @endif
                                            >
                                            <label class="form-check-label" for="male">
                                                {{ __('Laki-Laki') }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="famale" value="female" @if(isset(Auth::user()->gender))
                                            @if(Auth::user()->gender == 'female')
                                            checked
                                            @endif
                                            @endif>
                                            <label class="form-check-label" for="famale">
                                                {{ __('Perempuan') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4 class="form-inner-title">{{ __('Informasi Alamat') }}</h4>
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="address" id="address" value="{{Auth::user()->address}}" placeholder="{{isset(Auth::user()->address) ? Auth::user()->address : __('Enter your address')}} " />
                                        <small class=" text-danger d-none addresserror">{{ __('Address field is required') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="city" id="city" value="{{Auth::user()->city}}" placeholder="{{isset(Auth::user()->city) ? Auth::user()->city : __('Enter your city')}} " />
                                        <small class=" text-danger d-none cityerror">{{ __('City field is required') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="code" id="code" value="{{Auth::user()->code}}" placeholder="{{isset(Auth::user()->code) ? Auth::user()->code : __('Enter your code')}}" />
                                        <small class=" text-danger d-none codeerror">{{ __('Code field is required') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4 class="form-inner-title">{{ __('About Yourself') }}</h4>
                                        <textarea class="form-control" name="bio" id="bio" cols="30" rows="10">{{isset(Auth::user()->bio) ? Auth::user()->bio : ''}}</textarea>
                                        <small class=" text-danger d-none bioerror">{{ __('About field is required') }}</small>
                                    </div>
                                </div>
                            </div>
                            <button class="primary-btn changesave" type="submit">{{ __('Changes Save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Edite Profile Modal -->
<!-- MakePrescription  Modal -->
@foreach($todaysapp as $app)
<div class="modal fade" id="MakePrescription{{$app->id}}">
    <div class="modal-dialog modal-dialog-centered prescriptionmodal">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div class="prescription-wrap">
                    <div class="prescription-top">
                        <h2 class="section-title">{{ __('All Appoinment') }} <span>/ {{ __('Buat Saran') }}</span></h2>
                        <div class="edit-prescription-area">
                            <div class="edit-prescription-form">
                                <form action="{{route('prescription', $app->id)}}" method="POST">
                                    @csrf
                                    <div class="prescription-header">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="patient-info d-flex flex-wrap flex-row">
                                                    <div class="sigle-info">
                                                        <span>{{ __('Nama Pasien') }}</span>
                                                        <h4>{{$app->patient->name}}</h4>
                                                    </div>
                                                    <div class="sigle-info">
                                                        <span>{{ __('Pasien ID') }}</span>
                                                        <h4>#{{$app->patient->id}}</h4>
                                                    </div>
                                                    <div class="sigle-info">
                                                        <span>{{ __('Gender') }}</span>
                                                        <h4>{{$app->patient->gender}}</h4>
                                                    </div>
                                                    <div class="sigle-info">
                                                        <span>{{ __('Age') }}</span>
                                                        <h4>{{$app->patient->age}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-top mb-30">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>{{ __('Tipe Pasien') }}</label>
                                                        <select class="form-control">
                                                            <option>{{ __('Lama') }}</option>
                                                            <option>{{ __('Baru') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>{{ __('Patient Weight') }}</label>
                                                        <select name="patient_weight" class="form-control">
                                                            <option value="10">{{ __('10') }}</option>
                                                            <option value="20">{{ __('20') }}</option>
                                                            <option value="30">{{ __('30') }}</option>
                                                            <option value="40">{{ __('40') }}</option>
                                                            <option value="50">{{ __('50') }}</option>
                                                            <option value="75">{{ __('75') }}</option>
                                                            <option value="80">{{ __('80') }}</option>
                                                            <option value="105">{{ __('105') }}</option>
                                                            <option value="120">{{ __('120') }}</option>
                                                            <option value="145">{{ __('145') }}</option>
                                                            <option value="150">{{ __('150') }}</option>
                                                        </select>
                                                        <span class="weight-label">{{ __('kg') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="PatientBP">{{ __('Pasien BP') }}</label>
                                                        <input type="text" class="form-control" id="PatientBP" name="PatientBP" placeholder="{{ __('102') }}" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="PatientTemperature">{{ __('Suhu Pasien') }}</label>
                                                        <input type="text" class="form-control" id="PatientTemperature" name="PatientTemperature" placeholder="{{ __('Returning') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prescription-body">
                                        <div class="medicine-area mb-40">
                                            <div class="primary-table-three">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless" id="medicine_table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">{{ __('Nama Obat') }}</th>
                                                                <th scope="col">{{ __('Tipe') }}</th>
                                                                <th scope="col">{{ __('Mg/Ml') }}</th>
                                                                <th scope="col">{{ __('Dosis') }}</th>
                                                                <th scope="col">{{ __('Day') }}</th>
                                                                <th scope="col" colspan="2">{{ __('Pesan') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="medicine">
                                                            @if($errors->any())
                                                            <div id="error-box">
                                                                <p class="text-danger">{{ __('Silahkan isikan field') }}</p>
                                                            </div>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <a class="add-btn" id="add-tablebtn" href="javascript:void(0)"><i class="fas fa-plus"></i>{{ __('Add') }}</a>
                                        </div>
                                        <div class="test-area mb-40">
                                            <div class="primary-table-three">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">{{ __('Test Name') }}</th>
                                                                <th scope="col" colspan="2">{{ __('Comment') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="testtable">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <a class="add-btn" id="add-testbtn" href="javascript:void(0)"><i class="fas fa-plus"></i> {{ __('Add') }}</a>
                                        </div>
                                        <div class="advice-area mt-3 mb-40">
                                            <div class="form-group">
                                                <label for="advice">{{ __('Advice') }}</label>
                                                <input type="text" class="form-control" id="advice" name="advice" placeholder="{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mi integer nisl ut ornare et in .') }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prescription-footer text-right">
                                        <button class="primary-btn mr-2">{{ __('Confirm') }}</button>
                                        <button class="primary-btn mr-2">{{ __('Print') }}</button>
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
@endforeach
<!-- MakePrescription  Modal -->
<!-- ViewPrescription  Modal -->
@foreach($pastappModal as $vapp)
<div class="modal fade" id="ViewPrescription{{$vapp->id}}">
    <div class="modal-dialog modal-dialog-centered prescriptionmodal">
        <div class="modal-content" id="printable">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div class="prescription-wrap">
                    <div class="prescription-top mb-30">
                        <h2 class="section-title">{{ __('Semua Appoinment') }} <span>/ {{ __('Tampilkan Saran') }}</span></h2>
                    </div>
                    <div class="prescription-area">
                        <div class="prescription-header mb-30">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="prescription-header-left">
                                        <h3>{{isset($vapp->doctor->user->name) ? $vapp->doctor->user->name : ''}}</h3>
                                        <span>{{isset($vapp->doctor->specialist) ? $vapp->doctor->specialist : ''}}</span>
                                        <h4>{{$vapp->doctorsService}}</h4>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="prescription-header-center">
                                        <p>{{$vapp->degree}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="prescription-header-right">
                                        <div class="prescription-timing mb-2">
                                            <h4>{{ __('Offday-') }} {{isset($vapp->doctor->offday) ? $vapp->doctor->offday : ''}}</h4>
                                            @if (isset($vapp->doctor->starttime) && isset($vapp->doctor->endtime))
                                            <span>{{Carbon\Carbon::parse($vapp->doctor->starttime)->format('h:i A')}}-{{Carbon\Carbon::parse($vapp->doctor->endtime)->format('h:i A')}}</span>
                                            @endif
                                        </div>
                                        <div class="prescription-timing">
                                            @if (isset($vapp->doctor->starttime2) && isset($vapp->doctor->endtime2))
                                            <span>{{Carbon\Carbon::parse($vapp->doctor->starttime2)->format('h:i A')}}-{{Carbon\Carbon::parse($vapp->doctor->endtime2)->format('h:i A')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="prescription-date mb-30">
                            <p>{{ __('Appointment Date:') }} {{Carbon\Carbon::parse($vapp->adddate)->format('d M, Y, D')}} , {{Carbon\Carbon::parse($vapp->slot->start_time)->format('H:i A')}}-{{Carbon\Carbon::parse($vapp->slot->end_time)->format('H:i A')}}
                            </p>
                        </div>
                        <div class="prescription-body ">
                            <div class="prescription-info mb-30">
                                <h3 class="prescription-section-title mb-3">{{ __('Medicine:') }}</h3>
                                <div class="primary-table">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ __('SL No') }}</th>
                                                    <th scope="col">{{ __('Medicine Name') }}</th>
                                                    <th scope="col">{{ __('Type') }}</th>
                                                    <th scope="col">{{ __('Mg/Ml') }}</th>
                                                    <th scope="col">{{ __('Dose') }}</th>
                                                    <th scope="col">{{ __('Day') }}</th>
                                                    <th scope="col">{{ __('Comments') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $i=0;
                                                @endphp
                                                @foreach($vapp->prescription as $prescription)
                                                @php
                                                $i++;
                                                @endphp
                                                <tr>
                                                    <td>#{{$i}}</td>
                                                    <td>{{$prescription->medicine_name}}</td>
                                                    <td>{{$prescription->medicine_type}}</td>
                                                    <td>{{$prescription->medicine_quantity}}</td>
                                                    <td>{{$prescription->medicine_dose}}</td>
                                                    <td>{{$prescription->medicine_day}}</td>
                                                    <td>{{$prescription->medicine_comment}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-0">
                                <div class="col-lg-4 ">
                                    <div class="patient-info mb-30">
                                        <h3 class="prescription-section-title mb-2">{{ __('Patient Info:') }}</h3>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td>{{ __('Name') }} </td>
                                                    <td>: <b>{{$vapp->patient->name}}</b></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('Age') }} </td>
                                                    <td>: <b>{{$vapp->patient->age}}</b></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('Gender') }} </td>
                                                    <td>: <b>{{$vapp->patient->gender}}</b></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('Blood Pressure') }} </td>
                                                    <td>: <b>{{isset($vapp->prescription()->latest()->first()->patient_bp)?$vapp->prescription()->latest()->first()->patient_bp: ''}}</b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="test-repot mb-30">
                                        <h3 class="prescription-section-title mb-3">{{ __('Test') }}</h3>
                                        <ul>
                                            @foreach($vapp->testprescription as $test)
                                            <li>{{$test->test_name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="advice-list-area mb-30">
                                        <h3 class="prescription-section-title mb-3">{{ __('Advice') }}</h3>
                                        <ul>
                                            @foreach($vapp->prescription as $comment)
                                            <li>{{$comment->advice}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="prescription-footer text-right">
                            <a class="primary-btn mr-2" href="{{route('pdfdownload', $vapp)}}">{{ __('Download') }} </a>
                            <a class="primary-btn" id="print" href="#">{{ __('Print') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ViewPrescription  Modal -->
@endforeach
@endsection
@push('script')
<script src="{{ asset('front/js/doctor-appointment.js') }}"></script>
@endpush