<?php
    session_start();
    include_once("../seguranca.php");
    include_once("../conexao.php");

    $num_nf = $_POST["num_nf"];
    $data_venc = $_POST["data_venc"];





    $valor = strip_tags(trim($_POST["txtValor"]));
    $fixo = strip_tags(trim($_POST['txtValor']));
    $ponto = preg_replace("/[.]/" , "" , $fixo);
    $valor = preg_replace("/(\D)/i" , "." , $ponto);



    $idfa = $_POST["id_fa"];


    $sql = "INSERT INTO faturamento (n_nota_fiscal, data_vencimento, valor, id_ficha_apropriacao, created) VALUES 
            ('$num_nf','$data_venc','$valor','$idfa', NOW())";
    $result = $pdo->prepare($sql);
    $result->execute();



    if($result) {
        echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=23&id=$idfa&idAlert=0'>
               
            ";
    }else{
        echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=23&id=$idfa'>
                <script type=\"text/javascript\">
                    alert (\"Faturamento não foi criado.\");
                </script>
            ";
    }

    ?>