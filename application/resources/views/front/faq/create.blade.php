@extends('layouts.main')
@section('title', _('FAQ Create'))
@section('content')
    <!-- push external head elements to head -->
    @push('head')
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    @endpush
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('FAQ')}}</h5>
                            <span>{{ __('Add new faq')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">{{ __('Gallery')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Create')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <form action="{{ route('faq.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="ques">{{ __('Question') }}</label>
                                <textarea class="form-control" id="ques" name="question" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ans">{{ __('Answer') }}</label>
                                <textarea class="form-control" id="ans" name="answer" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('FAQ Title')}} <span class="text-danger">*</span> </label>
                                <select class="form-control select2" name="type">
                                    <option value="1">{{ __('Basic Question') }}</option>
                                    <option value="2">{{ __('Medical Question') }}</option>
                                    <option value="3">{{ __('Pricing Plane') }}</option>
                                    <option value="4">{{ __('Other Question') }}</option>
                                </select>
                                <span class="text-danger">{{ __($errors->first('type')) }}</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- push external js -->
    @push('script')
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/select2-active.js') }}"></script>
    @endpush
@endsection