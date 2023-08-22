let URLArray;
let brick_order_id
$(window).on('load', function(){
   URLArray=window.location.href.split("?");
  if(URLArray.length > 1){
    $('.upload-nft').trigger('click');   
  }
    connectWallet();
    getcontractJson();
    getTotalOrderCount();
})
$('.upload-nft').click(function(e){
  console.log($(this).data('id'));
  if(URLArray.length > 1){
     brick_order_id = URLArray[1].replace("show=", "");
  }else{
     brick_order_id = $(this).data('id');
  }
    $("#upload_nft_form #brick_order_id").val(brick_order_id);
    let getorderdetail = route('boxes.getorderdetail', {id: brick_order_id});
    sendRequest(getorderdetail,'GET',{},'getupload');

    if($('#kt_modal_add_user').css('display') == 'none')
      {
        $("#kt_modal_add_user .briksimage").removeClass("image-input-empty");
      }
});
$('#upload_nft_form').submit(function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    let route = $("#upload_nft_form").attr('action');
    // if(uploadFormValidator(formData,route) == false){
    //     return false;
    // }
    jQuery('.loader2').show();
    sendRequest(route,'POST',formData,'upload');
});

function sendRequest(route,method,data={},response_flag = 'upload'){
  console.log('data', data);
    jQuery.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: route,
      data: data,
      type: method,
      cache: false,
      processData: false,
      contentType: false,
      success: function (response) {
            if(response_flag == 'upload'){
                if(response.status != false){
                    setTtokenURI(response.data.token_id,response.data.metadata);
                    return false;
                }
                jQuery('.loader2').hide();
                toastr.error("Please Upload the image");
                
            }else if(response_flag == 'getupload'){
                $("#listing_name").val(response.data.title);
                $("#nft_type").val(response.data.nft_type_id);
                $("#nft_type").select2().trigger('change')
                $("#website_url").val(response.data.website_url);
                $("#description").val(response.data.description);
                var local_server_image = 'img/logo.svg';
                if(response.data.local_server_image != 1){
                    local_server_image = response.data.local_server_image;
                }
                $("#upload_nft_form #image_url_hidden").val(local_server_image);
                $("#upload_nft_form .image-input-wrapper").css("background-image", "url()");
                $("#upload_nft_form .image-input-wrapper").css("background-image", "url('" + BASE_URL + local_server_image + "')");
                $("#kt_modal_add_user").modal('show');
            }
        },
      error: function (xhr, ajaxOptions, thrownError) {
          jQuery('.loader2').hide();
          errorMessage(xhr)
      }
    });
}

function uploadFormValidator(data,route){
    if(data.get('image_url').name == '' && $("#image_url_hidden").val() == ''){
        toastr.error("NFT image is required");
        return false;
    }

    if(data.get('listing_name') == ''){
        toastr.error("Listing name is required");
        return false;
    }
    
    if(data.get('nft_type')  == ''){
        toastr.error("NFT type is required");
        return false;
    }

    // if(data.get('website_url')  == ''){
    //     toastr.error("Webiste URL is required");
    //     return false;
    // }

    if(data.get('description')  == ''){
        toastr.error("Description is required");
        return false;
    }
    
    if(route == ""){
    toastr.error("Something went wrong");
    return false;
    }
}




function errorMessage(xhr) {
    if (xhr.status == '401') {
        toastr.error("You are not authorized to access this resource");
    } else {
        toastr.error(xhr.responseJSON.message);
    }
}


// POPUP 
jQuery('.right_nav a').click(function(){
  if (jQuery('.popup').is(':visible') == true) {
    jQuery('.popup').hide();
  } else{
    jQuery('.popup').show();
  }
});

// Register POPUP
jQuery('.right_nav a.register').click(function(){
  jQuery('.popup').find('.login_content').hide();
  jQuery('.popup').find('.register_content').show();
});

// LOGIN POPUP
jQuery('.right_nav a.login, .popup .popup_container .login a').click(function(){
  jQuery('.popup').find('.login_content').show();
  jQuery('.popup').find('.register_content').hide();
});

jQuery('.sidebar-login').click(function(){
  event.stopPropagation();
  jQuery('.popup').show();
  jQuery('.login_content').show();
  jQuery('.register_content').hide();
})

jQuery('.login-popup-register').click(function(event){
  jQuery('.popup').show();
  jQuery('.login_content').hide();
  jQuery('.register_content').show();
});

// HIDE POPUP 
$(document).mouseup(function(e){
  var container = $(".popup_container, .right_nav a, .menu_button, .menu nav");
  if(!container.is(e.target) && container.has(e.target).length === 0){
    $(".menu_button").removeClass('active');
    $(".menu_button").parents('.menu').find('nav').hide();
    $(".popup").hide();
  }
});

  $(".form_group input, .form_group textarea").focusout(function(){
    if($(this).val() != ""){
      $(this).siblings('label').addClass("has_val");
    }else{
      $(this).siblings('label').removeClass("has_val");
    }
  });
  
  $(".form_group input ~ label, .form_group textarea ~ label").on('click focus',function(){
      $(this).addClass("has_val");
      $(this).prev("input").focus();
      $(this).prev("textarea").focus();
  });


$(document).on('click','.show_pass',function(){
  if($(this).parent().find('input[type="password"]') && !$(this).hasClass('active')){
    $(this).addClass('active');
    $(this).parent().find('input[type="password"]').attr('type', 'text');
  } else{
    $(this).removeClass('active');
    $(this).parent().find('input[type="text"]').attr('type', 'password');
  }
});

$(".homelinker ul li a").on('click',function() {
  $(".homelinker ul li a").removeClass("active");
  $(this).addClass("active");
});

function getTotalOrderCount(){
  let getTotalOrderCountRoute = route('boxes.totalordercount');
  $.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: getTotalOrderCountRoute,
    type: 'GET',
    cache: false,
    success: function (response) {
      $(".counter_block_status").html(response.data.sold_boxes+'/'+response.data.total_boxes+' Briks Minted');
      $(".red_bar").css('width',response.data.percentage+'px');
    },
    error: function (xhr, ajaxOptions, thrownError) {
        errorMessage(xhr);
    }
  }); 
}


$('.tab-menu li a').on('click', function(){
  var target = $(this).attr('data-rel');
$('.tab-menu li a').removeClass('active');
  $(this).addClass('active');
  $("#"+target).fadeIn('slow').siblings(".tab-box").hide();
  return false;
});


function hideUploadNFTPopup(){
  if(URLArray.length > 1){
    window.location.href = window.location.origin+window.location.pathname;
  }else{
    $("#kt_modal_add_user").modal('hide');
 
  }
  
}

$('.tab-menu2 li a').on('click', function(){
  var target = $(this).attr('data-rel');
$('.tab-menu2 li a').removeClass('active');
  $(this).addClass('active');
  $("#"+target).fadeIn('slow').siblings(".tab-box2").hide();
  return false;
});