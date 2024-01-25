@extends('frontend.layouts.default')
@section('content')
    <main>
        <!-- banner-area-start -->
        <div class="section-banner mt-70">
            <div class="banner-active">
                @foreach ($homeBanners as $key => $banner)
                    <div class="banner-item">
                        <img loading="lazy"width="100%" src="{{ Voyager::image($banner->image) }}" alt="{{ $banner->title }}">
                    </div>
                @endforeach
            </div>
        </div>

        <!-- seo-area-start -->
        <section class="seo-area pt-30 pb-60">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="tpsection-wrapper text-center mb-40">
                            <h2 class="tpsection-title-two">
                                <span class="b-line">DỊCH VỤ</span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-lg-4 col-sm-6">
                            <div class="tpseo p-relative mb-40">
                                <div class="tpseo-bg"></div>
                                <div class="tpseo-content">
                                    <div class="head">
                                        <div class="icon">
                                            <img loading="lazy"src="{{ Voyager::image($service->icon) }}"
                                                alt="icon service">
                                        </div>
                                        <h4 class="tpseo-title mb-15">{{ $service->title }}</h4>
                                    </div>
                                    <div class="tpseo-info">
                                        <p>{{ $service->desc }}</p>
                                        <div class="tpseo-details">
                                            <a href="{{ route('services.show', $service->slug) }}">Tìm hiểu thêm <i
                                                    class="fa-light fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- seo-area-end -->

        <!-- faq-area-start -->
        <section class="faq-area pb-15">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-sm-12">
                        <div class="tp-faq-wrapper">
                            <div class="tpsection-wrapper mb-25">
                                <h2 class="tpsection-title-two">
                                    <span style="color: #565764;">VÌ SAO</span><br>
                                    <span style="color: #565764;">KHÁCH HÀNG</span><br>
                                    <span style="color: #565764;">LUÔN CHỌN</span><br>
                                    <span class="text-bol">HẰNG NGA</span><br>
                                    <span class="text-bol">MEDIA?</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-12">
                        <div class="faq-area-content">
                            @foreach ($questions as $key => $question)
                                <div class="row">
                                    <div class="number @if ($key < count($questions) - 1) line @endif col-md-1">
                                        <h3>{{ $key + 1 }}</h3>
                                    </div>
                                    <div class="content col-md-11">
                                        <h3>{{ $question->questions }}</h3>
                                        <p>{{ $question->answer }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq-area-end -->

        <!-- award-area-start -->
        <section class="award-area tp-large-box pt-50 pb-50 p-relative fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="tpsection-wrapper text-center pb-60">
                            <h2 class="tpsection-title-two">KHÁCH HÀNG TIÊU BIỂU</h2>
                            <span>Chúng tôi trân trọng cảm ơn sự tin tưởng với các đối tác đã, đang và sẽ hợp tác.</span>
                        </div>
                    </div>
                </div>
                <div class="award-brand">
                    <div class="row justify-content-center">
                        <div class="col-xxl-12 col-xl-12 col-lg-12">
                            <div class="tpbrand tpbrand-active">
                                @foreach ($customers as $customer)
                                    <div class="tpbrand-item">
                                        <a href="{{ $customer->link ?? "#" }}">
                                            <img loading="lazy"src="{{ Voyager::image($customer->thumbnail('cropped', 'image')) }}"
                                            alt="{{ $customer->title }}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="tpbrand-active-arrow">
                                <div class="tpbrand-active-arrow-nav p-relative">
                                    <button class="prv-tpbrand-case prv-testi-case">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14"
                                                 fill="none" viewBox="0 0 8 14">
                                                <path fill-rule="evenodd"
                                                      d="M7.707.293a1 1 0 0 1 0 1.414L2.414 7l5.293 5.293a1 1 0 0 1-1.414 1.414l-6-6a1 1 0 0 1 0-1.414l6-6a1 1 0 0 1 1.414 0z"
                                                      fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <button class="next-tpbrand-case next-testi-case">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14"
                                                 fill="none" viewBox="0 0 8 14">
                                                <path fill-rule="evenodd"
                                                      d="M.293 13.707a1 1 0 0 1 0-1.414L5.586 7 .293 1.707A1 1 0 1 1 1.707.293l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414 0z"
                                                      fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- award-area-end -->

        <!-- testimonial-area-start -->
        {{-- <section class="testimonial-area">
            <div class="container">
                <div class="tptestimonial-two-bg">
                    <div class="row justify-content-center">
                        <div class="col-xxl-8 col-lg-10 col-md-9">
                            <div class="tptestimonial-area-two p-relative">
                                <div class="tptestimonial-active-two">
                                    @foreach ($evaluates as $evaluate)
                                        <div class="tptestimonial-two-item">
                                            <div class="tptestimonial-two">
                                                <div class="tptestimonial-two-avatar">
                                                    <img loading="lazy"src="{{ Voyager::image($evaluate->image) }}"
                                                        alt="{{ $evaluate->title }}">
                                                </div>
                                                <div class="tptestimonial-two-content">
                                                    <i>
                                                        <svg width="32" height="20" viewBox="0 0 32 20"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10.3376 2.213C9.04053 2.94247 8.04356 3.73741 7.34664 4.59782C6.63037 5.45823 6.13672 6.47762 5.8657 7.656C6.13672 7.58119 6.4271 7.51572 6.73684 7.45961C7.04658 7.40349 7.42408 7.37544 7.86933 7.37544C8.87598 7.37544 9.79552 7.51572 10.628 7.79629C11.441 8.07686 12.1476 8.479 12.7477 9.00273C13.3285 9.54516 13.7834 10.2092 14.1125 10.9948C14.4223 11.7803 14.5771 12.6782 14.5771 13.6882C14.5771 14.5673 14.4223 15.3903 14.1125 16.1572C13.7834 16.9241 13.3188 17.5881 12.7187 18.1492C12.0992 18.7291 11.3442 19.178 10.4537 19.496C9.54386 19.8326 8.51785 20.001 7.37568 20.001C6.38839 20.001 5.44949 19.8139 4.55898 19.4398C3.64912 19.0845 2.8651 18.5701 2.2069 17.8967C1.52934 17.2234 0.996977 16.4097 0.6098 15.4558C0.203268 14.5206 0 13.4731 0 12.3134C0 10.7984 0.212948 9.42358 0.63884 8.18908C1.06473 6.97329 1.65517 5.86973 2.41016 4.87839C3.1458 3.90575 4.02662 3.0547 5.05263 2.32522C6.07865 1.59575 7.19177 0.969145 8.39202 0.445419L10.3376 2.213ZM27.7604 2.213C26.4634 2.94247 25.4664 3.73741 24.7695 4.59782C24.0532 5.45823 23.5596 6.47762 23.2886 7.656C23.5596 7.58119 23.85 7.51572 24.1597 7.45961C24.4694 7.40349 24.8469 7.37544 25.2922 7.37544C26.2989 7.37544 27.2184 7.51572 28.0508 7.79629C28.8639 8.07686 29.5705 8.479 30.1706 9.00273C30.7514 9.54516 31.2063 10.2092 31.5354 10.9948C31.8451 11.7803 32 12.6782 32 13.6882C32 14.5673 31.8451 15.3903 31.5354 16.1572C31.2063 16.9241 30.7417 17.5881 30.1416 18.1492C29.5221 18.7291 28.7671 19.178 27.8766 19.496C26.9667 19.8326 25.9407 20.001 24.7985 20.001C23.8113 20.001 22.8724 19.8139 21.9819 19.4398C21.072 19.0845 20.288 18.5701 19.6298 17.8967C18.9522 17.2234 18.4198 16.4097 18.0327 15.4558C17.6261 14.5206 17.4229 13.4731 17.4229 12.3134C17.4229 10.7984 17.6358 9.42358 18.0617 8.18908C18.4876 6.97329 19.078 5.86973 19.833 4.87839C20.5687 3.90575 21.4495 3.0547 22.4755 2.32522C23.5015 1.59575 24.6146 0.969145 25.8149 0.445419L27.7604 2.213Z"
                                                                fill="#C0BBB5" />
                                                        </svg>
                                                    </i>
                                                    <p>{{ $evaluate->content2 }}</p>
                                                    <div class="tptestimonial-two-avatar-info">
                                                        <h5 class="title">{{ $evaluate->title }}</h5>
                                                        <span>{{ $evaluate->content1 }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="tptestimonial-two-nav"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- testimonial-area-end -->

        <!-- testimonial-area-start -->
        <section class="testimonial-area pt-120 scene fix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="testimonial-4-thumb p-relative pb-60">
                            <div class="testimonial-4-main-thumb p-relative">
                                <img src="assets/img/shape/testimonial-4-shape-1.png" alt="{{ setting('site.ttile') }}">
                                <div class="testimonial-4-main-anim">
                                    <div class="tp-tooltip-circle">
                                        <div class="tp-tooltip-effect-1"></div>
                                        <div class="tp-tooltip-effect-2"></div>
                                        <div class="tp-tooltip-effect-3"></div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($evaluates as $key => $evaluate)
                                @if($key>5) @break @endif
                                <div class="testimonial-4-shape-{{ $key+1 }}">
                                    <img class="layer" data-depth="0.{{rand(1,3)}}" loading="lazy"src="{{ Voyager::image($evaluate->image) }}" alt="{{ $evaluate->title }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tp-testimonial-4 pb-60">
                            <div class="testimonial-4-wrap mb-40 pl-70">
                                <div class="section-wrapper mb-50">
                                    <span>Testimonials</span>
                                    <h5 class="section-title-4 section-title-4-2">Khách Hàng Nói Gì</h5>
                                </div>
                                <div class="testimonial-4-wrapper tptestimonial-4-active">
                                    @foreach ($evaluates as $key => $evaluate)
                                    <div class="tptestimonial-4-item">
                                        <div class="tptestimonial-4-rating d-flex align-items-center mb-25">
                                            <div class="review-star">
                                                <i class="fa-sharp fa-solid fa-star-sharp"></i>
                                                <i class="fa-sharp fa-solid fa-star-sharp"></i>
                                                <i class="fa-sharp fa-solid fa-star-sharp"></i>
                                                <i class="fa-sharp fa-solid fa-star-sharp"></i>
                                                <i class="fa-sharp fa-solid fa-star-sharp"></i>
                                            </div>
                                        </div>
                                        <div class="tptestimonial-4-content d-flex">
                                            <div class="tptestimonial-4-icon mr-20">
                                                <img src="assets/img/shape/quation-4.png" alt="{{ $evaluate->title }}">
                                            </div>
                                            <div class="tptestimonial-4-text">
                                                <p>{{ $evaluate->content2 }}</p>
                                                <div class="tptestimonial-4-author">
                                                    <h4 class="title">{{ $evaluate->title }}</h4>
                                                    <span>{{ $evaluate->content1 }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="testimonial-arrow-4 pl-110">
                                <div class="tptestimonal-4-nav p-relative">
                                    <button class="prv-testi-case">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14"
                                                fill="none" viewBox="0 0 8 14">
                                                <path fill-rule="evenodd"
                                                    d="M7.707.293a1 1 0 0 1 0 1.414L2.414 7l5.293 5.293a1 1 0 0 1-1.414 1.414l-6-6a1 1 0 0 1 0-1.414l6-6a1 1 0 0 1 1.414 0z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <button class="next-testi-case">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14"
                                                fill="none" viewBox="0 0 8 14">
                                                <path fill-rule="evenodd"
                                                    d="M.293 13.707a1 1 0 0 1 0-1.414L5.586 7 .293 1.707A1 1 0 1 1 1.707.293l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414 0z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial-area-end -->

        <!-- product-area-start -->
        <div class="product-area pb-60 pt-85">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="tpsection-wrapper text-center pb-10">
                            <h2 class="tpsection-title-two">
                                <span class="b-line">THAM KHẢO</span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xxl-12 col-xl-12 col-lg-12">
                        <div class="tpbrand product-area-active">
                            @foreach ($products as $product)
                                <div class="tpbrand-item" style="padding: 0 8px">
                                    <a href="{{ route('product.show', $product->slug) }}">
                                        <img loading="lazy"src="{{ Voyager::image($product->thumbnail('cropped', 'image')) }}"
                                            alt="{{ $product->title }}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product-area-end -->

    </main>
@endsection
