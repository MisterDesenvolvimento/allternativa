<?php include_once("menu_admin.php"); ?>

<?php
	$id = $_GET['id'];
	//Executa a consulta
	
	$resultado = $pdo->prepare("select usu.id, nome, email, login, senha, nome_nivel
from usuarios usu
  join nivel_acessos nva on usu.nivel_acesso_id = nva.id where usu.id = $id limit 1");
	
	$resultado->execute();
	
	$result = $resultado->fetch(PDO::FETCH_ASSOC);
?>
<script language="JavaScript" type="text/javascript">
    function checkDelete(){
        return confirm('Você tem certeza que deseja apagar definitivamente o usuário?');
    }
</script>

<div class="container">


    <div class = "col-lg-12">
			<div class = "page-header">
				<h1 id = "tables">Visualizar Usuário</h1>
			</div>
            <br>
			
        <div class = "col-xs-3 col-sm-1 col-md-8"><font size="3" face="Verdana">Id: <?php echo $result['id']; ?></font></div> <br>
			
        <div class = "col-xs-3 col-sm-1 col-md-8"><font size="3" face="Verdana">Nome: <?php echo $result['nome']; ?></font></div><br>
			
        <div class = "col-xs-3 col-sm-1 col-md-8"><font size="3" face="Verdana">E-mail: <?php echo $result['email']; ?></font></div><br>
			
        <div class = "col-xs-3 col-sm-1 col-md-8"><font size="3" face="Verdana">Login: <?php echo $result['login']; ?></font></div><br>
			
        <div class = "col-xs-3 col-sm-1 col-md-8"><font size="3" face="Verdana">Senha: <?php echo $result['senha']; ?></font></div><br>
			
        <div class = "col-xs-3 col-sm-1 col-md-8"><font size="3" face="Verdana">Nivel Acesso: <?php echo $result['nome_nivel']; ?></font></div><br>
			
			<div class = "pull-right">
								
				<a href = 'administrativo.php?link=4&id=<?php echo $result['id']; ?>'>

					<button type = 'button' class = 'btn btn-warning  btn-sm'>Editar</button>
				</a>
				
				<a href = 'processa/processa_apagar_usuario.php?id=<?php echo $result['id']; ?>'>
					<button type = 'button' class = 'btn btn-danger  btn-sm' onclick="return checkDelete()">Apagar</button>
				</a>
			</div>
		</div>

</div>