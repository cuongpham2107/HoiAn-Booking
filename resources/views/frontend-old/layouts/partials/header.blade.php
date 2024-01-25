<!-- header-area-start -->
<header>
    @php
        $menu = menu('home_menu', '_json');
    @endphp
    <div id="header-sticky" class="tptransparent__header header-green header-spaces pl-185 pr-185">
        <div class="container-fluid">
            <div class="tp-mega-menu-wrapper">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-6 col-sm-6 col-9">
                        <div class="tplogo__area">
                            <a href="{{ asset('/') }}">
                                <img src="{{ Voyager::image(setting('site.logo')) }}" alt="{{ setting('site.title') }}">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-0 col-lg-9  d-none d-xl-block">
                        <div class="tpmenu__area main-mega-menu pl-35">
                            <nav class="tp-main-menu-content">
                                <ul>
                                    @foreach ($menu as $item)
                                        @if($item->url == "/services")
                                            <li class="has-dropdown @if ($item->url == '/' . request()->segment(1)) active @endif">
                                                <a href="{{ asset($item->url) }}" title="{{ $item->title }}">
                                                    {{ $item->title }}
                                                </a>
                                                @php
                                                    $arrService= \App\Service::where('type', 'dich-vu-chinh')->where('status', 'ACTIVE')->orderBy('sort', 'asc')->get();
                                                @endphp
                                                <ul class="tp-submenu submenu">
                                                    @if(count($arrService)>0)
                                                        @foreach($arrService as $arrS)
                                                            <li><a href="{{ route('services.show', $arrS->slug) }}">{{ $arrS->title }}</a></li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </li>
                                        @else
                                            <li class="@if ($item->url == '/' . request()->segment(1)) active @endif ">
                                                <a href="{{ asset($item->url) }}" title="{{ $item->title }}">
                                                    {{ $item->title }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-0 col-lg-0 col-sm-6 col-3">
                        <div class="tpheader__right d-flex align-items-center justify-content-end">
                            <div class="d-none d-md-block">
                            </div>
                            <div class="tpheader-btn-two ml-25 d-xl-none d-none d-md-block">
                                <a href="tel:{{setting('site.phone')}}">Gọi ngay: {{setting('site.phone')}}</a>
                            </div>
                            <div class="offcanvas-btn d-xl-none ml-20">
                                <button class="offcanvas-open-btn"><i class="fa-solid fa-bars"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-area-end -->

<!-- offcanvas area start -->
<div class="offcanvas__area">
    <div class="offcanvas__wrapper">
       <div class="offcanvas__close">
          <button class="offcanvas__close-btn offcanvas-close-btn">
             <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                   stroke-linejoin="round" />
                <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                   stroke-linejoin="round" />
             </svg>
          </button>
       </div>
       <div class="offcanvas__content">
          <div class="offcanvas__top mb-50 d-flex justify-content-between align-items-center">
             <div class="offcanvas__logo logo">
                <a href="{{ asset('/') }}">
                    <img src="{{ Voyager::image(setting('site.logo')) }}" alt="{{ setting('site.title') }}">
                </a>
             </div>
          </div>
          <div class="tp-main-menu-mobile mb-35"></div>
          <div class="offcanvas__contact mb-40">
             <p class="offcanvas__contact-call"><a href="tel:{{ setting('site.phone') }}">+84 {{ setting('site.phone') }}</a></p>
             <p class="offcanvas__contact-mail"><a href="mailto:{{ setting('site.email') }}">{{ setting('site.email') }}</a></p>
          </div>
          <div class="offcanvas__social">
            <a target="_blank" href="{{ setting('social.link_page_facebook') }}"><i class="fa-brands fa-facebook-f"></i></a>
            <a target="_blank" href="{{ setting('social.link_instagram') }}"><i class="fa-brands fa-instagram"></i></a>
          </div>
       </div>
    </div>
 </div>
 <div class="body-overlay"></div>
 <!-- offcanvas area end -->