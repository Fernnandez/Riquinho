<?php

session_start();

require "../controller/carteira.controller.php";

if ((!isset($_SESSION['usuario']) === true)) {
  header('Location: ./login.php');
}

$carteiras = findCarteira();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../public/css/styles.css" />
  <link rel="stylesheet" href="../../public/css/homepage.css" />
  <link rel="stylesheet" href="../../public/css/global.css">
  <link rel="stylesheet" href="../../public/css/carteira.css">
  <link rel="shortcut icon" href="../../public/assets/wallet.png">
  <title>Riquinho</title>
</head>

<body>
  <div class="main">
    <header class="header">
      <h2 class="logo">
        <img src="../../public/assets/wallet.png" alt="logo" />Riquinho
      </h2>
      <div id="msg">
        <?php if (isset($_GET['msgsuccess']) && $_GET['msgsuccess'] !== null) : ?>
          <h3 class="sucessmsg"> <?= $_GET['msgsuccess'] ?></h3>
        <?php endif ?>
        <?php if (isset($_GET['errormsg']) && $_GET['errormsg'] !== null) : ?>
          <h3 class="errormsg"> <?= $_GET['errormsg'] ?></h3>
        <?php endif ?>
      </div>
      <div class="navbar">
        <a class="button" href="../view/metas.php">Metas</a>
        <a class="button" href="../view/home.php">Home</a>
        <a class="button" href="../controller/login.controller.php">Sair</a>
      </div>

    </header>

    <div class="info">
      <span>Bem-vindo <?= $_SESSION['usuario']['nome'] ?></span>
    </div>
    <div class="lists">
      <div class="receitas">
        <h1 class="title-section">
          <img src="../../public/assets/mais.png" alt="icon-mais" id="abre-carteira" />
          Criar Carteira
        </h1>
        <div class="lista-carteiras">
          <?php if (isset($carteiras) && $carteiras !== null) : ?>
            <?php foreach ($carteiras as $carteira) : ?>
              <div class="card">
                <div class="card-titulo">
                  <img src="../../public/assets/wallet.png" alt="carteira">
                  <h2><?= $carteira['NOME'] ?></h2>
                </div>
                <p><?= $carteira['DESCRICAO'] ?></p>
                <div class="card-footer">
                <a class="excluir" href="../controller/delete.carteira.controller.php?id=<?= $carteira['ID'] ?>"> Excluir</a>  
                <a class="editar" href="carteira.update.php?idcarteira=<?= $carteira['ID'] ?>"> Editar</a>
                </div>
              </div>
            <?php endforeach ?>
          <?php endif ?>
        </div>
      </div class="lists">
    </div>

    <div id="modal-carteira" class="modal-container">
      <div class="modal">
        <button id="close-carteira">x</button>
        <div class="infoTran">
          <h1 class="tituloTran">Nova Carteira</h1>
        </div>
        <form class="form" method="POST" action="../controller/carteira.controller.php">
          <div class="input-sup">
            <div class="input">
              <label for="text"><b>Nome Da Carteira</b></label></b>
              <input type="text" id="name" name="name" class="receita">
            </div>
            <div class="input">
              <label for="text"><b>Descrição</b></label></b>
              <textarea nid="description" name="description" class="receita" cols="30" rows="10"></textarea>
            </div>
          </div>
          <div class="btnOpcoes">
            <button class="salvar">Salvar</button>
            <a href='home.php' class="cancelar">Cancelar</a>
          </div>
        </form>
      </div>
    </div>

    <script>
      function abreModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.add("ativo");
      }

      function fechaModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.remove("ativo");
      }
      // modal gasto
      const btn_carteira = document.getElementById("abre-carteira");
      btn_carteira.addEventListener("click", () => {
        abreModal("modal-carteira");
      });
      const close_carteira = document.getElementById("close-carteira")
      close_carteira.addEventListener("click", () => {
        fechaModal('modal-carteira')
      })
      setTimeout(function() {
        var a = document.getElementById("msg");
        console.log(a);
        a.style = "display:none"
      }, 2000);
    </script>
</body>

</html>