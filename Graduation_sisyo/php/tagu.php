<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/top.css">
    <title>タグ検索</title>

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
                <button onclick="window.location.href='roguin.php'" type="button"> <span>新規登録</span> </button>
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

        <fieldset>
            <legend style="color: navy;">
                <h4 style="font-size: 1.5em;">タグ検索</h4>
            </legend>
            <form action="searchTagu.php" method="GET">
                <span style="font-size: 1.5em;color: navy;"> タグ：</span><input type="text" value="" name="data" style="font-size: 1.5em;">
                <input type="submit" value="検索" style="font-size: 1.5em;">
                <br>
                <br>
            </form>
        </fieldset>

        </form>
        <H1>人気タグ</H1>
        <?php
        //データベース接続
        require_once 'data.php';
        $sql = "SELECT tagName,Tagged.tagID FROM Tag
                INNER JOIN Tagged ON Tag.tagID= Tagged.tagID
        ";
        //SQL文を実行

        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        // 検索結果のデータを一件ずつ取り出す:fetch() 
        $tagname = "";
        $array = array("#5BFF7F", "blue", "teal", "red", "#FF66FF", "lime", "fuchsia", "purple", "olive");

        $result = $stmt->fetchAll(PDO::FETCH_BOTH);
        if (count($result) > 0) {
            foreach ($result as $row) {
                if ($tagname != $row["tagName"]) {
                    $tagname = $row["tagName"];
                    foreach (array_rand($array, 2) as $key) {
                        print "<button onclick=\"window.location.href='search2.php?data=$row[tagID]'\" style=\"background-color: $array[$key];\">$tagname</button>";
                        break;
                    }
                }
            }
        }

        ?>
        </p>
        <br><br><br>
        <button onclick="history.back()" type="button"> 戻る </button>
    </main>
</body>

</html>