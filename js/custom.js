//Img Upload

function imgPreView(event, targetId) {
  var file = event.target.files[0];
  var reader = new FileReader();
  var preview = document.getElementById(targetId);
  var previewImage = document.getElementById('previewImage-' + targetId);

  if (previewImage != null) preview.removeChild(previewImage);

  reader.onload = function (event) {
    var img = document.createElement('img');
    img.setAttribute('src', reader.result);
    img.setAttribute('id', 'previewImage-' + targetId);
    preview.appendChild(img);
  };

  reader.readAsDataURL(file);
}

//Navigation

$(function () {
  var topBtn = $('#steps');

  var firstStep = $('#st1');
  var secondStep = $('#st2');
  var thirdStep = $('#st3');
  var fourthStep = $('#st4');

  topBtn.css('left', '-300px');
  //スクロールが100に達したらボタン表示
  $(window).scroll(function () {
    if ($(this).scrollTop() > 400 && $(this).scrollTop() < 1000) {
      topBtn.stop().animate({ left: '50px' }, 900);
      firstStep.addClass('active1');
      secondStep.removeClass('active1');
      thirdStep.removeClass('active1');
      fourthStep.removeClass('active1');
    } else if ($(this).scrollTop() > 1550 && $(this).scrollTop() < 2050) {
      topBtn.stop().animate({ left: '50px' }, 900);

      if (thirdStep.hasClass('active1') || fourthStep.hasClass('active1')) {
        secondStep.removeClass('active1');
      } else {
        secondStep.addClass('active1');
        firstStep.removeClass('active1');
        thirdStep.removeClass('active1');
        fourthStep.removeClass('active1');
      }
    } else if ($(this).scrollTop() > 2050 || $(this).scrollTop() < 400) {
      topBtn.stop().animate({ left: '-300px' }, 1200);
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
  $('.menu2').show();
}

//Customize

const slideRight = document.querySelector('.right-slide');

const backBtn = document.getElementById('back-button');
const nextBtn = document.querySelector('.action-buttons1');

var x = 0;
var secondStep = $('#st2');
var thirdStep = $('#st3');
var fourthStep = $('#st4');

nextBtn.addEventListener('click', next);
function next() {
  x += 100;
  slideRight.style.transform = 'translateY(-' + x + '%)';
  slideRight.animate([{ opacity: '0' }, { opacity: '1' }], 800);
  if (x == 100) {
    thirdStep.addClass('active1');
    secondStep.removeClass('active1');
  } else if (x == 200) {
    nextBtn.value = '購入';
    $('.action-buttons1').addClass('active');
    fourthStep.addClass('active1');
    thirdStep.removeClass('active1');
  } else if (x > 200) {
    location.href = 'form.php';
    x = 0;
  }
}

backBtn.addEventListener('click', back);
function back() {
  x -= 100;
  slideRight.style.transform = 'translateY(-' + x + '%)';
  slideRight.animate([{ opacity: '0' }, { opacity: '1' }], 800);

  if (x == 100) {
    thirdStep.addClass('active1');
    fourthStep.removeClass('active1');
    nextBtn.value = '次へ';
    $('.action-buttons1').removeClass('active');
  } else if (x == 0) {
    secondStep.addClass('active1');
    thirdStep.removeClass('active1');
  } else if (x < 0) {
    location.href = '#step1';
    x = 0;
    fourthStep.removeClass('active1');
  }
  // qrをリセット
  $('#qr').hide();
}

$('.directbtn').on('change', function () {
  $('.directbtn').not(this).prop('checked', false);
});

//Scroll

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

ScrollReveal().reveal('.menuttl1', {
  duration: 2000,
  origin: 'right',
  distance: '50px',
  reset: true,
});

ScrollReveal().reveal('.menuttl2', {
  duration: 2000,
  origin: 'right',
  distance: '50px',
  reset: true,
});

ScrollReveal().reveal('.menuttl3', {
  duration: 2000,
  origin: 'right',
  distance: '50px',
  reset: true,
});
ScrollReveal().reveal('.menuttl4', {
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

// ScrollReveal().reveal('.menu2', {
//   duration: 2000,
//   origin: 'right',
//   distance: '50px',
//   reset: true,
// });
