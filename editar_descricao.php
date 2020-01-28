<?php
    $id = $_GET['id'];
    //Executa a consulta
    
    $resultado = $pdo->prepare("SELECT * FROM descricao WHERE id = '$id' LIMIT 1");
    $resultado->execute();
    $result = $resultado->fetch(PDO::FETCH_ASSOC);
    $id_fa = $result['id_ficha_cliente'];
?>
<div class="container">

    <div class = "col-lg-12" >

                <br>
                <h1 id = "tables">Editar Descrição</h1>

                <form method = "POST" action = "processa/processa_editar_descricao.php">
                    <br>
                    <div class="form-row">

                        <div class="form-group col-md-5">


                            <label for="inputProduto3"><font size="4" face="Verdana">Produto</font></label>


                            <input type = "text" name = "produto" class = "form-control" id = "inputProduto3"
                                   placeholder = "Produto" value = "<?php echo $result['produto']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDirecao3"><font size="4" face="Verdana">Direção</font></label>

                            <input type = "text" name = "direcao" class = "form-control" id = "inputDirecao3"
                                   placeholder = "Direção" value = "<?php echo $result['direcao']; ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputDuracao3"><font size="4" face="Verdana">Duração</font></label>

                            <input type = "text" name = "duracao" class = "form-control" id = "inputDuracao3"
                                   placeholder = "Duração" value = "<?php echo $result['duracao']; ?>">
                        </div>

                    </div>

                    
                    <input type = "hidden" name = "id" value = "<?php echo $result['id']; ?>">


                    <div >
                            <button type = "submit" class = "btn btn-success btn-sm">Concluir</button>

                            



                    </div>

                </form>

    </div>
                <br>
</div>




   
