jQuery(function () {
    var appear = false;
    var chara = $('#chara');



    $(window).scroll(function () {
        if ($(this).scrollTop() > 150) {  //150pxスクロールしたら
            if (appear == false) {
                appear = true;
                chara.stop().animate({
                    'right': '50px' //右から50pxの位置に
                }, 300); //0.3秒かけて現れる
            }
        } else {
            if (appear) {
                appear = false;
                chara.stop().animate({
                    'right': '-150px' //右から-150pxの位置に
                }, 300); //0.3秒かけて隠れる
            }
        }
    });
    chara.click(function () {
        $("#popup_area").show();
        $(".main,.main-content,.gal,.login,.team,.techs,.back,footer").addClass("blur");
        $("body").addClass("stop");
        return false;
    });
});




$("#popup_area").hide();
$("#popup_area2").hide();
$("#popup_area3").hide();


$('.batu').click(function () {
    $("#popup_area,#popup_area2,#popup_area3").hide();
    $(".main,.main-content,.gal,.login,.team,.techs,.back,footer").removeClass("blur");
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


