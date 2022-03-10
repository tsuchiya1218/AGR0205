<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userSearchResult.css">
    <title>利用者詳細</title>

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
        <h2>利用者詳細
        </h2>

        <?php
        //データベース接続
        require_once 'data.php';
        $a_Num = $_GET["a_Num"];
        $cid = $_GET["a_Num"] == null ? null : sprintf("%s", htmlspecialchars(($_GET["a_Num"]), ENT_NOQUOTES, 'UTF-8'));

        $sql = "SELECT * FROM  Actor 
        where Actor.a_Num = :a_Num";
        //SQL文を実行
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':a_Num', $cid);
        $stmt->execute();
        // 検索結果のデータを一件ずつ取り出す:fetch() 
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
                        利用者名カナ
                    </th>
                    <td>
                        <?php
                        foreach ($result as $row) {
                            print "$row[a_Furigana]";
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

                <tr>
                    <th>
                        メールアドレス
                    </th>
                    <td>
                        <?php
                        foreach ($result as $row) {
                            print "$row[a_Mail]";
                            break;
                        }

                        ?>
                    </td>
                </tr>

                <tr>
                    <th>
                        郵便番号
                    </th>
                    <td>
                        <?php
                        foreach ($result as $row) {
                            print "$row[a_ANum]";
                            break;
                        }

                        ?>
                    </td>
                </tr>

                <tr>
                    <th>
                        住所
                    </th>
                    <td>
                        <?php
                        foreach ($result as $row) {
                            print "$row[a_Address]";
                            break;
                        }

                        ?>
                    </td>
                </tr>

                <tr>
                    <th>
                        住所カナ
                    </th>
                    <td>
                        <?php
                        foreach ($result as $row) {
                            print "$row[a_AFrigana]";
                            break;
                        }

                        ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <a href="index.php" class="btn btn--orange btn--cubic btn--shadow">ホームに戻る</a>
        <!-- <a href="userSearch.php" class="btn btn--orange btn--cubic btn--shadow">利用者検索に戻る</a> -->
        <?php
        $cid=$_SESSION["id"];
        //echo$cid;
       
        print "<a href=\"userSearchResult.php?userID =$cid\" class=\"btn btn--orange btn--cubic btn--shadow\">検索結果に戻る</a>";
        print "<a href=\"userSearch.php?id=$cid\" class=\"btn btn--orange btn--cubic btn--shadow\">利用者検索に戻る</a>";
        ?>
    </main>
    <footer>


    </footer>
</body>

</html>