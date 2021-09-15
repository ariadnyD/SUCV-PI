<?php
include("verifica.php");
include("config.php");
$consulta = $conn->query("select * from tb_vacinas");
$consulta2 = $conn->query("select * from tb_enfermeiros");
if (isset($_POST['codp'])) {
	extract($_POST);
	if ($inserir = $conn->query("insert into tb_vacinacao (van_pac_codigo, van_vac_codigo, van_enf_codigo, van_dose, van_lote, van_ubs, van_data) values ('$codp', '$codv','$code', '$dose', '$lote', '$ubs', '$data')")) {
		header("Location:inicialenfer.php");
	} else {
		echo "Não foi possivel cadastrar a vacinação!";
	}
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
	<meta charset="utf-8">
	<title>Cadastro de Vacinação</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/cadastros.css">
	<link rel="icon" sizes="57x57" href="assets/logo/icon.png">
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
			<label>Vacina</label>
			<select id="codv" name="codv" required>
				<?php while ($resultado = $consulta->fetch_assoc()) { ?>
					<option value="<?php echo $resultado['vac_codigo']; ?>"><?php echo $resultado['vac_nome']; ?></option>
				<?php } ?>
			</select>
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
			<label>Enfermeiro</label required>
			<select id="code" name="code" required>
				<?php while ($resultado1 = $consulta2->fetch_assoc()) { ?>
					<option value="<?php echo $resultado1['enf_codigo']; ?>"><?php echo $resultado1['enf_nome']; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="camp">
			<label>Data</label required>
			<input id="cod" type="date" name="data">
		</div>
		<button id="b3" class="botao" type="submit">Cadastrar</button>
	</form>
</body>

</html>