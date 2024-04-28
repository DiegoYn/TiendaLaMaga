<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location:/tienda/Admin/login.php');
    exit(); // Agrega esta línea para detener la ejecución después de redirigir
}

$url = "http://" . $_SERVER['HTTP_HOST'] . "/tienda/Admin";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="../styles.css"/>
</head>
<body >
<nav class="navbar navbar-expand-lg navbar-primary bg-primary">
        <div class="container">
          <a class="navbar-brand">
            <img src="../Img/ico.svg" alt="Logo" width="70" height="50" class="d-inline-block align-text-center">
            Administracion
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item active">
                <a class="nav-link fs-5 fw-bold" href="/index.php">Ver Sitio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-5 fw-bold" href="<?php echo $url . "/seccion/cerrar.php";?>">Cerrar Sesion</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>