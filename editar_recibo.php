<?php
    $id = $_GET['id'];
    //Executa a consulta
    
    $resultado = $pdo->prepare("SELECT id, data_realizacao_servico, data_pagamento_realizado
      ,cachet, inss, irrf, agenciamento, desconto
      FROM pagamentos WHERE id = '$id' LIMIT 1");
    $resultado->execute();
    $result = $resultado->fetch(PDO::FETCH_ASSOC);
    $DTServico = $result['data_realizacao_servico'];
    $DTPag = $result['data_pagamento_realizado'];
    $cachet = $result['cachet'];
    $inss = $result['inss'];
    $irrf = $result['irrf'];
    $agenciamento = $result['agenciamento'];
    $desconto = $result['desconto'];


?>
<div class="container">

    <div class = "col-lg-12" >

        <br>
      <h1 id = "tables">Editar Recibo</h1>
        <br>

            <form method = "POST" action = "processa/processa_editar_recibo.php">
                <fieldset>
                    <div class = "form-group row">
                        <INPUT TYPE="hidden" NAME="id_pag" VALUE="<?php echo "$id" ?>">

                        <div class = "col-sm-5">
                            <label for="inputDtServ3"><font size="2" face="Verdana">Data realizacao serviço</font></label>

                            <input type = "date" name = "data_realizacao_servico" class = "form-control" id = "inputDtServ3"
                                   placeholder = "Data realização do serviço" value="<?php echo "$DTServico" ?>">
                        </div>

                        <div class = "col-sm-5">
                            <label for="inputDtPg3"><font size="2" face="Verdana">Data realizacao Pagamento</font></label>

                            <input type = "date" name = "data_realizacao_pagamento" class = "form-control" id = "inputDtPg3"
                                   placeholder = "Data realização do pagamento" value="<?php echo "$DTPag" ?>">
                        </div>

                        <div class = "col-sm-4">
                            <label for="inputCachet3"><font size="2" face="Verdana">Cachet</font></label>

                            <input type = "text" name = "cachet" onKeyUp="moeda(this);" class = "form-control" id = "inputCachet3"
                                   placeholder = "Cachet" value="<?php echo number_format($cachet,2,",",".") ?>">
                        </div>

                        <div class = "col-sm-4">
                            <label for="inputInss3"><font size="2" face="Verdana">INNS</font></label>

                            <input type = "text" name = "inss" class = "form-control" onKeyUp="moeda(this);" id = "inputInss3"
                                   placeholder = "INSS 11%" value="<?php echo number_format($inss,2,",",".") ?>">
                        </div>

                        <div class = "col-sm-4">
                            <label for="inputIrrf3"><font size="2" face="Verdana">IFFR</font></label>

                            <input type = "text" name = "irrf" class = "form-control" onKeyUp="moeda(this);" id = "inputIrrf3"
                                   placeholder = "IRRF" value="<?php echo number_format($irrf,2,",",".") ?>">
                        </div>
                        <div class = "col-sm-4">
                            <label for="inputAgenciamento3"><font size="2" face="Verdana">Agenciamento</font></label>

                            <input type = "text" name = "agenciamento" class = "form-control" onKeyUp="moeda(this);" id = "inputAgenciamento3"
                                   placeholder = "Agenciamento" value="<?php  echo number_format($agenciamento,2,",",".") ?>">
                        </div>
                        <div class = "col-sm-4">
                            <label for="inputDesconto3"><font size="2" face="Verdana">Desconto</font></label>

                            <input type = "text" name = "desconto" class = "form-control" onKeyUp="moeda(this);" id = "inputDesconto3"
                                   placeholder = "Desconto" value="<?php echo number_format($desconto,2,",",".") ?>">
                        </div>







                    </div><br>
                    <div class = "form-group row">
                        <div class = "col-sm-10">
                            <button type = "submit" class = "btn btn-success btn-sm">Editar</button>
                            <a href = 'job.php?link=28&id=<?php echo $id; ?>&idAlert=1'>
                                <button type = 'button' class = 'btn btn-info  btn-sm'>Voltar pagamento</button>
                            </a>
                        </div>

                    </div>
                </fieldset>
            </form>


    </div>

</div>


   
