@extends('layouts.app')
@section('content')

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>My Listings</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>My Listings</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>



        {{-- Model --}}



        {{-- End-Model --}}



		<div class="row">

			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>Active Listings</h4>
					<ul>
                        @foreach ($business as $item)
                            <li>
                                <div class="list-box-listing">
                                    <div class="list-box-listing-img"><a href="{{route('business.single')}}/{{$item->slug}}"><img src="{{asset('business/logo')}}/{{$item->logo}}" alt=""></a></div>
                                    <div class="list-box-listing-content">
                                        <div class="inner">
                                            <h3><a href="{{route('business.single')}}/{{$item->slug}}">{{$item->name}}</a></h3>
                                            <span>{{$item->address}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons-to-right">
                                    <a href="{{route('business.edit')}}/{{$item->id}}" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
                                    <a onclick="return confirm('Are you sure? ');"  href="{{route('business.delete')}}/{{$item->id}}" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
                                </div>
                            </li>
                        @endforeach



					</ul>
				</div>

			</div>
            <div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 clearfix text-center py-md-5 pagination" style="padding: 15px 0; margin-top: 30px;">
					<!-- Pagination -->
                    {{$business->links()}}

				</div>
			</div>


			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© 2023 FTS. All Rights Reserved.</div>
			</div>
		</div>


@endsection
