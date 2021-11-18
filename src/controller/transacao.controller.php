<?php

require_once '../model/transacao.model.php';
require_once '../model/carteira.model.php';

function Transacao()
{
  session_start();

  $today = date("Y-m-d");
  //$carteira = buscarCarteira($_SESSION['usuario']['id']);
  $usuario = $_SESSION['usuario']['id'];
  $dados = [
    'ID_USUARIO' => $usuario,
    'TIPO_TRANSA' => $_POST['tipo'],
    'DATA_TRANSA' => $today,
    'VALOR_TRANSA' => $_POST['valor'],
    'INFO' => $_POST['info']
  ];
  // var_dump($dados);
  criarTransacao($dados);
  header("Location: ../view/home.php");
}

function transa()
{
  session_start();

  $usuario = $_SESSION['usuario']['id'];

  $dados = buscarTransacao($usuario);

  return $dados;
}

$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo === 'POST') {
  try {
    Transacao();
  } catch (Exception $e) {
    header("location: ../view/cadastro.php?msg=" . $e->getMessage());
    // var_dump($e->getMessage());
  }
}

// if ($metodo === 'GET') {
//   try {
//     transa()
//   } catch (Exception $e) {
//     //throw $th;
//   }
// }
