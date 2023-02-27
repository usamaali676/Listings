@extends('layouts.master')
@section('front')

<!-- Slider
================================================== -->
<div class="listing-slider mfp-gallery-container margin-bottom-0">

    @foreach ($business->gallery as $item)
      <a href="{{asset('business/gallery_images')}}/{{$item->images}}" data-background-image="{{asset('business/gallery_images')}}/{{$item->images}}" class="item mfp-gallery" title="Title 1"></a>
    @endforeach
</div>


<!-- Content
================================================== -->
<div class="container margin-bottom-80">
	<div class="row sticky-wrapper">
		<div class="col-lg-8 col-md-8 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
                <img src="{{asset('business/logo')}}/{{$business->logo}}" alt="">
				<div class="listing-titlebar-title" style="display: flex">
					<h2>{{$business->name}}</h2>
                        @foreach ($business->cat as $item)
                        <span class="listing-tag">{{$item->name}}</span>
                        @endforeach
				</div>
                <span>
                    <a href="#listing-location" class="listing-address">
                        <i class="fa fa-map-marker"></i>
                        {{$business->address}}
                    </a>
                </span>
			</div>

			<!-- Listing Nav -->
			<div id="listing-nav" class="listing-nav-container">
				<ul class="listing-nav">
					<li><a href="#listing-overview" class="active">Overview</a></li>
					{{-- <li><a href="#listing-pricing-list">Pricing</a></li> --}}
					<li><a href="#listing-location">Location</a></li>

				</ul>
			</div>

			<!-- Overview -->
			<div id="listing-overview" class="listing-section">

				<!-- Description -->

				<p>
					{{$business->description}}
				</p>




				<!-- Listing Contacts -->
				<div class="listing-links-container">

					<ul class="listing-links contact-links">
						<li><a href="tel:{{$business->phone}}" class="listing-links"><i class="fa fa-phone"></i> {{$business->phone}}</a></li>
						<li><a href="mailto:{{$business->email}}" class="listing-links"><i class="fa fa-envelope-o"></i> {{$business->email}}</a>
						</li>
						<li><a href="#" target="_blank"  class="listing-links"><i class="fa fa-link"></i>{{$business->website}}</a></li>
					</ul>
					<div class="clearfix"></div>

					<ul class="listing-links">
						<li><a href="{{$business->fb}}" target="_blank" class="listing-links-fb"><i class="fa fa-facebook-square"></i> Facebook</a></li>
						<li><a href="{{$business->youtube}}" target="_blank" class="listing-links-yt"><i class="fa fa-youtube-play"></i> YouTube</a></li>
						<li><a href="{{$business->inst}}" target="_blank" class="listing-links-ig"><i class="fa fa-instagram"></i> Instagram</a></li>
						{{-- <li><a href="#" target="_blank" class="listing-links-tt"><i class="fa fa-twitter"></i> Twitter</a></li> --}}
					</ul>
					<div class="clearfix"></div>

				</div>
				<div class="clearfix"></div>


				<!-- Amenities -->
                @if ($business->area_status == 1)
                <h3 class="listing-desc-headline">Area We Serve</h3>
				<ul class="listing-features checkboxes margin-top-0">
                    @foreach ($business->areas as $item)
                    <li>{{$item->area}}</li>
                    @endforeach
				</ul>
                @endif

			</div>





			<!-- Location -->
			<div id="listing-location" class="listing-section">
				<h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Location</h3>

				<div id="singleListingMap-container">
                    <iframe src="{{$business->map}}" width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					{{-- <div id="singleListingMap" data-latitude="40.70437865245596" data-longitude="-73.98674011230469" data-map-icon="im im-icon-Hamburger"></div>
					<a href="#" id="streetView">Street View</a> --}}
				</div>
			</div>







		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-75 sticky">


			<!-- Verified Badge -->
			<div class="verified-badge with-tip" data-tip-content="Listing has been verified and belongs the business owner or manager.">
				<i class="sl sl-icon-check"></i> Verified Listing
			</div>

			<!-- Book Now -->
			<div id="booking-widget-anchor" class="boxed-widget booking-widget margin-top-35">
				<h3><i class="fa fa-calendar-check-o "></i> Booking</h3>
				<div class="row with-forms  margin-top-0">




                    <form action="#">
                        <label for="">Full Name</label>
                        <input type="text" name="name" id="" placeholder="Full Name">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" placeholder="Emial">
                        <label for="">Phone Number</label>
                        <input type="text" name="phone" id="" placeholder="Phone Number">
                        <label for="">Message</label>
                        <textarea name="message" id="" cols="30" rows="2"></textarea>

                    </form>

				</div>

				<!-- Book Now -->
				<a href="#" class="button book-now fullwidth margin-top-5">Request To Book</a>
			</div>
			<!-- Book Now / End -->


			<!-- Coupon Widget -->
			<div class="coupon-widget" style="background-image: url({{asset('business/feature')}}/{{$business->featureImage}});">
				<a href="#" class="coupon-top">
					<span class="coupon-link-icon"></span>
					<h3>Order 1 burger and get 50% off on second!</h3>
					<div class="coupon-valid-untill">Expires 25/10/2019</div>
					<div class="coupon-how-to-use"><strong>How to use?</strong> Just show us this coupon on a screen of your smartphone!</div>
				</a>
				<div class="coupon-bottom">
					<div class="coupon-scissors-icon"></div>
					<div class="coupon-code">L1ST30</div>
				</div>
			</div>

            @if ($business->timing_status == 1)
                			<!-- Opening Hours -->
			<div class="boxed-widget opening-hours margin-top-35">
				<div class="listing-badge now-open">Now Open</div>
				<h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
				<ul>
                    @foreach ($business->hours as $item)
                    <li>{{$item->day}} <span>{{$item->open_hour}} - {{$item->close_hour}}</span></li>
                    @endforeach

				</ul>
			</div>
			<!-- Opening Hours / End -->
            @endif



			<!-- Contact -->
			{{-- <div class="boxed-widget margin-top-35">
				<div class="hosted-by-title">
					<h4><span>Hosted by</span> <a href="pages-user-profile.html">Tom Perrin</a></h4>
					<a href="pages-user-profile.html" class="hosted-by-avatar"><img src="images/dashboard-avatar.jpg" alt=""></a>
				</div>
				<ul class="listing-details-sidebar">
					<li><i class="sl sl-icon-phone"></i> (123) 123-456</li>
					<!-- <li><i class="sl sl-icon-globe"></i> <a href="#">http://example.com</a></li> -->
					<li><i class="fa fa-envelope-o"></i> <a href="#">tom@example.com</a></li>
				</ul>

				<ul class="listing-details-sidebar social-profiles">
					<li><a href="#" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>
					<li><a href="#" class="twitter-profile"><i class="fa fa-twitter"></i> Twitter</a></li>
					<!-- <li><a href="#" class="gplus-profile"><i class="fa fa-google-plus"></i> Google Plus</a></li> -->
				</ul>

				<!-- Reply to review popup -->
				<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
					<div class="small-dialog-header">
						<h3>Send Message</h3>
					</div>
					<div class="message-reply margin-top-0">
						<textarea cols="40" rows="3" placeholder="Your message to Tom"></textarea>
						<button class="button">Send Message</button>
					</div>
				</div>

				<a href="#small-dialog" class="send-message-to-owner button popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i> Send Message</a>
			</div> --}}
			<!-- Contact / End-->


			<!-- Share / Like -->
			{{-- <div class="listing-share margin-top-40 margin-bottom-40 no-border">
				<button class="like-button"><span class="like-icon"></span> Bookmark this listing</button>
				<span>159 people bookmarked this place</span>

					<!-- Share Buttons -->
					<ul class="share-buttons margin-top-40 margin-bottom-0">
						<li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
						<li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
						<li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>
						<!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
					</ul>
					<div class="clearfix"></div>
			</div> --}}

		</div>
		<!-- Sidebar / End -->

	</div>
</div>


<!-- Footer
================================================== -->
{{-- <div id="footer" class="margin-top-15">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6">
				<img class="footer-logo" src="images/logo.png" alt="">
				<br><br>
				<p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
			</div>

			<div class="col-md-4 col-sm-6 ">
				<h4>Helpful Links</h4>
				<ul class="footer-links">
					<li><a href="#">Login</a></li>
					<li><a href="#">Sign Up</a></li>
					<li><a href="#">My Account</a></li>
					<li><a href="#">Add Listing</a></li>
					<li><a href="#">Pricing</a></li>
					<li><a href="#">Privacy Policy</a></li>
				</ul>

				<ul class="footer-links">
					<li><a href="#">FAQ</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Our Partners</a></li>
					<li><a href="#">How It Works</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>

			<div class="col-md-3  col-sm-12">
				<h4>Contact Us</h4>
				<div class="text-widget">
					<span>12345 Little Lonsdale St, Melbourne</span> <br>
					Phone: <span>(123) 123-456 </span><br>
					E-Mail:<span> <a href="#">office@example.com</a> </span><br>
				</div>

				<ul class="social-icons margin-top-20">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="vimeo" href="#"><i class="icon-vimeo"></i></a></li>
				</ul>

			</div>

		</div>

		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© 2021 Listeo. All Rights Reserved.</div>
			</div>
		</div>

	</div>

</div> --}}


@endsection
