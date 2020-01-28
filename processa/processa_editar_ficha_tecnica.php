<?php
	session_start();
	include_once("../seguranca.php");
	include_once("../conexao.php");

    $ilha = $_POST["ilha"];
    $data = $_POST["data"];
    $locacao = $_POST["locacao"];
    $diretor = $_POST["diretor"];
    $assisdirecao = $_POST["assisdirecao"];
    $produtor = $_POST["produtor"];
    $dirfotografia = $_POST["dirfotografia"];
    $fotografo = $_POST["fotografo"];
    $priassistente = $_POST["priassistente"];
    $eletricista = $_POST["eletricista"];
    $priassiseletrica = $_POST["priassiseletrica"];
    $segassiseletrica = $_POST["segassiseletrica"];
    $dirarte = $_POST["dirarte"];
    $assisarte = $_POST["assisarte"];
    $figurinista = $_POST["figurinista"];
    $prodlocacao = $_POST["prodlocacao"];
    $prodelenco = $_POST["prodelenco"];
    $maquiador = $_POST["maquiador"];
    $tecsom = $_POST["tecsom"];
    $assisaudio = $_POST["assisaudio"];
    $logger = $_POST["logger"];
    $contraregra = $_POST["contraregra"];
    $cenografo = $_POST["cenografo"];
    $id_fa = $_POST["id_fa"];
    $id_ft= $_POST["id_ft"];


    $sql = "UPDATE ficha_tecnica  SET data='$data', ilha_editor='$ilha', locacao='$locacao', diretor='$diretor', assistente_direcao='$assisdirecao', 
                  produtor='$produtor', diretor_fotografia='$dirfotografia', fotografo='$fotografo', pri_assistente='$priassistente' ,eletricista='$eletricista' , 
                  pri_ass_eletrica='$priassiseletrica',seg_ass_eletrica='$segassiseletrica' , dir_arte='$dirarte', ass_arte='$assisarte', figurinista='$figurinista', 
                  prod_locacao='$prodlocacao', prod_elenco='$prodelenco', maquiador='$maquiador', tec_som= '$tecsom', ass_audio='$assisaudio', logger='$logger', 
                  contra_regra='$contraregra', cenografo='$cenografo', id_ficha_apropriacao='$id_fa', modified=NOW()  WHERE id='$id_ft'";



    $result = $pdo->prepare($sql);
    $result->execute();

	if($result) {

		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=26&id=$id_fa&idAlert=3'>
			";
	}else{

		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=26&id=$id_fa'>
			<script type=\"text/javascript\">
				alert (\"Ficha não foi atualizada.\");
			</script>

		";


	}


?>