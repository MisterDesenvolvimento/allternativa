<?php
    include_once("menu_job.php");
?>

<?php
    $id_fa = $_GET['id'];
    $idAlert  = $_GET['idAlert'];
    $resultado = $pdo->prepare("SELECT des.id as id_des, des.produto, des.direcao, des.duracao, des.id_ficha_cliente, 
        date_format(des.modified,'%d/%m/%Y') as modificado 
        FROM descricao des WHERE des.id_ficha_cliente = '$id_fa' LIMIT 1");

    $resultado->execute();
    $result = $resultado->fetch(PDO::FETCH_ASSOC);

    $id = $result['id_ficha_cliente'];
    $id2 = $result['id_des'];


    $resultado2 = $pdo->prepare("SELECT fa.id as id_fa, fa.titulo, date_format(fa.data,'%d/%m/%Y') as data_cadastro, 
                    cl.cliente, cl.agencia, date_format(fa.modified,'%d/%m/%Y') as modificado 
                    FROM ficha_apropriacao fa INNER JOIN clientes cl ON fa.id_cliente = cl.id 
                    WHERE fa.id = '$id' LIMIT 1");

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
                            
                             Command: toastr[\"success\"](\"Descrição criada com sucesso!\")                     
                             
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
                            
                             Command: toastr[\"success\"](\"Descrição editada com sucesso!\")                     
                             
                        </script>    
                       
                       ";
}

?>



<div class="container" >
    <br>
        <div class = "col-lg-12" >
            <div class = "page-header">
                <h1 id = "tables">Descrição</h1>
            </div>
            <div class="form-group">
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="3" face="Verdana">Nome do Cliente:
                        <?php
                        echo $result2['cliente'];
                        ?></font>
                </div>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="3" face="Verdana">Agência:
                        <?php
                        echo $result2['agencia'];
                        ?></font>
                </div>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="3" face="Verdana">Título :
                        <?php
                        echo $result2['titulo'];
                        ?></font>
                </div>
            </div>


            <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Produto: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['produto']; ?> </font></div>
            <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Direção: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['direcao']; ?> </font></div>
            <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Duração: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['duracao']; ?> </font></div><br>


            <div class = "pull-right">

                <a href = 'job.php?link=19&id=<?php echo $id2; ?>'>
                    <button type = 'button' class = 'btn btn-warning  btn-sm'><span class="fas fa-edit"></span> </button>
                </a>


                <a href = 'job.php?link=8&id=<?php echo $id_fa; ?>&idAlert=1'>
                    <button type = 'button' class = 'btn btn-danger2  btn-sm'>Voltar Ficha Apropriação</button>
                </a>
            </div>
         <br>

    </div>
</div>
   
