<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/guidance.css">
    <title>利用案内</title>
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

        <h3>利用登録するとき</h3>
        <table border="1">
            <tr>
                <th>メールアドレスが持ち方</th>
                <th>メールアドレスが持ちでない方</th>
            </tr>
            <tr>
                <td>新規登録を行ってください。</td>
                <td>新規依頼書を記入して、司書のところに行ってください！</td>
            </tr>
            </tr>
        </table>
        <h3>借りた本を返すとき</h3>

        <table border="1">
            <tr>

                <th>方法一</th>
               <th>方法二</th>
            </tr>
            <tr>

                <td>期限内で返却ボックスに入れてください。</td>
                <td>司書のところに渡してください。</td>
            </tr>
        </table>
        <br>
        <button onclick="history.back()" type="button"> 戻る </button>
       
          
           
        
    </main>
</body>

</html>