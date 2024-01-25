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
        <section class="breadcrumb-area pb-50 pt-160 mb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content p-relative z-index-1">
                            <h3 class="breadcrumb__title">Tin tức - Kiến thức</h3>
                            <div class="breadcrumb__list">
                                <span><a href="{{ asset('/') }}">Trang chủ</a></span>
                                <span class="dvdr"></span>
                                <span>Tin tức - Kiến thức</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->
    </div>
    <!-- breadcrumb-about-area-end -->

    <!-- postbox area start -->
    <section class="postbox__area pt-60 pb-75">
        <div class="container">
           <div class="row">
              <div class="col-xxl-8 col-xl-8 col-lg-8">
                 <div class="blog-grid-wrapper">
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-lg-6 col-md-6">
                                <div class="tpblog-item-2 mb-30">
                                    <div class="tpblog-thumb-2">
                                        <a href="{{ route('posts.show', $post->slug) }}">
                                            <img src="{{ Voyager::image($post->thumbnail('cropped', 'image')) }}" alt="{{ $post->title }}" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="tpblog-wrap">
                                        <div class="tpblog-meta-2">
                                            <span>
                                                <i>
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                        d="M15 8C15 11.864 11.864 15 8 15C4.136 15 1 11.864 1 8C1 4.136 4.136 1 8 1C11.864 1 15 4.136 15 8Z"
                                                        stroke="#565764" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                        <path
                                                        d="M10.5967 10.226L8.42672 8.93099C8.04872 8.70699 7.74072 8.16799 7.74072 7.72699V4.85699"
                                                        stroke="#565764" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    </svg>
                                                </i>
                                                {{ $post->created_at->format('d/m/Y') }}
                                            </span>
                                        </div>
                                        <div class="tpblog-content-2">
                                            <h4 class="tpblog-title-2">
                                                <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if($posts->lastPage() > 1)
                        <div class="basic-pagination mt-30">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="{{ route('posts') }}?page={{ $posts->currentPage() == 1 ? 1 : $posts->currentPage()-1 }}">
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
                                        <a href="{{ route('posts') }}?page={{ $posts->currentPage()==$posts->lastPage() ? $posts->currentPage() : $posts->currentPage()+1 }}">
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
              </div>
              <div class="col-xxl-4 col-xl-4 col-lg-4">
                 <div class="sidebar__wrapper ml-30">
                    <div class="sidebar__widget mb-20">
                       <div class="sidebar__widget-content">
                          <div class="sidebar__search">
                             <form action="{{ route("searchPost") }}" method="GET">
                                <div class="sidebar__search-input-2">
                                   <div class="sidebar__search-input-2-box">
                                      <input name="keyword" type="text" placeholder="Nhập từ khoá...">
                                   </div>
                                   <button type="submit"><i class="far fa-search"></i></button>
                                </div>
                             </form>
                          </div>
                       </div>
                    </div>
                    <div class="sidebar__widget mb-20">
                       <h3 class="sidebar__widget-title">Bài viết nổi bật</h3>
                       <div class="sidebar__widget-content">
                          <div class="sidebar__post rc__post">
                            @foreach($recentPosts as $rPost)
                             <div class="rc__post mb-10 d-flex align-items-center">
                                <div class="rc__post-thumb mr-20">
                                    <a href="{{ route('posts.show', $rPost->slug) }}">
                                        <img src="{{ Voyager::image($rPost->thumbnail('thumb', 'image')) }}" alt="{{ $rPost->title }}">
                                    </a>
                                </div>
                                <div class="rc__post-content">
                                   <h3 class="rc__post-title">
                                      <a href="{{ route('posts.show', $rPost->slug) }}">{{ $rPost->title }}</a>
                                   </h3>
                                   <div class="rc__meta">
                                      <span>{{ $rPost->created_at->format('d/m/Y') }}</span>
                                   </div>
                                </div>
                             </div>
                             @endforeach
                          </div>
                       </div>
                    </div>
                    <div class="sidebar__widget mb-20">
                       <h3 class="sidebar__widget-title">Categories</h3>
                       <div class="sidebar__widget-content">
                          <ul>
                            @foreach($categories as $category)
                            @php
                                $postInCategory= $category->posts->count();
                            @endphp
                             <li>
                                <a href="{{ route("categoryPost", $category->id)}}">{{ $category->name }}<span>{{ $postInCategory }}</span></a>
                             </li>
                             @endforeach
                          </ul>
                       </div>
                    </div>
                    <div class="sidebar__widget mb-20">
                       <h3 class="sidebar__widget-title">Tags</h3>
                       <div class="sidebar__widget-content">
                          <div class="tagcloud">
                            @foreach($tags as $tag)
                             <a href="{{ route('tagPost') }}?tag={{ $tag->id }}">{{ $tag->title }}</a>
                             @endforeach
                          </div>
                       </div>
                    </div>
                    <div class="sidebar__widget mb-20">
                       <h3 class="sidebar__widget-title">Social</h3>
                       <div class="sidebar__widget-content">
                          <div class="sidebar__widget-social">
                             <a target="_blank" href="{{ setting('social.link_page_facebook') }}"><i class="fa-brands fa-facebook-f"></i></a>
                             <a target="_blank" href="{{ setting('social.link_pinterest') }}"><i class="fa-brands fa-pinterest"></i></a>
                             <a target="_blank" href="{{ setting('social.link_behance') }}"><i class="fa-brands fa-behance"></i></a>
                          </div>
                       </div>
                    </div>
                    
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- postbox area end -->
</main>

@endsection
