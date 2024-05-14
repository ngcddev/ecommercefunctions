<?php
include ("con_feedbackDB.php");

if ($conex) {
    $consulta = "SELECT * FROM feedbacks";
    $resultado = mysqli_query($conex, $consulta);
    
    if ($resultado) {
        while ($row = $resultado->fetch_array()) {
            $id = $row["id_feedback"];
            $name = $row["name_feedback"];
            $email = $row["email_feedback"];
            $observation = $row["feedback"];
            $datetime_feedback = $row["datetime_feedback"];
?>
            <div class="container">
                <div class="feedback">
                    <h2><?php echo $name; ?> </h2>
                    <div>
                        <p>
                            <b> ID feedback:</b> <?php echo $id; ?> <br>
                            <b> E-mail:</b> <?php echo $email; ?> <br>
                            <b> observation:</b> <?php echo $observation; ?> <br>
                            <b> Date:</b> <?php echo $datetime_feedback; ?> <br>
                        </p>
                    </div>
                </div>
            </div>
<?php
        }
    } else {
        echo "Error en la consulta: " . mysqli_error($conex);
    }
} else {
    echo "Error de conexión a la base de datos";
}
?>

