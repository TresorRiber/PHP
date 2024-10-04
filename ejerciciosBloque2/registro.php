<html>
<body>
    <?php
        $nombreErr = $emailErr = $contraseñaErr = "";
        $nombre = $email = $contraseña = "";
        
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "mydatabase";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }else{
        echo "Connected successfully";
        }
    
    ?>
    
    <?php 
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $contrasena = $_POST["contrasena"];
        $sql = "INSERT INTO usuarios (nombre, email, contrasena)
        VALUES ('$nombre', '$email', '$contrasena')";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    ?>
</body>
</html>