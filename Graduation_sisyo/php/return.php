

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/indexLibrarian.css">
    <title>返却画面</title>

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
        <!-- <div class="img1">
            <img src="../img/c.jpeg" alt="" width="150px" height="250px">
        </div> -->
        <p>RFID情報を読み取ってください</p>


        <br>

        <p>読み取りがうまくいかなかった場合はこちらで資料番号を入力してください</p>
        <p>
        <form action="return2.php"  method="get">
            <input type="text" name="bookId" >
            <input type="submit" value="追加" class="button2">
        </form>
            </p>

            <a href="index.php" class="btn btn--orange btn--cubic btn--shadow">ホームに戻る</a>


    </main>

</body>

</html>