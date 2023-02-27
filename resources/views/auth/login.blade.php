<!DOCTYPE html>
<html>
    <head>
        @include('layouts.partials.head')
    </head>
    <body>
<div class="container py-5">
    <div class="row justify-content-center" style="display: flex;   justify-content: center;">
        <div class="col-md-8">
			<!-- Sign In Popup -->
			<div id="sign-in-dialog" class="zoom-anim-dialog ">

				<div class="small-dialog-header">
					<h3>Log In</h3>
				</div>

				<!--Tabs -->
				<div class="sign-in-form style-1">

					<ul class="tabs-nav">
						<li class=""><a href="#tab1">Log In</a></li>
						{{-- <li><a href="#tab2">Register</a></li> --}}
					</ul>

					<div class="tabs-container alt">

						<!-- Login -->
						<div class="tab-content" id="tab1" >
                            <form class="login" method="POST" action="{{ route('login') }}">
                                @csrf

								<p class="form-row form-row-wide">
									<label for="username">Username:
										<i class="im im-icon-Male"></i>
                                        <input id="email" type="email" class="input-text form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									</label>
								</p>

								<p class="form-row form-row-wide">
									<label for="password">Password:
										<i class="im im-icon-Lock-2"></i>
										{{-- <input class="input-text" type="password" name="password" id="password"/> --}}
                                        <input id="password" type="password" class="input-text form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									</label>
									{{-- <span class="lost_password">
										<a href="#" >Lost Your Password?</a>
									</span> --}}
								</p>

								<div class="form-row">
                                    <div class="checkboxes margin-top-10 pb-4" style="padding-bottom: 15px">
										<input id="remember-me" type="checkbox" name="check">
										<label for="remember-me">Remember Me</label>
									</div>
                                    <button type="submit" class="button border margin-top-5">
                                        {{ __('Login') }}
                                    </button>

								</div>
							</form>
						</div>

						<!-- Register -->
						{{-- <div class="tab-content" id="tab2" >

							<form method="post" class="register">

							<p class="form-row form-row-wide">
								<label for="username2">Username:
									<i class="im im-icon-Male"></i>
									<input type="text" class="input-text" name="username" id="username2" value="" />
								</label>
							</p>

							<p class="form-row form-row-wide">
								<label for="email2">Email Address:
									<i class="im im-icon-Mail"></i>
									<input type="text" class="input-text" name="email" id="email2" value="" />
								</label>
							</p>

							<p class="form-row form-row-wide">
								<label for="password1">Password:
									<i class="im im-icon-Lock-2"></i>
									<input class="input-text" type="password" name="password1" id="password1"/>
								</label>
							</p>

							<p class="form-row form-row-wide">
								<label for="password2">Repeat Password:
									<i class="im im-icon-Lock-2"></i>
									<input class="input-text" type="password" name="password2" id="password2"/>
								</label>
							</p>

							<input type="submit" class="button border fw margin-top-10" name="register" value="Register" />

							</form>
						</div> --}}

					</div>
				</div>
			</div>
			<!-- Sign In Popup / End -->

        </div>
    </div>
</div>

@include('layouts.partials.scripts')
    </body>
</html>
