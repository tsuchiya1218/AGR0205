<?php
session_start();
require_once 'data.php';
$name=$_GET['name'];
$nameR=$_GET['nameR'];
if($name!=$nameR){    
    $_SESSION['e_h'] = 1;
    header('Location:login_huriganaChenge.php');
}else{
    $sql = "UPDATE Actor SET a_Furigana = ? WHERE a_Num = ? ";
                $stmt = $dbh->prepare($sql);
                $stmt->execute(array($name,$_SESSION['id']));
                $_SESSION['hurigana']=$name;
                header('Location:login_rireki.php');
}
?>