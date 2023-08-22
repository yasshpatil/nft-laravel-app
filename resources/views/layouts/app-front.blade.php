<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
        <title>NFT - @yield('title')</title>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="" />
		<meta property="og:site_name" content="NFT Bricks" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/svg+xml" href="{{asset('img/favicon.svg')}}">
        <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{asset('metronic/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('metronic/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('css/inherit.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('css/newstyle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-E3XVQW36MS"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-E3XVQW36MS');
        </script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
	    <div class="loader2" style="display:none;">
            <div class="loading_inner">
                <div class="loading"></div>
            </div>
        </div>
		<!--begin::Main-->

		   <!-- POPUP -->
		   <div class="popup" style="display:none;">
            <div class="popup_container">
                <div class="register_content">
                    <h3>Sign Up</h3>
                    <a class="signupwithgoogle" href="{{ url('auth/google') }}">
                        <img src="{{asset('img/google_icon.svg')}}" alt="Goolge">
                        SIGN UP WITH GOOGLE</a>
                    <div class="seperator">
                        <span>or</span>
                    </div>
                    <form method="POST" id= "register_form" action="{{ route('register') }}">
                        @csrf
                        <div class="form_group">
                            <input type="text" name="name" id="name" required>
                            <label for="#">Full Name</label>
                        </div>
                        <div class="form_group">
                            <input type="text" name="email" id="email_register">
                            <label for="#">Email</label>
                        </div>
                        <div class="form_group">
                            <input type="password" name="password" id="password_register">
                            <label for="#">Password</label>
                            <div class="show_pass"></div>
                        </div>
                        <div class="form_group">
                            <input type="password" name="password_confirmation" id="password_confirmation">
                            <label for="#">Confirm Password</label>
                            <div class="show_pass"></div>
                        </div>
                        <div class="form_group">
                            <input class="btn_red" type="button" name="submit" id="register" value="SIGN UP">
                        </div>
                    </form>
                    <p>By continuing, you agree to accept our Privacy Policy & Terms of Service.</p>
                    <div class="login">
                        Already have an account? <a href="#">Log In</a>
                    </div>
                </div>
                <div class="login_content">
                    <h3>Log In</h3>
                    <form method="POST" id= "login_form" action="{{ route('login') }}">
                     @csrf
                        <div class="form_group">
                            <input type="text" name="email" id="email" required autofocus>
                            <label for="#">Email</label>
                        </div>
                        <div class="form_group">
                            <input type="password" name="password" id="password" required autocomplete="current-password">
                            <label for="#">Password</label>
                            <div class="show_pass"></div>
                        </div>
                        <div class="form_group">
                            <input class="btn_red" type="button" name="submit" id="submit" value="Login">
                        </div>
                    </form>
               
                    
                    <p>By continuing, you agree to accept our Privacy Policy & Terms of Service.</p>
                    <div class="login">
                        Do you have not an account? <a href="#" class="login-popup-register" id="login-popup-register">Register</a>
                    </div>
                </div>
            </div>
        </div>
		<div class="wrapper " id="kt_wrapper">
					<!--begin::Header-->
					<!--end::Header-->
					@yield('content')
					<!--begin::Footer-->
					
					<!--end::Footer-->
				</div>
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
		<!--end::Main-->
		@routes
		<script>
			var hostUrl = "{{asset('metronic/assets/')}}";
			const API_URL =  "{{ env('API_URL') }}";
			const BASE_URL = "{{ env('BASE_URL') }}";
			const CONTRACT_ADDRESS = "{{ env('CONTRACT_ADDRESS') }}";
		</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{asset('metronic/assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('metronic/assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
				<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="{{asset('metronic/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="https://cdn.jsdelivr.net/npm/@alch/alchemy-web3@latest/dist/alchemyWeb3.min.js"></script>
		<script src="{{asset('js/wallet.js')}}"></script>
		<script src="{{asset('front/js/custom.js')}}"></script>
		<script src="{{asset('js/user-bricks-datatable.js')}}"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
        @stack('scripts')
	</body>
	<!--end::Body-->
</html>