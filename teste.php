<?php 
include_once("conexao.php");
// Data selecionada pelo usuário (substitua isso com o valor real do seu formulário)
$dataSelecionada = $_POST["data"]; // Suponha que o usuário tenha selecionado a data "12/09"

// Consulta SQL para recuperar os horários agendados do banco de dados
$sql = "SELECT horario FROM compromissos"; // Substitua "compromissos" pelo nome da sua tabela
$result = $conn->query($sql);

// Verifique se há resultados
if ($result->num_rows > 0) {
    // Crie um array para armazenar os horários agendados
    $horariosAgendados = array();

    // Preencha o array com os horários do banco de dados
    while ($row = $result->fetch_assoc()) {
        // Adicione cada horário ao array, convertendo o formato se necessário
        $horarioDoBanco = $row["horario"];
        $horarioFormatado = substr($horarioDoBanco, 0, 5);
        $horariosAgendados[] = $horarioFormatado;
    }
} else {
    $horariosAgendados = array();
}

// Defina os horários disponíveis de 8:00 às 11:50 e de 13:00 às 18:50 com intervalos de 5 minutos
$horaInicialManha = strtotime('08:00');
$horaFinalManha = strtotime('11:50');
$horaInicialTarde = strtotime('13:00');
$horaFinalTarde = strtotime('18:50');
$intervalo = 5 * 60; // Intervalo de 5 minutos em segundos

// Gere as opções de horário com base nos horários disponíveis
for ($hora = $horaInicialManha; $hora <= $horaFinalManha; $hora += $intervalo) {
    $horaFormatada = date('H:i', $hora);

    // Verifica se o horário não está na lista de horários agendados
    if (!in_array($horaFormatada, $horariosAgendados)) {
        echo "<option value='$horaFormatada'>$horaFormatada</option>";
    }
}

for ($hora = $horaInicialTarde; $hora <= $horaFinalTarde; $hora += $intervalo) {
    $horaFormatada = date('H:i', $hora);

    // Verifica se o horário não está na lista de horários agendados
    if (!in_array($horaFormatada, $horariosAgendados)) {
        echo "<option value='$horaFormatada'>$horaFormatada</option>";
    }
}
?>


<!-- 
<?php
include_once("conexao.php");
// Consulta SQL para recuperar os horários disponíveis
$sql = "SELECT dia, horario FROM compromissos";

$result = $conn->query($sql);

// Verifique se há resultados
if ($result->num_rows > 0) {
    echo "<h1>Horários Disponíveis</h1>";
    echo "<table>";
    echo "<tr><th>Data</th><th>Horário</th></tr>";

    // Loop através dos resultados e exiba-os em uma tabela
    while ($row = $result->fetch_assoc()) {
        $data = $row["dia"];
        $horario = $row["horario"];

        echo "<tr><td>$data</td><td>$horario</td></tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum horário disponível encontrado.";
}
?> -->