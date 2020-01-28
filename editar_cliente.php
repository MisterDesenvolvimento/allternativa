<?php
    $id = $_GET['id_cli'];
    
    //prepara a consulta
    $resultado = $pdo->prepare("SELECT id as id_cli, cliente, agencia, email, telefone, created, modified, situacao_id,
                                          contato_agencia FROM clientes WHERE id = '$id' LIMIT 1");
    
    //executa a consulta
    $resultado->execute();
    
    $result = $resultado->fetch(PDO::FETCH_ASSOC);
?>

<div class="container">

        <div class = "col-lg-12">
            <div class = "page-header">
                <h1 id = "tables">Editar Cliente</h1>
            </div>
<br><br>
            <form method = "POST" action = "processa/processa_editar_cliente.php">

                <div class = "form-group row">

                    <div class="form-group col-md-5">
                        <label for="inputCliente3"><font size="4" face="Verdana">Cliente</font></label>

                        <input type = "text" name = "cliente" class = "form-control-plaintext" id = "inputCliente3"
                               autocomplete = "cliente" placeholder = "Cliente" value = "<?php echo $result['cliente']; ?>">
                    </div>
                    <br>
                    <div class="form-group col-md-5">
                        <label for="inputAgencia3"><font size="4" face="Verdana">Agência</font></label>

                        <input type = "text" name = "agencia" class = "form-control" id = "inputAgencia3"
                               autocomplete = "agencia" placeholder = "Agência" value = "<?php echo $result['agencia']; ?>">
                    </div>
                    <br>
                    <div class="form-group col-md-4">
                        <label for="inputAgenciaCont3"><font size="4" face="Verdana">Contato Agência</font></label>

                        <input type = "text" name = "contatoAgencia" class = "form-control" id = "inputAgenciaCont3"
                               autocomplete = "agencia" placeholder = "Agência" value = "<?php echo $result['contato_agencia']; ?>">
                    </div>
                    <br>
                    <div class="form-group col-md-4">
                        <label for="inputEmail3"><font size="4" face="Verdana">Email</font></label>

                        <input type = "email" name = "email" class = "form-control" id = "inputEmail3"
                               autocomplete = "email" placeholder = "Email" value = "<?php echo $result['email']; ?>">
                    </div>
                    <br>
                    <div class="form-group col-md-2">
                        <label for="inputTelefone3"><font size="4" face="Verdana">Telefone</font></label>

                        <input type = "text" name = "telefone" class = "form-control" id = "inputTelefone3"
                               autocomplete = "telefone" placeholder = "Telefone" value = "<?php echo $result['telefone']; ?>">
                    </div>
                    <br>
                    <div class="form-group col-md-3">
                        <select class = "custom-select" name = "situacao">
                            <option>Situação do cliente</option>
                            <option value = "1"
                                <?php if ($result['situacao_id'] == 1) {
                                    echo 'selected';
                                } ?> > Ativo
                            </option>
                            <option value = "2"
                                <?php if ($result['situacao_id'] == 2) {
                                    echo 'selected';
                                } ?> >Não Ativo
                            </option>>
                        </select>
                    </div>
                    <input type = "hidden" name = "id_cli" value = "<?php if (!empty($result)) {
                        echo $result['id_cli'];
                    } ?>">
                </div>
                <br>
                <div class = "form-group row">
                    <div class = "col-sm-10">
                        <button type = "submit" class = "btn btn-success btn-sm">Concluir</button>
                    </div>
                </div>
            </form>
        </div>
</div>



