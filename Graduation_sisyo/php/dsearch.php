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
        <form action="search1.php" method="get">
            <table class="table1" border="1">
                <tr>
                    <th>タイトル：</th>
                    <td><input type="text" name="data"></td>
                </tr>
                <tr>
                    <th>著者名：</th>
                    <td><input type="text" name="witer"></td>
                <tr>
                    <th>出版社：</th>
                    <td><input type="text" name="publisher"></td>

                </tr>
                <tr>
                    <th>キーワード：</th>
                    <td><input type="text" name="tagName"></td>
                </tr>
                <tr>
                    <th>歌手：</th>
                    <td><input type="text" name="composer"></td>
                </tr>
                <tr>
                    <th>監督名：</th>
                    <td><input type="text" name="direct"></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" name="" id="" value="検索"></td>
                </tr>
            </table>


        </form>
        <div style="text-align: right;">
            <button onclick="location.href='index.php'" type="button"> ホームに戻る </button>
        </div>
    </main>
</body>

</html>