<?php
session_start();
echo $img = $_GET["example"];
if ($img == 0) {
    $_SESSION["errb1"] = "1";
    header('Location:1.php');
} else if ($img == 1) {
    $_SESSION["errb1"] = "2";
    header('Location:1.php');
} else if ($img == 2) {
    $_SESSION["errb1"] = "3";
    header('Location:1.php');
}
