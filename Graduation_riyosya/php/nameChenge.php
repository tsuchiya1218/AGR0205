<?php
session_start();
require_once 'data.php';
$name=$_GET['name'];
$nameR=$_GET['nameR'];
if($name!=$nameR){    
    $_SESSION['e_name']=1;
    header('Location:login_nameChenge.php');
}else{
    $sql = "UPDATE Actor SET a_Name = ? WHERE a_Num = ? ";
                $stmt = $dbh->prepare($sql);
                $stmt->execute(array($name,$_SESSION['id']));
                $_SESSION['name']=$name;
                header('Location:login_rireki.php');
}
?>