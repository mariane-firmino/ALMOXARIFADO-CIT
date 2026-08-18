const input = document.getElementById('foto');
  const preview = document.getElementById('preview');

  input.addEventListener('change', function(evento) {
    const arquivo = evento.target.files[0];

    if (arquivo) {
      const leitor = new FileReader();

      leitor.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block'; // Mostra a imagem
      }

      leitor.readAsDataURL(arquivo);
    } else {
      preview.src = '';
      preview.style.display = 'none'; // Esconde se cancelar
    }
});