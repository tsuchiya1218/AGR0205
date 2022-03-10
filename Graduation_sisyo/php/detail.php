<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dsearch.css">
    <title>貸出</title>

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
        <h1>資料詳細</h1>
        <p>以下より、貸出の本の情報でご確認ください。確認したら貸出確認ボダンを押してください！</p>
        <?php
        //データベース接続
        require_once 'data.php';
        ?>
        <div class="nami">
            <?php
            $cid = $_GET["DOC"] == null ? null : sprintf("%s", htmlspecialchars(($_GET["DOC"]), ENT_NOQUOTES, 'UTF-8'));
            // SQL文を作成
            $sql = "SELECT * FROM  DOC
                            INNER JOIN Kind ON DOC.k_Num= Kind.k_Num
                            INNER JOIN BookState ON DOC.stateNum= BookState.stateNum
                            INNER JOIN Genre ON DOC.genreNum= Genre.genreNum
                            where DOC.DOC_Num = :DOC_Num
                            ";
            //SQL文を実行
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':DOC_Num', $cid);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_BOTH);

            foreach ($result as $row) {
                print "<img src=\"../img/$row[img]\" width=\"250px\" height=\"300px\">";
                break;
            }
            ?>
        </div>
        <div class="nami1">
            <table border="1">
                <tr>
                    <th>図書名：</th>
                    <td>
                        <?php
                        if (strlen($row["title"]) > 27) {
                            $row["title"] = substr($row["title"], 0, 27);
                        }
                        foreach ($result as $row) {
                            print "$row[title]";
                            break;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>図書番号：</th>
                    <td>
                        <?php
                        foreach ($result as $row) {
                            print " $row[DOC_Num]";
                            break;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>ISBN番号：</th>
                    <td>
                        <?php
                        foreach ($result as $row) {
                            print " $row[ISBN]";
                            break;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>貸出状態：</th>
                    <?php
                    foreach ($result as $row) {
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
                        print "<td>";
                        print "<button style=\"background-color:$color\">$row[stateName]</button>";
                        print "</td>";
                        break;
                    }
                    ?>
                </tr>
                <tr>
                    <th>タグ：</th>
                    <td>
                        <?php
                        $sql = "SELECT * FROM  DOC INNER JOIN Tagged ON DOC.DOC_Num= Tagged.DOC_Num
                            INNER JOIN Tag ON Tag.tagID= Tagged.tagID
                            where DOC.DOC_Num = :DOC_Num
                            ";
                        //SQL文を実行
                        $stmt = $dbh->prepare($sql);
                        $stmt->bindParam(':DOC_Num', $cid);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_BOTH);
                        if (count($result) == null) {
                            echo "";
                        } else {
                            $tagn = "";
                            $array = array("#5BFF7F", "blue", "teal", "red", "#FF66FF", "lime", "fuchsia", "purple", "olive");

                            foreach ($result as $row) {
                                foreach (array_rand($array, 2) as $key) {

                                    if ($tagn != "$row[tagName]") {
                                        $tagn = "$row[tagName]";
                                        print "<button style=\"background-color:$array[$key]\">$tagn</button>";
                                    }
                                }
                            }
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <span id="komento">お勧め</span>
        <p>この本を借りている人達は以下の本にもお勧めしていますよ。
            <?php
            $sql = "SELECT * FROM DOC";
            //SQL文を実行
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            // 検索結果のデータを一件ずつ取り出す:fetch() 
            $result = $stmt->fetchAll(PDO::FETCH_BOTH);
            $img = array();
            $title = array();

            //img名を配列に入れる
            if (count($result) > 0) {
                foreach ($result as $row) {
                    array_push($img, "$row[img]");
                    array_push($title, "$row[title]");
                }
            }
            //配列に入れたデータをランダムに出力
            if (count($img) > 0) {
                foreach (array_rand($img, 3) as $key) {
                    foreach ($result as $row) {
                        if ($img[$key] == "$row[img]") {
                            if (strlen($row["title"]) > 27) {
                                $row["title"] = substr($row["title"], 0, 27);
                            }
                            print
                                "<div class=\"syasin1\">
                                    <img src=\"../img/$row[img]\" width=\"200px\" height=\"250px\">
                                    <br> <a href=detail.php?DOC=$row[DOC_Num]>$row[title]</a>
                                </div>";
                            break;
                        }
                    }
                }
            }
            ?>
        </p>
        <div class="button1">
            <!-- <button onclick="window.location.href='addlend.php'" type="button"> 確認 </button> -->
            <button onclick="window.location.href='#'" style="background-color:white;"> </button>
            <button onclick="history.back()" type="button"> 戻る </button>
            <button onclick="window.location.href='index.php'"> ホームへ </button>
        </div>
    </main>
</body>

</html>