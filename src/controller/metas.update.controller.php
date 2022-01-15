<?php

require_once '../model/metas.model.php';


function metas()

{
    var_dump("entrou");
    error_log("entrou");
  $id = $_GET['idmeta'];

  $user = $_SESSION['usuario']['id'];
  $metas = searchMetasEdit($user, $id);
  return $metas;
  searchMetasEdit($user, $id);
  header("Location: ../view/metas.update.php");
  return metas();
}

$metodo = $_SERVER['REQUEST_METHOD'];

function update()
{
    error_log("valor do id da meta");
    error_log($_POST['ID_META']);
    $today = date("Y-m-d");
  session_start();

  if ($_POST['urgencia'] != null && $_POST['data'] != null && $_POST['description'] != null && $_POST['value'] != null && $_POST['carteira'] != null) {
    $dados = [
      'ID_META' => $_POST['ID_META'],
      'ID_USUARIO' => $_SESSION['usuario']['id'],
      'NIVEL_META' => $_POST['urgencia'],
      'DATA_META' => isset($_POST['data']) ? $_POST['data'] : $today,
      'INICIO_META' => $today,
      'DESCRICAO_META' => $_POST['description'],
      'VALOR_META' => $_POST['value'],
      'ID_CARTEIRA' => $_POST['carteira']
    ];
  }

  updateMetas($dados);
}

if ($metodo === 'POST') {
  try {
    $msg = "Carteira atualizada com sucesso";
    update();
    header("Location: ../view/metas.php?msgsuccess=$msg");
  } catch (Exception $e) {
    var_dump($e->getMessage());
  }
}
