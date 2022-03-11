<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userSearchResult.css">
    <title>予約状況詳細</title>

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

        <p>司書：<a href="" class="">黄</a></p>

        <br>
        <hr>

    </header>
    <main>
        <h2>予約状況詳細
        </h2>
        <?php
        
        require_once 'data.php';
        session_start();
        //echo $_SESSION['Book'];
        if(!empty($_SESSION['Book'])){
            $r_Num=$_SESSION['Book'];
        }else{
            $r_Num=$_GET['r_Num'];
        }
        //echo $r_Num;
        $sql = "SELECT * FROM  Reserve
        INNER JOIN Actor ON Actor.a_Num= Reserve.a_Num
        INNER JOIN DOC ON DOC.DOC_Num= Reserve.DOC_Num
        INNER JOIN BookState ON DOC.stateNum = BookState.stateNum
        where Reserve.r_Num = :r_Num AND Reserve.\"check\"!=2
        ";
//SQL文を実行
try {
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':r_Num', $r_Num);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_BOTH);
} catch ( Exception $e ) {
    print "DB接続エラー！:".$e->getMessage()."<br/>";
    exit();
    }
//var_dump($result);

if(empty($result)){
    $_SESSION['e_no']= 1 ;
    //header("Location:reserveManage.php");
}
foreach ($result as $r) {
    
        ?>
        <table border="1" width="830">
            <thead>
                <tr>
                    <th>
                        予約番号
                    </th>
                    <td>
                        <?php echo $r['r_Num']; ?>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        利用者番号
                    </th>
                    <td>
                    <?php echo $r['a_Num']; ?>
                    </td>

                </tr>
                <tr>
                    <th>
                        利用者名
                    </th>
                    <td>
                    <?php echo $r['a_Name']; ?>
                    </td>

                </tr>



                <tr>
                    <th>
                        電話番号
                    </th>
                    <td>
                    <?php echo $r['a_TelNum']; 
                    ?>
                    </td>
                </tr>


            </tbody>
        </table>

        <h3>予約資料</h3>

        <table border="1">

            <tr>
                <td><?php echo "<img src=\"../img/$r[img]\" width=\"250px\" height=\"300px\">"
                ;?>
                </td>
                <th>
                    <?php print "$r[title]"; ?>
                </th>
                <td>
                    <?php print "$r[DOC_Num]";
                    $_SESSION['DOC']=$r['DOC_Num']; ?>
                </td>
                <td>
                <?php
                        switch ("$r[stateNum]") {
                            case 1:
                                $color = "#D2691E";
                                break;
                            case 2:
                                $color = "#7B68EE";
                                break;
                            case 3:
                                $color = "red";
                                break;
                            case 4:
                                $color = "#008000";
                                break;
                            case 5:
                                $color = "#FF0000";
                                break;
                        }
                        print "<button style=\"background-color:$color\">$r[stateName]</button>";
                        ?>
                </td>
            </tr>


        </table>
        <?php
        $_SESSION['Book']=$r['r_Num'];
        if($r['stateNum']!=5){
            
        echo "<a href=\"reserveCancel.php\" class=\"btn btn--orange btn--cubic btn--shadow\">予約をキャンセル</a>
        <a href=\"reserveDetail2.php\" class=\"btn btn--green btn--cubic btn--shadow\">取り置き済みにする</a>";
        }else{
        echo "<a href=\"reserveCancel.php\" class=\"btn btn--orange btn--cubic btn--shadow\">予約をキャンセル</a>
        <a href=\"reserveComplete.php\" class=\"btn btn--green btn--cubic btn--shadow\">受け取り済みにする</a>
        ";}break;}
        ?>
        <br>
        <br>


        <a href="index.php" class="btn btn--orange btn--cubic btn--shadow">ホームに戻る</a>
        <a href="reserveManage.php" class="btn btn--orange btn--cubic btn--shadow">予約管理に戻る</a>

    </main>
    <footer>


    </footer>
</body>

</html>