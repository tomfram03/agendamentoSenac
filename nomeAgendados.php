<?php 
include_once("conexao.php");

// Consulta SQL para obter os compromissos
$sql = "SELECT nome, dia, horario FROM compromissos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        // Formate a data e hora para o padrão brasileiro
        $dataFormatada = date('d/m/Y', strtotime($row['dia']));
        $horarioFormatado = date('H:i', strtotime($row['horario']));

        echo "<table border=1>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Hora</th>
                    </tr>
                </thead>
                <tr>
                <td>" . $row['nome'] . "</td>
                <td>" . $dataFormatada . "</td>
                <td>" . $horarioFormatado . "</td>
            </tr>
            </table>";
    }
} else {
    echo "Nenhum agendamento encontrado.";
}
?>