<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ingresando</title>
  </head>
  <body>
    <?php
    function get_real_ip()
    {
      if (isset($_SERVER["HTTP_CLIENT_IP"])) {
        return $_SERVER["HTTP_CLIENT_IP"];
      }

      elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
      }

      elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
        return $_SERVER["HTTP_X_FORWARDED"];
      }

      elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
        return $_SERVER["HTTP_FORWARDED_FOR"];
      }

      elseif (isset($_SERVER["HTTP_FORWARDED"])) {
        return $_SERVER["HTTP_FORWARDED"];
      }

      else {
        return $_SERVER["REMOTE_ADDR"];
      }

    }

    if (!empty(get_real_ip())) {
      echo "Conectando a: ".gethostname();
      echo "<br><br>";
      echo "Dirección IP: ".get_real_ip();
      header("Refresh: 1; url=index.html");
    }

    else {
      echo "IP no encontrada";
      ?><p><a href="index.html"><input type="button" name="Refresh" value="Volver a cargar"></a></p><?php
    }
     ?>
  </body>
</html>
