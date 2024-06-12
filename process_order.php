<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = htmlspecialchars($_POST['cliente']);
    $productos = $_POST['producto'];
    $cantidades = $_POST['cantidad'];
    $precios = $_POST['precio'];

    $total = 0;
    $factura = "<h1>Factura</h1>";
    $factura .= "<p>Cliente: $cliente</p>";
    $factura .= "<table border='1'>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Total</th>
                    </tr>";

    for ($i = 0; $i < count($productos); $i++) {
        $producto = htmlspecialchars($productos[$i]);
        $cantidad = (int)$cantidades[$i];
        $precio = (float)$precios[$i];
        $subtotal = $cantidad * $precio;
        $total += $subtotal;

        $factura .= "<tr>
                        <td>$producto</td>
                        <td>$cantidad</td>
                        <td>\$$precio</td>
                        <td>\$$subtotal</td>
                    </tr>";
    }

    $factura .= "<tr>
                    <td colspan='3'><strong>Total</strong></td>
                    <td><strong>\$$total</strong></td>
                </tr>
                </table>";

    echo $factura;
} else {
    echo "<p>No se recibieron datos.</p>";
}
?>
