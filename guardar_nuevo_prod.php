<?php
    include("BaseDatos.php");

    $bd= new BaseDatos();
   
    
    $titulo_produ = $_POST["titulo_prod"];
    $descripcion_produ = $_POST["descripcion_prod"];
    $ingredientes = $_POST["ingredientes"];
    $precio = $_POST["precio"];
    $imagen = $_POST["imagen"];
	$sql = "insert into productos(titulo_produ,descripcion_produ,ingredientes,precio,imagen) values('$titulo_produ','$descripcion_produ','$ingredientes','$precio','$imagen');";



    
    $rows = $bd->consulta($sql);
  
    echo "Datos Insertados";

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  </nav>
      <div class="card-body">
       <center> <a class="btn btn-primary" href="pedido.php" role="button">Volver al Inicio</a></center>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>