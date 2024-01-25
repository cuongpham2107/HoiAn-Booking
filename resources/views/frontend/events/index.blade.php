@extends('frontend.layouts.default')
@section('content')

<div class="page-wrapper">
	<!-- Page Banner -->
	<section class="page-banner" style="background-image: url({{Voyager::image($eventBanners[0]->image ?? '')}})">
		<div class="auto-container">
			<ul class="page-breadbrumbs">
				<li><a href="{{route('home')}}">Home</a></li>
				<li>event</li>
			</ul>
			<h1 class="page-banner_title">{{$eventBanners[0]->title ?? 0}}</h1>
		</div>
	</section>
	<!-- End Page Banner -->

	<!-- Gallery Five / Style Two -->
	<section class="gallery-five style-two">
		<div class="auto-container">
			<div class="page-header d-flex align-items-center justify-content-between flex-wrap flex-md-nowrap gap-2 gap-md-5">
				<!-- Gallery Five Title Box -->
				<div class="gallery-five_title-box">
					<h4>OUR EVENT</h4>
				</div>

				<!-- Gallery Search Box -->
				<div class="gallery-search_box">
					<!-- Search Box -->
					<div class="search-box">
						<form method="GET" action="{{route('search.events')}}">
							<div class="form-group">
								<input type="search" name="keyword" value="" placeholder="Search..." required>
								<button type="submit"><span class="icon fa fa-search"></span></button>
							</div>
						</form>
					</div>

				</div>
			</div>
			
			<!-- MixitUp Galery -->
			<div class="mixitup-gallery">
				
				<div class="filter-list">
                         @foreach ($events as $item)
					<!-- Gallery Block Two -->
					<div class="tour-block_one cloud seasonal">
						<div class="tour-block_one-inner d-flex align-items-center flex-wrap flex-xl-nowrap">
							<div class="tour-block_one-image flex-xl-shrink-0">
								<a href="{{route('events.show',['slug' => $item->slug])}}"><img src="{{Voyager::image($item->getThumbnail($item->image,'thumbnail'))}}" alt="" /></a>
							</div>
							<div class="tour-block_one-content">
								<div class="tour-block_one-location">{{$item->location}}</div>
								<h4 class="tour-block_one-heading line-clamp-2"><a href="{{route('events.show',['slug' => $item->slug])}}">{{$item->name}}</a></h4>
								<div class="tour-block_one-text line-clamp-3">{{$item->excerpt}}</div>
							</div>
							<div class="tour-block_one-info flex-shrink-0 ms-xl-auto">
								<div class="tour-block_one-buttons">
									<a class="btn-style-two theme-btn" href="#">
										<div class="btn-wrap">
											<span class="text-one">Join the event</span>
											<span class="text-two">Join the event</span>
										</div>
									</a>
									<a class="btn-style-three theme-btn" href="{{route('events.show',['slug' => $item->slug])}}">
										<div class="btn-wrap">
											<span class="text-one">Learn More</span>
											<span class="text-two">Learn More</span>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
                         @endforeach

				<!-- Pagination Outer -->
				<div class="pagination-outer text-center">
					{{$events->links('pagination.paginate')}}
				</div>

			</div>

		</div>
	</section>
	<!-- End Gallery Five -->

</div>
<!-- End PageWrapper -->
@endsection