<?php

function conexao() {
  $host = '';
  $dbname = '';
  $username = '';
  $password = '';

  try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    return $conexao;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

