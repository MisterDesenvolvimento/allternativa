<?php
	session_start();
	include_once("../seguranca.php");
	include_once("../conexao.php");

	$id = $_POST["id"];
	$produto = $_POST["produto"];
    $direcao = $_POST["direcao"];
    $duracao = $_POST["duracao"];


$sql = "UPDATE descricao SET  produto='$produto', direcao = '$direcao', duracao ='$duracao',modified=NOW() WHERE id='$id'";
	
	$result = $pdo->prepare($sql);

	$result->execute();

	$sql2 = "SELECT * FROM descricao WHERE id = '$id'  ";
	$result2 = $pdo->prepare($sql2);
	$result2->execute();
	$result3 = $result2->fetch(PDO::FETCH_ASSOC);
	$id2 = $result3['id_ficha_cliente'];


	if($result) {

		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=18&id=$id2&idAlert=3'>
			";
	}else{

		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=18&id=$id2'>
			<script type=\"text/javascript\">
				alert (\"Descrição não foi atualizada.\");
			</script>


		";


	}


	
?>