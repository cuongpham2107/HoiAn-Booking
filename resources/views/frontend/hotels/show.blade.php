@php
    $hotelImages = json_decode($hotel->images);
@endphp

@extends('frontend.layouts.default')
@section('content')
    <style>
        .btn-custom::before {
            -webkit-transition-duration: 800ms;
            transition-duration: 800ms;
            position: absolute;
            left: -50px;
            top: 100%;
            content: "";
            right: -50px;
            bottom: -50px;
            border-radius: 50%;
            background-color: rgb(233, 146, 17);
            transition: all 600ms ease;
            -moz-transition: all 600ms ease;
            -webkit-transition: all 600ms ease;
            -ms-transition: all 600ms ease;
            -o-transition: all 600ms ease;
        }

        .theme-btn {
            padding: 10px 22px;
            font-size: 12px;
            background-color: color(srgb 0.2859 0.5914 0.8278);
            font-weight: 600;
        }
    </style>
    <div class="page-wrapper" x-data="hotel">
        <!-- Page Banner -->
        <section class="page-banner" style="background-image: url({{ Voyager::image($hotelBanners[0]->image) }})">
            <div class="auto-container">
                <ul class="page-breadbrumbs">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Hotel & Resort</li>
                    <li>Detail</li>
                </ul>
                <h1 class="page-banner_title line-clamp-3">{{ $hotel->name }}</h1>
                <div class="banner-rating">
                    <i class="fas fa-map-marker-alt fa-fw"></i>
                    {{ $hotel->address }} &ensp; | &ensp;
                    @for ($i = 0; $i < $hotel->rating; $i++)
                        <span class="fa fa-star"></span>
                    @endfor
                </div>
            </div>
        </section>
        <!-- End Page Banner -->

        <!-- Hotel Detail Detail -->
        <section class="hotel-detail_gallery">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <div class="image">
                            <a class=""
                               href="{{ Voyager::image($hotel->getThumbnail($hotel->thumbnails, 'main-image')) }}"><img
                                        src="{{ Voyager::image($hotel->getThumbnail($hotel->thumbnails, 'main-image')) }}"
                                        alt=""/></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        @if (isset($hotelImages[0]))
                            <div class="image">
                                <a class="lightbox-image"
                                   href="{{ Voyager::image($hotel->getThumbnail($hotelImages[0], 'small')) }}"><img
                                            src="{{ Voyager::image($hotel->getThumbnail($hotelImages[0], 'small')) }}"
                                            alt=""/></a>
                            </div>
                        @endif
                        @if (isset($hotelImages[1]))
                            <div class="image">
                                <a class="lightbox-image"
                                   href="{{ Voyager::image($hotel->getThumbnail($hotelImages[1], 'small')) }}"><img
                                            src="{{ Voyager::image($hotel->getThumbnail($hotelImages[1], 'small')) }}"
                                            alt=""/></a>
                            </div>
                        @endif
                        <div class="image">
                            @if (isset($hotelImages[2]))
                                <img src="{{ Voyager::image($hotel->getThumbnail($hotelImages[2], 'small')) }}"
                                     alt=""/>
                            @endif
                            <div class="overlay-box">
                                @if (isset($hotelImages[2]))
                                    <div class="overlay-inner">
                                        <a class="lightbox-image"
                                           href="{{ Voyager::image($hotel->getThumbnail($hotelImages[2], 'small')) }}">See
                                            All Photos</a>
                                    </div>
                                @endif
                                <div class="overlay-inner">
                                    @if (count($hotelImages) > 2)
                                        @foreach ($hotelImages as $key => $hotelImage)
                                            @if ($key < 2)
                                                @continue
                                            @endif
                                            <a class="lightbox-image"
                                               href="{{ Voyager::image($hotel->getThumbnail($hotelImage, 'small')) }}"><img
                                                        src="{{ Voyager::image($hotel->getThumbnail($hotelImage, 'small')) }}"
                                                        alt=""/></a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Hotel Detail -->

        <!-- Hotel Detail -->
        <section class="hotel-detail" id="123">
            <div class="auto-container">
                <div class="row clearfix">
                    <!-- Left Column -->
                    <div class="left-column col-lg-12 col-md-12 col-sm-12">
                        <div class="row clearfix">
                            <div class="column col-lg-6 col-md-6 col-sm-12">
                                <h3>overview</h3>
                            </div>
                            

                        </div>
                        <p>{!! $hotel->description !!}</p>

                        <!-- Hotel Rooms -->
                        <div class="hotel-rooms">
                            <h3>ROOM TYPES</h3>
                        </div>
                        <!-- End Hotel Rooms -->
{{--                        {{ dd($hotel) }}--}}
                        @if(isset($hotel->rooms) && count($hotel->rooms)>0)
                            @foreach($hotel->rooms as $room)
                            <!-- Room Block One -->
                            <div class="room-block_one">
                                <div class="room-block_one-inner" style="min-height: 360px;">
                                    <div class="comfort-section">
                                        @php
                                            $images= json_decode($room->image);
                                        @endphp
                                        <ul class="image-carousel owl-carousel owl-theme">
                                            @foreach($images as $img)
                                            <li>
                                                <a href="{{ Voyager::image($img) }}" class="">
                                                    <img src="{{ Voyager::image($img) }}" alt=""></a>
                                            </li>
                                            @endforeach
                                        </ul>

                                        <ul class="thumbs-carousel owl-carousel owl-theme">
                                            @foreach($images as $img)
                                                <li><img src="{{ Voyager::image($img) }}" alt=""></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="room-block_one-content">
                                        <div class="room-block_one-title"><a href="hotel-booking.html">{{ $room->name }}</a>
                                        </div>
                                        <ul class="room-block_one-options">
                                            <li><span class="icon">
                                                    <img src="{{asset('assets/images/icons/hotel-icon-11.png')}}" alt=""/>
                                                </span> {{ $room->bed_size ?? '36' }} sqm
                                            </li>
                                            <li><span class="icon"><img src="{{asset('assets/images/icons/hotel-icon-12.png')}}" alt=""/></span>
                                                {{ $room->room_size ?? '180x220' }} cm
                                            </li>
                                            <li><span class="icon"><img src="{{asset('assets/images/icons/hotel-icon-13.png')}}" alt=""/></span>
                                                {{ $room->capacity ?? 2 }} guests
                                            </li>
                                        </ul>
                                        <div>
                                            {!! $room->description !!}
                                        </div>
                                        <div class="price-box">
                                            <div class="price">
                                                {{ $room->price }} / night
                                            </div>
                                            <!-- Button Box -->
                                            <div class="button-box">
                                                <a class="btn-style-two theme-btn" href="#" x-on:click.prevent="addHotelStorage({{ $room->id }})">
                                                    <div class="btn-wrap">
                                                        <span class="text-one">Book Now</span>
                                                        <span class="text-two">Book Now</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                        @php
                            $facilities = json_decode($hotel->facilities);
                            // dd();
                        @endphp
                        @if($facilities)
                            <h3>FACILITIES</h3>
                            <div class="clearfix">

                                @if ($facilities)
                                    @foreach ($facilities as $key => $title)
                                        @if ($key == 'restaurant')
                                            <!-- Hotel Feature List -->
                                            <div class="hotel-feature_list">
                                                <span class="icon"><img
                                                            src="{{ asset('assets/images/icons/hotel-icon-1.png') }}"
                                                            alt=""/></span>
                                                Quality <br> Restaurant
                                            </div>
                                        @endif
                                        @if ($key == 'internet')
                                            <!-- Hotel Feature List -->
                                            <div class="hotel-feature_list">
                                                <span class="icon"><img
                                                            src="{{ asset('assets/images/icons/hotel-icon-2.png') }}"
                                                            alt=""/></span>
                                                High-Speed <br> Internet
                                            </div>
                                        @endif
                                        @if ($key == 'spa')
                                            <!-- Hotel Feature List -->
                                            <div class="hotel-feature_list">
                                                <span class="icon"><img
                                                            src="{{ asset('assets/images/icons/hotel-icon-3.png') }}"
                                                            alt=""/></span>
                                                Spa & <br> Wellness
                                            </div>
                                        @endif
                                        @if ($key == 'pool')
                                            <!-- Hotel Feature List -->
                                            <div class="hotel-feature_list">
                                                <span class="icon"><img
                                                            src="{{ asset('assets/images/icons/hotel-icon-4.png') }}"
                                                            alt=""/></span>
                                                Swimming <br> Pool & Sauna
                                            </div>
                                        @endif
                                        @if ($key == '247')
                                            <!-- Hotel Feature List -->
                                            <div class="hotel-feature_list">
                                                <span class="icon"><img
                                                            src="{{ asset('assets/images/icons/hotel-icon-5.png') }}"
                                                            alt=""/></span>
                                                24/7 <br> Front-Desk
                                            </div>
                                        @endif
                                        @if ($key == 'parking')
                                            <!-- Hotel Feature List -->
                                            <div class="hotel-feature_list">
                                                <span class="icon"><img
                                                            src="{{ asset('assets/images/icons/hotel-icon-6.png') }}"
                                                            alt=""/></span>
                                                Valet <br> Parking
                                            </div>
                                        @endif
                                        @if ($key == 'laundry')
                                            <!-- Hotel Feature List -->
                                            <div class="hotel-feature_list">
                                                <span class="icon"><img
                                                            src="{{ asset('assets/images/icons/hotel-icon-7.png') }}"
                                                            alt=""/></span>
                                                Laundry & <br> Dry Cleaning
                                            </div>
                                        @endif
                                        @if ($key == 'room_service')
                                            <!-- Hotel Feature List -->
                                            <div class="hotel-feature_list">
                                                <span class="icon"><img
                                                            src="{{ asset('assets/images/icons/hotel-icon-8.png') }}"
                                                            alt=""/></span>
                                                Room <br> Service
                                            </div>
                                        @endif
                                        @if ($key == 'meeting_room')
                                            <!-- Hotel Feature List -->
                                            <div class="hotel-feature_list">
                                                <span class="icon"><img
                                                            src="{{ asset('assets/images/icons/hotel-icon-9.png') }}"
                                                            alt=""/></span>
                                                Business Center <br> & Meeting Room
                                            </div>
                                        @endif
                                        @if ($key == 'luggage_storage')
                                            <!-- Hotel Feature List -->
                                            <div class="hotel-feature_list">
                                                <span class="icon"><img
                                                            src="{{ asset('assets/images/icons/hotel-icon-10.png') }}"
                                                            alt=""/></span>
                                                Luggage <br> Storage
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        @endif
                        @if ($hotel->google_map != null && $hotel->google_map != '')
                            <h3>LOCATION</h3>
                            <!-- Map Three -->
                            <div class="map-three">
                                {!! $hotel->google_map !!}
                            </div>
                            <!-- End Map Three -->
                        @endif
                        {{--                        --}}
                        

                        <!-- Hotel Policies -->
                        @if ($hotel->policies != null && $hotel->policies != '')
                            <!-- Hotel Detail Policies -->
                            <div class="hotel-detail_policies">
                                <h4>HOTEL POLICIES</h4>
                                {!! $hotel->policies !!}
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </section>
        <!-- End Hotel Detail -->

        <!-- Hotel Detail Nearby -->
        <div class="hotel-detail_nearby">
            <div class="auto-container">
                <div class="row clearfix">
                    <!-- Title Column -->
                    <div class="title-column col-lg-3 col-md-12 col-sm-12">
                        <h4>HOTELS RECOMMEND</h4>
                    </div>
                    <!-- Carousel Column -->
                    <div class="carousel-column col-lg-9 col-md-12 col-sm-12">
                        <div class="three-item-carousel owl-carousel owl-theme">
                            {{-- @dd($hotel_recommend) --}}
                            @foreach ($hotel_recommend as $item)
                                <!-- Hotel Block One -->
                                <div class="hotel-block_one">
                                    <div class="hotel-block_one-inner">
                                        <div class="hotel-block_one-image">
                                            <div class="rating">
                                                @for ($i = 0; $i < $item->rating; $i++)
                                                    <span class="fa fa-star"></span>
                                                @endfor
                                            </div>
                                            <a href="{{route('hotels.show',['slug' => $item->slug])}}">
                                                <img style="height: 217px; object-fit: cover"
                                                     src="{{Voyager::image($item->thumbnails)}}"
                                                     alt=""/></a>
                                        </div>
                                        <div class="hotel-block_one-content">
                                            <h5 class="hotel-block_one-heading">
                                                <a href="{{route('hotels.show',['slug' => $item->slug])}}">{{$item->name}}</a>
                                            </h5>
                                            <div class="hotel-block_one-location">{{$item->address}}</div>
                                            <div class="hotel-block_one-price">{{number_format($item->price)}}đ /
                                                night
                                            </div>
                                            <a class="hotel-block_one-arrow flaticon-next-2"
                                               href="{{route('hotels.show',['slug' => $item->slug])}}"></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Hotel Detail Nearby -->

        <div class="alert_custom">
            <div class="list">
                <template x-for="item in list" :key="item.id">
                    <div class="item" x-show="item.show"
                         x-transition:enter="transition_all"
                         x-transition:enter-start="enter_start"
                         x-transition:enter-end="enter_end"
                         x-transition:leave="transition_all"
                         x-transition:leave-start="leave_start"
                         x-transition:leave-end="leave_end"
                         :class="item.type">
                  <span class="icon">
                    <template x-if="item.type == 'success'">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                           style="fill: currentColor">
                        <path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path>
                      </svg>
                    </template>
                    <template x-if="item.type == 'error'">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                           style="fill: currentColor"><path
                                  d="M11.953 2C6.465 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.493 2 11.953 2zM12 20c-4.411 0-8-3.589-8-8s3.567-8 7.953-8C16.391 4 20 7.589 20 12s-3.589 8-8 8z"></path><path
                                  d="M11 7h2v7h-2zm0 8h2v2h-2z"></path></svg>
                    </template>
                  </span>
                        <div class="title">
                            <h6 class="truncate" x-text="item.title"></h6>
                            <p x-text="item.body"></p>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
    <!-- End PageWrapper -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('hotel', () => ({
                hotel: [],
                list: [],
                index: 0,
                addHotelStorage(id) {
                    if (this.hotel.includes(id)) {
                        console.log("Hotel with id already exists:", id);
                        this.addAlert({
                            type: 'error',
                            title: 'Không thành công',
                            body: 'Hotel đã được booking, vui lòng kiểm tra Booking của bạn'
                        })
                        return;
                    }
                    const storedHotel = localStorage.getItem("hotel");
                    if (storedHotel) {
                        const storedHotelArray = JSON.parse(storedHotel);
                        if (storedHotelArray.includes(id)) {
                            console.log("Hotel with id already exists in localStorage:", id);
                            this.addAlert({
                                type: 'error',
                                title: 'Không thành công',
                                body: 'Hotel đã được booking, vui lòng kiểm tra Booking của bạn'
                            })
                            return;
                        } else {
                            storedHotelArray.push(id)
                            localStorage.setItem("hotel", JSON.stringify(storedHotelArray));
                            this.addAlert({
                                type: 'success',
                                title: 'Thành công',
                                body: 'Cảm ơn bạn đã booking hotel này, vui lòng truy cập booking để xem chi tiết!'
                            })
                        }
                    } else {
                        this.hotel.push(id);
                        localStorage.setItem("hotel", JSON.stringify(this.hotel));
                        this.addAlert({
                            type: 'success',
                            title: 'Thành công',
                            body: 'Cảm ơn bạn đã booking hotel này, vui lòng truy cập booking để xem chi tiết!'
                        })
                    }

                },

                addAlert(alert) {
                    this.list = [...JSON.parse(JSON.stringify(this.list)), {
                        id: ++this.index,
                        type: alert.type,
                        title: alert.title,
                        body: alert.body,
                        show: false
                    }]

                    this.$nextTick(() => {
                        this.list[this.index - 1].show = true
                    })

                    setTimeout(() => {
                        this.list[this.index - 1].show = false
                    }, 3000);
                }
            }))
        })
    </script>
@endsection
