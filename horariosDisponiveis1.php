<?php
include_once("conexao.php");// Consulta SQL para recuperar todos os horários disponíveis
// Consulta SQL para obter todos os dias registrados na tabela "compromissos"
$sqlDias = "SELECT DISTINCT dia FROM compromissos";
$resultDias = $conn->query($sqlDias);

if ($resultDias->num_rows > 0) {
    while ($rowDias = $resultDias->fetch_assoc()) {
        $dia = $rowDias["dia"];

        // Converta o formato da data para o padrão pt-BR
        $diaFormatado = date('d/m/Y', strtotime($dia));

        echo "<h2>Horários ocupados para o dia $diaFormatado:</h2>";

        // Consulta SQL para obter todos os horários disponíveis para um dia específico
        $sqlHorarios = "SELECT horario FROM compromissos WHERE dia = '$dia'";
        $resultHorarios = $conn->query($sqlHorarios);

        if ($resultHorarios->num_rows > 0) {
            echo "<ul>";
            while ($rowHorarios = $resultHorarios->fetch_assoc()) {
                $horario = $rowHorarios["horario"];
                echo "<li>$horario</li>";
            }
            echo "</ul>";
        } else {
            echo "Nenhum horário ocupados para este dia.";
        }
    }
} else {
    echo "Nenhum dia registrado na tabela de compromissos.";
}