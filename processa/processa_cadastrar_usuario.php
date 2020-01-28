<?php
	session_start();
	include_once("../seguranca.php");
	include_once("../conexao.php");

	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$login = $_POST["usuario"];
	$senha = $_POST["senha"];
	$nivel_de_acesso = $_POST["nivel_de_acesso"];

	$sql = "INSERT INTO usuarios (nome, email, login, senha, nivel_acesso_id, created) VALUES ('$nome','$email','$login','$senha','$nivel_de_acesso', NOW())";

	 $result = $pdo->prepare($sql);

	$result->execute();

	if($result) {

		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../administrativo.php?link=2&id'>
			<script type=\"text/javascript\">
				alert (\"Usuário cadastrado com sucesso.\");
			</script>


		";
	}else{

		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://../administrativo.php?link=2&id'>
			<script type=\"text/javascript\">
				alert (\"Usuário não foi cadastrado\");
			</script>


		";
	}
?>