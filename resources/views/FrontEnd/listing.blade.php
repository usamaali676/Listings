@extends('layouts.master')
@section('front')


<!-- Titlebar
================================================== -->
{{-- <div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Listings</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Listings</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div> --}}


<!-- Content
================================================== -->





<!-- Content
================================================== -->
<div class="fs-container">

	<div class="fs-inner-container content">
		<div class="fs-content">

			<!-- Search -->
			<section class="search">

				<div class="row">
					<div class="col-md-12">

                            <!-- Search -->
                        <form action="{{route('search')}}" method="GET">
                            <div class="col-md-12">
                                <div class="main-search-input gray-style margin-top-0 margin-bottom-10">

                                    <div class="main-search-input-item">
                                        <input type="text" name="search" placeholder="What are you looking for?" value=""/>
                                    </div>

                                    <div class="main-search-input-item location">
                                        <div id="autocomplete-container">
                                            <input id="autocomplete-input" type="text" name="location" placeholder="Location">
                                        </div>
                                        <a href="#"><i class="fa fa-map-marker"></i></a>
                                    </div>

                                    <div class="main-search-input-item">
                                        <select data-placeholder="All Categories" class="chosen-select" name="category">
                                            <option>All Categories</option>
                                            @foreach ($businessCategory as $cat)
                                            <option>{{$cat->name}}</option>
                                            @endforeach


                                        </select>
                                    </div>

                                    <button class="button">Search</button>
                                </div>
                            </div>
                        </form>
                            <!-- Search Section / End -->

					</div>
				</div>

			</section>
			<!-- Search / End -->


		<section class="listings-container margin-top-30">

			<!-- Sorting / Layout Switcher -->
			{{-- <div class="row fs-switcher">

				<div class="col-md-6">
					<!-- Showing Results -->
					<p class="showing-results">14 Results Found </p>
				</div>

			</div> --}}


			<!-- Listings -->
			<div class="row fs-listings">

			<!-- Listing Item -->
            @foreach ($business as $item)
				<div class="col-lg-6 col-md-6">
					<a href="{{route('business.single')}}/{{$item->slug}}" class="listing-item-container compact" data-marker-id="1">
						<div class="listing-item">
							<img src="{{asset('business/logo')}}/{{$item->logo}}" alt="">

							{{-- <div class="listing-badge now-open">Now Open</div> --}}

							<div class="listing-item-content">
                                <div class="d-flex">
                                @foreach ($item->cat as $list)
								<div class="numerical-rating" style="background-color: #f91942; ">{{$list->name}}</div>
                                @endforeach
                                </div>
								<h3>{{$item->name}}<i class="verified-icon"></i></h3>
								<span>{{$item->address}}</span>
							</div>
							{{-- <span class="like-icon"></span> --}}
						</div>
					</a>
				</div>
				<!-- Listing Item / End -->
            @endforeach
			</div>
			<!-- Listings Container / End -->


            			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 clearfix text-center py-md-5 pagination" style="padding: 15px 0">
					<!-- Pagination -->
                    {{$business->links()}}

				</div>
			</div>
			<!-- Pagination / End -->


		</section>

		</div>
	</div>
	<div class="fs-inner-container map-fixed">

		<!-- Map -->
		<div id="map-container">
		    <div id="map" data-map-zoom="9" data-map-scroll="true">
		        <!-- map goes here -->
		    </div>
		</div>

	</div>
</div>






@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script src="{{asset('assets/scripts/leaflet.min.js')}}"></script>

<!-- Leaflet Maps Scripts -->
<script src="{{asset('assets/scripts/leaflet-markercluster.min.js')}}"></script>
<script src="{{asset('assets/scripts/leaflet-gesture-handling.min.js')}}"></script>
<script src="{{asset('assets/scripts/leaflet-listeo.js')}}"></script>

<!-- Leaflet Geocoder + Search Autocomplete  -->
<script src="{{asset('assets/scripts/leaflet-autocomplete.js')}}"></script>
<script src="{{asset('assets/scripts/leaflet-control-geocoder.js')}}"></script>


@endsection
