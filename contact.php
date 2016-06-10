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
    <h1>Fale Conosco</h1>
    <p>Será um prazer ajudá-lo.</p>

  </div>
  <?php

    if($_POST[submitInput]){

  $name = $_POST['nameInput'];
  $email= $_POST['emailInput'];
  $message = $_POST['msgInput'];

  $toaddress = "davimmorales@gmail.com";
  $subject = "PHP teste";
  $mailcontent = "Nome do cliente: ".$name."\n".
           "Email do cliente: ".$email."\n".
           "Mensagem: ".$message."\n";
  // $fromaddress = "From: webserver@example.com";
  mail($toaddress, $subject, $mailcontent);//, $fromaddress);

}
   ?>

  <div class="container">
    <div class=" row">
      <form method='post'>
          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="nameInput" id="nameID" class="form-control" placeholder="Primeiro e Último">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="emailInput" id="emailID" class="form-control" placeholder="exemplo@dominio.com">
          </div>
          <div class="form-group">
            <label for="msg">Mensagem</label>
            <textarea class="form-control" name="msgInput" rows="3" placeholder="Escreva sua mensagem aqui."></textarea>
            <!-- <input type="text" rows="3" id="disabledTextInput1" class="form-control" placeholder="Mensagem"> -->
          </div>

          </div>
          <input type="submit" name="submitInput" class="btn btn-cinza" value="Enviar"></input>
      </form>

    </div>
  </div>




  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
