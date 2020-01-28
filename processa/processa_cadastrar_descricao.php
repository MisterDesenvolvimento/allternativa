<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");

$produto = $_POST["produto"];
$direcao = $_POST["direcao"];
$duracao = $_POST["duracao"];
$idfa = $_POST["id_fa"];


$sql = "INSERT INTO descricao (produto, direcao, duracao, id_ficha_cliente, created) VALUES 
            ('$produto','$direcao','$duracao','$idfa', NOW())";
$result = $pdo->prepare($sql);
$result->execute();

$resultado = $pdo->prepare("SELECT id, id_ficha_cliente FROM descricao WHERE id_ficha_cliente = '$idfa' LIMIT 1");
$resultado->execute();
$resultado2 = $resultado->fetch(PDO::FETCH_ASSOC);

$id2 = $resultado2['id_ficha_cliente'];

if($result) {
    echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=18&id=$id2&idAlert=0'>
               
            ";
}else{
    echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../job.php?link=18&id=$id2'>
                <script type=\"text/javascript\">
                    alert (\"Descrição não foi criada.\");
                </script>
            ";
}

?>