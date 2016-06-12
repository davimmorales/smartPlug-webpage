<center>
  <div class="container" style="padding-bottom:85px;padding-top:10px;">
    <h1>Minha Conta</h1>
    <p>Aqui você acessa suas opções de conta e gerencia suas tomadas</p>
  </div>
</center>

<div class="container">
  <div class=" row">
    <div class="col-md-6">

      <h2>Possuo uma conta</h2>
      <form action='account.php' method='post'>
        <input type="e-mail" class="form-control" placeholder="e-mail"><br/>
        <input type="password" class="form-control" placeholder="senha"><br/>
        <input type="submit" name="submitLogin" class="btn btn-cinza" value="Acesse sua conta" />
        <h3> Esqueceu seus dados? Não tem problema!</h3>
        <p> Recupere por <a target="_blank">aqui</a></p>
      </form>

    </div>
    <div class="col-md-6">
      <h2>Quero me cadastrar</h2>
      <form action="autenticacao.php" method:"post">
        <input type="text" name="nome" class="form-control" placeholder="nome"><br/>
        <input type="e-mail" name="email" class="form-control" placeholder="e-mail"><br/>
        <input type="password" name="password" class="form-control" placeholder="senha"><br/>
        <input type="password" name="passwordConfirm" class="form-control" placeholder="insira novamente sua senha"><br/>
        <!--div class="g-recaptcha" data-sitekey="6Le0ayITAAAAAMBOtWWbOu7sYEUyKAHuD2IV_eXQ"></div-->
        <form action='account.php' method='post'>
      </label>
      <br/>

      <input type="submit" value="Crie sua conta" name="cadastro" class="btn btn-cinza"/>
    </form>
  </div>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <?php

  include("conexao.php");

  if ($_POST[cadastro]){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pass2 = $_POST['passwordConfirm'];
    $buscaUser = $conexao->query("SELECT * FROM usuarios WHERE email='$email'");
    if ($buscaUser->num_rows != 0){ // EMAIL JA CADASTRADO
      echo "O EMAIL TA CADASTRADO";
    }
    else{
      if($pass != $pass2){// AS SENHAS DIGITADAS SAO DIFERENTES
        echo "AS SENHAS SÃO DIFERENTES";
      }
      else{
        $senhaSha = hash('sha256', $pass);
        $conexao->query("INSERT INTO usuarios(nome,email,senha) VALUES('".$nome."','".$email."','".$senhaSha."')");
        // ENVIA PARA OUTRA PAGINA
        echo "CADASTRO REALIZADO COM SUCESSO!";
      }
    }
  }

  if($_POST[submitLogin]){
    $emailLogin = $_POST['emailLogin'];
    $pwdLogin = $_POST['pwdLogin'];
    $buscaUser = $conexao->query("SELECT * FROM usuarios WHERE email='$emailLogin'");
    if(!$buscaUser->num_rows)//==0
    echo "Usuário não existe";
    else {
      $senhaSha = hash('sha256', $pwdLogin);
      $rBuscaUser = $buscaUser->fetch_assoc();

      if($senhaSha!=$rBuscaUser[senha])
      echo "A senha tá errada.";
      else
      echo "Acesso realizado com sucesso";

    }
  }





  // emailLogin"
  // pwdLogin"
  // ="submitLogin

  ?>


</div>
</div>
</div>
