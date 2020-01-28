<?php
    $id = $_GET['id'];
    //Executa a consulta
    $idUser = $_SESSION['usuarioID'];
    
    $resultado = $pdo->prepare("SELECT id, id_prestador_servico, n_cheque, vencimento, servico, valor, id_aprovacao, id_ficha_apropriacao,
      modified, id_tipo_pagamento 
      FROM pagamentos WHERE id = '$id' LIMIT 1");
    $resultado->execute();
    $result = $resultado->fetch(PDO::FETCH_ASSOC);
    $idApro = $result['id_aprovacao'];
    $idFA = $result['id_ficha_apropriacao'];
    $idTPG = $result['id_tipo_pagamento'];
    $idPRE = $result['id_prestador_servico'];



    $resultado20 = $pdo->prepare("SELECT id, nome
          FROM usuarios WHERE id = '$idApro' LIMIT 1");
    $resultado20->execute();
    $result20 = $resultado20->fetch(PDO::FETCH_ASSOC);

    $resultado9 = $pdo->prepare("SELECT id, tipo_pagamento
              FROM tipo_pagamento WHERE id = '$idTPG' LIMIT 1");
    $resultado9->execute();
    $result9 = $resultado9->fetch(PDO::FETCH_ASSOC);

    $resultado10 = $pdo->prepare("SELECT id, nome
                  FROM prestadores_servicos WHERE id = '$idPRE' LIMIT 1");
    $resultado10->execute();
    $result10 = $resultado10->fetch(PDO::FETCH_ASSOC);



?>
<div class="container">

    <div class = "col-lg-12" >

        <br>
        <h1 id = "tables">Editar Pagamento</h1>
        <br>
        <form method = "POST" action = "processa/processa_editar_pagamento.php">

            <INPUT TYPE="hidden" NAME="id_fa" VALUE="<?php echo "$idFA" ?>">
            <INPUT TYPE="hidden" NAME="id" VALUE="<?php echo "$id" ?>">

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputTP"><font size="4" face="Verdana">Tipo de pagamento</font></label>
                    <select id="inputTP" name="tipo_pg" class="form-control"  style="background: #EEE9E9" >

                        <option value = "<?php echo $result['id_tipo_pagamento']; ?>" selected ><?php echo $result9['tipo_pagamento']; ?></option>

                        <option value = "1">Cheque</option>
                        <option value = "2">Depósito (TED)</option>
                        <option value = "3">Transferência entre contas</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCH3"><font size="4" face="Verdana">Número do documento</font> </label>

                    <input type = "text" name = "cheque" class = "form-control" id = "inputCH3" placeholder = "Número do documento"
                           style="background: #EEE9E9"  value = "<?php echo $result['n_cheque']; ?>">

                </div>

                <div class="form-group col-md-4">
                    <label for="inputDoc3"><font size="4" face="Verdana">Prestador de Serviço</font></label>
                    <select id="inputPrestador" name="id_prestador" class="form-control" style="background: #EEE9E9">

                        <option value = "<?php echo $result['id_prestador_servico']; ?>" selected><?php echo $result10['nome'];?></option>
                        <?php
                        $resultado3 = $pdo->prepare("SELECT id, nome 
                                                    FROM prestadores_servicos order by nome");
                        $resultado3->execute();

                        while($linha = $resultado3->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $linha['id'] ?>"><?php echo $linha['nome'] ?></option>
                        <?php } ?>

                    </select>
                </div>


                <div class="form-group col-md-2">
                    <button type="button" class="btn btn-danger2  btn-sm" data-toggle="modal" data-target="#myModal">NOVO ( + )</button>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="inputServico3"><font size="4" face="Verdana">Serviço</font></label>

                    <input type = "text" name = "servico" class = "form-control" id = "inputServico3" placeholder = "Serviço"
                           style="background: #EEE9E9" value = "<?php echo $result['servico']; ?>">

                </div>

                <div class="form-group col-md-3">
                    <label for="inputVenc3"><font size="4" face="Verdana">Vencimento</font></label>

                    <input type = "date" name = "vencimento" class = "form-control" id = "inputVenc3" placeholder = "Vencimento"
                           style="background: #EEE9E9" value = "<?php echo $result['vencimento']; ?>">

                </div>
                <div class="form-group col-md-2">

                    <label for="inputValor3"><font size="4" face="Verdana">Valor R$</font></label>

                    <input type = "text"  name = "valor"  id = "inputValor3"  onKeyUp="moeda(this);" class = "form-control"
                           placeholder = "Utilize ponto para os centavos." style="background: #EEE9E9" value = "<?php echo number_format($result['valor'],2,",","."); ?>">

                </div>

                <?php

                if($idUser=="62" || $idUser=="71" || $idUser=="64" || $idUser=="63"  ){  ?>

                <div class="form-group col-md-2">
                    <label for="inputSocio"><font size="4" face="Verdana">Aprovação</font></label>
                    <select id="inputSocio" name="socio" class="form-control" style="background: #EEE9E9">
                        <option value = "<?php echo $result['id_aprovacao']; ?>" selected><?php echo $result20['nome']; ?></option>
                        <option value = "62">Cacheado</option>
                        <option value = "63">Sérgio</option>
                        <option value = "73">Sem Aprovação</option>

                    </select>
                </div>
                    <?php
                }else{

                }
                ?>

            </div>
            <br>

            <div class="form-group">

                <button type = "submit" class = "btn btn-success btn-sm">Concluir</button>

                <a href = 'job.php?link=28&id=<?php echo $id; ?>&idAlert=1'>
                    <button type = 'button' class = 'btn btn-danger2  btn-sm'>Voltar</button>
                </a>

            </div>


        </form>


        <!--<form method = "POST" action = "processa/processa_editar_pagamento.php">
            <br>

            <INPUT TYPE="hidden" NAME="id" VALUE="<?php /*echo "$id" */?>">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="inputNF3"><font size="4" face="Verdana">Número da nota fiscal</font></label>

                    <input type = "text" name = "num_nf" class = "form-control" id = "inputNF3"
                           placeholder = "Número da Nota Fiscal" style="background: #EEE9E9" value = "<?php /*echo $result['n_nota_fiscal']; */?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="txtValor"><font size="4" face="Verdana">Valor</font></label>

                    <input type="text" name="txtValor" id="txtValor" class = "form-control" placeholder = "Valor da nota fiscal" style="background: #EEE9E9" value = "<?php /*echo $result['valor']; */?>">

                </div>
                <div class="form-group col-md-3">
                    <label for="inputDataVenc3"><font size="4" face="Verdana">Data vencimento</font></label>

                    <input type = "date" name = "data_venc" class = "form-control" id = "inputDataVenc3"
                           style="background: #EEE9E9" value = "<?php /*echo $result['data_vencimento']; */?>">


                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputSocio"><font size="4" face="Verdana">Aprovação</font></label>


                    <select id="inputSocio" name="id_socio" class="form-control" style="background: #EEE9E9" value = "<?php /*echo $result['id_aprovacao']; */?>">
                        <option >Sócio</option>
                        <option value = "<?php /*echo $result['id_aprovacao']; */?>" selected><?php /*echo $result2['nome']; */?></option>
                        <option value = "62">Cacheado</option>
                        <option value = "63">Sérgio</option>
                    </select>
                </div>


            </div>

            <div class="form-group col-md-6">
                <button type = "submit" class = "btn btn-success btn-sm">Concluir</button>


                <a href = 'processa/processa_apagar_ficha_apropriacao.php?id=<?php /*echo $result['id']; */?>'>
                    <button type = 'button' class = 'btn btn-danger  btn-sm'><i class="fas fa-eraser"></i></button>
                </a>

                <a href = 'job.php?link=23&id=<?php /*echo $idFA; */?>'>
                    <button type = 'button' class = 'btn btn-danger2  btn-sm'>Voltar faturamento</button>
                </a>
            </div>


                    </form>
                </form>-->
                <br>
            </div>

    </div>


   
