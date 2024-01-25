@extends('frontend.layouts.default')
@section('content')
    <!-- Banner One -->
    <section class="banner-one style-two slider-version">
        @if (isset($homeBanners))
        <div class="single-item-carousel owl-carousel owl-theme">
            @foreach($homeBanners as $banner)
            <!-- Slide 01 -->
            <div class="slide">
                <img src="{{ Voyager::image($banner->image) }}" alt="{{ $banner->title }}">
            </div>
            @endforeach
        </div>
        @endif
    </section>
    <!-- End Banner One -->
{{--    <div class="page-wrapper">--}}
{{--        @if (isset($homeBanners))--}}
{{--            <!-- Banner One -->--}}
{{--            <section class="banner-one">--}}
{{--                <img src="{{ Voyager::image($homeBanners->image) }}" alt="{{ $homeBanners->title }}">--}}
{{--                <div class="banner-one_image-layer" style="background-image: url({{ Voyager::image($homeBanners->image) }})">--}}
{{--                </div>--}}
{{--                <div class="auto-container">--}}
{{--                    <!-- Content Column -->--}}
{{--                    {!! $homeBanners->banner_text !!}--}}
{{--                    --}}{{--<div class="banner-one_content">--}}
{{--                        <div class="banner-one_content-inner">--}}
{{--                            <div class="banner-one_title">--}}
{{--                            </div>--}}
{{--                            <!-- Clients Box -->--}}
{{--                            <div class="clients-box">--}}
{{--                                <!-- Sponsors Carousel -->--}}
{{--                                <ul class="sponsors-carousel owl-carousel owl-theme">--}}
{{--                                    <li class="slide-item">--}}
{{--                                        <figure class="client-one_image-box"><a href="#"><img--}}
{{--                                                    src="{{ asset('assets/images/clients/1.png') }}" alt=""></a>--}}
{{--                                        </figure>--}}
{{--                                    </li>--}}
{{--                                    <li class="slide-item">--}}
{{--                                        <figure class="client-one_image-box"><a href="#"><img--}}
{{--                                                    src="{{ asset('assets/images/clients/2.png') }}" alt=""></a>--}}
{{--                                        </figure>--}}
{{--                                    </li>--}}
{{--                                    <li class="slide-item">--}}
{{--                                        <figure class="client-one_image-box"><a href="#"><img--}}
{{--                                                    src="{{ asset('assets/images/clients/3.png') }}" alt=""></a>--}}
{{--                                        </figure>--}}
{{--                                    </li>--}}
{{--                                    <li class="slide-item">--}}
{{--                                        <figure class="client-one_image-box"><a href="#"><img--}}
{{--                                                    src="{{ asset('assets/images/clients/4.png') }}" alt=""></a>--}}
{{--                                        </figure>--}}
{{--                                    </li>--}}
{{--                                    <li class="slide-item">--}}
{{--                                        <figure class="client-one_image-box"><a href="#"><img--}}
{{--                                                    src="{{ asset('assets/images/clients/5.png') }}" alt=""></a>--}}
{{--                                        </figure>--}}
{{--                                    </li>--}}
{{--                                    <li class="slide-item">--}}
{{--                                        <figure class="client-one_image-box"><a href="#"><img--}}
{{--                                                    src="{{ asset('assets/images/clients/1.png') }}" alt=""></a>--}}
{{--                                        </figure>--}}
{{--                                    </li>--}}
{{--                                    <li class="slide-item">--}}
{{--                                        <figure class="client-one_image-box"><a href="#"><img--}}
{{--                                                    src="{{ asset('assets/images/clients/2.png') }}" alt=""></a>--}}
{{--                                        </figure>--}}
{{--                                    </li>--}}
{{--                                    <li class="slide-item">--}}
{{--                                        <figure class="client-one_image-box"><a href="#"><img--}}
{{--                                                    src="{{ asset('assets/images/clients/3.png') }}" alt=""></a>--}}
{{--                                        </figure>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
{{--            <!-- End Banner One -->--}}
{{--        @endif--}}
        <!-- Destination One -->
        <section class="destination-one">
            <div class="auto-container">
                <!-- Sec Title -->
                <div class="sec-title centered">
                    <h2 class="sec-title_heading">POPULAR DESTINATIONS</h2>
                    <div class="sec-title-text">Explore our top destinations right from our beloved clients’ reviews.
                    </div>
                </div>
                <div class="row clearfix">
                    @if (isset($tourProminents[0]))
                        <!-- Destination Block One -->
                        <div class="destination-block_one col-lg-3 col-md-6 col-sm-12">
                            <div class="destination-block_one-inner">
                                <div class="destination-block_one-image">
                                    <a href="{{ route('tours.show', ['slug' => $tourProminents[0]->slug]) }}">
                                        <img src="{{ Voyager::image($tourProminents[0]->getThumbnail($tourProminents[0]->thumbnails, 'prominent')) }}"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="destination-block_one-content">
                                    <h3 class="destination-block_one-title line-clamp-2 text-xl">
                                        <a
                                            href="{{ route('tours.show', ['slug' => $tourProminents[0]->slug]) }}">{{ $tourProminents[0]->name }}</a>
                                    </h3>
                                    <div class="destination-block_one-location text-lg">
                                        {{ $tourProminents[0]->amountPackage }}
                                        Packages
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (isset($tourProminents[1]))
                        <!-- Destination Block One -->
                        <div class="destination-block_one col-lg-6 col-md-12 col-sm-12">
                            <div class="destination-block_one-inner">
                                <div class="destination-block_one-image">
                                    <a href="{{ route('tours.show', ['slug' => $tourProminents[1]->slug]) }}">
                                        <img src="{{ Voyager::image($tourProminents[1]->getThumbnail($tourProminents[1]->thumbnails, 'most-prominent')) }}"
                                            alt="" /></a>
                                    <div class="destination-block_one-overlay">
                                        <div class="destination-block_one-overlay-content">
                                            <h3 class="destination-block_one-title line-clamp-2 text-2xl">
                                                <a
                                                    href="{{ route('tours.show', ['slug' => $tourProminents[1]->slug]) }}">{{ $tourProminents[1]->name }}</a>
                                            </h3>
                                            <div class="destination-block_one-location text-lg">
                                                {{ $tourProminents[1]->amountPackage }}
                                                Packages
                                            </div>
                                            <div class="destination-block_one-text line-clamp-3 text-base">
                                                {{ $tourProminents[1]->title }}</div>
                                            <div class="destination-block_one-btns">
                                                <a href="{{ route('tours.show', ['slug' => $tourProminents[1]->slug]) }}"
                                                    class="theme-btn book-btn">Book Now</a>
                                                <a href="{{ route('tours.show', ['slug' => $tourProminents[1]->slug]) }}"
                                                    class="theme-btn learn-btn">Learn More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (isset($tourProminents[2]))
                        <!-- Destination Block One -->
                        <div class="destination-block_one col-lg-3 col-md-6 col-sm-12">
                            <div class="destination-block_one-inner">
                                <div class="destination-block_one-image">
                                    <a href="{{ route('tours.show', ['slug' => $tourProminents[2]->slug]) }}">
                                        <img src="{{ Voyager::image($tourProminents[2]->getThumbnail($tourProminents[2]->thumbnails, 'prominent')) }}"
                                            alt="" /></a>
                                </div>
                                <div class="destination-block_one-content">
                                    <h3 class="destination-block_one-title line-clamp-2 text-xl">
                                        <a
                                            href="{{ route('tours.show', ['slug' => $tourProminents[2]->slug]) }}">{{ $tourProminents[2]->name }}</a>
                                    </h3>
                                    <div class="destination-block_one-location text-lg">
                                        {{ $tourProminents[2]->amountPackage }}
                                        Packages
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- End Destination One -->

        <!-- Feature One -->
            @if(count($static_icons)>0)
        <section class="feature-one" style="background-image: url({{ asset('assets/images/background/19.jpg') }})">
            <div class="auto-container">
                <div class="row clearfix">
                    @foreach ($static_icons as $item)
                        @if ($item->type == 'feature')
                            <!-- Feature Block One -->
                            <div class="feature-block_one col-lg-3 col-md-6 col-sm-12">
                                <div class="feature-block_one-inner wow fadeInLeft" data-wow-delay="0ms"
                                    data-wow-duration="1500ms">
                                    <div class="feature-block_one-icon d-flex align-items-center justify-content-center">
                                        <img src="{{ Voyager::image($item->image) }}" alt="">
                                    </div>
                                    <h5 class="feature-block_one-title">{{ $item->title }}</h5>
                                    <div class="feature-block_one-text">
                                        {{ $item->content }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
            @endif
        <!-- End Feature One -->

        <!-- Package One -->
        <section class="package-one">
            <div class="auto-container">
                <!-- Sec Title -->
                <div class="sec-title">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <div class="title-content">
                            <h2 class="sec-title_heading">HOTEL & RESORT</h2>
                            <div class="sec-title-text">Introducing to you outstanding Hotels & Resorts.</div>
                        </div>
                        <a class="package-one_more" href="{{ Route('hotels') }}">See More Packages</a>
                    </div>
                </div>
                <div class="row clearfix">
                    @if (isset($hotelSpecials[0]))
                        <!-- Package Block One -->
                        <div class="package-block_one col-lg-3 col-md-4 col-sm-12">
                            <div class="package-block_one-inner">
                                <div class="package-block_one-image">
                                    <img src="{{ Voyager::image($hotelSpecials[0]->getThumbnail($hotelSpecials[0]->thumbnails, 'thumbnail-vertical')) }}"
                                        alt="" />
                                    <div class="package-block_one-number">01</div>
                                    <div class="package-block_one-content">
                                        <h3 class="package-block_one-title text-xl">
                                            <a
                                                href="{{ route('hotels.show', ['slug' => $hotelSpecials[0]->slug]) }}">{{ $hotelSpecials[0]->name }}</a>
                                            <p style="color: #a0a0a0;">{{ $hotelSpecials[0]->short_desc }}</p>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (isset($hotelSpecials[1]))
                        <!-- Package Block Two -->
                        <div class="package-block_two col-lg-9 col-md-8 col-sm-12">
                            <div class="package-block_two-inner">
                                <div class="package-block_two-image">
                                    <img src="{{ Voyager::image($hotelSpecials[1]->getThumbnail($hotelSpecials[1]->thumbnails, 'thumbnail-horizontal')) }}"
                                        alt="" />
                                    <div class="package-block_two-number">02</div>
                                </div>
                                <div class="package-block_two-content">
                                    <div class="d-flex justify-content-between flex-wrap">
                                        <h3 class="package-block_two-title">
                                            <a
                                                href="{{ route('hotels.show', ['slug' => $hotelSpecials[1]->slug]) }}">{{ $hotelSpecials[1]->name }}</a>
                                        </h3>
                                        <div class="package-block_two-box">
                                            <div class="package-block_two-text">{{ $hotelSpecials[1]->short_desc }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- End Package One -->

        <!-- Counter One -->
        <section class="counter-one">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="counter-image">
                        <img src="{{ Voyager::image($counterBanner->image) }}" alt="" />
                        <div class="counter-one_content">
                            <h2 class="counter-one_title">{{$counterBanner->title}}</h2>
                            <div class="counter-one_text">{!! $counterBanner->banner_text !!}
                            </div>
                        </div>
                        <div class="counter-one_lower-content">
                            <div class="row clearfix">

                                <!-- Counter Column -->
                                <div class="counter-one_block col-lg-3 col-md-6 col-sm-6">
                                    <div class="counter-one_block-inner wow flipInX" data-wow-delay="0ms"
                                        data-wow-duration="1500ms">
                                        <div class="counter-one_counter"><span class="odometer" data-count="{{Voyager::setting('quality.years_of_experience')}}"></span>+
                                        </div>
                                        <div class="counter-one_counter-text">years of experience</div>
                                    </div>
                                </div>

                                <!-- Counter Column -->
                                <div class="counter-one_block col-lg-3 col-md-6 col-sm-6">
                                    <div class="counter-one_block-inner wow flipInX" data-wow-delay="150ms"
                                        data-wow-duration="1500ms">
                                        <div class="counter-one_counter"><span class="odometer" data-count="{{Voyager::setting('quality.destination_countries')}}"></span>+
                                        </div>
                                        <div class="counter-one_counter-text">destination countries</div>
                                    </div>
                                </div>

                                <!-- Counter Column -->
                                <div class="counter-one_block col-lg-3 col-md-6 col-sm-6">
                                    <div class="counter-one_block-inner wow flipInX" data-wow-delay="300ms"
                                        data-wow-duration="1500ms">
                                        <div class="counter-one_counter"><span class="odometer" data-count="{{Voyager::setting('quality.tour_travel_awards')}}"></span>+
                                        </div>
                                        <div class="counter-one_counter-text">tour & travel awards</div>
                                    </div>
                                </div>

                                <!-- Counter Column -->
                                <div class="counter-one_block col-lg-3 col-md-6 col-sm-6">
                                    <div class="counter-one_block-inner wow flipInX" data-wow-delay="450ms"
                                        data-wow-duration="1500ms">
                                        <div class="counter-one_counter"><span class="odometer"
                                                data-count="{{Voyager::setting('quality.delighted_clients')}}"></span></div>
                                        <div class="counter-one_counter-text">delighted clients</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Counter One -->

        @if ($video_homepage)
            <!-- Video One -->
            <section class="video-one pt-50">
                <div class="outer-container">
                    <div class="video-one_logo"><a href="#"><img src="{{ Voyager::image(setting('site.logo')) }}"
                                alt="" title=""></a></div>
                    <div class="video-one_box wow bounce" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <img src="{{ Voyager::image($video_homepage->image) }}" alt="{{ $video_homepage->title }}" />
                        <a href="{{ $video_homepage->banner_text }}" class="play lightbox-video">
                            <span class="flaticon-play"><i class="ripple"></i></span>
                        </a>
                    </div>
                </div>
            </section>
            <!-- End Video One -->
        @endif
        <!-- Achivements One -->
        <section class="achivements-one">
            <div class="auto-container">
                <!-- Sec Title -->
                <div class="sec-title centered">
                    <h2 class="sec-title_heading">ACHIEVEMENTS</h2>
                    <div class="sec-title-text">We are recognized for exceptional travel services.</div>
                </div>
                <div class="achivement-carousel owl-carousel owl-theme">
                    @foreach ($static_icons as $item)
                        @if ($item->type == 'achievement')
                            <!-- Achivement Block One -->
                            <div class="achivement-block_one">
                                <div class="achivement-block_one-inner">
                                    <div class="achivement-block_one-icon d-flex align-items-center justify-content-center">
                                        <div>
                                            <img src="{{ Voyager::image($item->getThumbnail($item->image,'cropped')) }}" alt="">
                                        </div>
                                    </div>
                                    <h3 class="achivement-block_one-title">{{ $item->title }}</h3>
                                    <div class="achivement-block_one-text">
                                        {{ $item->content }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Achivements One -->

        <!-- Faq One -->
        <section class="faq-one" style="background-image: url({{ asset('assets/images/background/20.jpg') }})">
            <div class="auto-container">
                <!-- Sec Title -->
                <div class="sec-title centered">
                    <h2 class="sec-title_heading">FREQUENTLY ASKED QUESTIONS</h2>
                    <div class="sec-title-text">What our clients usually asked about our services and tours.</div>
                </div>
                <div class="faq-one_inner-container">

                    <!-- Accordion Box -->
                    <ul class="accordion-box">
                        @foreach ($questions as $question)
                        <!-- Block -->
                        <li class="accordion block active-block">
                            <div class="acc-btn active text-lg">
                                <div class="icon-outer"><span class="icon fa-solid fa-angle-down fa-fw"></span></div>
                                {{$question->questions}}
                            </div>
                            <div class="acc-content current">
                                <div class="content">
                                    <p>{{$question->answer}}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </section>
        <!-- End Faq One -->
        @if (count($posts) > 0)
            <!-- News One -->
            <section class="news-two">
                <div class="auto-container">
                    <!-- Sec Title -->
                    <div class="sec-title">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="title-content">
                                <h2 class="sec-title_heading">TRAVEL BLOG</h2>
                                <div class="sec-title-text">Insights, tips, and stories to inspire your travels.</div>
                            </div>
                            <a class="news-one_more" href="{{ route('posts') }}">See More Articles</a>
                        </div>
                    </div>
                    <div class="row clearfix">
                        @if (isset($posts[0]))
                            <!-- Column -->
                            <div class="column col-lg-8 col-md-12 col-sm-12">
                                <!-- News Block Two -->
                                <div class="news-block_two">
                                    <div class="news-block_two-inner">
                                        <div class="news-block_two-image">
                                            <a href="{{ route('posts.show', ['slug' => $posts[0]->slug]) }}"><img
                                                    src="{{ Voyager::image($posts[0]->getThumbnail($posts[0]->image, 'home-main')) }}"
                                                    alt="" /></a>
                                            <div class="news-block_two-overlay">
                                                <div class="news-block_two-title">travel</div>
                                                <h3 class="news-block_two-heading"><a
                                                        href="{{ route('posts.show', ['slug' => $posts[0]->slug]) }}">{{ $posts[0]->title }}</a>
                                                </h3>
                                                <a class="news-block_two-arrow flaticon-next-2"
                                                    href="{{ route('posts.show', ['slug' => $posts[0]->slug]) }}"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                        @endif

                        <div class="column col-lg-4 col-md-12 col-sm-12">
                            @if (isset($posts[1]))
                                <!-- News Block Two -->
                                <div class="news-block_two style-two">
                                    <div class="news-block_two-inner">
                                        <div class="news-block_two-image">
                                            <a href="{{ route('posts.show', ['slug' => $posts[1]->slug]) }}">
                                                <img src="{{ Voyager::image($posts[1]->getThumbnail($posts[1]->image, 'home')) }}"
                                                    alt="{{ $posts[1]->title }}" /></a>
                                            <div class="news-block_two-overlay">
                                                {{--                                            <div class="news-block_two-title">{{$posts[1]->post_tags[0]["title"]}}</div> --}}
                                                <h4 class="news-block_two-heading">
                                                    <a
                                                        href="{{ route('posts.show', ['slug' => $posts[1]->slug]) }}">{{ $posts[1]->title }}</a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (isset($posts[2]))
                                <!-- News Block Two -->
                                <div class="news-block_two style-two">
                                    <div class="news-block_two-inner">
                                        <div class="news-block_two-image">
                                            <a href="{{ route('posts.show', ['slug' => $posts[2]->slug]) }}">
                                                <img src="{{ Voyager::image($posts[2]->getThumbnail($posts[2]->image, 'home')) }}"
                                                    alt="{{ $posts[2]->title }}" />
                                            </a>
                                            <div class="news-block_two-overlay">
                                                {{--                                            <div class="news-block_two-title">{{$posts[2]->post_tags[0]["title"]}}</div> --}}
                                                <h4 class="news-block_two-heading"><a
                                                        href="{{ route('posts.show', ['slug' => $posts[2]->slug]) }}">{{ $posts[2]->title }}</a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            <!-- End News One -->
        @endif
    </div>

@endsection
