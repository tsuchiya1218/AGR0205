<?php
session_start();
$mail=$_POST["user"];
$pass=$_POST["pass"];
//echo "*".$mail."*";
//echo $pass;
require_once 'data.php';
$sql = "SELECT * FROM Actor WHERE a_Mail=?";
$stmt = $dbh->prepare($sql);
//$stmt ->bindValue(':mail',$user);
$stmt->execute(array($mail));
$row=$stmt->fetchAll(PDO::FETCH_BOTH);
//var_dump($row);
$count=0;
foreach($row as $r ){
    $count++;
    if ($pass==$r['a_pass']) {
        //DBのユーザー情報をセッションに保存
        $_SESSION['a_Num'] = $r['a_Num'];
        $_SESSION['a_Name'] = $r['a_Name'];
        $_SESSION['a_TelNum']=$r['a_TelNum'];
        $_SESSION['a_Mail']=$r['a_Mail'];
        $_SESSION['a_Furigana']=$r['a_Furigana'];
        $_SESSION['a_Address']=$r['a_Address'];

        $msg = 'ログインしました。';
        header('Location:login_index.php');
    } else {
        //$msg = 'メールアドレスもしくはパスワードが間違っています。';
        echo 'メールアドレスもしくはパスワードが間違っています。';
        header('Location:index_login.php');
    }
}
if($count==0){
    header('Location:index_login.php');

}
?>