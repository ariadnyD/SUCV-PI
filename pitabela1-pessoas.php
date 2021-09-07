<?php
include("config.php");
$consulta = $conn->query("SELECT * from tb_pacientes");
if(isset($_GET['pessoa'])){
	$pessoa=$_GET['pessoa'];
	if($consulta=$conn->query("SELECT * from tb_pacientes where pac_cartsus like '$pessoa'")){
	}else{
		echo "Não foi possivel encontrar nada!";
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
	    <meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title> SUVC - Pessoas Cadastradas</title>
		<link rel="stylesheet" type="text/css" href ="css/pitabela1.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
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
			<button type="submit" id="botao"> <i class=" fas fa-search"></i></button>
		</form>
		<h3> Pessoas Encontradas: </h3>
	    <table border="1">
		    <thead>
			    <tr>
				    <td> # </td>
				    <td> NOME </td>
				    <td> CARTÃO DO SUS </td>
				    <td> DATA DE NASCIMENTO </td> 
			    </tr>
			</thead>
<?php if(isset($_POST['search'])){
      $search = $_POST['search'];
      if($consulta2 = $conn->query("SELECT * from tb_pacientes where pac_cartsus like '$search'")){
        $resultado2 = $consulta2->fetch_assoc();
      ?>
			<tbody>
			    <tr> 
			        <td> <?php echo $resultado2['pac_codigo']; ?></td>
				    <td id="cartao" onclick="location.href = 'pitabela2-cartao.php?codigo= <?php echo $resultado2['pac_codigo'];?>';"style="cursor: hand;" > <?php echo $resultado2['pac_nome']; ?> </td>
				    <td> <?php echo $resultado2['pac_cartsus']; ?> </td>
				    <td> <?php echo $resultado2['pac_dtnasc']; ?> </td>
			    </tr>
			</tbody>
<?php }else {
		echo "Paciente não encontrado!";
	  }
	   } else { while($resultado = $consulta->fetch_assoc()){ ?> 
			<tbody>
			    <tr> 
			        <td> <?php echo $resultado['pac_codigo']; ?></td>
				    <td id="cartao" onclick="location.href = 'pitabela2-cartao.php?codigo= <?php echo $resultado['pac_codigo'];?>';"style="cursor: hand;" > <?php echo $resultado['pac_nome']; ?> </td>
				    <td> <?php echo $resultado['pac_cartsus']; ?> </td>
				    <td> <?php echo $resultado['pac_dtnasc']; ?> </td>
			    </tr>
			</tbody>
 <?php }}?>
		</table>
		<br>
	</body>
</html>