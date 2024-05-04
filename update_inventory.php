<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: index.php"); 
    exit();
}


$servername = "localhost";
$username = "seccion";
$password = "3157657766"; 
$dbname = "inventory_db";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$product_name = $_POST['product_name'];
$category = $_POST['category'];
$description = $_POST['description'];
$update_time = date("Y-m-d H:i:s"); // Fecha y hora actuales


$sql = "INSERT INTO inventory_updates (product_name, category, description, update_time) VALUES ('$product_name', '$category', '$description', '$update_time')";

if ($conn->query($sql) === TRUE) {
    echo "Inventario actualizado con éxito.";
} else {
    echo "Error al actualizar el inventario: " . $conn->error;
}

$conn->close();
?>
