@extends('front.layouts.main')
@section('page_title', __('Kontak'))
@include('front.include.breadcrumb')
@section('content')
<!-- contact area start here  -->
<section class="contact-area section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="address-ara mb-30">
                    <h3 class="address-title">{{ __('Kontak Kami') }}</h3>
                    <ul class="address-infno">
                        <li>
                            <div class="media">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="media-body">
                                    <h4 class="mt-0">{{ __('Alamat Kami') }}</h4>
                                    <p>{{$site->address}}</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="media-body">
                                    <h4 class="mt-0">{{ __('Telepon') }} </h4>
                                    <p><span>{{$site->helpline1}}</span> <span>{{$site->helpline2}}</span></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="media-body">
                                    <h4 class="mt-0"> {{ __('Email Kami') }} </h4>
                                    <p><span>{{ $site->helpline_email1 }}</span> <span>{{ $site->helpline_email2 }}</span></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="support-area">
                        <h3><i class="flaticon-headphones"></i> {{ __('Dukungan Online') }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map-area">
                    <div class="google-map">
                        <img src="{{ path_contact_image(). $site->contact_image }}" alt="{{ __('image') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="primary-form ">
            <h2 class="form-title">{{ __('Kirimkan Pesan Anda') }} </h2>
            <form action="{{ route('front.contact.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="yourname">{{ __('Nama Anda') }}</label>
                            <input type="text" class="form-control" id="yourname" name="name" placeholder="{{ __('Your Name') }}" />
                            <small class="text-danger">{{ __($errors->first('name')) }}</small>
                        </div>
                        <div class="form-group">
                            <label for="youremail">{{ __('Email') }}</label>
                            <input type="email" class="form-control" id="youremail" name="email" placeholder="{{ __('Your Email') }}" />
                            <small class="text-danger">{{ __($errors->first('email')) }}</small>
                        </div>
                        <div class="form-group">
                            <label for="message">{{ __('Pesan Anda') }}</label>
                            <textarea class="form-control comment-box" id="message" name="massage" rows="3" placeholder="{{ __('Your Messages') }}"></textarea>
                            <small class="text-danger">{{ __($errors->first('massage')) }}</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="uplode-form-group">
                            <input type="file" id="input-file-now" name="image" class="dropify" />
                        </div>
                        <small class="text-danger">{{ __($errors->first('image')) }}</small>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="primary-btn">{{ __('Kirim Pesan Anda') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- contact area end here  -->
@endsection
