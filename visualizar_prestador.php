<?php
    include_once("menu_job.php");

    $id_pre = $_GET['id'];
    $id_pag = $_GET['id_pag'];
    
    $resultado = $pdo->prepare("SELECT id , nome, documento, 
        banco, agencia, conta
        FROM prestadores_servicos WHERE id = '$id_pre' LIMIT 1");

    $resultado->execute();
    $result = $resultado->fetch(PDO::FETCH_ASSOC);
    $banco = $result['banco'];


?>



<div class="container" >
          <h1 id = "tables">Prestador Serviço</h1>



            <div class="form-group">
                <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Nome: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['nome']; ?></font></div>
                <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Documento: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['documento']; ?></font></div>
                    <?php
                        if($banco != null){

                    ?>
                <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Banco: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['banco']; ?></font></div>
                <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Agência: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['agencia']; ?></font></div>
                <div class = "col-xs-3 col-sm-1 col-md-8"><font size="4" face="Verdana">Conta: </font><font size="3" face="Verdana" color="#2F4F4F"><?php echo $result['conta']; ?></font></div>


              <?php  }else{ }?>



             </div>
    <div class="col-12">

           <a href = 'job.php?link=35&id_pre=<?php echo $id_pre; ?>&id_pag=<?php echo $id_pag; ?>'>
               <button type = 'button' class = 'btn btn-warning  btn-sm'><span class="fas fa-edit"></span> </button>
           </a>
           <a href = 'job.php?link=28&id=<?php echo $id_pag; ?>&idAlert=1'>
               <button type = 'button' class = 'btn btn-info  btn-sm'>Voltar pagamento</button>
           </a>
           <br><br>
     </div>

    <br><br>
</div>



