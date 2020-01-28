<?php
	session_start();
	include_once("../seguranca.php");
	include_once("../conexao.php");
	
	$id = $_GET["id_cli"];
	
	$sql = "DELETE FROM clientes  WHERE id='$id'";
	
	$result = $pdo->prepare($sql);
	
	$result->execute();
	
	if ($result) {
		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT = '0;URL = ../job.php?link=2&id_cli=$id&idAlert=1'>
			<script type = \"text/javascript\">
				
			</script>";
	} else {
		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT = '0;URL=../job.php?link=2&id_cli=$id'>
			<script type=\"text/javascript\">
				alert (\"Cliente não foi apagado\");
			</script>";
	}