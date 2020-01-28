<?php
include_once("menu_job.php");

$id_fa = $_GET['id'];
$idAlert=  $_GET['idAlert'];

$resultado = $pdo->prepare("SELECT fa.id as id_fa, fa.titulo as titulofa, 
        date_format(fa.data,'%d/%m/%Y') as data_cadastro, cl.cliente as clientefa, date_format(fa.modified,'%d/%m/%Y') as modificado 
        FROM ficha_apropriacao fa INNER JOIN clientes cl ON fa.id_cliente = cl.id 
        WHERE fa.id = '$id_fa' LIMIT 1");

$resultado->execute();
$resultado2 = $resultado->fetch(PDO::FETCH_ASSOC);

$result = $pdo->prepare("SELECT p.id as pid, p.id_prestador_servico, p.n_cheque,
            date_format(p.vencimento,'%d/%m/%Y') , p.servico, p.valor, p.id_aprovacao, p.id_ficha_apropriacao, 
            p.modified , p.recibo, p.data_geracao_recibo, ps.nome as psnome, s.id as sid, s.nome as snome
            FROM pagamentos p  JOIN prestadores_servicos ps ON p.id_prestador_servico = ps.id
             JOIN usuarios s ON  p.id_aprovacao = s.id             
            WHERE p.id_ficha_apropriacao = '$id_fa' order by pid desc ");
$result->execute();

$result8 = $pdo->prepare("select * from pagamentos where id_ficha_apropriacao = $id_fa");
$result8->execute();
$result9 = $result8->fetch(PDO::FETCH_ASSOC);
$idpaf = $result9['id'];

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
                                        
                     Command: toastr[\"success\"](\"Prestador cadastrado com sucesso!\")                     
                     
                </script>
               ";
}
?>

<div class="container">
    <br>
    <h1 id = "tables">Pagamentos</h1>
    <div class="form-group">
        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="3" face="Verdana">Nome do Cliente:
                <?php
                echo $resultado2['clientefa'];
                ?>
            </font>
        </div>
        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="3" face="Verdana">Título da Ficha de Apropriação:
                <?php
                echo $resultado2['titulofa'];
                ?>
            </font>
        </div>
    </div>
    <br>
    <form method = "POST" action = "processa/processa_cadastrar_pagamento.php">

        <INPUT TYPE="hidden" NAME="id_fa" VALUE="<?php echo "$id_fa" ?>">
        <INPUT TYPE="hidden" NAME="id_sem_aprovacao" VALUE="<?php echo "73" ?>">


        <div class="form-row">

            <div class="form-group col-md-4">
                <label for="inputDoc3"><font size="4" face="Verdana">Prestador de Serviço</font></label>
                <select id="inputPrestador" name="id_prestador" class="form-control" style="background: #EEE9E9">
                    <option selected>Selecione ...</option>

                    <?php
                    $resultado3 = $pdo->prepare("SELECT id, nome 
                    FROM prestadores_servicos order by nome ");
                    $resultado3->execute();

                    while($linha = $resultado3->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $linha['id'] ?>"><?php echo $linha['nome'] ?></option>
                    <?php } ?>

                </select>
            </div>


            <div class="form-group col-md-2">
                <button type="button" class="btn btn-danger2  btn-sm" data-toggle="modal" data-target="#myModal">NOVO ( + )</button>
            </div>

            <div class="form-group col-md-5">
                <label for="inputServico3"><font size="4" face="Verdana">Serviço</font></label>

                <input type = "text" name = "servico" class = "form-control" id = "inputServico3" placeholder = "Serviço" style="background: #EEE9E9">

            </div>
        </div>

        <div class="form-row">

            <div class="form-group col-md-3">
                <label for="inputVenc3"><font size="4" face="Verdana">Vencimento</font></label>

                <input type = "date" name = "vencimento" class = "form-control" id = "inputVenc3" placeholder = "Vencimento" style="background: #EEE9E9">

            </div>
            <div class="form-group col-md-3">

                <label for="inputValor3"><font size="4" face="Verdana">Valor R$</font></label>

                <input type = "text"  name = "valor"  onKeyUp="moeda(this);" id = "inputValor3"  class = "form-control"  placeholder = "Valor" style="background: #EEE9E9">

            </div>



        </div>
        <br>
        <div class="form-group">

            <button type = "submit" class = "btn btn-success btn-sm">Cadastrar Novo Pagamento</button>

            <a href = 'job.php?link=8&id=<?php echo $id_fa; ?>&idAlert=1'>
                <button type = 'button' class = 'btn btn-danger2  btn-sm'>Voltar Ficha Apropriação</button>
            </a>

        </div>


    </form>

    <?php

    if($idpaf!=0){
    ?>

    <div class = "bs-docs-section" style="margin-top: 2em!important;">
        <div class = "row">
            <div class = "col-lg-12">
                <h1 id = "tables">Pagamentos Cadastrados</h1>
                <div>
                    <table class = "table table-hover">
                        <thead>
                            <tr style="background: #CDCDC1;">
                                <th scope = "col"><font size="2" face="Verdana">Cód.</font></th>
                                <th scope = "col"><font size="2" face="Verdana">Nome prestador</font></th>
                                <th scope = "col"><font size="2" face="Verdana">Serviço</font></th>
                                <th scope = "col"><font size="2" face="Verdana">Vencimento</font></th>
                                <th scope = "col"><font size="2" face="Verdana">Valor</font></th>
                                <th scope="col"><font size="2" face="Verdana">Aprovado</font></th>
                                <th scope="col"><font size="1" face="Verdana"></font></th>
                                <th scope="col"><font size="1" face="Verdana"></font></th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php

                        $result99 = $pdo->prepare("SELECT p.id as pid, p.id_prestador_servico, p.n_cheque,
                        date_format(p.vencimento,'%d/%m/%Y') , p.servico, p.valor, p.id_aprovacao, p.id_ficha_apropriacao, 
                        p.modified , p.recibo, p.data_geracao_recibo, ps.nome as psnome, s.id as sid, s.nome as snome
                        FROM pagamentos p  JOIN prestadores_servicos ps ON p.id_prestador_servico = ps.id
                         JOIN usuarios s ON  p.id_aprovacao = s.id             
                        WHERE p.id_ficha_apropriacao = '$id_fa' order by pid desc ");
                        $result99->execute();

                        foreach ($result99 as $row) { ?>

                        <tr onclick='document.location="job.php?link=28&id=<?php echo $row['pid']; ?>&idAlert=1"'>

                            <?php

                            echo "<td><font size=\"3\" face=\"Verdana\">" . $row['pid'] . "</font></td>";
                            echo "<td><font size=\"3\" face=\"Verdana\">" . $row['psnome'] . "</font></td>";
                            echo "<td><font size=\"3\" face=\"Verdana\">" . $row['servico'] . "</font></td>";

                            echo "<td><font size=\"3\" face=\"Verdana\">" . $row['date_format(p.vencimento,\'%d/%m/%Y\')'] . "</font></td>";
                            echo "<td><font size=\"3\" face=\"Verdana\">" . "R$ ".number_format($row['valor'],2,",",".") . "</font></td>";
                            if($row['snome']!="sem aprovacao"){
                                echo "<td ><font size=\"3\" face=\"Verdana\">" . $row['snome'] . "</font></td>";
                                                            }else {
                                echo "<td style='background-color: #FFD39B'><font size=\"3\" face=\"Verdana\">" . $row['snome'] . "</font></td>";
                            }

                            if($row['data_geracao_recibo'] != null) {
                                echo "<td><i class=\"far fa-file-alt\" style='color: #1c7430'></i></i></td>";
                            }else{
                                echo "<td></td>";
                            }
                            if($row['recibo'] != null) {
                                echo "<td><i class=\"fas fa-file-download\" style='color: #1c7430'></i></i></td>";
                            }else{
                                echo "<td></td>";
                            }

                            ?>



                            <?php echo "</tr>"; } ?>



                        </tbody>
                    </table>

                    <?php   } else { }
                    ?>

                </div>
            </div>



            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Cadastrar prestador de serviço</h4>
                        </div>


                        <div class="modal-body">

                            <div>
                                <form method = "POST" action = "processa/processa_cadastrar_prestador.php">
                                    <fieldset>
                                        <div class = "form-group row">
                                            <INPUT TYPE="hidden" NAME="id_fa" VALUE="<?php echo "$id_fa" ?>">

                                            <div class = "col-sm-10">
                                                <input type = "text" name = "prestador_nome" class = "form-control-plaintext" id = "inputNome3"
                                                       placeholder = "Nome">
                                            </div>

                                            <div class = "col-sm-10">
                                                <input type = "text" name = "documento" class = "form-control" id = "inputDocumento3"
                                                       placeholder = "Documento ('tipo de documento' 'número' 'órgão')">
                                            </div>

                                            <div class = "col-sm-10">
                                                <input type = "text" name = "banco" class = "form-control" id = "inputBanco3"
                                                       placeholder = "Banco">
                                            </div>

                                            <div class = "col-sm-6">
                                                <input type = "text" name = "agencia" class = "form-control" id = "inputAgencia3"
                                                       placeholder = "Agência">
                                            </div>

                                            <div class = "col-sm-6">
                                                <input type = "text" name = "conta" class = "form-control" id = "inputConta3"
                                                       placeholder = "Conta">
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

        </div>
    </div>


    <br><br><br>


</div>


   
