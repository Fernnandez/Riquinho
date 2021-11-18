<?php

require_once '../model/transacao.model.php';

$id = $_GET['id'];

try {
    global $pdo;
    $query = $pdo->prepare("DELETE FROM TRANSACOES WHERE ID = ?");
    $query->bindParam(1, $id);
    $del= $query->execute();
    //var_dump($id);
    header("Location: ../view/home.php");
    // return $query;
} catch (Exception $e) {
    echo $e->getMessage();
}
