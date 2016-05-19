<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Minha Conta</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!--Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Quicksand:400,300,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two' rel='stylesheet' type='text/css'>

  <!--CSS-->
  <link href="css/comum.css" rel="stylesheet">

</head>
<body>
  <?php  include 'layout/navbar.php';
  // if(isset($_POST[nome])){
  //   $_SESSION = $POST[nome];
  //   echo "galeto";
    //Continua pra outros atributos
    include 'login.php';
    $nombre = $_POST['nome'];
    if(!$nombre)
      echo "<h1>Sem nome</h1>";
    else
      echo $nombre."\n";

  ?>
  <div class="container">
    <h1>Minha Conta</h1>
    <p>Aqui você acessa suas opções de conta e gerencia suas tomadas</p>
  </div>
  <?php

  // if(!isset($_SESSION[nome])){
  //   include 'login.php';
  // } else{
  //   echo "<h1>Controle funciona</h1>";
  // }
  ?>






  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
