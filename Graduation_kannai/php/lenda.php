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

        <h4>以下の内容をご確認ください。間違いがなければ確認ボダンを押してください！</h4>


        <?php
        //データベース接続
        require_once 'data.php';

        $userNum = $_GET["userNum"] == null ? null : sprintf("%s", htmlspecialchars(($_GET["userNum"]), ENT_NOQUOTES, 'UTF-8'));

        $sql = "SELECT * FROM Actor 
          where Actor.a_Num = :a_Num
        ";

        //SQL文を実行
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':a_Num', $userNum);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_BOTH);

        ?>
        <table border="1">
            <tr>
                <th>
                    利用者名前：
                </th>
                <td>
                    <?php
                    foreach ($result as $row) {
                        print $row["a_Name"];
                    }


                    ?>
                </td>
            </tr>

            <tr>
                <th>
                    利用者番号：
                </th>
                <td><?php
                    foreach ($result as $row) {
                        print $row["a_Num"];
                    }


                    ?>

                </td>
            </tr>

            <tr>
                <th>
                    借りられる資料の数：
                </th>
                <td>

                    <?php
                    session_start();
                    //データベース接続
                    require_once 'data.php';

                    $userNum = $_GET["userNum"] == null ? null : sprintf("%s", htmlspecialchars(($_GET["userNum"]), ENT_NOQUOTES, 'UTF-8'));
                    $_SESSION["userNum"]= $userNum;
                    $sql = "SELECT * FROM Lend 
                     WHERE Lend.a_Num = :a_Num
                    ";
                    //SQL文を実行
                    $stmt = $dbh->prepare($sql);
                    $stmt->bindParam(':a_Num', $userNum);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_BOTH);
                   
                    print 10 - count($result);
                    ?>
                </td>
            </tr>

        </table>
        <br>
        <a href="lendbook.php?">確認</a>
       
        <a href="javascript:history.go(-1)">戻る</a> 
    </main>

</body>

</html>