<?php
    $id = $_GET['id'];
    //Executa a consulta
    
    $resultado = $pdo->prepare("SELECT * FROM usuarios WHERE id = '$id' LIMIT 1");
    $nivel_acesso = $pdo->prepare('SELECT id, nome_nivel FROM nivel_acessos');
    
    $resultado->execute();
    $nivel_acesso->execute();
    
    $result = $resultado->fetch(PDO::FETCH_ASSOC);
?>

<div class="container">


        <div class = "col-lg-12">
            <div class = "page-header">
                <h2 id = "tables">Editar</h2>
            </div>
            
            <div >
                <form method = "POST" action = "processa/processa_editar_usuario.php">
                    <div class = "form-group row">
                        <label for = "inputNome3" class = "col-sm-2 col-form-label">Nome</label>
                        <div class = "col-sm-10">
                            <input type = "text" name = "nome" class = "form-control" id = "inputNome3" placeholder = "Nome" value = "<?php echo $result['nome']; ?>">
                        </div>
                        
                        <label for = "inputEmail3" class = "col-sm-2 col-form-label">E-mail</label>
                        <div class = "col-sm-10">
                            <input type = "email" name = "email" class = "form-control" id = "inputEmail3" placeholder = "Email" value = "<?php echo $result['email']; ?>">
                        </div>
                        
                        <label for = "inputUsuario3" class = "col-sm-2 col-form-label">Usuário</label>
                        <div class = "col-sm-10">
                            <input type = "text" name = "usuario" class = "form-control" id = "inputUsuario3" placeholder = "Usuário" value = "<?php echo $result['login']; ?>">
                        </div>
                    </div>
                    
                    <div class = "form-group row">
                        <label for = "inputSenha3" class = "col-sm-2 col-form-label">Senha</label>
                        <div class = "col-sm-10">
                            <input type = "password" name = "senha" class = "form-control" id = "inputSenha" placeholder = "Senha" value = "<?php echo $result['senha']; ?>">
                        </div>
                    </div>

                    <div class = "col-sm-5">
                    
                    <select class = "custom-select" name = "nivel_de_acesso"">
                        <option>Escolha o nível de acesso</option>
                            <?php while ($rna = $nivel_acesso->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $rna['id']; ?>" >
                                    <?php echo $rna['nome_nivel']; ?>
                                </option>
                            <?php } ?>
                    </select>

                    </div>
                    <br>
                    
                    <input type = "hidden" name = "id" value = "<?php echo $result['id']; ?>">
                    
                    <div class = "form-group row">
                        <div class = "col-sm-10">
                            <button type = "submit" class = "btn btn-success btn-sm">Concluir</button>
                        </div>
                    </div>
                    
                    
                </form>
            </div>
        </div>

</div>