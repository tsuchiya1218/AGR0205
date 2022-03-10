<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userRegist.css">
    <title>資料情報確認</title>
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
        <h2>資料情報確認 </h2>
        <p>以下入力した情報を確認ください。</p>
        <?php

        //ジャンル
        $genreNum = $_SESSION["genreNum"];
        switch ($genreNum) {
            case 0:
        ?>
                <table id="firstBox" border="1" width="830">

                    <tbody>
                        <tr>
                            <th>
                                分類 </span>
                            </th>
                            <td>
                                <?php
                                require_once 'data.php';

                                if (!empty($_GET["k_Num"])) {
                                    echo $k_Num = $_GET["k_Num"];
                                } else {
                                    $k_Num = "";
                                }
                                $sql = "SELECT * FROM  DOC
                                    INNER JOIN Kind ON DOC.k_Num= Kind.k_Num
                                    INNER JOIN BookState ON DOC.stateNum= BookState.stateNum
                                    INNER JOIN Genre ON DOC.genreNum= Genre.genreNum
                                    WHERE Kind.k_Num LIKE ? 
                                    ";
                                //SQL文を実行
                                $stmt = $dbh->prepare($sql);
                                $stmt->execute(array($k_Num));
                                // 検索結果のデータを一件ずつ取り出す:fetch() 
                                $result = $stmt->fetchAll(PDO::FETCH_BOTH);
                                if (count($result) > 0) {
                                    foreach ($result as $row) {
                                        print $row["k_Name"];
                                        break;
                                    }
                                }
                                ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                画像アップロード
                            </th>
                            <td>
                                <?php
                                if (isset($_GET["img"])) {
                                    $img = $_GET["img"];
                                    print "<img src=\"../img/$img\" alt=\"\" height=\"250px\">";
                                } else {
                                    print "入力なし";
                                }

                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                題名 <span style="font-size: 10px; color:red">必須</span>
                            </th>
                            <td>
                                <?php

                                if (!empty($_GET["title"])) {
                                    echo $title = $_GET["title"];
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                ISBNコード
                            </th>
                            <td>
                                <?php
                                if (!empty($_GET["ISBN"])) {
                                    echo $ISBN = $_GET["ISBN"];
                                } else {
                                    $ISBN = "";
                                }
                                ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                著者名
                            </th>
                            <td>
                                <?php
                                if (!empty($_GET["witer"])) {
                                    echo $witer = $_GET["witer"];
                                } else {
                                    $witer = "";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                出版社名
                            </th>
                            <td>
                                <?php
                                if (!empty($_GET["publisher"])) {
                                    echo $publisher = $_GET["publisher"];
                                } else {
                                    $publisher = "";
                                }
                                ?> </td>
                        </tr>
                    </tbody>
                </table>

            <?php
                    echo "<a href=\"bookManageComplete.php?genreNum=$genreNum
                    &k_Num=$k_Num 
                    &img=$img
                    &title=$title 
                    &ISBN=$ISBN 
                    &witer=$witer
                    &publisher=$publisher
                    \"
                    class=\"btn btn--orange btn--cubic btn--shadow\" 
                    >確認</a>";

                break;
            case "1":

            ?>

                <table id="firstBox" border="1" width="830">

                    <tbody>

                        <tr>
                            <th>
                                画像アップロード
                            </th>
                            <td>
                                <?php
                                if (isset($_GET["img"])) {
                                    $img = $_GET["img"];
                                    print "<img src=\"../img/$img\" alt=\"\" height=\"250px\">";
                                } else {
                                    print "入力なし";
                                }

                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                題名 <span style="font-size: 10px; color:red">必須</span>
                            </th>
                            <td>
                                <?php
                                if (!empty($_GET["title"])) {
                                    echo $title = $_GET["title"];
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                作詞者
                            </th>
                            <td>
                                <?php
                                if (!empty($_GET["lyric"])) {
                                    echo $lyric = $_GET["lyric"];
                                } else {
                                    echo $lyric = "";
                                }
                                ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                作曲者
                            </th>
                            <td>
                                <?php
                                if (!empty($_GET["composer"])) {
                                    echo $composer = $_GET["composer"];
                                } else {
                                    echo $composer = "";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                歌手
                            </th>
                            <td>
                                <?php
                                if (!empty($_GET["songer"])) {
                                    echo $songer = $_GET["songer"];
                                } else {
                                    $songer = "";
                                }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <th>
                                レコード会社
                            </th>
                            <td>
                                <?php
                                if (!empty($_GET["recordC"])) {
                                    echo $recordC = $_GET["recordC"];
                                } else {
                                    $recordC = "";
                                }
                                ?> </td>
                        </tr>
                    </tbody>
                </table>
            <?php


                echo "<a href=\"bookManageComplete.php?genreNum=$genreNum
                   &k_Num=22 
                   &img=$img
                   &title=$title 
                   &lyric=$lyric 
                   &composer=$composer
                   &songer=$songer
                   &recordC=$recordC
                   \"
                   class=\"btn btn--orange btn--cubic btn--shadow\" 
                   >確認</a>";
                
                break;
            case "2":

            ?>

                <table id="firstBox" border="1" width="830">

                    <tbody>

                        <tr>
                            <th>
                                画像アップロード
                            </th>
                            <td>
                                <?php
                                if (isset($_GET["img"])) {
                                    $img = $_GET["img"];
                                    print "<img src=\"../img/$img\" alt=\"\" height=\"250px\">";
                                } else {
                                    print "入力なし";
                                }

                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                題名 <span style="font-size: 10px; color:red">必須</span>
                            </th>
                            <td>
                                <?php
                                if (!empty($_GET["title"])) {
                                    echo $title = $_GET["title"];
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                監督
                            </th>
                            <td>
                                <?php
                                if (!empty($_GET["direct"])) {
                                    echo $direct = $_GET["direct"];
                                } else {
                                    $direct =  "";
                                }
                                ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                制作会社
                            </th>
                            <td>
                                <?php
                                if (!empty($_GET["publisher"])) {
                                    echo $publisher = $_GET["publisher"];
                                } else {
                                    $publisher = "";
                                }
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
        <?php

                // echo '<a href="bookManageComplete.php?' . "genreNum" . '=' . $genreNum .
                //     "&k_Num" . '=' . 11 .
                //     "&img" . '=' . $img .
                //     "&title" . '=' . $title .
                //     "&direct" . '=' . $direct .
                //     "&publisher" . '=' . $publisher .
                //     '">確認</a>';


                echo "<a href=\"bookManageComplete.php?genreNum=$genreNum
                   &k_Num=11 
                   &img=$img
                   &title=$title 
                   &direct=$direct 
                   &publisher=$publisher\"
                   class=\"btn btn--orange btn--cubic btn--shadow\" 
                   >確認</a>";
                break;
        }

        //データを遷移する
        print "<a href=\"bookAdd.php\" class='btn btn--orange btn--cubic btn--shadow'>戻る</a>";
        ?>
        <!-- echo '<a href="bookManageComplete.php?' . "genreNum" . '=' . $genreNum .
            "&k_Num" . '=' . $k_Num .
            "&img" . '=' . $img .
            "&title" . '=' . $title .
            "&ISBN" . '=' . $ISBN .
            "&witer" . '=' . $witer .
            "&lyric" . '=' . $lyric .
            "&composer" . '=' . $composer .
            "&songer" . '=' . $songer .
            "&recordC" . '=' . $recordC .
            "&direct" . '=' . $direct .
            "&publisher" . '=' . $pubisher .
            '">確認</a>';

        ?> -->

    </main>
    <footer>