<?php include("template/header.php");?>  
<?php $url="http://".$_SERVER['HTTP_HOST']."/Carpeta"?>

<?php
$txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
$txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$txtCategoria=(isset($_POST['txtCategoria']))?$_POST['txtCategoria']:"";

include('Admin/config/db.php');
$sentenciaSQL=$conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>
                  
<div class="container mt-4 fix-footer">
    <div class="container mb-4 text-center centrado">
        <h3 style="font-size: 55px;
  font-family: 'Lobster', cursive; text-shadow:0px 0px 1px #000000;">Cuidado de la Piel</h3>
  <h5 class="sub-titulo">Recorda que podes coordinar el retiro sin cargo a traves de whatsapp en Olivos de lunes a viernes y Santa fé y Pellegrini los fines de semana.</h5>
    </div>
    <div class="row">
    <?php foreach ($listaProductos as $index => $producto) {
        if ($producto['Categoria'] == "Cuidado de la Piel") {
                // Crear preferencia de Mercado Pago para cada producto
                $preference = new MercadoPago\Preference();
                $item = new MercadoPago\Item();
                $item->id = $producto['ID']; // Utiliza un identificador único para cada producto
                $item->title = $producto['nombre'];
                $item->description = $producto['descripcion'];
                $item->quantity = 1;
                $item->unit_price = $producto['precio'];
                $item->currency_id = "ARS";
                $preference->items = array($item);
                $preference->save();
                ?>             
             <?php
             ?>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4 centrado">
                <div class="card border border-3 text-center card shadow-lg" style="width: 18rem; min-height:556px;">
                    <!-- Imagen principal -->
                    <img src="Img/<?php echo explode(",", $producto['imagen'])[0]; ?>" class="card-img-top fixed-image" alt="Imagen 1">
                    <!-- Miniaturas de imágenes -->
                    <div class="mt-2">
                        <?php
                        $imagenes = explode(",", $producto['imagen']);
                        foreach ($imagenes as $imgIndex => $imagen) {
                        ?>
                            <img src="Img/<?php echo $imagen; ?>" class="img-thumbnail" alt="Imagen <?php echo $imgIndex + 1; ?>" style="max-width: 50px; max-height:50px; cursor: pointer;" onclick="mostrarImagen(this)">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                        <p class="card-text">$ <?php echo $producto['precio']; ?></p>
                        <div class="container" style="display:flex; flex-direction:row;">
                        <div class="wallet_container_<?php echo $index; ?>" style="font-size:1 rem; margin-right:0.5rem"></div>
                        <script src="pagar.js" data-preference-id="<?php echo $preference->id; ?>"></script>
                            <button style="margin-left:0.5rem;"class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $index; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $index; ?>">
                                Descripción
                            </button>
                        </div>   
                        <p></p>
                        <div class="collapse" id="collapse-<?php echo $index; ?>">
                            <div style="font-size: 12px;" class="card card-body">
                            <?php echo nl2br($producto['descripcion']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>

<script>
    function mostrarImagen(imagen) {
        // Encuentra la tarjeta padre de la miniatura de la imagen
        var tarjeta = imagen.closest('.card');
        
        // Encuentra la imagen principal dentro de la tarjeta
        var imagenPrincipal = tarjeta.querySelector('.card-img-top');

        // Obtiene la ruta de la miniatura seleccionada
        var nuevaImagenSrc = imagen.getAttribute('src');

        // Cambia la imagen principal a la nueva imagen seleccionada
        imagenPrincipal.src = nuevaImagenSrc;
    }
</script>
</div>

      <!-- Fin del contenido principal de la página --> 

      <?php include("template/foot.php");?>