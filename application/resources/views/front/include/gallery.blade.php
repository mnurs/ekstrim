<!-- gallery area start here  -->
<section class="gallery-area section-top mb--30"  style="background-image: url({{ $gallery_section_bg ? asset(path_gallery_image() . $gallery_section_bg->image) : asset('front/user/images/gallery-bg.png') }});">
    <div class="container">
        <div class="section-title text-center">
            <div class="row">
                @if (section_title('gallery-section') != null)
                <div class="col-lg-6 offset-lg-3">
                    <h2 class="title text-white">{{ section_title('gallery-section')->title }} </h2>
                    <p class="subtitle text-white">{{ section_title('gallery-section')->description }}</p>
                </div>
                @endif
            </div>
        </div>
        <div class="gallery-list">
            <div class="row">
                @foreach ($galleries as $gallery)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <a href="#" class="single-gallery">
                        <div class="gallery-thumbnail">
                            <img src="{{ asset(path_gallery_image() . $gallery->image) }}" alt="{{ $gallery->service->title }}" />
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- gallery area start here  -->