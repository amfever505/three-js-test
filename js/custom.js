//Customize

const slideRight = document.querySelector('.right-slide');

const upBtn = document.getElementById('up-button');
const downBtn = document.getElementById('down-button');


var x = 0;

downBtn.addEventListener('click', next);
function next(){
  x += 100;
  slideRight.style.transform = "translateY(-"+x+"%)";

  if(x == 200){
    downBtn.value="購入";
  }else if(x > 200){
    location.href="index.html";
    x = 0;
  }
}

upBtn.addEventListener('click', back);
function back(){
  x -= 100;
  slideRight.style.transform = "translateY(-"+x+"%)";

  if(x == 100){
    downBtn.value="Next";
  }else if(x < 0){
    location.href="#step1";
    x = 0;
  }
}


// $(window).on("scroll", function() {
//   if($(window).scrollTop() > 300) {
//       $("body").addClass("active");
//       console.log(true);
//   } else {
//       $("body").removeClass("active");
//   };
// });

// var $root = $('html, body');
// $('a[href^="#"]').click(function () {
// $root.animate({
// scrollTop: $( $.attr(this, 'href') ).offset().top
// }, 1500);

// return false;
