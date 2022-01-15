<?php

session_start();

require "../controller/carteira.update.php";

if ((!isset($_SESSION['usuario']) === true)) {
  header('Location: ./login.php');
}
$dado = carteira();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../public/css/styles.css" />
  <link rel="stylesheet" href="../../public/css/update.css" />
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
      </div>
    </div>
    <div id="modal-gasto" class="modal-container">
      <div class="modal">
        <div class="infoTran">
          <h1 class="tituloTran">Atualizar Carteira</h1>
          <h2 id="tipoCarteira">Carteira</h2>
        </div>

        <form class="form" method="POST" action="../controller/carteira.update.php">

          <div class="input-sup">
            <div class="input">
              <label for="text"><b>Nome Da Carteira</b></label></b>
              <input type="text" id="name" name="name" class="carteira" value="<?= $dado[0]["NOME"] ?>">
            </div>
            <div class="input">
              <label for="text"><b>Descrição</b></label></b>
              <textarea type="text" id="descricao" name="descricao" class="carteira"> <?= $dado[0]["DESCRICAO"] ?>        </textarea>
            </div>
            <div class="input" style="display: none;">
              <label for="info"><b>Info</b></label></b>
              <input type="text" id="info" name="id" value="<?= $dado[0]["ID"] ?>">
            </div>
          </div>

          <div class="btnOpcoes">
            <button class="salvar">Salvar</button>
            <a href='carteira.php' class="cancelar">Cancelar</a>
          </div>
        </form>
      </div>
    </div>


</body>

</html>