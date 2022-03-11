<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dsearch.css">
    <link rel="stylesheet" href="../css/search.css">
    <title>詳細検索</title>
    <style>

    </style>
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

        <div class="button1">
            <!-- <div class="button">
                <button onclick="window.location.href='login.php'" type="button"> <span >ログイン</span> </button>
            </div> -->
            <div class="button">
                <button onclick="window.location.href='register.php'" type="button"> <span>新規登録</span> </button>
            </div>
        </div>
        <br>
        <hr>
        <ul class="mytest">
            <li class="li"> <a href="index.php" class="a1">ホーム</a> </li>
            <li class="li"> <a href="guidance.php" class="a1">利用案内</a></li>
            <li class="li"> <a href="library_guidance.php" class="a1">図書館案内</a></li>
            <!-- <li class="li"> <a href="childpage.php" class="a1">こどもページ</a></li> -->
            <li class="li"> <a href="call.php" class="a1">呼び出し</a></li>
        </ul>
    </header>
    <main>
        <?php
        //データベース接続
        require_once 'data.php';
        if (isset($_GET["data"])) {

            $cid = $_GET["data"] == null ? null : sprintf("%s", htmlspecialchars(($_GET["data"]), ENT_NOQUOTES, 'UTF-8'));
        } else {
            $cid = null;
        }

        ?>

        <h2>検索結果一覧</h2>
        <table border="1">
            <tr>
                <td style="padding: 20px;">写真</td>
                <td style="padding: 20px;">図書名</td>
                <td style="padding: 20px;">著作家</td>
                <td style="padding: 20px;">ジャンル</td>
                <td style="padding: 20px;">状態</td>
            </tr>
            <?php
            //  入力なしで全体書類を表示する
            if ($cid == null) {
                $sum = 0;
                // GETで現在のページ数を取得する（未入力の場合は1を挿入）
                if (isset($_GET['page'])) {
                    $page = (int)$_GET['page'];
                } else {
                    $page = 1;
                }
                // スタートのポジションを計算する
                if ($page > 1) {
                    // 例：２ページ目の場合は、『(2 × 10) - 10 = 10』
                    $start = ($page * 10) - 10;
                } else {
                    $start = 0;
                }

                $sql = "SELECT 
                                Main.* 
                            FROM (
                                SELECT 
                                    ROW_NUMBER() OVER (ORDER BY [DOC_Num]) AS recordnum 
                                    , * 
                                FROM [DOC]
                                ) AS Main 
                                WHERE Main.recordnum BETWEEN $start AND $start+10
                                ORDER BY Main.recordnum;";

                // 検索結果のデータを一件ずつ取り出す:fetch() 
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $color;
                // 検索結果のデータを一件ずつ取り出す:fetch() 
                $result = $stmt->fetchAll(PDO::FETCH_BOTH);
                if (count($result) > 0) {
                    $sum = 0;
                    foreach ($result as $row) {
                        $sql = "SELECT * FROM  DOC
                        INNER JOIN Kind ON DOC.k_Num= Kind.k_Num
                        INNER JOIN BookState ON DOC.stateNum= BookState.stateNum
                        INNER JOIN Genre ON DOC.genreNum= Genre.genreNum
                        ";
                        //SQL文を実行
                        $stmt = $dbh->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_BOTH);
                        foreach ($result as $row1) {
                            if ($row1["DOC_Num"] == $row["DOC_Num"]) {
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
                                    <td style=\"padding: 20px;\"> <img src=\"../img/$row[img]\" width=\"50px\" height=\"100px\"></td>
                                    <td style=\"padding: 20px;\"><a href=detail.php?DOC=$row[DOC_Num]>$row[title]</a></td>
                                    <td style=\"padding: 20px;\">$row1[witer]</td>
                                    <td style=\"padding: 20px;\">$row1[k_Name]</td>
                                    <td style=\"padding: 20px;\">  <button style=\"background-color:$color\">$row1[stateName]</button></td>
                                    <td style=\"padding: 20px;\"><span style=\"font-size:30px\">$row1[genreName]</td> ";
                                print "</tr>";
                            }
                        }
                    }
                    print "全部で" . count($result) . "件を表示しました。<br>";
                }
                $sql = "SELECT COUNT(*) DOC_Num FROM DOC";
                // postsテーブルのデータ件数を取得する
                $page_num = $dbh->prepare($sql);
                $page_num->execute();
                $page_num = $page_num->fetchColumn();

                // ページネーションの数を取得する
                $pagination = ceil($page_num / 10);

            ?>


                <?php
                for ($x = 1; $x <= $pagination; $x++) { ?>
                    <a style="color: white; width:20;background-color:olive; margin-left:5px;text-decoration: none;" href="search.php?page=<?php echo $x ?>">
                        <?php
                        echo $x."ページ目";
                        ?>
                    </a>
                    
                    <?php }
            } else {
                //  キーワード検索を表示する
                //プレースホルダを使ってSQL文を作成
                $sql = "SELECT * FROM  DOC
                 INNER JOIN Kind ON DOC.k_Num= Kind.k_Num
                 INNER JOIN BookState ON DOC.stateNum= BookState.stateNum
                 INNER JOIN Genre ON DOC.genreNum= Genre.genreNum
               
                WHERE title LIKE ? 
                OR witer LIKE ? 
                OR Kind.k_Name LIKE ? 
                OR publisher LIKE ?
                OR direct LIKE ?
                OR composer LIKE ?
                OR lyric LIKE ?
                OR songer LIKE ?
                OR recordC LIKE ?

                 ";
                // SQL文を実行
                $stmt = $dbh->prepare($sql);
                $stmt->execute(array(('%' . $cid . '%'), ('%' . $cid . '%'), ('%' . $cid . '%'), ('%' . $cid . '%'),
                    ('%' . $cid . '%'), ('%' . $cid . '%'), ('%' . $cid . '%'), ('%' . $cid . '%'), ('%' . $cid . '%')
                ));
                // $stmt->execute(array("'%' . $cid . '%'","'%' . $cid . '%'"));

                // 検索結果のデータを一件ずつ取り出す:fetch() 
                $records = $stmt->fetchAll(PDO::FETCH_BOTH);
                if (count($records)) {
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
                         <td style=\"padding: 20px;\">  <button style=\"background-color:$color\">$row1[stateName]</button></td>
                         <td style=\"padding: 20px;\"><span style=\"font-size:30px\">$row[genreName]</td> ";
                        print "</tr>";
                    }
                    print "全部で" . $num . "件を表示しました。";
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
        <div style="text-align: right;">
            <button onclick="history.back()" type="button"> 戻る </button>
        </div>
    </main>
</body>
<a href="" "></a>
</html>