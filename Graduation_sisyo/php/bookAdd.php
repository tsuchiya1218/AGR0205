<?php
require_once 'data.php';
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userRegist.css">

    <title>資料情報入力</title>

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
        <h2>資料情報入力
        </h2>
        <h3>資料種類</h3>
        <p>資料種類を選択してください</p>
        <form action="bookAdd_check.php" method="get">
            <select name="example" style="font-size: 30px;">
                <option value="0" name="book">書籍</option>
                <option value="1" name="music">音楽</option>
                <option value="2" name="movie">映像</option>
            </select>
            <input type="submit" name="img" value="登録">
        </form>


        <?php
        //データベース接続


        if (isset($_SESSION["errb1"]) and $_SESSION["errb1"] ==  "1") {
        ?>
            <form action="bookManageConfirm.php" method="get">
                <table id="firstBox" border="1" width="830">

                    <tbody>
                        <tr>
                            <th>
                                分類 <span style="font-size: 10px; color:red">必須</span>
                            </th>
                            <td>
                                <select name="k_Num">
                                    <option value="00">総記</option>
                                    <option value="10">哲学</option>
                                    <option value="20">歴史</option>
                                    <option value="30">社会科学</option>
                                    <option value="40">自然科学</option>
                                    <option value="50">技術・工学</option>
                                    <option value="60">産業</option>
                                    <option value="70">芸術・美術</option>
                                    <option value="80">言語</option>
                                    <option value="90">文学</option>
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                画像アップロード
                            </th>
                            <td>
                                <input type="file" name="img" accept="image/jpeg">
                            </td>
                        </tr>

                        <tr>

                            <th>
                                題名 <span style="font-size: 10px; color:red">必須</span>
                            </th>
                            <td>
                                <input type="text" name="title" required>

                            </td>

                        </tr>

                        <tr>
                            <th>
                                ISBNコード
                            </th>
                            <td>
                                <label><input type="radio" name="isbn" value="isbn" onclick="radioSwitch()" checked>ISBNあり</label>
                                <span id="s1"><input type="number" name="ISBN" id="rege" required></span>
                                <label><input type="radio" name="isbn" value="noisbn" onclick="radioSwitch()">ISBNなし</label>

                            </td>



                        </tr>

                        <tr>
                            <th>
                                著者名
                            </th>
                            <td>
                                <input type="text" name="witer">
                            </td>
                        </tr>

                        <tr>
                            <th>
                                出版社名
                            </th>
                            <td>
                                <input type="text" name="publisher">
                            </td>
                        </tr>



                    </tbody>
                </table>
                <input type="submit" value="送信">
            </form>
        <?php

            unset($_SESSION["errb1"]);
        } else if (isset($_SESSION["errb1"]) and $_SESSION["errb1"] == "2") {
        ?>
            <form action="bookManageConfirm.php" method="get">
                <table id="secondBox" border="1" width="830">

                    <tbody>
                        <tr>
                            <th>
                                画像アップロード
                            </th>
                            <td>
                                <input type="file" name="img" accept="image/jpeg">
                            </td>
                        </tr>

                        <tr>

                            <th>
                                題名 <span style="font-size: 10px; color:red">必須</span>
                            </th>
                            <td>
                                <input type="text" name="title" required>
                            </td>

                        </tr>



                        <tr>
                            <th>
                                作詞者
                            </th>
                            <td>
                                <input type="text" name="lyric">
                            </td>
                        </tr>

                        <tr>
                            <th>
                                作曲者
                            </th>
                            <td>
                                <input type="text" name="composer">
                            </td>
                        </tr>



                        <tr>
                            <th>
                                歌手
                            </th>
                            <td>
                                <input type="text" name="songer">
                            </td>
                        </tr>

                        <tr>
                            <th>
                                レコード会社
                            </th>
                            <td>
                                <input type="text" name="recordC">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" value="送信">
            </form>

        <?php

            unset($_SESSION["errb1"]);
        } else if (isset($_SESSION["errb1"])  and $_SESSION["errb1"] == "3") {
        ?>
            <form action="bookManageConfirm.php" method="get">
                <table id="secondBox" border="1" width="830">

                    <tbody>
                        <tr>
                            <th>
                                画像アップロード
                            </th>
                            <td>
                                <input type="file" name="img" accept="image/jpeg">
                            </td>
                        </tr>

                        <tr>

                            <th>
                                題名 <span style="font-size: 10px; color:red">必須</span>
                            </th>
                            <td>
                                <input type="text" name="title" required>
                            </td>

                        </tr>

                        <tr>
                            <th>
                                監督
                            </th>
                            <td>
                                <input type="text" name="direct">
                            </td>
                        </tr>

                        <tr>
                            <th>
                                制作会社
                            </th>
                            <td>
                                <input type="text" name="publisher">
                            </td>
                        </tr>
                    </tbody>
                </table>

                <input type="submit" value="送信">
            </form>
        <?php
            unset($_SESSION["errb1"]);
        }
        ?>
        <br>

        <!-- <a href="bookManage.php" class="btn btn--orange btn--cubic btn--shadow">戻る</a>
            <a href="bookManageConfirm.php" class="btn btn--orange btn--cubic btn--shadow">決定</a> -->

            <a href="index.php" class="btn btn--orange btn--cubic btn--shadow">ホームに戻る</a>
    </main>
    <footer>


    </footer>
    <script type="text/javascript" src="../js/bookAdd.js"></script>
</body>

</html>