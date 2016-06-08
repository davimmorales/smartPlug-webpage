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
      $_SESSION["includeLogin"];
      $_SESSION["includeControle"];
      if($_POST[logout]){
        $_SESSION["includeLogin"] = false;
        $_SESSION["includeControle"] = false;
      }
  ?>

  <?php
  function estado($tomada, $modo){
    if(isset($_SESSION[$tomada])){
      if($_SESSION[$tomada]==true){
        if($modo==1){
          print "btn-success";}
          else{
            print "Ligado";
          }
        }
        else{
          if($modo==1){
            print " btn-danger";
          }
          else{
            print "Desligado";
          }
        }
      }
    }
    ?>

  	<?php
    $show_modal = false;
  	include("conexao.php");
    $action = "account.php";
  	if ($_POST[cadastro]){
      $state = "no cadastro";
      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $pass = $_POST['password'];
      $pass2 = $_POST['passwordConfirm'];
  		$buscaUser = $conexao->query("SELECT * FROM usuarios WHERE email='$email'");
      if(!($nome&$email&$pass&$pass2)){//CAMPO NÃO PREENCHIDO
        $warning = "Por favor, preencha todos os campos do cadastro";
        $show_modal = true;
      }
  		else if ($buscaUser->num_rows != 0){ // EMAIL JA CADASTRADO
        $warning = "Alguém já escolheu este email de cadastro, tente outro";
        $show_modal = true;
  		}
  		else if($pass != $pass2){// AS SENHAS DIGITADAS SAO DIFERENTES
  				$warning = "As senhas digitadas não se correspondem";
          $show_modal = true;
  			}
  			else{
  				$senhaSha = hash('sha256', $pass);
  				$conexao->query("INSERT INTO usuarios(nome,email,senha) VALUES('".$nome."','".$email."','".$senhaSha."')");
          $_SESSION["nome"] = $nome;
          $_SESSION["includeLogin"] = true;
          $_SESSION["includeControle"] = true;
  			}
  	}
    if($_POST[submitLogin]){
      $state = "no login";
      $emailLogin = $_POST['emailLogin'];
      $pwdLogin = $_POST['pwdLogin'];
      $buscaUser = $conexao->query("SELECT * FROM usuarios WHERE email='$emailLogin'");
      if(!($emailLogin&$pwdLogin)){//CAMPO NÃO PREENCHIDO
        $warning = "Por favor, preencha todos os campos para entrar";
        $show_modal = true;
      }
      else if(!$buscaUser->num_rows){//==0
        $warning = "Endereço de email inválido";
        $show_modal = true;
      }
      else {
        $senhaSha = hash('sha256', $pwdLogin);
        $rBuscaUser = $buscaUser->fetch_assoc();
        $_SESSION["nome"] = $rBuscaUser[nome];
        if($senhaSha!=$rBuscaUser[senha]){
          $warning = "Senha inválida";
          $show_modal = true;
        }
        else{
          $_SESSION["includeLogin"] = true;
          $_SESSION["includeControle"] = true;
        }
        }
      }
  	  ?>


<!-- Login -->
<?php     if(!$_SESSION["includeLogin"]){ ?>
  <div class="container">
    <h1>Minha Conta</h1>
    <p>Aqui você acessa suas opções de conta e gerencia suas tomadas</p>
  </div>
  <div class="container">
    <div class=" row">
      <div class="col-md-6">

        <h2>Possuo uma conta</h2>
        <form action="<?php echo $action; ?>" method='post'>
          <input type="e-mail" name="emailLogin" class="form-control" placeholder="e-mail"><br/>
          <input type="password" name="pwdLogin" class="form-control" placeholder="senha"><br/>
          <input type="submit" name="submitLogin" class="btn btn-cinza" value="Acesse sua conta" />
          <h3> Esqueceu seus dados? Não tem problema!</h3>
          <p> Recupere por <a target="_blank">aqui</a></p>
        </form>


      </div>
      <div class="col-md-6">
        <h2>Quero me cadastrar</h2>
        <form action='account.php' method='post'>
          <input type="text" name="nome" class="form-control" placeholder="nome"><br/>
          <input type="e-mail" name="email" class="form-control" placeholder="e-mail"><br/>
          <input type="password" name="password" class="form-control" placeholder="senha"><br/>
          <input type="password" name="passwordConfirm" class="form-control" placeholder="insira novamente sua senha"><br/>

          </div>
          <input type="submit" value="Crie sua conta" name="cadastro" class="btn btn-cinza"/>
        </form>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

  <!-- Modals -->
            <div class="modal fade" id="ModalW1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Falha <?php  echo $state; ?></h4>
  </div>
                  <div class="modal-body">
                    <?php  echo $warning; ?>
                  </div>
                </div>
              </div>
            </div>

      </div>
    </div>
  </div>
<?php     } ?>

<!-- Controle -->
<?php     if($_SESSION["includeControle"]){ ?>
  <div class="infoSecao text-right container-fluid">
  <p>Bem vindo, <span class="atencaoCreme">
<?php
print  $_SESSION["nome"]."\n";// $_SESSION["nome"]."\n";
?></span>! <form action="account.php" method="post">
    <input type="submit" name="logout" class="btn btn-cinza" value="Sair">
</form> <!--(<a href="logout.php">Sair</a>) -->

</div>

<div class="container">
  <h1>Minha Conta</h1>
  <p>Aqui você acessa suas opções de conta e gerencia suas tomadas</p>
</div>

<div class="container">
  <div class="row" style="margin-top:50px;">
    <div class="col-md-5" >

      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading text-center" style="color:#FCFBD7;">
            <b>Seus Dispositivos</b>
            <button class="btn btn-cinza"><span class="glyphicon glyphicon-plus"data-toggle="modal" data-target="#ModalAdicionarTomada"></span></button>
        </div>
        <!-- Modal Add-->
        <div class="modal fade" id="ModalAdicionarTomada" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Adicionar Novo Dispositivo</h4>
              </div>
              <div class="modal-body">
                <form action="autenticacao.php" method:"post">
                  <input type="text" name="nomeTomada" class="form-control" placeholder="nome"><br/>
                  <input type="text" name="cSerie" class="form-control" placeholder="Código de Série"><br/>
                  <input type="submit" value="Adicionar Dispositivo" name="submitNovaTomada" class="btn btn-cinza"/>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </form>
              </div>
              <!-- <div class="modal-footer"> -->
                <!-- <button type="button" class="btn btn-cinza">Save changes</button> -->
              <!-- </div> -->
            </div>
          </div>
        </div>

        <!-- Table -->
        <table class="text-center table">
          <tr>
            <td>Nº
            </td>
            <td>Nome
            </td>
            <td>Estado
            </td>
            <td>Configurar
            </td>
          </tr>
          <tr>
            <td>1
            </td>
            <td>TV da Sala
            </td>
            <td><a class="btn <?php estado("t0",1);?>" href="switch.php?ID=t0"><?php estado("t0",2)?></a>
            </td>
            <td><button class="btn btn-cinza"><span class="glyphicon glyphicon-cog"data-toggle="modal" data-target="#ModalT0"></span></button>
              <!--Modal -->
              <div class="modal fade" id="ModalT0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Tomada 1</h4>
                    </div>
                    <div class="modal-body">
                      Aqui virão funções para programar a tomada para ligar automaticamente na hora que você quiser!
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-cinza">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>

            </td>
          </tr>
          <tr>
            <td>2
            </td>
            <td>TV do Quarto
            </td>
            <td><a class="btn <?php estado("t1",1);?>" href="switch.php?ID=t1"><?php estado("t1",2)?></a>
            </td>
            <td><button class="btn btn-cinza"><span class="glyphicon glyphicon-cog"data-toggle="modal" data-target="#ModalT1"></span></button>
              <!--Modal -->
              <div class="modal fade" id="ModalT1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Tomada 2</h4>
                    </div>
                    <div class="modal-body">
                      Aqui virão funções para programar a tomada para ligar automaticamente na hora que você quiser!
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-cinza">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>

            </td>
          </tr>
          <tr>
            <td>3
            </td>
            <td>Aparelho super secreto
            </td>
            <td><a class="btn <?php estado("t2",1);?>" href="switch.php?ID=t2"><?php estado("t2",2)?></a>
            </td>
            <td><button class="btn btn-cinza"><span class="glyphicon glyphicon-cog"data-toggle="modal" data-target="#ModalT2"></span></button>
              <!--Modal -->
              <div class="modal fade" id="ModalT2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Tomada 3</h4>
                    </div>
                    <div class="modal-body">
                      Aqui virão funções para programar a tomada para ligar automaticamente na hora que você quiser!
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-cinza">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>

            </td>
          </tr>
        </table>
      </div>

    </div>
    <div class-"col-md-7" >
      <p>Existem gráficos aqui, basta ter fé</p>
    </div>
  </div>
</div>
<?php     } ?>






  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <?php if($show_modal):?>
    <script> $('#ModalW1').modal('show');</script>
  <?php endif;?>
</body>
</html>
