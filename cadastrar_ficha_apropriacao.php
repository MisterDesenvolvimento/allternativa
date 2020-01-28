<?php
    include_once("menu_job.php");

    $idCli = $_GET['id_cli'];

    $resultado = $pdo->prepare("SELECT id as id_cli, cliente, agencia, email, telefone, created, modified,
    case when situacao_id = 1 then 'Ativo' else 'Inativo' end as situacao FROM clientes ");
    $resultado->execute();
    $resultado2 = $resultado->fetch(PDO::FETCH_ASSOC);



?>




<div class="container">

    <div >
        <h1 id = "tables">Nova Ficha Apropriação</h1>
    </div>

    <br>
       <form method = "POST" action = "processa/processa_cadastrar_ficha_apropriacao.php">

           <div class="form-row">

              <div class="form-group col-md-5">

                <INPUT TYPE="hidden" NAME="id_cliente" VALUE="<?php echo $idCli ?>">

                <label for="inputTitulo3"><font size="4" face="Verdana">Título</font></label>
                <input type = "text" name = "titulo" class = "form-control" id = "inputTitulo3"
                                   placeholder = "Título" >
              </div>


              <div class="form-group col-md-3">
                <label for="inputData3"><font size="4" face="Verdana">Data</font></label>
                <input type = "date" name = "data" class = "form-control" id = "inputData3"
                                   placeholder = "Data">
              </div>

                  <br>

           </div>

            <br>
              <div class="form-group">
                  <button type = "submit" class = "btn btn-success btn-sm">Cadastrar</button>
              </div>

        </form>
                 <br>
 </div>









   
