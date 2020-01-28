<?php
	session_start();
	include_once("../seguranca.php");
	include_once("../conexao.php");
	
	$id = $_GET["id"];


	$sql = "DELETE *  FROM descricao  WHERE id_ficha_cliente='$id'";
	$result = $pdo->prepare($sql);
	$result->execute();

	
	if ($result) {
		
		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT = '0;URL = ../job.php?link=8&id_cli=$idfa'>
			<script type = \"text/javascript\">
				alert (\"Ficha apagada com sucesso.\");
			</script>";
		} else {
		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT = '0;URL = ../job.php?link=8&id_cli=$idfa'>
			<script type = \"text/javascript\">
				alert (\"Ficha não foi apagada\");
			</script>";
		}
