<?php
	session_start();
	include_once("../seguranca.php");
	include_once("../conexao.php");
    $idUser = $_SESSION['usuarioID'];



	$idPG = $_POST["id"];
	$id_fa = $_POST["id_fa"];
	$TPPG = $_POST["tipo_pg"];
	$documento = $_POST["cheque"];
	$idPrestador = $_POST["id_prestador"];
	$servico = $_POST["servico"];
    $valor = $_POST["valor"];

    $valor = strip_tags(trim($_POST["valor"]));
    $fixo = strip_tags(trim($_POST['valor']));
    $ponto = preg_replace("/[.]/" , "" , $fixo);
    $valor = preg_replace("/(\D)/i" , "." , $ponto);

    $datavenc = $_POST["vencimento"];

    if($idUser=="62" || $idUser=="71" || $idUser=="64" || $idUser=="63"  ) {

        if($TPPG!=null && $documento!=null) {


            $idsocio = $_POST["socio"];

            $sql = "UPDATE pagamentos SET  id_prestador_servico='$idPrestador', n_cheque = '$documento', vencimento= '$datavenc',
            servico = '$servico',valor ='$valor', id_aprovacao = '$idsocio', modified=NOW(), id_tipo_pagamento=$TPPG WHERE id='$idPG'";

            $result = $pdo->prepare($sql);

            $result->execute();

        }else {

            $idsocio = $_POST["socio"];

            $sql = "UPDATE pagamentos SET  id_prestador_servico='$idPrestador',  vencimento= '$datavenc',
            servico = '$servico',valor ='$valor', id_aprovacao = '$idsocio', modified=NOW() WHERE id='$idPG'";

            $result = $pdo->prepare($sql);

            $result->execute();



        }


    }else{

        if($TPPG!=null && $documento!=null) {

            $sql = "UPDATE pagamentos SET  id_prestador_servico='$idPrestador', n_cheque = '$documento', vencimento= '$datavenc',
                servico = '$servico',valor ='$valor',  modified=NOW(), id_tipo_pagamento=$TPPG WHERE id='$idPG'";

            $result = $pdo->prepare($sql);

            $result->execute();
        }else{

            $sql = "UPDATE pagamentos SET  id_prestador_servico='$idPrestador',  vencimento= '$datavenc',
                servico = '$servico',valor ='$valor',  modified=NOW() WHERE id='$idPG'";

            $result = $pdo->prepare($sql);

            $result->execute();

        }

    }






	if($result) {

		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=28&id=$idPG&idAlert=3'>
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