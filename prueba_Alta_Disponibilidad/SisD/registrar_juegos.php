<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrar un juego</title>
    <link rel="stylesheet" href="css/formularios.css">
  </head>
  <body>
    <div class="container mregister">
      <div id="registrar_juego">
        <h1>Registrar juego</h1>
        <form name="registerform" id="registerform" action="registrar_juegos.php" method="post">
          <p>Nombre del juego<br>
              <input type="text" name="game" id="game" class="input" size="32" value=""></p>
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
          <p>Fecha de lanzamiento<br>
              <input type="text" name="fecha_lan" id="fecha_lan" class="input" size="32" value=""></p>
          <p>Cantidad de unidades<br>
              <input type="text" name="stock" id="stock" class="input" size="32" value=""></p>
          <p>Precio<br>
              <input type="text" name="precio" id="precio" class="input" size="32s" value=""></p>
          Descripción del juego<br>
              <textarea name="desc" id="desc" class="input" size="60" rows="10" cols="40"></textarea>

          <p class="submit">
            <input type="submit" name="register" id="register" class="button" value="Registrar">
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
    $cont=$conn->query("SELECT * FROM CATALOGO_JUEGOS");
    $numrows = $cont->num_rows;

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

      if($numrows!=0){
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
            $conn->close();
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
            $conn->close();
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
            $conn->close();
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
            $conn->close();
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
            $conn->close();
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
            $conn->close();
        }

        $insertar = "INSERT INTO
        CATALOGO_JUEGOS VALUES('NULL', '$_game', '$_idioma_id', '$_plat_id', '$_cat_id', '$_tipo_id', '$_desa_id',
        '$_clas_id', '$_num_jug', '$_tamaño', '$_desc', '$_fecha_lan', '$_stock', '$_precio')";

        $comprueba = "SELECT * FROM CATALOGO_JUEGOS, IDIOMA, PLATAFORMA,
        CATEGORIA, TIPO, DESARROLLADORA, CLASIFICACION WHERE
        CATALOGO_JUEGOS.JUEGO_ID_IDIOMA = IDIOMA.IDIOMA_ID AND
        CATALOGO_JUEGOS.JUEGO_ID_PLAT = PLATAFORMA.PLAT_ID AND
        CATALOGO_JUEGOS.JUEGO_ID_CAT = CATEGORIA.CAT_ID AND
        CATALOGO_JUEGOS.JUEGO_ID_TIPO = TIPO.TIPO_ID AND
        CATALOGO_JUEGOS.JUEGO_ID_DESA = DESARROLLADORA.DESA_ID AND
        CATALOGO_JUEGOS.JUEGO_ID_CLAS = CLASIFICACION.CLAS_ID";

        if($conn->query($insertar) == TRUE){
          $message = "Juego registrado";
        } else if($conn->query($comprueba) == TRUE) {
          $message = "El juego ya existe!";
        } else if($conn->query($insertar) == FALSE || $conn->query($comprueba) == FALSE) {
          $message = "Error al ingresar datos del juego!". $conn->error;
        }
      }
    } else {
      $message = "Todos los campos no deben de estar vacios!";
    }
    ?>
    <?php
    if (!empty($message)) {?>
      <script>
        window.alert($message);
      </script><?php
    }
    ?>
  </body>
</html>
