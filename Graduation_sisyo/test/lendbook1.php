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

        <h3>以下の内容で間違いがなければ貸出ボダンを押してください！</h3>
        <?php
        session_start();
        //データベース接続
        require_once 'data.php';

        $userNum = $_SESSION["userNum"];
        $bookNum = $_SESSION["bookNum"];
        $sql1 = "SELECT * FROM DOC where DOC.DOC_Num = :DOC_Num";
        $stmt = $dbh->prepare($sql1);
        $stmt->bindParam(':DOC_Num', $bookNum);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_BOTH);
        foreach ($result as $row) {
            if (1 !=  $row["stateNum"]) {
                $_SESSION["err1"] = "この本は貸出不可となっていますので、別の本を選択してください。";
                header("Location:lend2.php?bookNum=$bookNum");
                break;
            }
        }
        $sql = "SELECT * FROM Actor 
          where Actor.a_Num = :a_Num
        ";
        //SQL文を実行
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':a_Num', $userNum);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_BOTH);
        ?>
        <p>
            <span style="font-size: 25px;"> 利用者名前：</span>
            <?php
            foreach ($result as $row) {
                print $row["a_Name"];
            }
            ?>
        </p>
        <p>
            <span style="font-size: 25px;"> 利用者番号：</span>
            <?php
            foreach ($result as $row) {
                print $row["a_Num"];
            }

            ?>
        </p>
        <table border="1">
            <tr>
                <th>写真</th>
                <th>図書名</th>
                <th>著作者</th>
                <th>出版社</th>
                <th>図書番号</th>
                <th>貸出期間</th>
            </tr>
            <?php
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
                    print "<td> $row[witer]/編著</td>";
                    print "<td> -- $row[publisher] --</td>";
                    print "<td> $row[DOC_Num] </td>";
                    print "<td>二週間</td>";
                    print "</tr>";
                }
            }

            ?>

        </table>
        <p style="color: gray; font-size:13px;">※資料の貸出期間は二週間をかぎられています。よろしくお願いします。</p>


        <button onclick="window.location.href='lendbook2.php'" type="button">貸出</button>
        <button onclick="history.back()" type="button"> 戻る </button>

        <button onclick="window.location.href='index.php'"> ホームへ </button>

    </main>

</body>

</html>