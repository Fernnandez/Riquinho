<!--Esta parte de codigo verifica se o usuario esta logado, dando acesso a pagina de cadastro  !-->
<?php
session_start();
if ((!isset($_SESSION['usuario']) === true)) {
  header('Location: ./login.php');
}
require "../controller/transacao.controller.php";

$receita = transa();

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
    <span>Bem-vindo <?= $_SESSION['usuario']['nome'] ?></span>
    <a class="button" href="../controller/login.controller.php">Sair</a>
  </header>
  <div class="main">
    <div class="receitas">
      <h1 class="title-section">
        <img src="../../public/assets/mais.png" alt="icon-mais" id="abre-receita" />
        Receitas
      </h1>
      <h2>R$ 2250,00</h2>
      <ul class="lista-transacoes">
        <?php foreach ($receita as $itens) : ?>
        <?php if ($itens['TIPO_TRANSA'] == 'receita') :?>
            <li class="lista-transacoes-row">
            <span> R$ <?= $itens['VALOR_TRANSA'] ?></span>
            <span><?= $itens['DATA_TRANSA'] ?></span>
            <span class="row-info" title="<?= $itens['INFO'] ?>"><?= $itens['INFO'] ?></span>
            <a href="../controller/delete.controller.php?id=<?=$itens['ID']?>">Remover</a>
          </li>
          <?php endif ?>
          <?php endforeach ?>
        </ul>
        <!-- <?php var_dump($itens)?> -->
    </div>
    <div class="gastos">
      <h1 class="title-section">
        <img src="../../public/assets/botao-de-menos.png" alt="icon-menos" id="abre-gasto" />
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

  <div id="modal-receita" class="modal-container">
    <div class="modal">
      <button id="close-receita">x</button>
      <div class="infoTran">
        <h1 class="tituloTran">Nova Transação</h1>
        <h2 id="tipoReceita">Receita</h2>
      </div>
      <div class="fromTranInput">
        <form method="POST" action="../controller/transacao.controller.php">
          <div class="camposText">
            <div class="input">
              <label for="text"><b>tipo</b></label></b>
              <input type="text" id="tipo-receita" name="tipo" value="receita">
            </div>
            <div class="input">
              <label for="data"><b>Data</b></label></b>
              <input type="date" id="data" name="data">
            </div>
            <div class="input">
              <label for="valor"><b>Valor</b></label></b>
              <input type="text" id="valor" name="valor">
            </div>
            <div class="input">
              <label for="info"><b>Info</b></label></b>
              <input type="text" id="info" name="info" style="width: 500px;">
            </div>
          </div>
          <div class="btnOpcoes">
            <button class="salvar">Salvar</button>
            <a href='home.php' class="cancelar">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="modal-gasto" class="modal-container">
    <div class="modal">
      <button id="close-gasto">x</button>
      <div class="infoTran">
        <h1 class="tituloTran">Nova Transação</h1>
        <h2 id="tipoGasto">Gasto</h2>
      </div>
      <div class="fromTranInput">
        <form method="POST" action="../controller/transacao.controller.php">
          <div class="camposText">
            <div class="input">
              <label for="text"><b>tipo</b></label></b>
              <input type="text" id="tipo-gasto" name="tipo" value="gasto">
            </div>
            <div class="input">
              <label for="data"><b>Data</b></label></b>
              <input type="date" id="data" name="data">
            </div>
            <div class="input">
              <label for="valor"><b>Valor</b></label></b>
              <input type="text" id="valor" name="valor">
            </div>
            <div class="input">
              <label for="info"><b>Info</b></label></b>
              <input type="text" id="info" name="info" style="width: 500px;">
            </div>
          </div>
          <div class="btnOpcoes">
            <button class="salvar">Salvar</button>
            <a href='home.php' class="cancelar">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
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
  </script>
</body>

</html>