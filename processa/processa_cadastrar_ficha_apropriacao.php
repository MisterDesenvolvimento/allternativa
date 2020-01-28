<?php
	session_start();
	include_once("../seguranca.php");
	include_once("../conexao.php");

	$titulo = $_POST["titulo"];
	$data = $_POST["data"];
	$id_cliente = $_POST["id_cliente"];

	$sql = "INSERT INTO ficha_apropriacao (titulo, data, id_cliente, created) VALUES ('$titulo','$data', '$id_cliente',NOW())";
	$result = $pdo->prepare($sql);
	$result->execute();

    $resultado = $pdo->prepare("SELECT id FROM ficha_apropriacao WHERE titulo = '$titulo' LIMIT 1");
    $resultado->execute();
    $resultado2 = $resultado->fetch(PDO::FETCH_ASSOC);

    $id2 = $resultado2['id'];


	if($result) {

		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=8&id=$id2&idAlert=0'>
			
		";
	}else{

		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=8&id=$id2'>
			
			</script>


		";


	}





	
?>