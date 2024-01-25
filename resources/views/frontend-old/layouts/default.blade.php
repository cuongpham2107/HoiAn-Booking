<!DOCTYPE html>
<html lang="en">

<head>
    <!--------------------DEFAULT--------------------->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if(isset($pageMeta))
        <meta property="og:site_name" content="{{ setting('seo.seo_title') }}">
        <meta property="og:image"
              content="{{ isset($pageMeta['image']) ? Voyager::image($pageMeta['image']) : Voyager::image(setting('seo.seo_image')) }}"/>
        <meta property="og:image:alt"
              content="{{ isset($pageMeta['title']) ? $pageMeta['title'] : setting('seo.seo_title') }}"/>
        <meta property="og:url" content="{{ \Request::fullUrl() }}"/>
        <meta property="og:type" content="Website"/>
        <meta property="og:title"
              content="{{ isset($pageMeta['title']) ? $pageMeta['title'] : setting('seo.seo_title') }}"/>
        <meta property="og:description"
              content="{{ isset($pageMeta['description']) ? $pageMeta['description'] : setting('seo.seo_description') }}"/>
    @else
        <meta property="og:site_name" content="{{ setting('seo.seo_title') }}">
        <meta property="og:image" content="{{ Voyager::image(setting('seo.seo_image')) }}"/>
        <meta property="og:image:alt" content="{{ setting('seo.seo_title') }}"/>
        <meta property="og:url" content="{{ \Request::fullUrl() }}"/>
        <meta property="og:type" content="Website"/>
        <meta property="og:title" content="{{ setting('seo.seo_title') }}"/>
        <meta property="og:description" content="{{ setting('seo.seo_description') }}"/>
    @endif

    <link rel="canonical" href="{{ request()->url() }}"/>
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
             "keywords": "Hangngamedia, chayquangcao, thietkelogo, Truyenthongthuonghieu, marketing, socialmedia, agencymarketing, {{ isset($pageMeta['tag']) ? $pageMeta['tag'] : '' }}",
            }
    </script>
    <!-- END GOOGLE SEARCH META GOOGLE SEARCH STRUCTURED DATA FOR ARTICLE && GOOGLE BREADCRUMB STRUCTURED DATA-->

    <title>{{ $pageMeta['title'] ?? setting('site.title') }}</title>
    <link rel="icon" href="{{ Voyager::image(setting('admin.icon_image')) }}" type="image/png" sizes="16x16">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    @yield('css')
</head>

<body>
<!-- pre loader area start -->
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <!-- loading content here -->
            <div class="tp-preloader-content">
                <div class="tp-preloader-logo">
                    <div class="tp-preloader-circle">
                        <svg width="190" height="190" viewBox="0 0 380 380" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6"
                                    stroke-linecap="round"></circle>
                            <circle stroke="red" cx="190" cy="190" r="180" stroke-width="6"
                                    stroke-linecap="round"></circle>
                        </svg>
                    </div>
                    <img src="{{ Voyager::image(setting('site.loader')) }}" alt="">
                </div>
                <p class="tp-preloader-subtitle">Loading</p>
            </div>
        </div>
    </div>
</div>
<!-- pre loader area end -->

<!-- back to top start -->
<div class="back-to-top-wrapper back_to_top-2">
    <button id="back_to_top" type="button" class="back-to-top-btn">
        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>
    </button>
</div>
<!-- back to top end -->
<div class="phone-call">
    <a href="tel:{{ setting('site.phone') }}">
        <button id="phone-call" type="button" class="phone-call-btn">
            <svg width="22" height="21" viewBox="0 0 22 21" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.5"
                      d="M6.71695 10.5688C7.61339 12.4201 9.11031 13.9131 10.9638 14.8048C11.1005 14.8696 11.2518 14.8976 11.4026 14.8861C11.5535 14.8747 11.6987 14.8241 11.8241 14.7395L14.5464 12.921C14.6667 12.8394 14.8057 12.7896 14.9504 12.7763C15.0951 12.7629 15.2409 12.7865 15.374 12.8447L20.4703 15.0335C20.6445 15.106 20.79 15.2337 20.8844 15.3971C20.9789 15.5604 21.017 15.7502 20.993 15.9373C20.8315 17.198 20.2161 18.3567 19.2621 19.1965C18.308 20.0363 17.0806 20.4997 15.8096 20.5C11.8819 20.5 8.11498 18.9397 5.33764 16.1624C2.5603 13.385 1 9.61813 1 5.69038C1.00029 4.41936 1.46369 3.192 2.30349 2.23795C3.1433 1.2839 4.30196 0.668537 5.56267 0.507012C5.74979 0.482975 5.93963 0.521118 6.10294 0.615565C6.26626 0.710013 6.394 0.855529 6.46649 1.0297L8.65527 6.13685C8.71219 6.2679 8.736 6.41094 8.7246 6.55336C8.71321 6.69578 8.66696 6.83322 8.58993 6.95355L6.7714 9.71947C6.69043 9.84457 6.64292 9.98835 6.63338 10.1371C6.62385 10.2858 6.65262 10.4344 6.71695 10.5688Z"
                      fill="#9A9DB0"></path>
                <path d="M6.71695 10.5688C7.61339 12.4201 9.11031 13.9131 10.9638 14.8048C11.1005 14.8696 11.2518 14.8976 11.4026 14.8861C11.5535 14.8747 11.6987 14.8241 11.8241 14.7395L14.5464 12.921C14.6667 12.8394 14.8057 12.7896 14.9504 12.7763C15.0951 12.7629 15.2409 12.7865 15.374 12.8447L20.4703 15.0335C20.6445 15.106 20.79 15.2337 20.8844 15.3971C20.9789 15.5604 21.017 15.7502 20.993 15.9373C20.8315 17.198 20.2161 18.3567 19.2621 19.1965C18.308 20.0363 17.0806 20.4997 15.8096 20.5C11.8819 20.5 8.11498 18.9397 5.33764 16.1624C2.5603 13.385 1 9.61813 1 5.69038C1.00029 4.41936 1.46369 3.192 2.30349 2.23795C3.1433 1.2839 4.30196 0.668537 5.56267 0.507012C5.74979 0.482975 5.93963 0.521118 6.10294 0.615565C6.26626 0.710013 6.394 0.855529 6.46649 1.0297L8.65527 6.13685C8.71219 6.2679 8.736 6.41094 8.7246 6.55336C8.71321 6.69578 8.66696 6.83322 8.58993 6.95355L6.7714 9.71947C6.69043 9.84457 6.64292 9.98835 6.63338 10.1371C6.62385 10.2858 6.65262 10.4344 6.71695 10.5688Z"
                      stroke="#565764" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M14 1.33203C15.4776 1.7286 16.825 2.50684 17.9068 3.58866C18.9886 4.67048 19.7669 6.01781 20.1634 7.49545"
                      stroke="#565764" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M13.0859 4.70312C13.9746 4.93915 14.7852 5.40591 15.4354 6.05611C16.0856 6.7063 16.5523 7.51682 16.7883 8.40553"
                      stroke="#565764" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </button>
    </a>
</div>

@include('frontend.layouts.partials.header')

@yield('content')

@include('frontend.layouts.partials.footer')

<!-- JS here -->
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
<script src="{{ asset('assets/js/vendor/waypoints.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-bundle.js') }}"></script>
<script src="{{ asset('assets/js/meanmenu.js') }}"></script>
<script src="{{ asset('assets/js/swiper-bundle.js') }}"></script>
<script src="{{ asset('assets/js/slick.js') }}"></script>
<script src="{{ asset('assets/js/nouislider.js') }}"></script>
<script src="{{ asset('assets/js/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/js/parallax.js') }}"></script>
<script src="{{ asset('assets/js/nice-select.js') }}"></script>
<script src="{{ asset('assets/js/wow.js') }}"></script>
<script src="{{ asset('assets/js/isotope-pkgd.js') }}"></script>
<script src="{{ asset('assets/js/imagesloaded-pkgd.js') }}"></script>
<script src="{{ asset('assets/js/purecounter.js') }}"></script>
<script src="{{ asset('assets/js/parallax-scroll.js') }}"></script>
<script src="{{ asset('assets/js/ajax-form.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

@yield('js')
@include('frontend.layouts.partials.alert')

<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "429530524143138");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v18.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
</body>
</html>
