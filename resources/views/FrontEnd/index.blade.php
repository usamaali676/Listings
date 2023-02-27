@extends('layouts.master')
@section('front')

<div class="home-banner margin-bottom-0" style="background:#f41b3b url(asset/img/banner-6.jpg) no-repeat;" data-overlay="5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-11 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="banner_caption text-center mb-5">
                    <h1 class="banner_title ft-bold mb-1">Find Great Place in Your Areas</h1>
                    <p class="fs-md ft-medium">Explore wonderful place to stay, salon, shoping, massage or visit local areas.</p>
                </div>

                <div class="Goodup-top-cates">
                    <ul>
                        @foreach ($famcat as $list)
                        <li><a href="half-map-search-2.html" class="Goodup-top-cat-box"><div class="Goodup-tp-ico"><i class="{{$list->icon}}"></i></div><div class="Goodup-tp-title"><h5>{{$list->name}}</h5></div></a></li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- ======================= Home Banner ======================== -->

<!-- ======================= Home Search ======================== -->
<section class="p-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-11 col-lg-12 col-md-12 col-12">

                <div class="Goodup-search-shadow">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="placesseach" role="tabpanel" aria-labelledby="placesseach-tab">
                            <form action="{{route('search')}}" method="GET" class="main-search-wrap fl-wrap">
                                <div class="main-search-item">
                                    <span class="search-tag"><i class="lni lni-keyboard"></i></span>
                                    <input type="text" name="search" class="form-control radius" placeholder="What are you looking for?" />
                                </div>
                                <div class="main-search-item">
                                    <span class="search-tag"><i class="lni lni-map-marker"></i></span>
                                    <input type="text" name="location" class="form-control" placeholder="Location" />
                                </div>
                                <div class="main-search-item">
                                    <span class="search-tag"><i class="lni lni-briefcase"></i></span>
                                    <select class="form-control" name="category">
                                        <option value="">Choose Category</option>
                                        @foreach ($bcat as $cat)
                                            <option value="{{$cat->name}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="main-search-button">
                                    <button  type="submit" class="btn full-width theme-bg text-white" type="button">Search</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ======================= Home Search End ======================== -->

<!-- ======================= All Types Listing ======================== -->
<section class="space min">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center mb-5">
                    <h6 class="theme-cl mb-0">Featured Listings</h6>
                    <h2 class="ft-bold">Goodup in Los Angeles</h2>
                </div>
            </div>
        </div>

        <!-- row -->
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="tab-content" id="myTabsContent">

                    <!-- Places -->
                    <div class="tab-pane fade show active" id="places" role="tabpanel" aria-labelledby="places-tab">
                        <div class="row justify-content-center">
                            @foreach ($business as $item)
                                <!-- Single -->
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="Goodup-grid-wrap">
                                        <div class="Goodup-grid-upper">
                                            <div class="Goodup-pos ab-left">
                                                @foreach ($item->cat as $list)
                                                <div class="Goodup-featured-tag">{{$list->name}}</div>
                                                @endforeach

                                            </div>
                                            <div class="Goodup-grid-thumb">
                                                <a href="{{route('business.single')}}/{{$item->slug}}" class="d-block text-center m-auto"><img
                                                        src="{{asset('business/feature')}}/{{$item->featureImage}}" class="img-fluid" alt=""></a>
                                            </div>
                                            {{-- <div class="Goodup-rating overlay">
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
                                            </div> --}}
                                        </div>
                                        <div class="Goodup-grid-fl-wrap">
                                            <div class="Goodup-caption px-3 py-2">
                                                <div class="Goodup-author"><a href="{{route('business.single')}}/{{$item->slug}}"><img src="{{asset('business/logo')}}/{{$item->logo}}"
                                                            class="img-fluid circle" alt=""></a></div>
                                                <h4 class="mb-0 ft-medium medium"><a href="{{route('business.single')}}/{{$item->slug}}" class="text-dark fs-md">{{$item->name}}</a></h4>
                                                <div class="Goodup-location"><i class="fas fa-map-marker-alt me-1 theme-cl"></i>{{$item->address}}</div>
                                                <div class="Goodup-middle-caption mt-3">
                                                    <p>{{Str::limit($item->description, 50)}}</p>
                                                </div>
                                            </div>
                                            <div class="Goodup-grid-footer py-2 px-3">
                                                <div class="Goodup-ft-last">
                                                    <div class="Goodup-inline">
                                                        <div class="Goodup-bookmark-btn"><a href="mailto:{{$item->email}}"><i
                                                                    class="lni lni-envelope position-absolute"></i></a></div>
                                                        <div class="Goodup-bookmark-btn"><a href="tel:{{$item->phone}}" ><i
                                                                    class="lni lni-phone position-absolute"></i></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <!-- /Places -->

                </div>
            </div>

        </div>
        <!-- /row -->

    </div>
</section>
<!-- ======================= All Types Listing ======================== -->

<!-- ======================= Listing Categories ======================== -->
<section class="space min gray">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center mb-5">
                    <h6 class="mb-0 theme-cl">Popular Categories</h6>
                    <h2 class="ft-bold">Browse Top Categories</h2>
                </div>
            </div>
        </div>

        <!-- row -->
        <div class="row align-items-center">
            @foreach ($bcat as $item)
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="cats-wrap text-center">
                    <a href="listing-search-v1.html" class="Goodup-catg-wrap">
                        <div class="Goodup-catg-city">{{$item->businesses_count}} Listings</div>
                        <div class="Goodup-catg-icon"><i class="{{$item->icon}}"></i></div>
                        <div class="Goodup-catg-caption">
                            <h4 class="fs-md mb-0 ft-medium m-catrio">{{$item->name}}</h4>
                            {{-- <span class="text-muted">607 Listings</span> --}}
                        </div>
                    </a>
                </div>
            </div>
            @endforeach



        </div>
        <!-- row -->

    </div>
</section>
<!-- ======================= Listing Categories End ======================== -->

<!-- ======================= About Start ============================ -->
<section class="space">
    <div class="container">

        <div class="row align-items-center justify-content-between">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="m-spaced">
                    <div class="position-relative">
                        <div class="mb-2"><span class="bg-light-sky text-sky px-2 py-1 rounded">Our Mission</span></div>
                        <h2 class="ft-bold mb-3">Claim Your Business & <br>Get Started Today!</h2>
                        <p class="mb-2">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        <p class="mb-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. </p>
                    </div>
                    <div class="position-relative row">
                        <div class="col-lg-4 col-md-4 col-4">
                            <h3 class="ft-bold text-sky mb-0"><span class="count">07</span>+</h3>
                            <p class="ft-medium">Business Listing</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-4">
                            <h3 class="ft-bold text-warning mb-0"><span class="count">06</span>k+</h3>
                            <p class="ft-medium">Popular Authors</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-4">
                            <h3 class="ft-bold text-danger mb-0"><span class="count">200</span>+</h3>
                            <p class="ft-medium">Countries</p>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12 mt-3">
                            <a href="javascript:void(0);" class="btn btn-md theme-bg-light rounded theme-cl hover-theme">See Details<i class="lni lni-arrow-right-circle ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                <div class="position-relative">
                    <img src="{{asset('asset/img/bn-5.png')}}" class="img-fluid" alt="" />
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ======================= About Start ============================ -->

<!-- ======================= About Start ============================ -->
<section class="space pt-0">
    <div class="container">

        <div class="row align-items-center justify-content-between">

            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                <div class="position-relative">
                    <img src="{{asset('asset/img/bn-4.png')}}" class="img-fluid" alt="" />
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="m-spaced">
                    <div class="position-relative">
                        <div class="mb-1"><span class="bg-light-success text-success px-2 py-1 rounded">Process</span></div>
                        <h2 class="ft-bold mb-3">How it works & features <br>Around The Globe</h2>
                        <p class="mb-3">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                    <div class="uli-list-features">
                        <ul>

                            <li>
                                <div class="list-uiyt">
                                    <div class="list-iobk"><i class="fas fa-globe"></i></div>
                                    <div class="list-uiyt-capt">
                                        <h5>Find Businesses</h5>
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.</p>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="list-uiyt">
                                    <div class="list-iobk"><i class="fas fa-envelope"></i></div>
                                    <div class="list-uiyt-capt">
                                        <h5>Review Listings</h5>
                                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.</p>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="list-uiyt">
                                    <div class="list-iobk"><i class="fas fa-phone"></i></div>
                                    <div class="list-uiyt-capt">
                                        <h5>Make a Reservation</h5>
                                        <p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- ======================= About Start ============================ -->

<!-- ============================ Pricing Start ==================================== -->
<section class="space min gray">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-7 col-md-9 col-sm-12">
                <div class="sec_title position-relative text-center mb-5">
                    <h6 class="theme-cl mb-0">Our Pricing</h6>
                    <h2 class="ft-bold">Choose Your Package</h2>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="Goodup-price-wrap">
                    <div class="Goodup-author-header">
                        <div class="Goodup-price-currency">
                            <h3><span class="Goodup-new-price">$<del>49</del></span><span class="Goodup-old-price">$<del>149</del></span></h3>
                        </div>
                        <div class="Goodup-price-title">
                            <div class="Goodup-price-tlt"><h4>Personal</h4></div><div class="Goodup-price-ribbon"><span class="Goodup-ribbon-offer all">50% Off</span></div>
                        </div>
                        <div class="Goodup-price-subtitle">Best Choice for Individuals </div>
                    </div>
                    <div class="Goodup-price-body">
                        <ul class="price__features">
                            <li><i class="fa fa-angle-right"></i>Lifetime Bandwidth Usage</li>
                            <li><i class="fa fa-angle-right"></i>6 Months Support &amp; Updates</li>
                            <li><i class="fa fa-angle-right"></i>10 Website License</li>
                            <li><i class="fa fa-angle-right"></i>Quickstart Included</li>
                            <li><i class="fa fa-angle-right"></i>Access to Plugins &amp; Theme</li>
                            <li><i class="fa fa-angle-right"></i>Branding/Copyright Removal</li>
                        </ul>
                    </div>
                    <div class="Goodup-price-bottom">
                        <a class="Goodup-price-btn" href="#"><i class="fas fa-shopping-basket"></i> Purchase Now</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="Goodup-price-wrap">
                    <div class="Goodup-author-header">
                        <div class="Goodup-price-currency">
                            <h3><span class="Goodup-new-price theme-cl">$<del>129</del></span><span class="Goodup-old-price">$<del>199</del></span></h3>
                        </div>
                        <div class="Goodup-price-title">
                            <div class="Goodup-price-tlt"><h4>Platinum</h4></div><div class="Goodup-price-ribbon"><span class="Goodup-ribbon-offer">50% Off</span></div>
                        </div>
                        <div class="Goodup-price-subtitle">Best Choice for Individuals </div>
                    </div>
                    <div class="Goodup-price-body">
                        <ul class="price__features">
                            <li><i class="fa fa-angle-right"></i>Lifetime Bandwidth Usage</li>
                            <li><i class="fa fa-angle-right"></i>12 Months Support &amp; Updates</li>
                            <li><i class="fa fa-angle-right"></i>20 Website License</li>
                            <li><i class="fa fa-angle-right"></i>Quickstart Included</li>
                            <li><i class="fa fa-angle-right"></i>Access to Plugins &amp; Theme</li>
                            <li><i class="fa fa-angle-right"></i>Branding/Copyright Removal</li>
                        </ul>
                    </div>
                    <div class="Goodup-price-bottom">
                        <a class="Goodup-price-btn active" href="#"><i class="fas fa-shopping-basket"></i> Purchase Now</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="Goodup-price-wrap">
                    <div class="Goodup-author-header">
                        <div class="Goodup-price-currency">
                            <h3><span class="Goodup-new-price">$<del>149</del></span><span class="Goodup-old-price">$<del>249</del></span></h3>
                        </div>
                        <div class="Goodup-price-title">
                            <div class="Goodup-price-tlt"><h4>Standard</h4></div><div class="Goodup-price-ribbon"><span class="Goodup-ribbon-offer all">50% Off</span></div>
                        </div>
                        <div class="Goodup-price-subtitle">Best Choice for Individuals </div>
                    </div>
                    <div class="Goodup-price-body">
                        <ul class="price__features">
                            <li><i class="fa fa-angle-right"></i>Lifetime Bandwidth Usage</li>
                            <li><i class="fa fa-angle-right"></i>Lifetime Support &amp; Updates</li>
                            <li><i class="fa fa-angle-right"></i>50 Website License</li>
                            <li><i class="fa fa-angle-right"></i>Quickstart Included</li>
                            <li><i class="fa fa-angle-right"></i>Access to Plugins &amp; Theme</li>
                            <li><i class="fa fa-angle-right"></i>Branding/Copyright Removal</li>
                        </ul>
                    </div>
                    <div class="Goodup-price-bottom">
                        <a class="Goodup-price-btn" href="#"><i class="fas fa-shopping-basket"></i> Purchase Now</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- ============================ Pricing End ==================================== -->


<!-- ======================= Newsletter Start ============================ -->
<section class="space bg-cover" style="background:#03343b url(assets/img/landing-bg.png) no-repeat;">
    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center mb-5">
                    <h6 class="text-light mb-0">Subscribr Now</h6>
                    <h2 class="ft-bold text-light">Get All Updates & Advance Offers</h2>
                </div>
            </div>
        </div>

        <div class="row align-items-center justify-content-center">
            <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12 col-12">
                <form class="bg-white rounded p-1">
                    <div class="row no-gutters">
                        <div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-8">
                            <div class="form-group mb-0 position-relative">
                                <input type="text" class="form-control b-0" placeholder="Enter Your Email Address">
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4">
                            <div class="form-group mb-0 position-relative">
                                <button class="btn full-width btn-height theme-bg text-light fs-md" type="button">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
<!-- ======================= Newsletter Start ============================ -->


@endsection
