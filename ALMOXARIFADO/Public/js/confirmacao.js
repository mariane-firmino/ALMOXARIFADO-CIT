function confirmarAcao(acao){

    if(acao === "aprovar"){

        return confirm(
            "Deseja realmente aprovar esta solicitação?"
        );

    }


    if(acao === "negar"){

        return confirm(
            "Deseja realmente negar esta solicitação?"
        );

    }

}


function confirmarCancelamento(){

    return confirm(
        "Tem certeza que deseja cancelar esta solicitação?"
    );

}
