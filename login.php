<?php
include("config.php");
session_start();
$erro = 0;
if (isset($_POST['email'])) {
  extract($_POST);
  $consulta = $conn->query("select * from tb_enfermeiros where enf_email  = '$email' and enf_senha = '" . md5($senha) . "'");
  if ($resultado = $consulta->fetch_assoc()) {
    $_SESSION['email'] = $resultado['enf_email'];
    header("Location: inicialenfer.php");
  } else {
    $erro = 1;
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet" />
  <title>Login</title>
  <link rel="stylesheet" href="css/login.css" />
  <link rel="icon" sizes="57x57" href="assets/logo/icon.png">
</head>


<body>
  <div id="login-container">
    <h1 id="titulo">Login</h1><?php if ($erro == 1) echo "<br><span style='color:red'>Email ou senha inválida, tente novamente.</span><br>"; ?>
    <form method="POST" action="?">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" placeholder="Digite seu email" autocomplete="off" />
      <label for="password">Senha:</label>
      <input type="password" name="senha" placeholder="Digite sua senha" />

      <input type="submit" value="Acessar" />
    </form>
    <div id="cadastro"><a href="cadastro.php">Cadastre-se</a></div>
  </div>
</body>

</html>