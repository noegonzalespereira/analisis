<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body style="background-image: url(imagen/18.webp);background-repeat: no-repeat;
    background-size: cover;">
  
  <div class="body" style="width:800px;height:auto;border:5px white solid;background-color:rgb(104, 75, 49);margin-left:280px;margin-top:40px">
    <div class="cuadro" >
    <center><h1 style="font-weight:bold">Añadir nuevo producto al menú</h1></center>
    <br>
    <form class="row" method="POST" action="guardar_nuevo_prod.php">
    <div class="mb-3 row">
    <label for="titulo_prod" style="color:azure;margin:8px" class="col-sm-2 col-form-label">Titulo:</label>
   
      <input style="width:600px" type="text" class="form-control" id="titulo_prod" name ="titulo_prod">

  </div>
  <div class="mb-3 row">
    <label for="descripcion_prod" style="color:azure;margin:8px" class="col-sm-2 col-form-label">Descripcion:</label>
   
      <input style="width:600px" type="text" class="form-control" id="descripcion_prod" name ="descripcion_prod">

  </div>
  <div class="mb-3 row">
    <label style="color:azure;margin:8px" for="ingredientes" class="col-sm-2 col-form-label">ingredientes:</label>

      <input style="width:600px" type="text" class="form-control" id="ingredientes" name ="ingredientes">

  </div>
  <div class="mb-3 row">
    <label style="color:azure;margin:8px" for="precio" class="col-sm-2 col-form-label">Precio:</label>

      <input  style="width:600px" type="number" class="form-control" id="precio" name ="precio">

  </div>
  <div class="mb-3 row">
    <label style="color:azure;margin:8px" for="imagen" class="col-sm-2 col-form-label">Imagen:</label>

      <input style="width:600px" type="text" class="form-control" id="imagen" name ="imagen">

  </div>
  
  <div class="mb-3 row">
    <center><button style="width:600px" type="submit" class="btn btn-dark">Guardar</button></center>
  </div>
  <div class="mb-3 row">
  
    <center><a  style="width:600px" class="btn btn-danger" href="pedido.php" role="button">Cancelar</a></center>
  
  </div>
  
  </form>
  </div>
  

</div> 
  </body>
</html>