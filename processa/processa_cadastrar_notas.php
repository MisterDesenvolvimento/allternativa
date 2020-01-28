<?php
    session_start();
    include_once("../seguranca.php");
    include_once("../conexao.php");

    $mensagem = $_POST["mensagem"];
    $usuario = $_SESSION['usuarioID'];
    $idfa = $_POST["idfa"];


    $sql = "INSERT INTO notas_observacoes (id_usuario, mensagem, id_ficha_apropriacao, data) VALUES 
            ('$usuario','$mensagem','$idfa',NOW())";
    $result = $pdo->prepare($sql);
    $result->execute();



    if($result) {
        echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=16&id=$idfa&idAlert=0'>
               
            ";
    }else{
        echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=16&id=$idfa'>
                <script type=\"text/javascript\">
                    alert (\"Nota não foi criada.\");
                </script>
            ";
    }

    ?>