<?php
error_reporting(0);
 session_start();
 require('dbconnect.php');
 if (!isset($_SESSION['email']) && !isset($_COOKIE['email'])) {
    header('Location: index.php');
    exit();
    }
if(isset($_COOKIE['email'])){
    $id = $_COOKIE['email'];
}else{
    $id = $_SESSION['email'];
}
 $q = "$id";
 $sql = "SELECT * FROM members WHERE email = '$q'";
 $stmt  = $db->prepare($sql);
 $stmt->execute();
 $menber = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Farme | MYPAGE</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="bootstrap-5.0.0-beta1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/chara.css">

    <!--m+-->
    <link rel="stylesheet" type="text/css" href="http://mplus-fonts.sourceforge.jp/webfonts/basic_latin/mplus_webfonts.css">
    <link rel="stylesheet" type="text/css" href="http://mplus-fonts.sourceforge.jp/webfonts/general-j/mplus_webfonts.css">


    <!--Poiret One-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">

    <!--chara-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- usa -->
    <link rel="stylesheet" type="text/css" href="css/usa.css">

</head>

<body>
    <div class="mypage">
        <div id="side"></div>
        <div id="mypage_main">
            <div id="mypage_main1">
                <div id="mypage_title">
                    <h1>My Page</h1>
                    <h2>マイページ</h2>
                </div>
                <div id="profile_area">
                    <div id="profile_img">
                        <a href="custom.html"><img src="images/3o7p24soiq14m3sr_20121104184914_0740_0500.png" alt="profile" id="profile_img"></a>
                    </div>
                    <div id="profile">
                        <p>メールアドレス</p>
                        <?php
                    foreach($menber as $value){
                        echo '<div id="profile_box">'.$value['email'].'</div>';
                    }
                    ?>
                        <p>名前</p>
                        <?php
                    foreach($menber as $value){
                        echo '<div id="profile_box">'.$value['name'].'</div>';
                    }
                    ?>
                        <p>住所</p>
                        <?php
                    foreach($menber as $value){
                        echo '<div id="profile_box">'.$value['address'].'</div>';
                    }
                    ?>
                        <div id="edit">
                            <a href="edit_profile.php">
                                <p>EDIT</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="mypage_timeline">
                <div id="mypage_timeline_title">
                    <h2>購入履歴</h2>
                    <p>1ヶ月内の購入履歴です</p>
                </div>
                <div id="mypage_timeline_area">
                    <!-- <a href="purchase_details.html">
                        <div id="mypage_timeline_box">
                            <p>年月日</p>
                        </div>
                    </a> -->

                    <p>購入履歴がありません。</p>

                </div>
            </div>
        </div>




    </div>
     <!--chara-->
     <div class="U-wrap">

    <div class="Ubody">
    <img src="images/Ubody.png">
    <div class="Uhead">
    <img src="images/Uhead.png">
    <div class="Rear">
    <img src="images/Rear.png">
    </div>
    <div class="Lear">
    <img src="images/Lear.png">
    </div>
    <img src="images/eyes.png">
    </div>

    </div>

    <div id="over" style="width: 100%; height: 100vh; top:0; position: fixed;"></div>

    <div id="chara_button">
        <a href="custom.html">
            <p>額縁を作りに行く</p>
        </a>
    </div>



    <!--Charanav-->
    <div id="popup_area" class="popup">
        <ul>
            <li>
                <a href="index.php">
                    <h2>TOP PAGE</h2>
                    <p>トップページ</p>
                </a>
            </li>
            <li class="QA">
                <h2>Q&A</h2>
                <p>よくある質問</p>
            </li>
            <li class="contact">
                <h2>Contact</h2>
                <p>お問い合わせ</p>
            </li>
        </ul>


        <div class="batu">
            <font size="10">×</font>
        </div>
    </div>



    <!--QA-->
    <div id="popup_area2" class="popup">
        <div id="popup_area2_box1">
            <ul>
                <li>
                    <a href="index.php">
                        <h2>TOP PAGE</h2>
                        <p>トップページ</p>
                    </a>
                </li>
                <li class="QA">
                    <h2>Q&A</h2>
                    <p>よくある質問</p>
                </li>
                <li class="contact">
                    <h2>Contact</h2>
                    <p>お問い合わせ</p>
                </li>
            </ul>
        </div>


        <div id="popup_area2_box2">
            <h1>Q&A</h1>
            <h2>よくある質問</h2>
            <div id="popup_area2_box2_1">
                <div class="cp_qa">
                    <div class="cp_actab">
                        <input id="cp_tabfour031" type="checkbox" name="tabs">
                        <label for="cp_tabfour031">質問テキスト</label>
                        <div class="cp_actab-content" id="qa_1">
                            <p>答えテキスト</p>
                        </div>
                    </div>
                    <div class="cp_actab">
                        <input id="cp_tabfour032" type="checkbox" name="tabs">
                        <label for="cp_tabfour032">質問テキスト</label>
                        <div class="cp_actab-content" id="qa_2">
                            <p>答えテキスト</p>
                        </div>
                    </div>
                    <div class="cp_actab">
                        <input id="cp_tabfour033" type="checkbox" name="tabs">
                        <label for="cp_tabfour033">質問テキスト</label>
                        <div class="cp_actab-content" id="qa_3">
                            <p>答えテキスト</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div id="popup_area2_box3">
            <div class="batu">
                <font size="10">×</font>
            </div>
        </div>
    </div>



    <!--Contact-->
    <div id="popup_area3" class="popup">
        <div id="popup_area2_box1">
            <ul>
                <li>
                    <a href="index.php">
                        <h2>TOP PAGE</h2>
                        <p>トップページ</p>
                    </a>
                </li>
                <li class="QA">
                    <h2>Q&A</h2>
                    <p>よくある質問</p>
                </li>
                <li class="contact">
                    <h2>Contact</h2>
                    <p>お問い合わせ</p>
                </li>
            </ul>
        </div>


        <div id="popup_area2_box2">
            <h1>Content Us</h1>
            <h2>お問い合わせ</h2>
            <div id="popup_area2_box2_1">
                <form action="">
                    <div id="popup_category">
                        <p>カテゴリ</p>
                        <select name="example1" class="popup_select">
                            <option value="サンプル1">選択肢のサンプル1</option>
                            <option value="サンプル2">選択肢のサンプル2</option>
                            <option value="サンプル3">選択肢のサンプル3</option>
                            <option value="サンプル4">選択肢のサンプル4</option>
                            <option value="サンプル5">選択肢のサンプル5</option>
                        </select>
                    </div>
                    <div id="popup_title">
                        <p>タイトル</p>
                        <input type="text" class="popup_text">
                    </div>
                    <div id="popup_textarea">
                        <p>お問い合わせ内容</p>
                        <textarea name="" class="popup_textarea" cols="30" rows="10" value="aa"></textarea><br>
                    </div>
                    <input type="submit" class="popup_submit">
                </form>
            </div>
        </div>


        <div id="popup_area2_box3">
            <div class="batu">
                <font size="10">×</font>
            </div>
        </div>
    </div>
    <script src="js/chara_mypage.js"></script>
</body>

</html>