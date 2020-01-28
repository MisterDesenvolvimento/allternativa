<?php include_once("menu_job.php"); ?>

<script type="text/javascript">
    function mascara(t, mask){
        var i = t.value.length;
        var saida = mask.substring(1,0);
        var texto = mask.substring(i)
        if (texto.substring(0,1) != saida){
            t.value += texto.substring(0,1);
        }
    }
</script>


 <div class="container">

       <div class = "page-header">
        <h1 id = "tables">Cadastrar Cliente</h1>
       </div>
            <br>

       <form method = "POST" action = "processa/processa_cadastrar_cliente.php">

       <div class = "form-group row">

          <div class="form-group col-md-5">
            <label for="inputCliente3"><font size="4" face="Verdana">Cliente</font></label>

            <input type = "text" name = "cliente" class = "form-control-plaintext" id = "inputCliente3"
                   placeholder = "Cliente">
          </div>
            <br>
          <div class="form-group col-md-5">
              <label for="inputAgencia3"><font size="4" face="Verdana">Agência</font></label>

              <input type = "text" name = "agencia" class = "form-control" id = "inputAgencia3"
                    placeholder = "Agência">
          </div>
              <br>
           <div class="form-group col-md-4">
               <label for="inputAgenciaCont3"><font size="4" face="Verdana">Contato Agência</font></label>

               <input type = "text" name = "contatoAgencia" class = "form-control" id = "inputAgenciaCont3"
                      placeholder = "Contato Agência">
           </div>
           <br>
          <div class="form-group col-md-4">
             <label for="inputEmail3"><font size="4" face="Verdana">Email</font></label>

             <input type = "email" name = "email" class = "form-control" id = "inputEmail3"
                     placeholder = "Email">
          </div>
              <br>
          <div class="form-group col-md-2">
             <label for="inputTelefone3"><font size="4" face="Verdana">Telefone</font></label>

             <input type = "text" name = "telefone" class = "form-control" onkeyprsess="mascara(this, '## #####-####')" id = "inputTelefone3"
                   placeholder = "Telefone">
          </div>
             <br>
          <div class="form-group col-md-3">
              <select class = "custom-select" name = "situacao">
                  <option selected value = "1"><font size="3" face="Verdana">Ativo</font></option>
                  <option value = "2"><font size="3" face="Verdana">Inativo</font></option>
              </select>
          </div>

       </div>
           <br>
       <div class = "form-group row">
             <div class = "col-sm-10">
                 <button type = "submit" class = "btn btn-success btn-sm">Cadastrar</button>
             </div>
       </div>
       </form>

  </div>




   
