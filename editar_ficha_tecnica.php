<?php
    $id = $_GET['id'];
    //Executa a consulta

    $resultado = $pdo->prepare("SELECT  id, data, ilha_editor, locacao, diretor, assistente_direcao, produtor, ass_producao, 
    diretor_fotografia, fotografo, pri_assistente, seg_assistente, eletricista, pri_ass_eletrica, seg_ass_eletrica, maquinista, 
    dir_arte, ass_arte, figurinista, ass_figurino, prod_locacao, prod_elenco, maquiador, camareira, tec_som, ass_audio, logger, 
    catering, camera1, camera2, contra_regra, cenografo, transporte, id_ficha_apropriacao
            FROM ficha_tecnica WHERE id_ficha_apropriacao = '$id' LIMIT 1");

    $resultado->execute();
    $result = $resultado->fetch(PDO::FETCH_ASSOC);
    $idft = $result['id'];

?>

<div class="container">

    <div class = "col-lg-12" >

        <br>
                <h1 id = "tables">Editar Ficha de Técnica</h1>

        <br>

        <form method = "POST" action = "processa/processa_editar_ficha_tecnica.php">

            <INPUT TYPE="hidden" NAME="id_fa" VALUE="<?php echo "$id" ?>">
            <INPUT TYPE="hidden" NAME="id_ft" VALUE="<?php echo "$idft" ?>">


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputIlha3"><font size="4" face="Verdana">Ilha / Editor</font></label>

                    <input type = "text" name = "ilha" class = "form-control" id = "inputIlha3"
                           placeholder = "Ilha / Editor"  style="background: #EEE9E9" value = "<?php echo $result['ilha_editor']; ?>">

                </div>
                <div class="form-group col-md-3">
                    <label for="inputData3"><font size="4" face="Verdana">Data</font></label>

                    <input type = "date" name = "data" class = "form-control" id = "inputData3"
                           placeholder = "Data"  style="background: #EEE9E9" value = "<?php echo $result['data']; ?>">
                </div>
                <div class="form-group col-md-6">

                    <label for="inputLocacao3"><font size="4" face="Verdana">Locação</font></label>

                    <input type = "text" name = "locacao" class = "form-control" id = "inputLocacao3"
                           placeholder = "Locação"  style="background: #EEE9E9" value = "<?php echo $result['locacao']; ?>">

                </div>
            </div>

            <div id="flip"><font size="4" face="Verdana" color="#8a2be2">( + ) Cadastrar Externa</font></div>

            <div id="panel">


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputDiretor3"><font size="4" face="Verdana">Diretor</font></label>

                        <input type = "text" name = "diretor" class = "form-control" id = "inputDiretor3"
                               placeholder = "Diretor"  style="background: #EEE9E9" value = "<?php echo $result['diretor']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAssdir3"><font size="4" face="Verdana">Assistente Direção</font></label>

                        <input type = "text" name = "assisdirecao" class = "form-control" id = "inputAssdir3"
                               placeholder = "Assistente de direção"  style="background: #EEE9E9" value = "<?php echo $result['assistente_direcao']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputProdutor3"><font size="4" face="Verdana">Produtor</font></label>

                        <input type = "text" name = "produtor" class = "form-control" id = "inputProdutor3"
                               placeholder = "Produtor"  style="background: #EEE9E9" value = "<?php echo $result['produtor']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAssisProd3"><font size="4" face="Verdana">Assistente de Produção</font></label>

                        <input type = "text" name = "ass_producao" class = "form-control" id = "inputAssisProd3"
                               placeholder = "Assistente de Produção"  style="background: #EEE9E9" value = "<?php echo $result['ass_producao']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputDirfot3"><font size="4" face="Verdana">Diretor Fotografia</font></label>

                        <input type = "text" name = "dirfotografia" class = "form-control" id = "inputDirfot3"
                               placeholder = "Diretor de fotografia"  style="background: #EEE9E9" value = "<?php echo $result['diretor_fotografia']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputFotografo3"><font size="4" face="Verdana">Fotógrafo</font></label>

                        <input type = "text" name = "fotografo" class = "form-control" id = "inputFotografo3"
                               placeholder = "Fotógrafo"  style="background: #EEE9E9" value = "<?php echo $result['fotografo']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input1Ass3"><font size="4" face="Verdana">1º Assistente</font></label>

                        <input type = "text" name = "priassistente" class = "form-control" id = "input1Ass3"
                               placeholder = "1º Assistente"  style="background: #EEE9E9" value = "<?php echo $result['pri_assistente']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input2Ass3"><font size="4" face="Verdana">2º Assistente</font></label>

                        <input type = "text" name = "segassistente" class = "form-control" id = "input2Ass3"
                               placeholder = "2º Assistente"  style="background: #EEE9E9" value = "<?php echo $result['seg_assistente']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEletricista3"><font size="4" face="Verdana">Eletricista</font></label>

                        <input type = "text" name = "eletricista" class = "form-control" id = "inputEletricista3"
                               placeholder = "Eletricista"  style="background: #EEE9E9" value = "<?php echo $result['eletricista']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input1AssEle3"><font size="4" face="Verdana">1º Assistente Elétrica</font></label>

                        <input type = "text" name = "priassiseletrica" class = "form-control" id = "input1AssEle3"
                               placeholder = "1º Assistente Elétrica"  style="background: #EEE9E9" value = "<?php echo $result['pri_ass_eletrica']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input2AssEle3"><font size="4" face="Verdana">2º Assistente Elétrica</font></label>

                        <input type = "text" name = "segassiseletrica" class = "form-control" id = "input2AssEle3"
                               placeholder = "2º Assistente Elétrica"  style="background: #EEE9E9" value = "<?php echo $result['seg_ass_eletrica']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputMaquinista3"><font size="4" face="Verdana">Maquinista</font></label>

                        <input type = "text" name = "maquinista" class = "form-control" id = "inputMaquinista3"
                               placeholder = "Maquinista"  style="background: #EEE9E9" value = "<?php echo $result['maquinista']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputDirarte3"><font size="4" face="Verdana">Diretor de arte</font></label>

                        <input type = "text" name = "dirarte" class = "form-control" id = "inputDirarte3"
                               placeholder = "Diretor de arte"  style="background: #EEE9E9" value = "<?php echo $result['dir_arte']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAssarte3"><font size="4" face="Verdana">Assistente arte</font></label>

                        <input type = "text" name = "assisarte" class = "form-control" id = "inputAssarte3"
                               placeholder = "Assistente arte"  style="background: #EEE9E9" value = "<?php echo $result['ass_arte']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputFigurinista3"><font size="4" face="Verdana">Figurinista</font></label>

                        <input type = "text" name = "figurinista" class = "form-control" id = "inputFigurinista3"
                               placeholder = "Figurinista"  style="background: #EEE9E9" value = "<?php echo $result['figurinista']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAssFigurino3"><font size="4" face="Verdana">Assistente de Figurino</font></label>

                        <input type = "text" name = "assfigurino" class = "form-control" id = "inputAssFigurino3"
                               placeholder = "Assistente de Figurino"  style="background: #EEE9E9" value = "<?php echo $result['ass_figurino']; ?>>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputProdLoc3"><font size="4" face="Verdana">Produtor locação</font></label>

                        <input type = "text" name = "prodlocacao" class = "form-control" id = "inputProdLoc3"
                               placeholder = "Produtor locação"  style="background: #EEE9E9" value = "<?php echo $result['prod_locacao']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputProdElenco3"><font size="4" face="Verdana">Produtor elenco</font></label>

                        <input type = "text" name = "prodelenco" class = "form-control" id = "inputProdElenco3"
                               placeholder = "Produtor elenco"  style="background: #EEE9E9" value = "<?php echo $result['prod_elenco']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputMaquiador3"><font size="4" face="Verdana">Maquiador</font></label>

                        <input type = "text" name = "maquiador" class = "form-control" id = "inputMaquiador3"
                               placeholder = "Maquiador"  style="background: #EEE9E9" value = "<?php echo $result['maquiador']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCamareira3"><font size="4" face="Verdana">Camareira</font></label>

                        <input type = "text" name = "camareira" class = "form-control" id = "inputCamareira3"
                               placeholder = "Camareira"  style="background: #EEE9E9" value = "<?php echo $result['camareira']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputTesom3"><font size="4" face="Verdana">Técnico de som</font></label>

                        <input type = "text" name = "tecsom" class = "form-control" id = "inputTesom3"
                               placeholder = "Técnico de som"  style="background: #EEE9E9" value = "<?php echo $result['tec_som']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAssaudio3"><font size="4" face="Verdana">Assistente de áudio</font></label>

                        <input type = "text" name = "assisaudio" class = "form-control" id = "inputAssaudio3"
                               placeholder = "Assistente de áudio"  style="background: #EEE9E9" value = "<?php echo $result['ass_audio']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputLogger3"><font size="4" face="Verdana">Logger</font></label>

                        <input type = "text" name = "logger" class = "form-control" id = "inputLogger3"
                               placeholder = "Logger"  style="background: #EEE9E9" value = "<?php echo $result['logger']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCatering3"><font size="4" face="Verdana">Catering</font></label>

                        <input type = "text" name = "catering" class = "form-control" id = "inputCatering3"
                               placeholder = "Catering"  style="background: #EEE9E9" value = "<?php echo $result['catering']; ?>">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputCamera13"><font size="4" face="Verdana">Camera 1</font></label>

                        <input type = "text" name = "camera1" class = "form-control" id = "inputCamera13"
                               placeholder = "Camera 1"  style="background: #EEE9E9" value = "<?php echo $result['camera1']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCamera23"><font size="4" face="Verdana">Camera 2</font></label>

                        <input type = "text" name = "camera2" class = "form-control" id = "inputCamera23"
                               placeholder = "Camera 2"  style="background: #EEE9E9" value = "<?php echo $result['camera2']; ?>">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputContra3"><font size="4" face="Verdana">Contra regra</font></label>

                        <input type = "text" name = "contraregra" class = "form-control" id = "inputContra3"
                               placeholder = "Contra regra"  style="background: #EEE9E9" value = "<?php echo $result['contra_regra']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCenografo3"><font size="4" face="Verdana">Cenógrafo</font></label>

                        <input type = "text" name = "cenografo" class = "form-control" id = "inputCenografo3"
                               placeholder = "Cenógrafo"  style="background: #EEE9E9" value = "<?php echo $result['cenografo']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputTransporte3"><font size="4" face="Verdana">Transporte</font></label>

                        <input type = "text" name = "transporte" class = "form-control" id = "inputTransporte3"
                               placeholder = "Transporte"  style="background: #EEE9E9"  value = "<?php echo $result['transporte']; ?>">
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">

                <input type = "hidden" name = "id" value = "<?php echo $result['id']; ?>">


                <div class = "col-sm-10">
                    <button type = "submit" class = "btn btn-success btn-sm">Concluir</button>



                    <a href = 'job.php?link=8&id=<?php echo $id; ?>&idAlert=1'>
                        <button type = 'button' class = 'btn btn-danger2  btn-sm'>Voltar Ficha Apropriação</button>
                    </a>
                </div>
                <br>


            </div>
        </form>
            </div>
        </div>

</div>

   
