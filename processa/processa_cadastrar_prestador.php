<?php
	session_start();
	include_once("../seguranca.php");
	include_once("../conexao.php");
	
	
	$prestador_nome = $_POST["prestador_nome"];
	$documento = $_POST["documento"];
    $banco = $_POST["banco"];
    $agencia = $_POST["agencia"];
    $conta = $_POST["conta"];
    $id_fa = $_POST['id_fa'];

	
	$sql = "INSERT INTO prestadores_servicos (nome, documento, banco, agencia, conta) 
            VALUES ('$prestador_nome','$documento', '$banco', '$agencia','$conta')";
	
	$result = $pdo->prepare($sql);
	
	$result->execute();



	
	if ($result) {
		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT = '0;URL = ../job.php?link=17&id=$id_fa&idAlert=4'>
			";
	} else {
		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT = '0;URL =../job.php?link=17&id=$id_fa'>
			<script type = \"text/javascript\">
				alert (\"Prestador não foi cadastrado\");
			</script>";
	}

	?>