@extends('layouts.main')
@section('title', __('Dashboard'))
@section('content')
@push('head')
<link rel="stylesheet" href="{{ asset('plugins/chartist/dist/chartist.min.css') }}">
@endpush
<div class="container-fluid">
    <div class="row">
        <!-- page statustic chart start -->
        <div class="col-xl-3 col-md-6">
            <div class="card card-red text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="mb-0">{{$doctorCount}}</h4>
                            <p class="mb-0">{{ __('Konselor')}}</p>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fas fa-cube f-30"></i>
                        </div>
                    </div>
                    <div id="Widget-line-chart1" class="chart-line chart-shadow"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-blue text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="mb-0">{{ __($patientCount)}}</h4>
                            <p class="mb-0">{{ __('Pengguna')}}</p>
                        </div>
                        <div class="col-4 text-right">
                            <i class="ik ik-shopping-cart f-30"></i>
                        </div>
                    </div>
                    <div id="Widget-line-chart2" class="chart-line chart-shadow"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-green text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="mb-0">{{ __($appointmentCount) }}</h4>
                            <p class="mb-0">{{ __('Appointment')}}</p>
                        </div>
                        <div class="col-4 text-right">
                            <i class="ik ik-user f-30"></i>
                        </div>
                    </div>
                    <div id="Widget-line-chart3" class="chart-line chart-shadow"></div>
                </div>
            </div>
        </div>
        <!--
        <div class="col-xl-3 col-md-6">
            <div class="card card-yellow text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="mb-0">{{ __($earning)}}</h4>
                            <p class="mb-0">{{ __('Total')}}</p>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fa fa-dollar-sign f-30"></i>
                        </div>
                    </div>
                    <div id="Widget-line-chart4" class="chart-line chart-shadow"></div>
                </div>
            </div>
        </div>
        -->
        <!-- page statustic chart end -->
        <!-- product and new customar start -->
        <div class="col-xl-4 col-md-6">
            <div class="card new-cust-card">
                <div class="card-header">
                    <h3>{{ __('Konselor Baru')}}</h3>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="ik ik-chevron-left action-toggle"></i></li>
                            <li><i class="ik ik-minus minimize-card"></i></li>
                            <li><i class="ik ik-x close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-block">
                    @foreach ($doctors as $doctor)
                    <div class="align-middle mb-25">
                        <img src="{{ isset($doctor->image) ? asset(path_user_image().$doctor->image) : Avatar::create($doctor->name)->toBase64()}}" alt="{{ __('user image') }}" class="rounded-circle img-40 align-top mr-15">
                        <div class="d-inline-block">
                            <a href="#!">
                                <h6>{{$doctor->name}}</h6>
                            </a>
                            <span class="status active"></span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-md-6">
            <div class="card table-card">
                <div class="card-header">
                    <h3>{{ __('Appointment Baru')}}</h3>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="ik ik-chevron-left action-toggle"></i></li>
                            <li><i class="ik ik-minus minimize-card"></i></li>
                            <li><i class="ik ik-x close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>{{ __('Nama Pengguna')}}</th>
                                    <th>{{ __('Nama Konselor')}}</th>
                                    <th>{{ __('Keahlian')}}</th>
                                    <!-- push external js 
                                    <th>{{ __('Fees')}}</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointment as $app)
                                <tr>
                                    <td>{{$app->patient->name}}</td>
                                    <td>{{$app->doctor->user->name}}</td>
                                    <td>{{$app->doctor->fees}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-pie-chart bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('Grafik')}}</h5>
                        <span>{{ __('Statistik Penggunaan Layanan /Year')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="js_variable_data" data-jsvar='{{ $adminDashboardVariables }}'>
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Data Layanan Pertahun')}}</h3>
                </div>
                <div class="card-block">
                    <div id="lineChart_area" class="chart-shadow st-cir-chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- push external js -->
@push('script')
<script src="{{ asset('plugins/chartist/dist/chartist.min.js') }}"></script>
<script src="{{ asset('js/chart.js') }}"></script>
@endpush
@endsection
