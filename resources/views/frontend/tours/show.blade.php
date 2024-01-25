@php
    $tourImages = json_decode($tour->images);
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
    <div class="page-wrapper" x-data='tours'>

        <!-- Page Banner -->
        <section class="page-banner" style="background-image: url({{ Voyager::image($tourBanners[0]->image) }})">
            <div class="auto-container">
                <ul class="page-breadbrumbs">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('tours') }}">Tours</a></li>
                    <li>Tour detail</li>
                </ul>
                <h4 class="color-white">{{ $tour->title }}</h4>
            </div>
        </section>
        <!-- End Page Banner -->

        <!-- Gallery Seven -->
        <section class="gallery-seven">
            <div class="outer-container">
                <div class="gallery-carousel-three owl-carousel owl-theme">
                    @foreach ($tourImages as $image)
                        <!-- Image -->
                        <div class="image">
                            <a class="lightbox-image"
                                href="{{ Voyager::image($tour->getThumbnail($image, 'cropped')) }}"><img
                                    src="{{ Voyager::image($tour->getThumbnail($image, 'cropped')) }}" alt="img" /></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Gallery Seven  -->

        <!-- Tour Detail Two -->
        <section class="tour-detail-two">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row clearfix">
                            <div class="column col-lg-6 col-md-6 col-sm-12">
                                <h3>overview</h3>
                            </div>
                            <div class="column col-lg-3 col-md-6 col-sm-12">

                            </div>
                            <div class="column col-lg-3 col-md-6 col-sm-12">
                                <a class="btn-style-two btn-custom theme-btn" href="#"
                                    x-on:click.prevent="addTourStorage({{ $tour->id }})">
                                    <div class="btn-wrap">
                                        <span class="text-one">Book tour</span>
                                        <span class="text-two">Book tour</span>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <p>{{ $tour->title }}</p>
                        <div class="info_outer">
                            <div class="row clearfix">
                                <!-- Column -->
                                <div class="column col-lg-6 col-md-6 col-sm-12">
                                    <ul class="tour-detail-two_list">
                                        <li><span class="icon fas fa-map-marker-alt fa-fw"></span>{{ $tour->destination }}
                                        </li>
                                        <li><span
                                                class="icon fas fa-dollar-sign fa-fw"></span>{{ $tour->rangePrice ?? '-' }}
                                        </li>
                                    </ul>
                                </div>
                                <!-- Column -->
                                <div class="column col-lg-6 col-md-6 col-sm-12">
                                    <ul class="tour-detail-two_list">
                                        <li><span
                                                class="icon fas fa-map-marker-alt fa-fw"></span>{{ $tour->amountDayTrip ?? '-' }}
                                            Days</li>
                                        <li><span class="icon fas fa-user fa-fw"></span>{{ $tour->rangeCapacity ?? '-' }}
                                            People</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <h4>ITINERARY</h4>
                        {!! $tour->description !!}

                        <!-- Comments Area -->
                        <div class="comments-area">
                            <div class="comments-area_pattern" style="background-image: url(images/icons/pattern-1.png)">
                            </div>
                            <div class="comments-area_pattern-two"
                                style="background-image: url(images/icons/pattern-1.png)"></div>
                            <div class="group-title">
                                <h4>REVIEWS</h4>
                            </div>

                            <div class="comment-box">
                                <div class="fb-comments"
                                    data-href="https://developers.facebook.com/docs/plugins/comments#configurator"
                                    data-width="100%" data-numposts="5"></div>
                            </div>
                        </div>

                    </div>

                    {{-- <div class="col-lg-4 col-md-12 col-sm-12">
					<div class="tour_plans position-sticky">
						<div class="title-box">
							<h4>JOIN THIS TOUR</h4>
							<div class="text">No extra hassle, just fill the form and let us contact you for more informations.</div>
						</div>

						<!-- Booking Form -->
						<div class="booking-form">
							<form method="post" action="https://wpthemebooster.com/demo/themeforest/html/vacasky/contact.html">
								<!-- Form Group -->
								<div class="form-group">
									<label>first name*</label>
									<select name="currency" class="custom-select-box">
										<option>Mrs</option>
										<option>Mr</option>
									</select>
								</div>
								<!-- Form Group -->
								<div class="form-group">
									<label>Starting Date*</label>
									<input class="datepicker" type="text" name="text" placeholder="March 23, 2023" required="">
								</div>
								<!-- Form Group -->
								<div class="form-group">
									<label>Guests*</label>
									<select name="currency" class="custom-select-box">
										<option>02 Adults, 01 Kids</option>
										<option>03 Adults, 03 Kids</option>
										<option>04 Adults, 05 Kids</option>
										<option>05 Adults, 07 Kids</option>
										<option>06 Adults, 09 Kids</option>
										<option>07 Adults, 10 Kids</option>
									</select>
								</div>
								<!-- Form Group -->
								<div class="form-group">
									<label>Extra Facilities</label>
									<select name="currency" class="custom-select-box">
										<option>Airport Pickup ($ 1,000)</option>
										<option>Airport Pickup ($ 2,000)</option>
										<option>Airport Pickup ($ 3,000)</option>
										<option>Airport Pickup ($ 4,000)</option>
										<option>Airport Pickup ($ 5,000)</option>
										<option>Airport Pickup ($ 6,000)</option>
									</select>
								</div>
								<div class="form-group">
									<div class="d-flex justify-content-between align-items-center">
										<div class="total-payment">
											Total Payment
											<span>$ 2,200</span>
										</div>
										<button class="btn-style-two theme-btn">
											<span class="btn-wrap">
												<span class="text-one">Book This Tour</span>
												<span class="text-two">Book This Tour</span>
											</span>
										</button>
									</div>
								</div>
							</form>
						</div>

					</div>
				</div> --}}
                </div>
            </div>
        </section>
        <!-- End Tour Detail Two -->
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
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" style="fill: currentColor">
                        <path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path>
                      </svg>
                    </template>
                    <template x-if="item.type == 'error'">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" style="fill: currentColor"><path d="M11.953 2C6.465 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.493 2 11.953 2zM12 20c-4.411 0-8-3.589-8-8s3.567-8 7.953-8C16.391 4 20 7.589 20 12s-3.589 8-8 8z"></path><path d="M11 7h2v7h-2zm0 8h2v2h-2z"></path></svg>
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
            Alpine.data('tours', () => ({
                tour: [],
				list:[],
                index:0,
                addTourStorage(id) {
                    if (this.tour.includes(id)) {
                        console.log("Tour with id already exists:", id);
                        this.addAlert({
                            type: 'error',
                            title: 'Không thành công',
                            body: 'Tour đã được booking, vui lòng kiểm tra Booking của bạn'
                        })
                        return;
                    }
                    const storedTour = localStorage.getItem("tour");
                    if (storedTour) {
                        const storedTourArray = JSON.parse(storedTour);
                        if (storedTourArray.includes(id)) {
                            console.log("Tour with id already exists in localStorage:", id);
                            this.addAlert({
                                type: 'error',
                                title: 'Không thành công',
                                body: 'Tour đã được booking, vui lòng kiểm tra Booking của bạn'
                            })
                            return;
                        } else {
                            storedTourArray.push(id)
                            localStorage.setItem("tour", JSON.stringify(storedTourArray));
                            this.addAlert({
                                type: 'success',
                                title: 'Thành công',
                                body: 'Cảm ơn bạn đã booking tour này, vui lòng truy cập booking để xem chi tiết!'
                            })
                        }
                    } else {
                        this.tour.push(id);
                        localStorage.setItem("tour", JSON.stringify(this.tour));
                        this.addAlert({
                            type: 'success',
                            title: 'Thành công',
                            body: 'Cảm ơn bạn đã booking tour này, vui lòng truy cập booking để xem chi tiết!'
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
