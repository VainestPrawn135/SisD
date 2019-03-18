<?php include 'database.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dar de baja un juego</title>
    <link rel="stylesheet" href="css/formularios.css">
  </head>
  <body>
    <div class="container mregister">
      <div id="eliminar_juego">
        <h1>Ingresa nombre del juego</h1>
        <form name="registerform" id="drop_game" action="baja_juegos.php" method="post">
          <p>Nombre del juego<br>
              <input type="text" name="game" id="game" class="input" size="32" value=""></p>

          <p class="submit">
            <input type="submit" name="drop_game" id="drop_game" class="button" value="Eliminar Juego">
          </p>
        </form>
        <p class="submit">
          <a href="index_vendedor.html">
            <input type="submit" name="index" id="index" class="button" value=" Regresar a Inicio">
          </a>
        </p>
      </div>
    </div>

    <?php
    if(!empty($_POST['game'])) {
      $_game=$_POST['game'];

      $comprueba = "SELECT JUEGOS_ID FROM CATALOGO_JUEGOS WHERE NOMBRE_JUEGO = '$_game'";
      $result = $conn->query($comprueba);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $_id_game = $row["JUEGOS_ID"];
        }
      } else {
          echo "0 results";
      }

      $eliminar = "DELETE FROM CATALOGO_JUEGOS WHERE JUEGOS_ID = '$_id_game'";

      if($conn->query($eliminar) == TRUE && $conn->query($comprueba)){
          $message = "Juego eliminado";
      } else if($conn->query($eliminar) == FALSE || $conn->query($comprueba) == FALSE) {
        $message = "El juego no existe o no se pudo hacer conexión". $conn->error;
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
