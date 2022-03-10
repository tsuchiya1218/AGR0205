<?php
session_start();
require_once 'data.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/top.css">
    <title>新宿市立図書館</title>

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
        <br>
        <br>

        <h2>個人情報変更</h2>
        <hr style="margin-top: 0px;">
        <h3>電話番号を入力してください　</h3>
        <?php if(!empty($_SESSION['e'])){
            echo '<p style="color:red;">入力内容が一致しません</p>';
            $_SESSION['e']=null;
        }?>
        <form action="chenge.php"> 
            電話番号：<input type="tel" name="name" id="">
            <br>
            <br>
            もう一回入力してください<input type="tel" name="nameR" id="">
            <br><br>
            <input id="" name="chenge" type="hidden" value="a_TelNum">
            <input type="submit" value="確認">
        </form>
        <button onclick="history.back()" type="button"> 戻る </button>
    </header>

</body>

</html>