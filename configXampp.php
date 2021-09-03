<?php
$endereco = "localhost"; 
$usuario = "root";
<<<<<<< HEAD
$senha = "";
$banco = "db_sucv";
$porta = 3312;
$conexao = new mysqli($endereco, $usuario, $senha, $banco, $porta);
=======
$senha = "usbw";
$banco = "db_sucv";
$porta = 3307;
$conn= new mysqli($endereco, $usuario, $senha, $banco, $porta);
>>>>>>> b64d2d541b73b5b3084879aa991a324d6e8da9a9
if (mysqli_connect_errno()) {
    die(mysqli_connect_error());
    exit();
}
date_default_timezone_set('America/Fortaleza');
<<<<<<< HEAD
mysqli_set_charset($conexao, "utf8");
=======
mysqli_set_charset($conn, "utf8");
>>>>>>> b64d2d541b73b5b3084879aa991a324d6e8da9a9
?>