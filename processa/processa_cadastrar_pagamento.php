<?php
    session_start();
    include_once("../seguranca.php");
    include_once("../conexao.php");

    $id_pres = $_POST["id_prestador"];
    $vencimento = $_POST["vencimento"];
    $servico = $_POST["servico"];

    $id_sem_aprovacao  = $_POST["id_sem_aprovacao"];


    $valor = strip_tags(trim($_POST["valor"]));
    $fixo = strip_tags(trim($_POST['valor']));
    $ponto = preg_replace("/[.]/" , "" , $fixo);
    $valor = preg_replace("/(\D)/i" , "." , $ponto);



    $idfa = $_POST["id_fa"];


    $sql = "INSERT INTO pagamentos (id_prestador_servico, vencimento, servico, valor, id_aprovacao,  
            id_ficha_apropriacao, created) VALUES 
            ('$id_pres',  '$vencimento','$servico','$valor', $id_sem_aprovacao, '$idfa', NOW())";

    $result = $pdo->prepare($sql);
    $result->execute();

    $sql2 = "SELECT id, id_ficha_apropriacao FROM pagamentos WHERE id_ficha_apropriacao = $idfa ORDER BY created DESC LIMIT 1";
    $result2 = $pdo->prepare($sql2);
    $result2->execute();
    $result3 =  $result2->fetch(PDO::FETCH_ASSOC);
    $idpag2 = $result3['id'];


    if($result) {
        echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=28&id=$idpag2&idAlert=0'>
               
            ";
    }else{
        echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=28&id=$idpag2'>
                <script type=\"text/javascript\">
                    alert (\"Pagamento não foi adicionado.\");
                </script>
            ";
    }

    ?>