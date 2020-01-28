<?php
    include_once("menu_job.php");
?>

<?php
    $id_fa = $_GET['id'];
    $idAlert = $_GET['idAlert'];
    
    $resultado = $pdo->prepare("SELECT  id, data, ilha_editor, locacao, diretor, assistente_direcao, produtor, 
    ass_producao, diretor_fotografia, fotografo, pri_assistente, seg_assistente, eletricista, pri_ass_eletrica, seg_ass_eletrica,
     maquinista, dir_arte, ass_arte, figurinista, ass_figurino, prod_locacao, prod_elenco, maquiador, camareira, tec_som, 
     ass_audio, logger, catering, camera1, camera2, contra_regra, cenografo, transporte, id_ficha_apropriacao
        FROM ficha_tecnica WHERE id_ficha_apropriacao = '$id_fa' LIMIT 1");

    $resultado->execute();
    $result = $resultado->fetch(PDO::FETCH_ASSOC);


    $resultado2 = $pdo->prepare("SELECT fa.id as id_fa, fa.titulo, date_format(fa.data,'%d/%m/%Y') as data_cadastro, 
                    cl.cliente, date_format(fa.modified,'%d/%m/%Y') as modificado 
                    FROM ficha_apropriacao fa INNER JOIN clientes cl ON fa.id_cliente = cl.id 
                    WHERE fa.id = '$id_fa' LIMIT 1");

    $resultado2->execute();
    $result2 = $resultado2->fetch(PDO::FETCH_ASSOC);

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
                        
                        
                         Command: toastr[\"success\"](\"Ficha Técnica criada com sucesso!\")
                         
                         
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
                         Command: toastr[\"success\"](\"Ficha Técnica editada com sucesso!\")
                    </script>
                   ";
}


?>

<div class="container" >
    <br>
        <div class = "col-lg-12" >
            <div class = "page-header">
                <h1 id = "tables">Ficha Técnica</h1>
            </div>

            <div class="form-group">
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="3" face="Verdana">Cliente: <?php echo $result2['cliente']; ?> </font></div>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="3" face="Verdana">Ficha Apropriação Nº: <?php echo $result2['id_fa']; ?> </font></div><br>
            </div>



                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Ilha / Editor: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['ilha_editor']; ?> </font></div>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Data: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['data']; ?> </font></div>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Locação: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['locacao']; ?> </font></div>
<br>
            <div id="flip"><font size="4" face="Verdana" color="#8a2be2">( + ) Visualizar Informações Externa</font></div>

            <div id="panel">
                <?php
                if($result['diretor'] == null) {

                 }else { ?>

                    <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Diretor : </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['diretor']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['assistente_direcao'] != null) {  ?>

                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Assistente de direção: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['assistente_direcao']; ?> </font></div>
                <?php } else {} ?>
                <?php
                if($result['produtor'] != null) {  ?>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Produtor: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['produtor']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['ass_producao'] != null) {  ?>
                    <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Assistente de producão: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['ass_producao']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['diretor_fotografia'] != null) {  ?>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Diretor de Fotografia: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['diretor_fotografia']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['fotografo'] != null) {  ?>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Fotógrafo: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['fotografo']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['pri_assistente'] != null) {  ?>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">1º Assistente: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['pri_assistente']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['seg_assistente'] != null) {  ?>
                    <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">2º Assistente: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['seg_assistente']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['eletricista'] != null) {  ?>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Eletricista : </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['eletricista']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['pri_ass_eletrica'] != null) {  ?>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">1º Assistente Elétrica: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['pri_ass_eletrica']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['seg_ass_eletrica'] != null) {  ?>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">2º Assistente Elétrica: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['seg_ass_eletrica']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['maquinista'] != null) {  ?>
                    <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Maquinista: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['maquinista']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['dir_arte'] != null) {  ?>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Diretor de arte : </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['dir_arte']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['ass_arte'] != null) {  ?>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Assistente arte: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['ass_arte']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['figurinista'] != null) {  ?>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Figurinista: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['figurinista']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['ass_figurino'] != null) {  ?>
                    <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Assistente de figurino: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['ass_figurino']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['prod_locacao'] != null) {  ?>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Produtor Locação : </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['prod_locacao']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['prod_elenco'] != null) {  ?>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Produtor Elenco: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['prod_elenco']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['maquiador'] != null) {  ?>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Maquiador: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['maquiador']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['camareira'] != null) {  ?>
                    <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Camareira: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['camareira']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['tec_som'] != null) {  ?>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Técnico de Som : </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['tec_som']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['ass_audio'] != null) {  ?>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Assistente de Áudio: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['ass_audio']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['logger'] != null) {  ?>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Logger: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['logger']; ?> </font></div>
                <?php } ?>

                <?php
                if($result['catering'] != null) {  ?>
                    <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Catering: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['catering']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['camera1'] != null) {  ?>
                    <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Camera 1: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['camera1']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['camera2'] != null) {  ?>
                    <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Camera 2: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['camera2']; ?> </font></div>
                <?php } ?>

                <?php
                if($result['contra_regra'] != null) {  ?>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Contra Regra: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['contra_regra']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['cenografo'] != null) {  ?>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Cenógrafo: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['cenografo']; ?> </font></div>
                <?php } ?>
                <?php
                if($result['transporte'] != null) {  ?>
                    <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Transporte: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['transporte']; ?> </font></div>
                <?php } ?>
            </div>
        </div>

            <br>
            <div class = "pull-right">

                <a href = 'job.php?link=27&id=<?php echo $id_fa; ?>'>
                    <button type = 'button' class = 'btn btn-warning  btn-sm'><span class="fas fa-edit"></span> </button>
                </a>


                <a href = 'job.php?link=8&id=<?php echo $result2['id_fa']; ?>&idAlert=1'>
                    <button type = 'button' class = 'btn btn-danger2  btn-sm'>Voltar Ficha Apropriação</button>
                </a>
            </div>
         <br>

    </div>
</div>
   
