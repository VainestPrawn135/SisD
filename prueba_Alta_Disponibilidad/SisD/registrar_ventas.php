<?php include 'database.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrar ventas</title>
    <link rel="stylesheet" href="css/formularios.css">
  </head>
  <body>
    <div class="container mregister">
      <div id="registrar_ventas">
        <h1>Registrar ventas</h1>
        <form name="registerform" id="registerform" action="registrar_ventas.php" method="post">
          <p>Se le vendió a<br>
              <input type="text" name="name_client" id="name_client" class="input" size="32" value=""></p>
          <p>Juego<br>
              <input type="text" name="game" id="game" class="input" size="32" value=""></p>
          <p>Atendió<br>
              <input type="text" name="vendor" id="vendor" class="input" size="32" value=""></p>

          <p class="submit">
            <input type="submit" name="register" id="register" class="button" value="Registrar Venta">
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
    $cont=$conn->query("SELECT * FROM VENTA");
    $numrows = $cont->num_rows;

    if(!empty($_POST['name_client']) && !empty($_POST['game']) && !empty($_POST['vendor'])) {
      $_name_client=$_POST['name_client'];
      $_game=$_POST['game'];
      $_vendor=$_POST['vendor'];

      if($numrows!=0){
        $id = $numrows + 1;
        $comprobar_nombre_cliente = "SELECT CLIENTE_ID, CLIENTE_USUARIO FROM CLIENTE WHERE CLIENTE_USUARIO = '$_name_client'";
        $comprobar_nombre_vendedor = "SELECT VENDEDOR_ID, VENDEDOR_USUARIO FROM VENDEDOR WHERE VENDEDOR_USUARIO = '$_vendor'";
        $comprobar_nombre_juego = "SELECT JUEGOS_ID, NOMBRE_JUEGO FROM CATALOGO_JUEGOS WHERE NOMBRE_JUEGO = '$_game'";

        $result_cliente=$conn->query($comprobar_nombre_cliente);
        if ($result_cliente->num_rows > 0) {
            while($row = $result_cliente->fetch_assoc()) {
              if ($_name_client == $row['CLIENTE_USUARIO']) {
                $_client_id = $row['CLIENTE_ID'];
              }
            }
        } else {
            echo "Error al ingresar nombre del cliente". $conn->error;
            $conn->close();
        }

        $result_vendedor=$conn->query($comprobar_nombre_vendedor);
        if ($result_vendedor->num_rows > 0) {
            // output data of each row
            while($row = $result_vendedor->fetch_assoc()) {
              if ($_vendor == $row['VENDEDOR_USUARIO']) {
                $_vendor_id = $row['VENDEDOR_ID'];
              }
            }
        } else {
            echo "Error al ingresar nombre del vendedor". $conn->error;
            $conn->close();
        }

        $result_juego=$conn->query($comprobar_nombre_juego);
        if ($result_juego->num_rows > 0) {
            // output data of each row
            while($row = $result_juego->fetch_assoc()) {
              if ($_game == $row['NOMBRE_JUEGO']) {
                $_game_id = $row['JUEGOS_ID'];
              }
            }
        } else {
            echo "Error al ingresar nombre del juego". $conn->error;
            $conn->close();
        }

        $fecha_actual = date("Y-m-d");
        $insertar = "INSERT INTO VENTA VALUES('$id', '$_client_id', '$_game_id', '$_vendor_id', '$fecha_actual')";

        if($conn->query($insertar) == TRUE){
          $message = "Transacción exitosa!";
        } else if($conn->query($insertar) == FALSE) {
          $message = "Error al ingresar datos de venta!". $conn->error;
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
