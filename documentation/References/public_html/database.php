<?php
// INSERTING INTO DATABASE!
	$servername = "mysql.hostinger.com.br";
	$dbname = "u660936402_lweb";
	$username = "u660936402_admin";
	$password = "rrZhlJnNk6";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		// echo "Impossível comunicar com o banco de dados mysql!";
	}else{
		//debug
		// echo "Conectado com servidor mysql!";
	}
?>