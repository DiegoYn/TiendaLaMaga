<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // Cambiar al nombre de usuario adecuado
define('DB_PASS', ''); // Cambiar a la contraseña adecuada
define('DB_NAME', 'sitio');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];

    // Conexión a la base de datos
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consultar usuario en la base de datos
    $query = "SELECT id, contrasenia, salt FROM usuarios WHERE usuario = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->bind_result($id, $hashedPassword, $salt);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($contrasenia . $salt, $hashedPassword)) {
        $_SESSION['usuario'] = $usuario;
        $mensaje = "Te logueaste correctamente";
        header('Location: productos.php');
        exit; // Importante: Detener la ejecución después de la redirección
    } else {
        $mensaje = "ERROR: Usuario o contraseña incorrectos";
    }

    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>
<link rel="stylesheet" href="../styles.css"/>
<body>
<?php $url="http://".$_SERVER['HTTP_HOST']."/index.php"?>


<nav class="navbar navbar-expand-lg navbar-primary bg-primary">
        <div class="container">
          <a class="navbar-brand">
            <img src="../Img/ico.svg" alt="Logo" width="70" height="50" class="d-inline-block align-text-center">
            Base de Datos Productos
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item active">
                <a class="nav-link fs-5 fw-bold" href="<?php echo $url;?>">Ver Sitio</a>
              </li>

              <li class="nav-item">
                <a class="nav-link fs-5 fw-bold" href="seccion/cerrar.php">Cerrar Sesion</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <br/>
      <br/>
      <br/>
      <br/>
<div class="container py-5 mt-5">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <br/><br/><br/>
            <div class="card">
                <div class="card-header">
                Login
                </div>
                <div class="card-body">
                  <?php if(isset($mensaje)){?>
                
                  <div class="alert alert-warning" role="alert">
                    <?php echo $mensaje;?>
                  </div>
                  <?php }?>
                    <form method="POST">
                    <div class="form-group">
                    <label >Usuario:</label>
                    <input type="text" class="form-control" name="usuario" placeholer="Usuario">
                    </div>
                    <div class="form-group">
                    <label>Contraseña:</label>
                    <input type="password" class="form-control" name="contrasenia" placeholer="Contraseña">
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-primary">Ingresar
                    </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>


<?php include('template/foot.php');?>