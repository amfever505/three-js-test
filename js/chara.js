jQuery(function () {
    var appear = false;
    var chara = $('.U-wrap img');



    $(window).scroll(function () {
        if ($(this).scrollTop() > 150) {  //150pxスクロールしたら
            if (appear == false) {
                appear = true;
                chara.stop().animate({
                    'right': '1%' //右から50pxの位置に
                }, 600); //0.6秒かけて現れる
            }
        } else {
            if (appear) {
                appear = false;
                chara.stop().animate({
                    'right': '-240px' //右から-240pxの位置に
                }, 600); //0.6秒かけて隠れる
            }
        }
    });
    chara.click(function () {
        $("#popup_area").show();
        $("#over").show();
        $(".main,.main-content,.gal,.login,.team,.techs,.back,footer,.movie").addClass("blur");
        $("body").addClass("stop");
        return false;
    });
});



$("#over").hide();
$("#popup_area").hide();
$("#popup_area2").hide();
$("#popup_area3").hide();


$('.batu,#over').click(function () {
    $("#popup_area,#popup_area2,#popup_area3,#over").hide();
    $(".main,.main-content,.gal,.login,.team,.techs,.back,footer,.movie").removeClass("blur");
    $("body").removeClass("stop");
})




$('.QA').click(function () {
    $("#popup_area,#popup_area3").hide();
    $("#popup_area2").show();
})


$('.contact').click(function () {
    $("#popup_area,#popup_area2").hide();
    $("#popup_area3").show();
})





// $("#qa_1").hide();
// $("#qa_2").hide();
// $("#qa_3").hide();
