<?php
    include_once("menu_job.php");
?>


<div class="container">
    <div class="col-12" style="background: lightgrey; text-align: left;">
        <div class="row">
            <div class="col-12">
                <h2 style="padding-top: 40px;">Relatórios</h2>
            </div>
            <div class="col-12" style="margin-bottom: -39px; margin-top: -79px;">
                <button type = 'button' class = 'btn btn-danger3  btn-sm' name="recibo" id="recibo" style="margin-top: 100px;margin-bottom: 100px;  background: #8B7355; margin-right: 10px; width: 250px;">PDF Ficha Apropriação completa</button>
                <button type = 'button' class = 'btn btn-danger3  btn-sm' name="recibo" id="recibo" style="background: #8B7355; margin-right: 10px; width: 250px;" >PDF Ficha Técnica completa</button>
<!--                <br>-->
<!--                <input class="btn btn-warning btn-sm" name="relatorio_01" type="button" id="relatorio_01" value="PDF Ficha de apropriação" />-->

            </div>
            <div class="col-12" style="
                 margin-bottom: 20px;">
               <a href = 'job.php?link=8&id=200'>
                   <button type = 'button' class = 'btn btn-danger2  btn-sm'>Voltar Ficha Apropriação</button>
               </a>
            </div>
        </div>
    </div>
</div>
<script>


    function Relatorio(relatorioFA, concursoSel, idEtapaSel, cargoSel, localProvaSel, salaSel) {
        this.relatorio = relatorioSel;
        this.concurso = concursoSel;
        if(idEtapaSel!=""){
            this.idEtapa = idEtapaSel;
        }
        this.cargo = cargoSel;
        this.localProva = localProvaSel;
        this.sala = salaSel;
    }


    $("#relatorio_01").click(function(){



    //grava no objeto relatorio para envio no ajax
         var rel = new Relatorio("relatorio_01", $("#Concurso").val(), $("#idEtapa").val(), null, $("#idLocal").val(), $("#idSala").val())


        $('#modal-relatorio-titulo').html('Processando relatório concurso: '+rel.concurso);
        $('#modal-relatorio-texto').html('<img class="loading-image1" src="img/01-progress.gif" style="height: 50px;">');
        $('#modal-relatorio').modal('show');

    //aqui começa o ajax =]
    $.ajax({
        url: 'ajax_ensalamento.php',
        type: 'POST',
        data: rel,
        xhr: function() {
            var myXhr = $.ajaxSettings.xhr();
            return myXhr;
        },
    success: function (res_success) {

    //chega aqui se foi sucesso
    console.log(res_success);
    var result = res_success.split('/');
    if(result[0] == "relatorios"){
        downloadRelatorio(res_success);
        $('#modal-relatorio').modal('hide');
    }else{
        $('#modal-relatorio-texto').html(res_success);
    }

    },
    error: function (result) {
    //chega aqui se foi erro
         console.log(result);
    $('#modal-relatorio-texto').html(result);
    }
    });
    });

</script>
