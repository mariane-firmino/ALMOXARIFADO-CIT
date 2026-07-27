const periodo = document.getElementById("periodo");

if (periodo) {
    flatpickr(periodo, {
        mode: "range",
        locale: "pt",
        dateFormat: "d/m/Y",
        maxDate: new Date(),
        allowInput: false
    });
}

const dataFiltro = document.getElementById("dataFiltro");

if (dataFiltro) {
    dataFiltro.max = new Date().toISOString().split("T")[0];
}