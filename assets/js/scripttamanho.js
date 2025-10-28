    document.getElementById("btnProximo").addEventListener("click", function() {
        const radios = document.querySelectorAll('input[name="gridRadios"]');
        const erro = document.getElementById("exampleModal");
        let selecionado = false;

        radios.forEach(radio => {
            if (radio.checked) selecionado = true;
        });

        if (!selecionado) {
            erro.style.display = "block";
        } else {
            erro.style.display = "none";
            // Redireciona apenas se estiver selecionado
            window.location.href = "../TelasPersonalizar/massa.html";
        }
    });