
<!DOCTYPE html>
<html>
<head>
    <title>Pedidos Guardados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Asegúrate de incluir el mismo CSS que usas en pedido.php -->
    
</head>
<body style="background-image: url(imagen/18.webp);">
    <style>
        .container-fluid{
        background-color: rgb(165,125,66);
        
        }

        .nav-link{
        color: rgb(221,203,153);
        }
    </style>
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
    <h1>Pedidos Guardados</h1>
    <?php
        include 'BaseDatos.php';
        $bd = new BaseDatos();
        $pedidos = $bd->consulta("SELECT * FROM pedidos;");
        foreach ($pedidos as $pedido) {
            echo "<div class='Datos'>";
            echo "<h1>Datos del Pedido</h1>";
            echo "<p>Nombre del Cliente: " . $pedido['nombre_cliente'] . "</p>";
            echo "<p>Fecha del Pedido: " . $pedido['fecha_pedido'] . "</p>";
            echo "<p>Hora del Pedido: " . $pedido['hora_pedido'] . "</p>";
            echo "<p>ID Producto: " . $pedido['id_produ'] . "</p>";
            echo "<p>Cantidad: " . $pedido['cantidad'] . "</p>";
            echo "<p>Precio Unitario: " . $pedido['precio_unitario'] . "</p>";
            echo "<p>Precio Total: " . $pedido['precio_total'] . "</p>";
            echo "</div>";
        }
    ?>
</body>
</html>

