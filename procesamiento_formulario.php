<?php
$servernamer = "localhost";
$username = "root";
$password = "";
$database = "administracion";

$conn = new mysqli($servernamer, $username, $password, $database);

if($conn->connect_error) {
    die("conexion fallida". $conn->connect_error);   

}


echo"conexion exitosa";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $nombre1= $_POST["nombre_inf"];
    $apellido1 = $_POST["apellido_inf"];
    $email1 = $_POST["email_inf"];


   $sql ="INSERT  INTO  inform (nombre  ,  apellido ,  email) VALUES (?,  ?,  ?)";

   $stmt = $conn->prepare($sql); 

if($stmt === false) {
  header("Location : error.php");
  exit();
}


   $stmt ->bind_param("sss", $nombre1, $apellido1,  $email1);

   if($stmt -> execute()) {
    header("Location: formulario.php ");
    exit();

   } else {
    header ("Location: error.php");
    exit();

   }
 
    $stmt->close();
    $conn->close();
  
}else{

    header("Location: error.php");
    exit();
}

?>