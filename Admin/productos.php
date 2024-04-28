<?php include("template/header.php");?>
<?php
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtCategoria=(isset($_POST['txtCategoria']))?$_POST['txtCategoria']:"";
$txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
$txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include('config/db.php');


switch($accion)
{
   case "Agregar":
    // Comprobamos si se han subido imágenes
    if (isset($_FILES['txtImagen']) && !empty($_FILES['txtImagen']['name'][0])) {
        $imagenes = array();
        $fecha = new DateTime();

        foreach ($_FILES['txtImagen']['name'] as $key => $nombreArchivo) {
            $tmpImagen = $_FILES['txtImagen']['tmp_name'][$key];

            if (!empty($nombreArchivo)) {
                $nombreArchivo = $fecha->getTimestamp() . "_" . $nombreArchivo;
                move_uploaded_file($tmpImagen, "../Img/" . $nombreArchivo);
                $imagenes[] = $nombreArchivo;
            }
        }

        // Ahora $imagenes contiene las rutas de las imágenes cargadas
        // Debes almacenar estas rutas en la base de datos, por ejemplo, como una cadena separada por comas
        $imagenesCadena = implode(",", $imagenes);
    } else {
        $imagenesCadena = ""; // Si no se cargaron imágenes, dejamos la cadena vacía
    }

    // Insertamos los datos del producto, incluyendo la cadena de imágenes
    $sentenciaSQL = $conexion->prepare("INSERT INTO productos (Categoria, nombre, imagen, precio, descripcion) VALUES (:Categoria, :nombre, :imagen, :precio, :descripcion);");
    $sentenciaSQL->bindParam(':nombre', $txtNombre);
    $sentenciaSQL->bindParam(':imagen', $imagenesCadena); // Almacenamos la cadena de imágenes en la columna 'imagen'
    $sentenciaSQL->bindParam(':Categoria', $txtCategoria);
    $sentenciaSQL->bindParam(':precio', $txtPrecio);
    $sentenciaSQL->bindParam(':descripcion', $txtDescripcion);
    $sentenciaSQL->execute();

    $txtID = "";
    $txtNombre = "";
    $txtCategoria = "";
    $txtDescripcion = "";
    $txtPrecio = "";
    $txtImagen = "";

    break;

    case "Modificar":
    // Actualizar los datos del producto
    $sentenciaSQL = $conexion->prepare("UPDATE productos SET nombre=:nombre, Categoria=:Categoria, descripcion=:descripcion, precio=:precio WHERE ID=:id");
    $sentenciaSQL->bindParam(':nombre', $txtNombre);
    $sentenciaSQL->bindParam(':Categoria', $txtCategoria);
    $sentenciaSQL->bindParam(':descripcion', $txtDescripcion);
    $sentenciaSQL->bindParam(':precio', $txtPrecio);
    $sentenciaSQL->bindParam(':id', $txtID);
    $sentenciaSQL->execute();

    // Obtener las imágenes existentes
    $imagenesExistentes = isset($_POST['imagenesExistente']) ? $_POST['imagenesExistente'] : array();

    // Verificar si se han subido nuevas imágenes
    if (!empty($_FILES['txtImagen']['name'][0])) {
        $imagenesNuevas = array();
        $fecha = new DateTime();

        foreach ($_FILES['txtImagen']['name'] as $key => $nombreArchivo) {
            $tmpImagen = $_FILES['txtImagen']['tmp_name'][$key];

            if (!empty($nombreArchivo)) {
                $nombreArchivo = $fecha->getTimestamp() . "_" . $nombreArchivo;
                move_uploaded_file($tmpImagen, "../Img/" . $nombreArchivo);
                $imagenesNuevas[] = $nombreArchivo;
            }
        }

        // Combinar imágenes existentes con las nuevas y actualizar en la base de datos
        $imagenesCombinadas = array_merge($imagenesExistentes, $imagenesNuevas);
        $imagenesCadena = implode(",", $imagenesCombinadas);

        // Actualizar las imágenes en la base de datos
        $sentenciaSQL = $conexion->prepare("UPDATE productos SET imagen=:imagen WHERE ID=:id");
        $sentenciaSQL->bindParam(':imagen', $imagenesCadena);
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
    }

    // Eliminar las imágenes seleccionadas para eliminar
    if (isset($_POST['imagenesAEliminar']) && !empty($_POST['imagenesAEliminar'])) {
        foreach ($_POST['imagenesAEliminar'] as $imagenEliminar) {
            // Verificar si la imagen existe y eliminarla
            if (file_exists("../Img/" . $imagenEliminar)) {
                unlink("../Img/" . $imagenEliminar);
            }

            // Eliminar la imagen de la cadena de imágenes en la base de datos
            $imagenesExistentes = array_diff($imagenesExistentes, array($imagenEliminar));
        }

        // Actualizar la cadena de imágenes en la base de datos después de eliminar
        $imagenesCadena = implode(",", $imagenesExistentes);
        $sentenciaSQL = $conexion->prepare("UPDATE productos SET imagen=:imagen WHERE ID=:id");
        $sentenciaSQL->bindParam(':imagen', $imagenesCadena);
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
    }

    // Resto del código para limpiar las variables y redirigir
    $txtID = "";
    $txtNombre = "";
    $txtCategoria = "";
    $txtDescripcion = "";
    $txtPrecio = "";
    $txtImagen = "";

    header("Location: productos.php");
    break;




    case"Cancelar":
$txtID = "";
$txtNombre = "";
$txtCategoria = "";
$txtDescripcion = "";
$txtPrecio = "";
$txtImagen = "";
          header("Location:productos.php");
      break;
    case"Seleccionar":
      $sentenciaSQL=$conexion->prepare("SELECT * FROM productos WHERE ID=:id");
      $sentenciaSQL->bindParam(':id',$txtID);
      $sentenciaSQL->execute();
      $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

      $txtNombre=$producto['nombre'];
      $txtCategoria=$producto['Categoria'];
      $txtImagen=$producto['imagen'];
      $txtPrecio=$producto['precio'];
      $txtDescripcion=$producto['descripcion'];
      
      break;

    case"Borrar":
      $sentenciaSQL=$conexion->prepare("SELECT imagen FROM productos WHERE ID=:id");
      $sentenciaSQL->bindParam(':id',$txtID);
      $sentenciaSQL->execute();
      $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

      if(isset($producto["imagen"]) && ($producto["imagen"]!="imagen.jpg")){
              if(file_exists("../../Img/".$producto["imagen"])){
                unlink("../../Img/".$producto["imagen"]);
              }
      }

    
      $sentenciaSQL=$conexion->prepare("DELETE FROM productos WHERE ID=:id");
      $sentenciaSQL->bindParam(':id',$txtID);
      $sentenciaSQL->execute();
$txtID = "";
$txtNombre = "";
$txtCategoria = "";
$txtDescripcion = "";
$txtPrecio = "";
$txtImagen = "";
      header("Location:productos.php");
      break;
 

      

}

$sentenciaSQL=$conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="contariner-fluid">
    <div class="row ">
<div class="col-md-5 min-vh-100">

    <div class="card">
  <div class="card-header">
        Datos del producto
  </div>
<div class="card-body">
  <form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label  class="form-label">ID:</label>
    <input type="text" required readonly class="form-control" value="<?php echo $txtID;?>" name="txtID" id="txtID" placeholder="ID" >
    
  </div>
  <div class="mb-3">
    <label class="form-label">Categoria:</label>
    <select class="form-select" required name="txtCategoria" id="txtCategoria">
        <option value="" disabled selected>Selecciona una categoría</option>
        <option value="Nutrición Celular" <?php if ($txtCategoria == 'Nutrición Celular') echo 'selected'; ?>>Nutrición Celular</option>
        <option value="Cuidado de la Piel" <?php if ($txtCategoria == 'Cuidado de la Piel') echo 'selected'; ?>>Cuidado de la Piel</option>
        <option value="Cuidado Personal" <?php if ($txtCategoria == 'Cuidado Personal') echo 'selected'; ?>>Cuidado Personal</option>
    </select>
</div>

  <div class="mb-3">
    <label  class="form-label">Nombre:</label>
    <input type="text" required class="form-control" value="<?php echo $txtNombre;?>" name="txtNombre" id="txtNombre" placeholder="Nombre del producto" >
    
  </div>
  <div class="mb-3">
    <label for="txtImagen1" class="form-label">Imagen 1:</label>
    <input type="file" class="form-control" name="txtImagen[]" id="txtImagen1" accept="image/*">
</div>

<div class="mb-3">
    <label for="txtImagen2" class="form-label">Imagen 2:</label>
    <input type="file" class="form-control" name="txtImagen[]" id="txtImagen2" accept="image/*">
</div>

<div class="mb-3">
    <label for="txtImagen3" class="form-label">Imagen 3:</label>
    <input type="file" class="form-control" name="txtImagen[]" id="txtImagen3" accept="image/*">
</div>

<div class="mb-3">
    <label for="txtImagen4" class="form-label">Imagen 4:</label>
    <input type="file" class="form-control" name="txtImagen[]" id="txtImagen4" accept="image/*">
</div>

<div class="mb-3">
    <label for="txtImagen5" class="form-label">Imagen 5:</label>
    <input type="file" class="form-control" name="txtImagen[]" id="txtImagen5" accept="image/*">
</div>
<div class="mb-3">
    <label for="txtNombre" class="form-label">Imágenes existentes:</label>
    <div class="d-flex flex-wrap">
        <?php
        $imagenes = explode(",", $txtImagen); // Supongamos que $txtImagen contiene la cadena de imágenes separadas por comas
        foreach ($imagenes as $imagen) {
            echo '<div class="m-2">';
            echo '<img src="../Img/' . $imagen . '" class="img-thumbnail" width="100" alt="Imagen existente">';
            echo '<input type="checkbox" name="imagenesAEliminar[]" value="' . $imagen . '"> Eliminar';
            echo '<input type="hidden" name="imagenesExistente[]" value="' . $imagen . '">'; // Campo oculto para mantener las imágenes existentes
            echo '</div>';
        }
        ?>
    </div>
</div>


  <div class="mb-3">
    <label class="form-label">Precio:</label>
    <input type="text" required class="form-control" value="<?php echo $txtPrecio; ?>" name="txtPrecio" id="txtPrecio" placeholder="Precio del producto">
</div>

<div class="mb-3">
    <label class="form-label">Descripción:</label>
    <textarea class="form-control" rows="4" name="txtDescripcion" id="txtDescripcion" placeholder="Escribe tu descripción aquí"><?php echo $txtDescripcion; ?></textarea>
</div>

  <div class="btn-group" role="group" aria-label="Basic example">
<button type="submit" name="accion"  <?php echo ($accion=="Seleccionar")?"disabled":"";?> value="Agregar" class="btn btn-primary">Agregar</button>
<button type="submit" name="accion"  <?php echo ($accion!="Seleccionar")?"disabled":"";?> value="Modificar" class="btn btn-primary">Modificar</button>
<button type="submit" name="accion"  <?php echo ($accion!="Seleccionar")?"disabled":"";?> value="Cancelar" class="btn btn-primary">Cancelar</button>
</div>
</form>
</div>
</div>    
</div>
<div class="col-md-7 text-truncate">
<table class="table table-bordered">
  <thead>
    <tr>
      
      <th scope="col">ID</th>
      <th scope="col">Categoria</th>
      <th scope="col">Nombre</th>
      <th scope="col">Imagen</th>
      <th scope="col">Precio</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($listaProductos as $producto){?>
    <tr>
      <th scope="row"><?php echo $producto['ID']?></th>
      <td><?php echo $producto['Categoria']?></td>
      <td><?php echo $producto['nombre']?></td>
      <td><img class="img-thumbnail rounded" src="../Img/<?php echo $producto['imagen']?>" width="50"alt=""></td>
      <td><?php echo $producto['precio']?></td>
      <td ><span class="d-inline-block text-truncate" style="max-width: 150px;">
      <?php echo $producto['descripcion']?>
</span></td>

      <td>

      <form  method="post">
      <input type="hidden" name="txtID" id="txtID" value="<?php echo $producto['ID']?>"/>
      <input type="submit" name="accion" value="Seleccionar" class="btn btn-secondary"/>
      <input type="submit" name="accion" value="Borrar" class="btn btn-primary"/>
      </form>
    
    
    </td>

    </tr>
    <?php }?>
  </tbody>

</table>
    </div>
    </div><!-- cierra row-->
</div>

<?php include('template/foot.php');?>