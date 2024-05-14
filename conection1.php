<?php
$servernamer = "localhost";
$username = "root";
$password = "";
$database = "administracion";

$coon =new mysqli($servernamer, $username, $password, $database);
if ($coon->connect_error) {
    die("conexion fallida". $coon->connect_error);
}
echo"conexion exitosa";

?>