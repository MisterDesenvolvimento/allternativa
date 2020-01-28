<?php
    include_once("menu_job.php");
?>
<?php
    $id = $_GET['id'];
    $idAlert = $_GET['idAlert'];
    //Executa a consulta
    
    $resultado = $pdo->prepare("SELECT fa.id as id_fa, fa.titulo, date_format(fa.data,'%d/%m/%Y') as data_cadastro, 
                cl.id as clid, cl.cliente, date_format(fa.modified,'%d/%m/%Y') as modificado 
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

    $resultado4 = $pdo->prepare("SELECT  id, id_ficha_apropriacao 
                        FROM ficha_tecnica 
                        WHERE id_ficha_apropriacao = '$id' LIMIT 1");
    $resultado4->execute();
    $result4 = $resultado4->fetch(PDO::FETCH_ASSOC);

    $idft = $result4['id'];


            if ($idAlert==0){
             echo  "
                
                <script type=\"text/javascript\">
                
                     toastr.options = {
                      \"closeButton\": false,
                      \"debug\": false,
                      \"newestOnTop\": false,
                      \"progressBar\": false,
                      \"positionClass\": \"toast-bottom-left\",
                      \"preventDuplicates\": false,
                      \"onclick\": null,
                      \"showDuration\": \"300\",
                      \"hideDuration\": \"1000\",
                      \"timeOut\": \"5000\",
                      \"extendedTimeOut\": \"1000\",
                      \"showEasing\": \"swing\",
                      \"hideEasing\": \"linear\",
                      \"showMethod\": \"fadeIn\",
                      \"hideMethod\": \"fadeOut\"
                    }                    
                    
                     Command: toastr[\"success\"](\"Ficha de Apropriação cadastrada com sucesso!\")                     
                     
                </script>    
               
               ";
            }
if ($idAlert==3){
    echo  "
                
                <script type=\"text/javascript\">
                
                     toastr.options = {
                      \"closeButton\": false,
                      \"debug\": false,
                      \"newestOnTop\": false,
                      \"progressBar\": false,
                      \"positionClass\": \"toast-bottom-left\",
                      \"preventDuplicates\": false,
                      \"onclick\": null,
                      \"showDuration\": \"300\",
                      \"hideDuration\": \"1000\",
                      \"timeOut\": \"5000\",
                      \"extendedTimeOut\": \"1000\",
                      \"showEasing\": \"swing\",
                      \"hideEasing\": \"linear\",
                      \"showMethod\": \"fadeIn\",
                      \"hideMethod\": \"fadeOut\"
                    }                    
                    
                     Command: toastr[\"success\"](\"Ficha de Apropriação editada com sucesso!\")                     
                     
                </script>    
               
               ";
}



?>

<script language="JavaScript" type="text/javascript">
    function checkDelete(){
        return confirm('Você tem certeza que deseja apagar definitivamente a ficha de apropriação?');
    }
</script>


<div class="container">

    <nav class="pushy pushy-left" data-focus="#first-link">
        <div class="pushy-content">
            <ul>
                <li class="pushy-submenu">
                    <button id="first-link" ><font size="4"> Descrição </font></button>
                    <ul>
                        <?php
                        if ($iddesc != 0){ ?>
                            <li class="pushy-link"><a href="job.php?link=18&id=<?php echo $id; ?>&idAlert=1"><font size="4">Visualizar</font> </a></li>

                        <?php } else { ?>
                            <li class="pushy-link"><a href="job.php?link=14&id=<?php echo $id; ?>"><font size="4">Nova Descrição</font></a></li>
                        <?php }  ?>
                    </ul>
                </li>
                <li class="pushy-submenu">
                    <button><font size="4">Faturamento </font></button>
                    <ul>
                        <?php
                        if ($idfat != 0){ ?>
                            <li class="pushy-link"><a href="job.php?link=23&id=<?php echo $result['id_fa']; ?>&idAlert=1"><font size="4">Visualizar </font></a></li>

                        <?php } else { ?>
                            <li class="pushy-link"><a href="job.php?link=15&id=<?php echo $result['id_fa']; ?>"><font size="4">Novo Faturamento</font></a></li>
                        <?php }  ?>
                    </ul>
                </li>
                <li class="pushy-link"><a href="job.php?link=16&id=<?php echo $result['id_fa']; ?>&idAlert=2">
                        <font size="4">Notas e Observações</font></a></li>

                <li class="pushy-link"><a href="job.php?link=17&id=<?php echo $result['id_fa']; ?>&idAlert=1">
                        <font size="4">Pagamentos</font></a></li>


                <li class="pushy-submenu">
                    <button><font size="4">Ficha Técnica</font></button>
                    <ul>
                        <?php
                        if ($idft != 0){ ?>
                            <li class="pushy-link"><a href="job.php?link=26&id=<?php echo $result['id_fa']; ?>&idAlert=1">
                                    <font size="4">Visualizar </font></a></li>
                        <?php } else { ?>
                            <li class="pushy-link"><a href="job.php?link=7&id=<?php echo $result['id_fa']; ?>">
                                    <font size="4">Nova Ficha Técnica</font></a></li>
                        <?php }  ?>
                    </ul>
                </li>
                <li  class="pushy-link"><a href="job.php?link=30">
                        <font size="4">Relatórios </font></a></li>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Site Overlay -->
    <div class="site-overlay"></div>

    <div class = "col-lg-12" >
        <div class="row">
            <div class="col-12" style="padding-top: 3px;">

                 <h1 id = "tables">Ficha de apropriação</h1>
            </div>
                <div class = "col-12">
                    <button class="menu-btn" >&#9776; Menu</button>
                </div>
        </div>

        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Código: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['id_fa']; ?></font></div>
            <br>
        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Título: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['titulo']; ?></font></div>
            <br>
        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Data de cadastro: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['data_cadastro']; ?></font></div>
            <br>
        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Cliente: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['cliente']; ?></font></div>
            <br>


            <div class = "pull-right">
                <a href = 'job.php?link=9&id=<?php echo $result['id_fa']; ?>'>
                    <button type = 'button' class = 'btn btn-warning  btn-sm'><span class="fas fa-edit"></span> </button>
                </a>

                <a href = 'processa/processa_apagar_ficha_apropriacao.php?id=<?php echo $id; ?>'>
                    <button type = 'button' onclick="return checkDelete()" class = 'btn btn-danger  btn-sm'><i class="fas fa-eraser"></i></button>
                </a>



                <a href = 'job.php?link=5&id_cli=<?php echo $result['clid']; ?>&idAlert=1'>
                    <button type = 'button' class = 'btn btn-danger2  btn-sm'>Voltar Ficha Cliente</button>
                </a>
            </div>
            <br>
    </div>





<script src="js/pushy.min.js"></script>


</div>

