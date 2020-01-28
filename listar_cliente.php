<?php

    $idAlert=$_GET['idAlert'];

    $sql = "SELECT id as id_cli, cliente, agencia, email, telefone, created, modified, 
    case when (situacao_id = 1) then 'Ativo' else 'Inativo' 
    end as situacao FROM clientes ORDER BY cliente  ";
    
    $resultado = $pdo->prepare($sql);
    
    $resultado->execute();
    $numero_linhas = $resultado->rowCount();


if ($idAlert==1){
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
                                    
                                     Command: toastr[\"success\"](\"Cliente apagado com sucesso!\")                     
                                     
                                </script>    
                               
                               ";
}

?>



<div class="container">
    <div class = "col-lg-12" >

            <div class = "page-header">
                <h1 id = "tables">Clientes</h1>
            </div>
            
            <form action = "job.php?link=10" method = "post">
                <input type = "text" name = "busca" id = "busca" placeholder="Buscar Cliente"/>
                <input type = "submit" Value = "Buscar"/>
            </form>
        <br>
            <div >
                <table class = "table table-hover">
                    <thead>
                        <tr style="background: #CDCDC1;">
                            <th scope = "col"><font size="3" face="Verdana">ID</font></th>
                            <th scope = "col"><font size="3" face="Verdana">Cliente</font></th>
                            <th scope = "col"><font size="3" face="Verdana">Agência</font></th>
                            <th scope = "col"><font size="3" face="Verdana">E-mail</th>
                            <th scope = "col"><font size="3" face="Verdana">Telefone</font></th>
                            <th scope = "col"></th>

                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($resultado as $row) { $id_cli = $row['id_cli']; ?>
								<tr onclick='document.location="job.php?link=5&id_cli=<?php echo $id_cli; ?>&idAlert=1"'>
						<?php echo "<td><font size=\"3\" face=\"Verdana\">" . $row['id_cli'] . "</font></td>";
								echo "<td><font size=\"3\" face=\"Verdana\">" . $row['cliente'] . "</font></td>";
								echo "<td><font size=\"3\" face=\"Verdana\">" . $row['agencia'] . "</font></td>";
								echo "<td><font size=\"3\" face=\"Verdana\">" . $row['email'] . "</font></td>";
								echo "<td><font size=\"3\" face=\"Verdana\">" . $row['telefone'] . "</font></td>";
								echo "<td><font size=\"3\" face=\"Verdana\">" . $row['situacao'] . "</font></td>";
								?>

                        <td>




                            <?php echo "</tr>"; } ?>
                    </tbody>
                </table>
            </div><br><br>
        </div>

</div>
