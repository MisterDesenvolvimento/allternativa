<?php
    include_once("menu_job.php");

	$id_fa = $_GET['id'];
    
    $resultado = $pdo->prepare("SELECT fa.id, fa.titulo as titulo, cl.id, cl.cliente as cliente  FROM ficha_apropriacao fa 
      JOIN clientes cl ON   fa.id_cliente = cl.id 
      WHERE fa.id = '$id_fa' LIMIT 1");

    $resultado->execute();
    $resultado2 = $resultado->fetch(PDO::FETCH_ASSOC);
?>


<div class="container" >

    <br>
    <h1 id = "tables">Descrição</h1>
    <div class="form-group">
        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="3" face="Verdana">Nome do Cliente:
            <?php
                echo $resultado2['cliente'];
            ?></font>
        </div>
        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="3" face="Verdana">Título da Ficha de Apropriação:
            <?php
                echo $resultado2['titulo'];
            ?></font>
        </div>
    </div>
<br>

    <form method = "POST" action = "processa/processa_cadastrar_descricao.php">

        <INPUT TYPE="hidden" NAME="id_fa" VALUE="<?php echo "$id_fa" ?>">

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputProduto3"><font size="4" face="Verdana">Produto</font></label>

                <input type = "text" name = "produto" class = "form-control" id = "inputProduto3"
                       placeholder = "Produto"  style="background: #EEE9E9">

            </div>
            <div class="form-group col-md-4">
                <label for="inputDirecao3"><font size="4" face="Verdana">Direção</font></label>

                <input type = "text" name = "direcao" class = "form-control" id = "inputDirecao3"
                       placeholder = "Direção"  style="background: #EEE9E9">
            </div>
        </div>
        <div class="form-row col-md-4">

            <label for="inputDuracao3"><font size="4" face="Verdana">Duração</font></label>

            <input type = "text" name = "duracao" class = "form-control" id = "inputDuracao3"
                   placeholder = "Duração"  style="background: #EEE9E9">

        </div>


        <br>
        <div class="form-group">

            <button type = "submit" class = "btn btn-success btn-sm">Cadastrar</button>

            <a href = 'job.php?link=8&id=<?php echo $id_fa; ?>&idAlert=1'>
                <button type = 'button' class = 'btn btn-danger2  btn-sm'>Voltar Ficha Apropriação</button>
            </a>

        </div>


    </form>

    <br>

    <br>
</div>



   
