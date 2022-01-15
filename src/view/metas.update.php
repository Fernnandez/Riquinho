<!--Esta parte de codigo verifica se o usuario esta logado, dando acesso a pagina de cadastro  !-->
<?php
session_start();
if ((!isset($_SESSION['usuario']) === true)) {
  header('Location: ./login.php');
}
require "../controller/metas.update.controller.php";
require "../controller/carteira.controller.php";

$metas = metas();
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
  <link rel="stylesheet" href="../../public/css/update.css" />

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
          <a href="../view/metas.php">Metas</a>
          <a href="../controller/login.controller.php"> Sair</a>
         </h2>
        </div>
      </div>
    </div>

                         
    <div id="modal-gasto" class="modal-container">
      <div class="modal">
        <div class="infoTran">
          <h1 class="tituloTran">Atualizar Metas</h1>
          <h2 id="tipoCarteira">Metas</h2>
        </div>

        <form class="form" method="POST" action="../../src/controller/metas.update.controller.php">
                            <div class="input-sup">
                                <div class="input">
                                    <label for="text"><b>Valor do Objetivo</b></label></b>
                                    <input type="text" id="name" name="value" class="receita" value="<?= $metas[0]["VALOR_META"] ?>">
                                </div>
                                <div class="input">
                                    <label for="text"><b>Data Final</b></label></b>
                                    <input type="date" id="data" name="data" class="receita" value="<?= $metas[0]["DATA_META"] ?>">
                                </div>
                                <div class="input">
                                    <label for="text"><b>Descrição</b></label></b>
                                    <textarea nid="description" name="description" class="receita" cols="30" rows="10" value="<?= $metas[0]["DESCRICAO_META"] ?>"><?= $metas[0]["DESCRICAO_META"] ?></textarea>
                                </div>
                                <div class="input" style="display: none;">
              <label for="info"><b>Info</b></label></b>
              <input type="text" id="info" name="ID_META" value="<?= $metas[0]["ID_META"] ?>">
            </div>

                            </div>
                            <div class="selects">
                            <div class="input" style="margin-top:20px">
                                <label for="text"><b>Urgencia</b></label></b>
                                <select name="urgencia" class="select" style="width: 150px;height: 50px;border: 1px solid green;font-size: 18px;text-align: center;background:white;"> 
                                <option value="Urgente" name="urgencia" value="<?= $metas[0]["NIVEL_META"] ?>"><?= $metas[0]["NIVEL_META"] ?></option>
                                <option value="Urgente" name="urgencia" >Urgente</option>
                                    <option value="Moderado" name="urgencia">Moderado</option>
                                    <option value="Dispensavel" name="urgencia">Dispensavel</option>
                                </select>
                            </div>
                            <div class="input" style="margin-top:20px">
                                <label for="text"><b>Carteira</b></label></b>
                                <select name="carteira" class="select" style="width: 150px;height: 50px;border: 1px solid green;font-size: 18px;text-align: center;background:white;"> 
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
</html>