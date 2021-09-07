<?php
include("config.php");
$codigo = $_GET['codigo'];
$consulta = $conn->query("SELECT vac_nome, van_dose, van_lote, van_data, enf_nome, van_ubs from tb_vacinacao join tb_vacinas on vac_codigo = van_vac_codigo join tb_enfermeiros on enf_codigo = van_enf_codigo JOIN tb_pacientes on pac_codigo = van_pac_codigo where pac_codigo = $codigo");

$consulta2 = $conn->query("SELECT * from tb_pacientes where pac_codigo = $codigo");
$resultado2= $consulta2->fetch_assoc();
?> 
<!DOCTYPE html>
<html>
    <head>
	    <meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title> SUCV - Cartão de Vacinas </title>
		<link rel="stylesheet" type="text/css" href ="css/pitabela1.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@500&display=swap" rel="stylesheet">
		<link rel="icon" sizes="57x57" href="imagens/aba/icon.png">
		
		<script src="https://kit.fontawesome.com/0b07c232ad.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<header>
			<div class="logo">
				<img id = "logoimg" src="imagens/logo/logo.png" alt="logo do site">
				<div class="logotxt">
					<h1>SUCV</h1>
				</div>
			</div>
		</header>
		<br>
		<h3> Cartão de Vacina: </h3>
	    <table border="1">
			<thead>
		    	<tr>
		    		<th colspan="6"> <?php echo $resultado2['pac_nome'];?>/<?php echo $resultado2['pac_cartsus'];?></th>
			    </tr>
				    <td> VACINA </td>
				    <td> DOSE </td>
				    <td> LOTE </td>
				    <td> DATA </td>
				    <td> APLICADOR </td>
				    <td> UBS </td>
			    </tr>
			</thead>
<?php while ($resultado= $consulta->fetch_assoc()) { ?>
			<tbody>
			    <tr> 
			        <td id="vacina" onclick="location.href = 'pitabela3-vacinas.php';" style="cursor: hand;"><?php echo $resultado['vac_nome']; ?></td>
			        <td><?php echo $resultado['van_dose'];?></td>
				    <td><?php echo $resultado['van_lote'];?></td>
				    <td><?php echo $resultado['van_data'];?></td>
				    <td><?php echo $resultado['enf_nome'];?></td>
				    <td><?php echo $resultado['van_ubs'];?></td>
			    </tr>
			</tbody>
<?php } ?>
		</table>
		<br>
	</body>
</html>