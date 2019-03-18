<?php include 'database.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Catalogo de juegos</title>
    <link rel="stylesheet" href="css/formularios.css">
    <link rel="stylesheet" href="css/tablas.css">
  </head>
  <body>
    <table class="egt" border="1"><tr>
      <th>ID del Juego</th>
      <th>Nombre del Juego</th>
      <th>Idioma</th>
      <th>Plataforma</th>
      <th>Categoria</th>
      <th>Tipo</th>
      <th>Desarrolladora</th>
      <th>Clasificacion</th>
      <th>Num. Jugadores</th>
      <th>Tamaño del juego</th>
      <th>Descripcion del juego</th>
      <th>Fecha de lanzamiento</th>
      <th>Cantidad</th>
      <th>Precio</th></tr>

    <?php
    $sql = "SELECT * FROM CATALOGO_JUEGOS, IDIOMA, PLATAFORMA,
    CATEGORIA, TIPO, DESARROLLADORA, CLASIFICACION WHERE
    CATALOGO_JUEGOS.JUEGO_ID_IDIOMA = IDIOMA.IDIOMA_ID AND
    CATALOGO_JUEGOS.JUEGO_ID_PLAT = PLATAFORMA.PLAT_ID AND
    CATALOGO_JUEGOS.JUEGO_ID_CAT = CATEGORIA.CAT_ID AND
    CATALOGO_JUEGOS.JUEGO_ID_TIPO = TIPO.TIPO_ID AND
    CATALOGO_JUEGOS.JUEGO_ID_DESA = DESARROLLADORA.DESA_ID AND
    CATALOGO_JUEGOS.JUEGO_ID_CLAS = CLASIFICACION.CLAS_ID
    ORDER BY JUEGOS_ID";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {?>
          <tr><td><?php echo $row["JUEGOS_ID"]; ?>  </td>
            <td> <?php echo $row["NOMBRE_JUEGO"]; ?>  </td>
            <td> <?php echo $row["LENGUAJE"]; ?> </td>
            <td> <?php echo $row["NOMBRE_PLAT"]; ?> </td>
            <td> <?php echo $row["NOMBRE_CAT"]; ?> </td>
            <td> <?php echo $row["NOMBRE_TIPO"]; ?> </td>
            <td> <?php echo $row["NOMBRE_DESA"]; ?> </td>
            <td> <?php echo $row["NOMBRE_CLAS"]; ?> </td>
            <td> <?php echo $row["NUM_JUGADORES"]; ?> </td>
            <td> <?php echo $row["TAMANO"]; ?> </td>
            <td> <?php echo $row["DESCRIPCION"]; ?> </td>
            <td> <?php echo $row["FECHA_LANZAMIENTO"]; ?> </td>
            <td> <?php echo $row["CANTIDAD_STOCK"]; ?> </td>
            <td> <?php echo $row["PRECIO"]; ?></td></tr><?php
      }
      ?></table><?php
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
    <p><a href="index.php"><input type="button" name="Regresar" value="Volver a Inicio"></a></p>
  </body>
</html>
