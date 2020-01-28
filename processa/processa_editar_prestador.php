<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");


$idPG = $_POST["id_pag"];
$idPrestador = $_POST["id_pre"];
$nome = $_POST["prestador_nome"];
$documento = $_POST["documento"];
$banco = $_POST["banco"];
$agencia = $_POST["agencia"];
$conta = $_POST["conta"];



$sql = "UPDATE prestadores_servicos SET  nome='$nome', documento = '$documento', banco= '$banco',
        agencia = '$agencia',conta ='$conta' WHERE id='$idPrestador'";

$result = $pdo->prepare($sql);

$result->execute();






if($result) {
    echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=28&id=$idPG&idAlert=8'>
			";
}else{

    echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=28&id=$idPG'>
			<script type=\"text/javascript\">
				alert (\"Pagamento não foi atualizado.\");
			</script>


		";


}



?>