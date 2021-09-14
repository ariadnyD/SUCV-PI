<?php 
include("config.php");
$codigo = $_GET['codigo'];
$consulta2 = $conn->query("SELECT * from tb_vacinas where vac_codigo = $codigo");
$resultado2 = $consulta2->fetch_assoc();
if(isset($_POST['nomevac'])){
	extract($_POST);
	if($inserir=$conn->query("UPDATE tb_vacinas set 
		vac_nome = '$nomevac', 
		vac_descricao = '$desc'
		where vac_codigo = $codigo")){
		header("Location: pitabela3-vacinas.php");
	}else{
		echo "Não foi possivel cadastrar a vacina!";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar Vacina | SUCV</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/cadastros.css">
	<link rel="icon" sizes="57x57" href="assets/logo/icon.png">
</head>
<body>
	<div class="titulo">
		<h1 id="titulo">Atualizar Dados</h1>
		<p id="subt">Atualize os dados da vacina abaixo</p>
		<br>
	</div>
	<form id="vacinas" class="form" action="?codigo=<?php echo $codigo; ?>" method="POST">
		<div class="camp">
			<label>Nome</label>
			<input id="nomev" type="text" name="nomevac" value="<?php echo $resultado2['vac_nome']; ?>" required>
		</div>
		<div class="camp">
			<br>
			<label for="desc">Descrição</label>
			<textarea rows="6" style="width: 23em" id="desc" name="desc"><?php echo $resultado2['vac_descricao']; ?></textarea>
		</div>
		<button id="b2" class="botao" type="submit">Editar</button>
	</form>
</body>
</html>