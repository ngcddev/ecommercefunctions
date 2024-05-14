<?php
session_start();

$username = $_POST['username']; $password = $_POST['password'];

$_SESSION['username'] =$username ; $_SESSION['password'] =$password;

$conexion = mysqli_connect("localhost", "seccion", "3157657766", "inventory_db");


$username = mysqli_real_escape_string($conexion, $username); $password = mysqli_real_escape_string($conexion, $password );

$consulta = "SELECT username, passworduser FROM users WHERE username='$username' AND passworduser='$password '";
$resultado = mysqli_query($conexion, $consulta); $filasadmin = mysqli_num_rows($resultado);

if ($filasadmin > 0) {
    $filasadmin= mysqli_fetch_assoc($resultado);
    header("Location: inventory_form.php"); 
    exit(); 
} else {
    header("location: index.php");
}

mysqli_free_result($resultado);
mysqli_close($conexion);
echo '<form><button type="button" onclick="history.back()">Volver</button></form>';
?>