@extends('layouts.master')
@section('front')



			<!-- ======================= Searchbar Banner ======================== -->
			<div class="featured-slick">
				<div class="featured-gallery-slide">
                    @foreach ($business->gallery as $item)
					<div class="dlf-flew"><a href="assets/img/lg-1.png" class="mfp-gallery"><img src="{{asset('business/gallery_images')}}/{{$item->images}}" class="img-fluid mx-auto" alt="" /></a></div>
                    @endforeach
				</div>
				{{-- <div class="ftl-diope"><a href="javascript:void(0);" class="btn bg-white text-dark ft-medium rounded">See 20+ Photos</a></div> --}}
				<div class="Goodup-ops-bhri">
					<div class="Goodup-lkp-flex d-flex align-items-start justify-content-start">
						<div class="Goodup-lkp-thumb">
							<img src="assets/img/burger-king.png" class="img-fluid" width="90" alt="" />
						</div>
						<div class="Goodup-lkp-caption ps-3">
							<div class="Goodup-lkp-title"><h1 class="text-light mb-0 ft-bold">{{$business->name}}</h4></div>
							{{-- <div class="Goodup-ft-first">
								<div class="Goodup-rating">
									<div class="Goodup-rates">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
									</div>
								</div>
								<div class="Goodup-price-range">
									<span class="ft-medium text-light">34 Reviews</span>
									<div class="d-inline ms-2">
										<span class="active"><i class="fas fa-dollar-sign"></i></span>
										<span class="active"><i class="fas fa-dollar-sign"></i></span>
										<span class="active"><i class="fas fa-dollar-sign"></i></span>
									</div>
								</div>
							</div> --}}
							<div class="d-block mt-3">
								<div class="list-lioe">
									<div class="list-lioe-single"><span class="ft-medium text-info"><i class="fas fa-check-circle me-1"></i>Categories</span></div>
									<div class="list-lioe-single ms-2 ps-3 seperate">
                                        @foreach ($business->cat as $item)
                                        <a href="javascript:void(0);" class="text-light ft-medium">{{$item->name}}</a>,
                                        @endforeach

									</div>
								</div>
							</div>
							{{-- <div class="d-block mt-1">
								<div class="list-lioe">
									<div class="list-lioe-single"><span class="ft-medium text-danger">Closed</span><span class="text-light ft-medium ms-2">11:00 AM - 12:00 AM</span></div>

								</div>
							</div> --}}
						</div>
					</div>
				</div>
			</div>
			<!-- ======================= Searchbar Banner ======================== -->

			<!-- ============================ Listing Details Start ================================== -->
			<section class="gray py-5 position-relative">
				<div class="container">
					<div class="row">
						<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">

							<!-- About The Business -->
							<div class="bg-white rounded mb-4">
								<div class="jbd-01 px-4 py-4">
									<div class="jbd-details">
										<h5 class="ft-bold fs-lg">About the Business</h5>

										<div class="d-block mt-3">
											<p>{!! $business->description !!}</p>
										</div>
									</div>

								</div>
							</div>

							{{-- <!-- Business Menu -->
							<div class="bg-white rounded mb-4">
								<div class="jbd-01 px-4 py-4">
									<div class="jbd-details mb-4">
										<h5 class="ft-bold fs-lg">Business Menu</h5>

										<div class="d-block mt-3">
											<div class="row g-3">

												<!-- Single Menu -->
												<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
													<div class="Goodup-sng-menu">
														<div class="Goodup-sng-menu-thumb">
															<img src="assets/img/m-1.png" class="img-fluid" alt="" />
														</div>
														<div class="Goodup-sng-menu-caption">
															<h4 class="ft-medium fs-md">Brigue Medium Burger</h4>
															<div class="lkji-oiyt"><span>Start From</span> <h5 class="theme-cl ft-bold">$49</h5></div>
														</div>
													</div>
												</div>

												<!-- Single Menu -->
												<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
													<div class="Goodup-sng-menu">
														<div class="Goodup-sng-menu-thumb">
															<img src="assets/img/m-2.png" class="img-fluid" alt="" />
														</div>
														<div class="Goodup-sng-menu-caption">
															<h4 class="ft-medium fs-md">Cheese Mrig Buttor</h4>
															<div class="lkji-oiyt"><span>Start From</span> <h5 class="theme-cl ft-bold">$129</h5></div>
														</div>
													</div>
												</div>

												<!-- Single Menu -->
												<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
													<div class="Goodup-sng-menu">
														<div class="Goodup-sng-menu-thumb">
															<img src="assets/img/m-3.png" class="img-fluid" alt="" />
														</div>
														<div class="Goodup-sng-menu-caption">
															<h4 class="ft-medium fs-md">Potato Chips Crispy</h4>
															<div class="lkji-oiyt"><span>Start From</span> <h5 class="theme-cl ft-bold">$79</h5></div>
														</div>
													</div>
												</div>

												<!-- Single Menu -->
												<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
													<div class="Goodup-sng-menu">
														<div class="Goodup-sng-menu-thumb">
															<img src="assets/img/m-4.png" class="img-fluid" alt="" />
														</div>
														<div class="Goodup-sng-menu-caption">
															<h4 class="ft-medium fs-md">Non Vegetarion Burger</h4>
															<div class="lkji-oiyt"><span>Start From</span> <h5 class="theme-cl ft-bold">$60</h5></div>
														</div>
													</div>
												</div>

												<!-- Single Menu -->
												<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
													<div class="Goodup-sng-menu">
														<div class="Goodup-sng-menu-thumb">
															<img src="assets/img/m-5.png" class="img-fluid" alt="" />
														</div>
														<div class="Goodup-sng-menu-caption">
															<h4 class="ft-medium fs-md">Kadhai Paneer & Pee</h4>
															<div class="lkji-oiyt"><span>Start From</span> <h5 class="theme-cl ft-bold">$120</h5></div>
														</div>
													</div>
												</div>

												<!-- Single Menu -->
												<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
													<div class="Goodup-sng-menu">
														<div class="Goodup-sng-menu-thumb">
															<img src="assets/img/m-6.png" class="img-fluid" alt="" />
														</div>
														<div class="Goodup-sng-menu-caption">
															<h4 class="ft-medium fs-md">Crispy Chicken Muskio</h4>
															<div class="lkji-oiyt"><span>Start From</span> <h5 class="theme-cl ft-bold">$99</h5></div>
														</div>
													</div>
												</div>

											</div>
										</div>
									</div>

								</div>
							</div> --}}

							<!-- Amenities and More -->
                            @if ($business->area_status == 1)
							<div class="bg-white rounded mb-4">
								<div class="jbd-01 px-4 py-4">
									<div class="jbd-details mb-4">
										<h5 class="ft-bold fs-lg">Areas We Serve</h5>

										<div class="Goodup-all-features-list mt-3">
											<ul>
                                                @foreach ($business->areas as $item)
												<li><div class="Goodup-afl-pace"><img src="{{asset('asset/img/verify.svg')}}" class="" alt="" /><span>{{$item->area}}</span></div></li>
                                                @endforeach
											</ul>
										</div>
									</div>

								</div>
							</div>
                            @endif

							<!-- Recommended Reviews -->
							{{-- <div class="bg-white rounded mb-4">
								<div class="jbd-01 px-4 py-4">
									<div class="jbd-details mb-4">
										<h5 class="ft-bold fs-lg">Recommended Reviews</h5>
										<div class="reviews-comments-wrap">

											<!-- reviews-comments-item -->
											<div class="reviews-comments-item">
												<div class="review-comments-avatar">
													<img src="assets/img/t-1.png" class="img-fluid" alt="">
												</div>
												<div class="reviews-comments-item-text">
													<h4><a href="#">Kayla E. Claxton</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl me-1"></i>27 Oct 2019</span></h4>
													<span class="agd-location"><i class="lni lni-map-marker me-1"></i>San Francisco, USA</span>
													<div class="listing-rating high"><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i></div>
													<div class="clearfix"></div>
													<p>" Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. "</p>
													<div class="pull-left reviews-reaction">
														<a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>
														<a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>
														<a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
													</div>
												</div>
											</div>
											<!--reviews-comments-item end-->

											<!-- reviews-comments-item -->
											<div class="reviews-comments-item">
												<div class="review-comments-avatar">
													<img src="assets/img/t-2.png" class="img-fluid" alt="">
												</div>
												<div class="reviews-comments-item-text">
													<h4><a href="#">Amy M. Taylor</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl me-1"></i>2 Nov May 2019</span></h4>
													<span class="agd-location"><i class="lni lni-map-marker me-1"></i>Liverpool, London UK</span>
													<div class="listing-rating mid"><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star"></i></div>
													<div class="clearfix"></div>
													<p>" Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. "</p>
													<div class="pull-left reviews-reaction">
														<a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>
														<a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>
														<a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
													</div>
												</div>
											</div>
											<!--reviews-comments-item end-->

											<!-- reviews-comments-item -->
											<div class="reviews-comments-item">
												<div class="review-comments-avatar">
													<img src="assets/img/t-3.png" class="img-fluid" alt="">
												</div>
												<div class="reviews-comments-item-text">
													<h4><a href="#">Susan C. Daggett</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl me-1"></i>10 Nov 2019</span></h4>
													<span class="agd-location"><i class="lni lni-map-marker me-1"></i>Denver, United State</span>
													<div class="listing-rating good"><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star"></i></div>
													<div class="clearfix"></div>
													<p>" Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. "</p>
													<div class="pull-left reviews-reaction">
														<a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>
														<a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>
														<a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
													</div>
												</div>
											</div>
											<!--reviews-comments-item end-->

											<ul class="pagination">
												<li class="page-item">
												  <a class="page-link" href="#" aria-label="Previous">
													<span class="fas fa-arrow-circle-right"></span>
													<span class="sr-only">Previous</span>
												  </a>
												</li>
												<li class="page-item"><a class="page-link" href="#">1</a></li>
												<li class="page-item"><a class="page-link" href="#">2</a></li>
												<li class="page-item active"><a class="page-link" href="#">3</a></li>
												<li class="page-item"><a class="page-link" href="#">...</a></li>
												<li class="page-item"><a class="page-link" href="#">18</a></li>
												<li class="page-item">
												  <a class="page-link" href="#" aria-label="Next">
													<span class="fas fa-arrow-circle-right"></span>
													<span class="sr-only">Next</span>
												  </a>
												</li>
											</ul>

										</div>
									</div>
								</div>
							</div> --}}

							<!-- Location & Hours -->
							<div class="bg-white rounded mb-4">
								<div class="jbd-01 px-4 py-4">
									<div class="jbd-details mb-4">
										<h5 class="ft-bold fs-lg">Location & Hours</h5>
										<div class="Goodup-lot-wrap d-block">
											<div class="row g-4">
												<div class="col-xl-6 col-lg-6 col-md-12">
													<div class="list-map-lot">
                                                        <iframe src="{{$business->map}}" width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
													</div>
													<div class="list-map-capt">
														<div class="lio-pact"><span class="ft-medium text-info">{{$business->address}}</span></div>
													</div>
												</div>
                                                @if ($business->timing_status == 1)
                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <table class="table table-borderless">
                                                            <tbody>
                                                                @foreach ($business->hours as $item)
                                                                <tr>
                                                                    <th>{{$item->day}}</th>
                                                                    <td>{{$item->open_hour}} - {{$item->close_hour}}</td>
                                                                    {{-- <td class="text-success">Open now</td> --}}
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endif
											</div>
										</div>
									</div>
								</div>
							</div>




						</div>

						<!-- Sidebar -->
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">



							<!-- Business Inof -->
							<div class="jb-apply-form bg-white rounded py-4 px-4 box-static mb-4">
								<div class="uli-list-info">
									<ul>

										<li>
											<div class="list-uiyt">
												<div class="list-iobk"><i class="fas fa-globe"></i></div>
												<div class="list-uiyt-capt"><h5>Live Site</h5><p>{{$business->website}}</p></div>
											</div>
										</li>

										<li>
											<div class="list-uiyt">
												<div class="list-iobk"><i class="fas fa-envelope"></i></div>
												<div class="list-uiyt-capt"><h5>Drop a Mail</h5><p>{{$business->email}}</p></div>
											</div>
										</li>

										<li>
											<div class="list-uiyt">
												<div class="list-iobk"><i class="fas fa-phone"></i></div>
												<div class="list-uiyt-capt"><h5>Call Us</h5><p>{{$business->phone}}</p></div>
											</div>
										</li>
										<li>
											<div class="list-uiyt">
												<div class="list-iobk"><i class="fas fa-map-marker-alt"></i></div>
												<div class="list-uiyt-capt"><h5>Get Directions</h5><p>{{$item->adderess}}</p></div>
											</div>
										</li>

									</ul>
								</div>
							</div>

							<div class="row g-3 mb-3">
								<div class="col-4"><a href="javascript:void(0);" class="adv-btn full-width"><i class="fas fa-share"></i>Share</a></div>
							</div>

						</div>

					</div>
				</div>
			</section>
			<!-- ============================ Listing Details End ================================== -->

			<!-- ======================= Related Listings ======================== -->
			<section class="space min">
				<div class="container">

					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center mb-5">
								<h6 class="theme-cl mb-0">Related Listing</h6>
								<h2 class="ft-bold">Recently Viewed Listing</h2>
							</div>
						</div>
					</div>

					<!-- row -->
					<div class="row justify-content-center">

						<!-- Single -->
						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
							<div class="Goodup-grid-wrap">
								<div class="Goodup-grid-upper">
									<div class="Goodup-pos ab-left">
										<div class="Goodup-status close me-2">Closed</div>
									</div>
									<div class="Goodup-grid-thumb">
										<a href="single-listing-detail-2.html" class="d-block text-center m-auto"><img src="assets/img/listing/l-5.jpg" class="img-fluid" alt=""></a>
									</div>
									<div class="Goodup-rating overlay">
										<div class="Goodup-pr-average high">4.8</div>
										<div class="Goodup-aldeio">
											<div class="Goodup-rates">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
											</div>
											<div class="Goodup-all-review"><span>46 Reviews</span></div>
										</div>
									</div>
								</div>
								<div class="Goodup-grid-fl-wrap">
									<div class="Goodup-caption px-3 py-2">
										<div class="Goodup-author"><a href="author-detail.html"><img src="assets/img/t-1.png" class="img-fluid circle" alt=""></a></div>
										<h4 class="mb-0 ft-medium medium"><a href="single-listing-detail-2.html" class="text-dark fs-md">Pretty Woman Smart Batra</a></h4>
										<div class="Goodup-location"><i class="fas fa-map-marker-alt me-1 theme-cl"></i>California, USA</div>
										<div class="Goodup-middle-caption mt-3">
											<p>At vero eos et accusamus et iusto odio dignissimos ducimus</p>
										</div>
									</div>
									<div class="Goodup-grid-footer py-2 px-3">
										<div class="Goodup-ft-first">
											<a href="half-map-search-2.html" class="Goodup-cats-wrap"><div class="cats-ico bg-2"><i class="lni lni-slim"></i></div><span class="cats-title">Beauty &amp; Makeup</span></a>
										</div>
										<div class="Goodup-ft-last">
											<div class="Goodup-inline">
												<div class="Goodup-bookmark-btn"><button type="button"><i class="lni lni-envelope position-absolute"></i></button></div>
												<div class="Goodup-bookmark-btn"><button type="button"><i class="lni lni-heart-filled position-absolute"></i></button></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Single -->
						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
							<div class="Goodup-grid-wrap">
								<div class="Goodup-grid-upper">
									<div class="Goodup-pos ab-left">
										<div class="Goodup-status open me-2">Open</div>
										<div class="Goodup-featured-tag">Featured</div>
									</div>
									<div class="Goodup-grid-thumb">
										<a href="single-listing-detail-2.html" class="d-block text-center m-auto"><img src="assets/img/listing/l-6.jpg" class="img-fluid" alt=""></a>
									</div>
									<div class="Goodup-rating overlay">
										<div class="Goodup-pr-average high">4.1</div>
										<div class="Goodup-aldeio">
											<div class="Goodup-rates">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
											</div>
											<div class="Goodup-all-review"><span>17 Reviews</span></div>
										</div>
									</div>
								</div>
								<div class="Goodup-grid-fl-wrap">
									<div class="Goodup-caption px-3 py-2">
										<div class="Goodup-author"><a href="author-detail.html"><img src="assets/img/t-2.png" class="img-fluid circle" alt=""></a></div>
										<h4 class="mb-0 ft-medium medium"><a href="single-listing-detail-2.html" class="text-dark fs-md">The Sartaj Blue Night</a></h4>
										<div class="Goodup-location"><i class="fas fa-map-marker-alt me-1 theme-cl"></i>San Francisco, USA</div>
										<div class="Goodup-middle-caption mt-3">
											<p>At vero eos et accusamus et iusto odio dignissimos ducimus</p>
										</div>
									</div>
									<div class="Goodup-grid-footer py-2 px-3">
										<div class="Goodup-ft-first">
											<a href="half-map-search-2.html" class="Goodup-cats-wrap"><div class="cats-ico bg-3"><i class="lni lni-cake"></i></div><span class="cats-title">Night Party</span></a>
										</div>
										<div class="Goodup-ft-last">
											<div class="Goodup-inline">
												<div class="Goodup-bookmark-btn"><button type="button"><i class="lni lni-envelope position-absolute"></i></button></div>
												<div class="Goodup-bookmark-btn"><button type="button"><i class="lni lni-heart-filled position-absolute"></i></button></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Single -->
						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
							<div class="Goodup-grid-wrap">
								<div class="Goodup-grid-upper">
									<div class="Goodup-pos ab-left">
										<div class="Goodup-status open me-2">Open</div>
									</div>
									<div class="Goodup-grid-thumb">
										<a href="single-listing-detail-2.html" class="d-block text-center m-auto"><img src="assets/img/listing/l-7.jpg" class="img-fluid" alt=""></a>
									</div>
									<div class="Goodup-rating overlay">
										<div class="Goodup-pr-average mid">3.6</div>
										<div class="Goodup-aldeio">
											<div class="Goodup-rates">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
											</div>
											<div class="Goodup-all-review"><span>30 Reviews</span></div>
										</div>
									</div>
								</div>
								<div class="Goodup-grid-fl-wrap">
									<div class="Goodup-caption px-3 py-2">
										<div class="Goodup-author"><a href="author-detail.html"><img src="assets/img/t-3.png" class="img-fluid circle" alt=""></a></div>
										<h4 class="mb-0 ft-medium medium"><a href="single-listing-detail-2.html" class="text-dark fs-md">Pizza Delight Cafe Shop</a></h4>
										<div class="Goodup-location"><i class="fas fa-map-marker-alt me-1 theme-cl"></i>102 Satirio, Canada</div>
										<div class="Goodup-middle-caption mt-3">
											<p>At vero eos et accusamus et iusto odio dignissimos ducimus</p>
										</div>
									</div>
									<div class="Goodup-grid-footer py-2 px-3">
										<div class="Goodup-ft-first">
											<a href="half-map-search-2.html" class="Goodup-cats-wrap"><div class="cats-ico bg-4"><i class="lni lni-coffee-cup"></i></div><span class="cats-title">Coffee &amp; Bars</span></a>
										</div>
										<div class="Goodup-ft-last">
											<div class="Goodup-inline">
												<div class="Goodup-bookmark-btn"><button type="button"><i class="lni lni-envelope position-absolute"></i></button></div>
												<div class="Goodup-bookmark-btn"><button type="button"><i class="lni lni-heart-filled position-absolute"></i></button></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Single -->
						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
							<div class="Goodup-grid-wrap">
								<div class="Goodup-grid-upper">
									<div class="Goodup-pos ab-left">
										<div class="Goodup-status close me-2">Closed</div>
										<div class="Goodup-featured-tag">Featured</div>
									</div>
									<div class="Goodup-grid-thumb">
										<a href="single-listing-detail-2.html" class="d-block text-center m-auto"><img src="assets/img/listing/l-8.jpg" class="img-fluid" alt=""></a>
									</div>
									<div class="Goodup-rating overlay">
										<div class="Goodup-pr-average poor">2.3</div>
										<div class="Goodup-aldeio">
											<div class="Goodup-rates">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
											</div>
											<div class="Goodup-all-review"><span>42 Reviews</span></div>
										</div>
									</div>
								</div>
								<div class="Goodup-grid-fl-wrap">
									<div class="Goodup-caption px-3 py-2">
										<div class="Goodup-author"><a href="author-detail.html"><img src="assets/img/t-4.png" class="img-fluid circle" alt=""></a></div>
										<h4 class="mb-0 ft-medium medium"><a href="single-listing-detail-2.html" class="text-dark fs-md">The Great Allante Shop</a></h4>
										<div class="Goodup-location"><i class="fas fa-map-marker-alt me-1 theme-cl"></i>Oliy Denver, USA</div>
										<div class="Goodup-middle-caption mt-3">
											<p>At vero eos et accusamus et iusto odio dignissimos ducimus</p>
										</div>
									</div>
									<div class="Goodup-grid-footer py-2 px-3">
										<div class="Goodup-ft-first">
											<a href="half-map-search-2.html" class="Goodup-cats-wrap"><div class="cats-ico bg-5"><i class="lni lni-shopping-basket"></i></div><span class="cats-title">Shopping Mall</span></a>
										</div>
										<div class="Goodup-ft-last">
											<div class="Goodup-inline">
												<div class="Goodup-bookmark-btn"><button type="button"><i class="lni lni-envelope position-absolute"></i></button></div>
												<div class="Goodup-bookmark-btn"><button type="button"><i class="lni lni-heart-filled position-absolute"></i></button></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
					<!-- row -->

				</div>
			</section>
			<!-- ======================= Related Listings ======================== -->





@endsection
