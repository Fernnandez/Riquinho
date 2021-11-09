<?php
$host = 'localhost';
$dbname = 'riquinho';
$username = 'felinto';
$password = 'Luc@s8630';

global $pdo;

try {
  $pdo = new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  error_log('entrou na validação de conexão');
} catch (PDOException $e) {
  echo 'error: ' . $e->getMessage();
  exit;
}