<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Conexión a Base de Datos</title>
  </head>
  <body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "videojuegos";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8mb4");

    if (!$conn->set_charset("utf8mb4")) {
      printf("Error loading character set utf8: %s\n", $conn->error);
    } else {
      printf("Current character set: %s\n", $conn->character_set_name());
    }

    // Check connection
    if ($conn->connect_error) {
        die("¡Conexión Fallida!: " . $conn->connect_error);
    }
    echo "¡Conexión Exitosa!";
    $conn->close();
    ?>
    <p><a href="index.html"><input type="button" name="Regresar" value="Volver a Inicio"></a></p>
  </body>
</html>
