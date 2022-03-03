jQuery(function () {
    var appear = false;
    var chara = $('.U-wrap img');

    $("#chara_button").hide();


    $(window).ready(function () {
        appear = true;
        chara.stop().animate({
            'right': '50px' //右から50pxの位置に
        }, 300); //0.3秒かけて現れる
        $("#chara_button").show(500);

    });
    chara.click(function () {
        $("#popup_area").show();
        $("#over").show();
        $(".mypage,#chara_button").addClass("blur");
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
    $(".mypage,#chara_button").removeClass("blur");
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
