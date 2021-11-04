<!--Este arquivo é responsavel por destruir a sessão. sem ele, apos o usuario ir para o form de login, qualquer senha e email seriam aceitos, possibilitando assim, usuario não cadastrados, terem acesso a os dados  !-->
<?php
session_start(); //Inicia uma nova sessão ou resume uma sessão existente

// session_destroy();
unset($_SESSION['autorizado']); //O comando unset apaga uma variável especifica, limpando assim a informação da memória do servido

header('location: ../../../../index.php'); //redireciona o usuario para a pagina inicial onde ele pode fazer o login ou cadastrar uma nova conta
?>
