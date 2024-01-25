@php
     use Carbon\Carbon;
@endphp

@extends('frontend.layouts.default')
@section('content')
<div class="page-wrapper">
	
	<!-- Page Banner -->
	<section class="page-banner_two" style="background-image: url({{Voyager::image($eventBanners[0]->image)}})">
		<div class="auto-container">
			<ul class="page-breadbrumbs">
				<li><a href="{{route('home')}}">Home</a></li>
				<li>event</li>
			</ul>
			<h2 class="page-banner_two-title line-clamp-2">{{$event->name}}</h2>
			{{-- <div class="page-banner_two-author">
				<div class="d-flex align-items-center flex-wrap">
					<div class="image">
						<img src="images/resource/author-7.jpg" alt="" />
					</div>
					Samantha Tallon &ensp; | &ensp;
                          August 15, 2025
				</div>
			</div> --}}
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
								<form method="post" action="https://wpthemebooster.com/demo/themeforest/html/vacasky/contact.html">
									<div class="form-group">
										<input type="search" name="search-field" value="" placeholder="Search..." required>
										<button type="submit"><span class="icon fa fa-search"></span></button>
									</div>
								</form>
							</div>
						</div>

						<!-- Post Widget -->
						<div class="sidebar-widget post-widget">
							<div class="widget-content">
								<h4>OTHER EVENTS</h4>
                                        @foreach ($otherEvents as $item)
								<!-- Post Widget Block -->
								<div class="post-widget_block">
									<div class="post-widget_block-image">
										<a href="{{route('events.show',['slug' => $item->slug])}}"><img src="{{Voyager::image($item->getThumbnail($item->image,'cropped'))}}" alt="" /></a>
									</div>
									<div class="content">
										<h5 class="post-widget_heading line-clamp-2"><a href="{{route('events.show',['slug' => $item->slug])}}">{{$item->name}}</a></h5>
										<div class="post-widget_date">{{Carbon::parse($item->created_at)->format('l, d/m/Y')}}</div>
									</div>
								</div>
                                        @endforeach
							</div>
						</div>

					</aside>
				</div>

				<!-- Content Side -->
                <div class="content-side right-sidebar col-lg-8 col-md-12 col-sm-12">
                	<div class="blog-detail">
                              {!! $event->content !!}
						<div class="comment-box mt-5">
							<div class="fb-comments" data-href="{{route('events.show',['slug' => $event->slug])}}" data-width="100%" data-numposts="5"></div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- End PageWrapper -->
@endsection