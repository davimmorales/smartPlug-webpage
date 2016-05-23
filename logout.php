<?php
session_start();

unset($_SESSION["nome"]);
unset($_SESSION["t0"]);
unset($_SESSION["t1"]);
unset($_SESSION["t2"]);

header("location: account.php");

?>
