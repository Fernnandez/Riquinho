<?php
/*
session_start();
function conexao() {
  $host = 'localhost';
  $dbname = 'riquinhoteste';
  $username = 'root';
  $password = 'MIGUEL@gabriel123';

//var global
global $conexao;


  try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conexao;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}


*/
session_start();
//function conexao() {
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

/* //criamos a query de teste de conexão
$sql = $pdo->query("SELECT * FROM usuario");//criamos um select que vai retornar todos os usuarios
$sql->execute();//comando que executa a query

echo $sql->rowCount();//roCount = conta quantos registros tem */
//}
?>

