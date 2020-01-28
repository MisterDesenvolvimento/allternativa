<?php include_once("menu_job.php"); ?>


    <div class="container">

        <div class = "col-lg-12" >
        <br>

            <div class = "page-header">
                <h1 id = "tables">Cadastrar Prestador de Serviço</h1>
            </div>
            <br>
            <div>
                <form method = "POST" action = "processa/processa_cadastrar_cliente.php">
                    <fieldset>
                    <div class = "form-group row">

                        <div class = "col-sm-10">
                            <input type = "text" name = "prestador_nome" class = "form-control-plaintext" id = "inputNome3"
                                   placeholder = "Nome">
                        </div>
                        <br><br><br>
                        <div class = "col-sm-10">
                            <input type = "text" name = "documento" class = "form-control" id = "inputDocumento3"
                                   placeholder = "Documento ( "tipo de documento" "número" "órgão expedidor") >
                        </div>
                       </div><br>
                        <div class = "form-group row">
                            <div class = "col-sm-10">
                                <button type = "submit" class = "btn btn-success btn-sm">Cadastrar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
    </div>
    </div>



   
