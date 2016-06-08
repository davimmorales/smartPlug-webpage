<?php
include_once("../conexao.php");

$email = iconv("UTF-8", "Windows-1252", $_POST['email']);
$senha = iconv("UTF-8", "Windows-1252", $_POST['senha']);
$senhaSha = hash('sha256', $senha);

$buscaUser = $conexao->query("SELECT * FROM usuarios WHERE email='$email' AND senha='$senhaSha'");
if ($buscaUser->num_rows == 0){
		$return[]=array(
		"achou" => false,
		"motivo" => utf8_encode ("Email não cadastrado ou senha incorreta."),
	);
}
else{
	
}

echo json_encode($return, JSON_UNESCAPED_UNICODE);


?>