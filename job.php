<?php
    session_start();
    
    include_once("seguranca.php");
    include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang = "pt-br">
    <head>
        <meta charset = "utf-8">
        <title>JOB</title>
        <meta name = "viewport" content = "width=device-width, initial-scale=1">
        <meta name = "description" content = "Página Administrativa">
        <meta name = "author" content = "Nicolas">
        <link rel = "icon" href = "imagens/favicon.ico">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge"/>
        <link rel = "stylesheet" href = "css/bootstrap.css" media = "screen">
        <link rel = "stylesheet" href = "css/custom.min.css">
        <script>
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-23019901-1']);
            _gaq.push(['_setDomainName', "bootswatch.com"]);
            _gaq.push(['_setAllowLinker', true]);
            _gaq.push(['_trackPageview']);

            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        </script>
        <script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script src="jquery.min.js" type="text/javascript"></script>
        <script src="//raw.github.com/plentz/jquery-maskmoney/master/jquery.maskMoney.js" type="text/javascript"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="jquery.mask.min.js"></script>


        <link href="toastr-master/build/toastr.css" rel="stylesheet"/>
        <script src="toastr-master/toastr.js"></script>


          <script>

              $(document).ready(function(){
                  $("#capaefectos").hide();

                  $("#ocultar").click(function(event){
                      event.preventDefault();
                      $("#capaefectos").hide("slow");
                  });

                  $("#mostrar").click(function(event){
                      event.preventDefault();
                      $("#capaefectos").show(300);
                  });
              });
          </script>
          <script>

              $(document).ready(function(){
                  $("#capaefectos2").hide();

                  $("#ocultar2").click(function(event){
                      event.preventDefault();
                      $("#capaefectos2").hide("slow");
                  });

                  $("#mostrar2").click(function(event){
                      event.preventDefault();
                      $("#capaefectos2").show(300);
                  });
              });
          </script>
          <script>
              $(document).ready(function(){
                  $("#capaefectos3").hide();

                  $("#ocultar3").click(function(event){
                      event.preventDefault();
                      $("#capaefectos3").hide("slow");
                  });

                  $("#mostrar3").click(function(event){
                      event.preventDefault();
                      $("#capaefectos3").show(300);
                  });
              });
          </script>
          <script>
              $(document).ready(function(){
                  $("#capaefectos4").hide();

                  $("#ocultar4").click(function(event){
                      event.preventDefault();
                      $("#capaefectos4").hide("slow");
                  });

                  $("#mostrar4").click(function(event){
                      event.preventDefault();
                      $("#capaefectos4").show(300);
                  });
              });
          </script>

          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link href="font-awesome/css/all.css" rel="stylesheet">

          <script type="text/javascript" src="js/jquery.mask.js"></script>
          <script type="text/javascript" src="js/jquery.mask.min.js"></script>
          <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>



          <link rel="stylesheet" href="css/normalize.css">
          <link rel="stylesheet" href="css/demo.css">
          <!-- Pushy CSS -->
        <link rel="stylesheet" href="css/pushy.css">

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#flip").click(function(){
                    $("#panel").slideToggle("slow");
                });
            });
        </script>
        <script>
            $(document).ready(function(){
                $("#flip2").click(function(){
                    $("#panel2").slideToggle("slow");
                });
            });
        </script>

        <style>
            #panel, #flip {
                padding: 5px;
                text-align: left;
                background-color: #FFFAFA;
                border: solid 1px #FFFAFA;
                cursor: pointer;
            }

            #flip:hover {
                padding: 5px;
                text-align: left;
                background-color: #FFFAFA;
                border: solid 1px #FFFAFA;
                cursor: pointer;
                color: #0a6ebd;
            }
            #panel {
                padding: 20px;
                display: none;
            }
        </style>
        <style>
            #panel2, #flip {
                padding: 5px;
                text-align: left;
                background-color: #FFFAFA;
                border: solid 1px #FFFAFA;
                cursor: pointer;
            }

            #flip2:hover {
                padding: 5px;
                text-align: left;
                background-color: #FFFAFA;
                border: solid 1px #FFFAFA;
                cursor: pointer;
                color: #0a6ebd;
            }
            #panel2 {
                padding: 20px;
                display: none;
            }
        </style>


        <script type="text/javascript">

            //inserir ponto e virgula em valores

            function moeda(z) {

                v = z.value;

                v=v.replace(/\D/g,"") //permite digitar apenas números

                v=v.replace(/[0-9]{12}/,"inválido") //limita pra máximo 999.999.999,99

                v=v.replace(/(\d{1})(\d{8})$/,"$1.$2") //coloca ponto antes dos últimos 8 digitos

                v=v.replace(/(\d{1})(\d{5})$/,"$1.$2") //coloca ponto antes dos últimos 5 digitos

                v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") //coloca virgula antes dos últimos 2 digitos

                z.value = v;

            }

        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.fileDownload/1.4.2/jquery.fileDownload.js" type="text/javascript"></script>

    </head>
    <body >
        <?php
            include_once("menu_job.php");
            $pag = array();
            $link = $_GET['link'];
            
            $pag[1] = "bem_vindo_usuario.php";
            $pag[2] = "listar_cliente.php";
            $pag[3] = "cadastrar_cliente.php";
            $pag[4] = "editar_cliente.php";
            $pag[5] = "visualizar_cliente.php";
            $pag[6] = "cadastrar_ficha_apropriacao.php";
            $pag[7] = "cadastrar_ficha_tecnica.php";
            $pag[8] = "visualizar_ficha_apropriacao.php";
            $pag[9] = "editar_ficha_apropriacao.php";
            $pag[10] = "busca_clientes.php";
            $pag[11] = "busca_ficha_apropriacao_numero.php";
            $pag[12] = "processa/processa_apagar_ficha_apropriacao.php";
            $pag[13] = "descricao_visualiza.php";
            $pag[14] = "cadastrar_descricao.php";
            $pag[15] = "cadastrar_faturamento.php";
            $pag[16] = "cadastrar_notas_observacoes.php";
            $pag[17] = "cadastrar_pagamento.php";
            $pag[18] = "visualizar_descricao.php";
            $pag[19] = "editar_descricao.php";
            $pag[20] = "listar_ficha_apropriacao.php";
            $pag[21] = "bem_vindo_usuario.php";
            $pag[22] = "busca_ficha_apropriacao_titulo.php";
            $pag[23] = "visualizar_faturamento.php";
            $pag[24] = "cadastrar_prestador.php";
            $pag[25] = "cadastrar_ficha_tecnica_externa.php";
            $pag[25] = "prestador_sucesso.php";
            $pag[26] = "visualizar_ficha_tecnica.php";
            $pag[27] = "editar_ficha_tecnica.php";
            $pag[28] = "visualizar_pagamento.php";
            $pag[29] = "editar_faturamento.php";
            $pag[30] = "visualizar_relatorios.php";
            $pag[31] = "editar_pagamento.php";
            $pag[32] = "visualizar_prestador.php";
            $pag[33] = "processa_upload.php";
            $pag[34] = "editar_recibo.php";
            $pag[35] = "editar_prestador.php";


        if (!empty($link)) {
                if (file_exists($pag[$link])) {
                    include $pag[$link];
                } else {
                    include "bem_vindo.php";
                }
            } else {
                include "bem_vindo.php";
            }
        ?>
        
        <script src = "js/jquery.min.js"></script>
        <script src = "js/popper.min.js"></script>
        <script src = "js/bootstrap.min.js"></script>
        <script src = "js/custom.js"></script>
    </body>
</html>
