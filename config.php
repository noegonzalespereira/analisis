<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "RESTAURANT";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>