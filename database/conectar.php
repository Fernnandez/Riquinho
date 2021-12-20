<?php

$host = "localhost";
$dbname = "riquinho";
$username = "parzival";
$password = "Parzival@29";

global $pdo;

try {
  $pdo = new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'error: ' . $e->getMessage();
  exit;
}
