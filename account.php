<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="pt">
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
  <link href="css/account.css" rel="stylesheet"/>

  <!-- Google Charts -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">

  // Load Charts and the corechart package.
  google.charts.load('current', {'packages':['corechart']});

  // Draw the pie chart for device usage
  google.charts.setOnLoadCallback(drawSarahChart);



  // Draw the column chart for the Week Usage
  google.charts.setOnLoadCallback(drawAnthonyChart);


  //Draw the line chart for daily usage
  google.charts.setOnLoadCallback(drawDailyChart);

  //Draw the line chart for Graph4 usage
  google.charts.setOnLoadCallback(drawGraph4);

  // Callback that draws the pie chart for Sarah's pizza.
  function drawSarahChart() {

    // Create the data table for Sarah's pizza.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Aparelho');
    data.addColumn('number', 'Energia');
    data.addRows([ //Adicionar dados aqui, cada [] é uma linha
      ['TV da Sala', 2],
      ['TV do Quarto', 4],
      ['Aparelho super secreto', 10]
    ]);

    // Set options for Sarah's pie chart.
    var options = {title:'Aparelhos de maior uso',
    width:290,
    height:200,
    backgroundColor: '#FCFBD7',
    chartArea: {
      backgroundColor: '#FCFBD7'
    },
    legend: {
      position: 'top'
    }
  };

  // Instantiate and draw the chart for Sarah's pizza.
  var chart = new google.visualization.PieChart(document.getElementById('Graph1'));
  chart.draw(data, options);
}

// Callback that draws the pie chart for Anthony's pizza.
function drawAnthonyChart() {

  // Create the data table for Anthony's pizza.
  var data = google.visualization.arrayToDataTable([//Adicionar dados aqui, cada [] é uma linha
    ['Dia', 'TV da Sala', 'TV do Quarto', 'Aparelho super secreto'],
    ['Segunda', 1000, 400, 200],
    ['Terca', 1170, 460, 250],
    ['Quarta', 660, 1120, 300],
    ['Quinta', 1030, 540, 350],
    ['Sexta', 660, 1120, 300],
    ['Sabado', 1170, 460, 250],
    ['Domingo', 1030, 540, 350]
  ]);

  // Set options for Anthony's pie chart.
  var options = {title:'Uso por aparelho',
  width:290,
  height:200,
  backgroundColor: '#FCFBD7',
  chartArea: {
    backgroundColor: '#FCFBD7'
  },
  legend: {
    position: 'top'
  }
};

// Instantiate and draw the chart for Anthony's pizza.
var chart = new google.visualization.ColumnChart(document.getElementById('Graph2'));
chart.draw(data, options);
}



// Callback that draws the pie chart for Daily Usage
function drawDailyChart() {
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Mês');
  data.addColumn('number', 'TV da Sala');
  data.addColumn('number', 'TV do Quarto');
  data.addColumn('number', 'Aparelho super secreto');

  data.addRows([
    ['Janeiro',  37.8, 80.8, 41.8],//Adicionar dados aqui, cada [] é uma linha
    ['Fevereiro',  30.9, 69.5, 32.4],
    ['Março',  25.4,   57, 25.7],
    ['Abril',  11.7, 18.8, 10.5],
    ['Maio',  11.9, 17.6, 10.4],
    ['Junho',   8.8, 13.6,  7.7],
    ['Julho',   7.6, 12.3,  9.6],
    ['Agosto',  12.3, 29.2, 10.6],
    ['Setembro',  16.9, 42.9, 14.8],
    ['Outubro', 12.8, 30.9, 11.6],
    ['Novembro',  5.3,  7.9,  4.7],
    ['Dezembro',  6.6,  8.4,  5.2],
  ]);

  var options = {
    title: 'Consumo ao longo do ano',
    vAxis: {title: 'Consumo de energia'},
    width:290,
    height:200,
    isStacked: true,
    backgroundColor: '#FCFBD7',
    chartArea: {
      backgroundColor: '#FCFBD7'
    },
    legend: {
      position: 'top'
    }
  };
  //Instantiate graph
  var chart = new google.visualization.SteppedAreaChart(document.getElementById('Graph3'));

  chart.draw(data, options);
}

function drawGraph4() {

  // Create the data table for Sarah's pizza.
  var data = google.visualization.arrayToDataTable([
    ['Hour', 'TV da Sala', 'TV do Quarto'],
    ['0:00',  1000,      400],
    ['08:00',  1170,      460],
    ['12:00',  660,       1120],
    ['20:00',  1030,      540]
  ]);


  // Set options for Sarah's pie chart.
  var options = {title:'Uso por hora',
  width:290,
  height:200,
  backgroundColor: '#FCFBD7',
  chartArea: {
    backgroundColor: '#FCFBD7'
  },
  legend: {
    position: 'top'
  }
};

// Instantiate and draw the chart for Sarah's pizza.
var chart = new google.visualization.AreaChart(document.getElementById('Graph4'));
chart.draw(data, options);
}



</script>



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
  function cor($estado){
    switch($estado){
      case "on":
      print "btn-success";
      break;
      case "off":
      print "btn-danger";
      break;
      case "changed":
      print "btn-warning";
      break;
      default:
      print "btn-cinza";
      break;
    }
  }

  ?>

  <!-- Login Functions -->
  <?php
  $show_modal = false;
  $showDelete_modal = false;
  include("conexao.php");
  $action = "account.php";
  if ($_POST[cadastro]){
    $state = "no cadastro";
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $_SESSION['owner'] = $email;
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
      $_SESSION['owner'] = $rBuscaUser[id];
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
      $_SESSION['owner'] = $rBuscaUser[id];
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

  if ($_POST[submitNovaTomada]){
    $newDeviceName = $_POST['nomeTomada'];
    $newDeviceCode = $_POST['cSerie'];
    $newDeviceOwner = $_SESSION['owner'];
    $checkCode = $conexao->query("SELECT * FROM tomadas WHERE serie = '$newDeviceCode'");
    if(!$checkCode->num_rows)
    $conexao->query("INSERT INTO tomadas(id_user,nome,serie) VALUES('".$newDeviceOwner."','".$newDeviceName."','".$newDeviceCode."')");
  }
  ?>
  <!-- SELECT * FROM `tomadas` WHERE `id_user`= "asenhae@123456.com"; -->
  <!-- Control Functions -->


  <!-- Login -->
  <?php     if(!$_SESSION["includeLogin"]){ ?>
    <center class="NomePage ">
      <h1>Minha Conta</h1>
      <p>Aqui você acessa suas opções de conta e gerencia suas tomadas</p>
    </center>
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
      <form action="account.php" method="post">
        <p>Bem vindo, <span class="atencaoCreme">
          <?php
          print  $_SESSION["nome"];
          ?></span>!
          <input type="submit" name="logout" class="btn btn-cinza" value="Sair"/>
        </p>
      </form>

    </div>

    <center class="NomePage">
      <h1>Minha Conta</h1>
      <p>Aqui você acessa suas opções de conta e gerencia suas tomadas</p>
    </center>

    <div class="container">
      <div class="row">
        <div class="col-md-5  regioes" >

          <div class="panel panel-default regioes">
            <!-- Default panel contents -->
            <div class="panel-heading" style="color:white;">

              <div class="row">
                <div class="col-xs-3">
                  <button class="bc btn-cinza"><span class="glyphicon glyphicon-option-vertical" data-toggle="modal" data-target="#ModalMenu"> </span></button>
                </div>
                <div class="col-xs-4 text-center"><b>Seus Dispositivos</b></div>
                <div class="col-xs-5 text-right">
                  <button class="bc btn-cinza"><span class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#ModalAdicionarTomada"> </span></button>
                  <button class="bc btn-cinza"><span class="glyphicon glyphicon-trash" data-toggle="modal" data-target="#ModalRemove"> </span></button>
                  <button class="bc btn-cinza"><span class="glyphicon glyphicon-cog"data-toggle="modal" data-target="#ModalT0"></span></button>
                </div>
              </div>

            </div>







            <!-- Table -->
            <div class="table-responsive">
              <table class="text-center table">
                <tr>
                  <td>Nº
                  </td>
                  <td>Nome
                  </td>
                  <td>Estado
                  </td>
                </tr>
                <?php
                include("conexao.php");
                $showDelete_modal = false;
                $counter = 0;
                $owner = $_SESSION['owner'];
                $devicesData = $conexao->query("SELECT * FROM tomadas WHERE id_user = '$owner'");
                while($rDevicesData = $devicesData->fetch_assoc()){
                  $devicesArray[$counter] = array('id'=>$rDevicesData[id],
                  'id_user'=>utf8_encode($rDevicesData[id_user]),
                  'nome' => utf8_encode($rDevicesData[nome]),
                  'serie'=>utf8_encode($rDevicesData[serie]),
                  'status'=>$rDevicesData[status]);
                  $counter++;
                }

                for ($i=0; $i < $counter; $i++) {
                  if(!$_POST[check_list][$i]){
                    if($devicesArray[$i]['status'])
                    $statusValue[$i] = "on";
                    else
                    $statusValue[$i] = "off";
                  }
                  else {
                    $statusValue[$i] = "changed";
                  }

                  ?>
                  <tr>
                    <td><?php echo $i+1; ?>
                    </td>
                    <td><?php echo $devicesArray[$i]['nome']; ?>
                    </td>
                    <td>
                      <form action='account.php' method='post'>
                        <input type="submit" name="check_list[<?php echo $i; ?>]" class="btn <?php  cor($statusValue[$i]); ?>"  value=<?php echo $statusValue[$i] ?> >
                      </form>
                    </td>


                  </tr>


                  <?php }

                  //This code below might need to change
                  for ($j=0; $j < $counter; $j++) {
                    if($_POST[check_list][$j]){
                      if($devicesArray[$j]['status']==1){
                        header('Location: account.php');
                        $deviceID = $devicesArray[$j]['id'];
                        $conexao->query("UPDATE tomadas SET status=0 WHERE id=$deviceID");
                        // $statusValue[$j]= "off";
                      }
                      else if($devicesArray[$j]['status']==0) {
                        $deviceID = $devicesArray[$j]['id'];
                        $conexao->query("UPDATE tomadas SET status=1 WHERE id=$deviceID");
                        // $statusValue[$j]= "on";
                      }
                    }
                    else if($_POST[deleteOne][$j]){
                      $_SESSION['deleteElement'] = $j;
                      $showDelete_modal = true;
                    }
                    elseif ($_POST[deleteTwo][$j]) {
                      $deviceID = $devicesArray[$j]['id'];
                      $deviceName = $devicesArray[$j]['nome'];
                      $conexao->query("DELETE FROM tomadas where id=$deviceID");
                      echo "Tomada '".$deviceName."' excluída com sucesso";
                    }
                  }


                  ?>
                </table>
              </div>
            </div>

          </div>

          <div class="col-md-7  regioes" >
            <div class="row">
              <div class="col-sm-6 "><center><div  class="chartArea" id="Graph1"></div></center></div>
              <div class="col-sm-6 "><center><div class="chartArea"  id="Graph3"></div></center></div>
            </div>
            <div class="row">
              <div class="col-sm-6 "><center><div class="chartArea"  id="Graph2"></div></center></div>
              <div class="col-sm-6 "><center><div class="chartArea"  id="Graph4"></div></center></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php     }
    //New stuff that needs enconding
    ?>


    <!-- Modal APAGAR TOMADA -->
    <div class="modal fade" id="ModalRemove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center><h2 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Remoção de tomadas!</h2></center>
          </div>
          <div class="modal-body">

            <center>

              <form role="form">
                <div class="form-group">
                  <label for="sel1">Selecione a tomada a ser removida</label><br/>
                  <select class="form-control selec" id="sel1">
                    <option class="text-center">1: TV da Sala </option>
                    <option class="text-center">2: TV do Quarto </option>
                    <option class="text-center">3: Aparelho Super Secreto </option>
                  </select>
                </div>
              </form>
            </center>

          </div>
          <div class="modal-footer">
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <p class="text-center"><strong>Cuidado! </strong></p>
              <p class="text-center">Após a remoção a tomada não funcionará até ser readicionada!</p>
              <p class="text-center"> Você tem certeza que quer removê-la?</p>
            </div>
            <br/>
            <button type="button" class="btn btn-danger">Remover tomada</button>
            <button type="button" class="btn btn-success" data-dismiss="modal">Não remova!</button>
          </div>
        </div>
      </div>
    </div>


    <!--Modal PROGRAMAÇÃO -->
    <div class="modal fade modal" id="ModalT0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <form role="form">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <center><h2 class="modal-title" id="myModalLabel">Programação<br/><small>Aqui você programa o funcionamento da sua tomada</h2></center>
              </div>
              <div class="modal-body">


                <center>
                  <h3 class="subreg">Nova programação</h3>

                  <div class="form-group">
                    <label for="acao">Selecione a ação</label><br/>
                    <select class="form-control selec" id="acao">
                      <option class="text-center">Ligar</option>
                      <option class="text-center">Desligar</option>
                    </select><br/>
                    <label for="sel1">Selecione a tomada</label><br/>
                    <select class="form-control selec" id="sel1">
                      <option class="text-center">1: TV da Sala </option>
                      <option class="text-center">2: TV do Quarto </option>
                      <option class="text-center">3: Aparelho Super Secreto </option>
                    </select><br/>
                    <label for="dia">Selecione o dia</label><br/>
                    <input class="form-control selec" type="date" name="pday" id="dia"/><br/>
                    <label for="hora">Selecione o horário</label><br/>
                    <input class="form-control selec"  type="time" name="usr_time" id="hora"><br/>
                    <button class="btn btn-cinza">Salvar</button>
                  </div>

                </center>
                <hr/>
                <center>
                  <h3 class="subreg">Programações</h3>
                  <div class="table-responsive">
                    <table class="table programacao text-center">
                      <thead>
                        <tr>
                          <th>Ação</th>
                          <th>Tomada</th>
                          <th>Dia</th>
                          <th>Horário</th>
                          <th>Cancela</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span class="label label-success">Ligar</span></td>
                          <td>1: TV da Sala</td>
                          <td>26/12/2016</td>
                          <td>18:00</td>
                          <td><button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>
                        </tr>
                        <tr>
                          <td><span class="label label-danger">Desligar</span></td>
                          <td>2: TV do Quarto</td>
                          <td>27/12/2016</td>
                          <td>00:00</td>
                          <td><button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>
                        </tr>
                        <tr>
                          <td><span class="label label-success">Ligar</span></td>
                          <td>3: Aparelho Super Secreto</td>
                          <td>19/09/2016</td>
                          <td>18:00</td>
                          <td><button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>
                        </tr>
                        <tr>
                          <td><span class="label label-danger">Desligar</span></td>
                          <td>3: Aparelho Super Secreto</td>
                          <td>19/09/2016</td>
                          <td>19:00</td>
                          <td><button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </center>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </form>
      </div>



      <!--Modal OPÇÕES -->
      <div class="modal fade modal" id="ModalMenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form role="form">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h2 class="modal-title" id="myModalLabel">Opções<br/><small>Aqui você encontra opções para gráficos<br/> e altera suas tomadas</h2></center>
                </div>
                <div class="modal-body">
                  <center>
                    <h4>Exportar</h4><br/>
                    <button class="btn btn-success disabled"> Excel</button>
                  </center>
                  <hr/>
                  <center>
                    <h4>Alterar tomada</h4><br/>

                    <label for="sel2">Selecione a tomada</label><br/>
                    <select class="form-control" id="sel2">
                      <option class="text-center">1: TV da Sala </option>
                      <option class="text-center">2: TV do Quarto </option>
                      <option class="text-center">3: Aparelho Super Secreto </option>
                    </select><br/>
                    <label for="Volts1">Selecione a tensão em que a tomada trabalha</label><br/>
                    <select class="form-control" id="Volts1">
                      <option class="text-center">110V</option>
                      <option class="text-center">220V</option>
                    </select><br/>
                    <input type="text" name="nomeTomada" class="form-control" placeholder="Alterar nome"><br/>
                    <input type="text" name="cSerie" class="form-control" placeholder="Alterar código de Série"><br/>


                  </center>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-cinza">Salvar</button>
                </div>
              </div>
            </div>
          </form>
        </div>



        <!-- Modal ADICIONAR TOMADA-->
        <div class="modal fade" id="ModalAdicionarTomada" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Adicionar Novo Dispositivo</h4>
              </div>
              <form action="autenticacao.php" method:"post">
                <div class="modal-body">

                  <div class="form-group">


                    <input type="text" name="nomeTomada" class="form-control" placeholder="nome"><br/>
                    <input type="text" name="cSerie" class="form-control" placeholder="Código de Série"><br/>
                    <label for="sel1">Selecione a tensão em que a tomada trabalha</label><br/>
                    <select class="form-control" id="Volts">
                      <option class="text-center">110V</option>
                      <option class="text-center">220V</option>
                    </select><br/>

                  </div>

                </div>
                <div class="modal-footer">
                  <input type="submit" value="Adicionar Dispositivo" name="submitNovaTomada" class="btn btn-cinza"/>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
              </form>
            </div>
          </div>
        </div>






        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <?php if($show_modal):?>
          <script> $('#ModalW1').modal('show');</script>
        <?php endif;?>
        <?php if($showDelete_modal):?>
          <script> $('#ModalDelete').modal('show');</script>
        <?php endif;?>
      </body>
      </html>
