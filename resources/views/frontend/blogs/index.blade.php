@extends('frontend.layouts.default')
@section('content')
    <div class="page-wrapper">
        <!-- Page Banner -->
        <section class="page-banner" style="background-image: url({{ Voyager::image($postBanners[0]->image) }})">
            <div class="auto-container">
                <ul class="page-breadbrumbs">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>blog</li>
                </ul>
                <h1 class="page-banner_title">TRAVEL BLOG</h1>
            </div>
        </section>
        <!-- End Page Banner -->

        <!-- Sidebar Page Container -->
        <div class="sidebar-page-container left-sidebar">
            <div class="auto-container">
                <div class="row clearfix">

                    <!-- Sidebar Side -->
                    <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                        <aside class="sidebar">

                            <!-- Search Box -->
                            <div class="sidebar-widget">
                                <div class="search-box">
                                    <form method="GET" action="{{ route("search.posts") }}">
                                        <div class="form-group">
                                            <input type="search" name="keyword" value="" placeholder="Search..." required>
                                            <button type="submit"><span class="icon fa fa-search"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Tags Widget -->
                            <div class="sidebar-widget popular-tags">
                                <div class="widget-content">
                                    <h4>tags</h4>
                                    @foreach ($tags as $tag)
                                        <a href="{{route('search.posts.tag',['slug' => $tag->slug])}}">{{ $tag->title }}</a>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Post Widget -->
                            <div class="sidebar-widget post-widget">
                                <div class="widget-content">
                                    <h4>POPULAR</h4>
                                    @foreach ($popularPosts as $post)
                                        <!-- Post Widget Block -->
                                        <div class="post-widget_block">
                                            <div class="post-widget_block-image">
                                                <a href="{{ route('posts.show', ['slug' => $post->slug]) }}"><img
                                                        src="{{ Voyager::image($post->getThumbnail($post->image, 'popular')) }}"
                                                        alt="" /></a>
                                            </div>
                                            <div class="content">
                                                <div class="title">{{ count($post->post_tags) > 0 ? $post->post_tags[0]['title'] : 'Guide' }}</div>
                                                <h5 class="post-widget_heading"><a
                                                        href="{{ route('posts.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                                                </h5>
                                                <div class="post-widget_date">{{ $post->created_at }}</div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        </aside>
                    </div>

                    <!-- Content Side -->
                    <div class="content-side right-sidebar m-0 col-lg-8 col-md-12 col-sm-12">
                        <div class="our-blog">
                            @if (isset($recentPost))
                                <h4 class="our-blog_title">RECENT ARTICLES</h4>
                                <!-- News Block Four -->
                                <div class="news-block_four">
                                    <div class="news-block_four-inner">
                                        <div class="news-block_four-image">
                                            <a href="{{route('posts.show',['slug' => $recentPost[0]->slug])}}"><img
                                                    src="{{ Voyager::image($recentPost[0]->getThumbnail($recentPost[0]->image, 'recent')) }}"
                                                    alt="" /></a>
                                        </div>
                                        <div class="lower-content">
                                            <div class="title">{{ $recentPost[0]->post_tags[0]['title'] ?? 'Guide' }}
                                            </div>
                                            <h4 class="news-block_four-heading"><a
                                                    href="{{route('posts.show',['slug' => $recentPost[0]->slug])}}">{{ $recentPost[0]->title }}</a></h4>
                                            <div class="news-block_four-author">
                                                <div class="news-block_four-author_image">
                                                    <img src="{{ asset('assets/images/resource/author-2.jpg') }}"
                                                        alt="" />
                                                </div>
                                                Angus Smith
                                                <span>{{ $recentPost[0]->created_at }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row clearfix">
                                @foreach ($posts as $post)
                                    <!-- News Block Four -->
                                    <div class="news-block_four style-two col-lg-6 col-md-6 col-sm-12">
                                        <div class="news-block_four-inner">
                                            <div class="news-block_four-image">
                                                <a href="{{route('posts.show',['slug' => $post->slug])}}"><img
                                                        src="{{ Voyager::image($post->getThumbnail($post->image, 'thumbnail')) }}"
                                                        alt="" /></a>
                                            </div>
                                            <div class="lower-content">
                                                <div class="title">{{ $post->post_tags[0]['title'] ?? '' }}</div>
                                                <h4 class="news-block_four-heading"><a
                                                        href="{{route('posts.show',['slug' => $post->slug])}}">{{ $post->title }}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- End PageWrapper -->
@endsection
