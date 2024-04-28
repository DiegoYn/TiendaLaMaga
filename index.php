      <?php include("template/header.php");?>    
      <div class="contenedor-carousel" style="width:100%;">
        <!-- Inicio Carrusel -->
        <div id="carouselExampleFade" class="carousel slide carousel-fade mt-0 shadow-lg" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="4000">
              <img src="./Img/carousel2-1.webp" class="d-block w-100 " alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
              <img src="./Img/bn.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
              <img src="./Img/Banner1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
              <img src="./Img/carousel3.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
              <img src="./Img/carousel4.webp" class="d-block w-100" alt="...">
            </div>
            
            
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        
        <!-- Fin Carrusel -->
    </div>
    <style>
    
   </style>
    <div class="title centrado">
    <h2 class="h-2">
     Explora la gran variedad de productos de origen natural para cada una de tus necesidades
    </h2>
  <h5 class="sub-titulo">10% de descuento pagando por transferencia! Envíos a todo el país &#127462;&#127479; retiro sin cargo en Olivos de lunes a viernes y Santa fé y Pellegrini los fines de semana.</h5>
   </div>
   
      <div class="container mt-5 ">
        <div class="row">
          <div  class="col-xl-3 col-lg-4 col-md-6  mb-4 centrado">
            <div class="card border border-3 text-center card shadow-lg " style="width: 18rem;">
              <img src="./Img/miel3-min.gif" class="card-img-top fixed-image" alt="...">
              <div class="card-body">
                <h1 class="card-title" style="font-size:30px;font-weight:600;">Nutrición Celular</h1>
                <p class="card-text">Potencia tu salud desde el interior. Nuestra selección de productos te brinda los nutrientes esenciales para un bienestar óptimo. Explora y transforma tu calidad de vida con nosotros.</p>
                <a href="nutricionCelular.php" class="btn btn-primary">Productos</a>
              </div>
            </div>
          </div>
          <div  class="col-xl-3 col-lg-4 col-md-6 mb-4 centrado">
            <div class="card border  border-3 text-center card shadow-lg" style="width: 18rem;">
              <img src="./Img/palta.jpg" class="card-img-top fixed-image" alt="...">
              <div class="card-body">
                <h1 class="card-title" style="font-size:30px;font-weight:600;">Cuidado de la Piel</h1>
                <p class="card-text">Descubre nuestro enfoque en el cuidado de la piel. Nuestros productos están diseñados para revitalizar, hidratar y embellecer tu piel. Experimenta una piel saludable con nuestros productos.</p>
                <a href="cuidadoPiel.php" class="btn btn-primary">Productos</a>
              </div>
            </div>
          </div>
          <div  class="col-xl-3 col-lg-4 col-md-6 mb-4 centrado">
            <div class="card border border-3 text-center card shadow-lg" style="width: 18rem;">
              <img src="./Img/aloe12.webp" class="card-img-top fixed-image" alt="...">
              <div class="card-body">
                <h1 class="card-title" style="font-size:30px;font-weight:600;">Cuidado Personal</h1>
                <p class="card-text">El cuidado personal es esencial para tu bienestar. Nuestra línea de productos te ofrece soluciones para sentirte y lucir mejor. Estamos aquí para ayudarte a mantener tu mejor versión.</p>
                <a href="cuidadoPersonal.php" class="btn btn-primary">Productos</a>
              </div>
            </div>
          </div>
          <!-- Fin del row!-->
      </div>
      
      </div>
      <section id="sellos">
      <h2 class="h-2 mb-5">
    Nuestras Certificaciones
</h2>

        <div class="contenedor">
          <img src="./Img/Certificados/iso1.png" alt="" width="200px" height="200px">
          <img src="./Img/Certificados/iso2.png" alt="" width="200px" height="200px">
          <img src="./Img/Certificados/iso3.png" alt="" width="200px" height="200px">
          <img src="./Img/Certificados/iso4.png" alt="" width="200px" height="200px">
          <img src="./Img/Certificados/iso5.png" alt="" width="200px" height="200px">
          <img src="./Img/Certificados/iso6.png" alt="" width="200px" height="200px">
          <img src="./Img/Certificados/iso7.png" alt="" width="200px" height="200px">
          <img src="./Img/Certificados/iso8.png" alt="" width="200px" height="200px">
          <img src="./Img/Certificados/iso9.png" alt="" width="200px" height="200px">
        </div>
        <a id="ir-sellos"href="sellos.php" style="color:black;">¿Qué Significan?</a>
      </section>

      <script src="https://sdk.mercadopago.com/js/v2"></script>
      <div id="wallet_container"></div>




<?php include("template/foot.php");?>