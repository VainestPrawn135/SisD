<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modificar datos de un juego</title>
    <link rel="stylesheet" href="css/formularios.css">
  </head>
  <body>
    <div class="container mregister">
      <div id="registrar_juego">
        <h1>Ingresa nombre del juego</h1>
        <form name="registerform" id="registerform" action="modificar_juegos.php" method="post">
          <p>Nombre del juego<br>
              <input type="text" name="game" id="game" class="input" size="32" value=""></p>
          <h1>Ingresa los datos a modificar</h1>
          <p>Idioma<br>
              <input type="text" name="idioma" id="idioma" class="input" size="32" value=""></p>
          <p>Plataforma<br>
              <input type="text" name="plat" id="plat" class="input" size="32" value=""></p>
          <p>Categoria<br>
              <input type="text" name="cat" id="cat" class="input" size="32" value=""></p>
          <p>Tipo de juego<br>
              <input type="text" name="tipo" id="tipo" class="input" size="32" value=""></p>
          <p>Desarrolladora del juego<br>
              <input type="text" name="desa" id="desa" class="input" size="32" value=""></p>
          <p>Clasificación del juego<br>
              <input type="text" name="clas" id="clas" class="input" size="32" value=""></p>
          <p>Número de jugadores<br>
              <input type="text" name="num_jug" id="num_jug" class="input" size="32" value=""></p>
          <p>Tamaño del juego<br>
              <input type="text" name="tamaño" id="tamaño" class="input" size="32" value=""></p>
          <p>Descripción del juego<br>
              <input type="text" name="desc" id="desc" class="input" size="60" value=""></p>
          <p>Fecha de lanzamiento<br>
              <input type="text" name="fecha_lan" id="fecha_lan" class="input" size="32" value=""></p>
          <p>Cantidad de unidades<br>
              <input type="text" name="stock" id="stock" class="input" size="32" value=""></p>
          <p>Precio<br>
              <input type="text" name="precio" id="precio" class="input" size="32s" value=""></p>

          <p class="submit">
            <input type="submit" name="register" id="register" class="button" value="Modificar">
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

    if(!empty($_POST['game']) && !empty($_POST['idioma']) && !empty($_POST['plat']) && !empty($_POST['cat'])
    && !empty($_POST['tipo']) && !empty($_POST['desa']) && !empty($_POST['clas'])
    && !empty($_POST['num_jug']) && !empty($_POST['tamaño']) && !empty($_POST['desc'])
    && !empty($_POST['fecha_lan']) && !empty($_POST['stock']) && !empty($_POST['precio'])) {
      $_game=$_POST['game'];
      $_idioma=$_POST['idioma'];
      $_plat=$_POST['plat'];
      $_cat=$_POST['cat'];
      $_tipo=$_POST['tipo'];
      $_desa=$_POST['desa'];
      $_clas=$_POST['clas'];
      $_num_jug=$_POST['num_jug'];
      $_tamaño=$_POST['tamaño'];
      $_desc=$_POST['desc'];
      $_fecha_lan=$_POST['fecha_lan'];
      $_stock=$_POST['stock'];
      $_precio=$_POST['precio'];

      $comprobar_id = "SELECT JUEGOS_ID FROM CATALOGO_JUEGOS WHERE NOMBRE_JUEGO = '$_game'";

      $result_id = $conn->query($comprobar_id);
      if ($result_id->num_rows > 0) {
          while($row = $result_id->fetch_assoc()) {
            $_id_game = $row["JUEGOS_ID"];
        }
      } else {
          echo "No existe el juego!";
      }

      $comprobar_idioma = "SELECT * FROM IDIOMA WHERE LENGUAJE = '$_idioma'";
      $comprobar_plataforma = "SELECT * FROM PLATAFORMA WHERE NOMBRE_PLAT = '$_plat'";
      $comprobar_categoria = "SELECT * FROM CATEGORIA WHERE NOMBRE_CAT = '$_cat'";
      $comprobar_tipo = "SELECT * FROM TIPO WHERE NOMBRE_TIPO = '$_tipo'";
      $comprobar_desarrolladora = "SELECT * FROM DESARROLLADORA WHERE NOMBRE_DESA = '$_desa'";
      $comprobar_clasificacion = "SELECT * FROM CLASIFICACION WHERE NOMBRE_CLAS = '$_clas'";

      $result_idioma=$conn->query($comprobar_idioma);
      if ($result_idioma->num_rows > 0) {
          while($row = $result_idioma->fetch_assoc()) {
            if ($_idioma == $row['LENGUAJE']) {
              $_idioma_id = $row['IDIOMA_ID'];
            }
          }
      } else {
          echo "Error al ingresar nombre del idioma". $conn->error;
      }

      $result_plataforma=$conn->query($comprobar_plataforma);
      if ($result_plataforma->num_rows > 0) {
          while($row = $result_plataforma->fetch_assoc()) {
            if ($_plat == $row['NOMBRE_PLAT']) {
              $_plat_id = $row['PLAT_ID'];
            }
          }
      } else {
          echo "Error al ingresar nombre de la plataforma". $conn->error;
      }

      $result_categoria=$conn->query($comprobar_categoria);
      if ($result_categoria->num_rows > 0) {
          while($row = $result_categoria->fetch_assoc()) {
            if ($_cat == $row['NOMBRE_CAT']) {
              $_cat_id = $row['CAT_ID'];
            }
          }
      } else {
          echo "Error al ingresar nombre de categoria". $conn->error;
      }

      $result_tipo=$conn->query($comprobar_tipo);
      if ($result_tipo->num_rows > 0) {
          while($row = $result_tipo->fetch_assoc()) {
            if ($_tipo == $row['NOMBRE_TIPO']) {
              $_tipo_id = $row['TIPO_ID'];
            }
          }
      } else {
          echo "Error al ingresar nombre del tipo". $conn->error;
      }

      $result_desarrolladora=$conn->query($comprobar_desarrolladora);
      if ($result_desarrolladora->num_rows > 0) {
          while($row = $result_desarrolladora->fetch_assoc()) {
            if ($_desa == $row['NOMBRE_DESA']) {
              $_desa_id = $row['DESA_ID'];
            }
          }
      } else {
          echo "Error al ingresar nombre de la desarrolladora". $conn->error;
      }

      $result_clasificacion=$conn->query($comprobar_clasificacion);
      if ($result_clasificacion->num_rows > 0) {
          while($row = $result_clasificacion->fetch_assoc()) {
            if ($_clas == $row['NOMBRE_CLAS']) {
              $_clas_id = $row['CLAS_ID'];
            }
          }
      } else {
          echo "Error al ingresar nombre de la clasificacion". $conn->error;
      }

      $modificar = "UPDATE CATALOGO_JUEGOS SET NOMBRE_JUEGO = '$_game', JUEGO_ID_IDIOMA = '$_idioma_id'
                    ,JUEGO_ID_PLAT = '$_plat_id', JUEGO_ID_CAT = '$_cat_id', JUEGO_ID_TIPO = '$_tipo_id'
                    ,JUEGO_ID_DESA = '$_desa_id', JUEGO_ID_CLAS = '$_clas_id', NUM_JUGADORES = '$_num_jug'
                    ,TAMANO = '$_tamaño', DESCRIPCION = '$_desc', FECHA_LANZAMIENTO = '$_fecha_lan'
                    ,CANTIDAD_STOCK = '$_stock', PRECIO = '$_precio' WHERE JUEGOS_ID = '$_id_game'";

      if($conn->query($modificar) == TRUE && $conn->query($comprobar_id) == TRUE){
        $message = "Juego modificado!";
      } else if($conn->query($modificar) == FALSE || $conn->query($comprobar_id) == FALSE) {
        $message = "El juego no existe o se ingresaron mal los datos!". $conn->error;
      }
    } else {
      echo "Todos los campos no deben estar vacíos";
    }
    if (!empty($message)) {
      echo $message;
    }
    $conn->close();
    ?>
  </body>
</html>
