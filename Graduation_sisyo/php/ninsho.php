<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userRegist.css">
    <title>司書認証画面</title>

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
        <h2>司書認証画面
        </h2>
        <?php
        session_start();
        if (isset($_GET["sisyo"])) {
            $_SESSION["sisyo"] = $_GET["sisyo"];
        }
        if (isset($_GET["tagID"])) {
            $_SESSION["tagID"] = $_GET["tagID"];
        }
        if (isset($_GET["DOC"])) {
            $_SESSION["DOC"] = $_GET["DOC"];
        }
        
        ?>
        <form action="nisho_check.php" method="GET">
            ID：<input type="text" class="input" name="ID" id="userId"><br>
            <a href="index.php" class="btn btn--orange btn--cubic btn--shadow">ホームに戻る</a>
            <input type="submit" class="btn btn--orange btn--cubic btn--shadow" value="認証">
            <!-- <a href="nisho_check.php" class="btn btn--orange btn--cubic btn--shadow">認証</a> -->
        </form>
        <?php
        if (isset($_SESSION["e1"])) {
            echo '<p style="color:red; font-size:12px;">' . $_SESSION["e1"] . '</p>';
            unset($_SESSION["e1"]);
        }
        ?>


        <br>
        <br>
        <br>


    </main>
    <footer>


    </footer>
</body>

</html>