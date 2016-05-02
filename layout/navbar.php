<?php
function echoActiveIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo "active";
}
?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="nav_logo navbar-brand" href="index.php"><p>Tomas </p></a>
    </div>


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class = "nav_item <?php echoActiveIfRequestMatches("index")?>"><a href="index.php">Home</a></li>
        <li class = "nav_item <?php echoActiveIfRequestMatches("store")?>"><a href="store.php">Loja</a></li>
        <li class = "nav_item <?php echoActiveIfRequestMatches("account")?>"><a href="account.php"> Minha Conta</a ></li>
        <li class = "nav_item <?php echoActiveIfRequestMatches("support")?>"><a href="support.php">Suporte</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
