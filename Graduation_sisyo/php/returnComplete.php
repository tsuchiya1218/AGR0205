<!DOCTYPE html>
<html lang="ja">




<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/indexLibrarian.css">
    <title>返却完了画面</title>

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

        require_once 'data.php';

        $bookNum = $_SESSION["bookNum"];
        

        try {
            $sql1 = "UPDATE DOC SET stateNum = 1  WHERE DOC_Num = :DOC_Num";
            $sql2 ="UPDATE Lend SET returnDate = CAST(GETDATE() AS DATE)  WHERE DOC_Num = :DOC_Num";
            $sql3 ="UPDATE Lend SET lendCheck = 1  WHERE DOC_Num = :DOC_Num";
            
            
            $stmt = $dbh->prepare($sql1);
            $stmt->bindParam(':DOC_Num', $bookNum);
            $res = $stmt->execute();

            $stmt2 = $dbh->prepare($sql2);
            $stmt2->bindParam(':DOC_Num', $bookNum);
            $res2 = $stmt2->execute();

            $stmt3 = $dbh->prepare($sql3);
            $stmt3->bindParam(':DOC_Num', $bookNum);
            $res3 = $stmt3->execute();


        } catch (Exception $e) {
            
            print 'データベースへのアクセスにエラーが発生しました。';
            print $e;
            exit();
        }





        ?>
        <!-- <div class="img1">
            <img src="../img/c.jpeg" alt="" width="150px" height="250px">
        </div> -->
        <p>返却が完了しました</p>


        <a href="index.php" class="btn btn--orange btn--cubic btn--shadow">ホームに戻る</a>

    </main>

</body>

</html>