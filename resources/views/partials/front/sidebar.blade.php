<!-- <div class="sidebarotthers">
		<nav>
			<ul>
				<li {{app('request')->path() == '/' ? 'class=active' : ''}}>
					<a href="{{ url('/') }}">
						<img src="img/home_icon.svg" alt="Home"> Home
					</a>
				</li>

                <li {{app('request')->path() == 'dashboard' ? 'class=active' : ''}}>
					<a href="{{ url('/dashboard') }}">
						<img src="img/home_icon.svg" alt="Home"> Dashboard
					</a>
				</li>
				
				<li {{app('request')->path() == 'brickslist' ? 'class=active' : ''}}>
					<a href="{{ url('/brickslist') }}">
						<img src="img/how_work_icon.svg" alt="Bricks"> Bricks</a>
				</li>
                @if(Auth::user()->google_id == NULL)
					<li {{app('request')->path() == 'changepassword' ? 'class=active' : ''}}>
						<a href="{{ url('/changepassword') }}"><img src="img/contact_icon.svg" alt="Contact Us">Change Password</a>
					</li>
				@endif
			</ul>
		</nav>
	</div> -->

	<div class="sidebar">
        <div class="container-fluid">
            
            <!-- LOGO -->
            <div class="logo">
                <a href="#">
                    <img src="img/logo.svg" alt="LOGO">
                </a>
            </div>
            <!-- LOGO END-->

            <!-- MENU -->
            <div class="menu">

                <!-- NAV -->
                <nav>
                    <ul>
                        <li>
                            <a href="/v1/public/">
                                <img src="img/home_icon.svg" alt="Home"> Home</a>
                        </li>
                        <li class="active">
                            <a href="/v1/public/about">
                                <img src="img/about_icon.svg" alt="About US"> About Us</a>
                        </li>
                        <!-- <li>
                            <a href="/v1/public/how-it-works">
                                <img src="img/how_work_icon.svg" alt="How it Works"> How it Works</a>
                        </li> -->
                        <li>
                            <a href="/v1/public/contact">
                                <img src="img/contact_icon.svg" alt="Contact Us"> Contact Us</a>
                        </li>
                    </ul>
                </nav>
                <!-- NAV END -->

                <!-- WHY SPECIAL -->
                <div class="why_special">
                    <h6>Why is this special?</h6>
                    <ul>
                        <li>NFT Briks offers 10,000 Briks or ad spaces </li>
                        <li>Each Brik is an actual minted NFT on Opensea</li>
                        <li>Promote your digital assets to potential buyers</li>
                        <li>Monitor your digital assets performance</li>
                    </ul>
                </div>
                <!-- WHY SPECIAL END -->

            </div>
            <!-- MENU END -->


            <!-- SIDEBAR FOOTER -->
            <div class="sidebar_footer">
                
                <div class="counter_block">
                    <p>400/2000 Briks</p>
                    <div class="counter_slide">
                        <div class="red_bar"></div>
                    </div>
                </div>

                <div class="button_group">
                    <div class="login_register">
                                                    <a class="login sidebar-login" id="sidebar-login" href="#">Login</a> /
                            <a class="register login-popup-register" id="login-popup-register" href="#">Register</a>
                                            </div>
                </div>

                <div class="social_icon">
                    <p>Follow Us</p>
                    <ul>
                        <li class="tw">
                            <a href="https://twitter.com/nft_briks" target="_blank"></a>
                        </li>
                        <li class="insta">
                            <a href="https://www.instagram.com/nft_briks/" target="_blank"></a>
                        </li>
                       
                    </ul>
                </div>

                <ul class="otherlinks">
                    <li><a href="{{route('terms-conditions')}}">Terms & Conditions</a></li>
                    <li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
                </ul>

            </div>
        </div>
    </div>