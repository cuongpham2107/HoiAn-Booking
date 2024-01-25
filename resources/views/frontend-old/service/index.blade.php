@extends('frontend.layouts.default')

@section('content')
    <main>
        <!-- breadcrumb-about-area-start -->
        <div class="breadcrumb-about-area scene p-relative breadcrumb-bg">
            <div class="about-inner-shape">
                <div class="about-inner-shape-2 d-none d-md-block">
                    <img class="layer" data-depth="0.5" src="assets/img/shape/about-inner-shape-1.png" alt="">
                </div>
                <div class="about-inner-shape-3 d-none d-md-block">
                    <img class="layer" data-depth="0.5" src="assets/img/shape/about-inner-shape-2.png" alt="">
                </div>
            </div>
            {{-- <div class="tpbanner-shape-y scene-y">
                <div class="about-inner-shape-4 d-none d-md-block">
                    <img class="layer" data-depth="0.6" src="assets/img/shape/inner-hand-1.png" alt="">
                </div>
            </div> --}}
            <!-- breadcrumb-area-start -->
            <section class="breadcrumb-area pb-50 pt-160">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="breadcrumb__content p-relative z-index-1">
                                <h3 class="breadcrumb__title">Dịch vụ của chúng tôi</h3>
                                <div class="breadcrumb__list">
                                    <span><a href="{{ asset('/') }}">Trang chủ</a></span>
                                    <span class="dvdr"></span>
                                    <span>Dịch vụ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->
        </div>
        <!-- seo-area-start -->
        {{-- <section class="seo-area pt-30 pb-60">
            <div class="container">
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-lg-4 col-sm-6">
                            <div class="tpseo p-relative mb-40">
                                <div class="tpseo-bg"></div>
                                <div class="tpseo-content">
                                    <div class="head">
                                        <div class="icon">
                                            <img loading="lazy"src="{{ Voyager::image($service->icon) }}" alt="icon service">
                                        </div>
                                        <h4 class="tpseo-title mb-15">{{ $service->title }}</h4>
                                    </div>
                                    <div class="tpseo-info">
                                        <p>{{ $service->desc }}</p>
                                        <div class="tpseo-details">
                                            <a href="{{ route('services.show', $service->slug) }}">Tìm hiểu thêm <i class="fa-light fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section> --}}
        <!-- seo-area-end -->
        <!-- portfolio-area-start -->
        <section class="portfolio-area pt-100 pb-110">
            <div class="container">
                <div class="row grid">
                    @foreach($services as $service)
                    <div class="col-lg-6 col-md-6 grid-item">
                        <div class="portfolio-inner-item mb-60">
                            <div class="portfolio-inner-thumb">
                                <a href="{{ route('services.show', $service->slug) }}">
                                    <img src="{{ Voyager::image($service->thumbnail('cropped', 'image')) }}" alt="{{ $service->title }}">
                                </a>
                            </div>
                            <div class="portfolio-inner-content">
                                <h4 class="portfolio-inner-title">
                                    <a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
@section('js')
    
@endsection
