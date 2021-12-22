<!--Esta parte de codigo verifica se o usuario esta logado, dando acesso a pagina de cadastro  !-->
<?php
session_start();
if ((!isset($_SESSION['usuario']) === true)) {
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
  <link rel="stylesheet" href="../../public/css/global.css">
  <title>Riquinho</title>
</head>

<body>
  <div class="main">
    <header class="header">
      <h2 class="logo">
        <img src="../../public/assets/wallet.png" alt="logo" />Riquinho
      </h2>
      <div id="div-teste">
        <?php if (isset($_GET['msgsuccess']) && $_GET['msgsuccess'] !== null) : ?>
          <h3 class="sucessmsg"> <?= $_GET['msgsuccess'] ?></h3>
        <?php endif ?>
        <?php if (isset($_GET['errormsg']) && $_GET['errormsg'] !== null) : ?>
          <h3 class="errormsg"> <?= $_GET['errormsg'] ?></h3>
        <?php endif ?>
      </div>
      <div class="navbar">
        <a class="button" href="../view/home.php">Transações</a>
        <a class="button" href="../controller/login.controller.php">Sair</a>
      </div>

    </header>

    <div class="info">
      <span>Bem-vindo <?= $_SESSION['usuario']['nome'] ?></span>
    </div>
    <div class="lists">
      <div class="receitas">
        <h1 class="title-section">
          <img src="../../public/assets/mais.png" alt="icon-mais" id="abre-receita" />
          Criar Carteira
        </h1>
        <ul class="lista-transacoes">
          <!-- <?php foreach ($receita as $itens) : ?>
            <?php if ($itens['TIPO_TRAN'] == 'Receita') : ?>
              <li class="lista-transacoes-row">
                <div class="texts">
                  <span>R$<?= number_format($itens['VALOR_TRAN'], 2, ",", ".") ?></span>
                  <span><?= str_replace("00:00:00", "", $itens['DATA_TRAN']) ?></span>
                  <span class="row-info" title="<?= $itens['INFO'] ?>"><?= $itens['INFO'] ?></span>
                </div>
                <a class="icon" href="../controller/delete.controller.php?id=<?= $itens['ID'] ?>"><img src="../../public/assets/bin.png" alt="excluir"></a>
                <a class="icon" href="../controller/redirect_receita.php?id_transacao=<?= $itens['ID'] ?>"><img src="../../public/assets/editar.png" alt="editar"></a>
              </li>
            <?php endif ?>
          <?php endforeach ?> -->
        </ul>
      </div>
    </div class="lists">
  </div>

  <div id="modal-receita" class="modal-container">
    <div class="modal">
      <button id="close-receita">x</button>
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

    // modal receita
    const btn_receita = document.getElementById("abre-receita");
    btn_receita.addEventListener("click", () => {
      abreModal("modal-receita");
    });
    const close_receita = document.getElementById("close-receita")
    close_receita.addEventListener("click", () => {
      fechaModal('modal-receita')
    })

    // modal gasto
    const btn_gasto = document.getElementById("abre-gasto");
    btn_gasto.addEventListener("click", () => {
      abreModal("modal-gasto");
    });
    const close_gasto = document.getElementById("close-gasto")
    close_gasto.addEventListener("click", () => {
      fechaModal('modal-gasto')
    })
    setTimeout(function() {

      var a = document.getElementById("div-teste");

      a.style = "display:none"


    }, 2000);
  </script>
</body>

</html>