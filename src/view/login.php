<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../public/css/login.css">
  <link rel="stylesheet" href="../../public/css/global.css">
  <link rel="shortcut icon" href="../../public/assets/wallet.png">
  <title>Login</title>
</head>

<body>

  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <h2 class="active"> Login</h2>
      <a class="underlineHover" href="./cadastro.php">cadastro</a>

      <!-- Icon -->
      <div class="fadeIn first">
        <img src="../../public/assets/wallet.png" id="icon" alt="User Icon" />
      </div>
      <?php if (isset($_GET['msg']) && $_GET['msg'] !== null) : ?>
        <div id="msg">
          <h3><?= $_GET['msg'] ?></h3>
        </div>
      <?php endif ?>
      <!-- Login Form -->
      <form action="../controller/login.controller.php" method="POST">

        <input type="text" id="email" class="fadeIn second" name="email" placeholder="email">
        <input type="password" id="senha" class="fadeIn third" name="senha" placeholder="senha">
        <input type="submit" class="fadeIn fourth" value="Entrar">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="recuperar.php">Esqueceu a senha ?</a>
      </div>

    </div>
  </div>


</body>

</html>