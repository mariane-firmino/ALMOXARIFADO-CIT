const baseURL = "<?= URL ?>";

document.querySelectorAll('.password-toggle').forEach(button => {

    button.addEventListener('click', function(e){

        e.preventDefault();

        const input = document.getElementById(
            this.dataset.target
        );

        const icon = this.querySelector("img");

        if(input.type == "password"){

            input.type = "text";

            icon.src = baseURL + "/img/olhoFechado.png";

        }else{

            input.type = "password";

            icon.src = baseURL + "/img/olhoAberto.png";

        }

    });

});
