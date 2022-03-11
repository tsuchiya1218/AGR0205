<?php
require_once 'userRegist.php';

$a_Name = $_GET['a_Name'];
$a_Furigana = $_GET['a_Furigana'];
$a_TelNum = $_GET['a_TelNum'];
$a_ANum = $_GET['a_ANum'];
$a_Address = $_GET['a_Address'];
$a_AFrigana = $_GET['a_AFrigana'];

try{
        $sql3 = "INSERT INTO Actor(a_Name, a_Furigana, a_TelNum, a_ANum, a_Address, a_AFrigana, a_pass) 
        Values(?, ?, ?, ?, ?,?, 1)";
    $stmt = $dbh->prepare($sql3);
    $stmt->execute(array($a_Name, $a_Furigana, $a_TelNum, $a_ANum, $a_Address,$a_AFrigana));
} catch (Exception $e){
    print 'データベースへのアクセスにエラーが発生しました。';
    print $e;
    exit();
}
echo "<script> alert('登録完了しました。');parent.location.href='userRegist.php'; </script>"; 
?>