<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dsearch.css">
    <title>詳細検索</title>

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
        <?php
        //データベース接続
        require_once 'data.php';
        session_start();
        if (!empty($_SESSION['tagID'])) {
            $cid = $_SESSION['tagID'] == null ? null : sprintf("%s", htmlspecialchars(($_GET["tagID"]), ENT_NOQUOTES, 'UTF-8'));
            $_SESSION['tagID'] = null;
        }
        if (isset($_GET["tagID"])) {
            $cid = $_GET["tagID"] == null ? null : sprintf("%s", htmlspecialchars(($_GET["tagID"]), ENT_NOQUOTES, 'UTF-8'));
            $_SESSION["tagID"] = $cid;
        } else {

            $cid = "";
        }
        ?>

        <h2>検索結果一覧</h2>
        <?php
        //  入力なしで全体書類を表示する

        //  キーワード検索を表示する
        //プレースホルダを使ってSQL文を作成
        $sql = "SELECT * FROM  DOC
                 INNER JOIN Kind ON DOC.k_Num= Kind.k_Num
                 INNER JOIN BookState ON DOC.stateNum= BookState.stateNum
                 INNER JOIN Genre ON DOC.genreNum= Genre.genreNum
                INNER JOIN Tagged on DOC.DOC_Num = Tagged.DOC_Num
                WHERE Tagged.tagID LIKE ? 
                 ";
        // SQL文を実行
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array($cid));


        // 検索結果のデータを一件ずつ取り出す:fetch() 
        $records = $stmt->fetchAll(PDO::FETCH_BOTH);

        //print" <button onclick=\"window.location.href='ninsho6.php?data=$cid'\">タグを削除</button>";
        print " <button onclick=\"window.location.href='ninsho.php?sisyo=6'\">タグを削除</button>";


        ?>
        <br>
        <table border="1">
            <tr>
                <td style="padding: 20px;">写真</td>
                <td style="padding: 20px;">図書名</td>
                <td style="padding: 20px;">著作家</td>
                <td style="padding: 20px;">ジャンル</td>
                <td style="padding: 20px;">状態</td>
            </tr>
            <?php
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
                print "<td style=\"padding: 20px;\"> <img src=\"../img/$row[img]\" width=\"50px\" height=\"100px\"></td>
                        <td style=\"padding: 20px;\"><a href=detail.php?DOC=$row[DOC_Num]>$row[title]</a></td>
                        <td style=\"padding: 20px;\">$row[witer]</td>
                         <td style=\"padding: 20px;\">$row[k_Name]</td>
                         <td style=\"padding: 20px;\">  <button style=\"background-color:$color\">$row[stateName]</button></td>
                         <td style=\"padding: 20px;\"><span style=\"font-size:30px\">$row[genreName]</td>
                         <td style=\"padding: 20px;\"><a href=\"ninsho.php?sisyo=8&DOC=$row[DOC_Num]\">削除</a></td>
                         ";
                
            ?>
               
                    
                </td>
                </tr>

            <?php }
            print "全部で" . $num . "件を表示しました。";


            //データベー切断
            $dbh = null;
            ?>
        </table>
        <div style="text-align: right;">
            <button onclick="history.back()" type="button"> 戻る </button>
        </div>
    </main>
</body>

</html>