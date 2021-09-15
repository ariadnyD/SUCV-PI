<?php
include("verifica.php");
include("config.php");
if (isset($_POST['nomec'])) {
	extract($_POST);
	if ($inserir = $conn->query("insert into tb_pacientes (pac_nome, pac_cartsus, pac_dtnasc) values ('$nomec', '$sus', '$nasc')")) {
		header("Location:inicialenfer.php");
	} else {
		echo "Não foi possivel cadastrar a pessoa!";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Cadastro das Pessoas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/cadastros.css">
	<link rel="icon" sizes="57x57" href="assets/logo/icon.png">
</head>

<body>
	<div class="titulo">
		<h1 id="titulo">Cadastro de Pessoas</h1>
		<p id="subt">Cadastre a pessoa preenchendo os dados abaixo</p>
		<br>
	</div>
	<form id="pessoas" class="form" action="?" method="POST">
		<div class="camp">
			<label>Nome Completo</label>
			<input id="nomec" type="text" name="nomec" required>
		</div>
		<div class="camp">
			<label>Cartão do SUS</label>
			<input id="csus" type="text" name="sus" required>
		</div>
		<div class="camp">
			<label>Data de Nascimento</label>
			<input id="nasd" type="date" name="nasc">
		</div>
		<button id="b1" class="botao" type="submit">Cadastrar</button>
	</form>
</body>

</html>