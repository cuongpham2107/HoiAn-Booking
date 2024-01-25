<!-- Start Header -->
@php
    $menu = menu('home_menu', '_json');
@endphp

<header class="header header_style_one">
    <div class="middle_bar">
        <div class="auto-container">
            <div
                class="middle_bar_inner d-flex align-items-center justify-content-center justify-content-between gap-4 flex-wrap">
                <!-- Logo -->
                <div class="logo">
                    <a href="{{ asset('/') }}" class="logo_default"><img src="{{ Voyager::image(setting('site.logo')) }}" alt="{{ setting('site.title') }}"></a>
                    <a href="{{ asset('/') }}" class="logo_sticky"><img src="{{ Voyager::image(setting('site.logo')) }}" alt="{{ setting('site.title') }}"></a>
                </div>
                <div class="mainnav d-none d-lg-block">
                    <ul class="main_menu">
                        @foreach ($menu as $item)
                            @if (count($item->children) > 0)
                                <li
                                    class="menu-item menu-item-has-children @if ($item->url == '/' . request()->segment(1)) active @endif">
                                    <a href="{{ asset($item->url) }}"
                                        title="{{ $item->title }}">{{ $item->title }}</a>
                                    <ul class="sub-menu">
                                        @foreach ($item->children as $child)
                                            <li class="menu-item">
                                                <a href="{{ asset($child->url) }}"
                                                    title="{{ $child->title }}">{{ $child->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="menu-item @if ($item->url == '/' . request()->segment(1)) active @endif">
                                    <a href="{{ asset($item->url) }}" title="{{ $item->title }}">
                                        {{ $item->title }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                <div class="other_elements_wrapper d-flex align-items-center gap-4">
                    <!-- Button Box -->
                    <div class="button-box d-none d-sm-block">
                        <a class="btn-style-one theme-btn" href="{{route('booking.index')}}">
                            <div class="btn-wrap">
                                <span class="text-one">Book now</span>
                                <span class="text-two">Book now</span>
                            </div>
                        </a>
                        <a class="btn-style-two theme-btn" href="{{route('booking.index')}}">
                            <div class="btn-wrap">
                                <span class="text-one">Book now</span>
                                <span class="text-two">Book now</span>
                            </div>
                        </a>
                    </div>

                    <!-- Mobile Menu Toggle Button -->
                    <div class="mr_menu_toggle d-lg-none">
                        <span class="toggle_line"></span>
                        <span class="toggle_line"></span>
                        <span class="toggle_line"></span>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>

<!-- Sticky/Fixed Nav -->
<div class="fixed_menu w-100">
    <header class="header header_style_one"></header>
</div>

<!-- Mobile Responsive Menu -->
<div class="mr_menu d-lg-none">

    <button type="button" class="mr_menu_close"><i class="fa fa-times"></i></button>
    <div class="logo"></div> <!-- Keep this div empty. Logo will come here by JavaScript -->
    <div class="mr_navmenu"></div> <!-- Keep this div empty. Menu will come here by JavaScript -->
    
    <a class="btn-style-two theme-btn" href="{{route('booking.index')}}" style="    margin-top: 10px;
    margin-left: 20px;">
        <div class="btn-wrap">
            <span class="text-one">Book now</span>
            <span class="text-two">Book now</span>
        </div>
    </a>
</div>
<!-- End Main Header -->
