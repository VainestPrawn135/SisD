<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ingresar</title>
    <link rel="stylesheet" href="css/formularios.css">
  </head>
  <body>
    <div class="container mregister">
      <div id="login_usuario">
        <h1>Ingresa</h1>
        <form name="loginform" id="loginform" action="login_usuario.php" method="post">
          <p>Usuario<br>
              <input type="text" name="username" id="username" class="input" size="32" value=""></p>
          <p>Contraseña<br>
              <input type="password" name="password" id="password" class="input" size="20" value=""></p>

          <p class="submit">
            <input type="submit" name="login" id="login" class="button" value="Ingresar"><br><br>
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

    if(!empty($_POST['username']) && !empty($_POST['password'])) {
      $_username=$_POST['username'];
      $_password=$_POST['password'];
      $comprueba = "SELECT * FROM CLIENTE WHERE CLIENTE_USUARIO='$_username'";

      if($conn->query($comprueba) == TRUE){?>
        <script>
          window.alert("Login realizado con éxito!");
          window.location.href = "index_usuario.html"
        </script><?php
      } else {?>
        <script>
          window.alert("Error al ingresar datos, intenta otra vez!");
        </script><?php
      }
    } else {?>
      <script>
        window.alert("Todos los campos no deben de estar vacios!");
      </script><?php
    }
    ?>
  </body>
</html>
