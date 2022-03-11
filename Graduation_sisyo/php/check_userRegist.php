<?php
session_start();
$id=$_SESSION["id"];
//メールアドレス判定
$a_TelNum = $_GET['a_TelNum'];
if (empty($a_TelNum)) {
    $a_TelNum = "未入力";
} else {
    //    NULLでない場合データベースに登録してあるかを確認
    require_once 'userRegist.php';
    // SQL文を作成
    $sql2 = "SELECT a_TelNum FROM Actor";
    //SQL文を実行 where  a_TelNum= ?  array($a_TelNum)
    $stmt = $dbh->query($sql2);
    $stmt->execute();
    // 検索結果のデータを一件ずつ取り出す:fetch() 
    $result = $stmt->fetchAll(PDO::FETCH_BOTH);
    if (count($result) > 0) {
        foreach ($result as $row) {
            if ($a_TelNum == $row['a_TelNum']) {
                $a_TelNum = "err12";
                $_SESSION["err12"] = "すでに登録してあります。";
                header("Location:userRegist.php?id=$id");
            }
        }
    }
}
//名前判定
$a_Name = $_GET['a_name'];

if (empty($a_Name)) {

    $_SESSION["err1"] = "お名前入力してください！";
    header("Location:userRegist.php?id=$id");
}
//名前ふりかな判定
$a_Furigana = $_GET['a_Furigana'];
if (empty($a_Furigana)) {
    $_SESSION["err2"] = "利用者名カナを入力してください！";
    header("Location:userRegist.php?id=$id");
}
//電話番号判定
$a_TelNum = $_GET['a_TelNum'];
if (empty($a_TelNum)) {
    $_SESSION["err11"] = "電話番号を入力してください！";
    header("Location:userRegist.php?id=$id");
}
//else{
//     print "111112312312312312312311111";
//     if(preg_match( '/^0[0-9]{1,4}-[0-9]{1,4}-[0-9]{3,4}\z/', $a_TelNum )){
//        print "11111111111111111111111111111111";
//     }else{
//         $_SESSION["err10"] = "電話番号が正しくありません。正しい書きかた000-0000-0000";
//         $a_TelNum = "err10";
//         header('Location:userRegist.php');
//     }
// }

// // //住所判定
$a_Address = $_GET['a_Address'];
if (empty($a_Address)) {
    $_SESSION["err3"] = "住所を入力してください！";
    header("Location:userRegist.php?id=$id");
}
//住所ふりかな判定
$a_AFrigana = $_GET['a_AFrigana'];
if (empty($a_AFrigana)) {
    $_SESSION["err4"] = "住所カナを入力してください！";
    header("Location:userRegist.php?id=$id");
}
// // //郵便番号判定
$a_ANum = $_GET['a_ANum'];
if (empty($a_ANum)) {
    $_SESSION["err5"] = "郵便番号を入力してください！";
    header("Location:userRegist.php?id=$id");
}
// // //パスワード判定
// $a_pass = $_GET['a_pass'];
// $a_pass1 = $_GET['a_pass1'];
// if(empty($a_pass)){
//     $_SESSION["err6"] = "パスワード判定を入力してください！";
//     header('Location:userRegist.php');
// }else if(empty($a_pass1)){

//     $_SESSION["err7"] = "パスワード再入力してください！";
//     header('Location:userRegist.php');
// }else if($a_pass != $a_pass1){
//     $_SESSION["err8"] = "再入力が違います！";
//     header('Location:userRegist.php');
// }

//判定が終わって確認画面まで
if (!empty($a_Name) && !empty($a_Furigana) && !empty($a_Address) && !empty($a_AFrigana)  && !empty($a_TelNum) && $a_TelNum != "err10" && !empty($a_ANum)) {
    header("Location:userRegistConfirm.php?a_Name=" . $a_Name . '&a_Furigana=' . $a_Furigana
        . '&a_Address=' . $a_Address . '&a_AFrigana=' . $a_AFrigana . '&a_ANum=' . $a_ANum
        . '&a_TelNum=' . $a_TelNum);
}
