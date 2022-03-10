<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userSearchResult.css">
    <title>予約完了</title>

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
    <?php
    session_start();
        require_once 'data.php';
        $sql = "SELECT * FROM  Reserve
        INNER JOIN Actor ON Actor.a_Num= Reserve.a_Num
        INNER JOIN DOC ON DOC.DOC_Num= Reserve.DOC_Num
        INNER JOIN BookState ON DOC.stateNum = BookState.stateNum
        where Reserve.r_Num = :r_Num
        ";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':r_Num', $_SESSION['Book']);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_BOTH);

        foreach ($result as $r) {
            $DOC=$r['DOC_Num'];
            $userNum=$r['a_Num'];
        ?>
        <h2>受け取り完了
        </h2>

        
        <p>予約番号:<?php echo $r['r_Num']; }?> の受け取りが完了しました。</p>
        <?php
         $stateNum = 3;
         try {
             $sql = "INSERT INTO Lend Values(?,?,?,?,?)";
             $stmt = $dbh->prepare($sql);
             $stmt->execute(array($userNum, date("Y-m-d", strtotime("+14 day")), date("Y-m-d"), $DOC, 0));
     
          
             $sql1 = "UPDATE DOC SET stateNum = :stateNum  WHERE DOC_Num = :DOC_Num";
             $stmt = $dbh->prepare($sql1);
             $stmt->bindParam(':stateNum', $stateNum);
             $stmt->bindParam(':DOC_Num', $DOC);
             $result = $stmt->execute();
     
     
             $sql3 = "SELECT * FROM DOC WHERE DOC_Num like ?";
             $stmt2 = $dbh->prepare($sql3);
     
             $stmt2->bindParam(1, $DOC);
             $result1 =  $stmt2->execute();
             // 検索結果のデータを一件ずつ取り出す:fetch() 
             $result1 = $stmt2->fetchAll(PDO::FETCH_BOTH);
             if (count($result1) > 0) {
     
                 foreach ($result1 as $row) {
                     $sql4 = "UPDATE DOC SET [count] = :num WHERE DOC_Num = :DOC_Num";
                     $stmt1 = $dbh->prepare($sql4);
                     $num = intval($row["count"]);
                     $num = $num + 1;
                     $stmt1->bindParam(':num', $num);
                     $stmt1->bindParam(':DOC_Num', $DOC);
                     $stmt1->execute();
                 }
             }
         } catch (Exception $e) {
             // print 'データベースへのアクセスにエラーが発生しました。';
             print $e;
             exit();
         }
        $sql = "UPDATE Reserve Set [check]=1
        where r_Num = :r_Num";
        $stmts = $dbh->prepare($sql);
        $stmts->bindParam(':r_Num',$_SESSION['Book']);
        $stmts->execute();
        $_SESSION['Book']=null;
        ?>
                    
        <a href="reserveManage.php" class="btn btn--orange btn--cubic btn--shadow">予約管理に戻る</a>
        <a href="index.php" class="btn btn--orange btn--cubic btn--shadow">ホームに戻る</a>
    </main>
    <footer>


    </footer>
</body>

</html>