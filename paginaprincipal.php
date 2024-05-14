<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Observaciones y Sugerencias</title>
    <link rel="stylesheet" href="desing.css">
</head>
<body class="pantalla">
   




<?php
require_once('conection1.php');

// Check if the form is submitted
if(isset($_GET['enviar'])) {
    // Sanitize input to prevent SQL injection
    $busqueda  = $coon->real_escape_string($_GET['busqueda']);
    
    // Execute the query with the sanitized input
    $consulta = $coon->query("SELECT * FROM inform where nombre like '%$busqueda%'");
    
    // Check if the query executed successfully
    if($consulta) {
        // Check if there are rows returned
        if($consulta->num_rows > 0) {
            // Fetch and display the results
            while($row = $consulta->fetch_array()) {
                echo $row['nombre']. '<br>';
            }
        } else {
            echo "No se encontraron resultados.";
        }
    } else {
        echo "Error de consulta: " . $coon->error;
    }
}
?>







<hr>
<h1>BIENVENIDO A LA GESTION DE OBSERVACION Y SUGERENCIA</h1>
<hr>

<div class="contenedorboton">
    <form action="" method="get">
        <input type="text" name="busqueda"><br>
        <input type="submit" name="enviar" value="Buscar">
    </form>
</div>

<?php
// Displaying data from the database outside the search block
$sql = "SELECT * FROM inform";
$result = $coon->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='tabla'>";
    echo "<tr><th>ID</th><th>nombre</th><th>apellido</th><th>email</th></tr>";
    while ($fila = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$fila["ID"]."</td>";
        echo "<td>".$fila["nombre"]."</td>";
        echo "<td>".$fila["apellido"]."</td>";
        echo "<td>".$fila["email"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay datos en la base de datos";
}
?>

<div class="contenedortexto">
    <p>
        © 2024 shopping car | Esta tienda está autorizada por Visa para realizar
        transacciones electrónicas. | Copyright © Cencosud
    </p>
</div>

</body>
</html>
