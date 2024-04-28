<?php include("template/header.php");?>
<?php $mensajewhatsapp="Hola,soy:    
hice una compra de:          
y me gustaria retirarlo el dia:          
en:          .";
$enlacewhatsapp="https://api.whatsapp.com/send?phone=5491135844944&text=" . urlencode($mensajewhatsapp);
?>
<div style="max-width:800px;" class="container-sm mt-5">
<div class="alert alert-success text-center" role="alert">
  <h4 class="alert-heading">Solo un paso más</h4>
  <p>Elegí el tipo de entrega que prefieras</p>
  <hr>
  <p class="mb-0">Recordá que el costo del envio está a cargo del comprador.</p>
  <div class="container-retiros">
  <button type="button" class="btn btn-primary btn-envio-retiro">Retiro en Persona</button>
  <br>
  <button type="button" class="btn btn-primary btn-envio-domicilio">Envio a domicilio</button>
  </div>
</div>
</div>
<div class="formulario-domicilio centrado" id="envio-domi"style="display: none;">
<form id="Envio-Domicilio" class="row g-3">
    <div class="col-md-3">
        <label for="validationServer01" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="Nombre" id="Nombre" value="" placeholder="Ingrese su nombre" required>
        <div class="valid-feedback">
            Aceptado
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationServer02" class="form-label">Apellido</label>
        <input type="text" class="form-control" name="Apellido" id="Apellido" value="" placeholder="Ingrese su apellido" required>
        <div class="valid-feedback">
            Aceptado
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationServerUsername" class="form-label">Correo Electronico</label>
        <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend3">@</span>
            <input type="text" class="form-control" name="Correo" id="Correo" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" placeholder="Ingrese su correo" required>
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
            Por favor ingrese un correo válido.
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationServer02" class="form-label">Teléfono</label>
        <input type="text" class="form-control" name="Telefono" id="Telefono" value=""  required>
        <div class="valid-feedback">
            Aceptado
        </div>
    </div>
    <div class="col-md-6">
        <label for="validationServer04" class="form-label">Provincia</label>
        <select class="form-select" name="Provincia" id="Provincia" aria-describedby="validationServer04Feedback" required>
            <option selected disabled value="">Elige...</option>
            <option>Capital Federal</option>
            <option>Buenos Aires</option>
            <option>Catamarca</option>
            <option>Chaco</option>
            <option>Chubut</option>
            <option>Córdoba</option>
            <option>Corrientes</option>
            <option>Entre Ríos</option>
            <option>Formosa</option>
            <option>Jujuy</option>
            <option>La Pampa</option>
            <option>La Rioja</option>
            <option>Mendoza</option>
            <option>Misiones</option>
            <option>Neuquén</option>
            <option>Río Negro</option>
            <option>Salta</option>
            <option>San Juan</option>
            <option>San Luis</option>
            <option>Santa Cruz</option>
            <option>Santa Fe</option>
            <option>Santiago del Estero</option>
            <option>Tierra del Fuego, Antártida e Islas del Atlántico Sur</option>
            <option>Tucumán</option>
        </select>
        <div id="validationServer04Feedback" class="invalid-feedback">
            Please seleccione una provincia.
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationServer03" class="form-label">Localidad</label>
        <input type="text" class="form-control" name="Localidad" id="Localidad" aria-describedby="validationServer03Feedback" placeholder="Ingrese su localidad" required>
        <div id="validationServer03Feedback" class="invalid-feedback">
        Por favor ingrese una ciudad válida.
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationServer05" class="form-label">Código Postal</label>
        <input type="text" class="form-control" name="CP" id="CP" aria-describedby="validationServer05Feedback" placeholder="Ingrese su código postal" required>
        <div id="validationServer05Feedback" class="invalid-feedback">
            Por favor ingrese un codigo postal válido.
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationServer04" class="form-label">Calle</label>
        <input type="text" class="form-control" name="Calle" id="Calle" aria-describedby="validationServer04Feedback" placeholder="Ingrese su calle" required>
        <div id="validationServer04Feedback" class="invalid-feedback">
            Por favor ingrese una calle válida.
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationServer05" class="form-label">Altura</label>
        <input type="text" class="form-control" name="Altura" id="Altura" aria-describedby="validationServer05Feedback" placeholder="Ingrese su número" required>
        <div id="validationServer05Feedback" class="invalid-feedback">
            Por favor ingrese un número válido.
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationServer05" class="form-label">Piso</label>
        <input type="text" class="form-control" name="Piso" id="Piso" aria-describedby="validationServer05Feedback" >
        <div id="validationServer05Feedback" class="invalid-feedback">
            Por favor ingrese un número válido.
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationServer05" class="form-label">Departamento</label>
        <input type="text" class="form-control" name="Departamento" id="Departamento" aria-describedby="validationServer05Feedback" >
        <div id="validationServer05Feedback" class="invalid-feedback">
            ...
        </div>
    </div>
    
    <div class="col-md-12">
        <button id="Enviar-Pedido"class="btn btn-primary" type="submit">Enviar</button>
    </div>
</form>
<script type="text/javascript"
  src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>

<script type="text/javascript">
  emailjs.init('ain74dVOyPP_79w_L')
</script>


</div>

<div class="mensaje-retiro text-center" style="display: none;">
    <h5>¡Gracias por elegir el retiro en persona!</h5>
    <p>Podemos coordinar la fecha y hora a traves de <a target="_blank" style="color:#75b798;text-decoration:none;" href="<?php echo $enlacewhatsapp; ?>" >WhatsApp</a> ,recordá tener a mano tu comprobante de pago.</p>
</div>
<div class="mensaje-envio text-center" id="mensaje-envio" style="display: none;">
    <h5>¡Muchas Gracias por Elegirnos!</h5>
    <p>En unos momentos recibiras la cotización del costo de envio</p>
</div>
<div class="fix-footer"></div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function () {
    // Manejar el clic en el botón "Retiro en Persona"
    $('.btn-envio-retiro').click(function () {
        // Ocultar el formulario de envío a domicilio
        $('.formulario-domicilio').hide();
        // Mostrar el mensaje de retiro en persona
        $('.mensaje-retiro').show();
        // Ocultar el mensaje de envío si está visible
        $('.mensaje-envio').hide();
        // Limpiar el formulario de envío a domicilio si está visible
        $('.formulario-domicilio form')[0].reset();
    });

    // Manejar el clic en el botón "Envío a domicilio"
    $('.btn-envio-domicilio').click(function () {
        // Ocultar otros formularios o mensajes si es necesario
        $('.formulario-domicilio').show();
        $('.mensaje-retiro').hide();
        // Ocultar el mensaje de envío si está visible
        $('.mensaje-envio').hide();
    });
});
    
</script>
<script src="mail.js"></script>

<?php include("template/foot.php");?>