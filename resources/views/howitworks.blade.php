@extends('layouts.app-main')
@section('title','About | NFT Project')
@section('content')

<!-- BOX WRAP -->
<div class="inner_page">
    <!-- page heading -->
    <div class="page_heading">
        <div class="container">
            <h1>How it Works</h1>
        </div>
    </div>
    <!-- page heading end -->

    <!-- CONTENT -->
    <div class="content">
        <div class="container">
            
            <div class="col-12">
                <h5>NFT is easy to use!</h5>
                <div class="video_wrap">
                    <iframe width="100%" height="420" src="https://www.youtube.com/embed/yAoLSRbwxL8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

            <div class="col-12">
                <h5>How does it work?</h5>
                <p>MDTP has 10,000 briks on a 1000 x 1000 2D grid represented by 10,000 NFTs on the Ethereum network. Each NFT can either be minted or bought second-hand from someone who's already minted it. Once owned, you can put any image within that block, along with a title, description and url to another website! </p> 
                <p> To mint new briks and make use of Ethereum and Web3 technologies you need to have a Web3 enabled plugin like or browser like , which has a native crypto wallet, and to have some cryptocurrency in your wallet. You'll need in your wallet to pay for the of the NFT collection and of the network. Simply select "mint" in the side-panel for a block that's not yet been minted and confirm the transaction.</p>
                <p> Once you own the NFT that represents a block you can then change the image, title, description and url by clicking it and selecting "update token" on the side-panel. By connecting your wallet the site will recognises that you own that NFT and allow you to update the content associated with that block. And its a simple as that, buy briks as NFTs then share your NFTs, projects and creations in this digital content space with the entire world!</p>
            </div>

            <div class="col-12 mt-5">
                <h5>Why is this special?</h5>
                <p>MDTP has 10,000 briks on a 1000 x 1000 2D grid represented by 10,000 NFTs on the Ethereum network. Each NFT can either be minted or bought second-hand from someone who's already minted it. Once owned, you can put any image within that block, along with a title, description and url to another website! </p> 
                <p> To mint new briks and make use of Ethereum and Web3 technologies you need to have a Web3 enabled plugin like or browser like , which has a native crypto wallet, and to have some cryptocurrency in your wallet. You'll need in your wallet to pay for the of the NFT collection and of the network. Simply select "mint" in the side-panel for a block that's not yet been minted and confirm the transaction.</p>
                <p> Once you own the NFT that represents a block you can then change the image, title, description and url by clicking it and selecting "update token" on the side-panel. By connecting your wallet the site will recognises that you own that NFT and allow you to update the content associated with that block. And its a simple as that, buy briks as NFTs then share your NFTs, projects and creations in this digital content space with the entire world!</p>
            </div>

        </div>
    </div>
    <!-- CONTENT END -->


    <!-- FOOTER -->
    <footer>
        <div class="container">
            
            <ul class="links">
                <li>
                    <a href="#">About US</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li>
                    <a href="{{route('terms-conditions')}}">Terms & Conditions</a>
                </li>
            </ul>

            <ul class="social_icons">
                <li class="fb">
                    <a href="#">
                     <img src="../../img/Archive/SC-FB.svg" alt=""> Facebook</a>
                </li>
                <li class="tw">
                    <a href="#">
                    <img src="../../img/Archive/SC-TWTR.svg" alt="">  Twitter</a>
                </li>
                <li class="insta">
                    <a href="#"> <img src="../../img/Archive/insta_icon.png" alt="">  Instagram        </a>
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
