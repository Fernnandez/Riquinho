<?php
require '../../database/conectar.php';

function criarCarteira($dados)
{
  error_log("#################");
  error_log("#################");
  error_log("entrou aqui no model");
  error_log($dados["ID_USUARIO"]);
  error_log($dados["NAME"]);
  error_log($dados["DESCRICAO"]);
  error_log("#################");
  error_log("#################");
  
  try {
    global $pdo;
    $query = $pdo->prepare('INSERT INTO CARTEIRA (NOME, ID, DESCRICAO) VALUES 
    (:NAME,:ID_USUARIO,:DESCRICAO)');
    $query->execute($dados);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
};

function buscarCarteira($usuarioId)
{
  try {
    global $pdo;
    $sql = "SELECT * FROM CARTEIRA INNER JOIN ";
    $sql = $pdo->prepare($sql);
    $sql->bindValue("ID_USUARIO", $usuarioId);
    $sql->execute();
    return $sql->fetch();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
};
