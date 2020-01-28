<?php

//Tirar espaçoes em branco entre as variáveis
ob_start();

if (($_SESSION['usuarioID'] == "") || ($_SESSION['usuarioNome'] == "") || ($_SESSION['usuarioNivelAcesso'] == "") || ($_SESSION['usuarioLogin'] == "") || ($_SESSION['usuarioSenha'] == "")) {

	unset($_SESSION['usuarioID'], 
              $_SESSION['usuarioNome'], 
              $_SESSION['usuarioNivelAcesso'],
              $_SESSION['usuarioLogin'], 
              $_SESSION['usuarioSenha']);
	
	//Mensagem de erro
	$_SESSION['loginErro'] = "Área restrita para usuários cadastrados";

	//Manda o usuário para tela de login
	header("Location: login.php");
}

