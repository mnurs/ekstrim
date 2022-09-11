@extends('front.layouts.main')
@section('page_title', __('Patient Dashboard'))
@section('content')
<!-- breadcrumb area start here   -->
<section class="breadcrumb-area cus-bg-img">
    <div class="container">
        <h2 class="page-title">{{ __('Dashboard Pengguna') }}</h2>
        <ul class="breadcrumb-page">
            <li><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
            <li>{{ __('Dashboard') }}</li>
        </ul>
    </div>
</section>
<!-- breadcrumb area end here   -->
<div class="main-section-wrap section" id="js_variable_data" data-jsvar='{{ $patientVariables }}'>
    <div class="container">
        <div class="section-header">
            <div class="section-header-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-9">
                        <div class="tab-menu">
                            <ul class="nav nav-tabs" id="DashboardTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="tabone-tab" data-toggle="tab" href="#tabone" role="tab" aria-controls="tabone" aria-selected="true">
                                        <i class="fas fa-home"></i> <span>{{ __('Dashboard') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tabtwo-tab" data-toggle="tab" href="#tabtwo" role="tab" aria-controls="tabtwo" aria-selected="false">
                                        <i class="fas fa-calendar-check"></i> <span> {{ __('Semua Catatan') }}</span>
                                    </a>
                                </li>
                                
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tabthree-tab" data-toggle="tab" href="#tabthree" role="tab" aria-controls="tabthree" aria-selected="false">
                                        <i class="fas fa-calendar-plus"></i><span>{{ __('Hasil Skrining') }}</span>
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
            <strong>{{ __('Congratulation!') }}</strong> {{Session::get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="section-wraper" id="cong">
            <div class="tab-content" id="DashboardTabContent">
                <div class="tab-pane fade show active" id="tabone" role="tabpanel" aria-labelledby="tabone-tab">
                    <div class="dashboard-box">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="single-box">
                                    <div class="media align-items-center">
                                        <img src="{{asset('front/assets/images/box-image-1.png')}}" class="box-image mr-4" alt="{{ __('box image') }}" />
                                        <div class="media-body">
                                            <h4 class="counter-title mt-0">{{ __('Appoinment Selesai') }}</h4>
                                            <h2 class="counter">{{past_appointment_count()}}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-box">
                                    <div class="media align-items-center">
                                        <img src="{{asset('front/assets/images/box-image-2.png')}}" class="box-image mr-4" alt="{{ __('box image') }}" />
                                        <div class="media-body">
                                            <h4 class="counter-title mt-0">{{ __('Appoinment Saat ini') }}</h4>
                                            <h2 class="counter color-two">{{patient_ongoing_count()}}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- breadcrumb area end here 
                            <div class="col-lg-4 col-md-6">
                                <div class="single-box">
                                    <div class="media align-items-center">                                        <div class="media-body">
                                        <img src="{{asset('front/assets/images/box-image-3.png')}}" class="box-image mr-4" alt="{{ __('box image') }}" />
                                            <h4 class="counter-title mt-0">{{ __('Total') }}</h4>  
                                            <h2 class="counter color-three">{{auth()->user()->earning->pluck('earning')->sum()}}</h2>
                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                             -->
                        </div>
                    </div>
                    <div class="section-heading-area">
                        <h2 class="section-title">{{ __('Appointment Berlalu ') }} </h2>
                    </div>
                    <div class="primary-table">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('Nama Konselor') }}</th>
                                        <th scope="col">{{ __('Tanggal') }}</th>
                                        <th scope="col">{{ __('Waktu') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Saran Ahli') }}</th>
                                        <th scope="col">{{ __('Aksi') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="dashboardpagi">
                                    @include('front.pages.dashboardpagi')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabtwo" role="tabpanel" aria-labelledby="tabtwo-tab">
                    <div class="section-heading-area">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h2 class="section-title">{{ __('Semua Catatan') }}</h2>
                            </div>
                            <div class="col-md-6 text-md-right">
                            </div>
                        </div>
                    </div>
                    <div class="section-inner-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="inner-tabs-menu">
                                    <ul class="nav nav-tabs" id="AppominmentTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="TodayAppominment-tab" data-toggle="tab" href="#TodayAppominment" role="tab" aria-controls="TodayAppominment" aria-selected="true">{{ __('Janji Hari ini') }}</a>
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
                                                    <input type="text" class="form-control" name="appoinmentsearch" id="appoinmentsearch" placeholder="{{ __('Cari Konselor') }}" />
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
                            @include('front.pages.today_pagination')
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
                            @include('front.pages.past_pagination')
                            <!-- searchtable -->
                            <div class="primary-table d-none" id="searchhead">
                                <div class="table-responsive">
                                    <table class="table" id="todaypagination">
                                        <thead>
                                            <tr>
                                                <th scope="col">{{ __('Nama Konselor') }}</th>
                                                <th scope="col">{{ __('Tanggal') }}</th>
                                                <th scope="col">{{ __('Waktu') }}</th>
                                                <th scope="col">{{ __('Aksi') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody id="searchbody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- searchtable -->
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabthree" role="tabpanel" aria-labelledby="tabthree-tab">
                    <div class="new-appointment-form">
                        <form id="new-appointment-form" method="POST" action="{{route('appointment')}}">
                            @csrf
                            <!-- Circles which indicates the steps of the form: -->
                            <div class="form-progres-step">
                                <div class="step"><span>{{ __('01') }}</span></div>
                                <div class="step"><span>{{ __('02') }}</span></div>
                                <div class="step"><span>{{ __('03') }}</span></div>
                                <div class="step"><span>{{ __('04') }}</span></div>
                            </div>
                            <!-- One "tab" for each step in the form: -->
                            <input type="hidden" name="slot_id" id="slotid">
                            <input type="hidden" id="appinput" value="" name="appinput">
                            <div class="tab">
                                <h3 class="form-title">{{ __('Pilih Layanan') }}</h3>
                                <h4 class="form-inner-title">{{ __('Pilih Layanan dan Tanggal') }}</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="date" name="appdate" class="form-control" id="date" placeholder="{{ __('Select Date') }}" />
                                            <span class="form-icon"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="apptime-select">
                                            <select name="apptime" id="apptime" class="form-control">
                                                <option value="">{{ __('Pilih Slot Waktu') }}</option>
                                                @foreach ($docslots as $docslot)
                                                <option value="{{$docslot->id}}" data-time="{{$docslot->start_time}}-{{$docslot->end_time}}">{{Carbon\Carbon::parse($docslot->start_time)->format('h:i A')}}-{{Carbon\Carbon::parse($docslot->end_time)->format('h:i A')}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                <h4 class="form-inner-title">{{ __('Layanan Konselor') }} </h4>
                                <div class="dectors-service-list">
                                    @foreach ($doctorCategory as $category)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="DoctorsService" id="{{$category->name}}" value="{{ ucfirst($category->name)}}">
                                        <label class="form-check-label" for="{{$category->name}}">
                                            {{ ucfirst($category->name)}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab">
                                <h3 class="form-title">{{ __('Pilih Konselor') }}</h3>
                                <div class="row doctorajax">
                                </div>
                            </div>
                            <div class="tab">
                                <h3 class="form-title">{{ __('Pilih Informasi Komentar') }}</h3>
                                <h4 class="form-inner-title" id="formInnerTitle"></h4>
                                <div class="appoinment-table mb-30">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>{{ __('Tanggal Janji') }}</td>
                                                    <td>{{ __('Waktu Jani') }}</td>
                                                    <td>{{ __('Hari Janji') }}</td>
                                                    <td>{{ __('Keterangan') }} </td>
                                                </tr>
                                                <tr>
                                                    <td id="app_date"></td>
                                                    <td id="app_time"></td>
                                                    <td id="app_day"></td>
                                                    <td id="app_specialist"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Comment">{{ __('Jelaskan Masalah Anda') }}</label>
                                    <textarea name="comment" class="form-control comment-box" id="Comment" rows="3" placeholder="{{ __("Kirimkan pesan anda untuk.") }} "></textarea>
                                </div>
                            </div>
                            <div class="tab">
                                <h3 class="form-title">{{ __('Pilih Metode') }}</h3>
                                <div class="row mt-3">
                                    <div class="col">
                                        <div class="form-group" id="toggler">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                @foreach($paymentPlatforms as $paymentPlatform)
                                                <label class="btn btn-outline-secondary rounded m-2 p-1" data-target="#{{$paymentPlatform->name}}Collapse" data-toggle="collapse">
                                                    <input required value="option{{$paymentPlatform->id}}" id="radio{{$paymentPlatform->id}}" type="radio" name="payment_platform">
                                                    <img class="img-thumbnail" src="{{asset($paymentPlatform->image)}}" alt="{{ __('image') }}">
                                                </label>
                                                @endforeach
                                            </div>
                                            @foreach ($paymentPlatforms as $paymentPlatform)
                                            <div id="{{$paymentPlatform->name}}Collapse" class="collapse" data-parent="#toggler">
                                                @includeIf('components.'. strtolower($paymentPlatform->name) .'-collapse')
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-btn">
                                <button type="button" class="previsousbtn" id="prevBtn">{{ __('Previous') }}</button>
                                <button type="button" id="nextBtn" >{{ __('Next') }}</button>
                            </div>
                        </form>
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
                                                    <h4 class="user-age">{{ __('Age:') }} {{Auth::user()->age}} {{ __('Years') }}</h4>
                                                    <button class="profile-btn" type="button" data-toggle="modal" data-target="#editeprofilemodal"><i class="far fa-edit"></i>
                                                        {{ __('Edit Info') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-md-8">
                                            <div class="profile-left">
                                                <div class="secondary-form">
                                                    <form>
                                                        <h3 class="form-title">{{ __('Informasi Dasar') }}</h3>
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
                                                                    <label>{{ __('Jenis Kelamin') }}</label>
                                                                    <input type="text" class="form-control" placeholder="{{Auth::user()->gender}}" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class="form-group">
                                                                    <label>{{ __('Tanggal Lahir') }}</label>
                                                                    <input type="text" class="form-control" placeholder="{{ date('d M Y',strtotime(Auth::user()->dob)) }}" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h3 class="form-title mt-20">{{ __('Informasi Alamat') }}</h3>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class="form-group">
                                                                    <label>{{ __('Jalan') }}</label>
                                                                    <input type="text" class="form-control" placeholder="{{Auth::user()->address}}" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class="form-group">
                                                                    <label>{{ __('Kota') }}</label>
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
            <div class="congratulation-wrap d-none">
                <div class="congratulation-box text-center">
                    <img class="congratulation-img" src="{{asset('front/assets/images/congratulation.png')}}" alt="{{ __('congratulation') }}" />
                    <h3 class="congratulation-title">{{ __('Selamat') }}</h3>
                    <p class="congratulation-text">{{ __('Nomor Booking anda mendukung approval konselor') }}</p>
                    <a id="closebtn" class="close-btn">{{ __('Close') }}</a>
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
                    <h2 class="section-title">{{ __('Edit Profile') }}</h2>
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
                                    <input type="file" id="file-input" name="image" class="form-control-file">
                                </div>
                            </div>
                            <h4 class="form-inner-title">{{ __('Pilih Layanan & Tanggal') }}</h4>
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name" value="{{Auth::user()->name}}" placeholder="{{isset(Auth::user()->name) ? Auth::user()->name : __('Enter your name')}}" required />
                                        <small class="text-danger d-none nameerror">{{ __('Name field is required') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email2" value="{{Auth::user()->email}}" placeholder="{{isset(Auth::user()->email) ? Auth::user()->email : __('Enter your email')}}" />
                                        <small class=" text-danger d-none emailerror">{{ __('Email field is required') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="dob" id="group" value="{{ date('Y-m-d',strtotime(Auth::user()->dob)) }}" placeholder="{{isset(Auth::user()->dob) ? Auth::user()->dob : __('Enter your date of birth')}}" />
                                        <small class=" text-danger d-none dateerror">{{ __('Date field is required') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="age" id="age" value="{{Auth::user()->age}}" placeholder="{{isset(Auth::user()->age) ? Auth::user()->age : __('Enter your age')}}" />
                                        <small class=" text-danger d-none ageerror">{{ __('Age field is required') }}</small>
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
                                                {{ __('Male') }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="famale" value="female" @if(isset(Auth::user()->gender))
                                            @if(Auth::user()->gender == 'female')
                                            checked
                                            @endif
                                            @endif>
                                            <label class="form-check-label" for="famale">
                                                {{ __('Female') }}
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
                                        <small class=" text-danger d-none cityerror">{{ __('Age field is required') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="code" id="code" value="{{Auth::user()->code}}" placeholder="{{isset(Auth::user()->code) ? Auth::user()->code : __('Enter your code')}}" />
                                        <small class=" text-danger d-none codeerror">{{ __('Code field is required') }}</small>
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
<!-- paypal form -->
<form id="paypalform" action="{{route('pay')}}" method="POST">
    @csrf
    <input type="hidden" name="selectdoctory" id="paypal_docid" value=''>
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
<!-- ViewPrescription  Modal -->
@foreach($pastappmodal as $vapp)
<div class="modal fade" id="ViewPrescription{{$vapp->id}}">
    <div class="modal-dialog modal-dialog-centered prescriptionmodal">
        <div class="modal-content" id="printable">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div class="prescription-wrap">
                    <div class="prescription-top mb-30">
                        <h2 class="section-title">{{ __('Semua Appointment') }} <span>/ {{ __('Tampilkan Saran') }}</span></h2>
                    </div>
                    <div class="prescription-area">
                        <div class="prescription-header mb-30">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="prescription-header-left">
                                        <h3>{{isset($vapp->doctor->user->name) ? $vapp->doctor->user->name : ''}}</h3>
                                        <h4>{{isset($vapp->doctor->specialist) ?$vapp->doctor->specialist :''}} {{ __('Specialist') }}</h4>
                                        <span>{{isset($vapp->doctor->specialist) ?$vapp->doctor->specialist :''}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="prescription-header-center">
                                        <span>{{ __('Chamber') }}</span>
                                        <h4>{{isset($vapp->doctor->chamber) ? $vapp->doctor->chamber :''}}</h4>
                                        <p>{{isset($vapp->doctor->degree) ? $vapp->doctor->degree :''}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="prescription-header-right">
                                        <div class="prescription-timing mb-2">
                                            <h4>{{ __('Off Day:') }} {{isset($vapp->doctor->offday) ? $vapp->doctor->offday :''}}</h4>
                                            <span>{{isset($vapp->doctor->starttime) ? Carbon\Carbon::parse($vapp->doctor->starttime)->format('g:i a') : ''}} - {{isset($vapp->doctor->endtime) ? Carbon\Carbon::parse($vapp->doctor->endtime)->format('g:i a') :''}}</span>
                                            <span>{{isset($vapp->doctor->starttime) ? Carbon\Carbon::parse($vapp->doctor->starttime2)->format('g:i a') : ''}} - {{isset($vapp->doctor->endtime2) ? Carbon\Carbon::parse($vapp->doctor->endtime)->format('g:i a') :''}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="prescription-date mb-30">
                            <p>{{ __('Appointment Date:') }} {{Carbon\Carbon::parse($vapp->adddate)->format('d M, Y, D')}} , {{Carbon\Carbon::parse($vapp->slot->start_time)->format('h:i A')}}-{{Carbon\Carbon::parse($vapp->slot->end_time)->format('h:i A')}} </p>
                        </div>
                        <div class="prescription-body ">
                            <div class="prescription-info mb-30">
                                <h3 class="prescription-section-title">{{ __('Obat:') }}   </h3>
                                <div class="primary-table">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ __('SL No') }}</th>
                                                    <th scope="col">{{ __('Nama Obat') }}</th>
                                                    <th scope="col">{{ __('Type') }}</th>
                                                    <th scope="col">{{ __('Mg/Ml') }}</th>
                                                    <th scope="col">{{ __('Dosis') }}</th>
                                                    <th scope="col">{{ __('Hari') }}</th>
                                                    <th scope="col">{{ __('Komentar') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $i=0;
                                                @endphp
                                                @forelse($vapp->prescription as $prescription)
                                                @php
                                                $i++;
                                                @endphp
                                                <tr>
                                                    <td>#{{$i}}</td>
                                                    <td>{{$prescription->medicine_name}}</td>
                                                    <td>{{$prescription->medicine_type}}t</td>
                                                    <td>{{$prescription->medicine_quantity}}</td>
                                                    <td>{{$prescription->medicine_dose}}</td>
                                                    <td>{{$prescription->medicine_day}}</td>
                                                    <td>{{$prescription->medicine_comment}}</td>
                                                </tr>
                                                @empty
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 ">
                                    <div class="patient-info mb-30">
                                        <h3 class="prescription-section-title mb-2">{{ __('Informasi Pengguna:') }}</h3>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td>{{ __('Nama') }} </td>
                                                    <td>: <b>{{$vapp->patient->name}}</b></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('Usia') }} </td>
                                                    <td>: <b>{{$vapp->patient->age}}</b></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('Jenis Kelamin') }} </td>
                                                    <td>: <b>{{$vapp->patient->gender}}</b></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('Tipe Pengguna') }} </td>
                                                    <td>: <b>{{ __('New') }}</b></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('Blood Pressure') }} </td>
                                                    <td>: <b>{{isset($vapp->prescription()->latest()->first()->patient_bp) ? $vapp->prescription()->latest()->first()->patient_bp : ''}}</b></td>
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
                                        <h3 class="prescription-section-title mb-3">{{ __('Saran') }}</h3>
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
<div class="modal fade" id="noPrescription" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Tidak ada saran') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ __('Tidak ada saran tersedia!') }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('script')
<script src="{{ asset('front/js/patient-appointment.js') }}"></script>
@endpush
