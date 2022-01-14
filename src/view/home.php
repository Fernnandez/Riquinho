<!--Esta parte de codigo verifica se o usuario esta logado, dando acesso a pagina de cadastro  !-->
<?php
session_start();
if ((!isset($_SESSION['usuario']) === true)) {
  header('Location: ./login.php');
}
require "../controller/transacao.controller.php";
require "../controller/carteira.controller.php";

$receita = findTransacao();
$total = total($receita);
$carteiras = findCarteira($_SESSION['usuario']);
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
          <h3 class="erromsg"> <?= $_GET['errormsg'] ?></h3>
        <?php endif ?>
      </div>
      <div class="navbar">
        <a class="button" href="../view/carteira.php">Carteiras</a>
        <a class="button" href="../view/metas.php">Metas</a>
        <a class="button" href="../controller/login.controller.php">Sair</a>
      </div>

    </header>

    <div class="info">
      <span>Bem-vindo <?= $_SESSION['usuario']['nome'] ?></span>
      <h1>Saldo Livre</h1>
      <h2>R$<?= $total['RECEITA'] - $total['GASTO'] ?></h2>
    </div>
    <div class="lists">
      <div class="receitas">
        <h1 class="title-section">
          <img src="../../public/assets/mais.png" alt="icon-mais" id="abre-receita" />
          Receitas
        </h1>

        <h2 style="color: green;font-size: 35px">R$<?= $total['RECEITA'] ?></h2>
        <ul class="lista-transacoes">
          <?php foreach ($receita as $itens) : ?>
            <?php if ($itens['TIPO_TRAN'] == 'Receita') : ?>
              <li class="lista-transacoes-row">
                <div class="texts">
                  <span>R$<?= number_format($itens['VALOR_TRAN'], 2, ",", ".") ?></span>
                  <span><?= str_replace("00:00:00", "", $itens['DATA_TRAN']) ?></span>
                  <span class="row-info" title="<?= $itens['INFO'] ?>"><?= $itens['INFO'] ?></span>
                </div>
                <a class="icon" href="../controller/delete.transacao.controller.php?id=<?= $itens['ID'] ?>"><img src="../../public/assets/bin.png" alt="excluir"></a>
                <a class="icon" href="../controller/redirect_receita.php?id_transacao=<?= $itens['ID'] ?>"><img src="../../public/assets/editar.png" alt="editar"></a>

              </li>
            <?php endif ?>
          <?php endforeach ?>
        </ul>
      </div>
      <div class="gastos">
        <h1 class="title-section">
          <img src="../../public/assets/botao-de-menos.png" alt="icon-menos" id="abre-gasto" />
          Gastos
        </h1>
        <h2 style="color:red; font-size: 35px;">R$-<?= $total['GASTO'] ?></h2>
        <ul class="lista-transacoes">
          <?php foreach ($receita as $itens) : ?>
            <?php if ($itens['TIPO_TRAN'] == 'Gasto') : ?>
              <li class="lista-transacoes-row">
                <div class="texts">
                  <span>R$<?= number_format($itens['VALOR_TRAN'], 2, ",", ".") ?></span>
                  <span><?= str_replace("00:00:00", "", $itens['DATA_TRAN']) ?></span>
                  <span class="row-info" title="<?= $itens['INFO'] ?>"><?= $itens['INFO'] ?></span>
                </div>

                <a class="icon" href="../controller/delete.transacao.controller.php?id=<?= $itens['ID'] ?>"><img src="../../public/assets/bin.png" alt="excluir"></a>
                <a class="icon" href="../controller/redirect_receita.php?id_transacao=<?= $itens['ID'] ?>"><img src="../../public/assets/editar.png" alt="editar"></a>

              </li>
            <?php endif ?>
          <?php endforeach ?>
        </ul>
      </div>
    </div class="lists">
  </div>

  <div id="modal-receita" class="modal-container">
    <div class="modal">
      <button id="close-receita">x</button>
      <div class="infoTran">
        <h1 class="tituloTran">Nova Transação</h1>
        <h2 id="tipoReceita">Receita</h2>
      </div>
      <form class="form" method="POST" action="../controller/transacao.controller.php">
        <div class="input-sup">
          <div class="input">
            <label for="text"><b>tipo</b></label></b>
            <input type="text" id="tipo-receita" name="tipo" value="Receita" class="receita">
          </div>
          <div class="input">
            <label for="data"><b>Data</b></label></b>
            <input type="date" id="data" name="data" class="receita">
          </div>
        </div>

        <div class="input-inf">
          <div class="input">
            <label for="valor"><b>Valor</b></label></b>
            <input type="number" id="valor" name="valor" class="receita">
          </div>
          <div class="input">
            <label for="info"><b>Info</b></label></b>
            <input type="text" id="info" name="info" class="receita">
          </div>
        </div>
        <label for="carteira">Carteira</label>
        <select name="carteira" id="carteira">
          <option value="">Sem carteira</option>
          <?php foreach ($carteiras as $carteira) : ?>
            <option value="<?= $carteira['ID'] ?>"><?= $carteira['NOME'] ?></option>
          <?php endforeach ?>
        </select>
        <div class="btnOpcoes">
          <button class="salvar">Salvar</button>
          <a href='home.php' class="cancelar">Cancelar</a>
        </div>
      </form>
    </div>
  </div>

  <div id="modal-gasto" class="modal-container">
    <div class="modal">
      <button id="close-gasto">x</button>
      <div class="infoTran">
        <h1 class="tituloTran">Nova Transação</h1>
        <h2 id="tipoGasto">Gasto</h2>
      </div>
      <form class="form" method="POST" action="../controller/transacao.controller.php">
        <div class="input-sup">
          <div class="input">
            <label for="text"><b>tipo</b></label></b>
            <input type="text" id="tipo-gasto" name="tipo" value="Gasto" class="gasto">
          </div>
          <div class="input">
            <label for="data"><b>Data</b></label></b>
            <input type="date" id="data" name="data" class="gasto">
          </div>
        </div>

        <div class='input-inf'>
          <div class="input">
            <label for="valor"><b>Valor</b></label></b>
            <input type="number" id="valor" name="valor" class="gasto">
          </div>
          <div class="input">
            <label for="info"><b>Info</b></label></b>
            <input type="text" id="info" name="info" class="gasto">
          </div>
        </div>
        <label for="carteira">Carteira</label>
        <select name="carteira" id="carteira">
          <option value="">Sem carteira</option>
          <?php foreach ($carteiras as $carteira) : ?>
            <option value="<?= $carteira['ID'] ?>"><?= $carteira['NOME'] ?></option>
          <?php endforeach ?>
        </select>
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
      var a = document.getElementById("msg");
      a.style = "display:none"
    }, 2000);
  </script>
</body>

</html>