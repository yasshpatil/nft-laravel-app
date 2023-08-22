@extends('layouts.app-main')
@section('title','About | NFT Project')
@section('content')

<!-- BOX WRAP -->
<div class="inner_page">
    <!-- page heading -->
    <div class="page_heading">
        <div class="container">
            <h1>About Us</h1>
         
        </div>
    </div>
    <!-- page heading end -->

    <!-- CONTENT -->
    <div class="content-ecosystem">
        <div class="container">

            <div class="col-8">
                <h2>Enabling the NFT and Digital Ecosystem</h2>
                <p>
                The Crypto and NFT revolution has proven to be unstoppable, and it seems everyone wants in. NFT creators are spending countless efforts in developing projects, and digital assets owners are failing to profit from their collectibles.
                </p>
                <p>
                While most of these projects are remarkable, they are failing to secure exposure and reach a solid online presence and reputation. We strongly believe that these misfortunes are closely tied to a major advertising downplay in the NFT space. In fact, recent studies have shown that about 70% of all NFT collections on NFT marketplaces have not recorded any sales.
                </p>
                <p>
                NFT Briks enables digital players to showcase their NFTs and assets to potential buyers through an online advertising platform. Powered by Ethereum and Web 3.0 technologies, NFT Briks allows users to own and resell unique advertising space or “Briks” on the platform. All 10,000 Briks are minted NFTs on Opensea giving you full ownership of the ad space 
                </p>
                <p>
                This project was started by three NFT collectors who kept finding it difficult to market their digital assets; this is about to change.
                </p>
               </div>

            <div class="col-4">
               <div class="height_aboutsame"></div>
            </div>

        </div>
    </div>
    <!-- CONTENT END -->
  
    <div class="content contentaboutbg">
        <div class="container">
            <div class="col-12">
            <h3 class="heading_bold_main">We enable digital players to showcase their NFTs and assets to potential buyers through an advertising platform</h3>
        
               <div class="buysell row">
                 <div class="col-4">
                    <img src="{{asset('img/buyandsell.png')}}" alt="screenshot">
                   <h6>
                   Buy & Sell Limited Ad Space
                   </h6>
                    <p>
                    NFT Briks offers 10,000 Briks or ad spaces that can be purchased and resold at a desired price.
                    Each Brik is an actual minted NFT on Opensea
                    </p>
                 </div>
                 <div class="col-4">
                    <img src="{{asset('img/speaker.png')}}" alt="screenshot">
                    <h6>Advertise Digital 
                      Assets
                    </h6>
                    <p>
                    NFT Briks allows users to promote their digital assets by owning ad space and showcasing their content to potential buyers
                    </p>
                 </div>
                 <div class="col-4">
                    <img src="{{asset('img/searchzoom.png')}}" alt="screenshot">
                   <h6>Monitor Digital Assets Performance
                    </h6>
                    <p>
                    NFT Briks provides a monitoring command center to track advertised digital assets performance 
                    </p>
                 </div>
               </div>
            </div>
        </div>
    </div>

    <!-- <div class="content">
        <div class="container">
            <div class="col-12">
            
                <div class="video_wrap">
                    <iframe width="100%" height="420" src="https://www.youtube.com/embed/yAoLSRbwxL8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div> -->
    <!-- CONTENT -->
    <div class="content howitworks"  id="howitswork">
        <div class="container">
            <div class="col-12">
                <h5>How it Works: Easy as 1, 2, 3…</h5>
                <h6>Step 1: Sign Up </h6>
                <ul>
                    <li>
                    Register your account by clicking on <img class="logbrik" src="./img/login_register.svg" alt=""> at the bottom left corner
                    </li> 
                    <li>
                    Answer a few questions to help us to get to know you better
                    </li>
                    <li>
                    Connect your <img src="./img/metamask.svg" alt=""> metamask account; if you do not have one, use this <button class="metamaskbtn cc" id="metamaskbtn">link</button> and follow the steps
                    </li>
                </ul>
                <h6>Step 2: Select & Mint Briks</h6>
                <ul>
                    <li>Choose your brik by clicking on the desired space on the wall</li>
                    <li>
                        Adjust the brik width and height using the arrows in the sliding menu <img class="brikwidth" src="./img/brikswidthbrikheight.png" alt="">
                    </li>
                    <li>
                    Review brik selection and minting price
                    </li>
                    <li>
                    Hit the <img class="logbrik" src="./img/mint_brik.svg" alt=""> button to finalize your transaction and become the owner of the ad space !!
                    <br>
                    You will now be redirected to the My Briks page
                    </li>
                </ul>
                <h6>Step 3: Customize Your Briks</h6>
                <ul>
                    <li>
                    Customize your new brik by filling the required fields (You can always edit these fields later); You will be charged with a minimal gas fee to update the NFT content on Opensea
                    </li>
                    <li>
                    Once done, these changes will be reflected on NFTbriks and Opensea
                    </li>
                    <li>
                    You can view and track your NFT on Opensea by clicking on the <img class="openn" src="./img/opensea.jpg" alt=""> button
                    </li>
                </ul>
                <p>
                Do not hesitate to <a class="cc" href="/contact">contact us</a> if you face any issues
                </p>
                </div>

            <div class="nft_faqs">
                <h5 class="faqsheading">Frequently asked questions</h5>
                <div class="faqs-6">
                    <div class="accordion">
                        <div class="accordion-item accordion-section">
                            <a href="#accordion-1" class="accordion-section-title ">What are Non Fungible Tokens (NFTs)?</a>
                            <div class="content accordion-section-content open" style="display: none;" id="accordion-1">
                                <p>
                                    The acronym NFT stands for “non-fungible token.” 
                                    Similar to cryptocurrencies like Bitcoin, NFTs are digital assets that can be purchased, sold, and traded at will, just as you could anything else you owned.
                                    As you might surmise from the word “token,” NFTs are indeed tokenized. This means that each one is unique and unlike any other, including other versions of the asset the NFT is based on. 
                                    When something is tokenized, it’s attached to a digital certificate of ownership that proves as much.
                                    However, to truly grasp NFTs, you also need to understand what the term “fungible” means. 
                                    If something is fungible, it can easily be exchanged for something similar or equal to it in value. (Bitcoin is an excellent example of a fungible digital asset, as each Bitcoin is equal in value to every other.)

                                   <b class="d-block"> A non-fungible asset, on the other hand, is one of a kind and has no equivalent. </b>
                                </p>
                            </div>
                        </div>
                        <div class="accordion-item accordion-section">
                            <a href="#accordion-2" class="accordion-section-title">What are Briks? </a>
                            <div class="content accordion-section-content" style="display: none;" id="accordion-2">
                                <p>
                                    Briks are ad spaces that are bought and sold on NFT Briks. There are 10,000 initial Briks up for grabs on the platform.
                                    When a user buys a Brik, he becomes the owner of the ad space and the correspondent NFT on Opensea.
                                    The user can simultaneously buy multiple Briks and benefit from a larger ad space to promote his/her assets or to profit from reselling the ad space at a higher price in the future
                                </p>


                            </div>
                        </div>
                        <div class="accordion-item accordion-section">
                            <a href="#accordion-3" class="accordion-section-title">What are Brik tiers? </a>
                            <div class="content accordion-section-content" style="display: none;" id="accordion-3">
                                <p>
                                    Tiers are reflective to the Briks positions on the canva. Briks are divided into 4 tiers:
                                    <ul>
                                        <li>
                                            - Regular 
                                        </li>
                                        <li>
                                            - Premium
                                        </li>
                                        <li>
                                            - Rare
                                        </li>
                                        <li>
                                            - Ultra Rare
                                        </li>
                                    </ul>
                                </p>
                                <p>   
                                    Regular Briks are the most common, and are distributed on the outer layers of the canva. 
                                    Premium and Rare Briks are scarcier and benefit from more central positions on the canva
                                    Ultra Rare Briks are the hottest pieces of property on NFT Briks. They potentially benefit from the highest exposure on the platform and are very limited 
                                </p>
                            </div>
                        </div>
                  
                        <div class="accordion-item accordion-section">
                            <a href="#accordion-5" class="accordion-section-title">How do I deposit money in my account?</a>
                            <div class="content accordion-section-content" style="display: none;" id="accordion-5">
                                <p>
                                To deposit money into your account, you can follow the following steps:
                                </p>
                                <ul>
                                    <li>                                   
                                        1- Log in to your account.  If you do not have an account, you can register via this link
                                    </li>
                                    <li>
                                        2- Connect your Metamask wallet. If you do not have a Metamask wallet, you can use this link to download the plug-in on your browser <a href="https://metamask.io/download/"> https://metamask.io/download/ </a>
                                    </li>
                                    <li>
                                        3- Deposit money in your metamask wallet. You can easily buy tokens directly within MetaMask by clicking “Buy”
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="accordion-item accordion-section">
                            <a href="#accordion-8" class="accordion-section-title">When I purchase a Brik do I have to insert an image into it?</a>
                            <div class="content accordion-section-content" style="display: none;" id="accordion-8">
                              <p>
                                No. You can purchase a Brik to solely own the ad space. The ad space can be left empty or be repopulated with a digital asset to promote in the future
                              </p>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="faqs-6">
                    <div class="accordion">
                        <div class="accordion-item accordion-section">
                            <a href="#accordion-6" class="accordion-section-title">What is Metamask?</a>
                            <div class="content accordion-section-content" style="display: none;" id="accordion-6">
                              <p>
                                MetaMask is a browser plugin that serves as an Ethereum wallet, and is installed like any other browser plugin. Once it's installed, it allows users to store Ether and other ERC-20 tokens, enabling them to transact with NFT Briks
                              </p>
                            </div>
                        </div>
                        <div class="accordion-item accordion-section">
                            <a href="#accordion-7" class="accordion-section-title">How do I purchase a Brik?</a>
                            <div class="content accordion-section-content" style="display: none;" id="accordion-7">
                              <p>
                                Firstly, you need to be logged in to your account. If you do not have an account, you can register via this <a href="#">link</a>
                                To purchase Briks, choose the desired space on the canva, adjust height and width of the ad space using the arrows in the sliding menu and hit the "Mint Token" button. Complete the transaction and become the owner of the ad space
                              </p>
                             </div>
                        </div>
                     
                        <div class="accordion-item accordion-section">
                            <a href="#accordion-9" class="accordion-section-title">When I purchase a Brik do I become an NFT owner?</a>
                            <div class="content accordion-section-content" style="display: none;" id="accordion-9">
                              <p>
                                 Yes. When purchasing a Brik, you become the owner of the ad space on the platform and the corresponding NFT on Opensea
                              </p>
                             </div>
                        </div>
                        <div class="accordion-item accordion-section">
                            <a href="#accordion-10" class="accordion-section-title">How do I profit from owning a Brik?</a>
                            <div class="content accordion-section-content" style="display: none;" id="accordion-10">
                              <p>
                              NFT Briks offers a exceptional opportunity for users to make significant profit.  
                              The number of available Briks is limited to 10,000. The potential increasing demand on Briks combined with scarce supply will drive ad space prices up, thus making investors profit from the future reselling of their Briks
                              </p>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT END -->



    <!-- FOOTER -->
    <footer>
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
