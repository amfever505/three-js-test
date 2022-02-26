<?php
error_reporting(0);
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
    <meta charset="UTF-8">
    <title>Farme | MY PAGE</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="bootstrap-5.0.0-beta1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/chara.css">

    <link rel="stylesheet" type="text/css"
        href="http://mplus-fonts.sourceforge.jp/webfonts/basic_latin/mplus_webfonts.css">
    <link rel="stylesheet" type="text/css"
        href="http://mplus-fonts.sourceforge.jp/webfonts/general-j/mplus_webfonts.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">

    <!--chara-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
                <div id="mypage_timeline">
                    <div id="mypage_timeline_title">
                        <h2>購入履歴</h2>
                        <p>1ヶ月内の購入履歴がありません。</p>
                    </div>
                    <div id="mypage_timeline_area">
                        <a href="">
                            <div id="mypage_timeline_box">
                                <p>--年--月--日</p>
                            </div>
                        </a>
                        <a href="">
                            <div id="mypage_timeline_box">
                                <p>--年--月--日</p>
                            </div>
                        </a>
                        <a href="">
                            <div id="mypage_timeline_box">
                                <p>--年--月--日</p>
                            </div>
                        </a>
                        <a href="">
                            <div id="mypage_timeline_box">
                                <p>--年--月--日</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div id="profile">
             <a href="custom.html"><img src="images/3o7p24soiq14m3sr_20121104184914_0740_0500.png" alt="profile" id="profile_img"></a> 
                <div id="profile_area">
                    <p>メールアドレス</p>
                    <?php
                    foreach($menber as $value){?>
                        <div id="profile_box"><?php echo '$value["email"]';?> </div>
                    <?php };
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
                    <a href="edit_profile.php">
                        <p class="">編集</p>
                    </a>
                </div>
            </div>
        </div>


    </div>
    <!--chara-->
    <div id="chara"></div>



    <!--Charanav-->
    <div id="popup_area" class="popup">
        <ul>
            <li>
                <a href="index.php">
                    <h2>Top page</h2>
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
            ×
        </div>
    </div>



    <!--QA-->
    <div id="popup_area2" class="popup">
        <div id="popup_area2_box1">
            <ul>
                <li>
                    <a href="index.php">
                    <h2>Top page</h2>
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
            ×
            </div>
        </div>
    </div>



    <!--Contact-->
    <div id="popup_area3" class="popup">
        <div id="popup_area2_box1">
            <ul>
                <li>
                    <a href="index.php">
                    <h2>Top page</h2>
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
            ×
            </div>
        </div>
    </div>
    
    <script src="js/chara-mypage.js"></script>
</body>

</html>