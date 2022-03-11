<?php
session_start();
require_once 'data.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/top.css">
    <title>新宿市立図書館</title>

</head>

<body>
    <main>
        <div class="title">
            <div class="logo_img">
                <a href="index.html"><img src="../img/title_logo.png" alt="" width="281" height="62"></a>
            </div>
            <div class="logo_txt">
                <p>Shinjuku City Library</p>
            </div>
        </div>
    </main>
    <header>
        <br>
        <br>
        <br>

        <h2>個人情報</h2>
        <hr style="margin-top: 0px;">
        <table border="1">
            <caption> 個人詳細情報 </caption>
            <tr>
                <th>ユーザーID：</th>
                <td><?php echo $_SESSION['id']; ?></td>
            </tr>
            <tr>
                <th>名前：</th>
                <td><?php echo $_SESSION['a_Name']; ?></td>
                <td><a href="login_nameChenge.php"> 変更</a></td>
            </tr>
            <tr>
                <th>フリガナ：</th>
                <td><?php echo $_SESSION['a_Furigana']; ?></td>
                <td><a href="login_huriganaChenge.php"> 変更</a></td>
            </tr>

            <tr>
                <th>電話番号：</th>
                <td><?php echo $_SESSION['a_TelNum']; ?></td>
                <td><a href="login_telChenge.php"> 変更</a></td>
            </tr>

            <tr>
                <th>メールアドレス：</th>
                <td><?php echo $_SESSION['a_Mail']; ?></td>
                <td><a href="login_mailChenge.php"> 変更</a></td>
            </tr>
            <tr>
                <th>住所：</th>
                <td><?php echo $_SESSION['a_Address']; ?></td>
                <td><a href="login_addressChenge.php"> 変更</a></td>
            </tr>

        </table>
        <form action="">
            <?php 
                $sql = "SELECT * FROM Lend INNER JOIN DOC on Lend.DOC_Num = DOC.DOC_Num Inner join BookState on
                        DOC.stateNum = BookState.stateNum WHERE a_Num= ? ";
                $stmt = $dbh->prepare($sql);
                $stmt->execute(array($_SESSION['id']));
                $row=$stmt->fetchAll(PDO::FETCH_BOTH);
                //var_dump($row);
                $count=0;
                echo "<table border=\"1\">
                <caption> 貸出履歴 </caption>
                <br>
                <tr>
                    <th>図書名</th>
                    <th>図書番号</th>
                    <th>返却 <br> 貸出日</th>
                    <th>状態</th>
                    <th>投票</th>
                </tr>";
                foreach($row as $r ){
            
        
                echo "<tr>
                    <td>".$r['title']." </td>
                    <td>".$r['DOC_Num']."</td>
                    <td>".$r['lendDate']."<br>".$r['returnDate']."</td>
                    <td>".$r['stateName']."</td>
                    <td>
                    <datalist id=\"list\">
                    <input type=\"text\" name=\"a\" list=\"list\" 
                    placeholder=\"テキスト入力もしくはダブルクリック\" autocomplete=\"off\">";
                    foreach($rows as $rs ){;
                        $sql1 = "SELECT * FROM Tag";
                $stmts = $dbh->prepare($sql1);
                $stmts->execute();
                $rows=$stmts->fetchAll(PDO::FETCH_BOTH);
                
                       echo "<option value=\"".$rs['tagName']."\">";
                }
                       echo  "</datalist>" ;
                        echo "<input type=\"submit\" name=\"\" id=\"\" value=\"投票\">
                    </td>
                </tr>";
                }
                        ?>
            </table>
            <p style="font-size: 0.8em ;color:gray;" >★投票機能は一回限りで、あなたはこの本に対して、ジャンル種類を選択して、投票をいただきたいです。</p>
        </form>
        <button onclick="window.location.href='login_index.html'" type="button"> <span>戻る</span> </button>

    </header>

</body>

</html>