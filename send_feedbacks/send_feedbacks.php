<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks</title>
    <link rel="stylesheet" href="style_sfeedback.css">
</head>

<body>

    <div class="container">

        <h2> Feedback form </h2>
        <form method="post">
            <h3> Send your feedback or observation </h3>
            <input type="text" name="name" placeholder="Full name">
            <input type="email" name="email" placeholder="E-Mail">
            <input type="text" name="observation" placeholder="Feedback or observation">
            <input type="submit" name="register">
        </form>
        
        <?php
        include("register.php");
        ?>

    </div>

</body>

</html>

