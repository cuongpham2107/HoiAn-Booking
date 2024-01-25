@extends('frontend.layouts.default')

@section('content')
    <main>
        <!-- breadcrumb-about-area-start -->
        <div class="breadcrumb-about-area scene p-relative breadcrumb-bg">
            <div class="about-inner-shape">
                <div class="about-inner-shape-2 d-none d-md-block">
                    <img class="layer" data-depth="0.5" src="assets/img/shape/about-inner-shape-1.png" alt="">
                </div>
                <div class="about-inner-shape-3 d-none d-md-block">
                    <img class="layer" data-depth="0.5" src="assets/img/shape/about-inner-shape-2.png" alt="">
                </div>
            </div>
            {{-- <div class="tpbanner-shape-y scene-y">
                <div class="about-inner-shape-4 d-none d-md-block">
                    <img class="layer" data-depth="0.6" src="assets/img/shape/inner-hand-1.png" alt="">
                </div>
            </div> --}}
            <!-- breadcrumb-area-start -->
            <section class="breadcrumb-area pb-50 pt-160">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="breadcrumb__content p-relative z-index-1">
                                <h3 class="breadcrumb__title">Sản phẩm</h3>
                                <div class="breadcrumb__list">
                                    <span><a href="{{ asset('/') }}">Trang chủ</a></span>
                                    <span class="dvdr"></span>
                                    <span>Sản phẩm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->
        </div>
        <!-- seo-area-start -->
        <section class="portfolio-area pt-100 pb-110">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="portfolio-inner mb-50">
                        <h4 class="portfolio-inner-head">Sản phẩm <br> <span style="color: #ff6400;font-size: 46px;">Của Hằng Nga Media</span></h4>
                     </div>
                  </div>
                  <div class="col-lg-6 align-self-end">
                     <div class="portfolio-inner-masonary masonary-menu mb-50">
                        <button class="active" data-filter="*"><span>Tất cả</span></button>
                        <button data-filter=".truyen_thong" class=""><span>Truyền thông</span></button>
                        <button data-filter=".thiet_ke" class=""><span>Thiết kế</span></button>
                     </div>
                  </div>
               </div>
               <div class="row grid" style="position: relative; height: 1674.56px;">
                    @foreach($products as $key => $product)
                        <div class="col-lg-4 col-md-4 grid-item {{ $product->type }}" style="position: absolute; left: 0%; top: 0px;">
                            <div class="portfolio-inner-item mb-60">
                                <div class="portfolio-inner-thumb">
                                    <a href="{{ route('product.show', $product->slug) }}">
                                        <img src="{{ Voyager::image($product->thumbnail('cropped', 'image')) }}" alt="{{ $product->title }}" loading="lazy">
                                    </a>
                                </div>
                                <div class="portfolio-inner-content">
                                    <span>{{ $product->type == 'truyen_thong' ? "Truyền thông" : "Thiết kế"  }}</span>
                                    <h4 class="portfolio-inner-title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->title }}</a></h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
               </div>
               @if($products->lastPage() > 1)
                        <div class="basic-pagination mt-30">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="{{ route('products') }}?page={{ $products->currentPage() == 1 ? 1 : $products->currentPage()-1 }}">
                                        <i>
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 6H1" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M6 11L1 6L6 1" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}?page={{ $products->currentPage()==$products->lastPage() ? $products->currentPage() : $products->currentPage()+1 }}">
                                            <span class="current">
                                            Next page
                                            <i>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6H11" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6 11L11 6L6 1" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    @endif
            </div>
         </section>
        <!-- seo-area-end -->
    </main>
@endsection
@section('js')
    
@endsection
