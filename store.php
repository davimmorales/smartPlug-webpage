<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>Tomas Store</title>


  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">


  <!--Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Quicksand:400,300,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two' rel='stylesheet' type='text/css'>

  <!--CSS-->
  <link href="css/comum.css" rel="stylesheet">

  <link href="css/store.css" rel="stylesheet">


</head>
<body>
  <?php  include 'layout/navbar.php'; ?>





  <ul class="nav nav-tabs">
    <li role="presentatio" class="active"><a href="#">Compre</a></li>
    <li role="presentation"><a href="#"><span class="glyphicon glyphicon-shopping-cart"> </span> Meu carrinho</a></li>
    <li role="presentation"class="pagina"><a href="#">Meus pedidos</a></li>
  </ul>
  <br/><br/><br/><br/>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img class="img-responsive" src="img/gambis.jpg" alt="Uma gambiarra" />
      </div>
      <div class="col-md-6">
        <h2>Como gostaria de receber a sua tomada?</h1><br/>
        <div class="row">
          <div class="col-sm-6 text-center"><img class ="opcoes"src="img/baseContorno.svg"/><br/>Com base</div>
          <div class="col-sm-6 text-center"><img class="opcoes" src="img/tomadaContorno.svg"/><br/>Sem base*</div>
        </div>
        <h2>Selecione quantas tomadas você deseja comprar</h1>
        <div class="input-group">
          <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
              <span class="glyphicon glyphicon-minus"></span>
            </button>
          </span>
          <input type="text" name="quant[1]" class="form-control input-number" value="0" min="0" max="10">
          <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
              <span class="glyphicon glyphicon-plus"></span>
            </button>
          </span>
        </div>

        <br/>
        <p><i>* Para que a tomada funcione, é necessário pelo menos uma base</i></p>
      </div>
    </div>
  </div>





  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/controlador.js"></script>
</body>
</html>
