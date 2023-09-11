// Dados do banco de dados (exemplo)
const dadosDoBanco = {
    "12/09": ["08:00", "10:00"],
    "13/09": ["09:00", "11:00"],
    // Mais dados aqui...
};
// Obtém os elementos de seleção
const dataSelect = document.getElementById("data");
const horarioSelect = document.getElementById("horario");

// Função para ocultar horários com base na data selecionada
function ocultarHorarios() {
    const dataSelecionada = dataSelect.value;

    // Obtém os horários associados à data selecionada
    const horariosDaData = dadosDoBanco[dataSelecionada] || [];

    // Exibe todas as opções de horário
    Array.from(horarioSelect.options).forEach((option) => {
        option.style.display = "block";
    });

    // Oculta as opções de horário associadas à data selecionada
    horariosDaData.forEach((horario) => {
        const option = horarioSelect.querySelector(`[value="${horario}"]`);
        if (option) {
            option.style.display = "none";
        }
    });
}

// Adicione um ouvinte de eventos para a mudança de data
dataSelect.addEventListener("change", ocultarHorarios);

// Chame a função inicialmente para ocultar horários com base na data inicial
ocultarHorarios();