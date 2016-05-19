<!DOCTYPE html>
<html lang="pt-br">
	<?php 
  $id = $_GET["id"];
	$cabecalho_title="Projeto";
  include("header.php");
  include("database.php");
  $sql = "SELECT * FROM projetos WHERE Cod_Proj = '" . $id . "';";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    $result = $result->fetch_object();
  }else{
    echo '<style type="text/css">
    body { background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABZ0RVh0Q3JlYXRpb24gVGltZQAxMC8yOS8xMiKqq3kAAAAcdEVYdFNvZnR3YXJlAEFkb2JlIEZpcmV3b3JrcyBDUzVxteM2AAABHklEQVRIib2Vyw6EIAxFW5idr///Qx9sfG3pLEyJ3tAwi5EmBqRo7vHawiEEERHS6x7MTMxMVv6+z3tPMUYSkfTM/R0fEaG2bbMv+Gc4nZzn+dN4HAcREa3r+hi3bcuu68jLskhVIlW073tWaYlQ9+F9IpqmSfq+fwskhdO/AwmUTJXrOuaRQNeRkOd5lq7rXmS5InmERKoER/QMvUAPlZDHcZRhGN4CSeGY+aHMqgcks5RrHv/eeh455x5KrMq2yHQdibDO6ncG/KZWL7M8xDyS1/MIO0NJqdULLS81X6/X6aR0nqBSJcPeZnlZrzN477NKURn2Nus8sjzmEII0TfMiyxUuxphVWjpJkbx0btUnshRihVv70Bv8ItXq6Asoi/ZiCbU6YgAAAABJRU5ErkJggg==);}
    .error-template {padding: 40px 15px;text-align: center;}
    .error-actions {margin-top:15px;margin-bottom:15px;}
    .error-actions .btn { margin-right:10px; }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template">
                    <h1>
                        Oops!</h1>
                    <h2>
                      Projeto não encontrado.</h2>
                    <div class="error-details">';
                      if($id == ""){
                        echo "Você precisa selecionar um projeto válido";
                      }else{
                        echo "O projeto de id " . $id . " não existe, ou foi removido";
                      }
                    echo '
                    </div>
                    <div class="error-actions">
                        <a href="http://www.projetosict.wc.lt" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                            Voltar para tela inicial </a>
                    </div>
                </div>
            </div>
        </div>
    </div>';
    $conn->close();
    include("footer.php");
    exit();
  }
	?>
	<style>
	  .thumbnail{
	    padding: 10px;
	  }
	</style>
	<body>
    <div class="container">
      <div class="row">
        <div class = "col-md-8 col-sm-6"> 
          <div class = "">
          	<div class = "media">
            	<div class="pull-left" href="#">
							  <img class="media-object" data-src="holder.js/128x128" alt="...">
						  </div>
						  <h3 style = 'margin-top: 0'><?=$result->Titulo?></h3>
						  <p>Cursos: 
						  <?php
          	     $sql = "SELECT * FROM cursos WHERE Cod_Curso IN (SELECT Cod_Curso FROM Proj_Curso WHERE Cod_Proj = '" . $_GET["id"] . "');";
                 $cursos = $conn->query($sql);
                 while($row = $cursos->fetch_assoc()) {
                  echo "<a> " . $row["Curso"] . "</a>  ";
                 }
          	  ?>
						  <a>Ciência da computação</a> - <a>Extensão</a> - <a>Software Livre</a></p>
						  <p>Website: <a href="http://www.pacoca.pro.br">www.pinguim.pro.br</a></p>
              <p><?=$result->Descricao?></p>
            </div>
            <h4>Resumo:</h4>
            <p><?=$result->Resumo?></p>
          </div>
        </div>
        <div class = "col-md-4 col-sm-6"> 
          <div class = "media thumbnail">
          	<h4 style = 'margin-top: 0'>Professores e Pesquisadores:</h4>
          	<ul>
          	  <?php
          	     $sql = "SELECT * FROM professor WHERE Cod_Prof = (SELECT Cod_Prof FROM Prof_Proj WHERE Cod_Proj = '" . $_GET["id"] . "');";
                 $projetos = $conn->query($sql);
                 while($row = $projetos->fetch_assoc()) {
                  echo "<li><a href='professor.php?id=" . $row["Cod_Prof"] ."' >" . $row["Nome"] . "</a></li>";
                 }
          	  ?>
              <li><a>Prof. Dr. Arlindo Flavio da Conceição</a></li>
              <li><a>Prof. Dr. Fulano da Silva</a></li>
            </ul>
          	<h4 style = 'margin-top: 0'>Artigos:</h4>
          	<ul>
              <li><a href='http://www.nature.com/nature/journal/v438/n7068/abs/438575a.html'>Fruit bats as reservoirs of Ebola virus</a></li>
              <li><a href='http://www.scielo.br/pdf/pab/v34n7/8220.pdf'>Utilização do resíduo do leite de soja na elaboração de paçoca</a></li>
            </ul>
          	<h4 style = 'margin-top: 0'>Alunos:</h4>
          	<ul>
              <li><a>Luiz Cardoso Ferreira</a></li>
              <li><a>Júlia Costa Goncalves</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
	</body>
	<?php $conn->close();
    include("footer.php");
  ?>
</html>
