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
 <link rel="stylesheet" type="text/css" href="css/style-profile.css">
</head>
<body>
<div class="contena">

<div class="items left">

<div class="baner">
  <h3>Edit Profile</h3>
  <p>プロフィール</p>
</div>
<div class="msg-tate">
  <h1>情報編集</h1>
</div>
<div class="gaku">
  <img src="images/3o7p24soiq14m3sr_20121104184914_0740_0500.png" alt="">
</div>


</div>

<div class="items right">

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
      <input type="text" name="postalcode" id="yubin" required="required" placeholder="160-0023" value="<?php  foreach($menber as $value){ echo $value['postalcode'];}?>">
      <span class="text">郵便番号*</span>
      <span class="line"></span>
      </div>
    </div>
    <div class="col">
      <div class="inputBox">
      <input type="text" name="address" id="address" required="required" placeholder="東京都新宿区西新宿1丁目7-3" value="<?php  foreach($menber as $value){ echo $value['address'];}?>">
      <span class="text">住所*</span>
      <span class="line"></span>
      </div>
    </div>
    <div class="col">
      <div class="inputBox">
      <input type="text" name="phonenumber" id="phone" required="required" placeholder="03-3344-1010" value="<?php  foreach($menber as $value){ echo $value['phonenumber'];}?>">
      <span class="text">電話番号*</span>
      <span class="line"></span>
      </div>
    </div>
  </div>

  </div>

</div>
<div class="edit-btn">
  <input type="submit" id="edit" class="editbtn">
  <label for="edit">編集</label>
</div>
</div>
</div>

<script src="js/profile.js"></script>
</body>
</html>
