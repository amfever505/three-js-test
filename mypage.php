<!--未完成です！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！-->
<?php
require('dbconnect.php');
session_start();
$id = $_SESSION['email'];
$stmt = $db->prepare("SELECT * FROM 'members' WHERE email = ". $id);
$menber = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>kabeAR | HOME</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="bootstrap-5.0.0-beta1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

    <!--m+-->
    <link rel="stylesheet" type="text/css"
        href="http://mplus-fonts.sourceforge.jp/webfonts/basic_latin/mplus_webfonts.css">
    <link rel="stylesheet" type="text/css"
        href="http://mplus-fonts.sourceforge.jp/webfonts/general-j/mplus_webfonts.css">


    <!--Poiret One-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">

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
                        <p>1ヶ月内の購入履歴です</p>
                    </div>
                    <div id="mypage_timeline_area">
                        <a href="purchase_details.html">
                            <div id="mypage_timeline_box">
                                <p>年月日</p>
                            </div>
                        </a>
                        <a href="purchase_details.html">
                            <div id="mypage_timeline_box">
                                <p>年月日</p>
                            </div>
                        </a>
                        <a href="purchase_details.html">
                            <div id="mypage_timeline_box">
                                <p>年月日</p>
                            </div>
                        </a>
                        <a href="purchase_details.html">
                            <div id="mypage_timeline_box">
                                <p>年月日</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!--未完成です！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！-->
            <div id="profile">
                <img src="images/3o7p24soiq14m3sr_20121104184914_0740_0500.png" alt="profile" id="profile_img">
                <div id="profile_area">
                    <p>名前</p>
                    <div id="profile_box"></div>
                    <p>名前</p>
                    <div id="profile_box"></div>
                    <p>名前</p>
                    <div id="profile_box"></div>
                    <a href="edit_profile.html">
                        <p>編集</p>
                    </a>
                    <?php
                        foreach($menber as $value){
                echo '<p>メールアドレス</p>';
                echo '<div id="profile_box">'.$value['email'].'</div>';
                echo "<br>";
                echo '<p>名前</p>';
                echo '<div id="profile_box">'.$value['name'].'</div>';
                echo "<br>";
                echo '何か';
                echo $value[''];
        }
        ?>
                </div>
            </div>
        </div>


    </div>

</body>

</html>