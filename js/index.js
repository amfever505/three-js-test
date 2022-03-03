//オープニングムービー

// var now = (new Date()).getTime();
// var lastTime = 0;
// var lastTimeStr = localStorage['lastTime'];
// if (lastTimeStr) lastTime = parseInt(lastTimeStr, 10);
// if (now - lastTime > 1) {

//     var current = $(window).scrollTop();
//     $(window).scroll(function() {
//       $(window).scrollTop(current);
//     });
    
//     const $screen = $("#screen");
//     $screen.delay(6600).animate({height:"0"},280,function(){
//       $(window).off('scroll');
//     });
  
// } 
// localStorage['lastTime'] = ""+now;


//Login

    var Panels = (function() {
  
        var panelLeft = document.querySelector('.panels__side--left');
        var panelRight = document.querySelector('.panels__side--right');
        var arrowLeft = document.querySelector('.loginarrow--left');
        var arrowRight = document.querySelector('.loginarrow--right');

        var loginBtn = document.getElementById('btn1a');
        var signupBtn = document.getElementById('btn1b');
      
        var openLeft = function() {
          panelLeft.classList.toggle('panels__side--left-active');
          panelRight.classList.toggle('panels__side--right-hidden');
        };
      
        var openRight1 = function() {
          panelRight.classList.toggle('panels__side--right-active');
          panelLeft.classList.toggle('panels__side--left-hidden');
        };

        var openRight2 = function() {
          panelRight.classList.toggle('panels__side--right-active');
          panelLeft.classList.toggle('panels__side--left-hidden');
        };
        
        var bindActions = function() {
          document.getElementById('btn2').addEventListener('click', openLeft, false);
          arrowLeft.addEventListener('click', openLeft, false);

          loginBtn.addEventListener('click', openRight1, false);
          signupBtn.addEventListener('click', openRight2, false);
          arrowRight.addEventListener('click', openRight2, false);
        };
        
        var init = function() {
          bindActions();
        };
        
        return {
          init: init
        };
       
      }());
      
      Panels.init();

      const $loginBtn = $("#btn1a");
      const $loginCtn = $("#ctn1");

      const $signupBtn = $("#btn1b");
      const $signupCtn = $("#ctn2");

      const $passBtn = $("#btn3");
      const $passCtn = $("#ctn3");

      const $customBtn = $("#btn2");

      $loginBtn.on("click",login);
      function login(){
        $loginCtn.show();
        $signupCtn.hide();
        $passCtn.hide();
      }

      $signupBtn.on("click",signup);
      function signup(){
        $signupCtn.show();
        $loginCtn.hide();
        $passCtn.hide();
      }

      $passBtn.on("click",password);
      function password(){
        $passCtn.show();
        $loginCtn.hide();
        $signupCtn.hide();
      }

      $customBtn.on("click",redirect);

      function redirect(){
        $(".num3").css("animation-play-state", "running");
        $(".num2").css("animation-play-state", "running");
        $(".num1").css("animation-play-state", "running");
        setTimeout(function (){
        location.href="custom.html";
      },5300);
    }




      
      

    