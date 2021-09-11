<?php
include("config.php");
$consulta = $conn->query("SELECT * from tb_pacientes");
if(isset($_GET['pessoa'])){
	$pessoa=$_GET['pessoa'];
	if($consulta=$conn->query("SELECT * from tb_pacientes where pac_cartsus like '%$pessoa%' or pac_nome like '%$pessoa%'")){
	}else{
		echo "Não foi possivel encontrar nada!";
	}
}
if(isset($_GET['excluir'])){
	$codigo = $_GET['excluir'];
	if($consulta2 = $conn->query("DELETE from tb_pacientes where pac_codigo = $codigo")){
		header("Location: pitabela1-pessoas.php");
	} else {
		header("Location: pitabela1-pessoas.php");
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
	    <meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title> Pessoas Cadastradas | SUCV</title>
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
					<p> SUCV </p>
				</div>
			</div>
		</header>
		<div class="body"><form class="search-box" id=p1 method="POST" action="#">
			<input type="text" name="pessoa"class="search-txt" placeholder="Pesquisa de Paciente">
			<button class="search-btn">
				<img src="assets/306102.svg" alt="lupa" height="20" width="20">
			</button>
		</form>
		<h3> Pessoas Encontradas: </h3>
	    <table border="1" class="tabelas">
		    <thead>
			    <tr>
				    <td> # </td>
				    <td> NOME </td>
				    <td> CARTÃO DO SUS </td>
				    <td> DATA DE NASCIMENTO </td> 
				    <td> </td>
			    </tr>
			</thead>
<?php if(isset($_POST['pessoa'])){
      $search = $_POST['pessoa'];
      if($consulta2 = $conn->query("SELECT * from tb_pacientes where pac_cartsus like '%$search%'")){
        $resultado2 = $consulta2->fetch_assoc();
      ?>
			<tbody>
			    <tr> 
			        <td> <?php echo $resultado2['pac_codigo']; ?></td>
				    <td id="cartao" onclick="location.href = 'pitabela2-cartao.php?codigo= <?php echo $resultado2['pac_codigo'];?>';"style="cursor: hand;" > <?php echo $resultado2['pac_nome']; ?> </td>
				    <td> <?php echo $resultado2['pac_cartsus']; ?> </td>
				    <td> <?php echo $resultado2['pac_dtnasc']; ?> </td>
				    <td><a href="pacientes-editar.php?codigo=<?php echo $resultado2['pac_codigo']; ?>"><img src="assets/body/editar.png" width="16"></a>&nbsp;
				    <a href="?excluir=<?php echo $resultado2['pac_codigo']; ?>" onclick="return confirm('Tem certeza?')"><img src="assets/body/excluir.png" width="16"></a></td>
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
				    <td>&nbsp;<a href="pacientes-editar.php?codigo=<?php echo $resultado['pac_codigo']; ?>"><img src="assets/body/editar.png" width="16"></a> 
				    <a href="?excluir=<?php echo $resultado['pac_codigo']; ?>" onclick="return confirm('Tem certeza?')"><img src="assets/body/excluir.png" width="16"></a></td>
			    </tr>
			</tbody>
 <?php }}?>
		</table> </div>
	</body>
</html>
