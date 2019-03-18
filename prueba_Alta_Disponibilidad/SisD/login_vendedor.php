<?php include 'database.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ingresar</title>
    <link rel="stylesheet" href="css/formularios.css">
  </head>
  <body>
    <div class="container mregister">
      <div id="login_vendedor">
        <h1>Ingresa</h1>
        <form name="loginform" id="loginform" action="login_vendedor.php" method="post">
          <p>Usuario<br>
              <input type="text" name="username" id="username" class="input" size="32" value=""></p>
          <p>Contraseña<br>
              <input type="password" name="password" id="password" class="input" size="20" value=""></p>

          <p class="submit">
            <input type="submit" name="login" id="login" class="button" value="Ingresar"><br><br>
          </p>
        </form>
        <p class="submit">
          <a href="index.php">
            <input type="submit" name="index" id="index" class="button" value=" Regresar a Inicio">
          </a>
        </p>
      </div>
    </div>

    <?php
    if(!empty($_POST['username']) && !empty($_POST['password'])) {
      $_username=$_POST['username'];
      $_password=$_POST['password'];
      $comprueba = "SELECT * FROM VENDEDOR WHERE VENDEDOR_USUARIO='$_username'";

      if($conn->query($comprueba) == TRUE){?>
        <script>
          window.alert("Login realizado con éxito!");
          window.location.href = "index_vendedor.html"
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
