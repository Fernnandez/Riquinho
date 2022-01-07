<!--Esta parte de codigo verifica se o usuario esta logado, dando acesso a pagina de cadastro  !-->
<?php
session_start();
if ((!isset($_SESSION['usuario']) === true)) {
  header('Location: ./login.php');
}
require "../controller/metas.controller.php";

$metas = listMetas();
//var_dump($metas);
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
  <nav class="opcoes">
    <h2 class="logo" style="font-family: 'Righteous', cursive;">
      <img src="../../public/assets/wallet.png" alt="logo" />Riquinho
    </h2>


    <h2 class="title-section" style="font-family: 'Righteous', cursive;">
      <img src="../../public/assets/mais.png" alt="icon-mais" id="abre-receita" />
      Criar Meta
    </h2>
  </nav>
  <div class="filtros">
    <form class="filtro" method="GET" action="../controller/metas.controller.php">
      <div class="opnivel">
        <input type="checkbox" name="Urgente" id="Urgente">
        <small><b>Urgente</b></small>
      </div>
      <div class="opnivel">
        <input type="checkbox" name="Moderado" id="Moderado">
        <small><b>Moderado</b></small>
      </div>
      <div class="opnivel">
        <input type="checkbox" name="Dispensavel" id="Dispensavel">
        <small><b>Dispensavel</b></small>
      </div>
      <div class="opFiltro">
        <input type="submit" class="buttonFiltro" value="Filtrar"></input>
      </div>
    </form>
  </div>
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
                <small>Valor: <b>R$<?= number_format($meta['VALOR_META'], 2, ",", ".") ?></b></small>
              </div>
              <div class="op">
                <a href="../controller/metas.controller.php?id_meta=<?= $meta['ID'] ?>">Excluir</a>

              </div>
            </div>
          <?php endforeach ?>

        </div>
        <a class="" href="../view/home.php">Home</a>

        <div id="modal-receita" class="modal-container">
          <div class="modal">
            <button id="close-receita">x</button>
            <div class="infoTran">
              <h1 class="tituloTran" style="font-family: 'Righteous', cursive;">Nova Meta</h1>
            </div>
            <form class="form" method="POST" action="../controller/metas.controller.php">
              <div class="input-sup">
                <div class="input">
                  <label for="text"><b>Valor do Objetivo</b></label></b>
                  <input type="text" id="name" name="value" class="receita">
                </div>
                <div class="input">
                  <label for="text"><b>Data Final Conclusão</b></label></b>
                  <input type="date" id="data" name="data" class="receita">
                </div>


                <div class="input">
                  <label for="text"><b>Descrição</b></label></b>
                  <textarea nid="description" name="description" class="receita" cols="30" rows="10"></textarea>
                </div>
              </div>
              <div class="input">
                <label for="text"><b>Urgencia</b></label></b>
                <select name="urgencia">
                  <option value="Urgente" name="urgencia">Urgente</option>
                  <option value="Moderado" name="urgencia">Moderado</option>
                  <option value="Dispensavel" name="urgencia">Dispensavel</option>
                </select>
                <div class="btnOpcoes">
                  <button class="salvar">Salvar</button>
                  <a href='metas.php' class="cancelar">Cancelar</a>
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