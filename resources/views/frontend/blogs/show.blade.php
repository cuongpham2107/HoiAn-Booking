@extends('frontend.layouts.default')
@section('content')
<div class="page-wrapper">
	
	<!-- Page Banner -->
	<section class="page-banner_two" style="background-image: url({{Voyager::image($postBanners[0]->image)}})">
		<div class="auto-container">
			<ul class="page-breadbrumbs">
				<li><a href="{{route('home')}}">Home</a></li>
				<li>blog</li>
			</ul>
			<h2 class="page-banner_two-title line-clamp-2">{{$post->title}}</h2>
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
								     <a href="{{route('search.posts.tag',['slug' => $tag->slug])}}">{{$tag->title}}</a>
                                            
                                        @endforeach
								
							</div>
						</div>

						<!-- Post Widget -->
						<div class="sidebar-widget post-widget">
							<div class="widget-content">
								<h4>POPULAR</h4>
                                        @foreach ($popularPosts as $item)
								<!-- Post Widget Block -->
								<div class="post-widget_block">
									<div class="post-widget_block-image">
										<a href="{{route('posts.show',['slug' => $item->slug])}}"><img src="{{Voyager::image($item->getThumbnail($item->image,'popular'))}}" alt="" /></a>
									</div>
									<div class="content">
										<div class="title">{{$item->post_tags[0]['title'] ?? ''}}</div>
										<h5 class="post-widget_heading line-clamp-2"><a href="{{route('posts.show',['slug' => $item->slug])}}">{{$item->title}}</a></h5>
										<div class="post-widget_date">{{$item->created_at}}</div>
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
						{{-- <div class="inner-box">
							<p>National parks are some of the most breathtaking and remarkable destinations in the world, offering remarkable natural landscapes, intriguing wildlife, and unforgettable experiences. Regardless of whether you're an avid hiker, a nature enthusiast, or simply a lover of the great outdoors, visiting national parks should be on your travel bucket list. Here are 10 amazing national parks to consider adding:</p>
							<h4 class="blog-detail_title"><span>01.</span> Yosemite National Park, California</h4>
							<div class="image">
								<img src="images/resource/news-14.jpg" alt="" />
							</div>
							<p>Yosemite National Park is a must-see destination for any nature lover. With soaring granite cliffs, stunning waterfalls, and ancient sequoia trees, this park offers visitors a true escape from city life. Yosemite Valley is perhaps the most famous part of the park, where visitors can see the iconic El Capitan and Half Dome formations.</p>
							<h4 class="blog-detail_title"><span>02.</span> Yellowstone National Park, Wyoming</h4>
							<div class="image">
								<img src="images/resource/news-15.jpg" alt="" />
							</div>
							<p>Yellowstone is the world's first national park and one of the most distinct. With geothermal features, including Old Faithful geyser, and abundant wildlife such as grizzly bears, wolves, and bison, Yellowstone offers visitors a unique experience in the American West. The park is also home to the Yellowstone Caldera, one of the largest active volcanic systems in the world.</p>
							<h4 class="blog-detail_title"><span>03.</span> Denali National Park, Alaska</h4>
							<div class="image">
								<img src="images/resource/news-16.jpg" alt="" />
							</div>
							<p>Home to North America's tallest peak, Denali National Park offers rugged wilderness and stunning views of the Alaska Range, as well as opportunities to see grizzly bears, caribou, and other wildlife. Visitors can take a bus tour through the park, hike through the backcountry, or simply enjoy the views from the park road.</p>
							<blockquote>
								<div class="blockquote-inner">
									<span class="blockquote_icon flaticon-quote-3"></span>
									The national parks are truly the jewels of America's landscape, and they offer us an opportunity to connect with nature.
								</div>
							</blockquote>
							<p>Visiting a national park is a unique and rewarding experience that offers the chance to connect with nature and explore some of the most beautiful places on the planet. Whether you're an experienced hiker or simply looking for a peaceful escape, there is a national park out there for you. So start planning your next adventure and get ready to discover the wonder and beauty of these incredible destinations.</p>
							<div class="more-projects">
								<div class="d-flex justify-content-between flex-wrap align-items-center">
									<a href="#"><span class="flaticon-left-arrow-2"></span> &nbsp; Previous Article</a>
									<a href="#">Next Article &nbsp; <span class="flaticon-next-2"></span></a>
								</div>
							</div>
						</div> --}}
                              {!! $post->body !!}
						<!-- Comments Area -->
						{{-- <div class="comments-area">
							<div class="comments-area_pattern" style="background-image: url(images/icons/pattern-1.png)"></div>
							<div class="comments-area_pattern-two" style="background-image: url(images/icons/pattern-1.png)"></div>
							<div class="group-title">
								<h4>COMMENTS</h4>
							</div>
							
							<div class="comment-box">

								<!-- Comment -->
								<div class="comment">
									<div class="text">“This article is fantastic! As someone who loves exploring the outdoors, I'm always on the lookout for new national parks to add to my bucket list. Thanks for the inspiration!"</div>
									<div class="news-block_four-author">
										<div class="news-block_four-author_image">
											<img src="images/resource/author-8.jpg" alt="" />
										</div>
										Jessica Laurens
										<span>December 3, 2025</span>
									</div>
								</div>

								<!-- Comment -->
								<div class="comment">
									<div class="text">"I've been lucky enough to visit a few of the national parks on this list, and I can vouch for their incredible beauty and unique experiences. I highly recommend visiting Yellowstone and Banff - they are truly unforgettable destinations!"</div>
									<div class="news-block_four-author">
										<div class="news-block_four-author_image">
											<img src="images/resource/author-7.jpg" alt="" />
										</div>
										Jack Smith
										<span>November 10, 2025</span>
									</div>
								</div>

							</div>

							<!-- Pagination Outer -->
							<div class="pagination-outer text-right">
								<ul class="paginations">
									<li><a href="#"><span class="flaticon-left-arrow-2"></span></a></li>
									<li class="active"><a href="#">01</a></li>
									<li><a href="#">02</a></li>
									<li><a href="#">03</a></li>
									<li>...</li>
									<li><a href="#">10</a></li>
									<li><a href="#"><span class="flaticon-next-2"></span></a></li>
								</ul>
							</div>
						</div> --}}

						<div class="comment-box mt-5">
							<div class="fb-comments" data-href="{{route('posts.show',['slug' => $post->slug])}}" data-width="100%" data-numposts="5"></div>
						</div>

						<!-- Comment Form -->
						{{-- <div class="comment-form-outer">
							<div class="group-title">
								<h4>WRITE A COMMENT</h4>
							</div>
							<!-- Comment Form -->
							<div class="comment-form">
								<form method="post" action="https://wpthemebooster.com/demo/themeforest/html/vacasky/blog.html">
									<div class="row clearfix">
										
										<div class="col-lg-6 col-md-6 col-sm-12 form-group">
											<label>NAME</label>
											<input type="text" name="username" placeholder="Name" required="">
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12 form-group">
											<label>EMAIL ADDRESS</label>
											<input type="text" name="username" placeholder="Email" required="">
										</div>
										
										<div class="col-lg-12 col-md-12 col-sm-12 form-group">
											<label>COMMENT</label>
											<textarea class="" name="message" placeholder="Your text here..."></textarea>
										</div>
										
										<div class="col-lg-12 col-md-12 col-sm-12 form-group">
											<div class="d-flex justify-content-between align-items-center flex-wrap">
												<input type="file" id="myfile" name="myfile">
												<button class="theme-btn submit-btn">
													SUBMIT COMMENT
												</button>
											</div>
										</div>
										
									</div>
								</form>
							</div>
							<!-- End Comment Form -->
						</div> --}}

					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- End PageWrapper -->
@endsection