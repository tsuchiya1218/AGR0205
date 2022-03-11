<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/lend.css">
    <title>貸出画面</title>

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
        <p>RFIDを読み取ってください！</p>
        <p>もしくは図書番号を入力してください。</p>
        <form action="lend2.php" menthod="get">
            <input type="number" name="bookNum" id="">
            <input type="submit" value="検索">
        </form>
        <a href="javascript:history.go(-1)">戻る</a>
    </main>

</body>

</html>

</script>