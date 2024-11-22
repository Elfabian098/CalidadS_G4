<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
    <link rel="stylesheet" href="../../css/cambiarcontraseña.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
 <script>
       function enviar(){
        document.form.action="../controller/UsuarioControlador.php";
            document.form.method="GET";
            document.form.op.value="6";
            document.form.submit();
    }
 </script>
</head>
<body id="cambiarcontraseña">
<div class="container" id="container">
<input type="hidden" name="op"/>
<div class="form-container">  
       <form action="cambiarcontraseña.php" method="GET">
            <div class="social-icons">
          <a  class="icon"><img src="../../img/chukys.jpg" height="200px" width="200px"></i></a>
                </div>
       <a>Enviar Correo</a>
       <span> Digite su correo para enviar un email de verificación:</span>
                <input type="email" name="email" placeholder="Email">
                <input type="submit" id="enviaremail" onclick="enviar()" value="Enviar">
    </form>
</div>
</div>
</body>
</html>