<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bookDetail.css">
    <title>削除確認画面</title>

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
        session_start();
        require_once 'data.php';
        $id = $_SESSION["id"];
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
        <br>
        <hr>



    </header>
    <main>
        <?php
        //データベース接続
        require_once 'data.php';
        ?>
        <h1>削除確認</h1>
        
        <h3>以下の資料を削除してよろしいでしょうか</h1>

        <?php
        $cid = $_GET["DOC_Num"] == null ? null : sprintf("%s", htmlspecialchars(($_GET["DOC_Num"]), ENT_NOQUOTES, 'UTF-8'));
        // SQL文を作成
        $sql = "SELECT * FROM  DOC
                            INNER JOIN Kind ON DOC.k_Num= Kind.k_Num
                            INNER JOIN BookState ON DOC.stateNum= BookState.stateNum
                            INNER JOIN Genre ON DOC.genreNum= Genre.genreNum
                           
                            where DOC.DOC_Num = :DOC_Num
                            ";
        //SQL文を実行
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':DOC_Num', $cid);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_BOTH);
        if (count($result) > 0) {
            foreach ($result as $row) {
                print " <img src=\"../img/$row[img]\" width=\"250px\" height=\"300px\" >";
                break;
            }
        }

        ?>

            <table border="1">
                <tr>
                    <th>図書名：</th>
                    <td><?php
                        foreach ($result as $row) {
                            print " $row[title]";
                            break;
                        }
                        ?></td>
                </tr>
                <tr>
                    <th>著者：</th>
                    <td> <?php
                        foreach ($result as $row) {
                            print " $row[witer]";
                            break;
                        }
                        ?></td>
                </tr>
                <tr>
                    <th>出版社：</th>
                    <td> <?php
                        foreach ($result as $row) {
                            print " $row[publisher]";
                            break;
                        }
                        ?></td>
                </tr>
                <tr>
                    <th>図書番号：</th>
                    <td> <?php
                        foreach ($result as $row) {
                            print " $row[DOC_Num]";
                            break;
                        }
                        ?></td>
                </tr>

                <tr>
                    <th>ISBNコード：</th>
                    <td><?php
                        foreach ($result as $row) {
                            print " $row[ISBN]";
                            break;
                        }
                        ?></td>
                </tr>




            </table>
            <div class="button1">
                <button onclick="window.location.href='bookDel.php'" type="button"> 戻る </button>
            </div>
            <?php

               echo "<a href=\"bookDelComplete.php?DOC=$cid\">削除</a>";
               
          ?>
             
    </main>
</body>

</html>