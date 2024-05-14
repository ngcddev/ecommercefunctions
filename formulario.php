<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>plantilla de solicitud y sugerencia</title>
    <link rel="stylesheet" href="desing.css">
</head>
<body class="desingformulario">
    <div class="texttitle">
    <h2> formulario de solicitud y sugerencia  </h2> 
    </div>
   
  
    <div class="fondo_texto">  
   <form class="estiloformulario" action="procesamiento_formulario.php" method="post">
    <label class="texto1"  for="nombre_inf">Nombre:</label>
    <input type="text" id="nombre_inf" name="nombre_inf" placeholder= "nombre..." required>
    
      <label  class="texto1" for="apellido_inf">Apellido</label>
      <input type="text" id="apellido_inf" name="apellido_inf" placeholder= "apellido..." required>


      <label  class="texto1" for="email_inf">Email</label>
      <input type="text" id="email_inf" name="email_inf" placeholder= "email..."  required>

      <input type="submit" value="enviar comentario">

   </form>
   </div>
   
</body>
</html>