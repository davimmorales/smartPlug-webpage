<!DOCTYPE html>
<html lang="pt-br">
	<?php $cabecalho_title="Editar Projeto";
	include("header.php");
	session_start();
	if($_SESSION['user_id'] == '') {
		include("invalidSession.php");
		include("footer.php");
		exit(1);
	}
	include("database.php");

	$id = $_GET["id"];
	$sql = "SELECT * FROM projetos WHERE Cod_Proj = '" . $id . "' AND Cod_Proj IN (SELECT Cod_Proj FROM Prof_Proj WHERE Cod_Prof = '" . $_SESSION['user_id'] . "')";
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
		                    <a href="/index.php" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
		                        Voltar para tela inicial </a>
	                        <a href="/painel.php" class="btn btn-primary btn-lg">
		                        Voltar para o painel </a>
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
	<body>
		<div class="container">
			<form class="panel panel-default" id="formProjeto" method="post" action=<?php echo "checkout-Projeto.php?type=UPDATE&id=" . $id ; ?> >
				<div class="panel-heading">
					<h2 class="panel-title">Edição de projetos</h2>
				</div>
				<div class="panel-body">
			        <div class="row">
				        <div class = "col-sm-6"> 
							<div class="form-group">
								<label for="titulo">Título</label>
								<input type="text" name="titulo" class="form-control" placeholder="Exemplo: Programa de Educação em Software Livre" value = <?='"' . $result->Titulo . '"'?> required>
							</div>
							<div class="form-group">
								<label for="descr">Descrição</label>
								<textarea name="descr"  class="form-control" rows="2" placeholder="Descrição do seu projeto" required><?=$result->Descricao?></textarea>
							</div>
							<div class="form-group">
								<label for="resumo">Resumo</label>
								<textarea class="form-control" name="resumo"  rows="5" placeholder="Resumo mais detalhado sobre o seu projeto" required><?=$result->Resumo?></textarea>
							</div>
						</div>
				        <div class = "col-sm-6"> 
							<div class="form-group">
								<label for="vagas" >Número de vagas disponíveis</label>
								<input type="number" name="vagas" min="0" class="form-control"  value = <?='"' . $result->Vagas . '"'?> required>
							</div>
							<div class="form-group">
								<label for="cursos" >Curso</label><br>
								<select class="selectpicker" name="cursos[]" multiple data-min-options="1" data-width="100%" required>
			  					<?php 
								$sql = "SELECT * FROM cursos NATURAL LEFT JOIN ( SELECT * from Proj_Curso WHERE Cod_Proj='" . $id . "' ) AUX";
								$cursos = $conn->query($sql);
							    while($curso = $cursos->fetch_assoc()){
							    	echo "<option";
									if ( $curso["Cod_Proj"] == $id )
							          echo ' selected ';
									echo ">" . $curso["Curso"];
							    	echo "</option>";
							    }
			  					?>
			  					</select>
							</div>
							<div class="form-group">
								<label for="imagem">Imagem</label>
								<input id="input-1" type="file" name="imagem" class="file" multiple="false" data-show-upload="false">
							</div>
						</div>
					</div>
					<div class="btn-group  pull-right">
						<button type="button" id="cancel" onclick="javascript:window.location='/painel.php'"class="btn btn-danger">
							Cancelar
						</button>
						<button type="submit" id="submit" class="btn btn-success">
							Confirmar alterações
						</button>
					</div>
				</div>
			</form>
		</div>
	</body>
	<?php include("footer.php") ?>
</html>
