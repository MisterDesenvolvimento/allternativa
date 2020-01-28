<?php
	session_start();
	
	include_once("seguranca.php");
	
	echo "Bem Vindo usuário " . $_SESSION['usuarioNome'];
?>

<br /> <a href = "sair.php"> Sair</a>