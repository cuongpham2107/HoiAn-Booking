@extends('frontend.layouts.default')
@section('content')


    <div class="page-wrapper">

        <!-- Page Banner -->
        <section class="page-banner style-two" style="background-image: url({{ Voyager::image($hotelBanners[0]->image) }})">
            <div class="auto-container">
                <ul class="page-breadbrumbs">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Hotel & Resort</li>
                </ul>
                <h1 class="page-banner_title">Hotel & Resort</h1>
            </div>
        </section>
        <!-- End Page Banner -->

        <!-- Popular Hotels -->
        <section class="popular-hotels gallery-five">
            <div class="auto-container">
                <div
                    class="page-header d-flex align-items-center justify-content-between flex-wrap flex-md-nowrap gap-2 gap-md-5">
                    <!-- Gallery Five Title Box -->
                    <div class="gallery-five_title-box">
                        <h4>Popular Hotels</h4>
                        <div class="text">Discover our top-rated hotels in the world's most desirable destinations.</div>
                    </div>

                    <!-- Gallery Search Box -->
                    <div class="gallery-search_box">
                        <!-- Search Box -->
                        <div class="search-box mb-0">
                            <form method="GET"
                                action="{{route('search.hotels')}}">
                                <div class="form-group">
                                    <input type="search" name="keyword" value="{{ request('keyword') ?? '' }}" placeholder="Search..."
                                        >
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>


                <div class="row clearfix">
                    <!-- Column -->
                    <div class="column col-lg-7 col-md-12 col-sm-12">
                        <div class="popular-hotels_outer">
                            <div class="row clearfix">
                                @foreach ($hotels as $hotel)
                                    <!-- Hotel Block One -->
                                    <div class="hotel-block_one col-lg-6 col-md-6 col-sm-12">
                                        <div class="hotel-block_one-inner">
                                            <div class="hotel-block_one-image">
                                                <div class="rating">
                                                    @for ($i = 0; $i < $hotel->rating; $i++)
                                                        <span class="fa fa-star"></span>
                                                    @endfor
                                                   
                                                </div>
                                                <a href="{{route('hotels.show',['slug' => $hotel->slug])}}">
                                                    <img src="{{ Voyager::image($hotel->getThumbnail($hotel->thumbnails, 'thumbnail')) }}" alt="" />
                                                </a>
                                            </div>
                                            <div class="hotel-block_one-content">
                                                <h5 class="hotel-block_one-heading"><a
                                                        href="{{route('hotels.show',['slug' => $hotel->slug])}}">{{ $hotel->name }}</a></h5>
{{--                                                <div class="hotel-block_one-location">Paris, France</div>--}}
                                                <a class="hotel-block_one-arrow flaticon-next-2"
                                                    href="{{route('hotels.show',['slug' => $hotel->slug])}}"></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @if($hotels->isEmpty())
                                    <p class="text-xl">No match results</p>
                                @endif
                            </div>
                        </div>
                        <!-- Pagination Outer -->
                        <div class="pagination-outer text-center">
                            {{ $hotels->links('pagination.paginate') }}
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="column col-lg-5 col-md-12 col-sm-12">
                        <!-- Map Two -->
                        <div class="map-two">
						{!! setting('site.google_map_Viet_Nam') !!}
                        </div>
                        <!-- End Map Two -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Popular Hotels -->

        <!-- Promo One -->
        <section class="promo-one">
            <div class="auto-container">
                <!-- Sec Title -->
                <div class="sec-title centered">
                    <h2 class="sec-title_heading">HOTELS PROMINENT</h2>
                    <div class="sec-title-text">Our best hotel deals and packages for your convenience.</div>
                </div>
                <div class="promo-carousel owl-carousel owl-theme">
                    @foreach ($hotelProminents as $hotel)
                        <!-- Promo Block One -->
                        <div class="promo-block_one">
                            <div class="promo-block_one-inner">
                                <div class="promo-block_one-image">
                                    <img src="{{ Voyager::image($hotel->getThumbnail($hotel->thumbnails, 'thumbnail')) }}"
                                        alt="{{ $hotel->name }}" />
                                    <div class="rating">
                                        @for ($i = 0; $i < $hotel->rating; $i++)
                                            <span class="fa fa-star"></span>
                                        @endfor
                                       
                                    </div>
                                    <div class="promo-block_one-content">
                                        <h1 class="promo-block_one-title line-clamp-2"><a
                                                href="{{route('hotels.show',['slug' => $hotel->slug])}}">{{ $hotel->name }}</a></h1>
                                        <div class="promo-block_one-text line-clamp-2">{!! $hotel->description !!}</div>
                                        <div class="promo-block_one-button">
                                            <a href="{{route('hotels.show',['slug' => $hotel->slug])}}" class="theme-btn book-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- End Promo One -->

        <!-- Destination One -->
        <section class="destination-two">
            <div class="auto-container">
                <div class="masonry-items-container_three row clearfix">

                    <!-- Sec Title -->
                    <div class="sec-title mb-5">
                        <h2 class="sec-title_heading">RECOMMENDED DESTINATIONS</h2>
                        <div class="sec-title-text">Explore our recommended destinations for your next dream vacation.
                        </div>
                    </div>
                    @foreach ($tourRecommend as $tour)
                        <!-- Destination Block One -->
                        <div class="destination-block_two masonry-item col-lg-4 col-md-6 col-sm-12">
                            <div class="destination-block_two-inner">
                                <div class="destination-block_two-image">
                                    <img src="{{ Voyager::image($tour->getThumbnail($tour->thumbnails, 'thumbnail')) }}"
                                        alt="" />
                                    <div class="destination-block_two-point r-5">
                                        <span class="icon line-clamp-1">{{ $tour->name }} <i>(90)</i></span>
                                    </div>
                                    <div class="destination-block_two-overlay">
                                        <div class="destination-block_two-content">
                                            <h4 class="destination-block_two-heading line-clamp-2">
                                                <a href="{{route('tours.show',['slug' => $tour->slug])}}">{{ $tour->name }}</a></h4>
{{--                                            <div class="destination-block_two-location">120 Available Hotels</div>--}}
                                            <div class="destination-block_two-text line-clamp-3">{{ $tour->title }}</div>
                                            <a class="destination-block_two-button" href="{{route('tours.show',['slug' => $tour->slug])}}">Show more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- End Destination One -->

        <!-- Clients Three -->
        {{--<section class="clients-three">
            <div class="auto-container">
                <!-- Sec Title -->
                <div class="sec-title centered">
                    <h2 class="sec-title_heading">HOTEL PARTNERS</h2>
                </div>
                <!-- Sponsors Carousel -->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <li class="slide-item">
                        <figure class="clients-two_image-box"><a href="#"><img
                                    src="{{ asset('assets/images/clients/11.png') }}" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="clients-two_image-box"><a href="#"><img
                                    src="{{ asset('assets/images/clients/12.png') }}" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="clients-two_image-box"><a href="#"><img
                                    src="{{ asset('assets/images/clients/13.png') }}" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="clients-two_image-box"><a href="#"><img
                                    src="{{ asset('assets/images/clients/14.png') }}" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="clients-two_image-box"><a href="#"><img
                                    src="{{ asset('assets/images/clients/15.png') }}" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="clients-two_image-box"><a href="#"><img
                                    src="{{ asset('assets/images/clients/11.png') }}" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="clients-two_image-box"><a href="#"><img
                                    src="{{ asset('assets/images/clients/12.png') }}" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="clients-two_image-box"><a href="#"><img
                                    src="{{ asset('assets/images/clients/13.png') }}" alt=""></a></figure>
                    </li>
                </ul>
            </div>
        </section>--}}
        <!-- End Clients Three -->
    </div>
    <!-- End PageWrapper -->
@endsection
