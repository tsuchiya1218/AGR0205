<!DOCTYPE php>
<php lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/delayList.css">
    <title>未送信リスト</title>

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
        <hr>

    </header>
    <main>
        <h2>未送信リスト</h2>


        <ul class="pagination">
            <li class="prev"><a href="" title="前のページ">前のページ</a></li>
            <li class="this"><a href="" title="1ページ">1</a></li>
            <li><a href="" title="2ページ">2</a></li>
            <li><a href="" title="3ページ">3</a></li>
            <li><a href="" title="4ページ">4</a></li>
            <li><a href="" title="5ページ">5</a></li>
            <li><a href="" title="...">...</a></li>
            <li class="next"><a href="" title="次のページ">次のページ</a></li>
        </ul>

        <!-- <a href="indexLibrarian.php" class="btn btn--orange btn--cubic btn--shadow">一斉送信</a> -->
        
        <a href="delayPrint.php" class="btn btn--orange btn--cubic btn--shadow">印刷</a>

        <!-- <form action="delayPrint.<php></php>" method="get">
        <input type="submit" value="印刷"  class="button2">
        </form> -->

        <table border="1" width="830">
            <tr>
                <th>
                    利用者番号
                </th>
                <th>
                    利用者名
                </th>
                <th>
                    電話番号
                </th>
                <th>
                    遅延状況
                </th>
            </tr>


            <?php

            $sql = "SELECT * FROM  Lend
            INNER JOIN Actor ON Lend.a_Num= Actor.a_Num
            WHERE Lend.returnDate < CAST(GETDATE() AS DATE)
            AND a_Mail is Null
            ";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchAll(PDO::FETCH_BOTH);

            $today = date("Y-m-d");
            $day1 = strtotime($today);

            if (count($records) > 0) {
                $num = 0;

                $firstDate  = new DateTime(date("y-m-d"));

                foreach ($records as $row) {
                    $num = $num + 1;
                    $secondDate = new DateTime("$row[returnDate]");
                    $intvl = $firstDate->diff($secondDate);

                    print "<tr>";
                    print "
                    <td style=\"padding: 20px;\">$row[a_Num]</td>
                    <td style=\"padding: 20px;\">$row[a_Name]</td>
                    <td style=\"padding: 20px;\">$row[a_TelNum]</td>
                    ";

                    echo '<td>';
                    echo $intvl->days . " 日 ";
                    echo '</td>';
                }
                print "</tr>";
            }
            print  "全部で" . $num . "件を表示しました。";

            

            //$bookNum = $_SESSION["bookNum"];
            $_SESSION['num']=$num;
            ?>
        </table>

        <a href="index.<php></php>" class="btn btn--orange btn--cubic btn--shadow">ホームに戻る</a>

    </main>
    <footer>


    </footer>
</body>

</php>