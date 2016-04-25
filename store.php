<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Bootstrap 101 Template</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!--Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Quicksand:400,300,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two' rel='stylesheet' type='text/css'>

  <!--CSS-->
  <link href="css/comum.css" rel="stylesheet">

</head>
<body>
  <?php  include 'layout/navbar.php'; ?>
  <div class="container">
    <h1>Loja</h1>
    <p>Aqui você adquire os nossos produtos</p>

  </div>

  <div class="container">
    <div class=" row">
      <div class="col-md-6">
        <div class="card">
          <img class="card-img-top" src="/img/baseSuperior.svg" alt="Base de Controle">
          <div class="card-block">
            <h2 class="card-title">Base de Controle</h2>
            <p class="card-text">Uma base para controlar suas tomadas inteligentes.</p>
            <a href="#" class="btn btn-cinza">Comprar</a>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
          <img class="card-img-top" src="/img/tomadaSuperior.svg" alt="Tomas">
          <div class="card-block">
            <h2 class="card-title">Tomas</h2>
            <p class="card-text">A nossa fantaśtica tomada inteligente.</p>
            <a href="#" class="btn btn-cinza">Comprar</a>
          </div>
        </div>
      </div>
    </div>
  </div>




  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
