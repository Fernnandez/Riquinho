<?php

session_start();
//conexão orientada a objetos( PDO )

$host = 'localhost';
$dbname = 'riquinhoteste';
$username = 'root';
$password = 'MIGUEL@gabriel123';

//var global
global $pdo;

try{
//criamos um novo objeto e inserimos nossas variaveis
$pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$username,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
error_log('entrou na validação de conexão');

}catch(PDOException $e){
    echo 'error: ' .$e->getMessage();
    exit;
    error_log('não foi possivel a conexão com o bd$dbname de dados');
}
?>