<?php

if(isset($_POST['product_name'], $_POST['category'], $_POST['description'])) {
    
    $product_name = $_POST['product_name']; $category = $_POST['category']; $description = $_POST['description'];

    $servername = "localhost"; $username = "seccion"; $password = "3157657766"; $dbname = "inventory_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "UPDATE inventory_updates SET category=?, description=? WHERE product_name=?";
    $stmt = $conn->prepare($sql);


    $stmt->bind_param("sss", $category, $description, $product_name);


    if ($stmt->execute()) {
        echo "Producto actualizado correctamente";
    } else {
        echo "Error al actualizar el producto: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    
    echo "No se recibieron los datos del formulario de actualización";
}
?>
