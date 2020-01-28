<?php
    include_once("menu_job.php");

    
    $sql = "SELECT * FROM clientes";
    
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
    <h2 id = "tables">Externa</h2>


    <div class="form-group">
        <div class = "col-xs-1 col-sm-1 col-md-8">Nome do Cliente:
            <?php
                    echo $resultado2['cliente'];
                 ?>


        </div>
        <div class = "col-xs-1 col-sm-1 col-md-8">Título da Ficha de Apropriação:
            <?php
                echo $resultado2['titulo'];
                ?>


        </div>
    </div>


    <form method = "POST" action = "processa/processa_cadastrar_externa.php">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputDiretor3"><font size="4" face="Verdana">Diretor</font></label>

                <input type = "text" name = "ilha" class = "form-control" id = "inputDiretor3"
                       placeholder = "Diretor"  style="background: #EEE9E9">

            </div>
            <div class="form-group col-md-6">
                <label for="inputAsspro3"><font size="4" face="Verdana">Assistente de produção</font></label>

                <input type = "text" name = "data" class = "form-control" id = "inputAsspro3"
                       placeholder = "Assistente de produção"  style="background: #EEE9E9">
            </div>
            <div class="form-group col-md-6">
                <label for="inputProdutor3"><font size="4" face="Verdana">Produtor</font></label>
                <input type = "text" name = "locacao" class = "form-control" id = "inputProdutor3"
                       placeholder = "Produtor"  style="background: #EEE9E9">
            </div>
            <div class="form-group col-md-6">
                <label for="inputDirfot3"><font size="4" face="Verdana">Diretor de fotografia</font></label>

                <input type = "text" name = "data" class = "form-control" id = "inputDirfot3"
                       placeholder = "Diretor de fotografia"  style="background: #EEE9E9">
            </div>
            <div class="form-group col-md-6">
                <label for="inputFotografo3"><font size="4" face="Verdana">Fotógrafo</font></label>

                <input type = "text" name = "data" class = "form-control" id = "inputFotografo3"
                       placeholder = "Fotógrafo"  style="background: #EEE9E9">
            </div>
            <div class="form-group col-md-6">
                <label for="input1Ass3"><font size="4" face="Verdana">1º Assistente</font></label>

                <input type = "text" name = "data" class = "form-control" id = "input1Ass3"
                       placeholder = "1º Assistente"  style="background: #EEE9E9">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEletricista3"><font size="4" face="Verdana">Eletricista</font></label>

                <input type = "text" name = "data" class = "form-control" id = "inputEletricista3"
                       placeholder = "Eletricista"  style="background: #EEE9E9">
            </div>
            <div class="form-group col-md-6">
                <label for="input1AssEle3"><font size="4" face="Verdana">1º Assistente Elétrica</font></label>

                <input type = "text" name = "data" class = "form-control" id = "input1AssEle3"
                       placeholder = "1º Assistente Elétrica"  style="background: #EEE9E9">
            </div>
            <div class="form-group col-md-6">
                <label for="input2AssEle3"><font size="4" face="Verdana">2º Assistente Elétrica</font></label>

                <input type = "text" name = "data" class = "form-control" id = "input2AssEle3"
                       placeholder = "2º Assistente Elétrica"  style="background: #EEE9E9">
            </div>
            <div class="form-group col-md-6">
                <label for="inputDirarte3"><font size="4" face="Verdana">Diretor de arte</font></label>

                <input type = "text" name = "data" class = "form-control" id = "inputDirarte3"
                       placeholder = "Diretor de arte"  style="background: #EEE9E9">
            </div>
            <div class="form-group col-md-6">
                <label for="inputAssarte3"><font size="4" face="Verdana">Assistente arte</font></label>

                <input type = "text" name = "data" class = "form-control" id = "inputAssarte3"
                       placeholder = "Assistente arte"  style="background: #EEE9E9">
            </div>
            <div class="form-group col-md-6">
                <label for="inputFigurinista3"><font size="4" face="Verdana">Figurinista</font></label>

                <input type = "text" name = "data" class = "form-control" id = "inputFigurinista3"
                       placeholder = "Figurinista"  style="background: #EEE9E9">
            </div>
            <div class="form-group col-md-6">
                <label for="inputProdLoc3"><font size="4" face="Verdana">Produtor locação</font></label>

                <input type = "text" name = "data" class = "form-control" id = "inputProdLoc3"
                       placeholder = "Produtor locação"  style="background: #EEE9E9">
            </div>
            <div class="form-group col-md-6">
                <label for="inputProdElenco3"><font size="4" face="Verdana">Produtor elenco</font></label>

                <input type = "text" name = "data" class = "form-control" id = "inputProdElenco3"
                       placeholder = "Produtor elenco"  style="background: #EEE9E9">
            </div>
            <div class="form-group col-md-6">
                <label for="inputMaquiador3"><font size="4" face="Verdana">Maquiador</font></label>

                <input type = "text" name = "data" class = "form-control" id = "inputMaquiador3"
                       placeholder = "Maquiador"  style="background: #EEE9E9">
            </div>
            <div class="form-group col-md-6">
                <label for="inputTesom3"><font size="4" face="Verdana">Técnico de som</font></label>

                <input type = "text" name = "data" class = "form-control" id = "inputTesom3"
                       placeholder = "Técnico de som"  style="background: #EEE9E9">
            </div>
            <div class="form-group col-md-6">
                <label for="inputAssaudio3"><font size="4" face="Verdana">Assistente de áudio</font></label>

                <input type = "text" name = "data" class = "form-control" id = "inputAssaudio3"
                       placeholder = "Assistente de áudio"  style="background: #EEE9E9">
            </div>
            <div class="form-group col-md-6">
                <label for="inputLogger3"><font size="4" face="Verdana">Logger</font></label>

                <input type = "text" name = "data" class = "form-control" id = "inputLogger3"
                       placeholder = "Logger"  style="background: #EEE9E9">
            </div>
            <div class="form-group col-md-6">
                <label for="inputContra3"><font size="4" face="Verdana">Contra regra</font></label>

                <input type = "text" name = "data" class = "form-control" id = "inputContra3"
                       placeholder = "Contra regra"  style="background: #EEE9E9">
            </div>
            <div class="form-group col-md-6">
                <label for="inputCenografo3"><font size="4" face="Verdana">Cenógrafo</font></label>

                <input type = "text" name = "data" class = "form-control" id = "inputCenografo3"
                       placeholder = "Cenógrafo"  style="background: #EEE9E9">
            </div>
        </div>



        <br>
        <div class="form-group">

            <button type = "submit" class = "btn btn-success btn-sm">Cadastrar</button>

            <a href = 'job.php?link=8&id=<?php echo $id_fa; ?>'>
                <button type = 'button' class = 'btn btn-danger2  btn-sm'>Voltar Ficha Apropriação</button>
            </a>

        </div>


    </form>

    <br>

    <br>
</div>












   
