<?php
session_start();
//資料番号判定
$DOC_Num = $_GET['DOC_Num'];
if (empty($DOC_Num)) {
    $_SESSION["errb1"] = "資料番号を入力してください！";
    header('Location:bookDel.php');
} else {
    //    NULLでない場合データベースに登録してあるかを確認
    require_once 'data.php';
    // SQL文を作成
    $sql3 = "SELECT * FROM DOC where DOC_Num='$DOC_Num'";

    $stmt = $dbh->query($sql3);
    $stmt->execute();
    // 検索結果のデータを一件ずつ取り出す:fetch() 
    $result = $stmt->fetchAll(PDO::FETCH_BOTH);
    if (count($result) == 0) {
        $_SESSION["err12"] = "正しい資料番号を入力してください";
        header('Location:bookDel.php');
    }else{
        header("Location:bookDelConfirm.php? DOC_Num=" . $DOC_Num );
    }
}

