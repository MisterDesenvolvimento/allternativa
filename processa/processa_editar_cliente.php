<?php
    session_start();
    include_once("../seguranca.php");
    include_once("../conexao.php");
    
    $id = $_POST["id_cli"];
    $cliente = $_POST["cliente"];
    $agencia = $_POST["agencia"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $contatoAgencia = $_POST["contatoAgencia"];
    
    
    $sql = "UPDATE clientes SET  cliente='$cliente', agencia='$agencia', email='$email', telefone='$telefone', modified=NOW(), contato_agencia='$contatoAgencia' WHERE id='$id'";
    
    $result = $pdo->prepare($sql);
    
    $result->execute();
    
    if ($result) {
        
        $resultado = $pdo->prepare("SELECT * FROM clientes WHERE id = '$id' LIMIT 1");
        
        $resultado->execute();
        
        $resultado2 = $resultado->fetch(PDO::FETCH_ASSOC);
        
        echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT = \"0;URL =../job.php?link=5&id_cli=$id&idAlert=3  \">";

	} else {
        echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT = \"0;URL = ../job.php?link=5&id_cli=$id  \">
			<script type = \"text/javascript\">
				alert (\"Cliente não foi atualizado\");
			</script>";
    }