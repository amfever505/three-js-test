let mode = 1;

$('#next-btn').click(function(){
   if(mode == 1){
    $('.all-wrap').effect('drop',{direction:'up',distance:'50px'},300);
    $('.choice').effect('drop',{direction:'down',distance:'50px',mode:'show'},300);
    $('.back-btn').fadeIn();

    mode++;
  }else if(mode == 2){
    $('.choice').effect('drop',{direction:'up',distance:'50px'},300);
    mode++;
    $('.second').addClass("active");

$('.email').text("Email:"+$('#email').val());
$('.pass').text("Password:"+$('#pass').val());
$('.Name').text("名前:"+$('#Name').val());
$('.kana').text("フリガナ:"+$('#kana').val());
$('.yubin').text("郵便番号:"+$('#yubin').val());
$('.address').text("住所:"+$('#address').val());
$('.phone').text("電話番号:"+$('#phone').val());
$('.pay').text("支払方法:"+ $('input:radio[name="pay"]:checked').val());

  if($("#cre").prop("checked")){
    $('.crenum').text("カード番号:" + $('.card-num').val());
    $('.kigen').text("有効期限:" + $('.card-kigen').val());
    $('.cord').text("セキュリティコード:" + $('.card-secu').val());
    $('.meigi').text("カード名義人:" + $('.card-meigi').val());
    }else{
    $('.cre-link').text("");
    }

 $('.kakunin-link').addClass("kakunin");
 $('.cre-link').addClass("cre");
 $('.li-link').addClass("li");
 $('#next-btn').text("完了");
    $('.kakunin').effect('drop',{direction:'down',distance:'50px',mode:'show'},300);
  }else if(mode == 3){
     $('.third').addClass("active");
     $('.kakunin').effect('drop',{direction:'up',distance:'50px'},300);
     $('.back-btn').fadeOut();
     $('.next-btn').fadeOut();
     $('.end').effect('drop',{direction:'down',distance:'50px',mode:'show'},300);
     mode++;
  }
})


$('#back-btn').click(function(){
  if(mode == 1){
    location.href = 'custom.html';
  }else if(mode == 2){
     $('.choice').effect('drop',{direction:'down',distance:'50px'},300);
     $('.all-wrap').effect('drop',{direction:'up',distance:'50px',mode:'show'},300);
     $('.back-btn').fadeIn();
     mode--;
  }else if(mode == 3){
  $('.kakunin').effect('drop',{direction:'down',distance:'50px'},300);
  $('.choice').effect('drop',{direction:'up',distance:'50px',mode:'show'},300);
  $('#next-btn').text("次へ");
  $('.second').removeClass("active");
  mode--;
}else{

}

})
