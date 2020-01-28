<?php
    $sql = "SELECT fa.id, fa.titulo, fa.data, cl.cliente, fa.modified FROM ficha_apropriacao fa 
    INNER JOIN clientes cl ON fa.id_cliente = cl.id ORDER BY id";
    
    $resultado = $pdo->prepare($sql);
    $resultado->execute();
    $numero_linhas = $resultado->rowCount();
?>

<div class="container">


            <div class = "col-lg-12" >
            <br>
                <h1 id = "tables">Fichas de Apropriação</h1>
                <br>
                <div class = "col-lg-4" >
            <form action = "job.php?link=11" method = "post">
                <input type = "text" name = "busca" placeholder="Buscar por número"/>
                <input type = "submit" Value = "OK"/>
            </form>
                </div>
                <br>
                <table class = "table table-hover">
                    <thead>
						<tr>
                            <th scope = "col"><font size="3" face="Verdana">Código</font></th>
							<th scope = "col"><font size="3" face="Verdana">Título</font></th>
							<th scope = "col"><font size="3" face="Verdana">Data Criação</font></th>
							<th scope = "col"><font size="3" face="Verdana">Cliente</font></th>
							<th scope = "col"><font size="3" face="Verdana">Última modificação</font></th>
						
						</tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($resultado as $row) { ?>
                    <tr onclick='document.location="job.php?link=8&id=<?php echo $row['id']; ?>"'>
                        <?php  echo "<td>" . $row['id'] . "</td>";
                        echo "<td><font size=\"3\" face=\"Verdana\">" . $row['titulo'] . "</font></td>";
                        echo "<td><font size=\"3\" face=\"Verdana\">" . $row['data'] . "</font></td>";
                        echo "<td><font size=\"3\" face=\"Verdana\">" . $row['cliente'] . "</font></td>";
                        echo "<td><font size=\"3\" face=\"Verdana\">" . $row['modified'] . "</font></td>";

                        ?>

                        <td>

                            <a href = 'job.php?link=9&id=<?php echo $row['id']; ?>'>
                                <button type = 'button' class = 'btn btn-warning  btn-sm'>Editar</button>
                            </a>
                            <a href = 'job.php?link=12&id=<?php echo $row['id']; ?>'>
                                <button type = 'button' class = 'btn btn-danger  btn-sm'>Apagar</button>
                            </a>
                        </td>


							<?php echo "</tr>"; } ?>
                    </tbody>
				</table>
                <br>
			</div>
		</div>

