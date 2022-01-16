<?php
session_start();
if ((!isset($_SESSION['usuario']) === true)) {
  header('Location: ./login.php');
}
require "../controller/metas.controller.php";
require "../controller/carteira.controller.php";

$metas = listMetas();
$carteiras = findCarteira();
?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Metas e Objetivos</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../public/css/styles.css" />
  <link rel="stylesheet" href="../../public/css/homepage.css" />
  <link rel="stylesheet" href="../../public/css/global.css">
  <link rel="stylesheet" href="../../public/css/metas.css">
  <link rel="shortcut icon" href="../../public/assets/wallet.png">
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
        <h3 class="erromsg"> <?= $_GET['errormsg'] ?></h3>
      <?php endif ?>
    </div>


    <div class="lists">
      <div class="receitas">
        <h1 class="title-section">
          <img src="../../public/assets/mais.png" alt="icon-mais" id="abre-carteira" />
          Criar Metas
        </h1>
        <div class="prioridades">
          <?php foreach ($metas as $meta) : ?>
            <div class="prioridadesCard">
              <div id="nivelPrioridade">
                <?php if ($meta['NIVEL_META'] == 'Urgente') : ?>
                  <div id="nivel" style="background-color: red;">
                  <?php endif ?>
                  <?php if ($meta['NIVEL_META'] == 'Moderado') : ?>
                    <div id="nivel" style="background-color: green;">
                    <?php endif ?>
                    <?php if ($meta['NIVEL_META'] == 'Dispensavel') : ?>
                      <div id="nivel" style="background-color: yellow;">
                      <?php endif ?>
                      </div>
                    </div>
                    <div class="infoObj">
                      <p class="descricaoObj">
                        <?= $meta['DESCRICAO_META'] ?>
                      </p>
                      <?php $diasRestantes = strtotime($meta['DATA_META']) - strtotime($meta['INICIO_META']) ?>
                      <small>Dias Restantes: <b><?= floor($diasRestantes / (60 * 60 * 24)) ?> Dias</b></small><br>
                      <small>Valor: <b>R$<?= number_format($meta['VALOR_META'], 2, ",", ".") ?></b></small><br>
                      <small>Carteira: <b><?= $meta['NOME'] ?></b></small>
                    </div>
                    <div class="op">
                      <a href="metas.update.php?idmeta=<?= $meta['ID_META'] ?>"><button style="background-color: green;">EDITAR</button></a>
                      <a class='excluir' href="../controller/metas.controller.php?id_meta=<?= $meta['ID_META'] ?>"><button style="background-color: red;">Excluir</button></a>
                    </div>
                  </div>
                <?php endforeach ?>
              </div>

              <div id="modal-receita" class="modal-container">
                <div class="modal-metas">
                  <button id="close-receita">x</button>
                  <div class="infoTran-metas">
                    <h1 class="tituloTran-meta">Nova Meta</h1>
                  </div>
                  <form class="form" method="POST" action="../controller/metas.controller.php">
                    <div class="input-sup">
                      <div class="input">
                        <label for="text"><b>Valor do Objetivo</b></label></b>
                        <input type="text" id="name" name="value" class="metas">
                      </div>
                      <div class="input">
                        <label for="text"><b>Data Final</b></label></b>
                        <input type="date" id="data" name="data" class="metas">
                      </div>


                      <div class="input">
                        <label for="text"><b>Descrição</b></label></b>
                        <textarea nid="description" name="description" class="metas" cols="30" rows="10"></textarea>
                      </div>

                    </div>
                    <div class="selects">
                      <div class="input" style="margin-top:20px">
                        <label for="text"><b>Urgencia</b></label></b>
                        <select name="urgencia" class="select">
                          <option value="Urgente" name="urgencia">Urgente</option>
                          <option value="Moderado" name="urgencia">Moderado</option>
                          <option value="Dispensavel" name="urgencia">Dispensavel</option>
                        </select>
                      </div>
                      <div class="input" style="margin-top:20px">
                        <label for="text"><b>Carteira</b></label></b>
                        <select name="carteira" class="select">
                          <option value="">Sem carteira</option>
                          <?php foreach ($carteiras as $carteira) : ?>
                            <option value="<?= $carteira['ID'] ?>" name="<?= $carteira['ID'] ?>"><?= $carteira['NOME'] ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>

                    <div class="btnOpcoes" style="display:flex; justify-content:space=around;margin:20px">
                      <button class="salvar" style="margin-left:20px;margin:20px">Salvar</button>
                      <a href='metas.php' class="cancelar" style="margin-left:20px;margin:20px">Cancelar</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>

  </div>
  <footer class="footer">
    <div class='footer-cart'>
      <img src="../../public/assets/wallet.png" alt="logo" /> Riquinho
      <div class="itens">
        <a href=""> Termo de Privacidade</a>
        <a href=""> Quem somos</a>
        <a href=""> Ajuda</a>
      </div>
    </div>
  </footer>
</body>

</html>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
  const btn_receita = document.getElementById("abre-carteira");
  btn_receita.addEventListener("click", () => {
    abreModal("modal-receita");
  });
  const close_receita = document.getElementById("close-receita")
  close_receita.addEventListener("click", () => {
    fechaModal('modal-receita')
  })
  setTimeout(function() {
    var a = document.getElementById("msg");
    a.style = "display:none"
  }, 2000);

  $(document).ready(function() {
    $("a.excluir").click(function(evento) {

      if (!confirm("Tem certeza?"))
        evento.preventDefault();
    });
  })
</script>