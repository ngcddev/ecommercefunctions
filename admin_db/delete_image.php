<?php
if(isset($_POST['product_name']) && isset($_POST['image_src'])){
    $uploadDirectory = 'uploads/'; $imageSrc = $_POST['image_src']; $imagePath = $uploadDirectory . basename($imageSrc);

    if(file_exists($imagePath)){
        
        if(unlink($imagePath)){
            
            $servername = "localhost"; $username = "seccion"; $password = "3157657766"; $dbname = "inventory_db";

            $conn = new mysqli($servername, $username, $password, $dbname);

            
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }
        
            $productName = $_POST['product_name']; $sql = "DELETE FROM inventory_updates WHERE product_name='$productName' AND images='$imageSrc'";

            if ($conn->query($sql) === TRUE) {
                echo "Imagen eliminada correctamente de la base de datos";
            } else {
                echo "Error al eliminar la imagen de la base de datos: " . $conn->error;
            }

            $conn->close();

            
            echo "Imagen eliminada correctamente";
        } else {
            
            echo "Error al eliminar la imagen";
        }
    } else {
        
        echo "La imagen no existe en el servidor";
    }
} else {
    
    echo "Error: Se requiere el nombre del producto y la ruta de la imagen";
}
?>

