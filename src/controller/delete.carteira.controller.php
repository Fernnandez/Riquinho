<?php

require_once '../model/carteira.model.php';

$id = $_GET['id'];

try {
  global $pdo;
  $msg = "Carteira deletada com sucesso";
  $errormsg = "Não foi possivel excluir a carteira, provavelmente possui transações vinculadas";
  $query = $pdo->prepare("DELETE FROM CARTEIRA WHERE ID = ?");
  $query->bindParam(1, $id);
  $del = $query->execute();
  header("Location: ../view/carteira.php?msgsuccess=$msg");
} catch (Exception $e) {
  echo $e->getMessage();
}
