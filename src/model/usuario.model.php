<?php

require('../../database/conectcar.php');

function criarUsuario($dados) {
  try {
    //$pdo = conexao();
    global $pdo;

    
    //var_dump($pdo);
    $query = $pdo->prepare('INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)');
    $query->execute($dados);
  } catch(PDOException $e) {
    echo $e->getMessage();
  }
};