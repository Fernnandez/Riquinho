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
  <div class="container">
    <h1 class="logo"><img src="../../public/assets/wallet.png" alt="logo">Riquinho</h1>
    <div class="cadastro">
      <h2>Cadastro</h2>
      <form action="../controller/usuario.controller.php" method="POST" class="form-cadastro">
        <label for="cadastro-nome">Nome</label>
        <input type="text" id='cadastro-nome' name="nome">
        <label for="cadastro-email">Email</label>
        <input type="email" id='cadastro-email' name="email">
        <label for="cadastro-senha">Senha</label>
        <input type="password" id='cadastro-senha' name="senha">
        <label for="cadastro-senha">Confirmar Senha</label>
        <input type="password" id='cadastro-confirmar-senha' name="confirmarSenha">
        <div class="buttons">
          <button class="btn">Cadastrar</button>
          <a class="btn" href="./login.php">Logar</a>
        </div>
      </form>
    </div>
  </div>

  <script>
    const query = window.location.search;
    const urlParams = new URLSearchParams(query);
    
    if (urlParams.get('msg')) alert(urlParams.get('msg'));
    
  </script> 
</body>

</html>