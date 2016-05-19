<!DOCTYPE html>
<html lang="pt-br">
	<?php $cabecalho_title="Cadastrar Professor";
	include("header.php"); ?>
	<body>
		<div class="container">
			<form class="panel panel-default" id="formProjeto" method="post" action="checkout-Professor.php">
				<div class="panel-heading">
					<h2 class="panel-title">Cadastro de Usuário</h2>
				</div>
				<div class="panel-body">
					<div class="row">
				        <div class = "col-sm-6"> 
							<div class="form-group">
								<label for="nome">Nome completo</label>
								<input type="text" name="nome" class="form-control" placeholder="Exemplo: Prof. Dr. Fulando da silva" required>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" class="form-control" placeholder="Exemplo: fulano.silva@unifesp.br" required>
							</div>
							<div class="form-group">
								<label for="passwd">Senha</label>
								<input type="password" name="passwd" class="form-control" required>	
							</div>
							<div class="form-group">
								<label for="passwd-conf">Confirmação da seha</label>
								<input type="password" name="passwd-conf" class="form-control" required>	
							</div>
						</div>
				        <div class = "col-sm-6"> 
							<div class="form-group">
								<label for="imagem">Imagem</label>
								<input id="input-1" name="imagem" type="file" class="file" multiple="false" data-show-upload="false">
							</div>
							<div class="form-group">
								<label for="descr">Descrição</label>
								<textarea class="form-control" name="descr" rows="2" placeholder="Descrição rápida sobre sua formação, linhas de pesquisa, e etc." required></textarea>
							</div>
							<div class="form-group">
								<label for="cursos" >Curso</label><br>
								<select class="selectpicker" name="cursos[]" multiple data-min-options="1" data-width="100%" required>
			  					<?php 
			  					$id = $_GET["id"];
								$sql = "SELECT Curso FROM cursos;";
								$cursos = $conn->query($sql);
							    while($curso = $cursos->fetch_assoc()){
							    	echo "<option>" . $curso["Curso"] . "</option>";
							    }
			  					?>
								</select>
							</div>
						</div>
					</div>
					<button type="submit" id="submit" class="btn btn-primary pull-right">
						<span class="glyphicon glyphicon-thumbs-up"></span>
						Confirmar
					</button>
				</div>
			</form>
		</div>
	</body>
	<?php include("footer.php") ?>
</html>
