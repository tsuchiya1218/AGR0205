<?php
require_once 'data.php';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/delayList.css">
    <title>印刷</title>

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
        <hr>

    </header>
    <main>
        <h2>印刷完了</h2>

        <?php


        //$bookNum = $_SESSION["bookNum"];
        print $_SESSION['num'];
        print "件の遅延者ハガキの印刷を完了しました";
        ?>

        <br>
        <!-- <a href="indexLibrarian.html" class="btn btn--orange btn--cubic btn--shadow">一斉送信</a> -->




        <a href="index.php" class="btn btn--orange btn--cubic btn--shadow">ホームに戻る</a>

    </main>
    <footer>


    </footer>
</body>

</html>