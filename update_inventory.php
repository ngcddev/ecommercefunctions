<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php"); 
    exit();
}

$servername = "localhost"; $username = "seccion"; $password = "3157657766";  $dbname = "inventory_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$product_name = $_POST['product_name']; $category = $_POST['category']; $description = $_POST['description']; $update_time = date("Y-m-d H:i:s"); 


$image_name = $_FILES['image']['name']; $image_tmp = $_FILES['image']['tmp_name'];

$image_name = mysqli_real_escape_string($conn, $image_name);

$upload_dir = "uploads/"; $image_path = $upload_dir . basename($image_name); move_uploaded_file($image_tmp, $image_path);


$sql = "INSERT INTO inventory_updates (product_name, category, description, update_time, images) VALUES ('$product_name', '$category', '$description', '$update_time', '$image_path')";

if ($conn->query($sql) === TRUE) {
    echo "Inventario actualizado con éxito.";
    header("Location: inventory_form.php"); 
} else {
    echo "Error al actualizar el inventario: " . $conn->error;
}

$conn->close();
?>
