const checks = document.querySelectorAll(".product-check");
const botao = document.getElementById("btnSolicitar");

checks.forEach(check => {

    check.addEventListener("change", () => {

        const selecionados = document.querySelectorAll(".product-check:checked");

        botao.textContent = `Solicitar (${selecionados.length})`;

        botao.disabled = selecionados.length === 0;

        check.closest(".product-card")
             .classList.toggle("selected", check.checked);

    });

});

botao.addEventListener("click", () => {

    if (!botao.disabled) {
        window.location.href = "fazer-solicitacao.html";
    }

});