<?php
include ("con_feedbackDB.php");

if (isset($_POST['register'])) {
    
 
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['observation'])) {
        ?>
        <h3 class="notsend">All fields are required</h3>
        <?php
    } else {
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
    }
}
?>
