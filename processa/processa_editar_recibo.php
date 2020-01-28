<?php
	session_start();
	include_once("../seguranca.php");
	include_once("../conexao.php");

	$idPG = $_POST["id_pag"];
	($idPG);
    $DTServico = $_POST["data_realizacao_servico"];
    $DTPag = $_POST["data_realizacao_pagamento"];

    $cachet = strip_tags(trim($_POST["cachet"]));
    $fixo = strip_tags(trim($_POST['cachet']));
    $ponto = preg_replace("/[.]/" , "" , $fixo);
    $cachet = preg_replace("/(\D)/i" , "." , $ponto);

    $inss = strip_tags(trim($_POST["inss"]));
    $fixo = strip_tags(trim($_POST['inss']));
    $ponto = preg_replace("/[.]/" , "" , $fixo);
    $inss = preg_replace("/(\D)/i" , "." , $ponto);

    $irrf = strip_tags(trim($_POST["irrf"]));
    $fixo = strip_tags(trim($_POST['irrf']));
    $ponto = preg_replace("/[.]/" , "" , $fixo);
    $irrf = preg_replace("/(\D)/i" , "." , $ponto);

    $agenciamento = strip_tags(trim($_POST["agenciamento"]));
    $fixo = strip_tags(trim($_POST['agenciamento']));
    $ponto = preg_replace("/[.]/" , "" , $fixo);
    $agenciamento = preg_replace("/(\D)/i" , "." , $ponto);


    $desconto = strip_tags(trim($_POST["desconto"]));
    $fixo = strip_tags(trim($_POST['desconto']));
    $ponto = preg_replace("/[.]/" , "" , $fixo);
    $desconto = preg_replace("/(\D)/i" , "." , $ponto);




    $sql = "UPDATE pagamentos SET  data_realizacao_servico='$DTServico', data_pagamento_realizado = '$DTPag', cachet= '$cachet',
        inss = '$inss',irrf ='$irrf', agenciamento = '$agenciamento', desconto=$desconto, data_geracao_recibo=NOW()  WHERE id='$idPG'";
	
	$result = $pdo->prepare($sql);

	$result->execute();

	if($result) {

		echo "

    <script>location.href='../job.php?link=28&id=$idPG&idAlert=6'</script>


		
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