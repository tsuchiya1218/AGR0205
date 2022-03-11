<?php
session_start();
require_once 'data.php';
$chenge=$_GET['chenge'];
$name=$_GET['name'];
$nameR=$_GET['nameR'];
if($name!=$nameR){    
    $_SESSION['e']=1;
    header('Location:login_nameChenge.php');
}else{
    $sql = "UPDATE Actor SET ? = ? WHERE a_Num = ? ";
                $stmt = $dbh->prepare($sql);
                $stmt->execute(array($chenge,$name,$_SESSION['id']));
                $_SESSION[$chenge]=$name;
                header('Location:login_rireki.php');
}
?>