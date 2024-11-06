<?php
    session_start();
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "mydatabase";

     $conn = new mysqli($servername, $username, $password, $dbname);

    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    // // Create database
    // $sql = "CREATE DATABASE IF NOT EXISTS mydatabase";
    // $conn->query($sql);
        
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $nombre = $_POST["nombre"];
        $contrasena = $_POST["contrasena"];
    }
    $sql= "SELECT nombre FROM usuarios WHERE nombre='$nombre' AND contrasena='$contrasena'";
    //$sql->bind_param("ss", $email, $contrasena);
    //$sql->execute();
    //$result = $sql->get_result();
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        
        header("Location: peliculas.php");
        $row = $result->fetch_assoc();
        $_SESSION['nombre']=$row['nombre'];
        
    } else {
        echo "No se encontraron resultados.";
    }
    
?>
