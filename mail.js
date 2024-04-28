document.addEventListener('DOMContentLoaded', function () {
  const btn = document.getElementById('Enviar-Pedido');
  const msj = document.getElementById('mensaje-envio');
  const div = document.getElementById('envio-domi');
  const formulario = document.getElementById('Envio-Domicilio');

  formulario.addEventListener('submit', function (event) {
      event.preventDefault();

      btn.value = 'Enviando';

      const serviceID = 'default_service';
      const templateID = 'template_64ntdoh';

      emailjs.sendForm(serviceID, templateID, this)
          .then(() => {
              btn.value = 'Enviar';
              // Ocultar el formulario de envío a domicilio
              div.style.display = 'none';
              // Mostrar el mensaje de envío
              msj.style.display = 'block';

              // Limpiar el formulario
              formulario.reset();
              setTimeout(function() {
                window.location.href = '/tienda/'; // Reemplaza 'pagina-principal.html' por la URL de tu página principal
            }, 5000);
          }, (err) => {
              btn.value = 'Enviar';
              alert(JSON.stringify(err));
          });
  });
});
