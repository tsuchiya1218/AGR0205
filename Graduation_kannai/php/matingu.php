<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/top.css">
    <title>マーチング</title>

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
        <h1>マッチング</h1>
        <p>以下は、マーチングとなっている本です。</p>
        <?php
        //データベース接続
        require_once 'data.php';
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
            foreach (array_rand($img, 8) as $key) {
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
        <button onclick="window.location.href='index.php'" type="button">戻る</button>
        <button onclick="window.location.href='matingu.php'" type="button">更新</button>
    </main>

</body>

</html>