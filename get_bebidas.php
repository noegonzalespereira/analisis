<?php
require 'config.php';

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    $stmt = $pdo->query('SELECT * FROM drinks');
    $drinks = $stmt->fetchAll();
    echo json_encode($drinks);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
