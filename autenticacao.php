<?php
session_start();
$_SESSION["nome"] = $_GET['nome'];
$_SESSION["t0"] = true;
$_SESSION["t1"] = true;
$_SESSION["t2"] = false;
header("location: account.php");
?>
