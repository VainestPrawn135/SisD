<?php include 'database.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrate</title>
    <link rel="stylesheet" href="css/formularios.css">
  </head>
  <body>
    <div class="container mregister">
      <div id="registrar_usuario">
        <h1>Registrar</h1>
        <form name="registerform" id="registerform" action="registrar_usuario.php" method="post">
          <p>Nombre(s)<br>
              <input type="text" name="name" id="name" class="input" size="32" value=""></p>
          <p>Apellido Paterno<br>
              <input type="text" name="ap_pat" id="ap_pat" class="input" size="32" value=""></p>
          <p>Apellido Materno<br>
              <input type="text" name="ap_mat" id="ap_mat" class="input" size="32" value=""></p>
          <p>Nombre de usuario<br>
              <input type="text" name="username" id="username" class="input" size="32" value=""></p>
          <p>Contraseña<br>
              <input type="password" name="password" id="password" class="input" size="20" value=""></p>
          <p>E-mail<br>
              <input type="text" name="email" id="email" class="input" size="32" value=""></p>

          <p class="submit">
            <input type="submit" name="register" id="register" class="button" value="Registrar">
          </p>
          <p class="regtext">Ya tienes una cuenta? <a href="login_usuario.php" >Entra Aquí!</a>!</p>
        </form>
        <p class="submit">
          <a href="index_usuario.html">
            <input type="submit" name="index" id="index" class="button" value=" Regresar a Inicio">
          </a>
        </p>
      </div>
    </div>

    <?php
    $cont=$conn->query("SELECT * FROM CLIENTE");
    $numrows = $cont->num_rows;

    if(!empty($_POST['name']) && !empty($_POST['ap_pat']) && !empty($_POST['ap_mat']) && !empty($_POST['password']) && !empty($_POST['username']) && !empty($_POST['email'])) {
      $_name=$_POST['name'];
      $_app=$_POST['ap_pat'];
      $_apm=$_POST['ap_mat'];
      $_password=$_POST['password'];
      $_username=$_POST['username'];
      $_email=$_POST['email'];

      if($numrows!=0){
        $id = $numrows + 1;
        $insertar = "INSERT INTO CLIENTE VALUES('$id', '$_name', '$_app', '$_apm', '$_username', '$_password', '$_email')";
        $comprueba = "SELECT * FROM CLIENTE WHERE NOMBRE='$_name' AND APP='$_app' AND APM='$_apm'
                      AND CLIENTE_USUARIO='$_username' AND CONTRASEÑA='$_password' AND CORREO='$_email'";

        if($conn->query($insertar) == TRUE){
          $message = "Cuenta Correctamente Creada";
        } else if($conn->query($comprueba) == TRUE) {
          $message = "El nombre de usuario ya existe! Por favor, intenta con otro!";
        } else if($conn->query($insertar) == FALSE || $conn->query($comprueba) == FALSE) {
          $message = "Error al ingresar datos de la informacion!". $conn->error;
        }
      }
    } else {
      $message = "Todos los campos no deben de estar vacios!";
    }
    ?>
    <?php
    if (!empty($message)) {?>
      <script>
        window.alert($message);
      </script><?php
    }
    ?>
  </body>
</html>
