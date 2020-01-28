<?php include_once("menu_admin.php"); ?>

<div class="container">

        <div class = "col-lg-12">
            <div class = "page-header">
                <h1 id = "tables">Cadastrar Usuário</h1>
            </div>
            
            <div>
                <form method = "POST" action = "processa/processa_cadastrar_usuario.php">
                    <div class = "form-group row">
                        <label for = "inputNome3" class = "col-sm-2 col-form-label">Nome</label>
                        <div class = "col-sm-10">
                            <input type = "text" name = "nome" class = "form-control" id = "inputNome3" placeholder = "Nome">
                        </div>
                        
                        <label for = "inputEmail3" class = "col-sm-2 col-form-label">E-mail</label>
                        <div class = "col-sm-10">
                            <input type = "email" name = "email" class = "form-control" id = "inputEmail3" placeholder = "Email">
                        </div>
                        
                        <label for = "inputUsuario3" class = "col-sm-2 col-form-label">Usuário</label>
                        <div class = "col-sm-10">
                            <input type = "text" name = "usuario" class = "form-control" id = "inputUsuario3" placeholder = "Usuário">
                        </div>
                    </div>
                    
                    <div class = "form-group row">
                        <label for = "inputSenha3" class = "col-sm-2 col-form-label">Senha</label>
                        <div class = "col-sm-10">
                            <input type = "password" name = "senha" class = "form-control" id = "inputSenha" placeholder = "Senha">
                        </div>
                    </div>
                    <div class = "col-sm-5">
                    <select class = "custom-select" name = "nivel_de_acesso">
                        <option selected>Escolha o nível de acesso</option>
                        <option value = "1">Administrador Sistema</option>
                        <option value = "2">Sócio</option>
                        <option value = "3">Administrativo</option>
                        <option value = "4">Financeiro</option>
                        <option value = "5">Produção</option>
                        <option value = "6">Pós-Produção</option>
                        <option value = "7">TI</option>
                    </select>
                    </div>
                    <br>
                    <div class = "form-group row">
                        <div class = "col-sm-10">
                            <button type = "submit" class = "btn btn-success btn-sm">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

</div>

   
