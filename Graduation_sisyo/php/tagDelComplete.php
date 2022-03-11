<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/searchByLi.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>詳細検索(司書)</title>

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


    </header>
    <main>

        <?php
        session_start();
        require_once 'data.php';
        $sql = "DELETE FROM Tagged WHERE tagID = :tagID";
        // 削除するレコードのIDは空のまま、SQL実行の準備をする
        $stmt = $dbh->prepare($sql);
        // 削除するレコードのIDを配列に格納する
        $params = array(':tagID' =>  $_SESSION["tagID"]);
        // 削除するレコードのIDが入った変数をexecuteにセットしてSQLを実行
        $stmt->execute($params);
        $sql1 = "DELETE FROM Tag WHERE tagID = :tagID";
        // 削除するレコードのIDは空のまま、SQL実行の準備をする
        $stmt = $dbh->prepare($sql1);
        // 削除するレコードのIDを配列に格納する
        $params = array(':tagID' =>  $_SESSION["tagID"]);
        // 削除するレコードのIDが入った変数をexecuteにセットしてSQLを実行
        $stmt->execute($params);
        // 削除完了のメッセージ
        echo '削除完了しました';
        ?>
        <script>
            jQuery(document).ready(function($) {
                $(".clickable-row").click(function() {
                    window.location = $(this).data("href");
                });
            });
        </script>


        <a href="index.php" class="btn btn--orange btn--cubic btn--shadow">ホームに戻る</a>

    </main>
</body>

</html>