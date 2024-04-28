<?php
require  __DIR__ .  '/../vendor/autoload.php';
require_once(__DIR__ . '/../Includes/config.php');
MercadoPago\SDK::setAccessToken($access_token);
$preference = new MercadoPago\Preference();
$preference->back_urls = array(
    "success" => "https://localhost/tienda/PagoExitoso.php",
);
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>&#x2728;Tienda la Maga &#x2728;</title>
    <link rel="stylesheet" href="./styles.css"/>
    <link rel="stylesheet" href="./estilos.css"/>
    <script src="https://kit.fontawesome.com/5e4595d1a0.js" crossorigin="anonymous"></script>
</head>
<body class="bg-info">
    <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
        <div class="container">
          <a class="navbar-brand" href="./index.php">
            <img src="./Img/ico.svg" id="logomarca" alt="Logo" width="75" height="70" class="d-inline-block align-text-center">
            <span id="Marca">Tienda la Maga <img src="./Img/varita.png" id="varita" alt="Maga" width="60" height="60" class="d-inline-block align-text-center"></span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item active">
                <a class="nav-link fs-5 " href="index.php"><i class="fa-solid fa-house fa-lg" style="margin-right:10px;"></i>Inicio</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link fs-5 " href="https://api.whatsapp.com/send?phone=5491135844944&text=Hola,%20estoy%20interesado%20en%20adquirir%20productos." target="_blank"><i class="fa-brands fa-whatsapp fa-shake fa-lg" style="margin-right:10px;"></i>Adquirir Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-5 " href="nosotros.php"><i class="fa-solid fa-user-group" style="margin-right:10px;"></i>Nosotros</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>