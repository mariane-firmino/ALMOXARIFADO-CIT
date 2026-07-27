    const tabs = document.querySelectorAll(".tab");
    const linhas = document.querySelectorAll("tbody tr");

        tabs.forEach(tab => {

            tab.addEventListener("click", () => {

                tabs.forEach(t => t.classList.remove("active"));
                tab.classList.add("active");

                    const filtro = tab.dataset.filter;

                    linhas.forEach(linha => {

                        if (filtro === "todas") {
                            linha.style.display = "";
                            return;
                        }

                        if (linha.dataset.status === filtro) {
                            linha.style.display = "";
                        } else {
                            linha.style.display = "none";
                        }

                });                            

            });

        });