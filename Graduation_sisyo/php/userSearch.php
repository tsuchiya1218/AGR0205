<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dsearch.css">
    <title>利用者検索</title>

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
        if (isset($_GET["id"])) {

            $id = $_GET["id"];
            session_start();
            $_SESSION["id"] = $id;
        }else{
            $id="";
        }
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
        <?php
        //データベース接続
        require_once 'data.php';
        ?>

        <form action="userSearchResult.php" method="get">

            <select name="type">
                <option value="a_Num">利用者番号</option>
                <option value="a_TelNum">電話番号</option>
                <option value="a_Mail">メールアドレス</option>
            </select>

            <input type="text" name="userID">

            <input type="submit" name="" id="" value="検索">



        </form>
        <a href="index.php" class="btn btn--orange btn--cubic btn--shadow">ホームに戻る</a>


    </main>
</body>

</html>