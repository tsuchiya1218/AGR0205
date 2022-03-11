<?php
require_once 'data.php';
session_start();
unset($_SESSION["e1"]);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/indexLibrarian.css">
    <title>新宿市立図書館</title>

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




        <br>
        <hr>
        <ul class="ul1">
            <?php
            print "<li class=\"li\"> <a href=\"index.php\" class=\"a1\">ホーム</a> </li>";
            print "<li class=\"li\"> <a href=\"ninsho.php?sisyo=1\" class=\"a1\">資料管理</a></li>";
            print " <li class=\"li\"> <a href=\"ninsho.php?sisyo=2\" class=\"a1\">利用者検索</a></li>";
            print "<li class=\"li\"> <a href=\"ninsho.php?sisyo=3\" class=\"a1\">利用者登録</a></li>";
            print "<li class=\"li\"> <a href=\"ninsho.php?sisyo=4\" class=\"a1\">返却</a></li>";
            ?>

        </ul>

    </header>
    <main>
        <?php
        print "<li class=\li\"><a href=\"ninsho.php?sisyo=5\" class=\"a1\">遅延者リスト</a></li>";
        print "<li class=\"li\"><a href=\"tagList.php\" class=\"a1\">タグ一覧</a></li>";
        print "<li class=\"li\"><a href=\"ninsho.php?sisyo=7\" class=\"a1\">予約管理</a></li>";
        ?>

        <form action="search.php" class="form1" method="get">
            <span id="kensaku"> 図書検索：</span><input type="text" name="data" width="150px" height="150px" class="kensaku">
            <input type="submit" value="検索" class="button2">
            <input type="button" value="詳細検索" onclick="location.href='dsearch.php'" class="button3"><br>
        </form>

        
            <form action="search_tagu.php" class="form1"　method="GET">
                <span style="font-size: 1.5em;color: navy;"> タグ検索：</span><input type="text" value="" name="data" style="font-size: 1.5em;">
                <input type="submit" value="検索" style="font-size: 1.5em;">
                <br>
                <br>
            </form>

        

    </main>
</body>

</html>