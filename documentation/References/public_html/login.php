<!DOCTYPE html>
<html lang="pt-br">
	<?php 
		$cabecalho_title="Login";
		include("header.php");
	?>
	<body>
		<div class="wrapper">
			<link rel="stylesheet" href="css/login.css">
			<div class="container">
				<div class="row">
					<div class = "col-md-4 col-sm-6"> 
						<form class="form-signin" role="form" method="post" action="checkout-login.php">
							<h2 class="form-signin-heading">Fazer login</h2>
							<label for="inputEmail">Email</label>
							<input type="email" id="inputEmail" name="email" class="form-control" placeholder="fulano@unifesp.br" required autofocus="">
							<label for="inputPassword">Senha</label>
							<input type="password" id="inputPassword" name="passwd" class="form-control" placeholder="" required>
							<!-- Implementar!!!!!!!!!!!!!!!!!!!!!!!!!!1 -->
							<!-- <a href="#">Perdi a minha senha!</a> -->
							<div class="checkbox">
								<label>
									<input type="checkbox" value="remember-me"> Lembrar-me
								</label>
							</div>
							<div class="btn-group btn-group-justified" role="group" aria-label="..." width="100%">
								<div class="btn-group" role="group">
									<button type="button" onclick="location.href='cadastrarProfessor.php'" class="btn btn-primary" >Registrar</button>
								</div>
								<div class="btn-group" role="group">
									<button type="submit" class="btn btn-primary " type="submit">Fazer login</button>
								</div>
							</div>
						</form>
					</div>
					<div class = "col-md-8 col-sm-6"> 
						<h2>Quem pode fazer login?</h2>
						<p>Apenas os professores e pesquisadores têm acesso ao sistema. Eles são responsáveis por apresentar seus projetos e anunciar vagas de iniciação científica, bolsas de extensão, entre outros.</p>
					</div>
				</div>
			</div>
			<div class="push"></div>
		</div>
	</body>
	<?php include("footer.php") ?>
</html>
