<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/indexLibrarian.css">
    <title>削除完了画面</title>

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
        session_start();
        require_once 'data.php';
        $id = $_SESSION["id"];
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
        //データベース接続
        require_once 'data.php';
        $cid = $_GET["DOC"] == null ? null : sprintf("%s", htmlspecialchars(($_GET["DOC"]), ENT_NOQUOTES, 'UTF-8'));
  
        // DELETE文を変数に格納
        $sql = "DELETE FROM DOC WHERE DOC_Num = :DOC_123Num";
         
        // 削除するレコードのIDは空のまま、SQL実行の準備をする
        $stmt = $dbh->prepare($sql);
         
        // 削除するレコードのIDを配列に格納する
        $params = array(':DOC_123Num'=> $cid);
         
        // 削除するレコードのIDが入った変数をexecuteにセットしてSQLを実行
        $stmt->execute($params);
         
        // 削除完了のメッセージ
        echo '削除完了しました';

        ?>
       
        <br>
       <a href="bookDel.php" class="btn btn--orange btn--cubic btn--shadow">資料削除に戻る</a>
        <a href="index.php" class="btn btn--orange btn--cubic btn--shadow">ホームに戻る</a>

    </main>
    
</body>

</html>
