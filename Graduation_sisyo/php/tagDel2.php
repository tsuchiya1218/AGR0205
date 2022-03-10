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


        <?php
        require_once 'data.php';
        session_start();
        $id= $_SESSION["id"] ;
        
        $sql = "SELECT * FROM Librarian";
        $stmt = $dbh->prepare($sql);
        // 削除するレコードのIDが入った変数をexecuteにセットしてSQLを実行
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_BOTH);
        if (count($result) > 0) {
        }

        ?>
        <p>
            司書：
            <a href="" class="">
                <?php
                foreach ($result as $row) {
                    if ($row["l_ID"] == $id) {
                        print "$row[l_Name]";
                    }
                }
                ?>
            </a>
        </p>
        <br>
        <hr>


    </header>
    <main>
        <?php
        $tagu = $_SESSION["tagID"];

        //データベース接続
        require_once 'data.php';

        $sql = "SELECT * FROM Tag WHERE tagID = :tagID";

        // 削除するレコードのIDは空のまま、SQL実行の準備をする
        $stmt = $dbh->prepare($sql);

        // 削除するレコードのIDを配列に格納する
        $params = array(':tagID' => $tagu);

        // 削除するレコードのIDが入った変数をexecuteにセットしてSQLを実行
        $stmt->execute($params);
        $result = $stmt->fetchAll(PDO::FETCH_BOTH);
        if (count($result) > 0) {

            foreach ($result as $row) {
                print "<h2>";
                print "$row[tagName]タグを削除してよろしいでしょうか。";
                print "</h2>";
            }
        }
        ?>



        <script>
            jQuery(document).ready(function($) {
                $(".clickable-row").click(function() {
                    window.location = $(this).data("href");
                });
            });
        </script>

        <a href="search_tagu_delet.php" class="btn btn--orange btn--cubic btn--shadow">確認</a>

        <a href="index.php" class="btn btn--orange btn--cubic btn--shadow">ホームに戻る</a>

    </main>
</body>

</html>