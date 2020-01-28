<?php
    include_once("menu_job.php");

    $id_fa = $_GET['id'];
    $idAlert = $_GET['idAlert'];
    
    $resultado = $pdo->prepare("SELECT id , n_nota_fiscal, date_format(data_vencimento,'%d/%m/%Y') as date, valor, id_aprovacao, id_ficha_apropriacao, 
        date_format(created,'%d/%m/%Y')  
        FROM faturamento WHERE id_ficha_apropriacao = '$id_fa' LIMIT 1");

    $resultado->execute();
    $result = $resultado->fetch(PDO::FETCH_ASSOC);
    $id2 = $result['id'];
    $idsocio = $result['id_aprovacao'];

    $resultado4 = $pdo->prepare("SELECT id, nome FROM usuarios WHERE id ='$idsocio '");
    $resultado4->execute();
    $result4 = $resultado4->fetch(PDO::FETCH_ASSOC);
    $nomesocio = $result4['nome'];

    $resultado2 = $pdo->prepare("SELECT fa.id as id_fa, fa.id_cliente, cl.id, cl.cliente as cliente
                       
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
                            
                             Command: toastr[\"success\"](\"Faturamento cadastrado com sucesso!\")                     
                             
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
                                
                  Command: toastr[\"success\"](\"Faturamento editado com sucesso!\")                     
                                 
             </script>    
                           
         ";
}

if ($idAlert==4){
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
                                
                  Command: toastr[\"info\"](\"Status aprovação alterado!\")                     
                                 
             </script>    
                           
         ";
    }


?>

<div class="container" >


        <div class = "col-lg-12" >
            <div class = "page-header">
                <h1 id = "tables">Faturamento</h1>
            </div>

            <div class="form-group">
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="3" face="Verdana">Cliente: <?php echo $result2['cliente']; ?> </font></div>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="3" face="Verdana">Ficha Apropriação Nº: <?php echo $result2['id_fa']; ?> </font></div>
            </div>
                <br>
            <div class="form-group">
                <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Nº Nota Fiscal: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['n_nota_fiscal']; ?></font></div>
                <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Data Vencimento: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['date']; ?></font></div>
                <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Valor: </font><font size="3" face="Verdana" color="#2F4F4F">R$ <?php echo number_format($result['valor'],2,",","."); ?></font></div>
                    <?php

                        if($idsocio==73 || $idsocio==null){ ?>
                        <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana" color="#8b0000">Sem aprovação </font></div>
                    <?php
                         }else{ ?>
                            <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Aprovado por:  </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result4['nome']; ?></font></div>
                        <?php   }

                           ?>





                        <br>
            </div>



                <a href = 'job.php?link=29&id=<?php echo $id2; ?>'>
                    <button type = 'button' class = 'btn btn-warning  btn-sm'><span class="fas fa-edit"></span> </button>
                </a>

                <a href = 'job.php?link=8&id=<?php echo $result2['id_fa']; ?>&idAlert=1'>
                    <button type = 'button' class = 'btn btn-danger2  btn-sm'>Voltar Ficha Apropriação</button>
                </a>

         <br>


  </div>

</div>

