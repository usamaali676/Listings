	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">

			<ul data-submenu-title="Main">
				<li class="active"><a href="{{route('home')}}"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
                <li><a><i class="im im-icon-Security-Block"></i>Roles</a>
					<ul>
						<li><a href="{{route('role.index')}}">View Roles </a></li>
                        <li><a href="{{route('role.add')}}">Add New Role </a></li>
						{{-- <li><a href="dashboard-my-listings.html">Expired <span class="nav-tag red">2</span></a></li> --}}
					</ul>
				</li>
                <li><a><i class="im im-icon-Business-Man"></i>Users</a>
					<ul>
						<li><a href="{{route('user.index')}}">View Users </a></li>
                        <li><a href="{{route('user.add')}}">Add New Users </a></li>
						{{-- <li><a href="dashboard-my-listings.html">Expired <span class="nav-tag red">2</span></a></li> --}}
					</ul>
				</li>
                <li><a><i class="sl sl-icon-layers"></i>Business Category</a>
					<ul>
						<li><a href="{{route('bc.index')}}">View Business Category</a></li>
						<li><a href="{{route('bc.add')}}">Add Business Category </a></li>
						{{-- <li><a href="dashboard-my-listings.html">Expired <span class="nav-tag red">2</span></a></li> --}}
					</ul>
				</li>
                <li><a><i class="sl sl-icon-handbag"></i>Business</a>
					<ul>
						<li><a href="{{route('business.index')}}">View Business </a></li>
						<li><a href="{{route('business.add')}}">Add Business </a></li>
						{{-- <li><a href="dashboard-my-listings.html">Expired <span class="nav-tag red">2</span></a></li> --}}
					</ul>
				</li>
                <li><a><i class="sl sl-icon-layers"></i>States</a>
					<ul>
						<li><a href="{{route('state.index')}}">View States</a></li>
						<li><a href="{{route('state.create')}}">Add State </a></li>
						{{-- <li><a href="dashboard-my-listings.html">Expired <span class="nav-tag red">2</span></a></li> --}}
					</ul>
				</li>
				{{-- <li><a href="dashboard-messages.html"><i class="sl sl-icon-envelope-open"></i> Business </a></li>
				<li><a href="dashboard-bookings.html"><i class="fa fa-calendar-check-o"></i> Bookings</a></li>
				<li><a href="dashboard-wallet.html"><i class="sl sl-icon-wallet"></i> Wallet</a></li> --}}
			</ul>

			{{-- <ul data-submenu-title="Listings">
				<li><a><i class="sl sl-icon-layers"></i> My Listings</a>
					<ul>
						<li><a href="dashboard-my-listings.html">Active <span class="nav-tag green">6</span></a></li>
						<li><a href="dashboard-my-listings.html">Pending <span class="nav-tag yellow">1</span></a></li>
						<li><a href="dashboard-my-listings.html">Expired <span class="nav-tag red">2</span></a></li>
					</ul>
				</li>
				<li><a href="dashboard-reviews.html"><i class="sl sl-icon-star"></i> Reviews</a></li>
				<li><a href="dashboard-bookmarks.html"><i class="sl sl-icon-heart"></i> Bookmarks</a></li>
				<li><a href="dashboard-add-listing.html"><i class="sl sl-icon-plus"></i> Add Listing</a></li>
			</ul> --}}

			<ul data-submenu-title="Account">
				{{-- <li><a href="dashboard-my-profile.html"><i class="sl sl-icon-user"></i> My Profile</a></li> --}}
                <form  action="{{ route('logout') }}" method="POST">
                    @csrf
				<li>
                    <a role="button" aria-label="submit form" href="javascript:void(0)" onclick="document.querySelector('form').submit()"><i class="sl sl-icon-power"></i> LogOut</a>
                </li>
            </form>
			</ul>

		</div>
	</div>
	<!-- Navigation / End -->
