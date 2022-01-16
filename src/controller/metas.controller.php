<?php
require_once '../model/metas.model.php';

function handleMetas()
{
  $msg = "Meta cadastrada com sucesso";
  $msgError = "Algo deu errado";
  $today = date("Y-m-d");

  session_start();

  if ($_POST['urgencia'] != null && $_POST['data'] != null && $_POST['description'] != null && $_POST['value'] != null) {
    $dados = [
      'ID_USUARIO' => $_SESSION['usuario']['id'],
      'NIVEL_META' => $_POST['urgencia'],
      'DATA_META' => isset($_POST['data']) ? $_POST['data'] : $today,
      'INICIO_META' => $today,
      'DESCRICAO_META' => $_POST['description'],
      'VALOR_META' => $_POST['value'],
      'ID_CARTEIRA' => $_POST['carteira']
    ];
    if ($dados['ID_CARTEIRA'] === "") {
      $dados['ID_CARTEIRA'] = null;
    }
  }

  try {
    createMetas($dados);
    header("Location: ../view/metas.php?msgsuccess=$msg");
  } catch (\Throwable $th) {
    header("Location: ../view/metas.php?errormsg=$msgError");
  }
}

function listMetas()
{
  $usuario = $_SESSION['usuario']['id'];

  $dados = searchMetas($usuario);

  return $dados;

  header("Location: ../view/metas.php");
}

function excluirMetas()
{
  $usuario = $_SESSION['usuario']['id'];
  $metaExcluir = $_GET['id_meta'];
  $msg = "Meta excluida com sucesso";
  $msgError = "Algo deu errado";

  try {
    deleteMetas($usuario, $metaExcluir);
    header("Location: ../view/metas.php?msgsuccess=$msg");
  } catch (\Throwable $th) {
    header("Location: ../view/metas.php?errormsg=$msgError");
  }
}

//verificação do metodo de envio de dados
$metodo = $_SERVER['REQUEST_METHOD'];
if ($metodo === 'POST') {
  try {
    handleMetas();
  } catch (Exception $e) {
    //header("location: ../view/cadastro.php?msg=" . $e->getMessage());
  }
}

if ($metodo === 'GET') {
  if (isset($_GET['id_meta'])) {
    try {
      excluirMetas();
    } catch (Exception $e) {
      //header("location: ../view/cadastro.php?msg=" . $e->getMessage());
    }
  }
}
