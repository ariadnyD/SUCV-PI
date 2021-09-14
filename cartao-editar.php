<?php
include("config.php");
$codigo = $_GET['codigo'];
if(isset($_POST['codv'])){
	extract($_POST);
	if($inserir = $conn->query("update tb_vacinacao set van_vac_codigo = '$codv', van_dose = '$dose', van_lote = '$lote', van_enf_codigo = '$code', van_ubs = '$ubs', van_data = '$data' where van_codigo = $codigo")){
		header("Location: pitabela1-pessoas.php");
	}
	else {
		echo "Não foi possível alterar!";
	}
}
$consulta = $conn->query("select * from tb_vacinas");
$consulta2 = $conn->query("select * from tb_enfermeiros");
$consulta3 = $conn->query("select * from tb_vacinacao where van_codigo = $codigo");
$resultado3= $consulta3->fetch_assoc();
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
		<h1 id="titulo">Atualizar Dados</h1>
		<p id="subt">Atualize os dados da vacinação abaixo</p>

		<br>
	</div>
	<form id="vacinacao" class="form" action="?codigo=<?php echo $codigo; ?>" method="POST">
		<div class="camp">
			<label>Código da Pesssoa</label>
			<input id="codp" type="text" name="codp" value="<?php echo $resultado3['van_pac_codigo']; ?>" disabled>
		</div>
		<div class="camp">
			<label>Vacina</label>
			<select id="codv" name="codv" >
				<?php while ($resultado= $consulta->fetch_assoc()) { ?>
					<option value="<?php echo $resultado['vac_codigo']; ?>" <?php if($resultado['vac_codigo']==$resultado3['van_vac_codigo']) echo "selected";?>><?php echo $resultado['vac_nome']; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="camp">
			<label>Dose</label>
			<input id="dose" type="text" name="dose" value="<?php echo $resultado3['van_dose']; ?>">
		</div>
		<div class="camp">
			<label>Lote</label>
			<input id="lote" type="text" name="lote" value="<?php echo $resultado3['van_lote']; ?>">
		</div>
		<div class="camp">
			<label>UBS</label>
			<input id="ubs" type="text" name="ubs" value="<?php echo $resultado3['van_ubs']; ?>">
		</div>
		<div class="camp">
			<label>Enfermeiro</label>
			<select id="code" name="code">
				<?php while ($resultado2= $consulta2->fetch_assoc()) { ?>
					<option value="<?php echo $resultado2['enf_codigo']; ?>" <?php if($resultado2['enf_codigo']==$resultado3['van_enf_codigo']) echo "selected"; ?>><?php echo $resultado2['enf_nome']; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="camp">
			<label>Data</label>
			<input id="cod" type="date" name="data" value="<?php echo $resultado3['van_data']; ?>">
		</div>
		<button id="b3" class="botao" type="submit">Editar</button>
	</form>
</body>
</html>