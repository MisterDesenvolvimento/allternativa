<?php
	include_once("menu_job.php");
	
	$id = $_GET['id_cli'];
    $idAlert=$_GET['idAlert'];

	$resultado = $pdo->prepare("SELECT id as id_cli, cliente, agencia, email, telefone, created, modified, 
      case when situacao_id = 1 then 'Ativo' else 'Inativo' end as situacao, contato_agencia FROM clientes WHERE id = '$id' LIMIT 1");
	
	$resultado->execute();
	
	$result = $resultado->fetch(PDO::FETCH_ASSOC);






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
                            
                             Command: toastr[\"success\"](\"Cliente cadastrado com sucesso!\")                     
                             
                        </script>    
                       
                       ";
        }
    if ($idAlert==3){
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
                                
                                 Command: toastr[\"success\"](\"Cliente editado com sucesso!\")                     
                                 
                            </script>    
                           
                           ";
    }
    if ($idAlert==5){
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
                                    
                                     Command: toastr[\"success\"](\"Ficha Apropriação apagada com sucesso!\")                     
                                     
                                </script>    
                               
                               ";
    }
?>

<script language="JavaScript" type="text/javascript">
    function checkDelete(){
        return confirm('Você tem certeza que deseja apagar definitivamente o cliente?');
    }
</script>

<div class="container">

    <div class = "col-lg-12" >
			
			<div class = "page-header" style="margin-top: -34px!important;">
                <br><br>
				<h1 id = "tables">Visualizar Cliente</h1>
			</div>
            <br>
			
			<div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Código: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['id_cli']; ?> </font></div>
			
			<div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Cliente: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['cliente']; ?> </font></div>
			
			<div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Agência: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['agencia']; ?> </font></div>

        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Contato agência: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['contato_agencia']; ?> </font></div>


        <div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">E-mail: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['email']; ?> </font></div>
			
			<div class = "col-xs-1 col-sm-1 col-md-8"><font size="4" face="Verdana">Telefone: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['telefone']; ?> </font></div><br>

			<div class = "pull-right">

                <a href = 'job.php?link=4&id_cli=<?php echo $result['id_cli']; ?>'>
                    <button type = 'button' class = 'btn btn-warning  btn-sm' ><span class="fas fa-edit"></span> </button>
                </a>

                <a href = 'processa/processa_apagar_cliente.php?id_cli=<?php echo $result['id_cli']; ?>'>
                    <button type = 'button' class = 'btn btn-danger  btn-sm' onclick="return checkDelete()"><i class="fas fa-eraser"></i></button>
                </a>


				<a href = 'job.php?link=6&id_cli=<?php echo $id; ?>'>
					<button type = 'button' class = 'btn btn-info  btn-sm'>Nova Ficha de Apropriação</button>
				</a>
			</div>
			
			<?php
				$sql = "SELECT fa.id as idfa, fa.titulo, date_format(fa.data,'%d/%m/%Y') as criado, 
                cl.cliente, coalesce(date_format(fa.modified,'%d/%m/%Y'),'Nenhuma') as modificado 
                FROM ficha_apropriacao fa INNER JOIN clientes cl ON fa.id_cliente = cl.id WHERE cl.id = $id order by idfa desc ";
				
				$resultado2 = $pdo->prepare($sql);
				
				$resultado2->execute();
                $result100 = $resultado2->fetch(PDO::FETCH_ASSOC);

				$idfa = $result100['idfa'];


            ?>

        <?php

        if($idfa != 0){
        ?>

			<div class = "bs-docs-section" style="margin-top: 3em!important;>
				<div class = "row">
					<div class = "col-lg-12">
						<div class = "page-header">
							<h2 id = "tables">Fichas de Apropriação</h2>
						</div>
						
						<div>
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

                                    $sql2 = "SELECT fa.id as idfa, fa.titulo, date_format(fa.data,'%d/%m/%Y') as criado, 
                                        cl.cliente, coalesce(date_format(fa.modified,'%d/%m/%Y'),'Nenhuma') as modificado 
                                        FROM ficha_apropriacao fa INNER JOIN clientes cl ON fa.id_cliente = cl.id WHERE cl.id = $id order by idfa desc ";

                                    $resultado200 = $pdo->prepare($sql2);

                                    $resultado200->execute();


                                    foreach ($resultado200 as $row) {  ?>
										<tr onclick=" document.location='job.php?link=8&id=<?php echo $idfa; ?>&idAlert=1' ">
									<?php
										echo "<td><font size=\"3\" face=\"Verdana\">" . $row['idfa'] . "</font></td>";
										echo "<td><font size=\"3\" face=\"Verdana\">" . $row['titulo'] . "</font></td>";
										echo "<td><font size=\"3\" face=\"Verdana\">" . $row['criado'] . "</font></td>";
										echo "<td><font size=\"3\" face=\"Verdana\">" . $row['cliente'] . "</font></td>";

									?>

										<?php echo "</tr>"; } ?>
								</tbody>
							</table>
                            <?php
                            } else {

                            }

                            ?>
						</div>
					</div>
				</div>
			</div>
    </div>
</div>