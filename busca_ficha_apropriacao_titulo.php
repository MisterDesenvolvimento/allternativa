<?php
    $busca = $_POST['busca'];

$sql = "SELECT fa.id as idfa, fa.titulo, fa.data , cl.cliente as cli, fa.modified as famod 
 FROM clientes cl join ficha_apropriacao fa on fa.id_cliente = cl.id 
 WHERE fa.titulo LIKE '%$busca%' order by idfa desc";

    $resultado = $pdo->prepare($sql);
    $resultado->execute();
    
    $numero_linhas = $resultado->rowCount();
?>

<div class="container">




    <div class = "col-lg-12" >

            <div class = "page-header">
                <h1 id = "tables">Listar Fichas de Apropriação por Título</h1>
            </div>
        <?php
        if($numero_linhas != 0){ ?>

        <br>
                <table class = "table table-hover">
                    <thead>
                        <tr style="background: #CDCDC1;">
                            <th scope = "col"><font size="3" face="Verdana">Código</font></th>
                            <th scope = "col"><font size="3" face="Verdana">Título</font></th>
                            <th scope = "col"><font size="3" face="Verdana">Data Criação</font></th>
                            <th scope = "col"><font size="3" face="Verdana">Cliente</font></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($resultado as $row) { ?>
                             <tr onclick='document.location="job.php?link=8&id=<?php echo $row['idfa']; ?>&idAlert=1"'>
                         <?php  echo "<td><font size=\"3\" face=\"Verdana\">" . $row['idfa'] . "</font></td>";
                                echo "<td><font size=\"3\" face=\"Verdana\">" . $row['titulo'] . "</font></td>";
                                echo "<td><font size=\"3\" face=\"Verdana\">" . $row['data'] . "</font></td>";
                                echo "<td><font size=\"3\" face=\"Verdana\">" . $row['cli'] . "</font></td>";

                        ?>



                            <?php echo "</tr>"; } ?>
                    </tbody>
                </table>
                <br>
    </div>
 </div>
<?php
}else{


    echo "   <script type=\"text/javascript\">
                    
                         toastr.options = {
                          \"closeButton\": false,
                          \"debug\": false,
                          \"newestOnTop\": false,
                          \"progressBar\": false,
                          \"positionClass\": \"toast-bottom-left\",
                          \"preventDuplicates\": false,
                          \"onclick\": null,
                          \"showDuration\": \"300000\",
                          \"hideDuration\": \"1000000\",
                          \"timeOut\": \"5000000\",
                          \"extendedTimeOut\": \"1000000\",
                          \"showEasing\": \"swing\",
                          \"hideEasing\": \"linear\",
                          \"showMethod\": \"fadeIn\",
                          \"hideMethod\": \"fadeOut\"
                        }
                        
                        
                         Command: toastr[\"error\"](\"Nenhum resultado encontrado! Volte a página inicial para nova busca.\")
                         
                         
                    </script>";}

?>
  