<!DOCTYPE html>
<html>
	<?php 
	session_start();
	if($_GET['type'] == 'UPDATE' && $_SESSION['user'] == '') {
		include("header.php");
		include("invalidSession.php");
		include("footer.php");
		exit(1);
	}
	?>
	<body>
		<div class="container">
			<?php
			include("database.php");
			//debug
			$nome = $_POST["nome"];
			$email = $_POST["email"];
			$passwd = $_POST["passwd"];
			$passwdconf = $_POST["passwd-conf"];
			if( $passwd != $passwdconf ){
				echo "As senhas não batem!";
			}
			$descr = $_POST["descr"];
			$cursos = $_POST["cursos"];
			if($_GET['type'] == 'UPDATE'){
				$sql = "SET @cod := '" . $_SESSION["user_id"] . "';";
				$sql.= "UPDATE professor SET Nome = '"  . $nome ."', User = '" . $email. "', Senha ='" . $passwd ."' , Descricao = '" . $descr ."' WHERE Cod_Prof= @cod;";
				$sql.= "DELETE FROM Prof_Curso WHERE Cod_Prof = @cod;";
				foreach ($cursos as $key => $curso) {
					$sql.= "INSERT INTO Prof_Curso VALUES (@cod, (SELECT Cod_Curso FROM cursos WHERE Curso = '" . $curso . "'));";
				}
				if ($conn->multi_query($sql)){
				    header("Location: /painel.php");
	    			$conn->close();
	    			exit();
				}else{
				    echo "Multi query failed: (" . $conn->errno . ") " . $conn->error;
				}
			}else{
				$sql = "INSERT INTO professor (Nome, User, Senha, Descricao) VALUES ( '". $nome . "','" . $email . "','". $passwd . "','" . $descr ."');";
				$sql.= "SET @cod := LAST_INSERT_ID();";
				foreach ($cursos as $key => $curso) {
					$sql.= "INSERT INTO Prof_Curso VALUES (@cod, (SELECT Cod_Curso FROM cursos WHERE Curso = '" . $curso . "'));";
				}
				if ($conn->multi_query($sql)){
				    header("Location: /painel.php");
	    			$conn->close();
	    			exit();
				}else{
				    echo "Multi query failed: (" . $conn->errno . ") " . $conn->error;
				}
			}
			//TODO Ainda falta salvar TAGS e imagem!
			$conn->close();
			?>
		</div>
	</body>
</html>