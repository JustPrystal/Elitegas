//Body adding class on mobile version
var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
var body = document.body;
if (isMobile) {
      body.classList.add('mobile-responsive');
} else {
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

$(document).ready(function(){
  $('input[type="radio"]').click(function(){
      var inputValue = $(this).attr("value");
      var targetBox = $(".payment_method_" + inputValue);
      $(".payment_box").not(targetBox).hide();
      $(targetBox).slideDown("slow");
  });
});

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
});

//Header hamburger end