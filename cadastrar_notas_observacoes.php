<?php
    include_once("menu_job.php");
    
    $id_fa = $_GET['id'];
    $idAlert = $_GET['idAlert'];

    $sql = "SELECT  id_usuario, mensagem, id_ficha_apropriacao, date_format(data,\"%d/%m/%Y %H:%i:%s\") as data FROM notas_observacoes  
                    WHERE id_ficha_apropriacao = $id_fa ORDER BY id";

    $resultado = $pdo->prepare($sql);
    $resultado->execute();
    $numero_linhas = $resultado->rowCount();

    $sql2 = "SELECT id, id_ficha_apropriacao FROM notas_observacoes WHERE id_ficha_apropriacao = $id_fa";
    $resultado2 = $pdo->prepare($sql2);
    $resultado2->execute();
    $result = $resultado2->fetch(PDO::FETCH_ASSOC);
    $idfat = $result['id'];

        if ($idAlert==0){
            echo  "
                                
                                <script type=\"text/javascript\">
                                
                                     toastr.options = {
                                      \"closeButton\": false,
                                      \"debug\": false,
                                      \"newestOnTop\": false,
                                      \"progressBar\": false,
                                      \"positionClass\": \"toast-bottom-left\",
                                      \"preventDuplicates\": false,
                                      \"onclick\": null,
                                      \"showDuration\": \"300\",
                                      \"hideDuration\": \"1000\",
                                      \"timeOut\": \"5000\",
                                      \"extendedTimeOut\": \"1000\",
                                      \"showEasing\": \"swing\",
                                      \"hideEasing\": \"linear\",
                                      \"showMethod\": \"fadeIn\",
                                      \"hideMethod\": \"fadeOut\"
                                    }                    
                                    
                                     Command: toastr[\"success\"](\"Nota adicionada com sucesso!\")                     
                                     
                                </script>    
                               
                               ";
        }


?>

<div class="container">
    <br>
    <h1 id = "tables">Notas e Observações</h1>
    <br>

    <form method = "POST" action = "processa/processa_cadastrar_notas.php">
        <INPUT TYPE="hidden" NAME="idfa" VALUE="<?php echo "$id_fa" ?>">


        <div class="form-group col-md-10">
            <label for="texto" ><font size="4" face="Verdana">Mensagem</font></label>

                <textarea class = "form-control" name = "mensagem" id = "texto" rows = "3" style="background-color:#F5F5F5" placeholder = "Escreva aqui..."></textarea>

        </div>
        <div class="form-group">

          <button type = "submit" class = "btn btn-success btn-sm">Enviar</button>
        </div>
    </form>
    <br><br>
    <?php

    if($idfat != 0){
    ?>

    <table class = "table table-hover">
        <thead>
        <tr style="background: #CDCDC1;">
            <th scope = "col"><font size="4" face="Verdana">Data</font></th>
            <th scope = "col"><font size="4" face="Verdana">Mensagem</font></th>
            <th scope = "col"><font size="4" face="Verdana">Usuário</font></th>
        </tr>
        </thead>
        <tbody>

        <?php

        foreach ($resultado as $row) { ?>
        <?php  echo "<td><font size=\"3\" face=\"Verdana\">" . $row['data'] . "</font></td>";
        echo "<td><font size=\"3\" face=\"Verdana\">" . $row['mensagem'] . "</font></td>";
        echo "<td><font size=\"3\" face=\"Verdana\">" . $_SESSION['usuarioNome'] . "</font></td>";
        ?>
        
            <?php echo "</tr>"; } ?>
        </tbody>
    </table>

    <?php
    } else {

    }
    ?>

    <br>
    <div class="form-group">
        <a href = 'job.php?link=8&id=<?php echo $id_fa; ?>&idAlert=1'>
            <button type = 'button' class = 'btn btn-danger2  btn-sm'>Voltar Ficha Apropriação</button>
        </a>
    </div>

    <br><br>

</div>



