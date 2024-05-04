<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Inventario</title>
    <!-- Link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="container">
    <h1 style="margin-top: 40px;">Actualizar Inventario</h1> <!--CSS  -->

    <form action="update_inventory.php" method="post">
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

        <button type="submit" style="background-color: blue; color: white; margin-top: 20px;">Actualizar</button> 
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
