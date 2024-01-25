<!DOCTYPE html>
<html lang="en">

<head>
    <!--------------------DEFAULT--------------------->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if (isset($pageMeta))
        <meta property="og:site_name" content="{{ setting('seo.seo_title') }}">
        <meta property="og:image"
            content="{{ isset($pageMeta['image']) ? Voyager::image($pageMeta['image']) : Voyager::image(setting('seo.seo_image')) }}" />
        <meta property="og:image:alt"
            content="{{ isset($pageMeta['title']) ? $pageMeta['title'] : setting('seo.seo_title') }}" />
        <meta property="og:url" content="{{ \Request::fullUrl() }}" />
        <meta property="og:type" content="Website" />
        <meta property="og:title"
            content="{{ isset($pageMeta['title']) ? $pageMeta['title'] : setting('seo.seo_title') }}" />
        <meta property="og:description"
            content="{{ isset($pageMeta['description']) ? $pageMeta['description'] : setting('seo.seo_description') }}" />
    @else
        <meta property="og:site_name" content="{{ setting('seo.seo_title') }}">
        <meta property="og:image" content="{{ Voyager::image(setting('seo.seo_image')) }}" />
        <meta property="og:image:alt" content="{{ setting('seo.seo_title') }}" />
        <meta property="og:url" content="{{ \Request::fullUrl() }}" />
        <meta property="og:type" content="Website" />
        <meta property="og:title" content="{{ setting('seo.seo_title') }}" />
        <meta property="og:description" content="{{ setting('seo.seo_description') }}" />
    @endif
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="canonical" href="{{ request()->url() }}" />
    <meta name="description" content="{{ $description ?? setting('site.description') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-28SRDLBCTK"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-28SRDLBCTK');
    </script>
    <!-- End Google tag (gtag.js) -->
    <!-- GOOGLE SEARCH META GOOGLE SEARCH STRUCTURED DATA FOR ARTICLE && GOOGLE BREADCRUMB STRUCTURED DATA-->
    <script type="application/ld+json">
        {
             "@context": "http://schema.org",
             "@type": "BlogPosting",
             "headline": "{{ isset($pageMeta['title']) ? $pageMeta['title'] : setting('seo.seo_title') }}",
             "description": "{{ isset($pageMeta['description']) ? $pageMeta['description'] : setting('seo.seo_description') }}",
             "datePublished": "{{ isset($pageMeta['created_at']) ? $pageMeta['created_at'] : '' }}",
             "dateModified": "{{ isset($pageMeta['updated_at']) ? $pageMeta['updated_at'] : '' }}",
             "publisher": {
               "@type": "Organization",
               "name": "{{ setting('site.title') }}",
               "logo": {
                 "@type": "ImageObject",
                 "url": "{{ Voyager::image(setting('site.logo')) }}"
               }
             },
             "mainEntityOfPage": {
               "@type": "WebPage",
               "@id": "{{ request()->url() }}"
             },
             "keywords": "{{ isset($pageMeta['tag']) ? $pageMeta['tag'] : '' }}",
            }
    </script>
    <!-- END GOOGLE SEARCH META GOOGLE SEARCH STRUCTURED DATA FOR ARTICLE && GOOGLE BREADCRUMB STRUCTURED DATA-->

    <title>{{ $pageMeta['title'] ?? setting('site.title') }}</title>
    <link rel="icon" href="{{ Voyager::image(setting('admin.icon_image')) }}" type="image/png" sizes="16x16">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>

    </style>

    @yield('css')
</head>

<body>
    {{--    <div id="preloader" class="loader_show"> --}}
    {{--        <div class="loader-wrap"> --}}
    {{--            <div class="loader"> --}}
    {{--                <div class="loader-inner"></div> --}}
    {{--            </div> --}}
    {{--        </div> --}}
    {{--    </div> --}}
    <!-- pointer start -->
    <div class="pointer bnz-pointer" id="bnz-pointer"></div>
    <div class="content">
        @include('frontend.layouts.partials.header')
        @yield('content')
        @include('frontend.layouts.partials.footer')
        <!-- Scroll To Top -->
        <div class="scroll-to-top"><span class="fas fa-arrow-up fa-fw"></span></div>
    </div>
    <div class="social-button">
        <div class="social-button-content">
           
            
            <a href="http://zalo.me/{{setting('site.phone')}}" target="_blank" class="zalo">
               <img src="https://nocodebuilding.com/wp-content/uploads/2020/07/zl.png" alt="Chat Zalo">
              </a>
              <a href="#" target="_blank" class="mes">
              {{-- <img src="https://nocodebuilding.com/wp-content/uploads/2020/07/fb.png" alt="Chat Messenger"> --}}
              </a>
        </div>
           
      </div>
    <div class="hotline-phone-ring-wrap">
        <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
            <a href="tel:{{setting('site.phone')}}" class="pps-btn-img">
                <img src="https://nocodebuilding.com/wp-content/uploads/2020/07/icon-call-nh.png" alt="Gọi điện thoại" width="50">
            </a>
            </div>
        </div>
        <div class="hotline-bar">
            <a href="tel:{{setting('site.phone')}}">
                <span class="text-hotline">{{setting('site.phone')}}</span>
            </a>
        </div>
    </div>

    <!-- JS here -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/appear.js') }}"></script>
    <script src="{{ asset('assets/js/parallax.min.js') }}"></script>
    <script src="{{ asset('assets/js/tilt.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>

    <script src="{{ asset('assets/js/odometer.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.marquee.min.js') }}"></script>
    <script src="{{ asset('assets/js/parallax-scroll.js') }}"></script>
    <script src="{{ asset('assets/js/nav-tool.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/price-range.js') }}"></script>

    <script src="{{ asset('assets/plugins/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <div id="fb-root"></div>
    {{-- <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/menu.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script> --}}

    @yield('js')
    @include('frontend.layouts.partials.alert')



</body>

</html>
