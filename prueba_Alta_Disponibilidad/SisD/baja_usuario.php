<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Elminar Cuenta</title>
    <link rel="stylesheet" href="css/formularios.css">
  </head>
  <body>
    <div class="container mregister">
      <div id="eliminar_usuario">
        <h1>Ingresa tus datos</h1>
        <form name="registerform" id="drop_user" action="baja_usuario.php" method="post">
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
            <input type="submit" name="drop_user" id="drop_user" class="button" value="Eliminar Cuenta">
          </p>
        </form>
        <p class="submit">
          <a href="index.html">
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

    if(!empty($_POST['name']) && !empty($_POST['ap_pat']) && !empty($_POST['ap_mat']) && !empty($_POST['password']) && !empty($_POST['username']) && !empty($_POST['email'])) {
      $_name=$_POST['name'];
      $_app=$_POST['ap_pat'];
      $_apm=$_POST['ap_mat'];
      $_password=$_POST['password'];
      $_username=$_POST['username'];
      $_email=$_POST['email'];

      $comprueba = "SELECT CLIENTE_ID FROM CLIENTE WHERE CLIENTE_USUARIO = '$_username'";

      $result = $conn->query($comprueba);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $_id_user = $row["CLIENTE_ID"];
        }
      } else {
          echo "0 results";
      }

      $eliminar = "DELETE FROM CLIENTE WHERE CLIENTE_ID = '$_id_user'";

      if($conn->query($eliminar) == TRUE && $conn->query($comprueba) == TRUE){
          $message = "Se eliminó la cuenta!";
      } else if($conn->query($eliminar) == FALSE || $conn->query($comprueba) == FALSE) {
        $message = "El usuario no existe o se ingresaron mal los datos!". $conn->error;
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
