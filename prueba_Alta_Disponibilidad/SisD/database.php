<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "videojuegos";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8mb4");

    if (!$conn->set_charset("utf8mb4")) {
      printf("Error loading character set utf8: %s\n", $conn->error.__LINE__);
    } else {
      printf("Current character set: %s\n", $conn->character_set_name());
    }

    // Check connection
    if ($conn->connect_error) {
        die("¡Conexión Fallida!: " . $conn->connect_error.__LINE__);
    }
    echo "¡Conexión Exitosa!";
    $conn->close();
?>