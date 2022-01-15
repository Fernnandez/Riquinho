<?php

$host = "localhost";
$dbname = "riquinho";
$username = "root";
$password = "MIGUEL@gabriel123";

global $pdo;

try {
  $pdo = new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'error: ' . $e->getMessage();
  exit;
}
