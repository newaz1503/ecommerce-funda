//product category
$('.product_category').owlCarousel({
  loop:true,
  margin:10,
  autoplay:true,
  autoplayTimeout: 3000,
  autoplayHoverPause:true,
  responsiveClass:true,
  nav: true,
  navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
  dots: false,
  responsive:{
      0:{
          items:1,
      },
      600:{
          items:3,
      },
      1000:{
          items:6,
          loop:false,
      }
  }
})

//Today's special
$('.today_special_collection').owlCarousel({
  loop:true,
  margin:10,
  autoplay:true,
  autoplayTimeout: 5000,
  autoplayHoverPause:true,
  responsiveClass:true,
  nav: true,
  navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
  dots: false,
  responsive:{
      0:{
          items:1,
      },
      600:{
          items:3,
      },
      1000:{
          items:6,
          loop:false,
      }
  }
})

//best selling
$('.best_selling').owlCarousel({
  loop:true,
  margin:10,
  autoplay:true,
  autoplayTimeout: 10000,
  autoplayHoverPause:true,
  responsiveClass:true,
  dots: false,
  responsive:{
      0:{
          items:1,
          nav:false
      },
      600:{
          items:1,
          nav:false
      },
      1000:{
          items:1,
          nav:false,
          loop:false,
      }
  }
})

//dynamic change image
let bigImage = document.querySelector('.big_image');
let smallImage = document.querySelectorAll('.small_image');
let smallImgLen = smallImage.length;

function changeImage(img){
    bigImage.src = img;
}
//price range
function getVals(){
    // Get slider values
    let parent = this.parentNode;
    let slides = parent.getElementsByTagName("input");
      let slide1 = parseFloat( slides[0].value );
      let slide2 = parseFloat( slides[1].value );
    // Neither slider will clip the other, so make sure we determine which is larger
    if( slide1 > slide2 ){ let tmp = slide2; slide2 = slide1; slide1 = tmp; }

    let displayElement = parent.getElementsByClassName("rangeValues")[0];
        displayElement.innerHTML = "$" + slide1 + " - $" + slide2;
  }

  window.onload = function(){
    // Initialize Sliders
    let sliderSections = document.getElementsByClassName("range-slider");
        for( let x = 0; x < sliderSections.length; x++ ){
          let sliders = sliderSections[x].getElementsByTagName("input");
          for( let y = 0; y < sliders.length; y++ ){
            if( sliders[y].type ==="range" ){
              sliders[y].oninput = getVals;
              // Manually trigger event first time to display values
              sliders[y].oninput();
            }
          }
        }
  }

  //checkout page password input field visible / hidden
function checkFunction(){
  var checkBox = document.querySelector(".account_check");
  var targetedInput = document.querySelector(".hidden_password");
  if (checkBox.checked == true){
    targetedInput.style.display = "block";
  } else {
    targetedInput.style.display = "none";
  }
}

//show sidebar cart
// let sideCart = document.querySelector('.floating_side_cart');
// let closeCartBtn = document.querySelector('.floating_side_cart');
// let cartIcon = document.querySelector('#headShoppingCartIcon');

// function destroySideCart(){
//   sideCart.classList.add('active');
// }
// function closeSideCart(){
//   sideCart.classList.remove('active');
// }




