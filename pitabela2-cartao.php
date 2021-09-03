<?php
include("config.php");
$codigo = $_GET['codigo'];
$consulta2 = $conexao->query("select * from tb_pacientes where pac_codigo = $codigo");
$resultado2= $consulta2->fetch_assoc();

$consulta = $conexao->query("select vac_nome, van_lote, van_data, enf_nome, van_ubs from tb_vacinacao join tb_vacinas on vac_codigo = van_vac_codigo join tb_enfermeiros on enf_codigo = van_enf_codigo where pac_codigo = $codigo");
?> 
<!DOCTYPE html>
<html>
    <head>
	    <meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title> SUCV - Cartão de Vacinas </title>
		<link rel="stylesheet" type="text/css" href ="css/pitabela1.css">
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
		<form action="#" method="POST">
		    <input type="text" name="search" id="search" placeholder="Faça sua busca" required>
			<button type="submit"> <i class="fas fa-search"></i></button>
		</form>
		<h3> Cartão de Vacina: </h3>
	    <table border="1">
		    <thead>
		    	<tr>
		    		<th colspan="5"> <?php echo $resultado2['pac_nome'];?>/<?php echo $resultado2['pac_cartsus'];?></th>
			    </tr>
				    <td> VACINA </td>
				    <td> LOTE </td>
				    <td> DATA </td>
				    <td> APLICADOR </td>
				    <td> UBS </td>
			    </tr>
			</thead>
<?php $resultado = $consulta->fetch_assoc()?>
			<tbody>
			    <tr> 
			        <td id="vacina" onclick="location.href = 'pitabela3-vacinas.php';" style="cursor: hand;"><?php echo $resultado['vac_nome']; ?></td>
				    <td><?php echo $resultado['van_lote'];?></td>
				    <td><?php echo $resultado['van_data'];?></td>
				    <td><?php echo $resultado['enf_nome'];?></td>
				    <td><?php echo $resultado['van_ubs'];?></td>
			    </tr>
			</tbody>
		</table>
		<br>
		<a href="pitabela1-pessoas.php"> Voltar </a>
	</body>
</html>