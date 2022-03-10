<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/indexLibrarian.css">
    <title>新宿市立図書館</title>

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

        <?php
        require_once 'data.php';
        session_start();
        $id= $_SESSION["id"] ;
        
        $sql = "SELECT * FROM Librarian";
        $stmt = $dbh->prepare($sql);
        // 削除するレコードのIDが入った変数をexecuteにセットしてSQLを実行
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_BOTH);
        if (count($result) > 0) {
        }

        ?>
        <p>
            司書：
            <a href="" class="">
                <?php
                foreach ($result as $row) {
                    if ($row["l_ID"] == $id) {
                        print "$row[l_Name]";
                    }
                }
                ?>
            </a>
        </p>

    </header>
    <main>

        <?php
        require_once 'data.php';

        // echo $_GET["genreNum"];
        // echo $_GET["kind"];
        // echo $_GET["image"];
        // echo $_GET["title"];
        // echo $_GET["num"];
        // echo $_GET["writer"];
        // echo $_GET["lyric"];
        // echo $_GET["composer"];
        // echo $_GET["songer"];
        // echo $_GET["record"];
        // echo $_GET["direct"];
        // echo $_GET["publisher"];


        //$DOC_Num = $_GET['DOC_Num'];
        $title = $_GET['title'];
        $img = $_GET['img'];
        $witer = $_GET['witer'];
        $ISBN = $_GET['ISBN'];
        $publisher = $_GET['publisher'];
        $direct = $_GET['direct'];
        $composer = $_GET['composer'];
        $lyric = $_GET['lyric'];
        $songer = $_GET['songer'];
        $recordC = $_GET['recordC'];
        $k_Num = $_GET['k_Num'];
        $genreNum = $_GET['genreNum'];
        $stateNum = 1;


        try {
            $sql4 = "INSERT INTO DOC(title, img, witer, ISBN, publisher, direct, composer, lyric, songer, recordC, k_Num, genreNum, stateNum) 
                Values(?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $dbh->prepare($sql4);
            $stmt->execute(array($title, $img, $witer, $ISBN, $publisher, $direct, $composer, $lyric, $songer, $recordC, $k_Num, $genreNum, $stateNum));
        } catch (Exception $e) {
            print 'データベースへのアクセスにエラーが発生しました。';
            print $e;
            exit();
        }
        echo "<script> alert('新しい資料の登録が完了しました。');parent.location.href='bookAdd.php'; </script>";
        ?>
        </p>


        <a href="index.php" class="btn btn--orange btn--cubic btn--shadow">ホームに戻る</a>


    </main>

</body>

</html>











<!-- <img src="../img/a.jpeg" name="sushi">
        <script type="text/javascript">
            img = new Array("../img/b.jpeg","../img/c.jpeg"); //*1
            count = -1; //*2
            imgTimer();
            
            function imgTimer() {
                //画像番号
                count++; //*3
                //画像の枚数確認
                if (count == img.length) count = 0; //*4
                //画像出力
                document.sushi.src = img[count]; //*5
                //次のタイマー呼びだし
                setTimeout("imgTimer()",1000); //*6
            } -->
</script>