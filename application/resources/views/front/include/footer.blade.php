<!-- footer area start here  -->
<footer class="footer-area">
    <div class="footer-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <a href="{{ route('front.index') }}" class="footer-logo"><img src="{{ isset($site->image3) ? asset(path_site_while_logo_image().$site->image3) : asset(path_noimage_image().'no-image-200.jpg') }}" alt="{{ __('logo') }}" /></a>
                </div>
                <div class="col-md-8">
                    <div class="newsletter-area d-flex justify-content-between align-items-center">
                        <h3 class="newsletter-title">{{ __('Dapatkan Informasi Terbaru') }}</h3>
                        <div class="newsletter-form">
                            <form action="{{route('subscriber.store')}}" method="POST">
                                @csrf
                                <div class="newsletter-wrape">
                                    <input type="text" name="email" class="newsletter-input" placeholder="{{ __('Masukkan email anda...') }}" />
                                    <button class="newsletter-btn">{{ __('Kirim') }}</button>
                                </div>
                            </form>

                            @if (Session::has('subscribed'))
                            <p class="text-success">{{ Session::get('subscribed') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-widget text-widget">
                        <h3 class="widget-title">{{ __('Alamat Kami') }}</h3>
                        <p>{{$site->address}}</p>
                        <ul>
                            <li><i class="fas fa-mobile-alt"></i> {{ __('Telp 1 :') }} {{$site->helpline1}}</li>
                            <li><i class="fas fa-mobile-alt"></i> {{ __('WA Chat :') }} {{$site->helpline2}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-widget menu-widget">
                        <h3 class="widget-title">{{ __('Link Pintasan') }} </h3>
                        <ul>
                            @foreach (quick_links_menu() as $quick_links_menu)
                            <li><a href="{{ url($quick_links_menu->url) }}">{{ $quick_links_menu->label }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-widget menu-widget">
                        <h3 class="widget-title">{{ __('Dukungan & Bantuan') }}</h3>
                        <ul>
                            @foreach (support_help_menu() as $support_help_menu)
                            <li><a href="{{ url($support_help_menu->url) }}">{{ $support_help_menu->label }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-widget galley-widget">
                        <h3 class="widget-title">{{ __('Terima Kasih atas dukungan:') }}</h3>
                        <ul>
                            @foreach (footer_gallery() as $footer_gallery)
                            <li><a href="{{ route('front.single.service', $footer_gallery->service->slug) }}"><img src="{{ asset( path_gallery_image() . $footer_gallery->image) }}" alt="{{ __('galley') }}" /></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="contaienr">
            <div class="copyright-area text-center">
                <p class="mb-0">&copy; {{ __('2021') }} <a href="{{ route('front.index') }}">{{ __('EKSTRIM') }}</a> • {{ __('All Rights Reserved') }}</p>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end here  -->
