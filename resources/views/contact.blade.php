@extends('layouts.app-main')
@section('title','About | NFT Project')
@section('content')

    
<!-- BOX WRAP -->
<div class="inner_page contactinnerpagemain">
    <!-- page heading -->
    <div class="page_heading">
        <div class="container">
            <h1>Contact Us</h1>
        </div>
    </div>
    <!-- page heading end -->

    <!-- CONTENT -->
    <div class="content conctactcontainer">
        <div class="container">
            <div class="contactinner">
                <div class="col-12">
                    <p>Before reaching out to our team, you may want to review these helpful resources in case your question has already been answered. </p>
                    <p>If you still need help, we’d love to hear from you. Feel free to reach out to our Customer Care team directly.</p>
                </div>

                <div class="col-12 mt-5">
                    <div class="gnnquires">
                        <ul class="gninquiries">
                            <li>
                                <h5>
                                General inquiries
                                </h5>
                                <a href="mailto:info@nftbriks.com">
                                info@nftbriks.com
                                </a>
                            </li>
                            <li>
                                <h5>
                                Press & Media
                                </h5>
                                <a href="mailto:info@nftbriks.com">
                                info@nftbriks.com
                                </a>
                            </li>
                            <li>
                                <h5>
                                Returns
                                </h5>
                                <a href="mailto:info@nftbriks.com">
                                info@nftbriks.com
                                </a>
                            </li>
                        </ul>
                        <!-- <div class="headhea">
                        
                                <h5>Sooth Brand Corporate Headquarters</h5>
                                <a href="#">
                                497 Evergreen Rd. Roseville, CA 95673 
                                </a>
                                <a href="#">
                                +44 345 678 903
                                </a>
                                <a href="#">
                                info@nftbriks.com
                                </a>

                        
                        </div> -->
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- CONTENT END -->


    <!-- FOOTER -->
    <footer class="contactfooter">
        <div class="container">
            
            <ul class="links">
                <li>
                    <a href="{{route('about') }}">About US</a>
                </li>
                <li>
                    <a href="{{route('contact') }}">Contact</a>
                </li>
                <li>
                    <a href="{{route('terms-conditions')}}">Terms & Conditions</a>
                </li>
            </ul>

            <ul class="social_icons">
                <li class="discord">
                    <a href="https://discord.com/channels/@nftbriks">
                     <img src="../../img/discord.svg" alt=""> Discord</a>
                </li>
                <li class="tw">
                    <a href="https://twitter.com/nft_briks">
                    <img src="../../img/Archive/SC-TWTR.svg" alt="">  Twitter</a>
                </li>
                <li class="insta">
                    <a href="https://www.instagram.com/nftbriks/"> <img src="../../img/Archive/insta_icon.png" alt="">  Instagram</a>
                </li>
            </ul>

            <div class="newsletter">
                <p>Subscribe to our newsletter</p>
                <form action="#">
                    <input type="email" name="email" placeholder="Email Address">
                    <input type="submit" value="ok">
                </form>
            </div>

            <div class="address">
                <!-- <a href="#">497 Evergreen Rd. Roseville, CA 95673 </a>
                <a href="tel:+44 345 678 903">+44 345 678 903</a> -->
                <a href="mailto:info@nftbriks.com">info@nftbriks.com</a>
                <p>© NFT Project 2022</p>
            </div>

        </div>
    </footer>
    <!-- FOOTER END -->

</div>
<!-- BOX WRAP END -->


@endsection
