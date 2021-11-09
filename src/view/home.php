<!--Esta parte de codigo verifica se o usuario esta logado, dando acesso a pagina de cadastro  !-->
<?php
session_start();
if ((!isset($_SESSION['id']) === true)) {
  header('Location: ./login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../public/css/styles.css" />
  <link rel="stylesheet" href="../../public/css/homepage.css" />
  <title>Riquinho</title>
</head>

<body>
  <header class="header">
    <h2 class="logo">
      <img src="../../public/assets/wallet.png" alt="logo" />Riquinho
    </h2>
    <a class="button" href="../controller/login.controller.php">Sair</a>
  </header>
  <div class="main">
    <div class="receitas">
      <h1 class="title-section">
        <img src="../../public/assets/mais.png" alt="icon-mais" />
        Receitas
      </h1>
      <h2>R$ 2250,00</h2>

      <ul class="lista-transacoes">
        <li class="lista-transacoes-row">
          <span>R$ 1500,00</span>
          <span>08/11/2021</span>
          <span class="row-info" title="Salário">Salário</span>
        </li>
        <li class="lista-transacoes-row">
          <span>R$ 500,00</span>
          <span>25/10/2021</span>
          <span class="row-info" title="Frella">Frella </span>
        </li>
        <li class="lista-transacoes-row">
          <span>R$ 250,00</span>
          <span>08/11/2021</span>
          <span class="row-info" title="Manutenção de sistema">Manutenção de sistema</span>
        </li>
      </ul>
    </div>
    <div class="gastos">
      <h1 class="title-section">
        <img src="../../public/assets/botao-de-menos.png" alt="icon-menos" />
        Gastos
      </h1>
      <h2>R$ 900,00</h2>
      <ul class="lista-transacoes">
        <li class="lista-transacoes-row">
          <span>R$ 500,00</span>
          <span>01/11/2021</span>
          <span class="row-info" title="Alimentação">Alimentação</span>
        </li>
        <li class="lista-transacoes-row">
          <span>R$ 200,00</span>
          <span>25/10/2021</span>
          <span class="row-info" title="Festa no sábado">Festa no sábado</span>
        </li>
        <li class="lista-transacoes-row">
          <span>R$ 100,00</span>
          <span>20/10/2021</span>
          <span class="row-info" title="Internet">Internet</span>
        </li>
        <li class="lista-transacoes-row">
          <span>R$ 100,00</span>
          <span>20/10/2021</span>
          <span class="row-info" title="Roupas e sapato para fim de ano">Roupas e sapato para fim de ano</span>
        </li>
      </ul>
    </div>
  </div>
</body>

</html>