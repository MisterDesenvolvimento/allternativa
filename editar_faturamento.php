<?php
    $id = $_GET['id'];
    //Executa a consulta

    $idUser = $_SESSION['usuarioID'];

    
    $resultado = $pdo->prepare("SELECT id, n_nota_fiscal, data_vencimento, valor, id_aprovacao, id_ficha_apropriacao
      FROM faturamento WHERE id = '$id' LIMIT 1");
    $resultado->execute();
    $result = $resultado->fetch(PDO::FETCH_ASSOC);
    $idApro = $result['id_aprovacao'];
    $idFA = $result['id_ficha_apropriacao'];

    $resultado2 = $pdo->prepare("SELECT id, nome
          FROM usuarios WHERE id = '$idApro' LIMIT 1");
    $resultado2->execute();
    $result2 = $resultado2->fetch(PDO::FETCH_ASSOC);


?>
<div class="container">

    <div class = "col-lg-12" >

        <br>
        <h1 id = "tables">Editar Faturamento</h1>

        <form method = "POST" action = "processa/processa_editar_faturamento.php">
            <br>

            <INPUT TYPE="hidden" NAME="id" VALUE="<?php echo "$id" ?>">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputNF3"><font size="4" face="Verdana">Número da nota fiscal</font></label>

                    <input type = "text" name = "num_nf" class = "form-control" id = "inputNF3"
                           placeholder = "Número da Nota Fiscal" style="background: #EEE9E9" value = "<?php echo $result['n_nota_fiscal']; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="txtValor"><font size="4" face="Verdana">Valor R$</font></label>

                    <input type="text" name="txtValor" id="txtValor" onKeyUp="moeda(this);" class = "form-control" placeholder = "Valor da nota fiscal" style="background: #EEE9E9" value = "<?php echo number_format($result['valor'],2,",","."); ?>">

                </div>
                <div class="form-group col-md-3">
                    <label for="inputDataVenc3"><font size="4" face="Verdana">Data vencimento</font></label>

                    <input type = "date" name = "data_venc" class = "form-control" id = "inputDataVenc3"
                           style="background: #EEE9E9" value = "<?php echo $result['data_vencimento']; ?>">


                </div>
            </div>

            <?php

                if($idUser=="62" || $idUser=="71" || $idUser=="64" || $idUser=="63"  ){  ?>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputSocio"><font size="4" face="Verdana">Aprovação</font></label>


                            <select id="inputSocio" name="id_socio" class="form-control" style="background: #EEE9E9" >

                                <option value = "<?php echo $result['id_aprovacao']; ?>" selected><?php echo $result2['nome']; ?></option>
                                <option value = "62">Cacheado</option>
                                <option value = "63">Sérgio</option>
                                <option value = "73">Sem Aprovação</option>
                            </select>
                        </div>


                    </div>

                <?php
                }else{

                }
            ?>

                <button type = "submit" class = "btn btn-success btn-sm">Concluir</button>

        </form>

                <br>
    </div>

</div>


   
