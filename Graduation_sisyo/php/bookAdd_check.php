<?php
session_start();

$img = $_GET["example"];
$_SESSION["genreNum"] =$img ;
if ($img == 0) {
    $_SESSION["errb1"] = "1";
    header('Location:bookAdd.php');
} else if ($img == 1) {
    $_SESSION["errb1"] = "2";
    header('Location:bookAdd.php');
} else if ($img == 2) {
    $_SESSION["errb1"] = "3";
    header('Location:bookAdd.php');
}


