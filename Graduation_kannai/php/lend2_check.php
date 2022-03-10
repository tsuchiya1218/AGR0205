<?php
$array = array();

array_push($array, $_GET["bookId"]);


foreach ($array as $key) {
  $_SESSION["book"][$a] = $key;
  $a=$a+1;
}
header("Location:lend2.php?book=$_SESSION[book]&bookNum=$_SESSION[bookNum]");
?>
<a href="javascript:history.go(-1)">戻る</a>