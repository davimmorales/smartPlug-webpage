<!DOCTYPE html>
<html lang="pt-br">
	<?php $cabecalho_title="Cadastrar Projeto";
	include("header.php");
	session_start();
	if($_SESSION['user'] == '') {
		include("invalidSession.php");
		include("footer.php");
		exit(1);
	}
	?>
	<body>
		<div class="container">
			<form class="panel panel-default" id="formProjeto" method="post" action="checkout-Projeto.php">
				<div class="panel-heading">
					<h2 class="panel-title">Cadastro de projetos</h2>
				</div>
				<div class="panel-body">
				   <div class="row">
				        <div class = "col-sm-6"> 
							<div class="form-group">
								<label for="titulo">Título</label>
								<input type="text" name="titulo" class="form-control" placeholder="Exemplo: Programa de Educação em Software Livre" required>
							</div>
							<div class="form-group">
								<label for="descr">Descrição</label>
								<textarea name="descr"  class="form-control" rows="2" placeholder="Descrição do seu projeto" required></textarea>
							</div>
							<div class="form-group">
								<label for="resumo">Resumo</label>
								<textarea class="form-control" name="resumo"  rows="5" placeholder="Resumo mais detalhado sobre o seu projeto" required></textarea>
							</div>
						</div>
				        <div class = "col-sm-6"> 
							<div class="form-group">
								<label for="vagas" >Número de vagas disponíveis</label>
								<input type="number" name="vagas" value="0" min="0" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="cursos" >Curso</label><br>
								<select class="selectpicker" name="cursos[]" multiple data-min-options="1" data-width="100%" required>
			  					<?php 
			  					include("database.php");
								$sql = "SELECT Curso FROM cursos;";
								$cursos = $conn->query($sql);
							    while($curso = $cursos->fetch_assoc()){
							    	echo "<option>" . $curso["Curso"] . "</option>";
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
					<button type="submit" class="btn btn-primary pull-right">
						<span class="glyphicon glyphicon-thumbs-up"></span>
						Confirmar
					</button>
				</div>
			</form>
		</div>
	</body>
	<?php include("footer.php") ?>
</html>
