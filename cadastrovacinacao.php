<?php 
include("config.php");
if(isset($_POST['codp'])){
	extract($_POST);
	if($inserir=$conn->query("insert into tb_vacinacao (van_pac_codigo, van_vac_codigo, van_enf_codigo, van_dose, van_lote, van_ubs, van_data) values ('$codp', '$codv','$code', '$dose', '$lote', '$ubs', '$data')")){
		header("Location:inicialenfer.html");
	}else{
		echo "Não foi possivel cadastrar a vacinação!";
	}
}
?>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<title>Cadastro de Vacinação</title>
	<link rel="stylesheet" type="text/css" href="css/cadastros.css">
	<link rel="icon" sizes="57x57" href="imagens/aba/icon.png">
</head>
<body>
	<div class="titulo">
		<h1 id="titulo">Cadastro de Vacinação</h1>
		<p id="subt">Cadastre a vacinação preenchendo os dados abaixo</p>
		<br>
	</div>
	<form id="vacinacao" class="form" action="?" method="POST">
		<div class="camp">
			<label>Código da Pesssoa</label>
			<input id="codp" type="text" name="codp" required>
		</div>
		<div class="camp">
			<label>Código da Vacina</label>
			<input id="codv" type="text" name="codv" required>
		</div>
		<div class="camp">
			<label>Dose</label>
			<input id="dose" type="text" name="dose">
		</div>
		<div class="camp">
			<label>Lote</label>
			<input id="lote" type="text" name="lote">
		</div>
		<div class="camp">
			<label>UBS</label>
			<input id="ubs" type="text" name="ubs">
		</div>
		<div class="camp">
			<label>Código do Enfermeiro</label required>
			<input id="code" type="text" name="code">
		</div>
		<div class="camp">
			<label>Data</label required>
			<input id="code" type="date" name="data">
		</div>
		<button id="b3" class="botao" type="submit">Cadastrar</button>
	</form>
</body>
</html>