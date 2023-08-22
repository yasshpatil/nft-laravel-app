// VARIABLES	
var boxIndex;	
var quantitiy=0;	
var boxWidth;	
var boxHeight;	
var ActiveBoxL;	  
var initialScale;
var scale

let firstSelectedBrickRow;	
let firstSelectedBrickColumn;
let bricksArr = [];
let totalBox = [];
let eachBoxWidth,eachBoxHeight;
const HEIGHT = 80;
const WIDTH = 125



//paste this code under head tag or in a seperate js file.
// Wait for window load
jQuery(window).on('load', function(){ 
  // Animate loader off screen  
  jQuery('.loader').fadeOut("slow");
  jQuery('.box_wrap').fadeIn("slow");
  if(window.location.pathname == '/'){
    getTotalOrderCount();
    getNftType();
  }
  var SoldboxWidth = $('.box').outerWidth();
  var SoldboxHeight = $('.box').outerHeight();
  
  $('.box_wrap .box_container .box.box-sold').each(function(){
    var imageWidth =  $(this).find('img').attr('width');
    var imageHeight =  $(this).find('img').attr('height');
    var imageWidthSingle =  $(this).find('img').attr('data-single-width');
    var imageHeightSingle =  $(this).find('img').attr('data-single-height');

    var data_bricks_width =  $(this).find('img').attr('data-bricks-width');
    var data_bricks_height =  $(this).find('img').attr('data-bricks-height');
    $(this).find('img').css('width', (data_bricks_width*SoldboxWidth).toFixed(4) + 'px');
    $(this).find('img').css('height', (data_bricks_height*SoldboxHeight).toFixed(4) + 'px');

    // if(imageWidth && imageHeight && imageWidthSingle && imageHeightSingle){
    //   var ActualimageWidth = (imageWidth.split('px')[0] / imageWidthSingle.split('px')[0]);
    //   var ActualimageHeight = (imageHeight.split('px')[0]  / imageHeightSingle.split('px')[0]);
    //   $(this).find('img').attr('width', (ActualimageWidth*SoldboxWidth).toFixed(4) + 'px');
    //   $(this).find('img').attr('height', (ActualimageHeight*SoldboxHeight).toFixed(4) + 'px');
    // }
  });
  jQuery(window).resize();
});

$(window).on('load', function(){
  if(document.getElementById('panzoom') != null){
    var scrollHeight = document.getElementById('panzoom').scrollHeight;
    var offsetHeight = document.getElementById('panzoom').offsetHeight;	
    r = (offsetHeight / scrollHeight);
    initialScale = r;
    $('#panzoom').css({
        '-webkit-transform': 'scale(' + initialScale + ')',
        '-moz-transform': 'scale(' + initialScale + ')',
        '-ms-transform': 'scale(' + initialScale + ')',
        '-o-transform': 'scale(' + initialScale + ')',
        'transform': 'scale(' + initialScale + ')'
    });  
    scale = initialScale;
  }
});
$(document).ready(function() {
  function close_accordion_section() {
      $('.accordion .accordion-section-title').removeClass('active');
      $('.accordion .accordion-section-content').slideUp(300).removeClass('open');
  }

  $('.accordion-section-title').click(function(e) {
      // Grab current anchor value
      var currentAttrValue = $(this).attr('href');

      if($(e.target).is('.active')) {
          close_accordion_section();
      }else {
          close_accordion_section();

          // Add active class to section title
          $(this).addClass('active');
          // Open up the hidden content panel
          $('.accordion ' + currentAttrValue).slideDown(300).addClass('open');
      }

      e.preventDefault();
  });
});




jQuery('.filters .filter_trigger').click(function(){
  if (jQuery('.filters.active').length == true) {
    jQuery('.filters').removeClass('active');
    jQuery('.filters').find('.filter_trigger').find('img').attr('src', 'img/Archive/FILTER-1.svg');
  } else{
    jQuery('.filters').addClass('active');
    jQuery('.filters').find('.filter_trigger').find('img').attr('src', 'img/Archive/FILTER2.svg');
  }
});


  
  // SLICK SLIDER
$('.slider.lazy').slick({
  lazyLoad: 'ondemand',
  slidesToShow: 60,
  slidesToScroll: 3,
  variableWidth: true,
});


// EMPTY INPUT ON LOAD00
// jQuery(window).on('load',function(){
//   jQuery(".form_group input:not([type='submit'])").val("");
// });  

// INPUT LABEL POSITION
$(".form_group input:not([type='date']), .form_group textarea").focusout(function(){
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

// MENU 
jQuery('.menu_button').click(function(){
  if (jQuery('.menu nav').is(':visible') == true) {
    jQuery('.menu nav').slideUp(200);
    jQuery(this).removeClass('active');
  } else{
    jQuery('.menu nav').slideDown(200);
    jQuery(this).addClass('active');
  }
});


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
// $(document).mouseup(function(e){
//   var container = $(".popup_container, .right_nav a, .menu_button, .menu nav");
//   if(!container.is(e.target) && container.has(e.target).length === 0){
//     $(".menu_button").removeClass('active');
//     $(".menu_button").parents('.menu').find('nav').hide();
//     $(".popup").hide();
//   }
// });
$(".close-popup").click(function(e){
  $(".popup").hide();
 });

jQuery('.max_min').on('click', function(){
  var scrollHeight = document.getElementById('panzoom').scrollHeight;
  var offsetHeight = document.getElementById('panzoom').offsetHeight;	
  r = (offsetHeight / scrollHeight);
  initialScale = r;
  $('#panzoom').css({
      '-webkit-transform': 'scale(' + initialScale + ')',
      '-moz-transform': 'scale(' + initialScale + ')',
      '-ms-transform': 'scale(' + initialScale + ')',
      '-o-transform': 'scale(' + initialScale + ')',
      'transform': 'scale(' + initialScale + ')'
  });
  
});

for (const divMain of document.getElementsByClassName('boxes')) {
    // drag the section
    for (const divSection of divMain.getElementsByClassName('box_container')) {
        // when mouse is pressed store the current mouse x,y
      let previousX, previousY
      divSection.addEventListener('mousedown', (event) => {
        previousX = event.pageX
        previousY = event.pageY
        $(".box_wrap .boxes .box_container .box").css("cursor","grabbing");
      })
      
      // when mouse is moved, scrollBy() the mouse movement x,y
      divSection.addEventListener('mousemove', (event) => {
          // only do this when the primary mouse button is pressed (event.buttons = 1)
          
          event.stopPropagation();
          event.preventDefault();
        if (event.buttons) {
          let dragX = 0
          let dragY = 0
          // skip the drag when the x position was not changed
          if (event.pageX - previousX !== 0) {
            dragX = previousX - event.pageX
            previousX = event.pageX
          }
          // skip the drag when the y position was not changed
          if (event.pageY - previousY !== 0) {
            dragY = previousY - event.pageY
            previousY = event.pageY
          }
          // scrollBy x and y
          if (dragX !== 0 || dragY !== 0) {
            divMain.scrollBy(dragX, dragY)
          }
        }
      })
    }
    // var ScaleVal;
    // setTimeout(function(){
      
    //   if($('.box_container[style]').length){
    //     ScaleVal = $('.box_container[style]').attr('style').split('scale(')[1].replace(');', '');
    //   } else{
    //     ScaleVal = 0.570603;
    //   }
      
    // },1000);
    // console.log('ScaleVal', ScaleVal);
      
    // zoom in/out on the section
    const max_scale = 3;
    const factor = 0.3;
    var currentposition = 50;
  
    function transformoriginzero() {
      $(".box_container").css(
        {
        '-moz-transform-origin': '0 0',                
        'transform-origin':'0 0',                   
        '-ms-transform-origin':'0 0',                                
        '-webkit-transform-origin':'0 0',
      });
    }


  document.querySelector('.zoom-in').addEventListener('click',(e)=>{
      for (const divSection of divMain.getElementsByClassName('box_container')) {
        // $(".box_container").css(
        //   {
        //   '-moz-transform-origin': '0 0',                
        //   'transform-origin':'0 0',                   
        //   '-ms-transform-origin':'0 0',                                
        //   '-webkit-transform-origin':'0 0',
        //   });
        e.preventDefault();
        var delta = 120;
        delta = Math.max(-1,Math.min(1,delta)) // cap the delta to [-1,1] for cross browser consistency
            offset = {x: divMain.scrollLeft, y: divMain.scrollTop};
        image_loc = {
            x: e.pageX + offset.x,
            y: e.pageY + offset.y
        }
    
        zoom_point = {x:image_loc.x/scale, y: image_loc.y/scale}
    
        // apply zoom
        scale += delta*factor * scale
        scale = Math.min(max_scale,scale)

        zoom_point_new = {x:zoom_point.x * scale, y: zoom_point.y * scale}
        newScroll = {
            x: zoom_point_new.x - e.pageX,
            y: zoom_point_new.y - e.pageY
        }
        console.log('initialScale', initialScale);
        console.log('scale', scale);
        
        
        if(scale >= initialScale){
          divSection.style.transform = `scale(${scale}, ${scale})`
          divMain.scrollTop = newScroll.y
          divMain.scrollLeft = newScroll.x
        }

        if(scale <= 1){
          currentposition = 50;
        } else if(scale <= 1.3199999999999998){
          currentposition = 55;
        } else if(scale <= 1.4519999999999997){
          currentposition = 60;
        } else if(scale <= 1.5971999999999997){
          currentposition = 65;
        } else if(scale <= 1.7569199999999996){
          currentposition = 70;
        } else if(scale <= 1.9326119999999996){
          currentposition = 75;
        } else if(scale <= 2.1258731999999996){
          currentposition = 80;
        } else if(scale <= 2.3384605199999995){
          currentposition = 85;
        }  else if(scale <= 2.5723065719999996){
          currentposition = 90;
        } else if(scale <= 2.8295372291999996){
          currentposition = 95;
        } else if(scale <= 3){
          currentposition = 100;
        } else{
          currentposition = 50;
        }
        document.getElementById('zoom_percentage').innerHTML = currentposition + "%"; 
     }
  });

  document.querySelector('.zoom-out').addEventListener('click',(e)=>{
      for (const divSection of divMain.getElementsByClassName('box_container')) {
        e.preventDefault();
        var delta = -120;
        delta = Math.max(-1,Math.min(1,delta)) // cap the delta to [-1,1] for cross browser consistency
            offset = {x: divMain.scrollLeft, y: divMain.scrollTop};
        image_loc = {
            x: e.pageX + offset.x,
            y: e.pageY + offset.y
        }
    
        zoom_point = {x:image_loc.x/scale, y: image_loc.y/scale}
        
        scale += delta*factor * scale
        scale = Math.min(max_scale,scale)

        if(scale <= initialScale){
          scale = initialScale;
        }

        zoom_point_new = {x:zoom_point.x * scale, y: zoom_point.y * scale}
        newScroll = {
            x: zoom_point_new.x - e.pageX,
            y: zoom_point_new.y - e.pageY
        }
        if(scale <= 1){
        } else{
          transformoriginzero();
        }
        
        if(scale >= initialScale){
          divSection.style.transform = `scale(${scale}, ${scale})`
          divMain.scrollTop = newScroll.y
          divMain.scrollLeft = newScroll.x
        }

        var scaleFixed = scale.toFixed(2);
        // if(scale <= 1.0460353203000001){
        //   currentposition = 50;
        // } else if(scale <= 1.1622614670000002){
        //   currentposition = 55;
        // } else if(scale <= 1.2914016300000002){
        //   currentposition = 60;
        // } else if(scale <= 1.4348907000000002){
        //   currentposition = 65;
        // } else if(scale <= 1.5943230000000002){
        //   currentposition = 70;
        // } else if(scale <= 1.77147){
        //   currentposition = 75;
        // } else if(scale <= 1.9683000000000002){
        //   currentposition = 80;
        // } else if(scale <= 2.1870000000000003){
        //   currentposition = 85;
        // }  else if(scale <= 2.43){
        //   currentposition = 90;
        // } else if(scale <= 2.7){
        //   currentposition = 95;
        // } else if(scale <= 3){
        //   currentposition = 100;
        // } else{
        //   currentposition = 50;
        // }
        if(scale <=  1.2567999999999997){
          // currentposition = 50;
          // //divSection.style.transform = `scale(0.5)`
          // divMain.scrollTop = newScroll.y
          // divMain.scrollLeft = newScroll.x 
          // $(".box_container").css(
          //   {
          //   '-moz-transform-origin': 'top center',                
          //   'transform-origin':'top center',                   
          //   '-ms-transform-origin':'top center',                                
          //   '-webkit-transform-origin':'top center',
          //   });
        } else if(scale <= 1.3099999999999998){
          currentposition = 55;
        } else if(scale <= 1.4519999999999997){
          currentposition = 60;
        } else if(scale <= 1.5971999999999997){
          currentposition = 65;
        } else if(scale <= 1.7569199999999996){
          currentposition = 70;
        } else if(scale <= 1.9326119999999996){
          currentposition = 75;
        } else if(scale <= 2.1258731999999996){
          currentposition = 80;
        } else if(scale <= 2.3384605199999995){
          currentposition = 85;
        }  else if(scale <= 2.5723065719999996){
          currentposition = 90; 
        } else if(scale <= 2.8295372291999996){
          currentposition = 95;
        } else if(scale <= 3){
          currentposition = 100;
        } else{
          currentposition = 50;
        }
    
        jQuery('.max_min').on('click', function(){
          // transformorigintopcenter();
        });  
        event.stopPropagation();
        event.preventDefault();
      if (event.buttons) {
        let dragX = 0
        let dragY = 0
        // skip the drag when the x position was not changed
        if (event.pageX - previousX !== 0) {
          dragX = previousX - event.pageX
          previousX = event.pageX
        }
        // skip the drag when the y position was not changed
        if (event.pageY - previousY !== 0) {
          dragY = previousY - event.pageY
          previousY = event.pageY
        }
        // scrollBy x and y
        if (dragX !== 0 || dragY !== 0) {
          divMain.scrollBy(dragX, dragY)
        }
        console.log('initialScale', initialScale);
        console.log('scale', scale);
        zoom_point = {x:image_loc.x/scale, y: image_loc.y/scale}
    
        scale += delta*factor * scale
        scale = Math.min(max_scale,scale)
        
        if(scale <= initialScale){
          scale = initialScale;
        }

        zoom_point_new = {x:zoom_point.x * scale, y: zoom_point.y * scale}
        newScroll = {
            x: zoom_point_new.x - e.pageX,
            y: zoom_point_new.y - e.pageY
        }
        
        
        if(scale >= initialScale){
          divSection.style.transform = `scale(${scale}, ${scale})`
          divMain.scrollTop = newScroll.y
          divMain.scrollLeft = newScroll.x
        }
        // if(delta > 0){
          
        //   if(scale <= 1){
        //     currentposition = 50;
        //   } else if(scale <= 1.3199999999999998){
        //     currentposition = 55;
        //   } else if(scale <= 1.4519999999999997){
        //     currentposition = 60;
        //   } else if(scale <= 1.5971999999999997){
        //     currentposition = 65;
        //   } else if(scale <= 1.7569199999999996){
        //     currentposition = 70;
        //   } else if(scale <= 1.9326119999999996){
        //     currentposition = 75;
        //   } else if(scale <= 2.1258731999999996){
        //     currentposition = 80;
        //   } else if(scale <= 2.3384605199999995){
        //     currentposition = 85;
        //   }  else if(scale <= 2.5723065719999996){
        //     currentposition = 90;
        //   } else if(scale <= 2.8295372291999996){
        //     currentposition = 95;
        //   } else if(scale <= 3){
        //     currentposition = 100;
        //   } else{
        //     currentposition = 50;
        //   }
        //   document.getElementById('zoom_percentage').innerHTML = currentposition + "%";
        // } else{
          
        //   if(scale <=  1.2567999999999997){
        //     currentposition = 50;
        //     divSection.style.transform = 'scale(0.5)'
        //     divMain.scrollTop = newScroll.y
        //     divMain.scrollLeft = newScroll.x 
            //transformorigintopcenter();
        //   } else if(scale <= 1.3099999999999998){
        //     currentposition = 55;
        //   } else if(scale <= 1.4519999999999997){
        //     currentposition = 60;
        //   } else if(scale <= 1.5971999999999997){
        //     currentposition = 65;
        //   } else if(scale <= 1.7569199999999996){
        //     currentposition = 70;
        //   } else if(scale <= 1.9326119999999996){
        //     currentposition = 75;
        //   } else if(scale <= 2.1258731999999996){
        //     currentposition = 80;
        //   } else if(scale <= 2.3384605199999995){
        //     currentposition = 85;
        //   }  else if(scale <= 2.5723065719999996){
        //     currentposition = 90; 
        //   } else if(scale <= 2.8295372291999996){
        //     currentposition = 95;
        //   } else if(scale <= 3){
        //     currentposition = 100;
        //   } else{
        //     currentposition = 50;
        //   }
        //   document.getElementById('zoom_percentage').innerHTML = currentposition + "%";  
        // }
    }
    
  }
});

divMain.addEventListener('wheel', (e) => {
  // preventDefault to stop the onselectionstart event logic
  for (const divSection of divMain.getElementsByClassName('box_container')) {
      transformoriginzero();
      if(e.stopPropagation) e.stopPropagation();
      if(e.preventDefault) e.preventDefault();
      e.cancelBubble=true;
      var delta = e.delta || e.wheelDelta;
      if (delta === undefined) {
        //we are on firefox
        delta = e.originalEvent.detail;
      }
      delta = Math.max(-1,Math.min(1,delta)) // cap the delta to [-1,1] for cross browser consistency
          offset = {x: divMain.scrollLeft, y: divMain.scrollTop};
      image_loc = {
          x: e.pageX + offset.x,
          y: e.pageY + offset.y
      }
     // console.log('initialScale', initialScale);
      //console.log('scale', scale);
      zoom_point = {x:image_loc.x/scale, y: image_loc.y/scale}
  
      scale += delta*factor * scale
      scale = Math.min(max_scale,scale)
      
      if(scale <= initialScale){
        scale = initialScale;
      }

      zoom_point_new = {x:zoom_point.x * scale, y: zoom_point.y * scale}
      newScroll = {
          x: zoom_point_new.x - e.pageX,
          y: zoom_point_new.y - e.pageY
      }
      if(scale <= 1){
        // transformorigintopcenter();
      } else{
        transformoriginzero();
      }
      
      if(scale >= initialScale){
        divSection.style.transform = `scale(${scale}, ${scale})`
        divMain.scrollTop = newScroll.y
        divMain.scrollLeft = newScroll.x
      }
  }
  
})
}
$(".tokenbtn").on('click', function() {
 $("#buynow").attr("disabled", true);
 $("#buynow").removeClass("buynow");
 $("#buynow").addClass("tokenbtn");
});
// SIDEBAR
$(".box-for-sale").on('click', function() {
  let getBoxDetailRoute = route('boxes.getboxdetail');
  totalBox= [];
  bricksArr = [];
  bricksArr.push($(this).data('box'));
  let data =  {ids:bricksArr};
  sendRequest(getBoxDetailRoute,'POST',data);
  $(".box").removeClass("active");
  //$('.box').html('');
  firstSelectedBrickRow = $(this).data('row');
  firstSelectedBrickColumn = $(this).data('column');
  localStorage.setItem('parent_brick',"#box_"+firstSelectedBrickRow+'_'+firstSelectedBrickColumn);
  boxIndex = $(this).index() + 1;
  jQuery('input#quantity1').val(1);
  jQuery('input#quantity2').val(1);  
  $('.box:nth-child('+boxIndex+')').addClass('active');
  boxWidth = $('.box:nth-child('+boxIndex+')').outerWidth();
  boxHeight = $('.box:nth-child('+boxIndex+')').outerHeight();
  $('.box:nth-child('+boxIndex+')').html('<span class="border_box" style="width:'+boxWidth+'px;height:'+boxHeight+'px"></span>');
  $(".leftsidebar").addClass("active");
  jQuery('.mobile-overlay').addClass('active');
  $(".contentdata").hide();
  $(".bg_title").hide();
  $(".salecontent").show();
  
  $(".imgnone").show();
  $(".imghas").hide();
  $(".box_wrap .boxes .box_container .box").css("cursor","pointer");
});

$(".box-sold").on('click', function() {
  let getBoxDetailRoute = route('boxes.getboxdetail');
  totalBox= [];
  bricksArr = [];
  bricksArr.push($(this).data('box'));
  let data =  {ids:bricksArr};
  sendRequest(getBoxDetailRoute,'POST',data);
  $(".box_wrap .boxes .box_container .box").css("cursor","pointer");
});

// OPEN SIDEBAR BASE ON IMAGE
function soldBrickPopup(isSold) {
  
  $(".leftsidebar").toggleClass("active");
  if(isSold){
    $(".leftsidebar").addClass("active");
  }
  $(".contentdata").show();
  $(".bg_title").show();
  $(".salecontent").hide();
  jQuery('.mobile-overlay').toggleClass('active');
  $(".imgnone").hide();
  $(".imghas").show();
};

// OPEN TOKEN BAR
$("#tokenbtn").on('click', function() {

  $('.agreeemnt input[type="checkbox"]:checked').prop('checked',false);
  let total_bricks_price=localStorage.getItem('t_p');

  if(balanceVal == undefined){
    $("#tokenbtn").removeClass("token-active");
    toastr.error("Please connect your wallet");
    return false;
  }
  if(balanceVal <= 0){
    $("#tokenbtn").removeClass("token-active");
    toastr.error("You do not have enough balance in your connected wallet. Please add some funds, refresh and try again.");
    return false;
  }

  if(balanceVal <= total_bricks_price){
    $("#tokenbtn").removeClass("token-active");
    toastr.error("You do not have enough balance in your connected wallet. Please add some funds, refresh and try again.");
    return false;
  }

  $("#tokenbtn").addClass("token-active");

  $(".contentdata").hide();
  $(".bg_title").hide();
  $(".salecontent").hide();
  $(".confirmorder").show();

   mintBricks();
});

// OPEN BUY NOW PANEL
// $(".buynow").on('click', function() {
//   $(".contentdata").hide();
//   $(".bg_title").hide();
//   $(".salecontent").hide();
//   $(".confirmorder").hide();
//   $(".uploadnft").show();
// });

// PUBLIC SHIFT
$(".publishnft").on('click', function() {
  $(".contentdata").hide();
  $(".bg_title").hide();
  $(".salecontent").hide();
  $(".confirmorder").hide();
  $(".uploadnft").hide();
  $(".uploadmanage").show();
});

// CLOSE SIDEBAR
$(".closeicon").on('click', function() {
  jQuery('.mobile-overlay').removeClass('active');
  $(".leftsidebar").removeClass("active");
  $(".box").removeClass("active");
  //$('.box').html('');
  $(".box_wrap .boxes .box_container .box").css("cursor","auto");
});

// HIDE SIDEBASE BASE ON OVERLAY
jQuery('.mobile-overlay').on('click', function () {
  jQuery('.mobile-overlay').removeClass('active');
  $(".leftsidebar").removeClass("active");
  $(".box").removeClass("active");
  //$('.box').html('');
});


jQuery('.dropdown-menu a').click(function(){
  var t = $(this).text();
  //return $(this).text().replace("contains", "hello everyone"); 
  $(this).parents(".dropdown-menu").siblings('.menuitem').children("b").empty();
  $(this).parents(".dropdown-menu").siblings('.menuitem').children("b").append(t);
  $('.resetbutton .changetext').text("Clear");	
  $(".resetbutton img").attr("src", "./img/reset.svg");
});
jQuery('.resetbutton').click(function(){
  $('.resetbutton .changetext').text("Search");	
  $(".filters ul li .price b").text("All Prices");
  $(".filters ul li .type b").text("All Types");
  $(".filters ul li .addate b").text("All Dates");
  $(".resetbutton img").attr("src", "./img/search.svg");
});

// $(".image").mouseover(function(){
//   $(this).css({"padding":"0 6px"});
//   $(this).children().css({"transform":"scale(1.5)  translateY(-20px)","margin":"0 6px"});
//   $(this).parent().next().children().css( {"padding":"0 6px"});
//   $(this).parent().next().children().children().css( {"transform":"scale(1.2)  translateY(-10px)","margin":"0 6px"});
//   $(this).parent().prev().children().css( {"padding":"0 6px"});
//   $(this).parent().prev().children().children().css( {"transform":"scale(1.2)  translateY(-10px)","margin":"0 6px"});
// });
// $(".image").mouseleave(function(){
//  $(this).css({"padding":"0 0px"});
//  $(this).children().css({"transform":"scale(1) translateY(0px)","margin":"0 4px"});
//  $(this).parent().next().children().css( {"padding":"0 0px"});
//  $(this).parent().next().children().children().css( {"transform":"scale(1)  translateY(0px)","margin":"0 4px"});
//  $(this).parent().prev().children().css( {"padding":"0 0px"});
//  $(this).parent().prev().children().children().css( {"transform":"scale(1)  translateY(0px)","margin":"0 4px"});
// });

jQuery('#submit').click(function(e){
  login();
});

jQuery('#register').click(function(e){
  register();
});

jQuery('#width-quantity-plus').click(function(e){
  localStorage.setItem('last_click','width');
  quantityPlus(this,e);
});

jQuery('#height-quantity-plus').click(function(e){
  localStorage.setItem('last_click','height');
  quantityPlus(this,e);
});

jQuery('#width-quantity-minus').click(function(e){
  quantityMinus(this,e);
});

jQuery('#height-quantity-minus').click(function(e){
  quantityMinus(this,e);
});


function buyNow() {
  localStorage.setItem('b',totalBox);
  // if(totalBox[0] > 50 || totalBox[0] == 0){
  //   toastr.error("Metadata not available");
  //   return false;
  // }
  // sendTransaction(IPFS_URL_WITH_CID+totalBox[0]+'_file.json');
  sendTransaction(IPFS_URL_WITH_CID+'19_file.json');
};

jQuery('.styled-checkbox').click(function(e){
  if($(".styled-checkbox").is(':checked')){
    $("#buynow").removeClass("tokenbtn");
    $("#buynow").addClass("buynow");
    jQuery('.buynow').click(function(e){buyNow();});
    $("#buynow").attr("disabled", false);
  }else{
    $("#buynow").attr("disabled", true);
    $("#buynow").addClass("tokenbtn");
    $("#buynow").removeClass("buynow");
    
  }
});

function quantityMinus(obj,e){
  e.preventDefault();
    p_id = jQuery(obj).val();
    var quantity = parseInt(jQuery("#"+p_id).val());
    var BlockHeight = jQuery('input#quantity2').val();
    jQuery("#"+p_id).val(quantity - 1); 
    
    var BlockWidthV = jQuery('input#quantity1').val();
    var BlockHeightV = jQuery('input#quantity2').val() - 1;
    var BlockHeightVal = jQuery('input#quantity2').val();
    if(BlockHeightV <= 0){
      BlockHeightV = 1;
      jQuery('input#quantity2').val(1);
    }
    if(BlockHeightVal <= 0){
      BlockHeightVal = 1;
      jQuery('input#quantity2').val(1);
    }
    if(BlockWidthV <= 0){
      BlockWidthV = 1;
      jQuery('input#quantity1').val(1);
    }
    
    if(BlockWidthV > BlockHeightVal){
      //console.log('BlockHeightVal', BlockHeightVal);
      if(BlockHeightVal <= 1){
        //console.log('BlockHeightVal', BlockHeightV);
        BlockHeightV = 1;
        jQuery('.border_box').css({
          width: boxWidth * BlockWidthV,
          height: boxHeight * BlockHeightV
        });
      } else{
        BlockHeightV = BlockHeightV;        
        jQuery('.border_box').css({
          width: boxWidth * BlockWidthV,
          height: BlockHeightVal * boxHeight
        });
      }
    } else if(BlockHeightVal > BlockWidthV){
      //console.log('BlockHeightVal', BlockHeightVal);
      jQuery('.border_box').css({
        width: boxWidth * BlockWidthV,
        height: BlockHeightVal * boxHeight
      });
    } else{
      //console.log('boxWidth', boxWidth);
      //console.log('BlockHeightV', BlockHeightV);
      jQuery('.border_box').css({
        width: boxWidth * BlockWidthV,
        height: BlockHeightVal * boxHeight
      });
    }
    checkColumnStatus(BlockWidthV,BlockHeightVal);
}

function quantityPlus(obj,e){
  e.preventDefault();

  p_id = jQuery(obj).val();
  var quantity = parseInt(jQuery("#"+p_id).val());
  jQuery("#"+p_id).val(quantity + 1);

  var BlockWidthV = jQuery('input#quantity1').val();
  var BlockHeightVal = jQuery('input#quantity2').val();
  var BlockHeightV = jQuery('input#quantity2').val() - 1;
  if(BlockHeightV <= 0){
    BlockHeightV = BlockHeightVal;
  }
  if(BlockWidthV > BlockHeightVal){
    if(BlockHeightVal <= 1){
      BlockHeightV = 1;
      jQuery('.border_box').css({
        width: boxWidth * BlockWidthV,
        height: boxHeight * BlockHeightV
      });
      //console.log('test', boxWidth * BlockWidthV);
    } else{
      BlockHeightV = BlockHeightV;        
      jQuery('.border_box').css({
        width: boxWidth * BlockWidthV,
        height: BlockHeightVal * boxHeight
      });
    }
  } else if(BlockHeightVal > BlockWidthV){
    //console.log('BlockHeightV', BlockHeightV);
    //console.log('Total Height', );
    jQuery('.border_box').css({
      width: boxWidth * BlockWidthV,
      height: BlockHeightVal * boxHeight
    });
  } else{
    jQuery('.border_box').css({
      width: boxWidth * BlockWidthV,
      height: BlockHeightVal * boxHeight
    });
  }
  checkColumnStatus(BlockWidthV,BlockHeightVal);
}

function checkColumnStatus(widthVal,heightVal){
  totalBox = [];
  for(let widthStart = firstSelectedBrickColumn; widthStart < parseInt(firstSelectedBrickColumn)+parseInt(widthVal); widthStart++){
      for(let heightStart = firstSelectedBrickRow; heightStart < parseInt(firstSelectedBrickRow)+parseInt(heightVal); heightStart++ ){
          if(widthStart < parseInt(firstSelectedBrickColumn)+parseInt(jQuery('input#quantity1').val())){
              if($("#box_"+heightStart+'_'+widthStart).data('owned') == 0){

                if($("#box_"+heightStart+'_'+widthStart).children("span").attr("style") != undefined){
                  localStorage.removeItem('parent_brick');
                  localStorage.setItem('parent_brick',"#box_"+heightStart+'_'+widthStart);
                }

                totalBox.push($("#box_"+heightStart+'_'+widthStart).data('box'))
              }
              else{
                    //SOLD
                if(widthStart > WIDTH){
                  jQuery('input#quantity1').val(jQuery('input#quantity1').val()-1);
                  toastr.error("No Brik available");
                  return false;
                }
                if(heightStart > HEIGHT){
                  jQuery('input#quantity2').val(jQuery('input#quantity2').val()-1);
                  toastr.error("No Brik available");
                  return false;
                }
                    
                if(localStorage.getItem('last_click') == 'width'){
                  jQuery("#width-quantity-minus").trigger('click');
                }else{
                  jQuery("#height-quantity-minus").trigger('click');
                }
                toastr.error("These briks have already been minted");
             }
        }
     }
  }

  let data =  {ids:totalBox};
  let getBoxDetailRoute = route('boxes.getboxdetail');
  sendRequest(getBoxDetailRoute,'POST',data);
}

function mintBricks(){
  if(totalBox.length == 0){
    totalBox= bricksArr;
  }
  let data =  {ids:totalBox};
  let getBoxDetailRoute = route('boxes.getboxdetail');
  sendRequest(getBoxDetailRoute,'POST',data,'order');
}

function sendRequest(route,method,data={},response_flag = 'sale'){
  $.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: route,
    data: data,
    type: method,
    cache: false,
    success: function (response) {
      localStorage.removeItem('tp');
      if(response.data.length > 0){
        if(response_flag == 'sale'){
          if(response.data[0].owned_by != 0){
            $(".imghas").attr("src",response.data[0].local_server_image);
            $(".tokennumberspan").html(response.data[0].id);
            $(".titlecontent").html(response.data[0].title);
            $(".titleLink").html(response.data[0].website_url);
            $(".detialcontent").html(response.data[0].description);
            $(".owned_by").html(response.data[0].user.name);
            if(response.data[0].nft_type != null){
              $(".nft_type").html(response.data[0].nft_type.name);
            }else{
              $(".nft_type").html('');
            }
            $(".listing_date").html(formatDate(response.data[0].updated_at));
            $("#ether_scan").attr('href',ETHER_SCAN+response.data[0].ether_scan_link);
            if(response.data[0].token_id != null)
            $("#open_sea").attr('href',OPEN_SEA+'/'+response.data[0].token_id);
            $(".box").removeClass("active");
            $(".box img").removeClass("img-active");
            $("#box_"+response.data[0].box_row_number+"_"+response.data[0].box_column_number).addClass('active');
            setTimeout(function(){
              $("#box_"+response.data[0].parent.box_row_number+"_"+response.data[0].parent.box_column_number+" img").addClass('img-active');
              $(".box").removeClass("active");
            },500)

            soldBrickPopup(1);
          }else{
            $("#brick-name").html(response.data[0].title);
            $("#brick-detail").html(response.data[0].description);
            
            $("#total-bricks-price").html(response.data[0].total_price+' ETH');
            $(".box img").removeClass("img-active");
            localStorage.setItem('t_p',response.data[0].total_price);
            if(response.data[0].total_brick > 1){
              $("#brick-detail").html('The selection gives you full ownership of multiple briks.');
             // $("#current-brick-label").html('Average Brik Price');
              //$("#current-brick").html(response.data[0].average);
            }else{
              //$("#current-brick-label").html('Selected Brik Price');
              //$("#current-brick").html(response.data[0].price);

              let parent_brick = localStorage.getItem('parent_brick');
              let style = $(parent_brick+" span").attr("style").replace(/width: |height: /ig, '').split(';');
              eachBoxWidth=style[0].trim().replace(/width:/ig, '');
              eachBoxHeight=style[1].trim().replace(/height:/ig, '');
            }

            if(response.data[0].total_brick_zone_1 > 0){
              $("#current-brick-label-1").html('Selected Brik Price');
              $("#current-brick-1").html(response.data[0].price_zone_1);
              $("#total-bricks-1").html(response.data[0].total_brick_zone_1);
              $("#reb-label").show();
              $("#reb-price").show();
              $("#reb-total").show();
            }else{
              $("#reb-label").hide();
              $("#reb-price").hide();
              $("#reb-total").hide();
            }

            if(response.data[0].total_brick_zone_2 > 0){
              $("#current-brick-label-2").html('Selected Brik Price');
              $("#current-brick-2").html(response.data[0].price_zone_2);
              $("#total-bricks-2").html(response.data[0].total_brick_zone_2);
              $("#pb-label").show();
              $("#pb-price").show();
              $("#pb-total").show();
            }else{
              $("#pb-label").hide();
              $("#pb-price").hide();
              $("#pb-total").hide();
            }

            if(response.data[0].total_brick_zone_3 > 0){
              $("#current-brick-label-3").html('Selected Brik Price');
              $("#current-brick-3").html(response.data[0].price_zone_3);
              $("#total-bricks-3").html(response.data[0].total_brick_zone_3);
              $("#rb-label").show();
              $("#rb-price").show();
              $("#rb-total").show();
            }else{
              $("#rb-label").hide();
              $("#rb-price").hide();
              $("#rb-total").hide();
            }

            if(response.data[0].total_brick_zone_4 > 0){
              $("#current-brick-label-4").html('Selected Brik Price');
              $("#current-brick-4").html(response.data[0].price_zone_4);
              $("#total-bricks-4").html(response.data[0].total_brick_zone_4);
              $("#urb-label").show();
              $("#urb-price").show();
              $("#urb-total").show();
            }else{
              $("#urb-label").hide();
              $("#urb-price").hide();
              $("#urb-total").hide();
            }

            if(balanceVal != undefined){
              $("#tokenbtn").addClass("token-active");
            }
            if(response.data[0].total_price >= balanceVal){
              $("#tokenbtn").removeClass("token-active");
            }
            //$("#total-bricks").html((totalBox.length == 0 ? 1 : totalBox.length));
          }
        }else if(response_flag == 'order'){
           $("#sale-selected-token").html(`SELECTED ${response.data.length} Briks`);
           $(".brick-width").html(jQuery('input#quantity1').val());
           $(".brick-height").html(jQuery('input#quantity2').val());
           $(".total-brick-sale").html(response.data.length);
           $(".total-price-sale").html(response.data[0].total_price+' ETH');
           let totalBricksHTML='';
           for(let brick = 0; brick < response.data.length; brick++){
             totalBricksHTML += '<li>#'+response.data[brick].id+'</li>';
           }
           $("#sale-total-bricks").html(totalBricksHTML);
        }
        localStorage.setItem('tp',response.data[0].total_price);
      }
    },
    error: function (xhr, ajaxOptions, thrownError) {
        errorMessage(xhr);
    }
  });
}

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
      if(response.data.questions_feedback == 0){
        jQuery('.popup').show();
        jQuery('.login_content').hide();
        jQuery('.register_content').hide();
        jQuery('.question_content').show();
      }else{
        jQuery('.popup').hide();
        jQuery('.login_content').hide();
        jQuery('.register_content').hide();
        jQuery('.question_content').hide();
      }
    },
    error: function (xhr, ajaxOptions, thrownError) {
        errorMessage(xhr);
    }
  }); 
}

function getNftType(){
  let nftTypeRoute = route('boxes.getnfttype');
  $.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: nftTypeRoute,
    type: 'GET',
    cache: false,
    success: function (response) {
      nftTypeLiHtml = '';
      priceLiHtml = '';
      let nft_type = response.data.nft_type;
      let price = response.data.price;
      $.each(nft_type, function( index, value ) {
        nftTypeLiHtml+='<li data-name="'+value.name+'" data-type="'+value.id+'"><a href="javascript:void(0)"  data-name="'+value.name+'" data-type="'+value.id+'" onclick="assignVlaueToInput(this,\'type\')">'+value.name+'</a></li>';
      });

      $.each(price, function( index, value ) {
        priceLiHtml+='<li><a href="javascript:void(0)" data-price="'+value+'" onclick="assignVlaueToInput(this,\'price\')">'+value+' ETH</a></li>';
      });
      $(".nft_type_ul").html(nftTypeLiHtml);
      $(".price_ul").html(priceLiHtml);

      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      const type_url = urlParams.get('type');
      if(type_url != null){
        $(".nft_type_ul").children('li').each(function () {
          if($(this).data('type') == type_url){
              $(".display_type").html($(this).data('name'));
              return false;
          }
        });
      }
    },
    error: function (xhr, ajaxOptions, thrownError) {
        errorMessage(xhr);
    }
  }); 
}

function login(){
  let route = jQuery('#login_form').attr('action');
  let email = jQuery('#email').val();
  let password = jQuery('#password').val();

  if(email == ''){
    toastr.error("Email is required");
    return;
  }

  if(password == ''){
    toastr.error("Password is required");
    return;
  }

  var formData = {email: email, password: password};

  if(route == ""){
    toastr.error("Something went wrong");
    return;
  }
  callPostAjaxFunction(route,formData)
}

function register(){
  let route = jQuery('#register_form').attr('action');
  let name = jQuery('#name').val();
  let surname = jQuery('#surname').val();
  let dob = jQuery('#dob').val();
  let email = jQuery('#email_register').val();
  let password = jQuery('#password_register').val();
  let password_confirmation = jQuery('#password_confirmation').val();

  if(name == ''){
    toastr.error("Name is required");
    return;
  }

  if(surname == ''){
    toastr.error("Surname is required");
    return;
  }

  if(dob == ''){
    toastr.error("Date of Birth is required");
    return;
  }

  if(email == ''){
    toastr.error("Email is required");
    return;
  }

  if(password == ''){
    toastr.error("Password is required");
    return;
  }

  if(password_confirmation == ''){
    toastr.error("Password confirmation is required");
    return;
  }

  var formData = {name: name,surname: surname,email: email,dob: dob,password: password,password_confirmation: password_confirmation};

  if(route == ""){
    toastr.error("Something went wrong");
    return;
  }
  jQuery('.loader2').show();
  callPostAjaxFunction(route,formData,'signup')
}

function callPostAjaxFunction(route,formData,type='login'){
  $.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: route,
    data: formData,
    type: "POST",
    cache: false,
    success: function (response) {
        if (response.status) {
            if(type == 'signup'){
              jQuery('.loader2').hide();
              $(".register_content").hide();
              $(".register-message").html(response.message);
              
              $(".question_content").show();
            }else{
              toastr.success(response.message);
              setTimeout(function(){
                window.location.href=window.origin+response.redirect_path;
              },1000);
            }
        }
    },
    error: function (xhr, ajaxOptions, thrownError) {
      jQuery('.loader2').hide();
      if(xhr.responseJSON.errors.password != undefined){
        toastr.error(xhr.responseJSON.errors.password[0]);
      }else if(xhr.responseJSON.errors.email != undefined){
        toastr.error(xhr.responseJSON.errors.email[0]);
      }else{
        errorMessage(xhr);
      }
    }
  });
}

function updateUserQuestions(){
    var know_about_nft = $('input[name="know_about_nft"]:checked').val();
    var involve_about_nft =  $('input[name="involve_about_nft"]:checked').val();
    var invest_about_nft = $('input[name="invest_about_nft"]:checked').val();
    var questions_obj = {
      know_about_nft:know_about_nft,
      involve_about_nft:involve_about_nft,
      invest_about_nft:invest_about_nft,
    }
    let route_questions = route('boxes.userquestionsupdate');
    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: route_questions,
      data: questions_obj,
      type: "POST",
      cache: false,
      success: function (response) {
        // toastr.success(response.message);
        setTimeout(function(){
          window.location.href=window.origin;
        },1000);
      }
    });
    

}

function errorMessage(xhr) {
  if (xhr.status == '401') {
      toastr.error("You are not authorized to access this resource");
  } else {
      toastr.error(xhr.responseJSON.message);
  }
}

function formatDate(date) {
  const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
   var d = new Date(date),
       month = '' + (months[d.getMonth()]),
       day = '' + d.getDate(),
       year = d.getFullYear();

   if (month.length < 2) month = '0' + month;
   if (day.length < 2) day = '0' + day;

   return [day,month,year].join(' ');
}

function assignVlaueToInput(obj,call_type){
  let value=$(obj).data(call_type);
  $("#bricks_"+call_type).val(value);
  $(".dropdown_"+call_type).hide();
  if(call_type == 'type'){
    $(".display_"+call_type).html($(obj).data('name'));
  }else if(call_type == 'price'){
    $(".display_"+call_type).html(value+' ETH');
  }
}

function showSelectList(call_type){
  $(".dropdown_"+call_type).show();
}

function searchBricks(){
  let bricksType = $("#bricks_type").val();
  let bricksPrice = $("#bricks_price").val();
  let bricksDate = $("#bricks_date").val();
  let url = window.origin+'?price='+bricksPrice+'&type='+bricksType+'&date='+bricksDate;
  window.location.href = url;
}


$(document).keyup(function(e) {
  if($('.leftsidebar.active').length){
    if (e.keyCode == 27) {
      $('.closeicon').trigger('click');
    }
  }
});


document.getElementById("password")
    .addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        document.getElementById("submit").click();
    }
});

document.getElementById("password_confirmation")
    .addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        document.getElementById("register").click();
    }
});


window.onkeydown = function( event ) {
  if ( event.keyCode == 27 ) {
    $(".popup").hide();
  }
};


$(function() {
  $('.btn_howitswork').click(function() {
    console.log("teri qasm")
      var headerheight = $(".page_heading").outerHeight();
          var target = $(this.hash);
          if (target.length) {
              $('.inner_page').animate({
                  scrollTop: target.offset().top - headerheight
              }, 1000);
              return false;
          }
  });
});


var is_OSX = /(Mac|iPhone|iPod|iPad)/i.test(navigator.platform);
var is_iOS = /(iPhone|iPod|iPad)/i.test(navigator.platform);

var is_Mac = navigator.platform.toUpperCase().indexOf('MAC') >= 0;
var is_iPhone = navigator.platform == "iPhone";
var is_iPod = navigator.platform == "iPod";
var is_iPad = navigator.platform == "iPad";

/* Output */
var out = document.getElementById('out');
if (!is_OSX) {
 console.log("This NOT a Mac or an iOS Device!");
} 
if (is_Mac) {
  console.log("This is a Mac Computer!\n");
    jQuery(".box_wrap .boxes .box_container .box img").css({
      'left' : '-0.5px',
      'top' : '-0.5px'
  });
  $(".box-for-sale").on('click', function() {      
    jQuery(".box_wrap .boxes .box_container .box.active .border_box").css({
      'left' : '-0.5px',
      'top' : '-0.5px' 
    });
  });
}
if (is_iOS) out.innerHTML += "You're using an iOS Device!\n";
if (is_iPhone) out.innerHTML += "This is an iPhone!";
if (is_iPod) out.innerHTML += "This is an iPod Touch!";
if (is_iPad) out.innerHTML += "This is an iPad!";
out.innerHTML += "\nPlatform: " + navigator.platform;
 



