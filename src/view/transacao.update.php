<!--Esta parte de codigo verifica se o usuario esta logado, dando acesso a pagina de cadastro  !-->
<?php
session_start();
if ((!isset($_SESSION['usuario']) === true)) {
  header('Location: ./login.php');
}
require "../controller/update.controller.php";

$receita = findTransacao();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../public/css/styles.css" />
  <link rel="stylesheet" href="../../public/css/update.css" />
  <link rel="shortcut icon" href="../../public/assets/wallet.png">
  <title>Riquinho</title>
</head>

<body>
  <div class="main">
    <header class="header">
      <h2 class="logo">
        <img src="../../public/assets/wallet.png" alt="logo" />Riquinho
      </h2>
      <a class="button" href="../controller/login.controller.php">Sair</a>
    </header>
    <div class="info">
      <span>Bem-vindo <?= $_SESSION['usuario']['nome'] ?></span>

      <div id="modal-gasto" class="modal-container">
        <div class="modal">
          <div class="infoTran">
            <h1 class="tituloTran">Atualizar Transação</h1>
            <h2 id="tipoGasto">Gasto</h2>
          </div>

          <form class="form" method="POST" action="../controller/update.transacao.controller.php">
            <div class="input-sup">
              <div class="input">
                <label for="text"><b>tipo</b></label></b>
                <input type="text" id="tipo-gasto" name="tipo" value="Gasto" value="<?= $receita[0]["TIPO_TRAN"] ?>">
              </div>

              <div class="input">
                <?php
                $receita[0]["DATA_TRAN"] = substr($receita[0]["DATA_TRAN"], 0, 10); // retorna "abcde"
                ?>
                <label for="data"><b>Data</b></label></b>
                <input type="date" id="data" name="DATA_TRAN" value="<?= $receita[0]["DATA_TRAN"] ?>">
              </div>
            </div>

            <div class='input-inf'>
              <div class="input">
                <label for="valor"><b>Valor</b></label></b>
                <input type="text" id="valor" name="valor" value="<?= $receita[0]["VALOR_TRAN"] ?>">
              </div>
              <div class="input">
                <label for="info"><b>Info</b></label></b>
                <input type="text" id="info" name="info" value="<?= $receita[0]["INFO"] ?>">
              </div>
              <div class="input" style="display: none;">
                <label for="info"><b>Info</b></label></b>
                <input type="text" id="info" name="ID" value="<?= $receita[0]["ID"] ?>">
              </div>

            </div>
            <div class="btnOpcoes">
              <button class="salvar">Salvar</button>
              <a href='home.php' class="cancelar">Cancelar</a>
            </div>
          </form>
        </div>
      </div>


</body>

</html>