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
            <section class="breadcrumb-area pb-50 pt-160 mb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="breadcrumb__content p-relative z-index-1">
                                <h3 class="breadcrumb__title">Hằng Nga Media</h3>
                                <div class="breadcrumb__list">
                                    <span><a href="{{ asset('/') }}">Trang chủ</a></span>
                                    <span class="dvdr"></span>
                                    <span>Giới thiệu</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->
        </div>
        <!-- breadcrumb-about-area-end -->
        
        <!-- mission-area-start -->
        {{--<div class="mission-area pb-120 pt-100" id="our-misson">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mission-content ">
                            <span><img src="assets/img/shape/about-5-shape-1.svg" alt=""></span>
                            <p>e are in business to develop an SEO software that allows anyone to independently optimize and
                                promote a website on the web, regardless of the level of expertise.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mission-shape p-relative d-none d-lg-block">
                            <div class="mission-shape-1">
                                <img src="assets/img/shape/smill.png" alt="triangle">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mission-two">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mission-shape p-relative  d-none d-lg-block">
                                <div class="mission-shape-2">
                                    <img src="assets/img/shape/mission-shape-1.png" alt="">
                                </div>
                                <div class="mission-shape-3">
                                    <img src="assets/img/shape/mission-shape-2.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="mission-content">
                                <span><img src="assets/img/shape/about-5-shape-2.svg" alt=""></span>
                                <p>We aim to constantly improve the user experience, functionality, and support to provide the
                                    best possible options for search engine optimization.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
        <!-- mission-area-end -->

        <!-- team-area-start -->
        <section class="team-area pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-justify">
                            {!! $about->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- team-area-end -->
    </main>
@endsection
