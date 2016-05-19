<!DOCTYPE html>
<html>
	<?php $cabecalho_title="Checkout";?>
	<body>
		<div class="container">
			<?php
			include("header.php");
			include("database.php");
			session_start();
			if($_SESSION['user'] == '') {
				include("invalidSession.php");
				include("footer.php");
				exit(1);
			}
			$email = $_SESSION['user'];
			$sql = "SELECT * from  professor WHERE User='" . $email . "';";
			$userinfo= $conn->query($sql);							
			if($userinfo->num_rows > 0){
				$userinfo = $userinfo->fetch_object();
			}
			//debug
			echo "<table>";
			foreach ($_POST as $key => $value) {
			    echo "<tr>";
			    echo "<td>";
			    echo $key;
			    echo "</td>";
			    echo "<td>";
			    echo $value;
			    echo "</td>";
			    echo "</tr>";
			}
			echo "</table>";

			$titulo = $_POST["titulo"];
			$descr = $_POST["descr"];
			$imagem = $_POST["imagem"];
			$resumo = $_POST["resumo"];
			$vagas = $_POST["vagas"];
			$cursos = $_POST["cursos"];

			foreach ($cursos as $key => $curso) {
				echo "'" . $curso . "'<br>";
			}

			if($_GET['type'] == 'UPDATE'){
				$sql= "SET @cod := '" . $_GET["id"] . "';";
				$sql.= "UPDATE projetos SET Titulo='" . $titulo . "', Descricao='" . $descr . "', Resumo='". $resumo . "', Vagas='"  . $vagas . "' WHERE Cod_Proj = @cod;";
				$sql.= "DELETE FROM Proj_Curso WHERE Cod_Proj = @cod;";
				foreach ($cursos as $key => $curso) {
					$sql.= "INSERT INTO Proj_Curso VALUES (@cod, (SELECT Cod_Curso FROM cursos WHERE Curso = '" . $curso . "'));";
				}
				if ($conn->multi_query($sql)){
				    header("Location: /painel.php");
	    			$conn->close();
	    			exit();
				}else{
				    echo "Multi query failed: (" . $conn->errno . ") " . $conn->error;
				    exit();
				}
				$conn->close();
			    exit();
			}else{
				$sql = "INSERT INTO projetos (Titulo, Descricao, Resumo, Vagas) 
						VALUES ( '" . $titulo . "','" . $descr . "','" . $resumo . "','" . $vagas . "');";
				$sql.= "SET @cod := LAST_INSERT_ID();";
				$sql.= "INSERT INTO Prof_Proj VALUES ( '" . $userinfo->Cod_Prof . "', @cod );";
				foreach ($cursos as $key => $curso) {
					$sql.= "INSERT INTO Proj_Curso VALUES (@cod, (SELECT Cod_Curso FROM cursos WHERE Curso = '" . $curso . "'));";
				}
				//TODO Ainda falta salvar TAGS e imagem!
				
				if ($conn->multi_query($sql)){
				    header("Location: /painel.php");
	    			$conn->close();
	    			exit();
				}else{
				    echo "Multi query failed: (" . $conn->errno . ") " . $conn->error;
				    exit();
				}
			}
			$conn->close();
			?>
		</div>
	</body>
</html>