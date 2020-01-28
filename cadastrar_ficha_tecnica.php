<?php
    include_once("menu_job.php");

    $id_fa = $_GET['id'];

    $sql = "SELECT id, cliente  FROM clientes";
    $result = $pdo->prepare($sql);
    $result->execute();

    $resultado = $pdo->prepare("SELECT fa.id, fa.titulo as titulo, cl.id, cl.cliente as cliente  FROM ficha_apropriacao fa 
          JOIN clientes cl ON   fa.id_cliente = cl.id 
          WHERE fa.id = '$id_fa' LIMIT 1");
    $resultado->execute();
    $resultado2 = $resultado->fetch(PDO::FETCH_ASSOC);
?>

<div class="container" >

    <br>
    <h1 id = "tables">Criar Ficha Técnica</h1>


    <div class="form-group">
        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="3" face="Verdana">Nome do Cliente:
            <?php
                    echo $resultado2['cliente'];
                 ?>

            </font></div>
        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="3" face="Verdana">Título da Ficha de Apropriação:
            <?php
                echo $resultado2['titulo'];
                ?>
            </font></div>
        <br>
    </div>


    <form method = "POST" action = "processa/processa_cadastrar_ficha_tecnica.php">

        <INPUT TYPE="hidden" NAME="id_fa" VALUE="<?php echo "$id_fa" ?>">

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputIlha3"><font size="4" face="Verdana">Ilha / Editor</font></label>

                <input type = "text" name = "ilha" class = "form-control" id = "inputIlha3"
                       placeholder = "Ilha / Editor"  style="background: #EEE9E9">

            </div>
            <div class="form-group col-md-3">
                <label for="inputData3"><font size="4" face="Verdana">Data</font></label>

                <input type = "date" name = "data" class = "form-control" id = "inputData3"
                       placeholder = "Data"  style="background: #EEE9E9">
            </div>
            <div class="form-group col-md-6">

                <label for="inputLocacao3"><font size="4" face="Verdana">Locação</font></label>

                <input type = "text" name = "locacao" class = "form-control" id = "inputLocacao3"
                       placeholder = "Locação"  style="background: #EEE9E9">

            </div>
        </div>

        <a> <div id="flip"><font size="4" face="Verdana">( + ) Cadastrar Externa</font></div></a>

        <div id="panel">


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputDiretor3"><font size="4" face="Verdana">Diretor</font></label>

                        <input type = "text" name = "diretor" class = "form-control" id = "inputDiretor3"
                               placeholder = "Diretor"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAssdir3"><font size="4" face="Verdana">Assistente Direção</font></label>

                        <input type = "text" name = "assisdirecao" class = "form-control" id = "inputAssdir3"
                               placeholder = "Assistente de direção"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputProdutor3"><font size="4" face="Verdana">Produtor</font></label>

                        <input type = "text" name = "produtor" class = "form-control" id = "inputProdutor3"
                               placeholder = "Produtor"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAssisProd3"><font size="4" face="Verdana">Assistente de Produção</font></label>

                        <input type = "text" name = "ass_producao" class = "form-control" id = "inputAssisProd3"
                               placeholder = "Assistente de Produção"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputDirfot3"><font size="4" face="Verdana">Diretor Fotografia</font></label>

                        <input type = "text" name = "dirfotografia" class = "form-control" id = "inputDirfot3"
                               placeholder = "Diretor de fotografia"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputFotografo3"><font size="4" face="Verdana">Fotógrafo</font></label>

                        <input type = "text" name = "fotografo" class = "form-control" id = "inputFotografo3"
                               placeholder = "Fotógrafo"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input1Ass3"><font size="4" face="Verdana">1º Assistente</font></label>

                        <input type = "text" name = "priassistente" class = "form-control" id = "input1Ass3"
                               placeholder = "1º Assistente"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input2Ass3"><font size="4" face="Verdana">2º Assistente</font></label>

                        <input type = "text" name = "segassistente" class = "form-control" id = "input2Ass3"
                               placeholder = "2º Assistente"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEletricista3"><font size="4" face="Verdana">Eletricista</font></label>

                        <input type = "text" name = "eletricista" class = "form-control" id = "inputEletricista3"
                               placeholder = "Eletricista"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input1AssEle3"><font size="4" face="Verdana">1º Assistente Elétrica</font></label>

                        <input type = "text" name = "priassiseletrica" class = "form-control" id = "input1AssEle3"
                               placeholder = "1º Assistente Elétrica"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input2AssEle3"><font size="4" face="Verdana">2º Assistente Elétrica</font></label>

                        <input type = "text" name = "segassiseletrica" class = "form-control" id = "input2AssEle3"
                               placeholder = "2º Assistente Elétrica"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputMaquinista3"><font size="4" face="Verdana">Maquinista</font></label>

                        <input type = "text" name = "maquinista" class = "form-control" id = "inputMaquinista3"
                               placeholder = "Maquinista"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputDirarte3"><font size="4" face="Verdana">Diretor de arte</font></label>

                        <input type = "text" name = "dirarte" class = "form-control" id = "inputDirarte3"
                               placeholder = "Diretor de arte"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAssarte3"><font size="4" face="Verdana">Assistente arte</font></label>

                        <input type = "text" name = "assisarte" class = "form-control" id = "inputAssarte3"
                               placeholder = "Assistente arte"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputFigurinista3"><font size="4" face="Verdana">Figurinista</font></label>

                        <input type = "text" name = "figurinista" class = "form-control" id = "inputFigurinista3"
                               placeholder = "Figurinista"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAssFigurino3"><font size="4" face="Verdana">Assistente de Figurino</font></label>

                        <input type = "text" name = "assfigurino" class = "form-control" id = "inputAssFigurino3"
                               placeholder = "Assistente de Figurino"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputProdLoc3"><font size="4" face="Verdana">Produtor locação</font></label>

                        <input type = "text" name = "prodlocacao" class = "form-control" id = "inputProdLoc3"
                               placeholder = "Produtor locação"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputProdElenco3"><font size="4" face="Verdana">Produtor elenco</font></label>

                        <input type = "text" name = "prodelenco" class = "form-control" id = "inputProdElenco3"
                               placeholder = "Produtor elenco"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputMaquiador3"><font size="4" face="Verdana">Maquiador</font></label>

                        <input type = "text" name = "maquiador" class = "form-control" id = "inputMaquiador3"
                               placeholder = "Maquiador"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCamareira3"><font size="4" face="Verdana">Camareira</font></label>

                        <input type = "text" name = "camareira" class = "form-control" id = "inputCamareira3"
                               placeholder = "Camareira"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputTesom3"><font size="4" face="Verdana">Técnico de som</font></label>

                        <input type = "text" name = "tecsom" class = "form-control" id = "inputTesom3"
                               placeholder = "Técnico de som"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAssaudio3"><font size="4" face="Verdana">Assistente de áudio</font></label>

                        <input type = "text" name = "assisaudio" class = "form-control" id = "inputAssaudio3"
                               placeholder = "Assistente de áudio"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputLogger3"><font size="4" face="Verdana">Logger</font></label>

                        <input type = "text" name = "logger" class = "form-control" id = "inputLogger3"
                               placeholder = "Logger"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCatering3"><font size="4" face="Verdana">Catering</font></label>

                        <input type = "text" name = "catering" class = "form-control" id = "inputCatering3"
                               placeholder = "Catering"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCamera13"><font size="4" face="Verdana">Camera 1</font></label>

                        <input type = "text" name = "camera1" class = "form-control" id = "inputCamera13"
                               placeholder = "Camera 1"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCamera23"><font size="4" face="Verdana">Camera 2</font></label>

                        <input type = "text" name = "camera2" class = "form-control" id = "inputCamera23"
                               placeholder = "Camera 2"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputContra3"><font size="4" face="Verdana">Contra regra</font></label>

                        <input type = "text" name = "contraregra" class = "form-control" id = "inputContra3"
                               placeholder = "Contra regra"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCenografo3"><font size="4" face="Verdana">Cenógrafo</font></label>

                        <input type = "text" name = "cenografo" class = "form-control" id = "inputCenografo3"
                               placeholder = "Cenógrafo"  style="background: #EEE9E9">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputTransporte3"><font size="4" face="Verdana">Transporte</font></label>

                        <input type = "text" name = "transporte" class = "form-control" id = "inputTransporte3"
                               placeholder = "Transporte"  style="background: #EEE9E9">
                    </div>
                </div>
        </div>
        <br>
        <div class="form-group">

            <button type = "submit" class = "btn btn-success btn-sm">Criar</button>

            <a href = 'job.php?link=8&id=<?php echo $id_fa; ?>&idAlert=99'>
                <button type = 'button' class = 'btn btn-danger2  btn-sm'>Voltar Ficha Apropriação</button>
            </a>


        </div>
    </form>
    <br>
    <br>
</div>












   
