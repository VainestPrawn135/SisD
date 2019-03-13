<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modificar datos de usuario</title>
    <link rel="stylesheet" href="css/formularios.css">
  </head>
  <body>
    <div class="container mregister">
      <div id="modificar_usuario">
        <h1>Ingresa tu nombre de usuario</h1>
        <form name="registerform" id="registerform" action="modificar_usuario.php" method="post">
          <p>Nombre de usuario<br>
              <input type="text" name="username" id="username" class="input" size="32" value=""></p>
          <h1>Ingresa los datos a modificar</h1>
          <p>Nombre(s)<br>
              <input type="text" name="name" id="name" class="input" size="32" value=""></p>
          <p>Apellido Paterno<br>
              <input type="text" name="ap_pat" id="ap_pat" class="input" size="32" value=""></p>
          <p>Apellido Materno<br>
              <input type="text" name="ap_mat" id="ap_mat" class="input" size="32" value=""></p>
          <p>Nuevo Nombre de usuario<br>
              <input type="text" name="new_username" id="new_username" class="input" size="32" value=""></p>
          <p>E-mail<br>
              <input type="text" name="email" id="email" class="input" size="32" value=""></p>
          <p>Contraseña vieja<br>
              <input type="password" name="old_password" id="old_password" class="input" size="20" value=""></p>
          <p>Contraseña nueva<br>
              <input type="password" name="new_password" id="new_password" class="input" size="20" value=""></p>

          <p class="submit">
            <input type="submit" name="update" id="update" class="button" value="Modificar">
          </p>
        </form>
        <p class="submit">
          <a href="index_usuario.html">
            <input type="submit" name="index" id="index" class="button" value=" Regresar a Inicio">
          </a>
        </p>
      </div>
    </div>

    <?php
    $servername = "localhost";
    $username = "replica";
    $password = "pass";
    $dbname = "videojuegos";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8mb4");

    if (!$conn->set_charset("utf8mb4")) {
      printf("Error loading character set utf8: %s\n", $conn->error);
    } else {
      printf("Current character set: %s\n", $conn->character_set_name());
    }

    if(!empty($_POST['name']) && !empty($_POST['ap_pat']) && !empty($_POST['ap_mat']) && !empty($_POST['new_username'])
    && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['old_password']) && !empty($_POST['new_password'])) {
      $_name=$_POST['name'];
      $_app=$_POST['ap_pat'];
      $_apm=$_POST['ap_mat'];
      $_old_password=$_POST['old_password'];
      $_new_password=$_POST['new_password'];
      $_username=$_POST['username'];
      $_new_username=$_POST['new_username'];
      $_email=$_POST['email'];

      $comprueba = "SELECT CLIENTE_ID FROM CLIENTE
                    WHERE CLIENTE_USUARIO='$_username' AND CONTRASEÑA='$_old_password'";

      $result_id = $conn->query($comprueba);
      if ($result_id->num_rows > 0) {
          while($row = $result_id->fetch_assoc()) {
            $_id_user = $row["CLIENTE_ID"];
        }
      } else {
          echo "0 results";
      }

      $modificar = "UPDATE CLIENTE SET NOMBRE='$_name', APP='$_app', APM='$_apm',
                    CLIENTE_USUARIO='$_new_username', CONTRASEÑA='$_new_password',
                    CORREO='$_email' WHERE CLIENTE_ID = '$_id_user'";

      if($conn->query($modificar) == TRUE && $conn->query($comprueba) == TRUE){
        $message = "Cuenta Correctamente Modificada";
      } else if($conn->query($modificar) == FALSE || $conn->query($comprueba) == FALSE) {
        $message = "El usuario no existe! Por favor, intenta con otro!". $conn->error;
      }
    } else {
      $message = "Todos los campos no deben de estar vacios!";
    }
    if (!empty($message)) {
      echo $message;
    }
    ?>
  </body>
</html>
