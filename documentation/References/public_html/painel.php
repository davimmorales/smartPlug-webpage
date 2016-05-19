<!DOCTYPE html>
<html lang="pt-br">
	<?php $cabecalho_title="Painel do Professor";
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
	$sql = "SELECT * FROM projetos WHERE Cod_Proj IN (SELECT Cod_Proj FROM Prof_Proj WHERE Cod_Prof = '" . $userinfo->Cod_Prof . "')";
	$result = $conn->query($sql);	
	$conn->close();						
	?>
	
	<body>
		<div class="container">
			<div class="row">
				<div class = "col-lg-4 col-md-12"> 
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Painel de usuário</h2>
						</div>
						<div class="panel-body">
							<div class="media">
							 	<div  class="pull-left" href="#">
								  <img class="media-object" data-src="holder.js/128x128" alt="Imagem do projeto">
								</div>
								<h4 class="media-heading"><?=$userinfo->Nome?></h4>
								<a href="editarProfessor.php" class="btn btn-primary btn-lg" style="width: 100%; margin-top: 20px;">
									<span class="glyphicon glyphicon-user"></span>
									Editar perfil
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class = "col-lg-8 col-md-12"> 
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Meus pojetos</h2>
						</div>
						<div class="panel-body">
							<?php
							while($row = $result->fetch_assoc()) {
								echo '<div class="media thumbnail content-link" tabindex="0">';
									echo '<div class="pull-left"><img class="media-object" data-src="holder.js/64x64" alt="..."></div>';
									echo '<div class="media-body">';
										echo '<h4 class="media-heading">' . $row["Titulo"]  . '</h4>';
										echo '<p>'. $row["Descricao"] . "</p>";
									    echo '<div class="btn-group pull-right" role="group" aria-label="...">
							    				<div class="btn-group" role="group">
													<a href="excluirProjeto.php?id=' . $row["Cod_Proj"] .  '" class="btn btn-danger" role="button">
														<!-- <span class="glyphicon glyphicon-remove"></span> -->
														Excluir Projeto
													</a>
												</div>
												<div class="btn-group" role="group">
													<a href="editarProjeto.php?id=' . $row["Cod_Proj"] . '" class="btn btn-primary" role="button">
														<!-- <span class="glyphicon glyphicon-edit"></span> -->
														Editar Projeto
													</a>
												</div>
												<div class="btn-group" role="group">
													<a href="projeto.php?id=' . $row["Cod_Proj"] . '"  class="btn btn-primary" role="button">
														<!-- <span class="glyphicon glyphicon-eye-open"> </span> -->
														Ver Página
													</a>
												</div>
											</div>
										</div>
									</div>';
						    }
						    ?>	
							<a href="cadastrarProjeto.php" class="btn btn-primary btn-lg" style="width: 100%">
								<span class="glyphicon glyphicon-plus"></span>
								Criar novo projeto
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<?php include("footer.php") ?>
</html>