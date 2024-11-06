<html>
<body>
    <?php
        $nombreErr = $emailErr = $contraseñaErr = "";
        $nombre = $email = $contraseña = "";
        
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "mydatabase";

        $conn = new mysqli($servername, $username, $password);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
         // Create database
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $conn->error;
        }
        $conn->select_db($dbname);
        // sql to create table
        $sqltable = "CREATE TABLE IF NOT EXISTS usuarios (
            nombre VARCHAR(30),
            contrasena VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            PRIMARY KEY (nombre)
            )";
        if ($conn->query($sqltable) === TRUE) {
            echo "Table usuarios created successfully";
          } else {
            echo "Error creating table: " . $conn->error;
          }

        
    ?>
    
    <?php 
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $sqlemail = "SELECT email FROM usuarios WHERE email='$email'";
        $result = $conn->query($sqlemail);
        if ($result->num_rows > 0) {
            echo "Ya existe ese email";
        }else{
        $contrasena = $_POST["contrasena"];
        $sql = "INSERT INTO usuarios (nombre, email, contrasena)
        VALUES ('$nombre', '$email', '$contrasena')";

        if ($conn->query($sql) === TRUE) {
        echo "Registrado correctamente";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    ?>
</body>
</html>