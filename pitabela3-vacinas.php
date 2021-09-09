<?php
include("config.php");
$consulta = $conn->query("SELECT * from tb_vacinas");
if(isset ($_GET['codigo'])){
	$codigo = $_GET['codigo'];
	if($consulta = $conn->query("SELECT * from tb_vacinas where vac_codigo = $codigo")){
	}
}
if(isset($_GET['vacina'])){
	$vacina=$_GET['vacina'];
	if($consulta=$conn->query("select * from tb_vacinas where vac_nome like '$vacina'")){
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
	    <title> SUCV - Vacinas </title>
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
					<p>SUCV</p>
				</div>
			</div>
		</header>
		<div class="body"><form action="#" method="post">
		    <input type="text" name="search" id="search" placeholder="Faça sua busca pelo nome da vacina" required>
			<button type="submit" id="botao"> <i class=" fas fa-search"></i></button>
		</form>
		<h3> Vacinas: </h3>
	    <table border="1" class="tabelas">
		    <thead>
			    <tr>
				    <td> # </td>
				    <td> NOME </td>
				    <td> DESCRIÇÃO </td>
			    </tr>
			</thead>
<?php if(isset($_POST['search'])){
      $search = $_POST['search'];
      if($consulta2 = $conn->query("SELECT * from tb_vacinas where vac_nome like '%$search%'")){
        $resultado2 = $consulta2->fetch_assoc();
      ?>
            <tbody>
			    <tr> 
			        <td><?php echo $resultado2['vac_codigo'];?></td>
				    <td><?php echo $resultado2['vac_nome'];?></td>
				    <td><?php echo $resultado2['vac_descricao'];?></td>
			    </tr>
			</tbody>
<?php }else {
		echo "Vacina não encontrada!";
	  }
	   } else { while($resultado = $consulta->fetch_assoc()){ ?>
			<tbody>
			    <tr> 
			        <td><?php echo $resultado['vac_codigo'];?></td>
				    <td><?php echo $resultado['vac_nome'];?></td>
				    <td><?php echo $resultado['vac_descricao'];?></td>
			    </tr>
			</tbody>
<?php }}?>
		</table></div>
	</body>
</html>