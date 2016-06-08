
	  <?php
  // ob_start();
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
				// ENVIA PARA OUTRA PAGINA
				echo "CADASTRO REALIZADO COM SUCESSO!";
			}
		// }
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
      if($senhaSha!=$rBuscaUser[senha]){
        $warning = "Senha inválida";
        $show_modal = true;
      }
      else{
        // ob_clean();
				$includeLogin = false;
				include 'controle.php';
        // header('location: http://52.37.77.21/index.php');
        // die();
      }
      }
    }

  // emailLogin"
  // pwdLogin"
  // ="submitLogin

	  ?>



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

        <!-- <input type="radio" name="gender" value="M" id=male />                        Masculino -->
      </label>
      <!--<label class="radio-inline">
        <input type="radio" name="gender" value="F" id=female />                        Feminino
      </label>

      <br/><br/>
      <div class="container-fluid">
        <div class="col-xs-4 col-md-4">
          <select name="day" class = "form-control input-lg">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
          </select>                        </div>

          <div class="col-xs-4 col-md-4">


            <select name="month" class = "form-control input-lg">
              <option value="01">Janeiro</option>
              <option value="02">Fevereiro</option>
              <option value="03">Março</option>
              <option value="04">April</option>
              <option value="05">Maio</option>
              <option value="06">Junho</option>
              <option value="07">Julho</option>
              <option value="08">Agosto</option>
              <option value="09">Setembro</option>
              <option value="10">Outubro</option>
              <option value="11">Novembro</option>
              <option value="12">Dezembro</option>
            </select>                        </div>

            <div class="col-xs-4 col-md-4">
              <select name="year" class = "form-control input-lg">
                <option value="1935">1935</option>
                <option value="1936">1936</option>
                <option value="1937">1937</option>
                <option value="1938">1938</option>
                <option value="1939">1939</option>
                <option value="1940">1940</option>
                <option value="1941">1941</option>
                <option value="1942">1942</option>
                <option value="1943">1943</option>
                <option value="1944">1944</option>
                <option value="1945">1945</option>
                <option value="1946">1946</option>
                <option value="1947">1947</option>
                <option value="1948">1948</option>
                <option value="1949">1949</option>
                <option value="1950">1950</option>
                <option value="1951">1951</option>
                <option value="1952">1952</option>
                <option value="1953">1953</option>
                <option value="1954">1954</option>
                <option value="1955">1955</option>
                <option value="1956">1956</option>
                <option value="1957">1957</option>
                <option value="1958">1958</option>
                <option value="1959">1959</option>
                <option value="1960">1960</option>
                <option value="1961">1961</option>
                <option value="1962">1962</option>
                <option value="1963">1963</option>
                <option value="1964">1964</option>
                <option value="1965">1965</option>
                <option value="1966">1966</option>
                <option value="1967">1967</option>
                <option value="1968">1968</option>
                <option value="1969">1969</option>
                <option value="1970">1970</option>
                <option value="1971">1971</option>
                <option value="1972">1972</option>
                <option value="1973">1973</option>
                <option value="1974">1974</option>
                <option value="1975">1975</option>
                <option value="1976">1976</option>
                <option value="1977">1977</option>
                <option value="1978">1978</option>
                <option value="1979">1979</option>
                <option value="1980">1980</option>
                <option value="1981">1981</option>
                <option value="1982">1982</option>
                <option value="1983">1983</option>
                <option value="1984">1984</option>
                <option value="1985">1985</option>
                <option value="1986">1986</option>
                <option value="1987">1987</option>
                <option value="1988">1988</option>
                <option value="1989">1989</option>
                <option value="1990">1990</option>
                <option value="1991">1991</option>
                <option value="1992">1992</option>
                <option value="1993">1993</option>
                <option value="1994">1994</option>
                <option value="1995">1995</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
                <option value="1998">1998</option>
                <option value="1999">1999</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
              </select>
            </select>
            <br/>
          </div>
		  -->
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
