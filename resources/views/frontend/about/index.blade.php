@extends('frontend.layouts.default')
@section('content')

    <div class="page-wrapper">

        <!-- Page Banner -->
        <section class="page-banner" style="background-image: url({{Voyager::image($breadcrumb->image) ?? asset('assets/images/background/9.jpg') }})">
            <div class="auto-container">
                <ul class="page-breadbrumbs">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>{{ $about->title }}</li>
                </ul>
                <h1 class="page-banner_title">{{ $about->title }}</h1>
            </div>
        </section>
        <!-- End Page Banner -->

        <!-- Gallery Five -->
        <section class="booking-one">
            <div class="auto-container">
                <div class="row clearfix">
                    <!-- Contact Column -->
                    <div class="contact-column col-lg-12 col-md-12 col-sm-12">
                        <div class="text-justify">
                            {!! $about->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Gallery Five -->

    </div>
    <!-- End PageWrapper -->
@endsection
