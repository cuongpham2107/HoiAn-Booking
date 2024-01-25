@php
    $footer_menu = menu('footer_menu', '_json');
    $dich_vu_menu = menu('dich_vu', '_json');
    $customers = \App\Customer::all();
@endphp

<!-- Footer -->
<footer class="main-footer">
    <div class="auto-container">
        <!-- Upper Box -->
        <div class="upper-box">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div class="footer-logo"><a href="index.html"><img src="{{ Voyager::image(setting('site.logo')) }}"
                            alt="" title=""></a>
                </div>
                <ul class="footer-nav">
                    @foreach ($footer_menu as $item)
                        <li><a href="{{ $item->url }}">{{ $item->title }}</a></li>
                    @endforeach
                </ul>
                <!-- Social Box -->
                <div class="footer-social_box">
                    <a target="_blank" href="{{ setting('social.link_page_facebook') }}" class="fab fa-facebook fa-fw"></a>
                    <a target="_blank" href="{{ setting('social.link_twitter') }}" class="fab fa-twitter-square fa-fw"></a>
                    <a target="_blank" href="{{ setting('social.link_instagram') }}" class="fab fa-instagram fa-fw"></a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div class="copyright">Copyright &copy; {{ date('Y') }} {{ setting('site.title') }}. All rights reserved.</div>
                <ul class="footer-bottom_nav">
                    <li><a href="{{ url('/page/privacy-policy') }}">Privacy policy</a></li>
                    <li><a href="{{ url('/page/terms-and-condition') }}">Terms & Condition</a></li>
                </ul>
            </div>
        </div>

    </div>
</footer>

</div>
<!-- End PageWrapper -->
