<?php
$endereco = "localhost"; 
$usuario = "root";
$senha = "";
$banco = "db_sucv";
$porta = 3312;
$conexao = new mysqli($endereco, $usuario, $senha, $banco, $porta);
if (mysqli_connect_errno()) {
    die(mysqli_connect_error());
    exit();
}
date_default_timezone_set('America/Fortaleza');
mysqli_set_charset($conexao, "utf8");
?>