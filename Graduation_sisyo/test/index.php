<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>新宿市立図書館</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

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
        <!-- タイトル -->
        <ul class="ul1">
            <li class="li"> <a href="index.php" class="a1">ホーム</a> </li>
            <li class="li"> <a href="guidance.php" class="a1">利用案内</a></li>
            <li class="li"> <a href="library_guidance.php" class="a1">図書館案内</a></li>
            <!-- <li class="li"> <a href="childpage.php" class="a1">こどもページ</a></li> -->
            <li class="li"> <a href="call.php" class="a1">呼び出し</a></li>
        </ul>
    </header>

    <main>
        <!-- 写真 -->
        <!-- 950px 250px -->

        <div class="img1">
            <a href="newbook.php"> <img src="../img/本.jpg" name="sushi" alt="" width="950px" height="250px"></a>

        </div>
        <!-- 図書検索 -->
        <div class="TopKensaku">

            <form action="search.php" class="form1" method="GET">
                <span id="kensaku"> 図書検索：</span><input type="text" name="data" width="150px" height="150px" class="kensaku">
                <!-- <input type="hidden" name="witer"value="">
                <input type="hidden" name="publisher"value="">
                <input type="hidden" name="tagName"value="">
                <input type="hidden" name="composer"value="">
                <input type="hidden" name="direct"value=""> -->
                <input type="submit" value="検索" class="button2">
                <input type="button" value="詳細検索" onclick="location.href='dsearch.php'" class="button3">
                <button onclick="window.location.href='lend1.php'" type="button">本を貸出する</button>
                <button onclick="window.location.href='matingu.php'" type="button">マッチング</button>
            </form>

            <div class="div1" id="p1">
                <a href="#" style="color: white;">資料の検索方法についてはこちら</a>
                <button onclick="window.location.href='tagu.php'" type="button"> タグ検索</button>
            </div>
            <div class="rankingu">
                <span id="rankingu1">&nbsp&nbsp&nbsp&nbsp&nbspランキング</span>
                <br>
                <br>
                <?php
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
                    foreach (array_rand($img, 4) as $key) {
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
                <br>

            </div>
        </div>
    </main>
</body>

</html>

<!-- 