<?php
include_once("conexao.php");

// Consulta SQL para selecionar os dados da tabela compromissos
$sql = "SELECT nome, dia, horario FROM compromissos";
$result = $conn->query($sql);

// Define o cabeçalho HTTP para forçar o download do arquivo CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="compromissos.csv"');

// Cria um arquivo de saída para escrever os dados CSV
$output = fopen('php://output', 'w');

// Escreve o cabeçalho do CSV
fputcsv($output, array('Nome', 'Data', 'Horário'));

// Escreve os dados do banco de dados no arquivo CSV
while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

// Fecha a conexão com o banco de dados
$conn->close();
?>