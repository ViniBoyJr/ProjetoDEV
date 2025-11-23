/*document.getElementById("btnProximo").addEventListener("click", function() {
    const radios = document.querySelectorAll('input[name="opcao"]');
    let selecionado = false;

    radios.forEach(radio => {
        if (radio.checked) selecionado = true;
    });

    if (!selecionado) {
        // Abre o modal usando o Bootstrap
        const modal = new bootstrap.Modal(document.getElementById("exampleModal"));
        modal.show();
    } else {
        // Redireciona se tiver selecionado
        window.location.href = "../telaspersonalizar/massa.php";
    }
});*/

document.getElementById("btnProximo").addEventListener("click", function(event) {

    const radios = document.querySelectorAll("input[name='opcao']");
    let selecionado = false;

    radios.forEach(r => { 
        if (r.checked) selecionado = true; 
    });

    if (!selecionado) { 
        event.preventDefault(); 
        let modal = new bootstrap.Modal(document.getElementById('exampleModal'));
        modal.show();
    }

});