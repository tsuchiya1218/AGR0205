<?php

try {
    $dsn = 'sqlsrv:server=10.42.129.3;database=20gr25';
    $user = '20gr25';
    $password = '20gr25';
    //PDOオブジェクトの作成
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "接続エラー！:" . $e->getMessage() . "<br/>";
    exit();
}
