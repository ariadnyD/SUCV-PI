<?php
include("config.php");
$erro = 0;
if ($_POST) {
  $senha = $_POST['senha'];
  $senhac = $_POST['senhac'];
  if ($senha == $senhac) {
    if (isset($_POST['nome'])) {
      extract($_POST);
      if ($inserir = $conn->query("insert into tb_enfermeiros (enf_nome, enf_email,enf_senha) values ('$nome', '$email', '" . md5($senha) . "')")) {
        header("Location:login.php");
      } else {
        echo "Não foi possivel realizar o cadastro!";
      }
    }
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
  <link rel="stylesheet" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro</title>
  <link rel="stylesheet" href="css/cadastro.css" />
  <link rel="icon" sizes="57x57" href="assets/logo/icon.png">
</head>

<body>
  <div id="cadastro-container">
    <h1 id="titulo">Cadastro de enfermeiros</h1>
    <?php if ($erro == 1) echo "<br><span style='color:red'>As senhas não conferem!</span><br>"; ?>
    <?php if ($erro == 2) echo "<br><span style='color:red'>Email já cadastrado!</span><br>"; ?>
    <form id="cadastro" method="post" action="">
      <label for="name">Nome:</label>
      <input type="text" name="nome" id="nome" placeholder="Digite seu nome" autocomplete="off" />
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" placeholder="Digite seu email" autocomplete="off" />
      <label for="password">Senha:</label>
      <input type="password" name="senha" id="senha" placeholder="Digite sua senha" autocomplete="off" />
      <label for="password">Confirme sua senha:</label>
      <input type="password" name="senhac" placeholder="Confirme sua senha" />
      <input id="botao" type="submit" value="Cadastrar" />
    </form>
  </div>
</body>

</html>