<div class="leftsidebar">
    <div class="closebtn">
        <a href="#" class="closeicon">
        <img  src="./img/cross.png" alt="">
        </a>
    </div>

    <div class="bg_title">
        <img class="imgnone" src="./img/bg-none.png" alt="">
        <img class="imghas" src="./img/bg_sidbar.png" alt="">
    </div>
    <div class="contentdata">
        <div class="boxcontent buyercontent">
            <p class="tokennumber">
                BRIK <span class="tokennumberspan">#2838</span>
            </p>
            <h3 class="titlecontent">
                Red Bull
            </h3>
            <a href="#" class="titleLink">
                https://redbull.com
            </a>
        </div>
        <div class="boxcontent detailcontenttext">
            <div>
                <p class="detialcontent ">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
                    sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                </p>
            </div>
          
        </div>
        <div class="boxcontent">
        <ul class="listingcontent">
            <li>
                <h6>
                    OWNED BY
                </h6>
                <p class="outline owned_by">0x9aA28ccE</p>
            </li>
            <li>
                <h6>
                    NFT TYPE
                </h6>
                <p class="nft_type">
                    General
                </p>
            </li>
            <li>
                <h6>
                    LISTING DATE
                </h6>
                <p class="listing_date">
                    12 April 2022
                </p>
            </li>
            <!--li>
                <h6>
                    GATEWAY LINK
                </h6>
                <p>
                    loremipsum_dm
                </p>
            </li-->
        </ul>
        </div>
        <div class="boxcontent">
        <!--div class="tokenbid">
            <img src="./img/tokentag.png" alt="">
            <h5>
                Bid on Brik
            </h5>
        </div-->
        <h4 class="headingcontetnt">View On</h4>
        <ul class="listingcontent listimagescan">
            <li>
                <a id="ether_scan" href="#" target="_blank">
                    <img src="./img/view1.svg" alt="">
                </a>
            </li>
            <li>
                <a id="open_sea" href="#" target="_blank">
                    <img src="./img/view2.svg" alt="">
                </a>
            </li>
        </ul>
        <!-- <p class="helpcontent">
            Please connect your account to view more options
        </p> -->
        <h4 class="headingcontetnt">Share</h4>
        <ul class="socialcontent">
            <!-- <li>
                <a href="#" target="_blank" class="socialicon">
                    <img src="{{asset('/img/fb.svg')}}" alt="">
                </a>
            </li> -->
            <li>
                <a href="https://twitter.com/nft_briks" target="_blank" class="socialicon">
                    <img src="{{asset('/img/tw.svg')}}" alt="">
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/nft_briks/" target="_blank" class="socialicon">
                    <img src="{{asset('/img/insta_icon.png')}}" alt="">
                </a>
            </li>
            <li>
                <a href="#" class="socialicon">
                    <img src="{{asset('/img/discord-grey.svg')}}" alt="">
                </a>
            </li>
            <li>
                <a href="#" class="socialicon">
                    <img src="{{asset('/img/reddit-grey.svg')}}" alt="">
                </a>
            </li>
        </ul>
        </div >
    </div>

    <div class="salecontent">
        <div class="salebox">
            <h6 class="hottag">
                Selected
            </h6>
            <p class="saletoken" id="brick-name">
                Brik # 528
            </p>
            <p class="salextext" id="brick-detail">                
                The selection gives you full ownership of brik 528
            </p>
        </div>
        <div class="salebox bg-light">
            <ul class="counterwh">
                <li>
                    <p>Brik Width</p>
                    <div class="input-group-control">
                        <button type="button" value="quantity1" id="width-quantity-minus" class="quantity-minus" data-type="minus" data-field="">
                            <img src="./img/minusicon.svg" alt="">
                        </button>
                        <input type="text" id="quantity1" name="quantity" class="form-control" value="1" >
                        <button type="button" value="quantity1" id="width-quantity-plus" class="quantity-plus" data-type="plus" data-field="">
                            <img src="./img/plusicon.svg" alt="">
                        </button>
                    </div>
                </li>
                <li>
                    <p>Brik Height</p>
                    <div class="input-group-control">
                        <button type="button" value="quantity2" id="height-quantity-minus" class="quantity-minus" data-type="minus" data-field="">
                            <img src="./img/minusicon.svg" alt="">
                        </button>
                        <input type="text" id="quantity2" name="quantity2" class="form-control" value="1" >
                        <button type="button" value="quantity2" id="height-quantity-plus" class="quantity-plus" data-type="plus" data-field="">
                            <img src="./img/plusicon.svg" alt="">
                        </button>
                    </div>
                </li>
            </ul>
            <ul class="tokenrate">
                <li class="heading" id="reb-label" style="display:none;">
                    Regular Briks
                </li>
                <li id="reb-price" style="display:none;">
                    <p id="current-brick-label-1">
                        Selected Brik Price
                    </p>
                    <p>
                        = <span class="result" id="current-brick-1">0.01</span>
                    </p>
                </li>
                <li id="reb-total" style="display:none;">
                    <p >
                        Minted Briks
                    </p>
                    <p>
                        <span class="result" id="total-bricks-1">1</span>
                    </p>
                </li> 
                
                <li class="heading heading2" id="pb-label" style="display:none;">
                    Premium Briks
                </li>

                <li id="pb-price" style="display:none;">
                    <p id="current-brick-label-2">
                        Selected Brik Price
                    </p>
                    <p>
                        = <span class="result" id="current-brick-2">0.01</span>
                    </p>
                </li>
                <li id="pb-total" style="display:none;">
                    <p >
                        Minted Briks
                    </p>
                    <p>
                        <span class="result" id="total-bricks-2">1</span>
                    </p>
                </li> 


                <li class="heading heading2" id="rb-label" style="display:none;">
                    Rare Briks
                </li>

                <li id="rb-price" style="display:none;">
                    <p id="current-brick-label-3">
                        Selected Brik Price
                    </p>
                    <p>
                        = <span class="result" id="current-brick-3">0.01</span>
                    </p>
                </li>
                <li id="rb-total" style="display:none;">
                    <p >
                        Minted Briks
                    </p>
                    <p>
                        <span class="result" id="total-bricks-3">1</span>
                    </p>
                </li> 


                <li class="heading heading2" id="urb-label" style="display:none;">
                    Ultra Rare Briks
                </li>

                <li id="urb-price" style="display:none;">
                    <p id="current-brick-label-4">
                        Selected Brik Price
                    </p>
                    <p>
                        = <span class="result" id="current-brick-4">0.01</span>
                    </p>
                </li>
                <li id="urb-total" style="display:none;">
                    <p >
                        Minted Briks
                    </p>
                    <p>
                        <span class="result" id="total-bricks-4">1</span>
                    </p>
                </li> 

                <li class="totalprice bold" >
                    <p>
                        Total price
                    </p>
                    <p>
                        =<span class="result" id="total-bricks-price">0.00</span>
                    </p>
                </li>
                <!--li class="bold">
                    <p>CONNECTED ACCOUNT BALANCE</p>
                    <p>
                        = <span id="wallet-balance-span">0.000</span>
                    </p>
                </li-->
            </ul>
        @if (Auth::check())
            <button  class="tokenbtn" id="tokenbtn">
                <span class="icon">
                    <img src="./img/tag.svg" alt="">
                </span>
                <span>Mint Briks</span>
            </button>
        @else
            <button  class="tokenbtn token-active sidebar-login" id="sidebar-login">
                
                <span>Login</span>
            </button>
        @endif
        <button  class="metamaskbtn" id="metamaskbtn">
            <span class="icon">
                <img src="./img/metamask.svg" alt="">
            </span>
        <span id="metamaskbtnspan">Connect with MetaMask</span>
        </button>
        <p class="info" id="wallet_connect">
            Please connect your account to mint Briks
        </p>
        </div>
        <!--div class="salebox">
            <p class="cautions">
                <span class="icon">
                    <img src="./img/caution.svg" alt="">
                </span>
                You do not have enough ETH in your connected wallet. Please add some funds, refresh and try again.
            </p>
            <p class="cautions">
                <span class="icon">
                    <img src="./img/caution.svg" alt="">
                </span>
                These Briks have already been minted: 4042, 4043
            </p>
        </div-->
    </div> 
    <div class="confirmorder">
        <div class="salebox">
            <p class="saletoken">
                Confirm Order
            </p>
            <h5 class="selectoken" id="sale-selected-token">
                SELECTED 24 Briks
            </h5>
            <ul class="ordertokenul" id="sale-total-bricks">
            </ul>
        </div>
        <div class="salebox bg-light">
        
            <ul class="tokenrate">
                <li>
                    <p>
                        Brik Width
                    </p>
                    <p>
                        <span class="result brick-width">1</span>
                    </p>
                </li>
                <li>
                    <p>
                        Brik Height
                    </p>
                    <p>
                        <span class="result brick-height">8</span>
                    </p>
                </li>
                <!--li>
                    <p>
                        Current Brik price
                    </p>
                    <p>
                        = <span class="result">0.01</span>
                    </p>
                </li-->
                <li>
                    <p>
                        Minted Briks
                    </p>
                    <p>
                        <span class="result total-brick-sale">1</span>
                    </p>
                </li> 
                <li class="totalprice bold">
                    <p>
                        Total price
                    </p>
                    <p>
                        =<span class="result total-price-sale">0.10</span>
                    </p>
                </li>
                <!--li class="bold">
                    <p>CONNECTED ACCOUNT BALANCE</p>
                    <p>
                        = <span id="wallet-balance-span-sale">0.000</span>
                    </p>
                </li-->
            </ul>
            <button  class="tokenbtn" id="buynow" disabled="disabled">
                <span class="icon">
                    <img src="./img/cart.svg" alt="">
                </span>
            <span>Buy Now</span>
            </button>
            <div class="agreeemnt">
                <input class="styled-checkbox"  id="styled-checkbox-1" type="checkbox" value="value1">
                <label for="styled-checkbox-1">I agree to the <a href="{{route('terms-conditions')}}">Terms of Service</a> & <a href="{{route('privacy-policy')}}">Privacy Policy</a></label>
            </div>
        </div>
        <div class="salebox">
            <a href="{{route('how-it-works') }}" class="needtoknow">Need help purchasing? </a>
            <!-- <a href="#" class="needtoknow">Rather purchase with USD?</a> -->
            <a href="mailto:info@nftbriks.com" class="needtoknow">Contact us at info@nftbriks.com</a>
        </div>
    </div>
    <div class="uploadnft" style="display: none;">
        <div class="salebox">
            <p class="saletoken">
                Upload NFT
            </p>
            <P>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error!
            </P>
        </div>
        <div class="salebox bg-light">
            <h5 class="selectoken">
                SIZE 3 X 8 BRIKS
            </h5>
            <ul class="ordertokenul">
                <li>#2323</li>
                <li>#4343</li>
                <li>#2323</li>
                <li>#4343</li>
                <li>#2323</li>
                <li>#4343</li>
                <li>#2323</li>
                <li>#4343</li>
            </ul>
            <p class="mt-3">
                Image size: 300 x 800 pixels
            </p>
            <div class="input-group custom-file-button">
                <label class="input-group-text" for="inputGroupFile">Upload Image</label>
                <input type="file" class="form-control" id="inputGroupFile">
            </div>
            <form action="#">
                <div class="form_group">
                    <input type="text" name="listname">
                    <label for="#">Listing Name</label>
                </div>
                <div class="form_group">
                    <select name="#">
                        <option value="#" selected disabled>NFT Type</option>
                        <option value="#">Type 01</option>
                        <option value="#">Type 02</option>
                        <option value="#">Type 03</option>
                        <option value="#">Type 04</option>
                    </select>
                </div>
                <div class="form_group">
                    <input type="text" name="siteurl">
                    <label for="#">Website URL</label>
                </div>
                <div class="form_group textarea">
                    <textarea name="Description"></textarea>
                    <label for="#">Description</label>
                </div>
                <div class="form_group">
                    <button class="publishnft">
                        <span class="icon">
                            <img src="./img/upload.svg" alt="">
                        </span>
                    <span>Publish NFT</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="uploadmanage" style="display: none;">
        <div class="salebox">

            <p class="saletoken">
                Upload/Manage
            </p>
            <P>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error!
            </P>
        </div>
        <div class="salebox boxwithcart">
            <div class="carcard">
                <div class="carttitle">
                    <p class="title">
                        UniX Gaming
                    </p>
                    <div class="clickevent">
                        <a href="#">
                            <img src="./img/edit.svg" alt="">
                        </a>
                        <a href="#">
                            <img src="./img/delete.svg" alt="">
                        </a>
                    </div>
                </div>
                <ul class="ordertokenul">
                    <li>#2323</li>
                    <li>#4343</li>
                    <li>#2323</li>
                    <li>#4343</li>
                    <li>#2323</li>
                    <li>#4343</li>
                    <li>#2323</li>
                    <li>#4343</li>
                </ul>
                <div class="img_media">
                    <div class="imgportion">
                        <img src="img/2x_01.png" alt="">
                    </div>
                    <div class="img_detail">
                        <h6>NFT TYPE</h6>
                        <p>
                            General
                        </p>
                        <h6>LISTING DATE</h6>
                        <p class="date">12 April 2022</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

</div>    