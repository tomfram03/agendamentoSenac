<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tomfram";

// Criar uma conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
// Fecha a conexão com o banco de dados
//$conn->close();
?>
