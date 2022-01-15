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
  <div class="navbar">
      <a href="../view/home.php" class="logo">
        <h2 class="logo">
          <img src="../../public/assets/wallet.png" alt="logo" />Riquinho
        </h2>
      </a>

      <div class="dropdown">
        <button class="dropbtn">
          <h2 class="profile">
          <img src="../../public/assets/perfil-de-usuario.png">
          <?= $_SESSION['usuario']['nome'] ?>
          </h2>
        </button>
        <div class="dropdown-content">
          <a href="../view/carteira.php">Carteiras</a>
          <a href="../view/metas.php">Metas</a>
          <a href="../controller/login.controller.php"> Sair</a>
         </h2>
        </div>
      </div>
    </div>


    <div id="msg">
      <?php if (isset($_GET['msgsuccess']) && $_GET['msgsuccess'] !== null) : ?>
        <h3 class="sucessmsg"> <?= $_GET['msgsuccess'] ?></h3>
      <?php endif ?>
      <?php if (isset($_GET['errormsg']) && $_GET['errormsg'] !== null) : ?>
        <h3 class="erromsg-carteira"> <?= $_GET['errormsg'] ?></h3>
      <?php endif ?>
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
                  <a class="editar" href="carteira.update.php?idcarteira=<?= $carteira['ID'] ?>"><img src="../../public/assets/editar.png" alt="editar"></a>
                  <a class="excluir" href="../controller/delete.carteira.controller.php?id=<?= $carteira['ID'] ?>"><img src="../../public/assets/bin.png" alt="excluir"></a>
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
              <label for="text"><b>Descrição</b></label></b>
              <textarea nid="description" name="description" class="carteira-desc" cols="30" rows="10"></textarea>
            </div>
          </div>
            <div class="input">
              <label for="text"><b>Nome Da Carteira</b></label></b>
              <input type="text" id="name" name="name" class="carteira-name">
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
        a.style = "display:none"
      }, 2000);
    </script>
</body>

</html>