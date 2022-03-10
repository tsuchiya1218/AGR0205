<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/lend.css">
    <title>貸出画面</title>

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
        <br>
        <hr>
    </header>
    <main>
    </main>
    <?php
    //データベース接続
    require_once 'data.php';
    //貸出情報をとる
    session_start();
    $userNum = $_SESSION["userNum"];
    $bookNum = $_SESSION["bookNum"];
    $stateNum = 3;
    try {
        $sql = "INSERT INTO Lend Values(?,?,?,?,?)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array($userNum, date("Y-m-d", strtotime("+14 day")), date("Y-m-d"), $bookNum, 0));

     
        $sql1 = "UPDATE DOC SET stateNum = :stateNum  WHERE DOC_Num = :DOC_Num";
        $stmt = $dbh->prepare($sql1);
        $stmt->bindParam(':stateNum', $stateNum);
        $stmt->bindParam(':DOC_Num', $bookNum);
        $result = $stmt->execute();


        $sql3 = "SELECT * FROM DOC WHERE DOC_Num like ?";
        $stmt2 = $dbh->prepare($sql3);

        $stmt2->bindParam(1, $bookNum);
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
                $stmt1->bindParam(':DOC_Num', $bookNum);
                $stmt1->execute();
            }
        }
    } catch (Exception $e) {
        // print 'データベースへのアクセスにエラーが発生しました。';
        print $e;
        exit();
    }
    echo "<h3>貸出手続きが完了しました！</h3>";
    echo "返却日は" . date("Y-m-d", strtotime("+14 day")) . "です。";
    echo "<br>返却日に過ぎないようにお願いします。";
    ?>
    <br>
    <br>
    <button onclick="window.location.href='index.php'" type="button"> ホームへ </button>
</body>

</html>
</script>