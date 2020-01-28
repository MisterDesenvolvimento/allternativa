<?php
	$sql = "SELECT usu.id, usu.nome, usu.email, nva.nome_nivel FROM usuarios usu
  join nivel_acessos nva on usu.nivel_acesso_id = nva.id order by usu.id";
	
	$resultado = $pdo->prepare($sql);
	
	$resultado->execute();
	
	$numero_linhas = $resultado->rowCount();
?>
<div class="container">


    <div class = "col-lg">
			<div class = "page-header">
				<h1 id = "tables">Listar Usuário</h1>
			</div>
			
			<div>
				<table class = "table table-hover table-responsive-lg">
					<thead>
						<tr>
							<th scope = "col">ID</th>
							<th scope = "col">Nome</th>
							<th scope = "col">E-mail</th>
							<th scope = "col">Nivel de Acesso</th>

						</tr>
					</thead>
					<tbody>
					<?php foreach ($resultado as $row) { $id = $row['id']; ?>
							<tr onclick=" document.location= 'administrativo.php?link=5&id=<?php echo $id; ?>' ">
					<?php	echo "<td>" . $row['id'] . "</td>";
							echo "<td>" . $row['nome'] . "</td>";
							echo "<td>" . $row['email'] . "</td>";
							echo "<td>" . $row['nome_nivel'] . "</td>";
					?>
					

						<?php echo "</tr>"; } ?>
					</tbody>
				</table>
			</div>
		</div>

</div>