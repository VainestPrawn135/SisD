<?php include 'database.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ventas realizadas</title>
    <link rel="stylesheet" href="css/formularios.css">
    <link rel="stylesheet" href="css/tablas.css">
  </head>
  <body>
    <table class="egt" border="1"><tr>
    <th>ID de la Venta</th>
    <th>Se le vendio a</th>
    <th>Juego que se vendio</th>
    <th>Lo atendio</th>
	<th>Fecha</th></tr>

    <?php
    $sql = "SELECT VENTA_ID, CLIENTE_USUARIO, NOMBRE_JUEGO, VENDEDOR_USUARIO, FECHA
            FROM VENTA, CLIENTE, CATALOGO_JUEGOS, VENDEDOR
            WHERE VENTA_ID_CLIENTE = CLIENTE.CLIENTE_ID
            AND VENTA_ID_JUEGO = CATALOGO_JUEGOS.JUEGOS_ID
            AND VENTA_ID_VENDEDOR = VENDEDOR.VENDEDOR_ID
            ORDER BY VENTA_ID";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {?>
          <tr><td> <?php echo $row["VENTA_ID"]; ?> </td>
          <td> <?php echo $row["CLIENTE_USUARIO"]; ?> </td>
          <td> <?php echo $row["NOMBRE_JUEGO"]; ?> </td>
          <td> <?php echo $row["VENDEDOR_USUARIO"]; ?></td>
          <td> <?php echo $row["FECHA"]; ?></td></tr><?php
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
