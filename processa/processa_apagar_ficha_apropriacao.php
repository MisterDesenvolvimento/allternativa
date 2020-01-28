<?php
	session_start();
	include_once("../seguranca.php");
	include_once("../conexao.php");
	
	$id = $_GET["id"];

    $sql3 = "SELECT id_cliente FROM ficha_apropriacao  WHERE id='$id'";

    $result3 = $pdo->prepare($sql3);

    $result3->execute();

    $resultado = $result3->fetch(PDO::FETCH_ASSOC);

    $id2 = $resultado['id_cliente'];




$sql = "DELETE FROM ficha_apropriacao  WHERE id='$id'";

	$result = $pdo->prepare($sql);

	$result->execute();



	if ($result) {
		
		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT = '0;URL = ../job.php?link=5&id_cli=$id2&idAlert=5'>
			";
		} else {
		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT = '0;URL = ../job.php?link=5&id_cli=$id'>
			<script type = \"text/javascript\">
				alert (\"Ficha não foi apagada\");
			</script>";
		}
