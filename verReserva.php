<?php
include("BaseDatos.php");

$bd = new BaseDatos();
$rows = $bd->consulta("SELECT * FROM reserva;");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/reserva.css">
</head>
<body style="background-image: url(imagen/18.webp);">
<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <img src="./imagen/logoRestaurante.jpeg" alt="Logo" width="5%" height="5%" class="d-inline-block align-text-top">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" aria-current="page" href="pedido.php">Pedidos</a>
              <a class="nav-link" href="add_productos.php">Añadir Productos</a>
              <a class="nav-link" href="pedidos_guardados.php">Factura</a>
              <a class="nav-link" href="verReserva.php">Ver Reservas</a>
            </div>
          </div>
        </div>
      </nav>
  <div class="container mt-5">
    <h1 class="text-center" style="color:white">Reservas</h1>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre del Cliente</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Número de Personas</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td><?php echo $row['nombre_cliente']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['celular']; ?></td>
                    <td><?php echo $row['persona']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <td><?php echo $row['hora']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
  </div>
</body>
</html>
