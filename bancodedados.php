<?php
$servername = "localhost";
$username = "root";
$password = "";
$bancodedados = "projetos_sociais";

// Criar conexão
$mysqli = new mysqli($servername, $username, $password, $bancodedados);

// Verificar conexão
if ($mysqli->connect_error) {
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
}
else
    echo " Conectado ao Banco de Dados";
?>
