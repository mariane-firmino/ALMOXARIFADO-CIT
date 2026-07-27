document.querySelector('input[name="pesquisa"]')
.addEventListener('keypress', function(e){

    if(e.key === 'Enter'){

        document.getElementById('formFiltro').submit();

    }

});

document.querySelector('input[name="data"]')
.addEventListener('change', function(){

    document.getElementById('formFiltro').submit();

});


function filtrarStatus(status){

    let url = new URL(window.location.href);


    if(status){

        url.searchParams.set(
            'status',
            status
        );

    }else{

        url.searchParams.delete('status');

    }


    window.location.href = url;

}