<?php session_start(); ?>

<!doctype html>
<html lang = "pt-br">
<head>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name = "description" content = "Página para realizar login">
    <meta name = "author" content = "Nicolas">
    <link rel = "icon" href = "imagens/favicon.ico">

    <title>Area para Usuários cadastrados</title>

    <link href = "css/bootstrap.min.css" rel = "stylesheet">
    <link href = "./css/signin.css.css" rel = "stylesheet">
</head>

<body class = "text-center">
<?php
//destroi as sessoes
unset($_SESSION['usuarioID'],
    $_SESSION['usuarioNome'],
    $_SESSION['usuarioNivelAcesso'],
    $_SESSION['usuarioLogin'],
    $_SESSION['usuarioSenha']);
?>
<div>

    <form class = "form-signin" method = "POST" action = "valida_login.php">
        <img class = "mb-4" src = "imagens/logo_allternativa.jpg" alt = "Logo Allternativa" width = "72" height = "72">
        <h1 class = "h3 mb-3 font-weight-normal">Área para usuários Cadastrados</h1>

        <label for = "inputEmail" class = "sr-only">Usuário</label>
        <input type = "text" name = "usuario" ="inputEmail" class="form-control" placeholder="Usuário" required autofocus>

        <label for = "inputPassword" class = "sr-only">Senha</label>
        <input type = "password" name = "senha" class = "form-control" placeholder = "Digite a senha" required>

        <button class = "btn btn-lg btn-primary btn-block" type = "submit">Acessar</button>
        <p class = "text-center text-danger">
            <?php
            //se tiver algo na variavel $_SESSIO... imprima!
            if (isset($_SESSION['loginErro'])) {
                echo $_SESSION['loginErro'];
                //função para apagar o que está na variavel $_SESSION
                unset ($_SESSION['loginErro']);
            }
            ?>
        </p>

        <p class = "mt-5 mb-3 text-muted">&copy; 2018</p>
    </form>


</div>
</body>
</html>
