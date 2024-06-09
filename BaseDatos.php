<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require 'config.php';

// Consulta para obtener bebidas
$sql_bebidas = "SELECT * FROM BEBIDAS";
$result_bebidas = $conn->query($sql_bebidas);

$bebidas = array();

while ($row = $result_bebidas->fetch_assoc()) {
    $row['tags'] = explode(",", $row['TAGS']);
    $bebidas[] = array(
        "id" => $row['ID_BEBIDA'],
        "title" => $row['TITULO_BEBIDA'],
        "description" => $row['DESCRIPCION_BEBIDA'],
        "price" => $row['PRECIO_BEBIDA'],
        "url" => $row['RUTA_BEBIDA'],
        "tags" => $row['tags']
    );
}

// Consulta para obtener comidas
$sql_comida = "SELECT * FROM COMIDA";
$result_comida = $conn->query($sql_comida);

$comidas = array();

while ($row = $result_comida->fetch_assoc()) {
    $row['tags'] = explode(",", $row['TAGS']);
    $comidas[] = array(
        "id" => $row['ID_COMIDA'],
        "title" => $row['TITULO_COMIDA'],
        "description" => $row['DESCRIPCION'],
        "price" => $row['PRECIO_COMIDA'],
        "url" => $row['RUTA_COMIDA'],
        "tags" => $row['tags']
    );
}

$response = array(
    "drinks" => $bebidas,
    "foods" => $comidas
);

echo json_encode($response);

$conn->close();
?>
