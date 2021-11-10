<?php

$host = getenv('DB_HOST');
$dbname =  getenv('DB_NAME');
$username = getenv('DB_USER');
$password = getenv('DB_PASS');

global $pdo;

try {
  $pdo = new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  error_log('entrou na validação de conexão');
} catch (PDOException $e) {
  echo 'error: ' . $e->getMessage();
  exit;
}
