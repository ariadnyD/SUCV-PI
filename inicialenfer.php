<?php 
include("verifica.php");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<title>Pagina Inicial Enfermeiro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/inicialenfer.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@500&display=swap" rel="stylesheet">
	<link rel="icon" sizes="57x57" href="assets/logo/icon.png">
</head>
<body>
	<header>
		<div class="logo">
			<img class="logoimg" src="assets/logo/logo.png">
			<div class="logotxt">
				<p>SUCV</p>
			</div>
		</div>
		<div class="menu">
			<a class="title" href="pitabela1-pessoas.php">PESSOAS CADASTRADAS</a>
			<a class="title" href="pitabela3-vacinas.php">VACINAS CADASTRADAS</a>
			<a class="title sair" href="sair.php">SAIR</a>
		</div>
	</header>
	<form class="search-box" id=p1 method="GET" action="pitabela1-pessoas.php">
		<input type="text" name="pessoa"class="search-txt" placeholder="Pesquisar Pessoa">
		<button class="search-btn">
			<img src="assets/body/306102.svg" alt="lupa" height="20" width="20">
		</button>
	</form>
	<form class="search-box" id="p2" method="GET" action="pitabela3-vacinas.php">
		<input type="text" name="vacina" class="search-txt" placeholder="Pesquisar Vacina">
		<button class="search-btn">
			<img src="assets/body/306102.svg" alt="lupa" height="20" width="20">
		</button>
	</form>
	<button onclick="b1v()" id="b1" class="botao" type="button">Cadastrar Vacina</button>
	<button onclick="b2p()" id="b2" class="botao" type="button">Cadastrar Pessoa</button>
	<button onclick="b3v()" id="b3" class="botao" type="button">Cadastrar Vacinação</button>

	<script type="text/javascript">
		function b1v(){
			window.location.href = "cadastrovacinas.php";
		}
		function b2p(){
			window.location.href = "cadastropessoas.php"
		}
		function b3v(){
			window.location.href = "cadastrovacinacao.php"
		}
	</script>
</body>
</html>