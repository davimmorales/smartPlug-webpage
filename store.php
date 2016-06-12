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

  <?php
  include 'layout/navbar.php';
  include 'layout/storenav.php';
  ?>






  <br/><br/><br/><br/>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img class="img-responsive" src="img/gambis.jpg" alt="Uma gambiarra" />
      </div>
      <div class="col-md-6">
        <h2>O que você gostaria de comprar hoje?</h1><br/>
          <div class="row">
            <div class="col-sm-6 text-center"><img class ="opcoes"src="img/baseContorno.svg"/><br/>Base<br/><br/>
              <form method='post' action='https://www.moip.com.br/Process.do'>
                <input type='hidden' name='method' value='shoppingcart'/>
                <input type='hidden' name='value' value='srZ4pdQD6N8dRoPMlvrvkA=='/>
                <input type='hidden' name='type' value='1'/>
                <input type='image' name='submit' src='https://static.moip.com.br/imgs/buttons/bt_adicionar_c08_e02.gif' alt='Base Tomas' border='0' />
              </form>

            </div>
            <div class="col-sm-6 text-center">
              <img class="opcoes" src="img/tomadaContorno.svg"/><br/>Tomada*<br/><br/>
              <form method='post' action='https://www.moip.com.br/Process.do'>
                <input type='hidden' name='method' value='shoppingcart'/>
                <input type='hidden' name='value' value='BRfADGAsoik1rr3O3SNTpg=='/>
                <input type='hidden' name='type' value='1'/>
                <input type='image' name='submit' src='https://static.moip.com.br/imgs/buttons/bt_adicionar_c08_e02.gif' alt='Tomada Inteligente Tomas' border='0' />
              </form>


            </div>
          </div>
          <h2>Aproveite e leve também o nosso incrível suporte premium</h2><br/>
            <center>
              <form method='post' action='https://www.moip.com.br/Process.do'>
                <input type='hidden' name='method' value='shoppingcart'/>
                <input type='hidden' name='value' value='zwGl1V5db7hJhNMuLouXEw=='/>
                <input type='hidden' name='type' value='1'/>
                <input type='image' name='submit' src='https://static.moip.com.br/imgs/buttons/bt_adicionar_c08_e04.png' alt='Suporte Extendido 12 meses' border='0' />
              </form>
            </center>
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
