<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userSearchResult.css">
    <title>予約取り消し完了</title>

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
        $DOC;
        foreach ($result as $r) {
            $DOC=$r['DOC_Num'];
        ?>
        <h2>予約取り消し完了
        </h2>

        
        <p>予約番号:<?php echo $r['r_Num']; }?> の取り消しが完了しました。</p>
        <?php
        $sql1 = "UPDATE DOC SET stateNum=1
        where DOC_Num = :DOC_Num
        ";
        $stmt = $dbh->prepare($sql1);
        $stmt->bindParam(':DOC_Num',$DOC);
        $stmt->execute();
        $sql = "UPDATE Reserve Set \"check\"=2
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