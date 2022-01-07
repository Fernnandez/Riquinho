<?php

require_once '../model/carteira.model.php';


function carteira()

{
  $id = $_GET['idcarteira'];

  $user = $_SESSION['usuario']['id'];
  $dados = buscarCarteiraEdit($user, $id);
  return $dados;
  buscarCarteiraEdit($user, $id);
  header("Location: ../view/carteira.update.php");
  return carteira();
}

$metodo = $_SERVER['REQUEST_METHOD'];

function update()
{
  session_start();

  $dados = [
    'ID' => $_POST['id'],
    'ID_USUARIO' => $_SESSION['usuario']['id'],
    'NOME' => $_POST['name'],
    'DESCRICAO' => $_POST['descricao'],
  ];
  updateCarteira($dados);
}

if ($metodo === 'POST') {
  try {
    $msg = "Carteira atualizada com sucesso";
    update();
    header("Location: ../view/carteira.php?msgsuccess=$msg");
  } catch (Exception $e) {
    var_dump($e->getMessage());
  }
}
