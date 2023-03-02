@extends('layouts.master')
@section('front')


<!-- ============================ Main Section Start ================================== -->
<section class="gray py-5">
    <div class="container">
        <div class="row">

            <!-- Item Wrap Start -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                <!-- row -->
                <div class="row justify-content-center g-2">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Category</a></li>
                                {{-- <li class="breadcrumb-item active" aria-current="page">Restaurants</li> --}}
                            </ol>
                        </nav>
                        <div class="">
                            <h2 class="ft-bold">{!! $category->name !!}</h2>

                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <div class="d-block grouping-listings">
                            <div class="d-block grouping-listings-title">
                                <h5 class="ft-medium mb-3">Sponsored Results</h5>
                            </div>
                            @if ($category->businesses->count() > 0)
                                @foreach ($category->businesses as $item)
                                <!-- Single Item -->
                                <div class="grouping-listings-single">
                                    <div class="vrt-list-wrap">

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="vrt-list-thumb">
                                                        <div class="vrt-list-thumb-figure" style="height: 220px; width: 600px;">
                                                            <a href="{{route('business.single')}}/{{$item->slug}}"><img src="{{asset('business/feature')}}/{{$item->featureImage}}" class="img-fluid" alt="" /></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 py-3">
                                                    <div class="vrt-list-content">
                                                        <h4 class="mb-0 ft-medium"><a href="{{route('business.single')}}/{{$item->slug}}" class="text-dark fs-md">{{$item->name}}<span class="verified-badge"><i class="fas fa-check-circle"></i></span></a></h4>
                                                        <div class="vrt-list-features mt-2 mb-2">
                                                            <ul>
                                                                @foreach ($item->cat as $list)
                                                                <li><a href="javascript:void(0);">{{$list->name}}</a></li>
                                                                @endforeach

                                                            </ul>
                                                        </div>
                                                        {{-- <div class="vrt-list-sts">
                                                            <p class="vrt-qgunke"><span class="ft-bold d14ixh">Closed</span> until 5:00 PM</p>
                                                        </div> --}}

                                                        <div class="vrt-list-desc">
                                                            <p class="vrt-qgunke">{{Str::limit($item->description , 100)}}</p>
                                                        </div>

                                                        <div class="vrt-list-amenties py-2">
                                                            <i class="fas fa-map" style="color: #F41B3B"></i>&nbsp;&nbsp;<span>{{$item->address}}</span><br>
                                                        </div>
                                                        <div class="vrt-list-amenties">
                                                            <i class="fas fa-phone" style="color: #F41B3B"></i>&nbsp;&nbsp;<span>{{$item->phone}}</span><br>
                                                        </div>
                                                        <div class="vrt-list-amenties py-2">
                                                            <i class="fas fa-envelope" style="color: #F41B3B"></i>&nbsp;&nbsp;<span>{{$item->email}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="grouping-listings-single">
                                    <h2>No Data</h2>
                                </div>
                            @endif


                        </div>
                    </div>

                </div>
                <!-- row -->

            </div>

        </div>
    </div>
</section>
<!-- ============================ Main Section End ================================== -->


@endsection
