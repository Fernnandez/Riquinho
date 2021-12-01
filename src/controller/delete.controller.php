<?php

require_once '../model/transacao.model.php';

$id = $_GET['id'];

try {
  global $pdo;
  $query = $pdo->prepare("DELETE FROM TRANSACOES WHERE ID = ?");
  $query->bindParam(1, $id);
  $del = $query->execute();
  header("Location: ../view/home.php");
} catch (Exception $e) {
  echo $e->getMessage();
}
