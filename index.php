<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- CSS e Fontes -->
	<link rel="stylesheet" href="../../public/css/styles.css" />
	<link rel="stylesheet" href="../../public/css/home.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet" />

	<title>Home</title>
</head>

<body>
	<header class="header">
		<nav>
			<img class="logo" src="public/assets/wallet.png" alt="">
			<ul class="nav-list">
				<li><a href="#"> vantagens para você </a> </li>
				<li><a href="#"> vantagens para sua empresa</a> </li>
				<li><a href="#"> O Riquinho</a> </li>
				<li><a href="#"> Perguntas Frequentes</a> </li>
			</ul>
			<button class="button">
				<span>
					<img src="../../public/assets/enter.svg" alt="icon" /> </span>Login
			</button>
		</nav>
	</header>
	<main class="container">
		<section id="bemVindo">
			<div class="info">
				<div>
					<h1>BEM VINDO AO</h1>
					<h1 class="atent">$ RIQUINHO $</h1>
				</div>
				<p class="fontcard">
					A sua plataforma para aprender a
					<span class="color">economizar</span> de forma simples e
					prática. Aqui você irá receber as melhores
					<span class="color">dicas</span> e motivos para que seu
					<span class="color">dinheiro</span> dure
					<span class="color">mais</span>.
				</p>
				<button class="button-conheca">
					Conheça
					<embed src="../../public/assets/Arrow.svg" type="" />
				</button>
			</div>
			<!-- Embed ao invés de img na hora de renderizar os svgs-->
			<embed class="cofre" src="../../public/assets/Rectangle.svg" alt="" />
		</section>
		<section id="aprenda">
			<div class="info">
				<div>
					<h1>APRENDA</h1>
					<h1>COMO</h1>
					<h1 class="atent">ECONOMIZAR</h1>
				</div>
				<p clclass="fontcard">
					Lorem ipsum dolor sit amet consectetur adipisicing elit.
					Quasi, saepe voluptate totam obcaecati repellat
					temporibus quidem. Deleniti, consectetur. Repellendus
					soluta delectus vero iste eligendi iure id quas nesciunt
					fugit suscipit.
				</p>
				<button class="button-conheca">
					Conheça
					<embed src="../../public/assets/Arrow.svg" type="" />
				</button>
			</div>

			<!-- Embed ao invés de img na hora de renderizar os svgs-->
			<embed class="imgs" src="../../public/assets/astronauta.svg" alt="" />
		</section>
		<section id="saibaTudo">
			<div class="info">
				<div>
					<h1>SAIBA TUDO O</h1>
					<h1>QUE O RIQUINHO</h1>
					<h1>É CAPAZ DE FAZER</h1>
					<h1>POR VOCÊ</h1>
				</div>
				<p class="fontcard">
					Lorem ipsum dolor sit amet consectetur adipisicing elit.
					Quasi, saepe voluptate totam obcaecati repellat
					temporibus quidem. Deleniti, consectetur. Repellendus
					soluta delectus vero iste eligendi iure id quas nesciunt
					fugit suscipit.
				</p>
				<button class="button-conheca">
					Conheça
					<embed src="../../public/assets/Arrow.svg" type="" />
				</button>
			</div>

			<!-- Embed ao invés de img na hora de renderizar os svgs-->
			<embed class="imgs" src="../../public/assets/alura.svg" alt="" />
		</section>
	</main>
	<section class="login">
		<div class="info-login">
			<h1 class="titulo-login">FAÇA O LOGIN</h1>
			<img src="../../public/assets/usuario-frente-porta.png" alt="homem olhando para uma porta" class="img-login">
		</div>
		<div class="form-login">
			<h2 class="titulo-form-login">Entrar</h2>
			<form action="./src/controller/login.controller.php" class="form-from-login" method="POST">
				<input type="email" placeholder="Email" required name="email">
				<input type="password" placeholder="Senha" required name="senha">

				<div class="btns-form-list">
					<button class="form-bnt">
						<img src="../../public/assets/Vector.png" alt="Icone Facebook">
					</button>
					<button class="form-bnt">></button>
				</div>
			</form>
			<p class="form-rec-senha">Esqueceu a senha?</p>
		</div>
	</section>





	<section class="cadastro">
		<div class="form-cadastro">
			<h2 class="titulo-form-cadastro">CADASTRAR</h2>
			<form action="./src/controller/usuario.controller.php" class="form-from-cadastro" method="POST">
				<input type="email" name="email" placeholder="email">
				<input type="text" name="nome" placeholder="nome">
				<input type="password" name="senha" placeholder="senha">
				<input type="password" name="confirmarSenha" placeholder="confirmar senha">

				<div class="btns-form-list">
					<button class="form-bnt">
						<img src="../../public/assets/Vector.png" alt="Icone Facebook">
					</button>
					<button class="form-bnt">></button>
				</div>
			</form>
			<p class="form-rec-senha">Esqueceu a senha?</p>
		</div>
		<div class="info-cadastro">
			<img src="../../public/assets/usuario-frente-porta.png" alt="homem olhando para uma porta" class="img-cadastro">
		</div>
	</section>

</body>

</html>