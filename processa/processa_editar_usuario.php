<?php
	session_start();
	include_once("../seguranca.php");
	include_once("../conexao.php");

	$id = $_POST["id"];
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$login = $_POST["usuario"];
	$senha = $_POST["senha"];
	$nivel_de_acesso = $_POST["nivel_de_acesso"];



	$sql = "UPDATE usuarios SET  nome='$nome', email='$email', login='$login', senha='$senha', nivel_acesso_id='$nivel_de_acesso', modified=NOW() WHERE id='$id'";
    

	 $result = $pdo->prepare($sql);

	$result->execute();

	if($result) {

		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../administrativo.php?link=2&id'>
			<script type=\"text/javascript\">
				alert (\"Usuário atualizado com sucesso.\");
			</script>


		";
	}else{

		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../administrativo.php?link=2&id'>
			<script type=\"text/javascript\">
				alert (\"Usuário não foi atualizado\");
			</script>


		";


	}


	
?>