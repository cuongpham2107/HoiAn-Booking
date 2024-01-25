@extends('frontend.layouts.default')
@section('content')

<div class="page-wrapper">

	<!-- Page Banner -->
	<section class="page-banner" style="background-image: url({{Voyager::image($contactBanners[0]->image)}})">
		<div class="auto-container">
			<ul class="page-breadbrumbs">
				<li><a href="{{route('home')}}">Home</a></li>
				<li>Contact</li>
			</ul>
			<h1 class="page-banner_title">Contact</h1>
		</div>
	</section>
	<!-- End Page Banner -->

	<!-- Gallery Five -->
	<section class="booking-one">
		<div class="auto-container">

			<div class="row clearfix">

				<!-- Contact Column -->
				<div class="contact-column col-lg-8 col-md-7 col-sm-12">
                    <div class="title-box">
                        <h4>Send Us Mail</h4>
                        <p>Your email address will not be published. Required fields are marked *</p>
                    </div>

					<!-- Contact Form -->
					<div class="booking-form">
                        <form method="post" action="{{ route('advises') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="fname" placeholder="First Name" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="lname" placeholder="Last Name">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" name="email" placeholder="Email Address" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label class="form-label">Phone Number</label>
                                        <input type="number" name="phone" placeholder="Phone Number" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label class="form-label">Enter Text</label>
                                        <textarea name="body" placeholder="Enter Text"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <button type="submit" class="btn-style-two theme-btn">
                                        <span class="btn-wrap">
                                            <span class="text-one">Send Message</span>
                                            <span class="text-two">Send Message</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
				</div>

				<!-- Map Column -->
				<div class="map-column col-lg-4 col-md-5 col-sm-12">
					<!-- Map Four -->
					<div class="map-four">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d913.0632052890265!2d108.36279262811296!3d15.896244271952641!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31420d8622a651d5%3A0x7f9fea2fd8a5ec5e!2sHoi%20An%20Planners%20-%20BOOKING%20OFFICE!5e0!3m2!1svi!2s!4v1703560549769!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
					<!-- End Map Two -->
				</div>

			</div>
		</div>
	</section>
	<!-- End Gallery Five -->
	
</div>
<!-- End PageWrapper -->
@endsection
