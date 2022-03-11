<!DOCTYPE html>
<html lang="ja">

<?php
//データベース接続
require_once 'data.php';

$cid = $_GET["bookId"] == null ? null : sprintf("%s", htmlspecialchars(($_GET["bookId"]), ENT_NOQUOTES, 'UTF-8'));

?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/indexLibrarian.css">
    <title>返却詳細画面</title>

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
        <p>以下の情報で間違いありませんか</p>
        <table border="1">
            <tr>
                <td style="padding: 20px;">写真</td>
                <td style="padding: 20px;">図書名</td>
                <td style="padding: 20px;">著作家</td>
                <td style="padding: 20px;">ジャンル</td>
                <td style="padding: 20px;">状態</td>
                <td style="padding: 20px;">種別</td>
            </tr>
            <?php
            //  入力なしで全体書類を表示する
            if ($cid == null) {
                // SQL文を作成
                $sql = "SELECT * FROM  DOC
                        INNER JOIN Kind ON DOC.k_Num= Kind.k_Num
                        INNER JOIN BookState ON DOC.stateNum= BookState.stateNum
                        INNER JOIN Genre ON DOC.genreNum= Genre.genreNum
                        ";
                //SQL文を実行
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $color;

                // 検索結果のデータを一件ずつ取り出す:fetch() 
                $result = $stmt->fetchAll(PDO::FETCH_BOTH);
                if (count($result) > 0) {
                    $sum = 0;
                    foreach ($result as $row) {
                        $sum++;
                        switch ("$row[stateNum]") {
                            case 1:
                                $color = "#D2691E";
                                break;
                            case 2:
                                $color = "#7B68EE";
                                break;
                            case 3:
                                $color = "red";
                                break;
                            case 4:
                                $color = "#008000";
                                break;
                            case 5:
                                $color = "#FF0000";
                                break;
                        }
                        if (strlen($row["title"]) > 27) {
                            $row["title"] = substr($row["title"], 0, 27);
                        }
                        print "<tr>";
                        print "
                            <td style=\"padding: 20px;\"> <img src=\"../img/$row[img]\" alt=\"\ width=\"50px\" height=\"100px\"></td>
                            <td style=\"padding: 20px;\"><a href=detail.php?DOC=$row[DOC_Num]>$row[title]</a></td>
                            <td style=\"padding: 20px;\">$row[witer]</td>
                            <td style=\"padding: 20px;\">$row[k_Name]</td>
                            <td style=\"padding: 20px;\">  <button style=\"background-color:$color\">$row[stateName]</button></td>
                            <td style=\"padding: 20px;\"><span style=\"font-size:30px\">$row[genreName]</td> ";
                        print "</tr>";
                    }
                    // print "全部で" . $sum . "件を表示しました。";
                }
            } else {
                //  キーワード検索を表示する
                //プレースホルダを使ってSQL文を作成

                //$bookNum = $_SESSION["bookNum"];
                $bookId = $_GET["bookId"];
                $_SESSION['bookNum']=$bookId;
                $sql = "SELECT * FROM  DOC
                 INNER JOIN Kind ON DOC.k_Num= Kind.k_Num
                 INNER JOIN BookState ON DOC.stateNum= BookState.stateNum
                 INNER JOIN Genre ON DOC.genreNum= Genre.genreNum
                 WHERE DOC_Num LIKE ? 
                 ";
                // SQL文を実行
                $stmt = $dbh->prepare($sql);
                $stmt->execute(array($bookId));
                // $stmt->execute(array("'%' . $cid . '%'","'%' . $cid . '%'"));

                // 検索結果のデータを一件ずつ取り出す:fetch() 
                $records = $stmt->fetchAll(PDO::FETCH_BOTH);
                if (count($records) > 0) {
                    $num = 0;
                    foreach ($records as $row) {
                        $num = $num + 1;
                        switch ("$row[stateNum]") {
                            case 1:
                                $color = "#D2691E";
                                break;
                            case 2:
                                $color = "#7B68EE";
                                break;
                            case 3:
                                $color = "red";
                                break;
                            case 4:
                                $color = "#008000";
                                break;
                            case 5:
                                $color = "#FF0000";
                                break;
                        }
                        if (strlen($row["title"]) > 27) {
                            $row["title"] = substr($row["title"], 0, 27);
                        }
                        print "<tr>";
                        print "<td style=\"padding: 20px;\"> <img src=\"../img/$row[img]\" alt=\"\ width=\"50px\" height=\"100px\"></td>
                        <td style=\"padding: 20px;\"><a href=detail.php?DOC=$row[DOC_Num]>$row[title]</a></td>
                        <td style=\"padding: 20px;\">$row[witer]</td>
                         <td style=\"padding: 20px;\">$row[k_Name]</td>
                         <td style=\"padding: 20px;\">  <button style=\"background-color:$color\">$row[stateName]</button></td>
                         <td style=\"padding: 20px;\"><span style=\"font-size:30px\">$row[genreName]</td> ";
                        print "</tr>";
                    }
                    
                } else {
                    print "<tr>";
                    print "<td colspan='8' style='text-align:center;'>該当する書類はありません。</td>";
                    print "</tr>";
                }
            }

            //データベー切断
            $dbh = null;
            ?>
        </table>


        <input type="button" value="再読み込み" onclick="location.href='return2.php'" class="button3"><br>
        <br>
        <p>読み取りがうまくいかなかった場合はこちらで資料番号を入力してください</p>
        <p>
            <input type="text"  name="bookId" required>

            <input type="button" value="追加" onclick="location.href='return2.php'" class="button2"><br>
        </p>
        <input type="button" value="戻る" onclick="location.href='return.php'" class="button3">
        
        <!-- <form action="returnComplete.php"  method="get">
        <input type="submit" value="確認" class="button2">
    
        </form> -->

        <button onclick="window.location.href='returnComplete.php'" type="button">確認</button>
    </main>

</body>

</html>