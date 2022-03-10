
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userRegist.css">
    <title>資料削除</title>

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
        <h2>資料削除
        </h2>

        <h4>資料番号を入力し検索してください</h4>
        <form action="check_bookDel.php" method="GET">
            <input type="number" name="DOC_Num">
            <input type="submit" value="確認">
            <?php
            if (isset($_SESSION["errb1"])) {
               
                echo '<p style="color:red; font-size:12px;">' . $_SESSION["errb1"] . '</p>';
                unset($_SESSION["errb1"]);
            }else  if (isset($_SESSION["err12"])) {
               
                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err12"] . '</p>';
                unset($_SESSION["err12"]);
            }
            ?>
        </form>
        <br>



        <br>
        <a href="bookManage.php" class="btn btn--orange btn--cubic btn--shadow">戻る</a>

    </main>
    <footer>


    </footer>
</body>

</html>