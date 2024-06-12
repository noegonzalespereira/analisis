<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Restaurante</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" href="index.html">Inicio</a>
              <a class="nav-link" href="menu.html">Menú</a>
              <a class="nav-link" href="reserva.html">Reservas</a>
            </div>
          </div>
        </div>
    </nav>
    <h1>Detalle del Producto</h1>
    <?php
    // Obtener el ID del producto de la URL
    $id = $_GET['id_produ'];

    // Conexión a la base de datos
    $conexion = pg_connect("host=localhost dbname=restaurante user=root password=12345");

    // Consulta para obtener la información del producto
    $consulta = pg_query($conexion, "SELECT * FROM productos WHERE id='$id_produ'");
    $producto = pg_fetch_assoc($consulta);

    // Mostrar la información del producto
    echo "<h2>" . $producto['titulo_produ'] . "</h2>";
    echo "<p>" . $producto['descripcion_produ'] . "</p>";
    echo "<p>Ingredientes: " . $producto['ingredientes_produ'] . "</p>";
    echo "<p>Precio: $" . $producto['precio'] . "</p>";
    echo "<form action='añadir_al_carrito.php' method='post'>";
    echo "<input type='hidden' name='id' value='" . $producto['id_produ'] . "'>";
    echo "Cantidad: <input type='number' name='cantidad' value='1' min='1'><br>";
    echo "<input type='submit' value='Añadir al Carrito'>";
    echo "</form>";

    // Cerrar la conexión
    pg_close($conexion);
    ?>
    
    <script src="details.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
