
<?php

$resultado = $pdo->prepare("SELECT id as id_cli, cliente, agencia, email, telefone, created, modified,
    case when situacao_id = 1 then 'Ativo' else 'Inativo' end as situacao FROM clientes ");
$resultado->execute();
$resultado2 = $resultado->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT id, cliente FROM clientes order by 'id'";
$result = $pdo->prepare($sql);
$result->execute();
$resultado3 = $result->fetch(PDO::FETCH_ASSOC);

?>


<div class="container" >
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-left",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        Command: toastr["info"]("Benvindo!")

    </script>
    <div class = "row">

        <div class = "col-lg-6"  align="left">

            <h1 id = "tables">Buscar Ficha de Apropriação</h1>
             <br>


            <div class = "col-sm-6" >
                <form action = "job.php?link=11" method = "post">
                <div class="form-row" >
                    <div class="form-group col-md-10"  >
                          <input type = "number" name = "busca"  class = "form-control" placeholder="Por número"/>
                    </div>
                    <div class="form-group col-md-2"  >
                          <button type = "submit" class = "btn btn-success btn-sm"><span class="fas fa-search"></span></button>
                    </div>
                </div>
                 </form>
             </div>

            <div class = "col-sm-6"  >
                <form action = "job.php?link=22" method = "post">
                <div class="form-row" >
                    <div class="form-group col-md-10"  >
                       <input type = "text" name = "busca"  class = "form-control" placeholder="Por título"/>
                    </div>
                    <div class="form-group col-md-2"  >
                        <button type = "submit" class = "btn btn-success btn-sm"><span class="fas fa-search"></span></button>
                    </div>
                </div>
                </form>
            </div>
        </div>



        <div class = "col-lg-6" align="left"">

           <h1 id = "tables">Nova Ficha Apropriação</h1>

           <form method = "POST" action = "processa/processa_cadastrar_ficha_apropriacao.php">
              <br>
           <div class="form-row" >

              <div class="form-group col-md-6"  >
                   <label for="inputTitulo3"><font size="4" face="Verdana">Título</font></label>
                   <input type = "text" name = "titulo" class = "form-control" id = "inputTitulo3"
                                   placeholder = "Título" >
              </div>
              <br><br>
              <div class="form-group col-md-5">
                   <label for="inputData3"><font size="4" face="Verdana">Data</font></label>
                   <input type = "date" name = "data" class = "form-control" id = "inputData3"
                                   placeholder = "Data">
              </div>
              <br><br>
              <div class = "col-sm-8"  align="center">
                   <select name="id_cliente" class = "form-control">
                      <option>Selecione um cliente</option>
                         <?php
                         $sql99 = "SELECT id, cliente FROM clientes order by 'id'";
                         $result99 = $pdo->prepare($sql99);
                         $result99->execute();


                         while($linha = $result99->fetch(PDO::FETCH_ASSOC)) { ?>
                      <option value="<?php echo $linha['id'] ?>"><?php echo $linha['cliente'] ?></option>
                         <?php } ?>
                          </select>
              </div>
              <br>
              <br> <br> <br>
              <div class = "col-sm-12"  align="left">
                  <button type = "submit" class = "btn btn-success btn-sm">Cadastrar</button>
              </div>
           </div>
           </form>
           <br>
         </div>
    </div>
</div>



















