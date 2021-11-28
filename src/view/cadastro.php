<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../public/css/cadastro.css">
  <title>Cadastro</title>
</head>

<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">

      <!-- Tabs Titles -->
      <a class="underlineHover" href="./login.php">Login</a>
      <h2 class="active"> cadastro</h2>

      <!-- Icon -->
      <div class="fadeIn first">
        <img src="../../public/assets/wallet.png" id="icon" alt="User Icon" />
      </div>

      <!-- Login Form -->
      <form action="../controller/usuario.controller.php" method="POST">
        <input type="text" id="nome" class="fadeIn second" name="nome" placeholder="nome">
        <input type="text" id="email" class="fadeIn second" name="email" placeholder="email">
        <input type="password" id="senha" class="fadeIn third" name="senha" placeholder="senha">
        <input type="password" id='confirmar-senha' class="fadeIn third" name="confirmarSenha" placeholder="confirmar senha">
        <input type="submit" class="fadeIn fourth" value="Cadastrar">
      </form>

</body>

</html>