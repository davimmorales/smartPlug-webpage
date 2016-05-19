<!DOCTYPE html>
<html lang="pt-br">
  <?php 
  $id = $_GET["id"];
  $cabecalho_title="Professor";
  include("header.php");
  include("database.php");
  $sql = "SELECT * FROM professor WHERE Cod_Prof = '" . $id . "';";
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
                      Professor não encontrado.</h2>
                    <div class="error-details">';
                      if($id == ""){
                        echo "Você precisa selecionar um professor válido";
                      }else{
                        echo "O professor de id " . $id . " não existe, ou foi removido";
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
						  <h3 style = 'margin-top: 0'><?php echo $result->Nome ?></h3>
						  <!-- <p>Tags: <a>Ciência da computação</a> - <a>Engenharia da Computação</a></p> -->
						  <!-- <p><a href="http://lattes.cnpq.br/7438076121387151">Clique aqui para ver o CV Lattes</a></p> -->
						  <p><?= $result->Descricao ?></p>
            </div>
<!--             <h4>Resumo:</h4>
            <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.</p> -->
          </div>
        </div>
        <div class = "col-md-4 col-sm-6">
          <div class = "media thumbnail">
          	<h4 style = 'margin-top: 0'>Projetos:</h4>
          	<ul>
              <?php
                $sql = "SELECT * FROM projetos WHERE Cod_Proj IN (SELECT Cod_Proj FROM Prof_Proj WHERE Cod_Prof = '" . $_GET["id"] . "')";
                $projetos = $conn->query($sql);
                while($row = $projetos->fetch_assoc()) {
                  echo "<li><a href='projeto.php?id=" . $row["Cod_Proj"] ."' >" . $row["Titulo"] . "</a></li>";
                }
                $conn->close();
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
	</body>
	<?php include("footer.php") ?>
</html>
