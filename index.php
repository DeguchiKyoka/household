<?php
session_start();

$_SESSION['login_id'] = "";
$_SESSION['login_nicname'] = "";

//エラーの初期化
if(!empty($_SESSION['login_errorMessage'])){
    $errorMessage = $_SESSION['login_errorMessage'];
}else{
    $errorMessage = "";
}

//サニタイジング
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

?>
<!doctype html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>ログイン</title>
        <link rel="stylesheet" type="text/css" media="all" href="./css/style.css">
    </head>

    <body>
        <script type="text/javascript">
            function checkForm($this)
            {
                var str=$this.value;
                while(str.match(/[^A-Z^a-z\d\-]/))
                {
                    str=str.replace(/[^A-Z^a-z\d\-]/,"");
                }
                $this.value=str;
            }
        </script>

        <!-- 全体の画面の大きさ -->
        <div id="body">
            <!-- ログイン -->
            <div class="center">

                <!-- テキスト -->
                <h1 class="login_comment">
                    <p>ログイン</p>
                </h1>

                <h2 class="login_comment1">
                    <p>ID入力</p>
                </h2>

                <h2 class="login_comment2">
                    <p>パスワード入力</p>
                </h2>

                <h2 class="login_comment4">
                    <a href="makeid.php" style="text-decoration:none;"><p>アカウントをお持ちでない方</p></a>
                </h2>

                <h2 class="login_comment5">
                    <a href="lostpass.php" style="text-decoration:none;"><p>パスワードをお忘れの方</p></a>
                </h2>

                <form method="post" action="./_c/login_c.php">
                    <input class="login_comment_text1" type="text" name="user_id"  placeholder="IDを入力してください" onInput="checkForm(this)" maxlength="20">
                    <input class="login_comment_text2" type="text" name="password"  placeholder="パスワードを入力してください" onInput="checkForm(this)" maxlength="20">
                    <input type="submit" class="login_comment3" value="決定">
                </form>

            </div>

        </div>

    </body>

</html>
