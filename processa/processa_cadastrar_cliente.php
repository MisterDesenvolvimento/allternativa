<?php
	session_start();
	include_once("../seguranca.php");
	include_once("../conexao.php");
	
	
	$cliente = $_POST["cliente"];
	$agencia = $_POST["agencia"];
	$email = $_POST["email"];
	$telefone = $_POST["telefone"];
	$situacao = $_POST["situacao"];
	$contatoAgencia = $_POST["contatoAgencia"];
	
	$sql = "INSERT INTO clientes (cliente, agencia, email, telefone, created, situacao_id, contato_agencia) 
          VALUES ('$cliente','$agencia','$email','$telefone', NOW(), '$situacao', '$contatoAgencia')";
	
	$result = $pdo->prepare($sql);
	
	$result->execute();

	$resultado = $pdo->prepare("SELECT id FROM clientes WHERE cliente = '$cliente' LIMIT 1");
	
	$resultado->execute();

	
	$resultado2 = $resultado->fetch(PDO::FETCH_ASSOC);

	$id2 = $resultado2['id'];

	
	if ($result) {
		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT = '0;URL = ../job.php?link=5&id_cli=$id2&idAlert=0'>
			";
	} else {
		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT = '0;URL = ../job.php?link=5&id_cli=$id2'>
			<script type = \"text/javascript\">
				alert (\"Cliente não foi cadastrado\");
			</script>";
	}

	?>