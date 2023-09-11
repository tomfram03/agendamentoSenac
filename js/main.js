// Remove a mensagem após 3 segundos
setTimeout(function() {
    var mensagemDiv = document.getElementById("mensagem");
    mensagemDiv.style.display = "none"; // Oculta a mensagem

    // Remove o parâmetro GET "message" da URL
    var url = window.location.href;
    if (url.indexOf("?message=") !== -1) {
        url = url.split("?message=")[0];
        window.history.replaceState({}, document.title, url);
    }
}, 3000); // Aguarda 3 segundos (2000 milissegundos) antes de limpar a mensagem