<?php
session_start();
//メールアドレス判定
$a_Mail = $_GET['a_Mail'];
if(empty($a_Mail)){
    $a_Mail = "未入力";
}else {
    //    NULLでない場合データベースに登録してあるかを確認
    require_once '01.php';
    // SQL文を作成
    $sql1 ="SELECT a_Mail FROM Actor";
    //SQL文を実行
    $stmt = $dbh->query($sql1);
    $stmt->execute();
    // 検索結果のデータを一件ずつ取り出す:fetch() 
    $result = $stmt->fetchAll(PDO::FETCH_BOTH);
    if (count($result) > 0) {
        foreach ($result as $row) {
            if($a_Mail == $row['a_Mail']){
                $a_Mail ="err9";
                $_SESSION["err9"] = "すでに登録してあります。";
                header('Location:01.php');
            }
        }
    }
}
//名前判定
$a_Name = $_GET['a_Name'];
if(empty($a_Name)){
    $_SESSION["err1"] = "お名前入力してください！";
    header('Location:01.php');
}
//名前ふりかな判定
$a_Furigana = $_GET['a_Furigana'];
if(empty($a_Furigana)){
    $_SESSION["err2"] = "ふりかなを入力してください！";
    header('Location:01.php');
}
//電話番号判定
$a_TelNum = $_GET['a_TelNum'];
if(empty($a_TelNum)){
    $a_TelNum = "未入力";
}else{
    print "111112312312312312312311111";
    if(preg_match( '/^0[0-9]{1,4}-[0-9]{1,4}-[0-9]{3,4}\z/', $a_TelNum )){
       print "11111111111111111111111111111111";
    }else{
        $_SESSION["err10"] = "電話番号が正しくありません。正しい書きかた000-0000-0000";
        $a_TelNum = "err10";
        header('Location:01.php');
    }
}

//住所判定
$a_Address = $_GET['a_Address'];
if(empty($a_Address)){
    $_SESSION["err3"] = "住所を入力してください。";
    header('Location:01.php');
}
//住所ふりかな判定
$a_AFrigana = $_GET['a_AFrigana'];
if(empty($a_AFrigana)){
    $_SESSION["err4"] = "住所ふりかなを入力してください！";
    header('Location:01.php');
}
//郵便番号判定
$a_ANum = $_GET['a_ANum'];
if(empty($a_ANum)){
    $_SESSION["err5"] = "郵便番号を入力してください！";
    header('Location:01.php');
}
//パスワード判定
$a_pass = $_GET['a_pass'];
$a_pass1 = $_GET['a_pass1'];
if(empty($a_pass)){
    $_SESSION["err6"] = "パスワード判定を入力してください！";
    header('Location:01.php');
}else if(empty($a_pass1)){

    $_SESSION["err7"] = "パスワード再入力してください！";
    header('Location:01.php');
}else if($a_pass != $a_pass1){
    $_SESSION["err8"] = "再入力が違います！";
    header('Location:01.php');
}

// 判定が終わって確認画面まで
if(!empty($a_Name) && !empty($a_Furigana) && !empty($a_Address) && !empty($a_AFrigana) &&  $a_Mail!="err9"  && $a_TelNum != "err10" && !empty($a_ANum) && !empty($a_pass1) && $a_pass == $a_pass1){
    header("Location:userRogin.php?a_Name=" . $a_Name . '&a_Furigana=' . $a_Furigana 
                                        . '&a_Address=' . $a_Address . '&a_AFrigana=' . $a_AFrigana. '&a_ANum=' . $a_ANum
                                        . '&a_pass=' . $a_pass. '&a_pass1=' . $a_pass1
                                        . '&a_TelNum=' . $a_TelNum. '&a_Mail=' . $a_Mail);
                                      
}




