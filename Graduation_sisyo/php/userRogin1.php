<?php
require_once '01.php';

$a_Name = $_GET['a_Name'];
$a_Furigana = $_GET['a_Furigana'];
$a_TelNum = $_GET['a_TelNum'];
$a_Address = $_GET['a_Address'];
$a_AFrigana = $_GET['a_AFrigana'];
$a_ANum = $_GET['a_ANum'];
$a_pass = $_GET['a_pass'];
$a_Mail = $_GET['a_Mail'];

try{
        $sql = "INSERT INTO Actor Values(?,?,?,?,?,?,?,?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($a_Name, $a_Furigana, $a_TelNum,$a_Address,$a_AFrigana,$a_ANum,$a_pass,$a_Mail));
} catch (Exception $e){
    print 'データベースへのアクセスにエラーが発生しました。';
    print $e;
    exit();
}
echo "<script> alert('登録完了しました。');parent.location.href='01.php'; </script>"; 
?>