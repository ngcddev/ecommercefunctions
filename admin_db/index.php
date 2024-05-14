

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 
    <title>Iniciar sesión</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="container"> 
    <h1 class="mt-4">Iniciar sesión</h1>

    <form action="login.php" method="post" class="mt-3"> 
        <div class="form-group"> 
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Ingresar</button> 
    </form>


    <?php if (isset($login_error)): ?>
        <p style="color:red;"><?php echo $login_error; ?></p> 
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
