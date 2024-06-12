<?php
    include("BaseDatos.php");
    $bd = new BaseDatos();
    $rows = $bd ->consulta("SELECT * FROM `productos`;");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/menu.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<style>
  .container-fluid{
  background-color: rgb(165,125,66);
  
}

.nav-link{
  color: rgb(221,203,153);
}
</style>
<body style="background-image: url(imagen/18.webp);">
<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <img src="imagen/logoRestaurante.jpeg" alt="Logo" width="5%" height="5%" class="d-inline-block align-text-top">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" aria-current="page" href="index.html">INICIO</a>
          <a class="nav-link" href="menu.php">MENU</a>
          <a class="nav-link" href="reserva.html">RESERVAS</a>
          <!--<a class="nav-link" href="about.html">ABOUT US</a>-->
        </div>
      </div>
    </div>
  </nav>


      <main class="container mt-5">
        <h1 class="mb-4" style="font-weight: bold; word-spacing:18px; letter-spacing: 10px;">Nuestro Menú</h1>
        <div class="row row-cols-1 row-cols-md-2 g-4">
      <?php
        $displayedData = [];  
        foreach ($rows as $d) {
          if (!in_array($d['imagen'], $displayedData)) { 
            ?>
            <div class="card" style="width: 18rem; margin:40px; padding: 8px;background-color:rgb(104, 75, 49);color:antiquewhite">
              <img src="<?php echo $d['imagen']; ?>" class="card-img-top" alt="IMAGEN DE LA AUTORIDAD">
              <div class="card-body">
                <h5 class="card-title" style="font-weight: bold;color:black; text-align:center" > <?php echo $d['titulo_produ']; ?></h5>
                <p class="card-text" style="color:antiquewhite"><?php echo $d['descripcion_produ']; ?></p>
                <p class="card-text" style="color:rgb(204, 170, 118);text-align:center"><?php echo $d['precio']; ?> Bs</p>
              </div>
            </div>

        <?php
        $displayedData[] = $d['imagen'];  
      }
    }
  ?>
  </div>
  </main>

    <a href="detalle_producto.php">Añadir Producto</a>
</body>
</html>

 