@extends('layouts.master')
@section('front')




<!-- ============================ Main Section Start ================================== -->
<section class="gray py-5">
    <div class="container">
        <div class="row">

            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                <div class="bg-white rounded mb-4">

                    <div class="sidebar_header d-flex align-items-center justify-content-between px-4 py-3 br-bottom">
                        <h4 class="ft-medium fs-lg mb-0">Search Filter</h4>
                        <div class="ssh-header">
                            <a href="javascript:void(0);" class="clear_all ft-medium text-muted">Clear All</a>
                            <a href="#search_open" data-bs-toggle="collapse" aria-expanded="false" role="button" class="collapsed _filter-ico ml-2"><i class="lni lni-text-align-right"></i></a>
                        </div>
                    </div>

                    <!-- Find New Property -->
                    <div class="sidebar-widgets collapse miz_show" id="search_open" data-bs-parent="#search_open">
                        <div class="search-inner">

                            <div class="side-filter-box">
                                <div class="side-filter-box-body">

                                    <!-- Price Range -->
                                    {{-- <div class="inner_widget_link">
                                          <div class="btn-group d-flex justify-content-around price-btn-457">
                                            <button type="button" class="btn">$</button>
                                            <button type="button" class="btn">$$</button>
                                            <button type="button" class="btn active d14ixh">$$$</button>
                                            <button type="button" class="btn">$$$$</button>
                                          </div>
                                    </div> --}}

                                    <!-- Suggested -->
                                    <div class="inner_widget_link">
                                        <h6 class="ft-medium">Category</h6>
                                        <ul class="no-ul-list filter-list">
                                            @php
                                                $j = 1;
                                            @endphp
                                        @foreach ($businessCategory as $item)
                                            <li>
                                                <input id="a{{$j}}" class="checkbox-custom" name="open" type="checkbox">
                                                <label for="a{{$j}}" class="checkbox-custom-label">{{$item->name}}</label>
                                            </li>
                                        @php
                                            $j++;
                                        @endphp
                                        @endforeach

                                        </ul>
                                    </div>

                                    <!-- Features -->
                                    <div class="inner_widget_link">
                                        <h6 class="ft-medium">Areas</h6>
                                        <ul class="no-ul-list filter-list">
                                         @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($areas as $item)
                                            <li>
                                                <input id="b{{$i}}" class="checkbox-custom" name="Kids" type="checkbox" >
                                                <label for="b{{$i}}" class="checkbox-custom-label">{{$item->area}}</label>
                                            </li>
                                            @php
                                            $i++;
                                            @endphp
                                        @endforeach
                                        </ul>
                                    </div>

                                    {{-- <!-- Neighborhoods -->
                                    <div class="inner_widget_link">
                                        <h6 class="ft-medium">Neighborhoods</h6>
                                        <ul class="no-ul-list filter-list">
                                            <li>
                                                <input id="b1" class="checkbox-custom" name="Alta" type="checkbox" checked="">
                                                <label for="b1" class="checkbox-custom-label">Alta Vista</label>
                                            </li>
                                            <li>
                                                <input id="b2" class="checkbox-custom" name="Monticello" type="checkbox">
                                                <label for="b2" class="checkbox-custom-label">Monticello Park</label>
                                            </li>
                                            <li>
                                                <input id="b3" class="checkbox-custom" name="Beacon" type="checkbox">
                                                <label for="b3" class="checkbox-custom-label">Beacon Hill</label>
                                            </li>
                                            <li>
                                                <input id="b4" class="checkbox-custom" name="Near" type="checkbox">
                                                <label for="b4" class="checkbox-custom-label">Near Northwest</label>
                                            </li>
                                            <li>
                                                <input id="b5" class="checkbox-custom" name="North" type="checkbox">
                                                <label for="b5" class="checkbox-custom-label">North Central</label>
                                            </li>
                                            <li>
                                                <input id="b6" class="checkbox-custom" name="Northwest1" type="checkbox">
                                                <label for="b6" class="checkbox-custom-label">Northwest</label>
                                            </li>
                                            <li>
                                                <input id="b7" class="checkbox-custom" name="Pecan" type="checkbox">
                                                <label for="b7" class="checkbox-custom-label">Pecan Valley</label>
                                            </li>
                                            <li>
                                                <input id="b8" class="checkbox-custom" name="Prospect" type="checkbox">
                                                <label for="b8" class="checkbox-custom-label">Prospect Hill</label>
                                            </li>
                                            <li>
                                                <input id="b9" class="checkbox-custom" name="South" type="checkbox">
                                                <label for="b9" class="checkbox-custom-label">South Central</label>
                                            </li>
                                            <li>
                                                <a class="ft-bold d14ixh" href="javascript:void(0);">See More</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Bird's-eye View -->
                                    <div class="inner_widget_link">
                                        <h6 class="ft-medium">Bird's-eye View</h6>
                                        <ul class="no-ul-list filter-list">
                                            <li>
                                                <input id="c1" class="checkbox-custom" name="blc" type="checkbox" checked="">
                                                <label for="c1" class="checkbox-custom-label">Within 4 blocks</label>
                                            </li>
                                            <li>
                                                <input id="c2" class="checkbox-custom" name="1km" type="checkbox">
                                                <label for="c2" class="checkbox-custom-label">Walking (1 mi.)</label>
                                            </li>
                                            <li>
                                                <input id="c3" class="checkbox-custom" name="2km" type="checkbox">
                                                <label for="c3" class="checkbox-custom-label">Biking (2 mi.)</label>
                                            </li>
                                            <li>
                                                <input id="c4" class="checkbox-custom" name="5km" type="checkbox">
                                                <label for="c4" class="checkbox-custom-label">Driving (5 mi.)</label>
                                            </li>
                                            <li>
                                                <input id="c5" class="checkbox-custom" name="10km" type="checkbox">
                                                <label for="c5" class="checkbox-custom-label">Driving (10 mi.)</label>
                                            </li>
                                        </ul>
                                    </div> --}}

                                    <div class="form-group filter_button">
                                        <button type="submit" class="btn theme-bg text-light rounded full-width">22 Results Show</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Sidebar End -->

            </div>

            <!-- Item Wrap Start -->
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">

                <!-- row -->
                <div class="row justify-content-center gx-3">
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
                            </div>
                            <div class="Goodup-grid-fl-wrap">
                                <div class="Goodup-caption px-3 py-2">
                                    <div class="Goodup-author"><a href="{{route('business.single')}}/{{$item->slug}}"><img
                                                src="{{asset('business/logo')}}/{{$item->logo}}" class="img-fluid circle" alt=""></a></div>
                                    <h4 class="mb-0 ft-medium medium"><a href="{{route('business.single')}}/{{$item->slug}}"
                                            class="text-dark fs-md">{{$item->name}}</a></h4>
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
                                            <div class="Goodup-bookmark-btn"><a href="tel:{{$item->phone}}"><i
                                                        class="lni lni-phone position-absolute"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                </div>
                <!-- /row -->

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
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

        </div>
    </div>
</section>
<!-- ============================ Main Section End ================================== -->

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
