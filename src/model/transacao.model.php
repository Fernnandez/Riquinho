<?php
require '../../database/conectar.php';

function criarTransacao($dados)
{
  var_dump($dados);
  try {
    global $pdo;
    $query = $pdo->prepare('INSERT INTO TRANSACOES (ID_CARTEIRA, TIPO_TRANSA, DATA_TRANSA, VALOR_TRANSA) VALUES (:ID_CARTEIRA, :TIPO_TRANSA, :DATA_TRANSA, :VALOR_TRANSA)');
    $query->execute($dados);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
};
