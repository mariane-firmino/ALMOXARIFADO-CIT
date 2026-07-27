const input = document.getElementById('imagem');
const preview = document.getElementById('preview');

input.addEventListener('change', function () {

    if(this.files.length){

        const reader = new FileReader();

        reader.onload = function(e){
            preview.src = e.target.result;
        }

        reader.readAsDataURL(this.files[0]);
    }

});

const input = document.getElementById("foto");
const avatar = document.querySelector(".avatar-image");

input.addEventListener("change", function () {

    if(this.files.length){

        avatar.src = URL.createObjectURL(this.files[0]);

    }

});
