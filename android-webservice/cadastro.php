<?php
include_once("../conexao.php");

$nome = iconv("UTF-8", "Windows-1252", $_POST['nome']);
$email = iconv("UTF-8", "Windows-1252", $_POST['email']);
$senha = iconv("UTF-8", "Windows-1252", $_POST['senha']);
/*
$nome = "Fulano da Silva";
$email = "fulano@gmail.com";
$senha = "123456";
*/

$senhaSha = hash('sha256', $senha);

$buscaUser = $conexao->query("SELECT * FROM usuarios WHERE email='$email'");
if ($buscaUser->num_rows == 0){
	$conexao->query("INSERT INTO usuarios(nome,email,senha) VALUES('".$nome."','".$email."','".$senhaSha."')");
	$return[]=array(
		"cadastro" => true,
	);
}
else{
	$return[]=array(
		"cadastro" => false,
		"motivo" => utf8_encode ("Email já cadastrado!"),
	);
}

echo json_encode($return, JSON_UNESCAPED_UNICODE);


?>