<?php


	



	
	
	$id = $_GET['id_cli'];
	
	$resultado = $pdo->prepare("SELECT id as id_cli, cliente, agencia, email, telefone, created, modified,
  case when situacao_id = 1 then 'Ativo' else 'Inativo' end as situacao FROM clientes WHERE id = '$id' LIMIT 1");
	
	$resultado->execute();
	
	$result = $resultado->fetch(PDO::FETCH_ASSOC);
?>

<div class="bs-docs-section">
	<div class="row">
					
			<div class = "col-xs-1 col-sm-1 col-md-8">Cliente: <?php echo $result['cliente']; ?> </div><br>
			
			<div class = "col-xs-1 col-sm-1 col-md-8">Agência: <?php echo $result['agencia']; ?> </div>		
	</div>
</div>