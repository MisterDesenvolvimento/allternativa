<?php
    include_once("menu_job.php");

   $id_fa = $_GET['id'];
   $resultado = $pdo->prepare("SELECT fa.id as id_fa, fa.titulo as titulofa, 
        date_format(fa.data,'%d/%m/%Y') as data_cadastro, cl.cliente as clientefa, date_format(fa.modified,'%d/%m/%Y') as modificado 
        FROM ficha_apropriacao fa INNER JOIN clientes cl ON fa.id_cliente = cl.id 
        WHERE fa.id = '$id_fa' LIMIT 1");
    
    $resultado->execute();
    $resultado2 = $resultado->fetch(PDO::FETCH_ASSOC);
?>




<div class="container" >


    <br>
    <h1 id = "tables">Faturamento</h1>

    <div class="form-group">
        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="3" face="Verdana">Nome do Cliente:
            <?php
                   echo $resultado2['clientefa'];
            ?></font>
        </div>
        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="3" face="Verdana">Título da Ficha de Apropriação:
            <?php
                    echo $resultado2['titulofa'];
            ?></font>
        </div>
    </div>
    <br>
<form  method = "POST" action = "processa/processa_cadastrar_faturamento.php">

    <INPUT TYPE="hidden" NAME="id_fa" VALUE="<?php echo "$id_fa" ?>">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputNF3"><font size="4" face="Verdana">Número da nota fiscal</font></label>

            <input type = "text" name = "num_nf" class = "form-control" id = "inputNF3"
                   placeholder = "Número da Nota Fiscal" style="background: #EEE9E9">
        </div>
        <div class="form-group col-md-3">
            <label for="txtValor"><font size="4" face="Verdana">Valor R$</font></label>

            <input type="text" name="txtValor" id="txtValor" onKeyUp="moeda(this);" class = "form-control" placeholder = "Valor" style="background: #EEE9E9">

        </div>
        <div class="form-group col-md-3">
            <label for="inputDataVenc3"><font size="4" face="Verdana">Data vencimento</font></label>

            <input type = "date" name = "data_venc" class = "form-control" id = "inputDataVenc3"
                   style="background: #EEE9E9">


        </div>
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

