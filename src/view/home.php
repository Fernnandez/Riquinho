<!--Esta parte de codigo verifica se o usuario esta logado, dando acesso a pagina de cadastro  !-->
<?php
session_start();
if ((!isset($_SESSION['id']) === true)) {
  header('Location: ./login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riquinho</title>
</head>

<body>

  <h1>bem vindo!</h1>
  <a href="../controller/login.controller.php">SAIR</a>
  <p>obs: sempre apertar em sair, ou a sessão não será destruida..</p>
</body>

</html>