<?php
include("config.php");
if (isset($_GET['cartao'])){
	$cartao=$_GET['cartao'];
	if($consulta=$conn->query("SELECT * from tb_vacinacao join tb_vacinas on vac_codigo = van_vac_codigo join tb_enfermeiros on enf_codigo = van_enf_codigo JOIN tb_pacientes on pac_codigo = van_pac_codigo where pac_cartsus = $cartao")){
		$consulta2 = $conn->query("SELECT * from tb_pacientes where pac_cartsus = $cartao");
		$resultado2= $consulta2->fetch_assoc();
	}else{
		header("Location: index.html");
	}
}
if(isset($_GET['codigo'])){
	$codigo = $_GET['codigo'];
	if($consulta = $conn->query("SELECT * from tb_vacinacao join tb_vacinas on vac_codigo = van_vac_codigo join tb_enfermeiros on enf_codigo = van_enf_codigo JOIN tb_pacientes on pac_codigo = van_pac_codigo where pac_codigo = $codigo")){
		$consulta2 = $conn->query("SELECT * from tb_pacientes where pac_codigo = $codigo");
		$resultado2= $consulta2->fetch_assoc();
	}
}
if(isset($_GET['excluir'])){
	$excluir = $_GET['excluir'];
	if($consulta3 = $conn->query("DELETE from tb_vacinacao where van_codigo = $excluir")){
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
	    <title> SUCV - Cartão de Vacinas </title>
		<link rel="stylesheet" type="text/css" href ="css/pitabela1.css">
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
				<img id = "logoimg" src="assets/logo/logo.png" alt="logo do site">
				<div class="logotxt">
					<p>SUCV</p>
				</div>
			</div>
		<?php @session_start();
		if (isset($_SESSION['email'])) { ?>
			<div class="menu">
				<a class="title" href="inicialenfer.php">HOME ENFERMEIRO</a>
			</div>
		<?php } ?>
		</header>
		<br>
		<div class="inferior"><h3> Cartão de Vacina: </h3>
	    <table border="1" class="tabelas">
			<thead>
		    	<tr>
		    	<?php if(empty($resultado2)){  	 ?>
		    		<th colspan="7"> Paciente não encontrado </th>
		    		<?php @session_start();
				    }else if(isset($_SESSION['email'])){ ?>
				    <th colspan="7"> <?php echo $resultado2['pac_nome'];?>/<?php echo $resultado2['pac_cartsus'];?></th>
		    	<?php } else if(isset($resultado2)){ ?>
		    		<th colspan="6"> <?php echo $resultado2['pac_nome'];?>/<?php echo $resultado2['pac_cartsus'];?></th>
		    	<?php }?>
			    </tr>
				    <td> VACINA </td>
				    <td> DOSE </td>
				    <td> LOTE </td>
				    <td> DATA </td>
				    <td> APLICADOR </td>
				    <td> UBS </td>
				    <?php 
				    @session_start();
				    if(isset($_SESSION['email'])){ ?>
				    <td> </td>
				    <?php }?>
			    </tr>
			</thead>
		<?php while ($resultado= $consulta->fetch_assoc()) { ?>
	        <tbody>
			    <tr> 
			    	<td id="vacina" style="cursor: hand;">
			    		<a href="pitabela3-vacinas.php?codigo=<?php echo $resultado['vac_codigo'];?>"><?php echo $resultado['vac_nome']; ?></a></td>
			        <td><?php echo $resultado['van_dose'];?></td>
				    <td><?php echo $resultado['van_lote'];?></td>
				    <td><?php echo $resultado['van_data'];?></td>
				    <td><?php echo $resultado['enf_nome'];?></td>
				    <td><?php echo $resultado['van_ubs'];?></td>
				<?php 
				@session_start();
				if(isset($_SESSION['email'])){ ?>
				    <td><a href="cartao-editar.php?codigo=<?php echo $resultado['van_codigo']; ?>"><img src="assets/body/editar.png" width="16"></a>&nbsp;
				    <a href="?excluir=<?php echo $resultado['van_codigo']; ?>" onclick="return confirm('Tem certeza?')"><img src="assets/body/excluir.png" width="16"></a></td>
				<?php } ?>
			    </tr>
			</tbody>
		<?php } ?>
		</table>
	</div>
</body>
</html>