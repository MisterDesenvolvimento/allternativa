


<div class = "navbar navbar-expand-md fixed-top navbar-dark bg-primary3">
<div class = "container">
    <div class = "col-12">
        <div class = "row">

            <div class="col-1 col-sm-1">
                <a href = "job.php?link=1" class = "navbar-brand" ><img class = "mb-sm-0" src = "imagens/LogoBarra3.png" alt = "Logo Allternativa" width = "50" height = "50" ></a>
                <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarResponsive"
                        aria-controls = "navbarResponsive" aria-expanded = "false" aria-label = "Toggle navigation">
                    <span class = "navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="col-9 col-sm-9" style="text-align: left">
                <div class = "collapse navbar-collapse " id = "navbarResponsive">
                    <ul class = "navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download" style="font-size: 20px; color: white;">Clientes <span class="caret"></span></a>
                            <div class="dropdown-menu" aria-labelledby="download">
                                <a class="dropdown-item font" href="job.php?link=3"><p style="font-size: 18px">Novo Cliente</p></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="job.php?link=2&idAlert=2"><p style="font-size: 18px">Buscar Cliente</p></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>



            <div class="col-3 col-sm-2">
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