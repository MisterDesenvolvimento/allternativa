<?php
    $id_pre = $_GET['id_pre'];
    $id_pag = $_GET['id_pag'];
    //Executa a consulta
    
    $resultado = $pdo->prepare("SELECT * FROM prestadores_servicos WHERE id = '$id_pre' LIMIT 1");
    $resultado->execute();
    $result = $resultado->fetch(PDO::FETCH_ASSOC);
    $nomePres = $result['nome'];
    $documento = $result['documento'];
    $banco = $result['banco'];
    $agencia = $result['agencia'];
    $conta = $result['conta'];
?>
<div class="container">

    <div class = "col-lg-12" >
         <br>
         <h1 id = "tables">Editar Prestador de Serviço</h1>

        <form method = "POST" action = "processa/processa_editar_prestador.php">
            <fieldset>
                <div class = "form-group row">
                    <INPUT TYPE="hidden" NAME="id_pag" VALUE="<?php echo "$id_pag" ?>">
                    <INPUT TYPE="hidden" NAME="id_pre" VALUE="<?php echo "$id_pre" ?>">

                    <div class = "col-sm-6">
                        <label for="inputNome3"><font size="2" face="Verdana">Nome</font></label>
                        <input type = "text" name = "prestador_nome" class = "form-control-plaintext" id = "inputNome3"
                               placeholder = "Nome" VALUE="<?php echo "$nomePres" ?>">
                    </div>

                    <div class = "col-sm-6">
                        <label for="inputDocumento3"><font size="2" face="Verdana">Documento</font></label>
                        <input type = "text" name = "documento" class = "form-control" id = "inputDocumento3"
                               placeholder = "Documento ('tipo de documento' 'número' 'órgão')" VALUE="<?php echo "$documento" ?>">
                    </div>

                    <div class = "col-sm-4">
                        <label for="inputBanco3"><font size="2" face="Verdana">Banco</font></label>

                        <input type = "text" name = "banco" class = "form-control" id = "inputBanco3"
                               placeholder = "Banco" VALUE="<?php echo "$banco" ?>">
                    </div>

                    <div class = "col-sm-4">
                        <label for="inputAgencia3"><font size="2" face="Verdana">Agência</font></label>

                        <input type = "text" name = "agencia" class = "form-control" id = "inputAgencia3"
                               placeholder = "Agência" VALUE="<?php echo "$agencia" ?>">
                    </div>

                    <div class = "col-sm-4">
                        <label for="inputConta3"><font size="2" face="Verdana">Conta</font></label>

                        <input type = "text" name = "conta" class = "form-control" id = "inputConta3"
                               placeholder = "Conta" VALUE="<?php echo "$conta" ?>">
                    </div>
                </div><br>
                <div class = "form-group row">
                    <div class = "col-sm-10">
                        <button type = "submit" class = "btn btn-success btn-sm">Editar</button>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
                <br>
</div>




   
