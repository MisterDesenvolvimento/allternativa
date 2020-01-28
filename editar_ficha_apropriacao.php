<?php
    $id = $_GET['id'];
    //Executa a consulta
    
    $resultado = $pdo->prepare("SELECT * FROM ficha_apropriacao WHERE id = '$id' LIMIT 1");
    
    $resultado->execute();
    
    $result = $resultado->fetch(PDO::FETCH_ASSOC);
?>

<div class="container">

    <div class = "col-lg-12" >
      <br>
        <h1 id = "tables">Editar Ficha de Apropriação</h1>

            <form method = "POST" action = "processa/processa_editar_ficha_apropriacao.php">

                    <div class="row">
                        <div class = "col-5">
                            <label for = "inputTitulo3" ><font size="4" face="Verdana">Título</font></label>

                            <input type = "text" name = "titulo" class = "form-control" id = "inputTitulo3"
                                       placeholder = "Título" value = "<?php echo $result['titulo']; ?>">
                        </div>
                        <div class = "col-4">
                            <label for = "inputData3" ><font size="4" face="Verdana">Data</font></label>

                            <input type = "date" name = "data" class = "form-control" id = "inputData3"
                                       placeholder = "Data" value = "<?php echo $result['data']; ?>">
                        </div>
                    </div>

                    
                 <input type = "hidden" name = "id" value = "<?php echo $result['id']; ?>">
                    <br>
                    <div>
                    <button type = "submit" class = "btn btn-success btn-sm">Concluir</button>


                    </div>
                   <br>

          </form>
    </div>
</div>



   
