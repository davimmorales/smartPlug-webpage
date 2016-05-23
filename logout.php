<?php
session_start();

unset($_SESSION["nome"]);

header("location: account.php");

?>