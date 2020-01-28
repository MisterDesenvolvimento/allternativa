<!-- Inicio navbar -->
<div class = "navbar navbar-expand-md fixed-top navbar-dark bg-primary3">
    <div class = "container">
        <div class = "col-12">
            <div class = "row">
                <div class="col-1 col-sm-1">


                    <a href = "administrativo.php?link=1" class = "navbar-brand"><img class = "mb-sm-0" src = "imagens/LogoBarra3.png" alt = "Logo Allternativa" width = "50" height = "50" ></a>
                    <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarResponsive"
                            aria-controls = "navbarResponsive" aria-expanded = "false" aria-label = "Toggle navigation">
                        <span class = "navbar-toggler-icon"></span>
                    </button>

                </div>
                <div class="col-5 col-sm-5" style="text-align: left">

                    <div class = "collapse navbar-collapse" id = "navbarResponsive">
                        <ul class = "navbar-nav">
                            <li class = "nav-item dropdown">
                                <a class = "nav-link dropdown-toggle" data-toggle = "dropdown" href = "#" id = "themes" style="font-size: 20px; color: white;">Usuário
                                    <span class = "caret"></span></a>
                                <div class = "dropdown-menu" aria-labelledby = "themes">

                                    <div class = "dropdown-divider"></div>
                                    <a class = "dropdown-item" href = "administrativo.php?link=2"><p style="font-size: 18px">Listar</p></a>
                                    <a class = "dropdown-item" href = "administrativo.php?link=3"><p style="font-size: 18px">Cadastrar</p></a>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-sm-6">
                    <p style="color: white; font-size: 20px; position: absolute; right: 44px; margin-top: 4px;">Olá, <?php
                        echo  $_SESSION['usuarioNome'];
                        ?>!</p>
                    <a class = "nav-link" href = "sair.php" style="font-size: 17px;right:30px;color: white;position: absolute;margin-top: 35px;">Sair</a>
                </div>
            </div>
        </div>
    </div>
</div>


            <!-- Fim navbar -->