@extends('frontend.layouts.default')

@section('content')
    <main>
        <!-- breadcrumb-about-area-start -->
        <div class="breadcrumb-about-area scene p-relative breadcrumb-bg">
            <div class="about-inner-shape">
                <div class="about-inner-shape-2 d-none d-md-block">
                    <img class="layer" data-depth="0.5" src="{{ asset('assets/img/shape/about-inner-shape-1.png') }}" alt="">
                </div>
                <div class="about-inner-shape-3 d-none d-md-block">
                    <img class="layer" data-depth="0.5" src="{{ asset('assets/img/shape/about-inner-shape-2.png') }}" alt="">
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
                                <h3 class="breadcrumb__title">{{ $product->title }}</h3>
                                <div class="breadcrumb__list">
                                    <span><a href="{{ asset('/') }}">Trang chủ</a></span>
                                    <span class="dvdr"></span>
                                    <span>{{ $product->title }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->
        </div>

        <!-- team-area-start -->
        <section class="team-area pb-50 pt-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        {!! $product->content !!}
                    </div>
                </div>
            </div>
        </section>
        <!-- team-area-end -->
    </main>
@endsection
@section('css')
    <style>
        ul{
            margin-left: 20px;
        }
    </style>
@endsection