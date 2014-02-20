<?php
session_start();

if ($_SESSION["root"]) {
    unset($_SESSION["root"]);
}
header('Location:dashboard.php');
?>
