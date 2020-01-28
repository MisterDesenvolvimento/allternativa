<?php
session_start();
session_destroy();

//remove todas as informacoes contidas nas variaveis globais

unset($_SESSION['usuarioID'], 
      $_SESSION['usuarioNome'], 
      $_SESSION['usuarioNivelAcesso'],
      $_SESSION['usuarioLogin'], 
      $_SESSION['usuarioSenha']);

//redireciona suario pagina login
header("Location: login.php");