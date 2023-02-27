@extends('layouts.master')
@section('front')


<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Category</h2><span>{{$category->name}}</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Category</a></li>
						<li>{{$category->name}}</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row">



		<div class="col-md-12">

			<!-- Sorting - Filtering Section -->
			<div class="row margin-bottom-25 margin-top-30">



			</div>
			<!-- Sorting - Filtering Section / End -->

			<div class="row">


                @foreach ($category->businesses as $item)
                <!-- Listing item -->
                <div class="col-lg-12 col-md-12">
					<div class="listing-item-container list-layout">
						<a href="{{route('business.single')}}/{{$item->slug}}" class="listing-item">

							<!-- Image -->
							<div class="listing-item-image">
								<img src="{{asset('business/logo')}}/{{$item->logo}}" alt="">
                                <span class="tag">
                                @foreach ($item->cat as $list)
                                <span >{{$list->name}},</span>
                                @endforeach
                                </span>

							</div>

							<!-- Content -->
							<div class="listing-item-content">
								<div class="listing-badge now-open">Now Open</div>

								<div class="listing-item-inner">
									<h3>{{$item->name}} <i class="verified-icon"></i></h3>
									<span>{{$item->address}}</span>

								</div>

								<span class="like-icon"></span>
							</div>
						</a>
					</div>
				</div>
				<!-- Listing item / End -->
                @endforeach



			</div>



		</div>

	</div>
</div>


@endsection
