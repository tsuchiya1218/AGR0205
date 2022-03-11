<?php
session_start();

// $_SESSION["sisyo"] ;

if (isset($_GET["ID"])) {
    $id = $_GET["ID"];
} else {
    $id = "";
}
//データベース接続
require_once 'data.php';

$sql = "select l_ID from Librarian";
$stmt = $dbh->prepare($sql);

$stmt->execute($params);
// 検索結果のデータを一件ずつ取り出す:fetch() 
$result = $stmt->fetchAll(PDO::FETCH_BOTH);
foreach ($result as $row) {
    if ($row["l_ID"] == $id) {
        $sisyo = $_SESSION["sisyo"];
        if ($sisyo == 1) {
            header("Location:bookManage.php?id=$id" );
        } else if ($sisyo == 2) {
            header("Location:userSearch.php?id=$id");
        } else if ($sisyo == 3) {
            header("Location:userRegist.php?id=$id");
        } else if ($sisyo == 4) {
            header("Location:return.php?id=$id");
        } else if ($sisyo == 5) {
            header("Location:delayList.php?id=$id");
        } else if ($sisyo == 6) {
            header("Location:tagDel.php?id=$id");
        } else if ($sisyo == 7) {
            header("Location:reserveManage.php?id=$id");
        } else if ($sisyo == 8) {
            header("Location:tagDel2.php?id=$id");
        }
        break;
    } else {
        $_SESSION["e1"] = "入力したIDが間違っています。";
        header("Location:ninsho.php");
    }
}
