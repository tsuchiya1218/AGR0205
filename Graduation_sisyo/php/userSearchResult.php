<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userSearchResult.css">
    <title>利用者検索結果</title>

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
        <hr>

    </header>
    <main>

        <?php
        //データベース接続
        require_once 'data.php';
        //POSTの値を取り出しサニタイジングをする
        if(isset($_GET["userID"])){

            $cid = sprintf("%s", htmlspecialchars(($_GET["userID"]), ENT_NOQUOTES, 'UTF-8'));
        }else{
            $cid="";
        }
        $_SESSION["userID"] = $cid;
        ?>
        <h2>利用者検索結果</h2>

        <table border="1" width="830">
            <thead>
                <tr>
                    <th>
                        利用者番号
                    </th>
                    <th>
                        利用者名
                    </th>
                    <th>
                        電話番号
                    </th>
                    <th>
                        詳細
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                //  入力なしで全体書類を表示する
                if ($cid == null) {
                    // SQL文を作成
                    $sql = "SELECT * FROM  Actor";
                    //SQL文を実行
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute();
                    //$cont = $stmt->fetch(PDO::FETCH_COLUMN);

                    // 検索結果のデータを一件ずつ取り出す:fetch() 
                    $result = $stmt->fetchAll(PDO::FETCH_BOTH);
                    $sum = 0;
                    if (count($result) > 0) {

                        foreach ($result as $row) {
                            $sum++;
                            print "<tr>";
                            print "
                            <td style=\"padding: 20px;\">$row[a_Num]</td>
                            <td style=\"padding: 20px;\">$row[a_Name]</td>
                            <td style=\"padding: 20px;\">$row[a_TelNum]</td>";
                            print "<td><a href=\"userSearchDetail.php?a_Num=$row[a_Num]\">詳細</a></td>";

                            print "</tr>";
                        }
                    }
                    $pagination = ceil($sum / 20);



                    print "全部で" . $sum . "件を表示しました。";
                } else {
                    $type = $_GET["type"];
                    $userID = $_GET["userID"];
                    //  キーワード検索を表示する
                    //プレースホルダを使ってSQL文を作成
                    $sql = "SELECT * FROM  Actor WHERE $type LIKE ? 
                 ";
                    // SQL文を実行
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute(array('%' . $userID . '%'));

                    // 検索結果のデータを一件ずつ取り出す:fetch() 
                    $result = $stmt->fetchAll(PDO::FETCH_BOTH);
                    if (count($result) > 0) {
                        $sum = 0;
                        foreach ($result as $row) {
                            $sum++;
                            print "<tr>";
                            print "
                            <td style=\"padding: 20px;\">$row[a_Num]</td>
                            <td style=\"padding: 20px;\">$row[a_Name]</td>
                            <td style=\"padding: 20px;\">$row[a_TelNum]</td>";
                            print "<td><a href=\"userSearchDetail.php?a_Num=$row[a_Num]\">詳細</a></td>";
                            print "</tr>";
                        }
                    } else {
                        print "<tr>";
                        print "<td colspan='8' style='text-align:center;'>該当するユーザーは存在しません。</td>";
                        print "</tr>";
                    }
                    print "全部で" . $sum . "件を表示しました。";
                }

                ?>

            </tbody>
        </table>

        <a href="index.php" class="btn btn--orange btn--cubic btn--shadow">ホームに戻る</a>
        <a href="userSearch.php" class="btn btn--orange btn--cubic btn--shadow">戻る</a>

    </main>
    <footer>


    </footer>
</body>

</html>