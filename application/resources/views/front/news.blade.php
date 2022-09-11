@extends('front.layouts.main')
@section('page_title', __('Berita'))
@include('front.include.breadcrumb')
@section('content')
<!-- blog area start here  -->
<section class="blog-area section">
    <div class="container">
        <div class="section-title text-center">
            <div class="row">
                @if (section_title('news-section') != null)
                <div class="col-lg-6 offset-lg-3">
                    <h2 class="title">{{ section_title('news-section')->title }} </h2>
                    <p class="subtitle">{{ section_title('news-section')->description }}</p>
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            @foreach ($all_news as $news)
            <div class="col-md-6">
                <div class="single-grid-blog">
                    <div class="blog-thumbnail">
                        <a href="{{ route('front.single.news', $news->slug) }}"><img src="{{ asset(path_news_image() . $news->image) }}" alt="{{ asset(path_news_image() . $news->image_alt) }}" /></a>
                    </div>
                    <div class="blog-info">
                        <h3 class="blog-title"><a href="{{ route('front.single.news', $news->slug) }}">{{ strlen($news->title) > 45 ? substr($news->title, 0, 45) . '...' :  $news->title}}</a></h3>
                        <ul class="blog-meta">
                            <li>
                                <div class="author-info">
                                    <div class="author-image">
                                        <img src="{{ asset(path_user_image() . $news->user->image) }}" alt="{{ $news->user->name }}" />
                                    </div>
                                    <h4 class="author-name">{{ $news->user->name }}</h4>
                                </div>
                            </li>
                            <li> <i class="flaticon-calendar"></i> {{ $news->created_at->format('M d. Y') }}</li>
                        </ul>
                        <p class="blog-content">{{ strlen($news->description) > 126 ? substr($news->description, 0, 126) . '...' :  $news->description}}</p>
                        <a class="redmore-btn" href="{{ route('front.single.news', $news->slug) }}">{{ __('Read More') }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $all_news->links() }}
    </div>
</section>
<!-- blog area end here  -->
@include('front.include.testimonial')
@include('front.include.doctor')
@endsection