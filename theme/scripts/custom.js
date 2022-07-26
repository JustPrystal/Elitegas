//Body adding class on mobile version
var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
var body = document.body;
if (isMobile) {
      body.classList.remove('tablet-desktop-responsive');
      body.classList.add('mobile-responsive');
} else {
      body.classList.remove('mobile-responsive');
      body.classList.add('tablet-desktop-responsive');
}

//adding class mobile version end


//tab js start

$('.tab-content:eq(0)').addClass('active');
$('.tab-heading:eq(0)').addClass('active-head');
$(".tab-heading").click(function(){
    var index = $(this).index();
    if($(".tab-content:eq("+index+")").hasClass("active")){
    }else{
        $(".tab-content").removeClass("active");
        $(".tab-heading").removeClass("active-head");
        $(".tab-content:eq("+index+")").addClass("active");
        $(".tab-heading:eq("+index+")").addClass("active-head");
    }
});

//tab js end

// home page quantity js 

function Plus(){
    var a = $('.input-text').val();
    a++;
    ValueChange(a);
    
}
function Minus(){
    var a = $('.input-text').val();
    a--;
    if(a < 1){
        a = 1;
    }
    ValueChange(a);
}
function ValueChange(CurrenttValue){
    $('.input-text').val(CurrenttValue).change();
}

// home page quantity js end


// Footer carousel

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mobile-item");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

// Footer Carousel end

//  Footer Nav Accordion

var acc = document.getElementsByClassName("accordion-footer-head");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}

// Footer Nav Accordion end

// Header mobile Search dropdown function

$(".search-wrap").click(function () {
  if ( $( ".search-drop" ).first().is( ":hidden" ) ) {
    $( ".search-drop" ).slideDown( "slow" );
  } else {
    $( ".search-drop" ).slideUp("slow");
  }
});

// Header mobile search dropdown end



// Checkout credit card form drop down

// $(document).ready(function(){
//   $('input[type="radio"]').click(function(){
//       var inputValue = $(this).attr("value");
//       var targetBox = $(".payment_method_" + inputValue);
//       $(".payment_box").not(targetBox).hide();
//       $(targetBox).slideDown("slow");
//   });
// });

// Checkout Credit card drop down end


// Header Hamburger

$(document).ready(function(){
  
$(".hamburger-open").click(function () {
     $(".Header-nav").addClass("nav-close");
    $( ".Header-nav" ).slideDown( "slow" );
    $(".hamburger-open").css("display", "none");
    $(".hamburger-close").css("display", "block");
});
$(".hamburger-close").click(function () {
 $( ".nav-close" ).slideUp( "slow" );
 $(".hamburger-open").css("display", "block");
 $(".hamburger-close").css("display", "none");
});


$(".dropdown").click(function(){
  $(".dropdown_wrapper").slideToggle("slow");
})

$('.flex-control-nav').slick({
  draggable: true,
  arrows: true,
  prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
  nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
  dots: false,
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3
});

});

//Header hamburger end


// Coupon slide down

$(".showcoupon").click(function(){
  $(".wrap-coupan-field").slideToggle("slow");
})

// End

// Onboarding upload field add class

$(document).ready(function() {
  $('.ginput_container_fileupload .large').change(function(evt) {
      $(this).addClass('active-input').val();
  });
});

// End

$(".pmpro_actions_nav a:nth-child(1)").attr('href','/membership-account/membership-checkout/?level=1' );

// Login Show pass icon

$(document).ready(function(){
  $('#user_pass').after("<span toggle='#password-field' class='fa fa-fw fa-eye field-icon' id='toggle-password'></span>");
})

$(function () {
  $("#toggle-password").click(function () {
         $(this).toggleClass("fa-eye fa-eye-slash");
        var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
         $("#user_pass").attr("type", type);
     });
 });	


// onboarding upload field ajax

$('#field_13_123').click(function() {
  $('#input_13_123').change(function(evt) {
      $(this).addClass('active-input').val();
  });
});


// window.setTimeout(function(){

//     if($("#billing_state_field").hasClass("woocommerce-invalid-required-field")){
//       $("input#billing_state").after("<p class='state-error'>Please Select a Country in order to choose State</p>")
//     }else{
//       $('.state-error').css('display','none');
//     }
//     if($("#shipping_state_field").hasClass("woocommerce-invalid-required-field")){
//       $("input#shipping_state").after("<p class='state-error'>Please Select a Country in order to choose State</p>")
//     }

// }, 3400)

// window.setInterval(function(){
// if($("#shipping_state_field").hasClass("woocommerce-validated")){
//   $(".state-error").css('display','none');
// }
// if($("#billing_state_field").hasClass("woocommerce-validated")){
//   $(".state-error").css('display','none');
// }

// }, 500);

// window.setTimeout(function(){
// $( "#payment_method_authorize_net_cim_credit_card" ).after( "<span class='tooltiptext'>Please note, credit card payments will incur a 3% convenience charge. To avoid this fee, you can select either the Direct Bank Transfer or e-check option. </span>" );
// }, 9000)
