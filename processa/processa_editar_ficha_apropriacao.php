<?php
	session_start();
	include_once("../seguranca.php");
	include_once("../conexao.php");

	$id = $_POST["id"];
	$titulo = $_POST["titulo"];
    $data = $_POST['data'];

	$sql = "UPDATE ficha_apropriacao SET  titulo='$titulo', data='$data', modified=NOW() WHERE id='$id'";
	
	$result = $pdo->prepare($sql);

	$result->execute();

	if($result) {

		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=8&id=$id&idAlert=3'>
			";
	}else{

		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=8&id=$id'>
			<script type=\"text/javascript\">
				alert (\"Ficha não foi atualizada.\");
			</script>


		";


	}


	
?>