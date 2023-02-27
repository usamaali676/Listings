@extends('layouts.app')
@section('content')

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Add Listing</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Add Listing</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
                <form action="{{route('business.update')}}/{{$business->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger" style="color: red">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <div id="add-listing">

                        <!-- Section -->
                        <div class="add-listing-section">

                                    <!-- Headline -->
                                    <div class="add-listing-headline">
                                        <h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
                                    </div>
                                        <!-- Title -->
                                        <div class="row with-forms">
                                            <div class="col-md-6">
                                                <h5>Listing Title <i class="tip" data-tip-content="Name of your business"></i></h5>
                                                <input class="search-field" type="text" name="name" value="{{$business->name}}"/>
                                            </div>
                                            <div class="col-md-6">
                                                <h5>Listing Slug </h5>
                                                <input class="search-field" type="text" name="slug" value="{{$business->slug}}"/>
                                            </div>
                                        </div>

                                        <!-- Row -->
                                        <div class="row with-forms">

                                            <!-- Status -->
                                            <div class="col-md-6 " >
                                                <h5>Business Category</h5>
                                                <select  name="cat_id[]" class="selectpicker chosen-select-no-single" data-style="btn btn-success btn-round" data-live-search="true"  multiple>

                                                    @if ($category!=null)
                                                    @foreach ($category as $item)
                                                    <option value="{{ $item->id }}" selected >{{ $item->name }}</option>
                                                    @endforeach
                                                    @else
                                                    <option value="">Please Select</option>
                                                    @endif
                                                    @foreach ($bcat as $list)
                                                        <option value="{{ $list->id }}">{{ $list->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <h5>Logo</h5>
                                                <div class="uploadButton margin-top-15 text-center">
                                                    <input type="file" name="logo" accept="image/*, application/pdf" id="upload">
                                                </div>
                                            </div>


                                        </div>
                                        <!-- Row / End -->

                                    </div>
                                    <!-- Section / End -->

                                    <!-- Section -->
                                    <div class="add-listing-section margin-top-45">

                                        <!-- Headline -->
                                        <div class="add-listing-headline">
                                            <h3><i class="sl sl-icon-location"></i> Location</h3>
                                        </div>

                                        <div class="submit-section">

                                            <!-- Row -->
                                            <div class="row with-forms">



                                                <!-- Address -->
                                                <div class="col-md-12">
                                                    <h5>Address</h5>
                                                    <input type="text" placeholder="" name="address" value="{{$business->address}}">
                                                </div>
                                                <div class="col-md-12">
                                                    <h5>Map</h5>
                                                    <input type="text" placeholder="" name="map" value="{{$business->map}}">
                                                </div>



                                            </div>
                                            <!-- Row / End -->

                                        </div>
                                    </div>
                                    <!-- Section / End -->


                                    <!-- Section -->
                                    <div class="add-listing-section margin-top-45">

                                        <!-- Headline -->
                                        <div class="add-listing-headline">
                                            <h3><i class="sl sl-icon-picture"></i> Gallery</h3>
                                        </div>

                                        <!-- Dropzone -->
                                        @php
                                            $img = $business->gallery;
                                        @endphp
                                        <div class="submit-section">

                                            @foreach ($img as $list)
                                            <img src="{{asset('business/gallery_images')}}/{{$list->images}}" alt="" style="width: 150px; height: 150px;">
                                            <input type="hidden" name="img_id[]" value="{{$list->id}}">
                                             @endforeach


                                            <input type="file"  name="images[]" multiple>

                                        </div>

                                    </div>
                                    <!-- Section / End -->


                                    <!-- Section -->
                                    <div class="add-listing-section margin-top-45">

                                        <!-- Headline -->
                                        <div class="add-listing-headline">
                                            <h3><i class="sl sl-icon-docs"></i> Details</h3>
                                        </div>

                                        <!-- Description -->
                                        <div class="form">
                                            <h5>Description</h5>
                                            <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true">{{$business->description}}</textarea>
                                        </div>

                                        <!-- Row -->
                                        <div class="row with-forms">

                                            <!-- Phone -->
                                            <div class="col-md-4">
                                                <h5>Phone </h5>
                                                <input type="text" name="phone" value="{{$business->phone}}">
                                            </div>

                                            <!-- Website -->
                                            <div class="col-md-4">
                                                <h5>Website <span>(optional)</span></h5>
                                                <input type="text" name="website" value="{{$business->website}}">
                                            </div>

                                            <!-- Email Address -->
                                            <div class="col-md-4">
                                                <h5>E-mail </h5>
                                                <input type="text" name="email" value="{{$business->email}}">
                                            </div>

                                        </div>
                                        <!-- Row / End -->
                                                                <!-- Row -->
                                        <div class="row with-forms">

                                            <!-- Phone -->
                                            <div class="col-md-4">
                                                <h5>SMS No. <span>(optional)</span></h5>
                                                <input type="text"  name="sms" value="{{$business->sms}}">
                                            </div>

                                            <!-- Website -->
                                            <div class="col-md-4">
                                                <h5>Gmb <span>(optional)</span></h5>
                                                <input type="text" name="gmb" value="{{$business->gmb}}">
                                            </div>

                                            <!-- Email Address -->
                                            <div class="col-md-4">
                                                <h5>Whatsapp <span>(optional)</span></h5>
                                                <input type="text" name="whatsapp" value="{{$business->whatsapp}}">
                                            </div>

                                        </div>
                                        <!-- Row / End -->


                                        <!-- Row -->
                                        <div class="row with-forms">

                                            <!-- Phone -->
                                            <div class="col-md-4">
                                                <h5 class="fb-input"><i class="fa fa-facebook-square"></i> Facebook <span>(optional)</span></h5>
                                                <input type="text" placeholder="https://www.facebook.com/" name="fb" value="{{$business->fb}}">
                                            </div>

                                            <!-- Website -->
                                            <div class="col-md-4">
                                                <h5 class="insta-input" style="color: #E1306C"><i class="fa fa-instagram" aria-hidden="true"></i>Insta <span>(optional)</span></h5>
                                                <input type="text" placeholder="https://www.instagram.com/" name="inst" value="{{$business->inst}}">
                                            </div>

                                            <!-- Email Address -->
                                            <div class="col-md-4">
                                                <h5 class="gplus-input"><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube <span>(optional)</span></h5>
                                                <input type="text" placeholder="https://youtube.com" name="youtube" value="{{$business->youtube}}">
                                            </div>

                                            <!-- Email Address -->
                                            <div class="col-md-4">
                                                <h5 class="gplus-input"><i class="fa fa-yelp" aria-hidden="true"></i> Yelp <span>(optional)</span></h5>
                                                <input type="text" placeholder="https://yelp.com" name="yelp" value="{{$business->yelp}}">
                                            </div>
                                            <div class="col-md-4">
                                                <h5>Feature Image</h5>
                                                <div class="uploadButton margin-top-15 text-center">
                                                    <input type="file" name="feature" accept="image/*, application/pdf" id="upload">
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Row / End -->



                                    </div>
                                    <!-- Section / End -->



                                    @if ($business->hours->count() != 0)

                                    <!-- Section -->
                                    <div class="add-listing-section margin-top-45">

                                        <!-- Headline -->
                                        <div class="add-listing-headline">
                                            <h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
                                            <!-- Switcher -->
                                            <label class="switch"><input type="checkbox" name="timing_status" @if ($business->timing_status == '1') checked @endif><span class="slider round"></span></label>
                                        </div>

                                        <!-- Switcher ON-OFF Content -->
                                        <div class="switcher-content">

                                            @php
                                                $days = $business->hours;
                                            @endphp

                                            @foreach ($days as $item )

                                            <!-- Day -->
                                            <div class="row opening-day">
                                                <div class="col-md-2"><h5>{{$item->day}} <input type="hidden" name="day[]" value="{{$item->day}}"> <input type="hidden" name="day_id[]" value="{{$item->id}}"></h5></div>
                                                <div class="col-md-5">
                                                    <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                                        @if ($item->open_hour != null)
                                                        <option selected>{{$item->open_hour}}</option>
                                                        @else
                                                        <option label="Opening Time"></option>
                                                        @endif
                                                        <option>Closed</option>
                                                        <option>1 AM</option>
                                                        <option>2 AM</option>
                                                        <option>3 AM</option>
                                                        <option>4 AM</option>
                                                        <option>5 AM</option>
                                                        <option>6 AM</option>
                                                        <option>7 AM</option>
                                                        <option>8 AM</option>
                                                        <option>9 AM</option>
                                                        <option>10 AM</option>
                                                        <option>11 AM</option>
                                                        <option>12 AM</option>
                                                        <option>1 PM</option>
                                                        <option>2 PM</option>
                                                        <option>3 PM</option>
                                                        <option>4 PM</option>
                                                        <option>5 PM</option>
                                                        <option>6 PM</option>
                                                        <option>7 PM</option>
                                                        <option>8 PM</option>
                                                        <option>9 PM</option>
                                                        <option>10 PM</option>
                                                        <option>11 PM</option>
                                                        <option>12 PM</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-5">
                                                    <select class="chosen-select" data-placeholder="Closing Time"  name="closing[]">
                                                        @if ($item->close_hour != null)
                                                        <option selected>{{$item->close_hour}}</option>
                                                        @else
                                                        <option label="Opening Time"></option>
                                                        @endif
                                                        <option>Closed</option>
                                                        <option>1 AM</option>
                                                        <option>2 AM</option>
                                                        <option>3 AM</option>
                                                        <option>4 AM</option>
                                                        <option>5 AM</option>
                                                        <option>6 AM</option>
                                                        <option>7 AM</option>
                                                        <option>8 AM</option>
                                                        <option>9 AM</option>
                                                        <option>10 AM</option>
                                                        <option>11 AM</option>
                                                        <option>12 AM</option>
                                                        <option>1 PM</option>
                                                        <option>2 PM</option>
                                                        <option>3 PM</option>
                                                        <option>4 PM</option>
                                                        <option>5 PM</option>
                                                        <option>6 PM</option>
                                                        <option>7 PM</option>
                                                        <option>8 PM</option>
                                                        <option>9 PM</option>
                                                        <option>10 PM</option>
                                                        <option>11 PM</option>
                                                        <option>12 PM</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Day / End -->
                                            @endforeach


                                        </div>
                                        <!-- Switcher ON-OFF Content / End -->

                                    </div>
                                    <!-- Section / End -->
                                    @else
                                        <!-- Section -->
                                        <div class="add-listing-section margin-top-45">

                                            <!-- Headline -->
                                            <div class="add-listing-headline">
                                                <h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
                                                <!-- Switcher -->
                                                <label class="switch"><input type="checkbox" name="timing_status" @if ($business->timing_status == '1') checked @endif ><span
                                                        class="slider round"></span></label>
                                            </div>

                                            <!-- Switcher ON-OFF Content -->
                                            <div class="switcher-content">

                                                <!-- Day -->
                                                <div class="row opening-day">
                                                    <div class="col-md-2">
                                                        <h5>Monday <input type="hidden" name="day[]" value="Monday"><input type="hidden" name="day_id[]" ></h5>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                                            <option label="Opening Time"></option>
                                                            <option>Closed</option>
                                                            <option>1 AM</option>
                                                            <option>2 AM</option>
                                                            <option>3 AM</option>
                                                            <option>4 AM</option>
                                                            <option>5 AM</option>
                                                            <option>6 AM</option>
                                                            <option>7 AM</option>
                                                            <option>8 AM</option>
                                                            <option>9 AM</option>
                                                            <option>10 AM</option>
                                                            <option>11 AM</option>
                                                            <option>12 AM</option>
                                                            <option>1 PM</option>
                                                            <option>2 PM</option>
                                                            <option>3 PM</option>
                                                            <option>4 PM</option>
                                                            <option>5 PM</option>
                                                            <option>6 PM</option>
                                                            <option>7 PM</option>
                                                            <option>8 PM</option>
                                                            <option>9 PM</option>
                                                            <option>10 PM</option>
                                                            <option>11 PM</option>
                                                            <option>12 PM</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                                            <option label="Closing Time"></option>
                                                            <option>Closed</option>
                                                            <option>1 AM</option>
                                                            <option>2 AM</option>
                                                            <option>3 AM</option>
                                                            <option>4 AM</option>
                                                            <option>5 AM</option>
                                                            <option>6 AM</option>
                                                            <option>7 AM</option>
                                                            <option>8 AM</option>
                                                            <option>9 AM</option>
                                                            <option>10 AM</option>
                                                            <option>11 AM</option>
                                                            <option>12 AM</option>
                                                            <option>1 PM</option>
                                                            <option>2 PM</option>
                                                            <option>3 PM</option>
                                                            <option>4 PM</option>
                                                            <option>5 PM</option>
                                                            <option>6 PM</option>
                                                            <option>7 PM</option>
                                                            <option>8 PM</option>
                                                            <option>9 PM</option>
                                                            <option>10 PM</option>
                                                            <option>11 PM</option>
                                                            <option>12 PM</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Day / End -->

                                                <!-- Day -->
                                                <div class="row opening-day js-demo-hours">
                                                    <div class="col-md-2">
                                                        <h5>Tuesday <input type="hidden" name="day[]" value="Tuesday"><input type="hidden" name="day_id[]" ></h5>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Day / End -->

                                                <!-- Day -->
                                                <div class="row opening-day js-demo-hours">
                                                    <div class="col-md-2">
                                                        <h5>Wednesday <input type="hidden" name="day[]" value="Wednesday"><input type="hidden" name="day_id[]" ></h5>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Day / End -->

                                                <!-- Day -->
                                                <div class="row opening-day js-demo-hours">
                                                    <div class="col-md-2">
                                                        <h5>Thursday <input type="hidden" name="day[]" value="Thursday"><input type="hidden" name="day_id[]" ></h5>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Day / End -->

                                                <!-- Day -->
                                                <div class="row opening-day js-demo-hours">
                                                    <div class="col-md-2">
                                                        <h5>Friday <input type="hidden" name="day[]" value="Friday"><input type="hidden" name="day_id[]" ></h5>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Day / End -->

                                                <!-- Day -->
                                                <div class="row opening-day js-demo-hours">
                                                    <div class="col-md-2">
                                                        <h5>Saturday <input type="hidden" name="day[]" value="Saturday"><input type="hidden" name="day_id[]" ></h5>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Day / End -->

                                                <!-- Day -->
                                                <div class="row opening-day js-demo-hours">
                                                    <div class="col-md-2">
                                                        <h5>Sunday <input type="hidden" name="day[]" value="Sunday"><input type="hidden" name="day_id[]" ></h5>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Day / End -->

                                            </div>
                                            <!-- Switcher ON-OFF Content / End -->

                                        </div>
                                        <!-- Section / End -->

                                    @endif

                                    					<!-- Section -->
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-book-open"></i> Areas We Serve</h3>
							<!-- Switcher -->
							<label class="switch"><input type="checkbox" name="area_status" @if ($business->area_status == 1) checked @endif><span class="slider round"></span></label>
						</div>

						<!-- Switcher ON-OFF Content -->
						<div class="switcher-content">

							<div class="row">
								<div class="col-md-12">
									<table id="pricing-list-container">
										<tr class="pricing-list-item pattern">
                                            @php
                                            $area = $business->areas;
                                            // $state = \App\Models\State::where('id', $area->state_id);
                                        @endphp
                                         @foreach ($area as $item)
											<td>
												<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
                                                <input type="hidden" name="area_id[]" value="{{$item->id}}" id="">
                                                <div class="fm-input"><input type="text" name="areaserve[]" value="{{$item->area}}" /></div>
                                                @php
                                                    $state = \App\Models\State::where('id', $item->state_id)->first();
                                                @endphp

                                                <div class="fm-input state-name">
                                                    <select name="state_id[]" id="state">
                                                        @if ($state!=null)
                                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                        @else
                                                        <option value="">Please Select</option>
                                                        @endif
                                                        @foreach ($states as $list)
                                                            <option value="{{ $list->id }}">{{ $list->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
												<div class="fm-close"><a onclick="return confirm('Are you sure? Please Save the Data first. The page will reload.');"  href="{{route('area.destroy')}}/{{$item->id}}" ><i class="fa fa-remove"></i></a></div>
											</td>
                                            @endforeach
										</tr>
									</table>
									{{-- <a href="#" class="button add-pricing-list-item">Add Item</a> --}}
									<a href="#" class="button add-pricing-submenu">Add Area</a>
								</div>
							</div>

						</div>
						<!-- Switcher ON-OFF Content / End -->

					</div>
					<!-- Section / End -->



                                    <button  class="button preview">Preview <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </form>
			</div>

			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© 2021 Listeo. All Rights Reserved.</div>
			</div>

		</div>

@endsection
