<?php include 'database.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Usuarios Registrados</title>
    <link rel="stylesheet" href="css/tablas.css">
  </head>
  <body>
    <table class="egt" border="1"><tr>
      <th>ID del Usuario</th>
      <th>Nombre del Usuario</th>
      <th>Apellido Paterno</th>
      <th>Apellido Materno</th>
      <th>Nombre de Usuario</th>
      <th>Contraseña</th>
      <th>Correo</th></tr>

    <?php
    $sql = "SELECT * FROM CLIENTE ORDER BY CLIENTE_ID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {?>
          <tr><td> <?php echo $row["CLIENTE_ID"]; ?> </td>
            <td> <?php echo $row["NOMBRE"]; ?> </td>
            <td> <?php echo $row["APP"]; ?> </td>
            <td> <?php echo $row["APM"]; ?> </td>
            <td> <?php echo $row["CLIENTE_USUARIO"]; ?> </td>
            <td> <?php echo $row["CONTRASEÑA"]; ?> </td>
            <td> <?php echo $row["CORREO"]; ?> </td></tr> <?php
        }
        ?></table><?php
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
    <p><a href="index_vendedor.html"><input type="button" name="Regresar" value="Volver a Inicio"></a></p>
  </body>
</html>
