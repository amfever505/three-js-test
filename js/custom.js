//Navigation

$(function () {
  var showFlag = false;
  var topBtn = $('#steps');
  topBtn.css('left', '-300px');
  var showFlag = false;
  //スクロールが100に達したらボタン表示
  $(window).scroll(function () {
    if ($(this).scrollTop() > 400 && $(this).scrollTop() < 1980) {
      if (showFlag == false) {
        showFlag = true;
        topBtn.stop().animate({ left: '50px' }, 1200);
      }
    } else {
      if (showFlag) {
        showFlag = false;
        topBtn.stop().animate({ left: '-300px' }, 1200);
      }
    }
  });
});

//Step1
const $step2 = $('.slide-container');
const $step1Btn = $('.modelicon');

$step2.hide();

$step1Btn.on('click', modelicon);
function modelicon() {
  $step2.show();
}

//Customize

const slideRight = document.querySelector('.right-slide');

const backBtn = document.getElementById('back-button');
const nextBtn = document.getElementById('next-button');

var x = 0;

nextBtn.addEventListener('click', next);
function next() {
  x += 100;
  slideRight.style.transform = 'translateY(-' + x + '%)';
  slideRight.animate([{ opacity: '0' }, { opacity: '1' }], 800);

  if (x == 200) {
    nextBtn.value = '購入';
  } else if (x > 200) {
    location.href = 'form.html';
    x = 0;
  }
}

backBtn.addEventListener('click', back);
function back() {
  x -= 100;
  slideRight.style.transform = 'translateY(-' + x + '%)';
  slideRight.animate([{ opacity: '0' }, { opacity: '1' }], 800);

  if (x == 100) {
    nextBtn.value = 'Next';
  } else if (x < 0) {
    location.href = '#step1';
    x = 0;
  }
}

// $(window).on("scroll", function() {
//       if($(window).scrollTop() > 2100) {
//           $(".nav").addClass("active");
//           console.log(true);
//       } else {
//           //remove the background property so it comes transparent again (defined in your css)
//           $(".nav").removeClass("active");
//           };
//   });

var $root = $('html, body');
$('a[href^="#"]').click(function () {
  $root.animate(
    {
      scrollTop: $($.attr(this, 'href')).offset().top,
    },
    1500
  );

  return false;
});

//Title

scrollCue.init();

ScrollReveal().reveal('.subcopy1', {
  duration: 2000,
  origin: 'left',
  distance: '50px',
  reset: false,
});

// ScrollReveal().reveal('.subcopy', {
//     duration: 2000,
//     origin: 'right',
//     distance: '50px',
//     reset: false
// });

ScrollReveal().reveal('.menuttl', {
  duration: 2000,
  origin: 'right',
  distance: '50px',
  reset: true,
});

ScrollReveal().reveal('.menu1', {
  duration: 2000,
  origin: 'left',
  distance: '50px',
  reset: true,
});
