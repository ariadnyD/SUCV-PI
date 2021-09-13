<?php
include("config.php");

$codigo = $_GET['codigo'];

if(isset($_POST['nomec'])){
	extract($_POST);
	if($consulta = $conn->query("UPDATE tb_pacientes set pac_nome = '$nomec', 
		pac_cartsus = '$sus', 
		pac_dtnasc = '$nasc'
		where pac_codigo = $codigo")){
		header("Location: pitabela1-pessoas.php");
	}
	else {
		echo "Não foi possível alterar!";
	}
}

$consulta2 = $conn->query("SELECT * from tb_pacientes where pac_codigo = $codigo");
$resultado2 = $consulta2->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar Paciente | SUCV</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/cadastros.css">
	<link rel="icon" sizes="57x57" href="assets/logo/icon.png">
</head>
<body>
	<div class="titulo">
		<h1 id="titulo">Atualizar Dados</h1>
		<p id="subt">Atualize os dados da pessoa abaixo</p>
		<br>
	</div>
	<form id="pessoas" class="form" action="?codigo=<?php echo $codigo; ?>" method="POST">
		<div class="camp">
			<label>Nome Completo</label>
			<input id="nomec" type="text" name="nomec" value="<?php echo $resultado2['pac_nome']; ?>" required>
		</div>
		<div class="camp">
			<label>Cartão do SUS</label>
			<input id="csus" type="text" name="sus" value="<?php echo $resultado2['pac_cartsus']; ?>" required>
		</div>
		<div class="camp">
			<label>Data de Nascimento</label>
			<input id="nasd" type="date" name="nasc" value="<?php echo $resultado2['pac_dtnasc']; ?>">
		</div>
		<button id="b1" class="botao" type="submit">Atualizar</button>
	</form>
</body>
</html>