<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="This website was made for the UX Lab Course at UNIFESP">
  <meta name="author" content="Lucas Lellis e Rodrigo Oliveira">
  <title><?php print @$cabecalho_title; ?></title>
  <?php print @$cabecalho_css; ?>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-select.min.css">
  <!-- Optional theme -->
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="css/fileinput.min.css">
  <!-- <link rel="stylesheet" href="css/flatly.css"> -->
  <link rel="stylesheet" href="css/estilos.css">
  <!--[if lt IE 9]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <?php
  include("database.php");
  session_start();
  if (!$conn->connect_error) {
    $sql = "SELECT  COALESCE(SUM(Vagas),0) as SOMA FROM projetos";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      $vagas = $result->fetch_object()->SOMA;
    }
    $conn->close();
  }
  ?>
</head>
<body>
<header class="header">
  <nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
    	<div class="container-fluid">        
    	  <div class="navbar-header">
    	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
    	      <span class="sr-only">Toggle navigation</span>
    	      <span class="icon-bar"></span>
    	      <span class="icon-bar"></span>
    	      <span class="icon-bar"></span>
    	    </button>
    	    <a class="navbar-brand" href="index.php">
    	      Sistema de cadastro de projetos
    	    </a>				
    	  </div>
    	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    	    <ul class="nav navbar-nav navbar-right">
    	      <li><a href="index.php">início</a></li>
    	      <li><a href="pesquisa.php">pesquisas</a></li>
    	      <li>
              <a href="oportunidades.php">
                oportunidades
                <span class="badge"><?=$vagas?></span>
              </a>
            </li>
            <?php 
              if($_SESSION['user'] == ''){
                echo"<li><a href='login.php'>login</a></li>";
              }else{
                echo"<li><a href='painel.php'>painel</a></li>";
                echo"<li><a href='logout.php'>sair</a></li>";
              }
            ?>
    	    </ul>
    	  </div>
    	</div>
    </div>
  </nav>
</header>