<?php
    include_once("menu_job.php");
?>
<?php
    $id = $_GET['id'];
    //Executa a consulta
    
    $resultado = $pdo->prepare("SELECT fa.id as id_fa, fa.titulo, date_format(fa.data,'%d/%m/%Y') as data_cadastro, cl.id as clid,
                cl.cliente, date_format(fa.modified,'%d/%m/%Y') as modificado 
                FROM ficha_apropriacao fa INNER JOIN clientes cl ON fa.id_cliente = cl.id 
                WHERE fa.id = '$id' LIMIT 1");
    $resultado->execute();
    $result = $resultado->fetch(PDO::FETCH_ASSOC);

    $resultado2 = $pdo->prepare("SELECT id, produto, direcao, duracao, id_ficha_cliente, modified 
                    FROM descricao 
                    WHERE id_ficha_cliente = '$id' LIMIT 1");
    $resultado2->execute();
    $result2 = $resultado2->fetch(PDO::FETCH_ASSOC);

    $iddesc = $result2['id'];

    $resultado3 = $pdo->prepare("SELECT id, n_nota_fiscal, data_vencimento, valor, id_ficha_apropriacao, modified 
                        FROM faturamento 
                        WHERE id_ficha_apropriacao = '$id' LIMIT 1");
    $resultado3->execute();
    $result3 = $resultado3->fetch(PDO::FETCH_ASSOC);

    $idfat = $result3['id'];



?>



<div class="container">




    <div class = "col-lg-12" >

            <div class = "page-header">
                <h1 id = "tables">Ficha de apropriação</h1>
            </div>
            <br>
        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Código: <?php echo $result['id_fa']; ?></font></div>
        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Título: <?php echo $result['titulo']; ?></font></div>
        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Data de cadastro: <?php echo $result['data_cadastro']; ?></font></div>
        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Cliente: <?php echo $result['cliente']; ?></font></div>
           <br>

        <div class = "page-header">
            <h1 id = "tables">Descrição</h1>
        </div>


        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Produto: <?php echo $result2['produto']; ?> </font></div><br>
        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Direção: <?php echo $result2['direcao']; ?> </font></div><br>
        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Duração: <?php echo $result2['duracao']; ?> </font></div><br>

        <div class = "page-header">
            <h1 id = "tables">Faturamento</h1>
        </div>
        <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Número Nota Fiscal: <?php echo $result['n_nota_fiscal']; ?></font></div>
        <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Data Vencimento: <?php echo $result['date']; ?></font></div>
        <div class = "col-xs-9 col-sm- col-md-11"></div>
        <br>
        <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Valor: R$ <?php echo $result['valor']; ?></font></div>
        <br>



        <div class = "page-header">
            <h1 id = "tables">Ficha Técnica</h1>
        </div>

        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Ilha / Editor: <?php echo $result['ilha_editor']; ?> </font></div>
        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Data: <?php echo $result['data']; ?> </font></div>
        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Locação: <?php echo $result['locacao']; ?> </font></div>









        <div class = "pull-right">
                <a href = 'job.php?link=9&id=<?php echo $result['id_fa']; ?>'>
                    <button type = 'button' class = 'btn btn-warning  btn-sm'><span class="fas fa-edit"></span> </button>
                </a>

                <a href = 'processa/processa_apagar_ficha_apropriacao.php?id=<?php echo $result['id_fa']; ?>'>
                    <button type = 'button' onclick="myFunction()" class = 'btn btn-danger  btn-sm'><i class="fas fa-eraser"></i></button>
                </a>



                <a href = 'job.php?link=5&id_cli=<?php echo $result['clid']; ?>'>
                    <button type = 'button' class = 'btn btn-danger2  btn-sm'>Voltar Ficha Cliente</button>
                </a>
            </div>
            <br>
    </div>





<script src="js/pushy.min.js"></script>


</div>

