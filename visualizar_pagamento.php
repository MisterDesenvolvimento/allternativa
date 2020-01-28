<?php
    include_once("menu_job.php");

    error_reporting(E_ERROR | E_PARSE);

    $id_fa = $_GET['id'];
    $idAlert = $_GET['idAlert'];


    $resultado = $pdo->prepare("SELECT id , id_prestador_servico, n_cheque, 
        date_format(vencimento,'%d/%m/%Y') as date, servico, valor, id_aprovacao, id_ficha_apropriacao, 
        date_format(created,'%d/%m/%Y')  as date_created, id_tipo_pagamento, data_realizacao_servico, data_pagamento_realizado,
        	cachet, inss, irrf, agenciamento, desconto, data_geracao_recibo
        FROM pagamentos WHERE id = '$id_fa' LIMIT 1");

    $resultado->execute();
    $result = $resultado->fetch(PDO::FETCH_ASSOC);
    $id2 = $result['id'];
    $id3 = $result['id_prestador_servico'];
    $id4 = $result['id_aprovacao'];
    $id5 = $result['id_ficha_apropriacao'];
    $id6 = $result['id_tipo_pagamento'];
    $idDTrecibo = $result['data_geracao_recibo'];
    $id66 = $result['n_cheque'];

    $resultado2 = $pdo->prepare("SELECT fa.id as id_fa, fa.id_cliente, cl.id, cl.cliente as cliente
                       
                        FROM ficha_apropriacao fa INNER JOIN clientes cl ON fa.id_cliente = cl.id 
                        WHERE fa.id = '$id5' LIMIT 1");

    $resultado2->execute();
    $result2 = $resultado2->fetch(PDO::FETCH_ASSOC);
    $id10=$result2['id_cliente'];


    $resultado3 = $pdo->prepare("SELECT id , nome                        
         FROM prestadores_servicos  
          WHERE id = '$id3'");
    $resultado3->execute();
    $result3 = $resultado3->fetch(PDO::FETCH_ASSOC);


    $resultado4 = $pdo->prepare("SELECT id , nome
      FROM usuarios
      WHERE id = '$id4'");
    $resultado4->execute();
    $result4 = $resultado4->fetch(PDO::FETCH_ASSOC);

    $resultado5 = $pdo->prepare("SELECT *
           FROM tipo_pagamento
           WHERE id = '$id6'");
    $resultado5->execute();
    $result5 = $resultado5->fetch(PDO::FETCH_ASSOC);

    $resultado30 = $pdo->prepare("select recibo from pagamentos where id = '$id2'");
    $resultado30->execute();
    $result30 = $resultado30->fetch(PDO::FETCH_ASSOC);
    $nomeRecibo = $result30['recibo'];

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');


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
                     Command: toastr[\"success\"](\"Pagamento cadastrado com sucesso!\")
                     
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
                         Command: toastr[\"success\"](\"Pagamento editado com sucesso!\")
                    </script>
                   ";
    }
    if ($idAlert==5){
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
                         Command: toastr[\"success\"](\"Dados adicionados, pronto para gerar o recibo!\")
                    </script>
                   ";

    }
    if ($idAlert==6){
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
                        
                         Command: toastr[\"success\"](\"Recibo editado com sucesso!\")
                    </script>
                   
                   ";
}

    if ($idAlert==8){
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
                            
                             Command: toastr[\"success\"](\"Prestador de Serviço editado com sucesso!\")                             
                             
                        </script>                   
                       
                       ";
    }

?>

<div class="container" >
          <h1 id = "tables">Pagamento</h1>

            <div class="form-group">
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="3" face="Verdana">Cliente: <?php echo $result2['cliente']; ?> </font></div>
                <div class = "col-xs-1 col-sm-1 col-md-8"><font size="3" face="Verdana">Ficha Apropriação Nº: <?php echo $result2['id_fa']; ?> </font></div>
            </div>

            <div class="form-group">
                <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Prestador de serviço: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result3['nome']; ?></font></div>

                <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Data Vencimento: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['date']; ?></font></div>
                <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Serviço prestado: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['servico']; ?></font></div>
                <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Valor: </font><font size="3" face="Verdana" color="#2F4F4F">R$ <?php echo number_format($result['valor'],2,",","."); ?></font></div>
                <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Aprovação: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result4['nome']; ?></font></div>
                <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Data inclusão sistema: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['date_created']; ?></font></div>
                <?php
                    if ($id66 != null){  ?>

                <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Tipo pagamento: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result5['tipo_pagamento']; ?></font></div>
                <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Nº do documento: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['n_cheque']; ?></font></div>
                <?php

                } else {}

                ?>

               <?php

               if($idDTrecibo != null){  ?>
               <br>

               <div id="flip"><font size="3" face="Verdana" color="#8a2be2">( + ) Visualizar Dados do Recibo</font></div>
                <div id="panel">

                <h3>Dados do recibo gerado:</h3>
                <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Data Realização do serviço: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo  strftime(' %d de %B de %Y', strtotime($result['data_realizacao_servico'])); ?></font></div>
                    <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Data Pagamento realizado: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo strftime(' %d de %B de %Y', strtotime($result['data_pagamento_realizado'])); ?></font></div>
                    <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Cachet: R$ </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['cachet']; ?></font></div>
                    <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">INSS: R$ </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['inss']; ?></font></div>
                    <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">IRRF: R$ </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['irrf']; ?></font></div>
                    <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Agenciamento: R$ </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['agenciamento']; ?></font></div>
                    <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Desconto: R$ </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['desconto']; ?></font></div>
                    <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Data do recibo gerado: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['data_geracao_recibo']; ?></font></div>
                </div>
                <?php
               }else{}
               ?>
            </div>
    <div class="col-12">

           <a href = 'job.php?link=31&id=<?php echo $id2; ?>'>
               <button type = 'button' class = 'btn btn-warning  btn-sm'><span class="fas fa-edit"></span> </button>
           </a>
           <a href = 'job.php?link=17&id=<?php echo $result2['id_fa']; ?>&idAlert=1'>
               <button type = 'button' class = 'btn btn-info  btn-sm'>Voltar pagamentos</button>
           </a>
           <a href = 'job.php?link=8&id=<?php echo $id5; ?>&idAlert=1'>
               <button type = 'button' class = 'btn btn-danger2  btn-sm' >Voltar Ficha Apropriação</button>
            </a><br><br>

     </div>
        <div class="col-12" style="background: lightgrey">
            <br>
            <a href = 'job.php?link=32&id=<?php echo $id3; ?>&id_pag=<?php echo $id2; ?>'>
                <button type = 'button' class = 'btn btn-danger2  btn-sm' style="background-color: #8B7355">Ver dados bancários</button>
            </a>
            <br><br>
        </div>

    <br>

        <div class="col-12" style="background: lightgrey">
            <br>
            <h2>Recibo do Pagamento</h2>
            <?php
            $resultado100 = $pdo->prepare("SELECT cachet
            FROM pagamentos WHERE id = '$id_fa' ");
            $resultado100->execute();
            $result100 = $resultado100->fetch(PDO::FETCH_ASSOC);
            $opa = $result100['cachet'];
            if($opa ==null){ ?>
                <button type = 'button' class = 'btn btn-danger3  btn-sm' data-toggle="modal" data-target="#myModal" style="background: #696969">Dados recibo</button>
             <?php   }else{ ?>
                <button type = 'button' class = 'btn btn-danger3  btn-sm' name="geradorRecibo" id="geradorRecibo"> Gerar Recibo</button>
                <a href = 'job.php?link=34&id=<?php echo $id2; ?>'>
                    <button type = 'button' class = 'btn btn-warning  btn-sm' style="background: #afb42b"><span class="fas fa-edit"></span> </button>
                </a>




            <?php  } ?>
            <br><br>
        </div>


    <!-- modal relatorio -->
    <div class="modal fade" id="modal-relatorio" style="display: none;" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-relatorio-titulo">Processando recibo</h4>
                </div>
                <div class="modal-body text-center" id="modal-relatorio-texto">
                    <p><img class="loading-image1" src="imagens/loader.gif" style="height: 50px;"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Fechar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../js/valida.js"></script>
    <script src="../js/menu.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.fileDownload/1.4.2/jquery.fileDownload.js" type="text/javascript"></script>

    <script type="text/javascript">

        async function abreModal(){
            $("div").html("<img src='imagens/loader.gif'>");
        }

        async function downloadArquivo(link){
            let termina = $.fileDownload(link);
            let outro = await termina;
        }


        function Recibo(reciboSel, idPagamento, idPrestador, idCliente) {
            this.idPagamento = idPagamento;
            this.idPrestador = idPrestador;
            this.idCliente = idCliente;
        }

        function downloadRelatorio(urlDownload) {
            var nomeArquivo = urlDownload.split('/');;
            $.ajax({
                url: urlDownload,
                method: 'GET',
                xhrFields: {
                    responseType: 'blob'
                },
                success: function (data) {
                    var a = document.createElement('a');
                    var url = window.URL.createObjectURL(data);
                    a.href = url;
                    a.download = nomeArquivo[1];
                    a.click();
                    window.URL.revokeObjectURL(url);
                }
            });
        }


        $("#geradorRecibo").click(function(){


            var idPag = "<?php print $id2; ?>";
            var idPres = "<?php print $id3; ?>";
            var idCli = "<?php print $id10; ?>";

            //grava no objeto relatorio para envio no ajax
            var recibo = new Recibo("geradorRecibo", idPag, idPres, idCli);


            $('#modal-relatorio-titulo').html('Processando recibo');
            $('#modal-relatorio-texto').html('<img class="loading-image1" src="imagens/loader.gif" style="height: 50px;">');
            $('#modal-relatorio').modal('show');

            //aqui começa o ajax =]
            $.ajax({
                url: 'reciboPrestador.php',
                type: 'POST',
                data: recibo,
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                success: function (res_success) {
                    //chega aqui se foi sucesso
                    console.log(res_success);
                    var result = res_success.split('/');
                    if(result[0] != "reciboPrestador"){
                        downloadRelatorio(res_success);
                        $('#modal-relatorio').modal('hide');

                    }else{
                        $('#modal-relatorio-texto').html(res_success);
                    }

                },
                error: function (result) {
                    //chega aqui se foi erro
                    console.log(result);
                    $('#modal-relatorio-texto').html(result);
                }
            });
        });


    </script>







    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Inserir dados para recibo</h4>
                </div>

                <div class="modal-body">

                    <div>
                        <form method = "POST" action = "processa/processa_gerar_recibo.php">
                            <fieldset>
                                <div class = "form-group row">
                                    <INPUT TYPE="hidden" NAME="id_pag" VALUE="<?php echo "$id2" ?>">

                                    <div class = "col-sm-6">
                                        <label for="inputDtServ3"><font size="2" face="Verdana">Data realizacao serviço</font></label>

                                        <input type = "date" name = "data_realizacao_servico" class = "form-control" id = "inputDtServ3"
                                               placeholder = "Data realização do serviço">
                                    </div>

                                    <div class = "col-sm-6">
                                        <label for="inputDtPg3"><font size="2" face="Verdana">Data realizacao Pagamento</font></label>

                                        <input type = "date" name = "data_realizacao_pagamento" class = "form-control" id = "inputDtPg3"
                                               placeholder = "Data realização do pagamento">
                                    </div>

                                    <div class = "col-sm-6">
                                        <input type = "text" name = "cachet" onKeyUp="moeda(this);" class = "form-control" id = "inputCachet3"
                                               placeholder = "Cachet">
                                    </div>

                                    <div class = "col-sm-6">
                                        <input type = "text" name = "inss" class = "form-control" onKeyUp="moeda(this);" id = "inputInss3"
                                               placeholder = "INSS 11%">
                                    </div>

                                    <div class = "col-sm-6">
                                        <input type = "text" name = "irrf" class = "form-control" onKeyUp="moeda(this);" id = "inputIrrf3"
                                               placeholder = "IRRF">
                                    </div>
                                    <div class = "col-sm-6">
                                        <input type = "text" name = "agenciamento" class = "form-control" onKeyUp="moeda(this);" id = "inputAgenciamento3"
                                               placeholder = "Agenciamento">
                                    </div>
                                    <div class = "col-sm-6">
                                        <input type = "text" name = "desconto" class = "form-control" onKeyUp="moeda(this);" id = "inputDesconto3"
                                               placeholder = "Desconto">
                                    </div>
                                </div><br>
                                <div class = "form-group row">
                                    <div class = "col-sm-10">
                                        <button type = "submit" class = "btn btn-success btn-sm">Cadastrar</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
    <!--/*comprovante anexo*/ -->
        <div class="col-12" style="background: lightgrey">
            <br>
            <h2>Comprovante de Pagamento</h2>
            <?php
            $resultado300 = $pdo->prepare("select recibo from pagamentos where id = '$id2'");
            $resultado300->execute();
            $result300 = $resultado300->fetch(PDO::FETCH_ASSOC);
            $nomeRecibo0 = $result300['recibo'];
print_r($nomeRecibo);
            if($nomeRecibo0 !=null){ ?>

            <div class="col-4" >
                      <a><img src="recibos/<?php echo $nomeRecibo; ?>" style=" max-width:200px;
                max-height:150px;
                width: auto;
                height: auto;" /> </a>
            </div>
            <?php   }else{  ?>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?link=28&id=<?php echo "$id2"; ?>&idAlert=1" method="post" enctype="multipart/form-data" name="cadastro" >
                Selecione o recibo para anexar:<br>
                <input type="file" name="arquivo" /><br><br>
                <input type="submit" value="Anexar comprovante" name="cadastrar"  class = 'btn btn-danger3  btn-sm'>
            </form>

            <?php   } ?>
            <br> <br>
    </div>

    <br><br>
</div>
<!--javascript para gerar o recibo-->
    <script type="text/javascript">


        $(document).ready(function(){

        var idPag = "<?php print $id2; ?>";
        var idPres = "<?php print $id3; ?>";
        var idCli = "<?php print $id10; ?>";

        $("#recibo").click(function(){

        var link = document.createElement('a');
        link.href = "reciboPrestador.php?idPrestador="+idPres+"&idPag="+idPag+"&idCli="+idCli;


        document.body.appendChild(link);

        link.click();

        document.body.removeChild(link);
        });
            });

    </script>

<!--código da validação do anexo-->
<?php
if (isset($_POST['cadastrar'])) {

    // Recupera os dados dos campos

    $foto = $_FILES["arquivo"];

    // Se a foto estiver sido selecionada
    if (!empty($foto["name"])) {

        // Largura máxima em pixels
        $largura = 1500000;
        // Altura máxima em pixels
        $altura = 1800000;
        // Tamanho máximo do arquivo em bytes
        $tamanho = 10000000;

        $error = array();

        // Verifica se o arquivo é uma imagem
        if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
            $error[1] = "Isso não é uma imagem.";
        }

        // Pega as dimensões da imagem
        $dimensoes = getimagesize($foto["tmp_name"]);

        // Verifica se a largura da imagem é maior que a largura permitida
        if($dimensoes[0] > $largura) {
            $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
        }

        // Verifica se a altura da imagem é maior que a altura permitida
        if($dimensoes[1] > $altura) {
            $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
        }

        // Verifica se o tamanho da imagem é maior que o tamanho permitido
        if($foto["size"] > $tamanho) {
            $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
        }

        // Se não houver nenhum erro
        if (count($error) == 0) {

            // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

            // Gera um nome único para a imagem
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

            // Caminho de onde ficará a imagem
            $caminho_imagem = "recibos/" . $nome_imagem;

            // Faz o upload da imagem para seu respectivo caminho
            move_uploaded_file($foto["tmp_name"], $caminho_imagem);

            // Insere os dados no banco
            $resultado20 = $pdo->prepare("UPDATE pagamentos SET recibo = '$nome_imagem' WHERE id = '$id2' ");
            $resultado20->execute();


            // Se os dados forem inseridos com sucesso
            if ($resultado20){
                echo "Você foi cadastrado com sucesso.";
            }
        }

        // Se houver mensagens de erro, exibe-as
        if (count($error) != 0) {
            foreach ($error as $erro) {
                echo $erro . "<br />";
            }
        }
    }
}
?>

