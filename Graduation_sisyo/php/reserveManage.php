<?php

require_once 'data.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userRegist.css">
    <title>予約管理</title>

</head>

<body>
    <header>
        <div class="title">
            <div class="logo_img">
                <img src="../img/title_logo.png" alt="" width="281" height="62">
            </div>
            <div class="logo_txt">
                <p>Shinjuku City Library</p>
            </div>
        </div>

        <p>司書：<a href="" class="">黄</a></p>

        <br>
        <hr>

    </header>
    <main>
        <h2>予約管理
        </h2>
        <p style="color: red;">
            <?php 
            session_start();
            $_SESSION['Book']=null;
            if(!empty($_SESSION['e_no'])){
            echo "予約番号をお確かめの上もう一度入力してください";
            $_SESSION['e_no']=null;
            }
            ?>
            </p>
        <form action="reserveDetail.php" >
            
            <span id="kensaku"> 予約番号：</span>
            <input type="text" name="r_Num" width="150px" height="150px" >
             <input type="submit" value="検索" class="button2">
             <br>
 
         </form>
        <a href="reserveList.php" class="btn btn--orange btn--cubic btn--shadow">取り置きリスト</a>

        <br>
        <br>
        <br>
        <a href="index.php" class="btn btn--orange btn--cubic btn--shadow">ホームに戻る</a>
    </main>
    <footer>


    </footer>
</body>

</html>