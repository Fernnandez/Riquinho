<?php

require_once '../model/transacao.model.php';
require_once '../model/carteira.model.php';

function Transacao()
{
  $msg = "Transação cadastrada com sucesso";
  $msgError = "Algo deu errado";

  session_start();

  $today = date("Y-m-d");

  $dados = [

    'ID_USUARIO' => $_SESSION['usuario']['id'],
    'ID_CARTEIRA' => isset($_POST['carteira']) ? $_POST['carteira'] : null,
    'TIPO_TRAN' => $_POST['tipo'],
    'DATA_TRAN' => isset($_POST['data']) ? $_POST['data'] : $today,
    'VALOR_TRAN' => $_POST['valor'],
    'INFO' => $_POST['info']
  ];

  if ($dados['ID_CARTEIRA'] === "") {
    $dados['ID_CARTEIRA'] = null;
  }

  try {

    criarTransacao($dados);
    // header("Location: ../view/home.php?msgsuccess=$msg");
  } catch (\Throwable $th) {

    header("Location: ../view/home.php?errormsg=$msgError");
  }
}

function findTransacao()
{
  $usuario = $_SESSION['usuario']['id'];

  $dados = buscarTransacao($usuario);

  return $dados;

  header("Location: ../view/home.php");
}

function total($dados)
{
  $totalReceita = 0;
  $totalGasto = 0;
  foreach ($dados as $item) {
    if ($item['TIPO_TRAN'] == 'Receita') {
      $totalReceita = $totalReceita + intval($item['VALOR_TRAN']);
    } else {
      $totalGasto = $totalGasto + intval($item['VALOR_TRAN']);
    }
  }
  $result['RECEITA'] = $totalReceita;
  $result['GASTO'] = $totalGasto;

  return $result;
}

$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo === 'POST') {
  try {
    Transacao();
  } catch (Exception $e) {
    header("location: ../view/cadastro.php?msg=" . $e->getMessage());
  }
}
