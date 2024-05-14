<?php

if(isset($_POST['product_id'])) {
   
    $product_id = $_POST['product_id'];

 
    $conexion = new mysqli("localhost", "seccion", "3157657766", "inventory_db");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }


    $sql = "DELETE FROM inventory_updates WHERE id = '$product_id'";


    if ($conexion->query($sql) === TRUE) {
    
        echo "success";
    } else {
        
        echo "Error al eliminar el producto: " . $conexion->error;
    }

    $conexion->close();
} else {
    
    echo "No se recibió el ID del producto a eliminar.";
}
?>
