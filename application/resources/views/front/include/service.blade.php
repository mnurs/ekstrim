<!-- service area start here  -->
<section class="service-area section">
    <div class="container">
        <div class="section-title text-center">
            <div class="row">
                @if (section_title('service-section') != null)
                <div class="col-lg-6 offset-lg-3">
                    <h2 class="title">{{ section_title('service-section')->title }} </h2>
                    <p class="subtitle">{{ section_title('service-section')->description }}</p>
                </div>
                @endif
            </div>
        </div>
        @if (Route::is('front.service'))
        <div class="row">
            @foreach ($services as $service)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-list ">
                    <div class="single-service mb-30">
                        <div class="service-thumbnail">
                            <img src="{{ asset(path_service_image() . $service->image) }}" alt="{{ $service->title }}" />
                        </div>
                        <div class="service-info">
                            <div class="service-icon">
                                <img src="{{ asset(path_service_image() . $service->icon) }}" alt="{{ $service->title }}" />
                            </div>
                            <h3 class="service-title">{{ $service->title }}</h3>
                            <p class="service-content">{{ $service->description }}</p>
                            <a class="service-btn" href="{{ route('front.single.service', $service->slug) }}">{{ __('Lihat Detail') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="service-list service-slide-active">
            @foreach ($services as $service)
            <div class="single-service">
                <div class="service-thumbnail">
                    <img src="{{ asset(path_service_image() . $service->image) }}" alt="{{ $service->title }}" />
                </div>
                <div class="service-info">
                    <div class="service-icon">
                        <img src="{{ asset(path_service_image() . $service->icon) }}" alt="{{ $service->title }}" />
                    </div>
                    <h3 class="service-title">{{ $service->title }}</h3>
                    <p class="service-content">{{ $service->description }}</p>
                    <a class="service-btn" href="{{ route('front.single.service', $service->slug) }}">{{ __('Lihat Detail') }}</a>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
<!-- service area end here  -->
