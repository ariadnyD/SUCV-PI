<?php
include("config.php");
$consulta = $conexao->query("SELECT * from tb_vacinas");
?>
<!DOCTYPE html>
<html>
    <head>
	    <meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title> SUCV - Vacinas </title>
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
		<form action="#" method="post">
		    <input type="text" name="search" id="search" placeholder="Faça sua busca" required>
			<button type="submit"> <i class="fas fa-search"></i></button>
		</form>
		<h3> Vacinas: </h3>
	    <table border="1">
		    <thead>
			    <tr>
				    <td> # </td>
				    <td> NOME </td>
				    <td> DESCRIÇÃO </td>
			    </tr>
			</thead>
<?php while($resultado = $consulta->fetch_assoc()){ ?>
			<tbody>
			    <tr> 
			        <td><?php echo $resultado['vac_codigo'];?></td>
				    <td><?php echo $resultado['vac_nome'];?></td>
				    <td><?php echo $resultado['vac_descricao'];?></td>
			    </tr>
			</tbody>
<?php }?>
		</table>
		<br>
		<a href="pitabela2-cartao.php"> Voltar </a>
	</body>
</html>