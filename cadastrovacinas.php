<?php
include("verifica.php");
include("config.php");
if (isset($_POST['nomevac'])) {
	extract($_POST);
	if ($inserir = $conn->query("insert into tb_vacinas (vac_nome, vac_descricao) values ('$nomevac', '$desc')")) {
		header("Location:inicialenfer.php");
	} else {
		echo "Não foi possivel cadastrar a vacina!";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Cadastro de Vacinas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/cadastros.css">
	<link rel="icon" sizes="57x57" href="assets/logo/icon.png">
</head>

<body>
	<div class="titulo">
		<h1 id="titulo">Cadastro de Vacinas</h1>
		<p id="subt">Cadastre a vacina preenchendo os dados abaixo</p>
		<br>
	</div>
	<form id="vacinas" class="form" action="?" method="POST">
		<div class="camp">
			<label>Nome</label>
			<input id="nomev" type="text" name="nomevac" required>
		</div>
		<div class="camp">
			<br>
			<label for="desc">Descrição</label>
			<textarea rows="6" style="width: 23em" id="desc" name="desc"></textarea>
		</div>
		<button id="b2" class="botao" type="submit">Cadastrar</button>
	</form>
</body>

</html>