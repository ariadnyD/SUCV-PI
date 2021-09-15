<?php
include("verifica.php");
include("config.php");
$consulta = $conn->query("SELECT * from tb_vacinas");
if (isset($_GET['codigo'])) {
	$codigo = $_GET['codigo'];
	if ($consulta = $conn->query("SELECT * from tb_vacinas where vac_codigo = $codigo")) {
	}
}
if (isset($_GET['vacina'])) {
	$vacina = $_GET['vacina'];
	if ($consulta = $conn->query("select * from tb_vacinas where vac_nome like '%$vacina%'")) {
	} else {
		echo "Não foi possivel encontrar nada!";
	}
}
if (isset($_GET['excluir'])) {
	$excluir = $_GET['excluir'];
	if ($consulta = $conn->query("DELETE from tb_vacinas where vac_codigo = $excluir")) {
		header("Location: pitabela3-vacinas.php");
	} else {
		header("Location: pitabela3-vacinas.php");
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> SUCV - Vacinas </title>
	<link rel="stylesheet" type="text/css" href="css/pitabela1.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@500&display=swap" rel="stylesheet">
	<link rel="icon" sizes="57x57" href="assets/logo/icon.png">

	<script src="https://kit.fontawesome.com/0b07c232ad.js" crossorigin="anonymous"></script>
</head>

<body>
	<header>
		<div class="logo">
			<img id="logoimg" src="assets/logo/logo.png" alt="logo do site">
			<div class="logotxt">
				<p>SUCV</p>
			</div>
		</div>
	</header>
	<div class="inferior">
		<form class="search-box" id=p1 method="POST" action="#">
			<input type="text" name="vac" class="search-txt" placeholder="Pesquisa de vacina">
			<button class="search-btn">
				<img src="assets/306102.svg" alt="lupa" height="20" width="20">
			</button>
		</form>
		<h3> Vacinas: </h3>
		<table border="1" class="tabelas">
			<thead>
				<tr>
					<td> # </td>
					<td> NOME </td>
					<td> DESCRIÇÃO </td>
					<?php @session_start();
					if (isset($_SESSION['email'])) { ?>
						<td> </td>
					<?php } ?>
				</tr>
			</thead>
			<?php if (isset($_POST['vac'])) {
				$searchv = $_POST['vac'];
				if ($consulta2 = $conn->query("SELECT * from tb_vacinas where vac_nome like '%$searchv%'")) {
					$resultado2 = $consulta2->fetch_assoc();
			?>
					<tbody>
						<tr>
							<td><?php echo $resultado2['vac_codigo']; ?></td>
							<td><?php echo $resultado2['vac_nome']; ?></td>
							<td><?php echo $resultado2['vac_descricao']; ?></td>
							<?php
							@session_start();
							if (isset($_SESSION['email'])) { ?>
								<td><a href="vacina-editar.php?codigo=<?php echo $resultado2['vac_codigo']; ?>"><img src="assets/body/editar.png" width="16"></a>&nbsp;
									<a href="?excluir=<?php echo $resultado2['vac_codigo']; ?>" onclick="return confirm('Tem certeza?')"><img src="assets/body/excluir.png" width="16"></a>
								</td>
							<?php } ?>
						</tr>
					</tbody>
				<?php } else {
					echo "Vacina não encontrada!";
				}
			} else {
				while ($resultado = $consulta->fetch_assoc()) { ?>
					<tbody>
						<tr>
							<td><?php echo $resultado['vac_codigo']; ?></td>
							<td><?php echo $resultado['vac_nome']; ?></td>
							<td><?php echo $resultado['vac_descricao']; ?></td>
							<?php
							@session_start();
							if (isset($_SESSION['email'])) { ?>
								<td><a href="vacina-editar.php?codigo=<?php echo $resultado['vac_codigo']; ?>"><img src="assets/body/editar.png" width="16"></a>&nbsp;
									<a href="?excluir=<?php echo $resultado['vac_codigo']; ?>" onclick="return confirm('Tem certeza?')"><img src="assets/body/excluir.png" width="16"></a>
								</td>
							<?php } ?>
						</tr>
					</tbody>
			<?php }
			} ?>
		</table><?php @session_start();
						if (isset($_SESSION['email'])) { ?><a href="inicialenfer.php">Pagina inicial enfermeiros</a>
		<?php } ?>
	</div>
</body>

</html>