<?php
    include("BaseDatos.php");

    $bd= new BaseDatos();
   
     
    $nombre_cliente = $_POST["nombre_cliente"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];
    $persona = $_POST["persona"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];

	$sql = "insert into reserva(nombre_cliente,email,celular,persona,fecha,hora) values('$nombre_cliente','$email','$celular','$persona','$fecha','$hora');";



    
    $rows = $bd->consulta($sql);
  
    echo "Reserva exitosa";

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
       <center> <a class="btn btn-primary" href="reserva.html" role="button">Volver al Inicio</a></center>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>