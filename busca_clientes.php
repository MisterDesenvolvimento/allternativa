<?php
    $busca = $_POST['busca'];
    
    $sql = "SELECT cli.id as id_cli, cli.cliente, cli.agencia, cli.email, cli.telefone, sit.estado FROM clientes cli 
    join situacao sit on cli.situacao_id = sit.id WHERE cli.cliente LIKE '%$busca%' order by cli.cliente";
    
    $resultado = $pdo->prepare($sql);
    $resultado->execute();
    
    $numero_linhas = $resultado->rowCount();
?>
<div class="container">
    <div class = "col-lg-12" >
        <br>
            <div class = "page-header">
                <h1 id = "tables">Clientes</h1>
            </div>
            
            <form action = "job.php?link=10" method = "post">
                <input type = "text" name = "busca"/>
                <input type = "submit" Value = "Buscar"/>
            </form>
            
            <div>
                <table class = "table table-hover">
                    <thead>
                        <tr style="background: #CDCDC1;">
                            <th scope = "col"><font size="3" face="Verdana">ID</font></th>
                            <th scope = "col"><font size="3" face="Verdana">Cliente</font></th>
                            <th scope = "col"><font size="3" face="Verdana">Agência</font></th>
                            <th scope = "col"><font size="3" face="Verdana">E-mail</font></th>
                            <th scope = "col"><font size="3" face="Verdana">Telefone</font></th>
                            <th scope = "col"><font size="3" face="Verdana">Situação</font></th>
                        
                        </tr>
                    </thead>




                    <tbody>
                        <?php foreach ($resultado as $row) { $id_cli = $row['id_cli']; ?>
                                <tr onclick='document.location="job.php?link=5&id_cli=<?php echo $id_cli; ?>&idAlert=1"'>
                            <?php 
                                
                                echo "<td><font size=\"3\" face=\"Verdana\">" . $row['id_cli'] . "</font></td>";
                                echo "<td><font size=\"3\" face=\"Verdana\">" . $row['cliente'] . "</font></td>";
                                echo "<td><font size=\"3\" face=\"Verdana\">" . $row['agencia'] . "</font></td>";
                                echo "<td><font size=\"3\" face=\"Verdana\">" . $row['email'] . "</font></td>";
                                echo "<td><font size=\"3\" face=\"Verdana\">" . $row['telefone'] . "</font></td>";
                                echo "<td><font size=\"3\" face=\"Verdana\">" . $row['estado'] . "</font></td>";
                            ?>
                        
                            <td>

                                
                                <?php echo "</tr>"; } ?>
                    </tbody>
                </table>
            </div>
        </div>

</div>

	 
  