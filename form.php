<?php
 session_start();
 require('dbconnect.php');
 $id = $_SESSION['email'];
 $q = "$id";
 $sql = "SELECT * FROM members WHERE email = '$q'";
 $stmt  = $db->prepare($sql);
 $stmt->execute();
 $menber = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
 <meta name="viewport" content="width=device-wigth, initial-scale=1.0" charset="UTF-8">
 <title>form test</title>
 <link rel="stylesheet" type="text/css" href="css/style-form.css">
</head>
<body>

<div class="contena">

<div class="items left">

<div class="baner">
  <h3>Purchase</h3>
  <p>購入</p>
</div>
<div class="msg-tate">
  <h1>購入情報</h1>
</div>
<div class="gaku">
<img src="images/3o7p24soiq14m3sr_20121104184914_0740_0500.png" alt="">
</div>


</div>

<div class="items right">

  <div class="bar-wrap">
  <ul class="progressbar">
      <li class="active first">ご入力</li>
      <li class="second">ご確認</li>
      <li class="third">完了</li>
  </ul>
</div>

<div class="end">
  <h2>購入が完了しました！</h2>
  <h3>ありがとうございました</h3>
</div>

<div class="form-area">

 <div class="all-wrap">

<div class="container">
  <div class="row100">
  <div class="col">
    <div class="inputBox">
  <input type="text" name="email" id="email" required="required" placeholder="xxx@gmail.com" value="<?php  foreach($menber as $value){ echo $value['email'];}?>">
    <span class="text">Email*</span>
    <span class="line"></span>
      </div>
    </div>
  <div class="col">
      <div class="inputBox">
      <input type="text" name="pass" id="pass"  required="required" placeholder="●●●●●●">
      <span class="text">Password*</span>
      <span class="line"></span>
        </div>
      </div>
  </div>

  <div class="row100">
    <div class="col">
      <div class="inputBox">
      <input type="text" name="name" id="Name" required="required" placeholder="春 東太郎" value="<?php  foreach($menber as $value){ echo $value['name'];}?>">
      <span class="text">名前*</span>
      <span class="line"></span>
      </div>
    </div>
    <div class="col">
      <div class="inputBox">
      <input type="text" name="phonetic" id="kana" required="required" placeholder="ハル トウタロウ" value="<?php  foreach($menber as $value){ echo $value['phonetic'];}?>">
      <span class="text">フリガナ*</span>
      <span class="line"></span>
      </div>
    </div>
  </div>

  <div class="row100">
    <div class="col">
      <div class="inputBox">
      <input type="text" name="" id="yubin" required="required" placeholder="160-0023" value="<?php  foreach($menber as $value){ echo $value['postalcode'];}?>">
      <span class="text">郵便番号*</span>
      <span class="line"></span>
      </div>
    </div>
    <div class="col">
      <div class="inputBox">
      <input type="text" name="" id="address" required="required" placeholder="東京都新宿区西新宿1丁目7-3" value="<?php  foreach($menber as $value){ echo $value['address'];}?>">
      <span class="text">住所*</span>
      <span class="line"></span>
      </div>
    </div>
    <div class="col">
      <div class="inputBox">
      <input type="text" name="" id="phone" required="required" placeholder="03-3344-1010" value="<?php  foreach($menber as $value){ echo $value['phonenumber'];}?>">
      <span class="text">電話番号*</span>
      <span class="line"></span>
      </div>
    </div>
  </div>

  </div>

</div>

  <div class="choice">
  <label class="radio">
    <input type="radio" name="pay" id="cre" value="クレジットカード支払い" checked><span class="mark"></span>クレジットカード支払い
  </label>
  <br>
  <div class="container">
    <div class="row100">
  <div class="col">
    <div class="inputBox choice-area">
    <input type="text" name="" class="card-num" required="required" placeholder="●●●●●●">
    <span class="text choice-area">カード番号*</span>
    <span class="line"></span>
    </div>
  </div>
  <div class="col">
    <div class="inputBox choice-area">
    <input type="text" name="" class="card-kigen" required="required" placeholder="3-10">
    <span class="text choice-area">有効期限*</span>
    <span class="line"></span>
    </div>
  </div>
  <div class="col">
    <div class="inputBox choice-area">
    <input type="text" name="" class="card-secu" required="required" placeholder="111">
    <span class="text choice-area">セキュリティコード*</span>
    <span class="line"></span>
    </div>
  </div>
  <div class="col">
    <div class="inputBox choice-area">
    <input type="text" name="" class="card-meigi" required="required" placeholder="HAL TOKYO">
    <span class="text choice-area">カード名義人*</span>
    <span class="line"></span>
    </div>
  </div></div></div>
  <label class="radio choice-area">
    <input type="radio" name="pay" value="代金引換">
    <span class="mark"></span>代金引換
  </label>
  <br>
  <div class="daibiki">
    ヤマト宅配便<br></div>
    <div class="daibiki">
    配送料　無料
  </div>
  </div>
</div>

<div class="kakunin-link">
  <div class="email li-link"><li></li></div>
  <div class="pass li-link"><li></li></div>
  <div class="Name li-link"><li></li></div>
  <div class="kana li-link"><li></li></div>
  <div class="yubin li-link"><li></li></div>
  <div class="address li-link"><li></li></div>
  <div class="phone li-link"><li></li></div>
  <div class="pay li-link"><li></li></div>
  <div class="crenum cre-link"><li></li></div>
  <div class="kigen cre-link"><li></li></div>
  <div class="cord cre-link"><li></li></div>
  <div class="meigi cre-link"><li></li></div>

</div>
<div class="back-btn">
    <button id="back-btn">戻る</button>
    </div>
<div class="next-btn">
    <button id="next-btn">次へ</button>
    </div>

</div>
</div>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/form.js"></script>
</body>
</html>
