<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dsearch.css">
    <title>検索画面</title>

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

        <main>
            <h1>本の詳細画面</h1>
            <p>宜しければ貸出手続きボダンを押して、貸出手続きを進んでください！</p>
            <img src="../img/matingu1.jfif" alt="">
            <table border="1">
                <tr>
                    <th>タイトル：</th>
                    <td>おとなが始める初心者ぴあ</td>
                </tr>
                <tr>
                    <th>著者名：</th>
                    <td>山崎</td>
                </tr>
            </table>

            <span id="komento">お勧め</span>
            <p>この本を借りている人達は以下の本にも借りています。
                <br>
            <div class="syasin1">
                <img src="../img/A1QUEG4G-UL.jpg" alt="" width="200px" height="250px">
                <br> <a href="detail.php">服を持たない</a>
            </div>
            <div class="syasin1">
                <img src="../img/d21468-1.jpg" alt="" width="200px" height="250px">
                <br> <a href="detail.php">小説宝石</a>
            </div>
            <div class="syasin1">
                <img src="../img/rankingu1.jpg" alt="" width="200px" height="250px">
                <br> <a href="detail.php">さつきおに</a>
            </div>
            </p>
            <div class="button1">
                <button onclick="window.location.href='index.php'" type="button"> ホームへ </button>
                <button onclick="history.back()" type="button"> 戻る </button>
            </div>

        </main>
</body>

</html>