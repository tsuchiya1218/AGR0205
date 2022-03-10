<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userRegist.css">
    <title>利用者情報確認</title>

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

        <hr>

    </header>
    <main>
        <h2>利用者情報確認
        </h2>

        <table border="1" width="830">

            <tbody>
                <tr>
                    <th>
                        利用者名
                    </th>
                    <td>
                        <?php
                        echo $_GET['a_Name'];
                        ?>
                    </td>

                </tr>

                <tr>
                    <th>
                        利用者名カナ
                    </th>
                    <td>
                        <?php
                        echo $_GET['a_Furigana'];
                        ?>
                    </td>

                </tr>

                <tr>
                    <th>
                        電話番号
                    </th>
                    <td>
                        <?php
                        echo $_GET['a_TelNum'];
                        ?>
                    </td>
                </tr>



                <tr>
                    <th>
                        郵便番号
                    </th>
                    <td>
                        <?php
                        echo $_GET['a_ANum'];
                        ?>
                    </td>
                </tr>

                <tr>
                    <th>
                        住所
                    </th>
                    <td>
                        <?php
                        echo $_GET['a_Address'];
                        ?>
                    </td>
                </tr>

                <tr>
                    <th>
                        住所カナ
                    </th>
                    <td>
                        <?php
                        echo $_GET['a_AFrigana'];
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <a href="userRegist.php" class="btn btn--orange btn--cubic btn--shadow">戻る</a>
        <!-- <a href="userRegistComplete.php" class="btn btn--orange btn--cubic btn--shadow">確定</a> -->
        <?php
        $a_Name = $_GET['a_Name'];
        $a_Furigana = $_GET['a_Furigana'];
        $a_TelNum = $_GET['a_TelNum'];
        $a_Address = $_GET['a_Address'];
        $a_AFrigana = $_GET['a_AFrigana'];
        $a_ANum = $_GET['a_ANum'];
        
        echo '<a href="userRogin2.php?' . "a_Name" . '=' . $a_Name .
            "&a_Furigana" . '=' . $a_Furigana .
            "&a_TelNum" . '=' . $a_TelNum .
            "&a_Address" . '=' . $a_Address .
            "&a_AFrigana" . '=' . $a_AFrigana .
            "&a_ANum" . '=' . $a_ANum .
            '">確定</a>';
        ?>
    
    </main>
    <footer>


    </footer>
</body>

</html>