<!DOCTYPE html>
<html lang="pt-br">
	<?php
		$cabecalho_title="Editar Professor";
		include("header.php");
		session_start();
		if($_SESSION['user'] == '') {
			include("invalidSession.php");
			include("footer.php");
			exit(1);
		}
		$email = $_SESSION['user'];
		include("database.php");
		$sql = "SELECT * from  professor WHERE User='" . $email . "';";
		$userinfo= $conn->query($sql);							
		if($userinfo->num_rows > 0){
			$userinfo = $userinfo->fetch_object();
		}
	?>
	<body>
		<div class="container">
			<form class="panel panel-default" id="formProjeto" method="post" action="checkout-Professor.php?type=UPDATE">
				<div class="panel-heading">
					<h2 class="panel-title">Edição de Usuário</h2>
				</div>
				<div class="panel-body">
					<div class="row">
				        <div class = "col-sm-6"> 
							<div class="form-group">
								<label for="nome">Nome completo</label>
								<input type="text" name="nome" class="form-control" placeholder="Exemplo: Prof. Dr. Fulando da silva" value=<?='"' . $userinfo->Nome . '"'?> required>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" class="form-control" placeholder="Exemplo: fulano.silva@unifesp.br" value=<?='"' . $userinfo->User . '"'?>required>
							</div>
							<div class="form-group">
								<label for="passwd">Senha</label>
								<input type="password" name="passwd" class="form-control" value=<?='"' . $userinfo->Senha . '"'?> required>	
							</div>
							<div class="form-group">
								<label for="passwd-conf">Confirmação da seha</label>
								<input type="password" name="passwd-conf" class="form-control" value=<?='"' . $userinfo->Senha . '"'?> required>	
							</div>
						</div>
				        <div class = "col-sm-6"> 
							<div class="form-group">
								<label for="imagem">Imagem</label>
								<input id="input-1" name="imagem" type="file" class="file" multiple="false" data-show-upload="false">
							</div>
							<div class="form-group">
								<label for="descr">Descrição</label>
								<textarea class="form-control" name="descr" rows="2" placeholder="Descrição rápida sobre sua formação, linhas de pesquisa, e etc." required><?=$userinfo->Descricao?></textarea>
							</div>
							<div class="form-group">
								<label for="cursos" >Curso</label><br>
								<select class="selectpicker" name="cursos[]" multiple data-min-options="1" data-width="100%" required>
			  					<?php 
								$sql = "SELECT * FROM cursos NATURAL LEFT JOIN ( SELECT * from Prof_Curso WHERE Cod_Prof='" . $_SESSION["user_id"] . "' ) AUX";
								$cursos = $conn->query($sql);
							    while($curso = $cursos->fetch_assoc()){
							    	echo "<option";
									if ( $curso["Cod_Prof"] == $_SESSION["user_id"] )
							          echo ' selected ';
									echo ">" . $curso["Curso"];
							    	echo "</option>";
							    }
			  					?>
								</select>
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
