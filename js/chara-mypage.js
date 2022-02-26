jQuery(function () {
    var chara = $('#chara');
    chara.css('right', '50px');
    
    $("#popup_area").hide();
    $("#popup_area2").hide();
    $("#popup_area3").hide();

    chara.click(function () {
        $("#popup_area").show();
        $(".mypage").addClass("blur");
        $("body").addClass("stop");
        return false;
    });
});



$('.batu').click(function () {
    $("#popup_area,#popup_area2,#popup_area3").hide();
    $(".mypage").removeClass("blur");
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


