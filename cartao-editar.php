<?php
include("config.php");
$codigo = $_GET['codigo'];
$consulta = $conn->query("SELECT * from tb_vacinas");
$resultado= $consulta->fetch_assoc();
$consulta2 = $conn->query("SELECT * from tb_enfermeiros");
$resultado2= $consulta2->fetch_assoc();
if(isset($_POST['codv'])){
	extract($_POST);
	if($inserir = $conn->query("UPDATE tb_vacinacao join tb_vacinas on vac_codigo = van_vac_codigo join tb_enfermeiros on enf_codigo = van_enf_codigo JOIN tb_pacientes on pac_codigo = van_pac_codigo set vac_nome = '$codv', 
		van_dose = '$dose', 
		van_lote = '$lote',
		enf_nome = '$code',
		van_ubs = '$ubs',
		van_data = '$data'
		where van_codigo = $codigo")){
		header("Location: pitabela1-pessoas.php");
	}
	else {
		echo "Não foi possível alterar!";
	}
}
$consulta3 = $conn->query("SELECT * from tb_vacinacao join tb_vacinas on vac_codigo = van_vac_codigo join tb_enfermeiros on enf_codigo = van_enf_codigo JOIN tb_pacientes on pac_codigo = van_pac_codigo where pac_codigo = $codigo");
$resultado3= $consulta3->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar Cartão | SUCV</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/cadastros.css">
	<link rel="icon" sizes="57x57" href="assets/logo/icon.png">
</head>
<body>
	<div class="titulo">
		<h1 id="titulo">Atualizar Dados</h1>
		<p id="subt">Atualize os dados da vacinação abaixo</p>
		<br>
	</div>
	<form id="vacinacao" class="form" action="?codigo=<?php echo $codigo; ?>" method="POST">
		<div class="camp">
			<label>Vacina</label>
			<select id="codv" name="codv" required>
				<option value="" selected disabled hidden><?php echo $resultado3['vac_nome']; ?></option>
				<?php while ($resultado= $consulta->fetch_assoc()) { ?>
					<option value="<?php echo $resultado['vac_codigo']; ?>"><?php echo $resultado['vac_nome']; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="camp">
			<label>Dose</label>
			<input id="dose" type="text" name="dose" value="<?php echo $resultado3['van_dose']; ?>" required>
		</div>
		<div class="camp">
			<label>Lote</label>
			<input id="lote" type="text" name="lote" value="<?php echo $resultado3['van_lote']; ?>" required>
		</div>
		<div class="camp">
			<label>UBS</label>
			<input id="ubs" type="text" name="ubs" value="<?php echo $resultado3['van_ubs']; ?>" required>
		</div>
		<div class="camp">
			<label>Enfermeiro</label required>
			<select id="code" name="code" required>
				<option value="" selected disabled hidden><?php echo $resultado3['enf_nome']; ?></option>
				<?php while ($resultado2= $consulta2->fetch_assoc()) { ?>
					<option value="<?php echo $resultado2['enf_codigo']; ?>"><?php echo $resultado2['enf_nome']; ?></option>
						<?php } ?>
			</select>
		</div>
		<div class="camp">
			<label>Data</label required>
			<input id="cod" type="date" name="data" value="<?php echo $resultado3['van_data']; ?>" required>
		</div>
		<button id="b3" class="botao" type="submit">Cadastrar</button>
	</form>
</body>
</html>