<?php
require_once '../model/carteira.model.php';

function createCarteira()
{

  session_start();

  error_log("*********");
  error_log("*********");
error_log($_POST['name']);
error_log($_POST['description']);
error_log($_SESSION['usuario']['id']);
error_log("*********");
error_log("*********");

  $dados = [
    'ID_USUARIO' => $_SESSION['usuario']['id'],
    'NAME' => $_POST['name'],
    'DESCRICAO' => $_POST['description'],
  ];
  var_dump($dados);
  criarCarteira($dados);
  header("Location: ../view/carteira.php");
}

return createCarteira();
