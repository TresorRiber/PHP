<?php
    session_start();
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "mydatabase";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email = $_POST["email"];
        $contrasena = $_POST["contrasena"];
    }
    $sql= "SELECT nombre FROM usuarios WHERE email='$email' AND contrasena='$contrasena'";
    //$sql->bind_param("ss", $email, $contrasena);
    //$sql->execute();
    //$result = $sql->get_result();
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        
        header("Location: index.php");
        $row = $result->fetch_assoc();
        $_SESSION['nombre']=$row['nombre'];
        
    } else {
        echo "No se encontraron resultados.";
    }
    $conn->close();
?>
