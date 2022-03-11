<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userSearchResult.css">
    <title>遅延状況詳細</title>

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
        <h2>遅延状況詳細
        </h2>




        <?php
        //データベース接続
        require_once 'data.php';
        if (isset($_GET["ID"])) {
            $cid = $_GET["ID"] == null ? null : sprintf("%s", htmlspecialchars(($_GET["ID"]), ENT_NOQUOTES, 'UTF-8'));
        } else {
            $cid = null;
        }
        $sql = "SELECT * FROM  Lend
            INNER JOIN Actor ON Lend.a_Num= Actor.a_Num
            INNER JOIN DOC ON Lend.DOC_Num= DOC.DOC_Num
            WHERE Lend.a_Num= :aNum 
            AND Lend.returnDate < CAST(GETDATE() AS DATE) 
            ";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam("aNum", $cid);
        $stmt->execute();




        $result = $stmt->fetchAll(PDO::FETCH_BOTH);

        ?>


        <table border="1" width="830">
            <thead>
                <tr>
                    <th>
                        利用者番号
                    </th>
                    <td>
                        <?php
                        foreach ($result as $row) {
                            print "$row[a_Num]";
                            break;
                        }
                        ?>
                    </td>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        利用者名
                    </th>
                    <td>
                        <?php
                        foreach ($result as $row) {
                            print "$row[a_Name]";
                            break;
                        }
                        ?>
                    </td>

                </tr>



                <tr>
                    <th>
                        電話番号
                    </th>
                    <td>
                        <?php
                        foreach ($result as $row) {
                            print "$row[a_TelNum]";
                            break;
                        }
                        ?>
                    </td>
                </tr>


            </tbody>
        </table>

        <h3>遅延資料</h3>

        <table border="1" width="830">

            <tr>
                <th>
                    画像
                </th>

                <th>
                    資料名
                </th>

                <th>
                    資料番号
                </th>

                <th>
                    遅延状況
                </th>
            </tr>

            <?php
            $num = 0;
            $firstDate  = new DateTime(date("y-m-d"));
            foreach ($result as $row) {
            ?>
                <tr>

                    <td>
                        <?php

                        print "<img src=\"../img/$row[img]\" alt=\"\ width=\"50px\" height=\"100px\">";
                        ?>
                    </td>
                    <th>
                        <?php
                        print "$row[title]";
                        ?>
                    </th>
                    <td>
                        <?php print "$row[DOC_Num]"; ?>
                    </td>
                    <?php
                    $num = $num + 1;
                    $secondDate = new DateTime("$row[returnDate]");
                    $intvl = $firstDate->diff($secondDate);
                    echo '<td>';
                    echo $intvl->days . " 日 ";
                    echo '</td>';
                    ?>
                </tr>

            <?php } ?>

        </table>


        <a href="index.php" class="btn btn--orange btn--cubic btn--shadow">ホームに戻る</a>
        <a href="delayList.php" class="btn btn--orange btn--cubic btn--shadow">遅延者リストに戻る</a>
    </main>
    <footer>


    </footer>
</body>

</html>