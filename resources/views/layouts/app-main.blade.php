<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/svg+xml" href="{{asset('img/favicon.svg')}}">
        <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" href="{{asset('css/normalize.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/sass/main.css')}}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-E3XVQW36MS"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-E3XVQW36MS');
        </script>

    </head>
    <body>
        <div class="loader">
            <div class="loading_inner">
                <div class="loading"></div>
            </div>
        </div>

        <div class="loader2" style="display:none;">
            <div class="loading_inner">
                <div class="loading"></div>
            </div>
        </div>
        <div id="body" >
        <!-- POPUP -->
        <div class="popup">
            <div class="popup_container">
                <div class="register_content ">
                <a href="#" class="close-popup" data-id="popup_default">×</a>
                    <h3>Sign Up</h3>
                    <a class="btn" href="{{ url('auth/google') }}">
                        <img src="{{asset('img/google_icon.svg')}}" alt="Goolge">
                        SIGN UP WITH GOOGLE</a>
                    <div class="seperator">
                        <span>or</span>
                    </div>
                    <form method="POST" id= "register_form" action="{{ route('register') }}">
                        @csrf
                        <div class="form_group">
                            <input type="text" name="name" id="name" required>
                            <label for="#">Name</label>
                        </div>

                        <div class="form_group">
                            <input type="text" name="surname" id="surname" required>
                            <label for="#">Surname</label>
                        </div>

                        <div class="form_group">
                            <input type="text" name="email" id="email_register">
                            <label for="#">Email</label>
                        </div>

                        <div class="form_group">
                            <input type="date" name="dob" id="dob">
                            <label class="has_val" for="#">Date of Birth</label>
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
                            <input class="btn red" type="button" name="submit" id="register" value="SIGN UP">
                        </div>
                    </form>
                    <p>By continuing, you agree to accept our Privacy Policy & Terms of Service.</p>
                    <div class="login">
                        Already have an account? <a href="#">Log In</a>
                    </div>
                </div>
                <div class="login_content">
                <a href="#" class="close-popup" data-id="popup_default">×</a>
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
                            <input class="btn red" type="button" name="submit" id="submit" value="Login">
                        </div>
                    </form>
                    <div class="seperator">
                        <span>or</span>
                    </div>
                    <a class="btn" href="{{ url('auth/google') }}">
                        <img src="{{asset('img/google_icon.svg')}}" alt="Goolge">
                        SIGN IN WITH GOOGLE</a>
                    
                    <p>By continuing, you agree to accept our Privacy Policy & Terms of Service.</p>
                    <div class="login">
                        Do you have not an account? <a href="#" class="login-popup-register" id="login-popup-register">Register</a>
                    </div>
                </div>
                <div class="question_content">
                    <p class="message register-message"></p>
                    <p class="helpustext">Help us get to know you better</p>
					<div>
					    <h5> <strong>Question 1:</strong> How much do you know about NFTs/Crypto?</h5>
					    <label class="radio_container">Nothing
							<input type="radio" checked="checked" name="know_about_nft" class="know_about_nft" value="Nothing"> 
							<span class="checkmark"></span>
					    </label>
						<label class="radio_container">I know very little
							<input type="radio"  class="know_about_nft" name="know_about_nft" value="I know very little"> 
							<span class="checkmark"></span>
					    </label>
						<label class="radio_container">Enough to get by
							<input type="radio"  class="know_about_nft" name="know_about_nft" value="Enough to get by"> 
							<span class="checkmark"></span>
					    </label>
						<label class="radio_container">I am an NFTs/Crypto enthusiast
							<input type="radio" class="know_about_nft" name="know_about_nft" value="I am an NFTs/Crypto enthusiast"> 
							<span class="checkmark"></span>
					    </label>
				    </div>
                    <div>
					    <h5> <strong>Question 2:</strong> How long have you been involved the NFTs/Crypto space?</h5>
					    <label class="radio_container">Less than a week
							<input type="radio" checked="checked" class="involve_about_nft" name="involve_about_nft" value="Less than a week"> 
							<span class="checkmark"></span>
					    </label>
						<label class="radio_container">Less than a month
							<input type="radio"  class="involve_about_nft" name="involve_about_nft" value="Less than a month"> 
							<span class="checkmark"></span>
					    </label>
						<label class="radio_container">1 to 6 months
							<input type="radio"  class="involve_about_nft" name="involve_about_nft" value="1 to 6 months"> 
							<span class="checkmark"></span>
					    </label>						
				    </div>
                    <div>
					    <h5> <strong>Question 3:</strong> What is your purpose of investing in NFTs/Crypto?</h5>
					    <label class="radio_container">Nothing
							<input type="radio" checked="checked" class="invest_about_nft" name="invest_about_nft" value="Nothing"> 
							<span class="checkmark"></span>
					    </label>
						<label class="radio_container"> I am an NFT collector
							<input type="radio"  class="invest_about_nft" name="invest_about_nft" value="I am an NFT collector"> 
							<span class="checkmark"></span>
					    </label>
						<label class="radio_container">I want to make profitable investments
							<input type="radio"  class="invest_about_nft" name="invest_about_nft" value="I want to make profitable investments"> 
							<span class="checkmark"></span>
					    </label>
						<label class="radio_container">just for fun
							<input type="radio"  class="invest_about_nft" name="invest_about_nft" value="just for fun"> 
							<span class="checkmark"></span>
					    </label>
				    </div>
                    <div class="btn_group">
                        <input type="button" onclick="updateUserQuestions();" class="btn" value="Submit">
                    </div>
				</div>
            </div>
        </div>
        <!-- POPUP END -->

        <!-- HEADER -->
        @include('partials.header')
        <!-- HEADER END -->


        <!-- BOXES -->
        @yield('content')
        <!-- BOXES END -->

        <!-- footer -->
        
       </div>
        <!-- footer end -->

         <!-- sidebar -->
         @include('partials.sidebar')
        <!-- sidebar end -->
        </div>
        <div class="mobile-overlay"></div>
        @routes
        <script>
            
            const IPFS_URL_WITH_CID = '{{ env('IPFS_URL_WITH_CID') }}';
            const API_URL =  '{{ env('API_URL') }}';
            const PRIVATE_KEY =  '{{ env('PRIVATE_KEY') }}';
            const ADMIN_KEY =  '{{ env('ADMIN_KEY') }}';
            const BASE_URL = '{{ env('BASE_URL') }}';
            const CONTRACT_ADDRESS = '{{ env('CONTRACT_ADDRESS') }}';
            const OPEN_SEA = '{{ env('OPEN_SEA') }}';
            const ETHER_SCAN = '{{ env('ETHER_SCAN') }}';
            const ETHERSCAN_API_KEY = '{{ env('ETHERSCAN_API_KEY') }}';
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/@alch/alchemy-web3@latest/dist/alchemyWeb3.min.js" defer></script>
        <script async src="https://unpkg.com/@metamask/detect-provider/dist/detect-provider.min.js" defer></script>
        <script src="{{asset('js/global.js')}}" defer></script>
        <script src="{{asset('js/main.js')}}" defer></script>
        <script src="{{asset('js/wallet.js')}}" defer></script>

    </body>
</html>