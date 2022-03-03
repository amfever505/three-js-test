<?php
error_reporting(0);
require('dbconnect.php');
session_start();
if (!empty($_POST)) {

    // 重複アカウントのチェック
    if (empty($error)) {
        $member = $db->prepare('SELECT COUNT(*) AS cnt FROM members WHERE	email=?');
        $member->execute(array($_POST['email']));
        $record = $member->fetch();
        if ($record['cnt'] > 0) {
            $error['email'] = 'duplicate';
        }
    }

    if (strlen($_POST['password']) < 8) {
        $error['password'] = 'length';
    }

    // checkへ飛ばす
    if (empty($error)) {
        $_SESSION['join'] = $_POST;
        header('Location: check.php');
        exit();
    }
}
$message = '';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}
$_SESSION = [];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Farme | HOME</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="bootstrap-5.0.0-beta1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/slide.css">
    <link rel="stylesheet" href="css/chara.css">

    <!--m+-->
    <link rel="stylesheet" type="text/css" href="http://mplus-fonts.sourceforge.jp/webfonts/basic_latin/mplus_webfonts.css">
    <link rel="stylesheet" type="text/css" href="http://mplus-fonts.sourceforge.jp/webfonts/general-j/mplus_webfonts.css">


    <!--Poiret One-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">


    <!--slide-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>

    <!--chara-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- usa -->
    <link rel="stylesheet" type="text/css" href="css/usa.css">

    <!--横スクロール-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script src="js/infiniteslide.js"></script>
    <script src="js/jquery.pause.min.js"></script>

</head>

<body>
    <?php
    echo $message;
    ?>
    <?php
    $length = "<script type='text/javascript'>alert('パスワードは8文字以上でお願いします');</script>";
    $duplicate = "<script type='text/javascript'>alert('そのメールアドレスは使われています');</script>";
    ?>
    <?php if ($error['password'] == 'length'): ?>
        <?php
        echo $length;
        ?>
		<?php endif; ?>
    
    <?php if ($error['email'] == 'duplicate'): ?>
        <?php
        echo $duplicate;
        ?>
		<?php endif; ?>

    <!-- OP Movie -->
    <!-- <div id="screen">
    <video class="vid" src="images/logo.mp4" playsinline autoplay muted></video>
    </div> -->

    <!--main-->
    <div class=main>
        <img src="images/logo.png" alt="logo" class="logo">

        <div class="main_txt">
            <h1>
                AR FRAME</h1>
            <h1>
                BY YOUR CREATION
            </h1>
            <p>想いの形を、あなたの傍に。</p>
        </div>
    </div>

    <div class="movie">
        <video src="images/HEW.mp4" loop playsinline autoplay muted></video>
    </div>

    <!--introduction-->
    <main class="main-content">
        <section class="slideshow">
            <div class="slideshow-inner">
                <div class="slides">
                    <div class="slide is-active ">
                        <div class="slide-content">
                            <div class="caption">
                                <div id="int_txtarea">
                                    <div id="int_txtarea_1">
                                        <h1>Our features</h1>
                                        <h2>サイト紹介</h2>
                                    </div>
                                    <div id="int_txtarea_2">
                                        <div id="int_txtarea_2_1">
                                            <h3>1</h3>
                                        </div>
                                        <div id="int_txtarea_2_2">
                                            <h2>コンセプト</h2>
                                            <p>私たちは「想いを形に」<br>をコンセプトに掲げ、<br>自由度の高い額縁を<br>企画・製造しています</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="int_img">
                                    <img src="images/int_img.png" alt="額縁の画像" width="100%">
                                </div>

                            </div>
                        </div>
                        <div class="image-container" style="background-color: #576d6e; box-shadow:0px 0px 8px 3px rgb(77, 77, 77) inset;">

                        </div>
                    </div>
                    <div class="slide">
                        <div class="slide-content">
                            <div class="caption">
                                <div id="int_txtarea">
                                    <div id="int_txtarea_1">
                                        <h1>Our features</h1>
                                        <h2>サイト紹介</h2>
                                    </div>
                                    <div id="int_txtarea_2">
                                        <div id="int_txtarea_2_1">
                                            <h3>2</h3>
                                        </div>
                                        <div id="int_txtarea_2_2">
                                            <h2>カスタマイズ</h2>
                                            <p>模様・配色などを自由に<br>組み合わせることにより、あなただけの額縁を<br>生み出すことが出来ます</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="int_img">
                                    <img src="images/int_img2.png" alt="額縁の画像" width="100%">
                                </div>
                            </div>
                        </div>
                        <div class="image-container" style="background-color: #694B2F;  box-shadow:0px 0px 8px 3px rgb(59, 59, 59) inset;">

                        </div>
                    </div>
                    <div class="slide">
                        <div class="slide-content">
                            <div class="caption">
                                <div id="int_txtarea">
                                    <div id="int_txtarea_1">
                                        <h1>Our features</h1>
                                        <h2>サイト紹介</h2>
                                    </div>
                                    <div id="int_txtarea_2">
                                        <div id="int_txtarea_2_1">
                                            <h3>3</h3>
                                        </div>
                                        <div id="int_txtarea_2_2">
                                            <h2>AR プレビュー</h2>
                                            <p>AR技術により、作成された額縁を立体的に表示。<br>あなたの中のイメージを、<br>より確かなものとします</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="int_img">
                                    <img src="images/int_img3.png" alt="額縁の画像" width="100%">
                                </div>
                            </div>
                        </div>
                        <div class="image-container" style="background-color: #505e39;  box-shadow:0px 0px 8px 3px rgb(59, 59, 59) inset;">

                        </div>
                    </div>

                </div>
                <div class=" pagination">
                    <div class="item is-active">
                        <span class="icon">1</span>
                    </div>
                    <div class="item">
                        <span class="icon">2</span>
                    </div>
                    <div class="item">
                        <span class="icon">3</span>
                    </div>
                </div>
                <div class="arrows">
                    <div class="arrow prev">
                        <span class="svg svg-arrow-left">
                            <svg version="1.1" id="svg4-Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="14px" height="26px" viewBox="0 0 14 26" enable-background="new 0 0 14 26" xml:space="preserve">
                                <path d="M13,26c-0.256,0-0.512-0.098-0.707-0.293l-12-12c-0.391-0.391-0.391-1.023,0-1.414l12-12c0.391-0.391,1.023-0.391,1.414,0s0.391,1.023,0,1.414L2.414,13l11.293,11.293c0.391,0.391,0.391,1.023,0,1.414C13.512,25.902,13.256,26,13,26z" />
                            </svg>
                            <span class="alt sr-only"></span>
                        </span>
                    </div>
                    <div class="arrow next">
                        <span class="svg svg-arrow-right">
                            <svg version="1.1" id="svg5-Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="14px" height="26px" viewBox="0 0 14 26" enable-background="new 0 0 14 26" xml:space="preserve">
                                <path d="M1,0c0.256,0,0.512,0.098,0.707,0.293l12,12c0.391,0.391,0.391,1.023,0,1.414l-12,12c-0.391,0.391-1.023,0.391-1.414,0s-0.391-1.023,0-1.414L11.586,13L0.293,1.707c-0.391-0.391-0.391-1.023,0-1.414C0.488,0.098,0.744,0,1,0z" />
                            </svg>
                            <span class="alt sr-only"></span>
                        </span>
                    </div>
                </div>
            </div>
        </section>
    </main>



    <!--gallely-->
    <div class="gal">
        <div id="gal_txtarea">
            <div id="gal_title">
                <h1>Gallely</h1>
                <h2>作品集</h2>
            </div>
            <div id="gal_txtarea_1">
                <h2>無限に広がる創造の世界</h2>
                <p>今までに作成された額縁をピックアップしております。</p>
            </div>
        </div>
        <div class="infiniteslide1">
            <ul>
                <li><img src="images/model1.png" alt="" width="300" height="350" /></li>
                <li><img src="images/model3.png" alt="" width="300" height="350" /></li>
                <li><img src="images/model6.png" alt="" width="300" height="350" /></li>
                <li><img src="images/model5.png" alt="" width="300" height="350" /></li>
            </ul>
        </div>
    </div>



    <!--login-->
    <div class="login">
        <section class="panels">
            <article class="panels__side panels__side--left">
                <div class="panels__side panels__side--inner-left">
                    <p>ゲストとして額縁のカスタマイズを始めます。</p>
                    <div class="number"><span class="num3">3</span><span class="num2">2</span><span class="num1">1</span></div>
                </div>
                <div class="panels__side panels__side--inner">
                    <div id="login_area1">
                        <div id="login_area1_title">
                            <h1>Continue as Guest</h1>
                            <h2>ゲストとして始める</h2>
                        </div>
                        <input type="button" class="loginbtn" id="btn2" value="始める">
                        <svg class="loginarrow loginarrow--left" width="40" height="40" viewBox="0 0 24 24">
                            <path d="M0 0h24v24h-24z" fill="none" />
                            <path d="M20 11h-12.17l5.59-5.59-1.42-1.41-8 8 8 8 1.41-1.41-5.58-5.59h12.17v-2z" />
                        </svg>
                    </div>
                </div>
            </article>
            <article class="panels__side panels__side--right">
                <div class="panels__side panels__side--inner">
                    <div id="login_area2">
                        <div class="login_area2_title" id="ttl1">
                            <h1>Login</h1>
                            <h2>& 会員登録</h2>
                        </div>
                        <input type="button" class="loginbtn" id="btn1a" value="ログイン">
                        <input type="button" class="loginbtn" id="btn1b" value="会員登録">
                        <svg class="loginarrow loginarrow--right" width="40" height="40" viewBox="0 0 24 24">
                            <path d="M0 0h24v24h-24z" fill="none" />
                            <path d="M12 4l-1.41 1.41 5.58 5.59h-12.17v2h12.17l-5.58 5.59 1.41 1.41 8-8z" />
                        </svg>
                    </div>
                </div>
                <div class="panels__side panels__side--inner-right">
                    <div class="login_area2_content" id="ctn1">
                        <div class="container">
                            <h2>ログイン</h2>
                            <p>メールアドレスとパスワードをご入力の上、<br>ログインしてください。
                            <p>
                            <form action="login.php" method="post" enctype="multipart/form-data">
                                <br>
                                <div class="row100">
                                    <div class="col">
                                        <div class="inputBox">
                                            <input type="email" name="email" required="required" value="<?php echo htmlspecialchars($_POST['email'], ENT_QUOTES); ?>" />
                                            <span class="text">メールアドレス</span>
                                            <span class="line"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row100">
                                    <div class="col">
                                        <div class="inputBox">
                                            <input type="password" name="password" required="required" value="<?php echo htmlspecialchars($_POST['password'], ENT_QUOTES); ?>" />
                                            <span class="text">パスワード</span>
                                            <span class="line"></span>
                                        </div>
                                    </div>
                                    <span class="pass" id="btn3" style="cursor: pointer;">パスワードをお忘れの方</span><br>
                                </div>
                                <br>
                                <label for="save" style="cursor: pointer;"><input id="save" type="checkbox" name="save" value="on"> 次回から自動的にログインする</label>

                                <div class="row100">
                                    <div class="col">
                                        <input type="submit" value="送信" class="login_submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="login_area2_content" id="ctn2">
                        <div class="container">
                            <h2>会員登録</h2>
                            <p>会員登録がまだお済みでない方はこちら。
                            <p>
                            <form action="" method="post" enctype="multipart/form-data">
                                <br>
                                <div class="row100">
                                    <div class="col">
                                        <div class="inputBox">
                                            <input type="email" name="email" required="required" value="<?php echo htmlspecialchars($_POST['email'], ENT_QUOTES); ?>" />
                                            <span class="text">メールアドレス</span>
                                            <span class="line"></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="inputBox">
                                            <input type="password" name="password" required="required" value="<?php echo htmlspecialchars($_POST['password'], ENT_QUOTES); ?>" />
                                            <span class="text">パスワード</span>
                                            <span class="line"></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="inputBox">
                                            <input type="text" name="name" required="required" value="<?php echo htmlspecialchars($_POST['name'], ENT_QUOTES); ?>" />
                                            <span class="text">名前</span>
                                            <span class="line"></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <input type="submit" value="登録" class="login_submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="login_area2_content" id="ctn3">
                        <div class="container">
                            <h2>パスワード変更</h2>
                            <p>パスワードを変更したいアカウントの<br>メールアドレスを入力してください</p>
                            <br>
                            <form action="sentemail.php" method="post" enctype="multipart/form-data">
                                <div class="row100">
                                    <div class="col">
                                        <div class="inputBox">
                                            <input type="email" name="subject" id="subject" required="required" size="35" maxlength="255" value="<?php echo htmlspecialchars($_POST['email'], ENT_QUOTES); ?>" />
                                            <span class="text">メールアドレス</span>
                                            <span class="line"></span>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="inputBox">
                                            <input type="password" name="pass" id="pass" required="required" size="35" maxlength="255" value="<?php echo htmlspecialchars($_POST['password'], ENT_QUOTES); ?>" />
                                            <span class="text">パスワード</span>
                                            <span class="line"></span>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <input type="submit" value="送信" class="login_submit">
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>

                </div>
            </article>
        </section>
    </div>



    <!--team-->
    <div class="team">
        <div id="team_title">
            <h1>Our team</h1>
            <h2>メンバー紹介</h2>
        </div>
        <div id="team_back"></div>
        <div id="team_list">
            <div id="team_list_big">
                <div id="team_list_mini">
                    <img src="images/kasumi.png" alt="kasumi" id="team_img">
                    <div id="team_txt">
                        <h2>陳姿穎</h2>
                        <p style="margin-left: 10px;">three.js＆AR機能実装担当。<br>なんでも屋。</p>
                    </div>
                </div>
                <div id="team_list_mini">
                    <img src="images/hagiwara.png" alt="hagiwara" id="team_img">
                    <div id="team_txt">
                        <h2>萩原玖留美</h2>
                        <p style="margin-left: 10px;">トップページ・ナビ等、<br>フロントエンド実装担当。</p>
                    </div>
                </div>
                <div id="team_list_mini">
                    <img src="images/hiroki.png" alt="hiroki" id="team_img">
                    <div id="team_txt">
                        <h2>小出洋輝</h2>
                        <p style="margin-left: 10px;">php・サーバー関連、<br>バックエンド全般担当。</p>
                    </div>
                </div>
            </div>
            <div id="team_list_big" style="margin-top: 100px;">
                <div id="team_list_mini">
                    <img src="images/lely.png" alt="usagi" id="team_img">
                    <div id="team_txt">
                        <h2>レホアンフオンリ</h2>
                        <p style="margin-left: 10px;">画面設計・UI/UX実装担当。</p>
                    </div>
                </div>
                <div id="team_list_mini">
                    <img src="images/usagi_sleep2.png" alt="usagi" id="team_img">
                    <div id="team_txt">
                        <h2>清野遥菜</h2>
                        <p style="margin-left: 10px;">キャラ・モデルデザイン&制作担当。</p>
                    </div>
                </div>
                <div id="team_list_mini">
                    <img src="images/rintaro.png" alt="usagi" id="team_img">
                    <div id="team_txt">
                        <h2>山﨑倫太郎</h2>
                        <p style="margin-left: 10px;">キャラ・フォーム操作実装担当。<br></p>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!--techs-->
    <div class="techs">
        <div id="techs_title">
            <h1>Our techs</h1>
            <h2>使用技術</h2>
        </div>

        <div id="techs_contents">
            <div class="techs_wrap">
                <div class="techs_item">
                    <img src="images/HTML5.png" />
                    <h2>HTML5</h2>
                </div>
                <div class="techs_item">
                    <img src="images/CSS3.png" />
                    <h2>CSS3</h2>
                </div>
                <div class="techs_item">
                    <img src="images/JS.png" />
                    <h2>JavaScript</h2>
                </div>
                <div class="techs_item">
                    <img src="images/PHP.png" />
                    <h2>MySQL</h2>
                </div>

                <div class="techs_item">
                    <img src="images/threejs.png" />
                    <h2>three.js</h2>
                </div>
                <div class="techs_item">
                    <img src="images/arjs.png" />
                    <h2>AR.js</h2>
                </div>
                <div class="techs_item">
                    <img src="images/blender.png" />
                    <h2>Blender</h2>
                </div>
                <div class="techs_item">
                    <img src="images/heroku.png" />
                    <h2>heroku</h2>
                </div>
            </div>
        </div>
    </div>



    <!--????-->
    <div class="back">
    </div>



    <!--footer-->
    <footer>
        <div id="footer_1">
            <div id="footer_box">
                <img src="images/logo.png" alt="logo" id="footer_logo">
            </div>
            <div id="footer_box">
                <h2>Our features</h2>
                <p>サイト紹介</p>
                <h2>Gallery</h2>
                <p>商品集</p>
                <h2>Our team</h2>
                <p>メンバー紹介</p>
                <h2>Our techs</h2>
                <p>使用技術</p>
            </div>
            <div id="footer_box">
                <h2>SNS</h2>
                <p>Twitter</p>
                <p>Instagram</p>
                <p>Facebook</p>
                <p>Youtube</p>
            </div>
            <div id="footer_box">
                <h2>Access</h2>
                <p>連絡先</p>
                <p>〒168-000</p>
                <p>東京都新宿区○○ HALTOKYO</p>
            </div>
        </div>

        <div id="footer_2">
            <p class="copy">AllCopyright &copy; farmeteam</p>
        </div>
    </footer>



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


    <!--Charanav-->
    <div id="popup_area" class="popup">
        <ul>
            <li>
                <a href="mypage.php">
                    <h2>My page</h2>
                    <p>マイページ</p>
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
                    <a href="mypage.html">
                        <h2>My page</h2>
                        <p>マイページ</p>
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
                    <a href="mypage.html">
                        <h2>My page</h2>
                        <p>マイページ</p>
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



    <script type="text/javascript">
        $(window).on('load', function() {
            $('.infiniteslide1').infiniteslide();
        });
    </script>
    <script type="text/javascript" src="js/slide.js"></script>
    <script src="js/chara.js"></script>
    <script src="js/index.js"></script>

</body>

</html>