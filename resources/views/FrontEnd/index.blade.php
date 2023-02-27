@extends('layouts.master')
@section('front')

    <!-- Banner
    ================================================== -->
    <div class="home-search-carousel carousel-not-ready">

        <!-- Item -->
        <div class="home-search-slide" style="background-image: url({{asset('assets/images/home-carousel-01.jpg')}})">
            <div class="home-search-slider-headlines">
                <div class="container">
                    <div class="col-md-12">
                        <h3>Find <a href="#">things you'll love</a></h3>
                        <h3>Support independent sellers.</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Item -->
        <div class="home-search-slide" style="background-image: url({{asset('assets/images/home-carousel-02.jpg')}})">
            <div class="home-search-slider-headlines">
                <div class="container">
                    <div class="col-md-12">
                        <h3>Best <a href="#">Cosy Apartments</a> to Stay</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Item -->
        <div class="home-search-slide" style="background-image: url({{asset('assets/images/home-carousel-03.jpg')}})">
            <div class="home-search-slider-headlines">
                <div class="container">
                    <div class="col-md-12">
                        <h3>Scenic places to camp </h3>
                        <h3>Inspire <a href="#">your next nature trip</a></h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search -->
        <div class="container search-cont">
            <div class="col-md-12">
                <form action="{{route('search')}}" method="GET">
                        <div class="main-search-input">

                            <div class="main-search-input-item">
                                <input type="text" name="search" placeholder="What are you looking for?" value=""/>
                            </div>

                            <div class="main-search-input-item location">
                                <div id="autocomplete-container">
                                    <input id="autocomplete-input"  type="text" name="location" placeholder="Location">
                                </div>
                                <a href="#"><i class="fa fa-map-marker"></i></a>
                            </div>

                            <div class="main-search-input-item">
                                <select data-placeholder="All Categories" class="chosen-select" name="category">
                                    <option>All Categories</option>
                                    @foreach ($bcat as $cat)
                                    <option value="{{$cat->name}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="button" >Search</button>

                        </div>
                    </form>
            </div>
        </div>
    </div>


    <!-- Content
    ================================================== -->
    <section class="fullwidth margin-top-0 padding-top-0 padding-bottom-70 background-gradient">
    <div class="container" >
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline centered margin-top-0">
                    <strong class="headline-with-separator">Popular Categories</strong>
                </h3>
            </div>

            <div class="col-md-12">
                <div class="categorxies-boxes-container-alt margin-top-5 margin-bottom-30">

                    @foreach ($bcat as $item)
                        <!-- Box -->
                        <a href="{{route('singcat')}}/{{$item->slug}}" class="category-small-box-alt">
                            <img class="image" src="{{asset('business/icons')}}/{{$item->icon}}" alt="" style="width: 50px;">

                            <h4>{{$item->name}}</h4>

                            <img class="back-image" src="{{asset('business/businesscategory')}}/{{$item->image}}">
                        </a>
                    @endforeach




                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- Category Boxes / End -->

    </div>


    <!-- Listings -->
    <div class="container margin-top-70">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline centered margin-bottom-45">
                    <strong class="headline-with-separator">Featured Listings</strong>
                    <span>Discover Top-Rated Local Businesses</span>
                </h3>
            </div>

            <div class="col-md-12">
                <div class="simple-slick-carousel dots-nav">

                    @foreach ($business as $item)
                                    <!-- Listing Item -->
                <div class="carousel-item">
                    <a href="{{route('business.single')}}/{{$item->slug}}" class="listing-item-container">
                        <div class="listing-item">
                            <img src="{{asset('business/feature')}}/{{$item->featureImage}}" alt="">



                            <div class="listing-item-content">

                                <h3>{{$item->name}}</h3>
                                <span>{{$item->address}}</span>
                            </div>
                            <span class="like-icon"></span>
                        </div>

                    </a>
                </div>
                <!-- Listing Item / End -->
                    @endforeach


                </div>

            </div>

        </div>
    </div>
    <!-- Listings / End -->


    <section class="fullwidth taxonomy-gallery-container margin-top-70 padding-top-75 padding-bottom-70" data-background-color="#f9f9f9">

        <!-- Info Section -->
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <!-- Infobox -->
                    <div class="taxonomy-gallery-text">
                        <h2>Find Your Ultimate <br> Local Weekend</h2>
                        <p>A curated collection of stays and experiences to inspire your next trip.</p>
                        <a href="listings-list-with-sidebar.html" class="button margin-top-25">Discover Places</a>
                    </div>
                    <!-- Infobox / End -->

                </div>
            </div>
        </div>
        <!-- Info Section / End -->

        <div class="gallery-wrap">
            @foreach ($states as $item)
            <a href="{{route('cities')}}/{{$item->name}}" class="item">
                <h3>{{$item->name}} <span>{{$item->cities_count}} Cities</span></h3>
                <img src="{{asset('/business/states')}}/{{$item->image}}" alt="">
            </a>
            @endforeach

            {{-- <a href="#" class="item">
                <h3>Los Angeles <span>2 listings</span></h3>
                <img src="{{asset('assets/images/popular-location-02.jpg')}}" alt="">
            </a>

            <a href="#" class="item">
                <h3>San Francisco <span>4 listings</span></h3>
                <img src="{{asset('assets/images/popular-location-03.jpg')}}" alt="">
            </a>

            <a href="#" class="item">
                <h3>Miami <span>6 listings</span></h3>
                <img src="{{asset('assets/images/popular-location-04.jpg')}}" alt="">
            </a> --}}
        </div>


    </section>


    <div class="container margin-top-80">
        <div class="row">
            <div class="col-md-12">
                <h3 class="headline margin-top-0 margin-bottom-40">
                    <strong class="headline-with-separator">How It Works?</strong>
                </h3>
            </div>
            <div class="col-md-5">
                <a href="#" class="icon-box-v3">
                    <div class="ibv3-icon">
                        <i class="im im-icon-Add-User"></i>
                    </div>
                    <div class="ibv3-content">
                        <h4>Creata an Account</h4>
                        <p>Integer dapibus purus sit amet metus scelerisque hendrerit non a urna</p>
                    </div>
                </a>
                <a href="#" class="icon-box-v3">
                    <div class="ibv3-icon">
                        <i class="im im-icon-Add-File"></i>
                    </div>
                    <div class="ibv3-content">
                        <h4>Add Listings</h4>
                        <p>Phasellus id nulla id tortor laoreet tempor et non risus class aptent taciti</p>
                    </div>
                </a>
                <a href="#" class="icon-box-v3">
                    <div class="ibv3-icon">
                        <i class="im im-icon-Queen"></i>
                    </div>
                    <div class="ibv3-content">
                        <h4>Get Exposure</h4>
                        <p>Vestibulum pretium massa in bibendum nam mollis quam et feugiat consectetur</p>
                    </div>
                </a>
            </div>
            <div class="col-md-7">
                <div class="svg-alignment">
                    <img src="{{asset('assets/images/image_placeholder.svg')}}" style="width: 60%;" alt="">
                </div>
            </div>
        </div>
    </div>


    <section class="fullwidth border-top padding-bottom-80 padding-top-80 margin-top-80" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="boxed-photo-banner">
                        <!-- Infobox -->
                        <div class="boxed-photo-banner-text">
                            <h2>Join Our Community</h2>
                            <p>Earn extra income and unlock new opportunities by advertising your business</p>
                            <a href="listings-list-with-sidebar.html" class="button margin-top-25">Become a Host</a>
                        </div>
                        <!-- Infobox / End -->
                        <img src="{{asset('assets/images/slider-bg-02.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
