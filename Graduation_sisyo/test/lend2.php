<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/lend.css">
    <title>貸出画面</title>
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
        <h4>
            <!-- ３つの資料が読み取られました。<br> -->
            以下の情報で間違いありませんか
        </h4>
        <table>
            <?php
            session_start();

            $bookNum = $_GET["bookNum"] == null ? null : sprintf("%s", htmlspecialchars(($_GET["bookNum"]), ENT_NOQUOTES, 'UTF-8'));
            $_SESSION["bookNum"] = $bookNum;

            //データベース接続
            require_once 'data.php';

            $sql = "SELECT * FROM  DOC
                        INNER JOIN Kind ON DOC.k_Num= Kind.k_Num
                        INNER JOIN BookState ON DOC.stateNum= BookState.stateNum
                        INNER JOIN Genre ON DOC.genreNum= Genre.genreNum
                        where DOC.DOC_Num = :DOC_Num
                        ";

            //SQL文を実行
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':DOC_Num', $bookNum);
            $stmt->execute();
            // 検索結果のデータを一件ずつ取り出す:fetch() 
            $result = $stmt->fetchAll(PDO::FETCH_BOTH);
            if (count($result) > 0) {
                $sum = 0;
                foreach ($result as $row) {
                    print "<tr>";
                    print "<td style=\"padding: 20px;\"> <img src=\"../img/$row[img]\" width=\"80px\" height=\"130px\"></td>";
                    print "<th> $row[title]</th>";
                    print "<td> $row[witer]/編著 --</td>";
                    print "<td> $row[publisher] --</td>";
                    print "<td> $row[DOC_Num] </td>";
                    print "</tr>";
                }
            }
            ?>
        </table>
        <?php
        if (isset($_SESSION["err1"])) {
            echo '<p style="color:red; font-size:12px;">' . $_SESSION["err1"] . '</p>';
            unset($_SESSION["err1"]);
        }
        print "<input type=\"button\" value=\"再読み込み\" onclick=\"location.href=lend2.php?bookNum=$bookNum \" class=\"button3\">";
        ?>
        <br>
        <br>
        <p>読み取りがうまくいかなかった場合はこちらで資料番号を入力してください</p>
        <p>
        <form action="lend2.php" method="get">
            <input type="text" id="bookId" name="bookNum" required>
            <input type="submit" value="更新">
        </form>

        </p>
        <button type="button" class="btn btn-primary btn-sm" onclick="location.href='lendbook1.php'">確認</button>
        <button onclick="window.location.href='index.php'"> ホームへ </button>


    </main>

</body>

</html>