<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("BaseDatos.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $bd = new BaseDatos();

    // Obtener datos del cliente
    $nombre_cliente = $_POST['nombre_cliente'];
    $fecha_pedido = $_POST['fecha_pedido'];
    $hora_pedido = $_POST['hora_pedido'];

    // Insertar cada producto del pedido en la tabla de pedidos
    $productos = [];
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'producto') === 0) {
            $producto = json_decode($value, true);
            $productos[] = $producto;
        }
    }

    foreach ($productos as $producto) {
        $id_produ = $producto['id_produ'];
        $cantidad = $producto['cantidad'];
        $precio = $producto['precio'];

        // Insertar el pedido en la tabla de pedidos con el producto
        $sql_pedido = "INSERT INTO pedidos (nombre_cliente, fecha_pedido, hora_pedido, id_produ) VALUES ('$nombre_cliente', '$fecha_pedido', '$hora_pedido', '$id_produ')";
        $bd->consulta($sql_pedido);

        // Obtener el ID del pedido recién insertado
        $pedido_id = $bd->lastInsertId();

        // Insertar en la tabla de detalles del pedido
        $sql_detalle = "INSERT INTO detalles_pedido (id_pedido, cantidad, precio) VALUES ('$pedido_id', '$cantidad', '$precio')";
        $bd->consulta($sql_detalle);

        // Depuración: Verificar cada detalle del pedido
        echo "Pedido ID: $pedido_id, Producto ID: $id_produ, Cantidad: $cantidad, Precio: $precio<br>";
    }

    // Redirigir a una página de confirmación o mostrar un mensaje
    header("Location: pedidos_guardados.php");
    exit();
}
?>



