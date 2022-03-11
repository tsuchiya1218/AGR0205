<?php
session_start();
$sessID = session_id();

try {
    //学籍番号は自分のものに変更すること
    $dsn = 'sqlsrv:server=10.42.129.3;database=20gr25';
    $user = '20gr25';
    $password = '20gr25';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // print"接続成功、おめでとうございます！";
    //print "データベースに接続<br>\n";
} catch (Exception $e) {
    print 'データベースへのアクセスにエラーが発生しました。';
    print $e;
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userRegist.css">
    <title>利用者情報入力</title>

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
        <h2>利用者情報入力
        </h2>
        <form action="check_userRegist.php" method="GET">
            <table border="1">

                <tbody>
                    <tr>
                        <th>
                            メールアドレス
                        </th>
                        <td>
                            <input type="text" id="name" name="a_name" maxlength="30" size="70">

                            <?php
                            if (isset($_SESSION["err1"])) {
                                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err1"] . '</p>';
                                unset($_SESSION["err1"]);
                            }
                            ?>
                        </td>

                    </tr>

                    <tr>
                        <th>
                            パスワード
                        </th>
                        <td>
                            <input type="text" id="name" name="a_name" maxlength="30" size="70">

                            <?php
                            if (isset($_SESSION["err1"])) {
                                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err1"] . '</p>';
                                unset($_SESSION["err1"]);
                            }
                            ?>
                        </td>

                    </tr>

                    <tr>
                        <th>
                            確認パスワード
                        </th>
                        <td>
                            <input type="text" id="name" name="a_name" maxlength="30" size="70">

                            <?php
                            if (isset($_SESSION["err1"])) {
                                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err1"] . '</p>';
                                unset($_SESSION["err1"]);
                            }
                            ?>
                        </td>

                    </tr>

                    <tr>
                        <th>
                            利用者名
                        </th>
                        <td>
                            <input type="text" id="name" name="a_name" maxlength="30" size="70">

                            <?php
                            if (isset($_SESSION["err1"])) {
                                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err1"] . '</p>';
                                unset($_SESSION["err1"]);
                            }
                            ?>
                        </td>

                    </tr>
                    <tr>
                        <th>
                            利用者名カナ
                        </th>
                        <td>
                            <input type="text" id="kanaName" name="a_Furigana" maxlength="30" size="70">
                            <?php
                            if (isset($_SESSION["err2"])) {
                                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err2"] . '</p>';
                                unset($_SESSION["err2"]);
                            }
                            ?>
                        </td>

                    </tr>
                    <tr>
                        <th>
                            電話番号
                        </th>
                        <td>
                            <input type="tel" id="phone" name="a_TelNum">
                            <?php

                            if (isset($_SESSION["err11"])) {
                                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err11"] . '</p>';
                                unset($_SESSION["err11"]);
                            } elseif (isset($_SESSION["err10"])) {
                                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err10"] . '</p>';
                                unset($_SESSION["err10"]);
                            }
                            ?>
                        </td>
                    </tr>



                    <tr>
                        <th>
                            郵便番号
                        </th>
                        <td>
                            <input type="text" name="a_ANum" />
                            <?php
                            if (isset($_SESSION["err5"])) {
                                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err5"] . '</p>';
                                unset($_SESSION["err5"]);
                            }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            住所
                        </th>
                        <td>
                            <input type="text" name="a_Address" />
                            <?php
                            if (isset($_SESSION["err3"])) {
                                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err3"] . '</p>';
                                unset($_SESSION["err3"]);
                            }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            住所カナ
                        </th>
                        <td>
                            <input type="text" name="a_AFrigana" />
                            <?php
                            if (isset($_SESSION["err4"])) {
                                echo '<p style="color:red; font-size:12px;">' . $_SESSION["err4"] . '</p>';
                                unset($_SESSION["err4"]);
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="確認">
        </form>

        <a href="index.php" class="btn btn--orange btn--cubic btn--shadow">ホームに戻る</a>

    </main>
    <footer>


    </footer>
</body>

</html>