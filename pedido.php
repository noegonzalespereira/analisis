<?php
    include("BaseDatos.php");
    $bd = new BaseDatos();
    $rows = $bd ->consulta("SELECT * FROM `productos`;");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Pedido</title>
    <link rel="stylesheet" href="./css/pedido.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(imagen/18.webp);">
  <style>
    .Datos p.total {
        font-size: 1.5em; /* Aumenta el tamaño de la fuente */
        font-weight: bold; /* Hace el texto en negrita */
        color: #333; /* Cambia el color del texto */
    }
    
    .Datos {
      background-color: blanchedalmond;
      padding: 15px;
      border: 8px white solid;
      border-radius: 15px;
    }

    .Datos h1 {
      color: #333; 
      text-align: center; 
      font-weight: bold;
      letter-spacing: 2px;
    }

    .Datos form {
      display: flex;
      flex-direction: column; 
    }

    .Datos label {
      margin-bottom: 3px; 
      padding: 3px;
      margin:5px;
      
    }

    .Datos input {
      margin-bottom: 15px; 
      padding: 8px;
      border-radius: 6px;

    }

    .Datos button {
      background-color: #4CAF50; 
      color: white; 
      padding: 10px 20px; 
      border: none;
      cursor: pointer; 
    }

    .Datos button:hover {
      background-color: #45a049; 
    }
    .agregar button{
      background-color: #4CAF50;
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
      <main class="container mt-5">
        <div class="row ">
            <div class="col-md-8" >
               <div class="row">
            <?php
              $displayedData = [];  
              foreach ($rows as $d) {
                if (!in_array($d['imagen'], $displayedData)) { 
                  ?>
                  <div class="col-md-6" >

                  <div class="card" style="width: 18rem; margin:8px;background-color:rgb(104, 75, 49);color:antiquewhite;padding: 8px" >
                    <img src="<?php echo $d['imagen']; ?>" class="card-img-top" alt="img producto">
                    <div class="card-body">
                      <h5 class="card-title" style="color:black;text-align:center"> <?php echo $d['titulo_produ']; ?></h5>
                      <p class="card-text" style="text-align: center; color:rgb((204, 170, 118)"><?php echo $d['precio']; ?></p>
                      <button style="margin-left:40px" class="agregar" class="btn btn-dark" data-id="<?php echo $d['id_produ']; ?>" data-nombre="<?php echo $d['titulo_produ']; ?>" data-precio="<?php echo $d['precio']; ?>">Agregar al pedido</button>
                    </div>
                  </div>
                  </div>

              <?php
              $displayedData[] = $d['imagen'];  
                }
              }
            ?>
               </div>
            </div>
            <div class="col-md-4">
            <div class="Datos" style="background-color:rgb(104, 75, 49); padding:15px;border:8px white solid;border-radius:15px">
              <h1 style="color:black">Datos del Pedido</h1>
                  <form id="formulario_pedido" action="guardar_pedido.php" method="post">
                      <label for="nombre_cliente">Nombre del Cliente:</label>
                      <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" values="">      
                      <label for="fecha_pedido">Fecha del Pedido:</label>
                      <input type="date" class="form-control" id="fecha_pedido" name="fecha_pedido" > 
                      <label for="hora_pedido">Hora del Pedido:</label>
                      <input type="time" class="form-control" id="hora_pedido" name="hora_pedido" >
              <div id="pedido">
              </div>
              <button  type="submit" class="btn btn-dark">Guardar pedido</button>
              </form>


            </div>
            </div>
          
        </div>
      </main>
   
    
    
   
    
    <script>
        

        function mostrarPedido() {
            var contenedorPedido = document.getElementById('pedido');
            contenedorPedido.innerHTML = ''; // Limpiar el contenedor

            // Recorrer el pedido y crear elementos HTML para cada producto
            for (var i = 0; i < pedido.length; i++) {
                var producto = document.createElement('div');
                producto.innerHTML = 
                    '<h2>' + pedido[i].titulo_produ + '</h2>' +
                    '<p>Precio: ' + pedido[i].precio + '</p>' +
                    '<input type="number" value="' + pedido[i].cantidad + '" onchange="cambiarCantidad(' + i + ', this.value)">' +
                    '<button onclick="eliminarDelPedido(' + i + ')">Eliminar</button>';
                contenedorPedido.appendChild(producto);
            }

            // Mostrar el total
            var total = document.createElement('p');
            total.className = 'total'; 
            total.innerHTML = 'Total: ' + calcularTotal();
            contenedorPedido.appendChild(total);
        }
        var pedido = [];

        window.onload = function() {
            var botones = document.getElementsByClassName('agregar');
            for (var i = 0; i < botones.length; i++) {
                botones[i].addEventListener('click', function() {
                    var id_produ = this.getAttribute('data-id');
                    var titulo_produ = this.getAttribute('data-nombre');
                    var precio = this.getAttribute('data-precio');
                    agregarAlPedido(id_produ, titulo_produ, precio);
                });
            }
        };

        function agregarAlPedido(id_produ, titulo_produ, precio) {
            // Agrega el producto al pedido
            pedido.push({
                id_produ: id_produ,
                titulo_produ: titulo_produ,
                precio: parseFloat(precio),
                cantidad:1
            });
            mostrarPedido();
        }
        
        function calcularTotal() {
            var total = 0;
            for (var i = 0; i < pedido.length; i++) {
                total += pedido[i].precio*pedido[i].cantidad; // Asegúrate de convertir el precio a un número
            }
            return total;
        }
        function eliminarDelPedido(indice) {
            // Elimina el producto en el índice especificado del pedido
            pedido.splice(indice, 1);
            // Actualiza la interfaz de usuario para mostrar el pedido actualizado
            mostrarPedido();
        }
        function cambiarCantidad(indice, cantidad) {
          if (cantidad > 1) { // Verifica que la cantidad sea igual a 1
            pedido[indice].cantidad = parseInt(cantidad);
            mostrarPedido();
          } else {
            alert('La cantidad debe ser mayor a 1.'); // Muestra un mensaje si la cantidad no es igual a 1
          }
        }
        document.getElementById('formulario-pedido').addEventListener('submit', function(event) {
            // Prevenir el comportamiento de envío de formulario predeterminado
            event.preventDefault();

            // Crear un campo de entrada oculto para cada producto en el pedido
            for (var i = 0; i < pedido.length; i++) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'producto' + i;
                input.value = JSON.stringify(pedido[i]);
                this.appendChild(input);
            }

            // Enviar el formulario
            this.submit();
            // Limpia el contenedor del pedido después de enviar el formulario
            var contenedorPedido = document.getElementById('pedido');
            contenedorPedido.innerHTML = '';

        });





    </script> 

    
</body>
</html>
