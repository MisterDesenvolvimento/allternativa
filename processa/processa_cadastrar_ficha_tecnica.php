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
    $assproducao = $_POST["ass_producao"];
    $dirfotografia = $_POST["dirfotografia"];
    $fotografo = $_POST["fotografo"];
    $priassistente = $_POST["priassistente"];
    $segassistente = $_POST["segassistente"];
    $eletricista = $_POST["eletricista"];
    $priassiseletrica = $_POST["priassiseletrica"];
    $segassiseletrica = $_POST["segassiseletrica"];
    $maquinista = $_POST["maquinista"];
    $dirarte = $_POST["dirarte"];
    $assisarte = $_POST["assisarte"];
    $figurinista = $_POST["figurinista"];
    $assfigurino = $_POST["assfigurino"];
    $prodlocacao = $_POST["prodlocacao"];
    $prodelenco = $_POST["prodelenco"];
    $maquiador = $_POST["maquiador"];
    $camareira = $_POST["camareira"];
    $tecsom = $_POST["tecsom"];
    $assisaudio = $_POST["assisaudio"];
    $logger = $_POST["logger"];
    $catering = $_POST["catering"];
    $camera1 = $_POST["camera1"];
    $camera2 = $_POST["camera2"];
    $contraregra = $_POST["contraregra"];
    $cenografo = $_POST["cenografo"];
    $transporte = $_POST["transporte"];

    $id_fa = $_POST["id_fa"];


	$sql = "INSERT INTO ficha_tecnica (data, ilha_editor, locacao, diretor, assistente_direcao, produtor, ass_producao, diretor_fotografia, 
          fotografo, pri_assistente ,seg_assistente, eletricista , pri_ass_eletrica,seg_ass_eletrica , maquinista, dir_arte, ass_arte, 
          figurinista, ass_figurino, prod_locacao, prod_elenco, maquiador, camareira, tec_som, ass_audio, logger, catering,  
          camera1, camera2, contra_regra, cenografo, transporte, id_ficha_apropriacao, created) 
           VALUES ('$data','$ilha','$locacao','$diretor','$assisdirecao', '$produtor' ,'$assproducao','$dirfotografia', '$fotografo', 
           '$priassistente', '$segassistente', '$eletricista', '$priassiseletrica', '$segassiseletrica', '$maquinista','$dirarte',
            '$assisarte','$figurinista', '$assfigurino','$prodlocacao', '$prodelenco', '$maquiador','$camareira',
           '$tecsom' , '$assisaudio', '$logger', '$catering', '$camera1', '$camera2','$contraregra', '$cenografo', '$transporte', '$id_fa', NOW() )";
	
	$result = $pdo->prepare($sql);
	
	$result->execute();

	$resultado = $pdo->prepare("SELECT id, id_ficha_apropriacao FROM ficha_tecnica WHERE id_ficha_apropriacao = '$id_fa' LIMIT 1");
	
	$resultado->execute();
	
	$resultado2 = $resultado->fetch(PDO::FETCH_ASSOC);

	$id2 = $resultado2['id'];

	
	if ($result) {
		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT = '0;URL = ../job.php?link=26&id=$id_fa&idAlert=0'>
			";
	} else {
		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT = '0;URL = ../job.php?link=26&id=$id_fa'>
			<script type = \"text/javascript\">
				alert (\"Ficha técnica não foi cadastrada.\");
			</script>";
	}

	?>