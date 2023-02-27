@extends('layouts.master')
@section('front')


<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>{{$state->name}}</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>{{$state->name}}</li>
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
			<div class="col-md-12 ">

			<!-- Filters -->



				<div id="filters">
					<ul  class="option-set margin-bottom-30" >
                        <li><a href="" class="new selected" data-filter="*">All</a></li>
                        @foreach ($cities as $item)
                        @php
                            $i = 1;
                        @endphp
                        <li class="{{$item->area}}"  id="cities_{{$i++}}"><a href="#" class="new" >{{$item->area}}</a></li>
                        @endforeach
					</ul>
					<div class="clearfix"></div>
				</div>

			</div>
		</div>

	<div class="row" style="padding-bottom: 100px;">

		<!-- Projects -->
		<div class="projects isotope-wrapper" id="mainajax"  >

            @foreach ($business as $item)
            <!-- Listing Item -->
				<div class="col-lg-4 col-md-6 isotope-item first-filter">
					<a href="{{route('business.single')}}/{{$item->slug}}" class="listing-item-container compact">
						<div class="listing-item">
							<img src="{{asset('business/feature')}}/{{$item->featureImage}}" alt="">

							<div class="listing-badge now-open">Now Open</div>

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
        <div class="row">
            <div class="col-md-12 clearfix text-center py-md-5" style="padding: 15px 0">
                <!-- Pagination -->
                {{$business->links()}}

            </div>
        </div>

	</div>
</div>


@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
    $(".new").click(function () {
        $(".new").removeClass("selected");
        $(this).addClass("selected");
    });
});
</script>
<script>
    $(document).ready(function(){

        $('[id^="cities_"]').click(function(){
            var city = $(this).attr("class");
            // alert(city);
            $.ajax({
                url: "{{route('cities')}}/{{$state->name}}",
                type: "GET",
                data:{'city': city},
                success: function(data){
                   var business = data.business;
                   var html = '';
                   if(business.length > 0){
                    for(let i = 0; i < business.length; i++){
                        html += '<div class="col-lg-4 col-md-6 isotope-item first-filter">\
					<a href="{{route('business.single')}}/'+business[i]['slug']+'" class="listing-item-container compact">\
						<div class="listing-item">\
							<img src="{{asset('business/feature')}}/'+business[i]['featureImage']+'" alt="">\
							<div class="listing-badge now-open">Now Open</div>\
							<div class="listing-item-content">\
								<h3>'+business[i]['name']+'</h3>\
								<span>'+business[i]['address']+'</span>\
							</div>\
							<span class="like-icon"></span>\
						</div>\
					</a>\
				</div>'
                    }
                   }
                   else{
                    html += '<h2>No Data Found</h2>'
                   }

                   $("#mainajax").html(html);

                }

            });
        });
    });
</script>
{{-- <script>
	$(window).load(function(){
	  var $container = $('.isotope-wrapper');
	  $container.isotope({ itemSelector: '.isotope-item', layoutMode: 'masonry' });
	});

	$('#filters a').click(function(e){
	  e.preventDefault();

	  var selector = $(this).attr('data-filter');
	  $('.projects.isotope-wrapper').isotope({ filter: selector });

	  $(this).parents('ul').find('a').removeClass('selected');
	  $(this).addClass('selected');
	});
</script> --}}
@endsection
