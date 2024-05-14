<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Inventario</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .edit-form {
            display: none;
        }
    </style>
</head>
<body class="container">
    <h1 style="margin-top: 40px;">Actualizar Inventario</h1> <!--CSS  -->

    <form action="update_inventory.php" method="post" enctype="multipart/form-data">
    <div> 
        <label>Nombre del Producto:</label>
        <input type="text" name="product_name" required style="width: 100%;"> 
    </div>

    <div style="margin-top: 15px;"> 
        <label>Categoría:</label>
        <input type="text" name="category" required style="width: 100%;">
    </div>

    <div style="margin-top: 15px;">
        <label>Descripción:</label>
        <textarea name="description" rows="4" style="width: 100%;"></textarea> 
    </div>

    <div style="margin-top: 15px;">
        <label>Imagen:</label>
        <input type="file" name="image" accept="image/*">
    </div>

    <button type="submit" style="background-color: blue; color: white; margin-top: 20px;">Actualizar</button> 
</form>


    
    <div style="margin-top: 40px;">
        <h2>Inventario</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre del Producto</th>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
            
                    $conexion = new mysqli("localhost", "seccion", "3157657766", "inventory_db");

                    
                    if ($conexion->connect_error) {
                        die("Error de conexión: " . $conexion->connect_error);
                    }

                    
                    $consulta = "SELECT id, product_name, category, description, images FROM inventory_updates";

            
                    $resultado = $conexion->query($consulta);

                    
                    if ($resultado->num_rows > 0) {
                        while($fila = $resultado->fetch_assoc()) {
                            echo "<tr data-product-id='" . $fila["id"] . "'>";
                            echo "<td>" . $fila["product_name"] . "</td>";
                            echo "<td>" . $fila["category"] . "</td>";
                            echo "<td>" . $fila["description"] . "</td>";
                            echo "<td><img src='" . $fila["images"] . "' style='max-width: 100px; max-height: 100px;'></td>";
                            echo "<td><button class='btn btn-primary edit-btn'>Editar</button>";
                            echo "<button class='btn btn-danger delete-btn'>Eliminar</button></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No hay datos en el inventario.</td></tr>";
                    }

                    
                    $conexion->close();
                ?>
            </tbody>
        </table>
    </div>

    
    <div class="edit-form">
        <h2>Editar Producto</h2>
        <form action="update_inventory.php" method="post">
            <input type="hidden" name="product_id">
            <div> 
                <label>Nombre del Producto:</label>
                <input type="text" name="product_name" required style="width: 100%;"> 
            </div>

            <div style="margin-top: 15px;"> 
                <label>Categoría:</label>
                <input type="text" name="category" required style="width: 100%;">
            </div>

            <div style="margin-top: 15px;">
                <label>Descripción:</label>
                <textarea name="description" rows="4" style="width: 100%;"></textarea> 
            </div>

            <div style="margin-top: 15px;">
                <label>Imagen:</label>
                <input type="file" name="image" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Guardar Cambios</button>
            <button type="button" class="btn btn-secondary cancel-btn" style="margin-top: 20px;">Cancelar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
    $(document).ready(function() {
    
        $(".edit-btn").click(function() {
            var row = $(this).closest("tr");
            var productId = row.attr("data-product-id"); 
            var productName = row.find("td:eq(0)").text();
            var category = row.find("td:eq(1)").text();
            var description = row.find("td:eq(2)").text();
            var imageUrl = row.find("td:eq(3) img").attr("src");

            
            $(".edit-form").show();
            $(".edit-form input[name='product_id']").val(productId); 
            $(".edit-form input[name='product_name']").val(productName);
            $(".edit-form input[name='category']").val(category);
            $(".edit-form textarea[name='description']").val(description);
            $(".edit-form").find("img").attr("src", imageUrl);
        });

        
        $(".cancel-btn").click(function() {
            $(".edit-form").hide();
        });

        $(".delete-btn").click(function() {
            var row = $(this).closest("tr");
            var productId = row.attr("data-product-id"); 

            if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
                // Enviar solicitud de eliminación al archivo PHP
                $.post("delete_product.php", { product_id: productId }, function(data) {
                    if (data == "success") {
                        // Eliminar la fila de la tabla
                        row.remove();
                    } else {
                        alert("Error al eliminar el producto.");
                    }
                });
            }
        });
    });
    </script>

</body>
</html>

