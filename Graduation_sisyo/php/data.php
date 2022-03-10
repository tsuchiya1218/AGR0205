<?php

try {
    $dsn = 'sqlsrv:server=10.42.129.3;database=20gr25';
    $user = '20gr25';
    $password = '20gr25';
    //PDOオブジェクトの作成
    $dbh = new PDO ( $dsn, $user, $password );
    $dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch ( Exception $e ) {
    print "接続エラー！:".$e->getMessage()."<br/>";
    exit();
    }
    // // require_once 'data.php';
    // $sql = "SELECT * FROM Kind  ";
    // // $stmt = $dbh->prepare($sql);
   
    // // SQLステートメントを実行し、結果を変数に格納
    // $stmt = $dbh->query($sql);
    
    // // foreach文で配列の中身を一行ずつ出力
    // foreach ($stmt as $row) {
    
    // // データベースのフィールド名で出力
    // echo $row['k_Num'].'：'.$row['k_Name'].'人';
    
    // // 改行を入れる
    // echo '<br>';
    
?>
   
