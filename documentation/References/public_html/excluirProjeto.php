<?php
$id=$_GET["id"];
session_start();
if($_SESSION['user_id'] == '') {
	echo "INVALID SESSION!";
	exit(1);
}
include("database.php");
$Cod_Prof = $_SESSION['user_id'];
$sql = "SELECT * from  Prof_Proj WHERE Cod_Proj='" . $id . "' AND Cod_Prof='" . $Cod_Prof . "' ;";
if($conn->query($sql)->num_rows == 1){
	$sql = "DELETE from  projetos WHERE Cod_Proj='" . $id . "';";
	echo "Este projeto e seu!";
	if($conn->query($sql)){
		$conn->close();
		header("Location: painel.php");
		exit;
	}else{
		echo "Não consigo deletar este projeto!";
	}
}else{
	echo "Este projeto nao existe, ou nao e seu!";
}
$conn->close();
?>