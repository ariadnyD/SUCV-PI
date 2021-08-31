<?php
$endereco = "localhost"; 
$usuario = "root";
$senha = "usbw";
$banco = "db_sucv";
$porta = 3307;
$conn= new mysqli($endereco, $usuario, $senha, $banco, $porta);
if (mysqli_connect_errno()) {
    die(mysqli_connect_error());
    exit();
}
date_default_timezone_set('America/Fortaleza');
mysqli_set_charset($conn, "utf8");
?>