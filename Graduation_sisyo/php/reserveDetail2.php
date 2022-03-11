<?php
session_start();
require_once 'data.php';
$DOC=$_SESSION['DOC'];
echo $_SESSION['DOC'];

$sql1 = "UPDATE DOC SET stateNum=5
        where DOC_Num = :DOC_Num
        ";
        $stmt = $dbh->prepare($sql1);
        $stmt->bindParam(':DOC_Num',$DOC);
        $stmt->execute();
        $sql = "UPDATE Reserve Set \"check\"=1
        where r_Num = :r_Num";
        $stmts = $dbh->prepare($sql);
        $stmts->bindParam(':r_Num',$_SESSION['Book']);
        $stmts->execute();
        var_dump($_SESSION['Book']);
        header("Location:reserveDetail.php");
?>