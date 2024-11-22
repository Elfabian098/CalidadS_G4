<?php
  require_once("../../config/conexion.php");
if(isset($_POST["logear"]) and $_POST["logear"]=="login"){
    require_once("../../models/Usuario.php");
    $usuario = new Usuario();
    $usuario->login();
}else{
if(isset($_POST["registrar"]) and $_POST["registrar"]=="registrate"){
  require_once("../../models/Usuario.php");
  $usuario = new Usuario();
  $usuario->registrar();
}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bienvenido a Chukys</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/login.css">
    <link rel="stylesheet" href="public/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="public/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/lib/bootstrap/bootstrap.min.css">
    <script>
    </script>
  </head>
  <body >
    <center>
   
      <div class="container" id="container">
      
        <div class="form-container sign-up">
                    
            <form action="" method="POST">
            <h1>
            <div class="social-icons2">
          <a  class="icon"><img src="../../img/chukys.jpg"  height="130px" width="130px"></i></a>
                </div>
            </h1>
                <h2><a style="font-size:larger">Crear Cuenta</a></h2>
                <input type="email" id="usu_correo" name="usu_correo" placeholder="Email">
                <input type="password" id="usu_pass" name="usu_pass"  placeholder="Contraseña">
                <input type="text" name="usu_nom" placeholder="Nombre">
                <input type="text" name="usu_ape" placeholder="Apellido">
                <input type="hidden" name="registrar" class="form-control" value="registrate">
                    <button type="submit" id="registrate">Registrarse</button>
               
                
</table>
            </form>
        </div>  
        <div class="form-container sign-in">
        <?php
                    if(isset($_GET["m"])){
                        switch($_GET["m"]){
                            case "1";
                            ?>

                         <div id="miAlerta" class="alert">
  Credenciales incorrectas
  <span class="close-btn" onclick="cerrarAlerta()">X</span>
  </div>  
                    <?php
                break;

                            case "2";
                            ?>
                            
                         <div id="miAlerta" class="alert">
  Campos vacíos
  <span class="close-btn" onclick="cerrarAlerta()">X</span>
  </div>
                    <?php
                break;
                
                case "3";
                ?>
                  
                  <div id="miAlerta" class="alert">
  Ya existe un usuario con este correo!
  <span class="close-btn" onclick="cerrarAlerta()">X</span>
  </div>  
        <?php
    break;
                case "4";
                            ?>
                          
                          <div id="miAlerta" class="alert">
 Su cuenta ha sido creada satisfactoriamente!.
  <span class="close-btn" onclick="cerrarAlerta()">X</span>
  </div>  
                    <?php
                break;
                case "5";
                            ?>
                                <div id="miAlerta" class="alert">
 Ocurrió un error inesperado al crear su cuenta.
  <span class="close-btn" onclick="cerrarAlerta()">X</span>
  </div>  
                    <?php
                break;
                case "6";
                ?>
                    <div id="miAlerta" class="alert">
                  Error en la inserción
<span class="close-btn" onclick="cerrarAlerta()">X</span>
</div>  
        <?php
    break;
                         }
                      }
                    ?>
            <form action="" method="POST">
            
            <h1>
            <div class="social-icons">
          <a  class="icon"><img src="../../img/chukys.jpg" height="160px" width="160px"></i></a>
                </div>
            </h1>
                <h2><a style="font-size: larger">Iniciar Sesión</a></h2>
                <span>Chukys</span>
                <input type="email" id="usu_correo" name="usu_correo" placeholder="Email">
                <input type="password" id="usu_pass" name="usu_pass" placeholder="Contraseña">
                <input type="hidden" name="logear" class="form-control" value="login">
                    <button type="submit" id="iniciarsesion">Iniciar Sesión</button>
               
                <a id="contra" href="Cambiarcontraseña.php">¿Olvidaste tu contraseña?</a>
              
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Bienvenido de Vuelta!</h1>
                    <p>Ingresa tu información personal para tener acceso</p>
                    <button class="hidden" id="login">¡Inicia Sesión!</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hola, Usuario!</h1>
                    <p>Registrate con tu información personal para tener acceso</p>
                    <button class="hidden" id="register" >¡Registrate!</button>
                </div>
            </div>
        </div>
    </div>

    <script src="login.js"></script>
    <script>
  function cerrarAlerta() {
    var alerta = document.getElementById("miAlerta");
    alerta.style.display = "none";
  }
</script>

    </center>
  </body>
</html>
