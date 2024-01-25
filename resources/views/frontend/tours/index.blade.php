@extends('frontend.layouts.default')
@section('content')
<div class="page-wrapper">
	

	<!-- Page Banner -->
	<section class="page-banner" style="background-image: url({{Voyager::image($tourBanners[0]->image)}})">
		<div class="auto-container">
			<ul class="page-breadbrumbs">
				<li><a href="{{route('home')}}">Home</a></li>
				<li>tours</li>
			</ul>
			<h1 class="page-banner_title">{!! $tourBanners[0]->banner_text !!}</h1>
		</div>
	</section>
	<!-- End Page Banner -->

	<!-- Gallery Five -->
	<section class="gallery-five">
		<div class="auto-container">
			<div class="page-header d-flex align-items-center justify-content-between flex-wrap flex-md-nowrap gap-2 gap-md-5">
				<!-- Gallery Five Title Box -->
				<div class="gallery-five_title-box">
					<h4>OUR TOUR PACKAGES</h4>
				</div>

				<!-- Gallery Search Box -->
				<div class="gallery-search_box">
					<!-- Search Box -->
					<div class="search-box">
						<form method="GET" action="{{route('search.tours')}}">
							<div class="form-group">
								<input type="search" class="search-field" name="keyword" value="{{ request('keyword') ?? ''}}" placeholder="Search...">
								<button type="submit" class="btn-search"><span class="icon fa fa-search"></span></button>
							</div>
						</form>
					</div>

				</div>
			</div>
			<!-- MixitUp Galery -->
                <div class="filter-list row clearfix">
					@foreach ($tours as $tour)
					<!-- Gallery Block Two -->
					<div class="gallery-block_two style-two all mix design cloud seasonal col-lg-4 col-md-6 col-sm-12">
						<div class="gallery-block_two-inner">
							<div class="gallery-block_two-image">
								<img src="{{Voyager::image($tour->getThumbnail($tour->thumbnails,'thumbnail'))}}" alt="" />
								<div class="overlay-box_two">
									<div class="overlay-box_two-inner">
										<h4 class="line-clamp-2"><a href="{{ route('tours.show', $tour->slug) }}">{{$tour->name}}</a></h4>
										<div class="d-flex align-items-center flex-wrap justify-content-center">
											<div class="gallery-block_two-location">{{$tour->amountPackage ?? 0}} Packages</div>
											<div class="gallery-block_two-price">{{$tour->rangePrice ?? 0}}</div>
										</div>
										<div class="gallery-block_two-text-two line-clamp-3">{{$tour->title}}</div>
										<div class="gallery-block_two-button">
											<a class="theme-btn learn-btn" href="{{ route('tours.show', $tour->slug) }}">Learn More</a>
										</div>
									</div>
								</div>
								<div class="overlay-box">
									<div class="overlay-content">
										<h3 class="gallery-block_two-title line-clamp-2"><a href="{{ route('tours.show', $tour->slug) }}">{{$tour->name}}</a></h3>
										<div class="d-flex align-items-center flex-wrap">
											<div class="gallery-block_two-location">{{$tour->amountPackage ?? 0}} Packages</div>
											<div class="gallery-block_two-price">{{$tour->rangePrice ?? 0}}</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach

					
				<!-- Pagination Outer -->
				<div class="pagination-outer text-center">
					{{ $tours->links('pagination.paginate') }}
				</div>

			</div>
		</div>
	</section>
	<!-- End Gallery Five -->

</div>
@endsection
