<?php
	session_start();
	include_once("../seguranca.php");
	include_once("../conexao.php");

	$id = $_POST["id"];
	$nf = $_POST["num_nf"];

        $valor = strip_tags(trim($_POST["txtValor"]));
        $fixo = strip_tags(trim($_POST['txtValor']));
        $ponto = preg_replace("/[.]/" , "" , $fixo);
        $valor = preg_replace("/(\D)/i" , "." , $ponto);

    $datavenc = $_POST["data_venc"];
    $idsocio = $_POST["id_socio"];

    if($idsocio!=null) {

        $sql = "UPDATE faturamento SET  id='$id', n_nota_fiscal = '$nf', valor ='$valor', 
            id_aprovacao =$idsocio, data_vencimento= '$datavenc',modified=NOW() WHERE id='$id'";

        $result = $pdo->prepare($sql);

        $result->execute();

        $resultado2 = $pdo->prepare("select id_ficha_apropriacao from faturamento where id = '$id'");
        $resultado2->execute();
        $result2 = $resultado2->fetch(PDO::FETCH_ASSOC);
        $idfa = $result2['id_ficha_apropriacao'];


                if($result) {

                    echo "
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=23&id=$idfa&idAlert=3'>
                    ";
                }else{

                    echo "
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=23&id=$idfa'>
                    <script type=\"text/javascript\">
                        alert (\"Faturamento não foi atualizado.\");
                    </script>
        
        
                ";
                }


    }else{

        $sql = "UPDATE faturamento SET  id='$id', n_nota_fiscal = '$nf', valor ='$valor', 
             data_vencimento= '$datavenc',modified=NOW() WHERE id='$id'";

        $result = $pdo->prepare($sql);

        $result->execute();

        $resultado2 = $pdo->prepare("select id_ficha_apropriacao from faturamento where id = '$id'");
        $resultado2->execute();
        $result2 = $resultado2->fetch(PDO::FETCH_ASSOC);
        $idfa = $result2['id_ficha_apropriacao'];


                if($result) {

                    echo "
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=23&id=$idfa&idAlert=3'>
                    ";
                }else{

                    echo "
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=23&id=$idfa'>
                    <script type=\"text/javascript\">
                        alert (\"Faturamento não foi atualizado.\");
                    </script>
        
        
                ";
                }


            }

	
?>