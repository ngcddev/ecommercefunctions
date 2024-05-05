<?php

include ("con_feedbackDB.php");

if (isset($_POST['register'])) {
    if (
        strlen($_POST['name']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['observation']) >= 1
    ) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $datetime_feedback = date('d/m/y');
        $observation = trim($_POST['observation']);
        $consulta = "INSERT INTO feedbacks(name_feedback, email_feedback, feedback, datetime_feedback) 
        VALUES ('$name','$email','$observation','$datetime_feedback')";

        $resultado = mysqli_query($conex, $consulta);
        if ($resultado) {
            ?>
            <h3 class="send"> Your feedback was sent correctly </h3>
            <?php
        } else {
            ?>
            <h3 class="notsend"> Error: <?php echo mysqli_error($conex); ?></h3>
            <?php
        }
    } else {
        ?>
        <h3 class="notsend">All fields are required</h3>
        <?php
    }
}
?>