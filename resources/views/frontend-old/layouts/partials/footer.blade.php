@php
    $footer_menu = menu('footer_menu', '_json');
    $dich_vu_menu = menu('dich_vu', '_json');
@endphp
<!-- footer-area-start -->
<footer>
    <div class="footer-area pt-100 footer-bg2 p-relative">
        <div class="footer-main-shape">
            <img src="{{ asset('assets/img/banner/footer-2-bg-2.png') }}" alt="">
        </div>
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="footer-widget footer-2-col-1 mb-30">
                            <div class="footer-widget-logo mb-20">
                                <a href="{{ asset('/')}} ">
                                    <img src="{{ Voyager::image(setting('site.footer_logo')) }}"
                                         alt="{{ setting('site.title') }}">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget footer-widget-2 footer-2-col-2 mb-40">
                            <h4 class="footer-widget-title mb-15">Liên kết</h4>
                            <div class="footer-widget-link">
                                <ul>
                                    @foreach ($footer_menu as $item)
                                    <li>
                                        <a href="{{ asset($item->url) }}" title="{{ $item->title }}">
                                            {{ $item->title }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-widget footer-widget-2 footer-2-col-3 mb-40">
                            <h4 class="footer-widget-title mb-15">Dịch vụ</h4>
                            <div class="footer-widget-link">
                                @php
                                    $arrService= \App\Service::where('type', 'dich-vu-chinh')->where('status', 'ACTIVE')->orderBy('sort', 'asc')->get();
                                @endphp
                                <ul>
                                    @if(count($arrService)>0)
                                        @foreach($arrService as $arrS)
                                            <li><a href="{{ route('services.show', $arrS->slug) }}">{{ $arrS->title }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget footer-widget-2 footer-2-col-4 mb-40">
                            <h4 class="footer-widget-title mb-20">Thông tin liên hệ</h4>
                            <div class="tpcontact-info-links">
                                <a href="tel:{{setting('site.phone')}}">
                                    <i><img src="{{ asset('assets/img/icon/phone-icon.png') }}" alt=""></i> 
                                    {{setting('site.phone')}}
                                </a>
                                <a href="mailto:{{ setting('site.email') }}">
                                    <i><img src="{{ asset('assets/img/icon/massage-icon.png') }}" alt=""></i>
                                    {{ setting('site.email') }}
                                </a>
                                <a href="#">
                                    <i><img src="{{ asset('assets/img/icon/location-icon.png') }}" alt=""></i> 
                                    {{ setting('site.address') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-widget-copyright footer-widget-copyright2 text-center">
                            <span>© {{date('Y')}} Copyrights by {{ setting('site.title') }}. All Rights Reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->