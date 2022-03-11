<?
require_once 'data.php';
?>
<!DOCTYPE html>

<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>ログイン</title>
</head>



            <body>
    <main>
        <div class="title">
            <div class="logo_img">
                <a href="index.html"><img src="../img/title_logo.png" alt="" width="281" height="62"></a>
            </div>
            <div class="logo_txt">
                <p>Shinjuku City Library</p>
            </div>
        </div>
    </main>
    <header>
        <br>

        <hr>
        <div class="Topdiv">
            <div class="rogin">
                <h2 class="title1">Login</h2>
            </div>
            <div class="div">
                <form action="login_check.php" method="post">
                    <div class="div1">
                        ユーザーID：<input type="text" class="input" placeholder="What's your userId?" id="userId" name="user"><br>
                        パスワード：<input type="password" class="input" placeholder="Choose a password" id="pass" name="pass">
                        <input type="submit" value="Login !!" id="rogin">
                        <a href="password.html" style="margin-left: 180px"> パスワードを忘れた場合</a>
                    </div>
                </form>
            </div>
        </div>
    </header>
</body>

</html>