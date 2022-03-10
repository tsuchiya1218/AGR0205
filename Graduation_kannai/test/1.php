<?php


require_once 'data.php';

$sql = "select * from DOC order by count DESC";

$stmt = $dbh->prepare($sql);
$stmt->execute();


// 検索結果のデータを一件ずつ取り出す:fetch() 
$records = $stmt->fetchAll(PDO::FETCH_BOTH);

$num = 0;
foreach ($records as $row) {
    if ($num < 3) {
        echo $row["DOC_Num"] . "<br>";
        $num = $num + 1;
    }
}
