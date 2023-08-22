<!-- WRAPPER -->
<div class="wrapper">
    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="container-fluid">
            
            <!-- LOGO -->
            <div class="logo">
                <a href="{{route('index') }}">
                    <img src="{{asset('img/logo.svg')}}" alt="LOGO">
                </a>
            </div>
            <!-- LOGO END-->

            <!-- MENU -->
            <div class="menu">

                <!-- NAV -->
                <nav>
                    <ul>
                        <li {{app('request')->path() == '/' ? 'class=active' : ''}}>
                            <a href="{{route('index') }}">
                                <img src="{{asset('img/home_icon.svg')}}" alt="Home"> Home</a>
                        </li>
                        @if (Auth::check())
                            <li {{app('request')->path() == 'brickslist' ? 'class=active' : ''}}>
                                <a class="login" href="{{route('boxes.brickslist')}}"><img src="{{asset('img/mybriks.svg')}}" alt="My Briks"> My Briks</a> 
                            </li>
                        @else
                            <li>
                                <a class="sidebar-login" href="#"><img src="{{asset('img/mybriks.svg')}}" alt="My Briks"> My Briks</a> 
                            </li>
                        @endif
                        <li {{app('request')->path() == 'about' ? 'class=active' : ''}}>
                            <a href="{{route('about') }}">
                                <img src="{{asset('img/about_icon.svg')}}" alt="About US"> About Us</a>
                        </li>
                        <!-- <li {{app('request')->path() == 'how-it-works' ? 'class=active' : ''}}>
                            <a href="{{route('how-it-works') }}">
                                <img src="{{asset('img/how_work_icon.svg')}}" alt="How it Works"> How it Works</a>
                        </li> -->
                        <li {{app('request')->path() == 'contact' ? 'class=active' : ''}}>
                            <a href="{{route('contact') }}">
                                <img src="{{asset('img/contact_icon.svg')}}" alt="Contact Us"> Contact Us</a>
                        </li>
                    </ul>
                </nav>
                <!-- NAV END -->

                <!-- WHY SPECIAL -->
                <div class="why_special">
                    <h6>Why is this special?</h6>
                    <ul>
                        <li><strong>Buy & Sell Limited Ad Space:</strong> NFT Briks offers 10,000 Briks or ad spaces that can be purchased and resold where each Brik is an actual minted NFT on Opensea </li>
                        <li><strong>Advertise Digital Assets:</strong> NFT Briks allows users to promote their digital assets by owning ad space and showcasing their content to potential buyers</li>
                        <li><strong>Monitor Digital Assets Performance:</strong> NFT Briks provides a monitoring command center to track advertised digital assets performance <strong class="comingsoon_text">(Coming Soon)</strong> </li>
                        
                    </ul>
                </div>
                <!-- WHY SPECIAL END -->

            </div>
            <!-- MENU END -->


            <!-- SIDEBAR FOOTER -->
            <div class="sidebar_footer">
                
                <div class="counter_block">
                    <p class="counter_block_status"></p>
                    <div class="counter_slide">
                        <div class="red_bar" style="width:0px"></div>
                    </div>
                </div>

                <div class="button_group">
                    <!-- <a class="metaamask" href="#">Connect with MetaMask</a> -->


                    @if (Auth::check())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="login_register" href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();" class="menu-link logoutcon">
                        Log Out
                        </a>
                    </form>
                    @else
                        <div class="login_register register login-popup-register">
                            <a class="login sidebar-login" id="sidebar-login" href="#">Login</a> /
                            <a class="register login-popup-register" id="login-popup-register" href="#">Register</a>
                        </div>
                    @endif
                </div>

                <div class="social_icon">
                    <p>Follow Us</p>
                    <ul>
                        <!-- <li class="fb">
                            <a  href="https://www.instagram.com/nft_briks/" target="_blank"></a>
                        </li> -->
                        <li class="tw">
                            <a  href="https://twitter.com/nft_briks" target="_blank"></a>
                        </li>
                        <li class="insta">
                            <a  href="https://www.instagram.com/nftbriks/" target="_blank"></a>
                        </li>
                        <li class="discord">
                            <a  href="https://discord.com/channels/@nftbriks" target="_blank"></a>
                        </li>
                        <!-- <li class="reddit">
                            <a  href="https://www.reddit.com/nft_briks/" target="_blank"></a>
                        </li> -->
                        <!-- <li class="linkedin">
                            <a href="#"></a>
                        </li> -->
                    </ul>
                </div>

                <ul class="otherlinks">
                    <li><a href="{{route('terms-conditions')}}">Terms & Conditions</a></li>
                    <li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
                </ul>

            </div>
            <!-- SIDEBAR FOOTER END -->

            <!-- RIGHT NAV -->
                <!-- <div class="right_nav">
                    <ul>
                        <li>
                            <a class="login" href="#">Login</a>
                        </li>
                        <li>
                            <a class="register" href="#">Register</a>
                        </li>
                    </ul>
                </div> -->
            <!-- RIGHT NAV END -->

        </div>
    </div>
    <!-- SIDEBAR END -->
