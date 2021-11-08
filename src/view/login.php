<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../public/css/login.css">
  <title>Login</title>
</head>

<body>
  <div class="container">
    <h1 class="logo"><img src="../../public/assets/wallet.png" alt="logo">Riquinho</h1>
    <div class="login">
      <h2>Login</h2>
      <form action="../controller/login.controller.php" method="POST" class="form-login">
        <label for="login-email">Email</label>
        <input type="email" id='login-email' name="email">
        <label for="login-senha">Senha</label>
        <input type="password" id='login-senha' name="senha">
        <div class="buttons">
          <button class="btn">Entrar</button>
          <a class="btn" href="./cadastro.php">Cadastrar</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>