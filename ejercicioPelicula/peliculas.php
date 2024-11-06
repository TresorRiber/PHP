<?php
session_start();
echo "Hola " . $_SESSION['nombre'] . "<br>";
$servername = "db"; 
$username = "root"; 
$password = "root"; 
$dbname = "mydatabase"; 
$conn = new mysqli($servername, $username, $password, $dbname); 
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
} 


// sql to create table
$sqltable = "CREATE TABLE IF NOT EXISTS peliculaUsuarios (
    ISAN INT(11) NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    puntuacion VARCHAR(30) NOT NULL,
    ano INT(11),
    nombre_pelicula VARCHAR(30),
    PRIMARY KEY (ISAN),
    CONSTRAINT peliculaUsuarios_ibfk_1 FOREIGN KEY (nombre) REFERENCES usuarios (nombre) ON UPDATE CASCADE ON DELETE CASCADE 
)";
$conn->query($sqltable);

$nombre = $_SESSION['nombre'];
$sql = "SELECT * FROM peliculaUsuarios WHERE nombre='$nombre'"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) { 
    while ($row = $result->fetch_assoc()) { 
        echo "ISAN: " . $row["ISAN"] . " - Nombre Pelicula: " . $row["nombre_pelicula"] . " - Puntuacion: " . $row["puntuacion"] . " - Año: " . $row["ano"] . "<br>"; } 
    } else { 
        echo "No se encontraron resultados."; 
    }
$isanErr = $nombrePeliculaErr = $puntuacionErr = $anoErr = "";
$isan = $nombrePelicula = $puntuacion = $ano = "";

$patternNombre = '/^\d{8}$/';

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $verificador = 0; 
    //DELETE
    if(empty($_POST["nombrePelicula"]) && !empty($_POST["isan"])){
            $isan = $_POST["isan"]; 
            $sql = "DELETE FROM peliculaUsuarios WHERE isan = '$isan'"; 
            if($conn->query($sql)){ 
            echo "Pelicula eliminada"; 
        }else{ 
            echo "Error al eliminar pelicula"; 
        } 
    }else{
        //INSERT y UPDATE
        if (empty($_POST["isan"])) {
            $isanErr = "Requiere ISAN";
        } elseif (!preg_match($patternNombre, $_POST["isan"])) {
            $isanErr = "ISAN no válido";
        } else {
            $isan = ($_POST["isan"]);
            $verificador++;
        }

        if (empty($_POST["nombrePelicula"])) {
            $nombrePeliculaErr = "Requiere Nombre";
        } else {
            $nombrePelicula = ($_POST["nombrePelicula"]);
            $verificador++;
        }

        if (empty($_POST["puntuacion"])) {
            $puntuacionErr = "Requiere Puntuación";
        } else {
            $puntuacion = ($_POST["puntuacion"]);
            $verificador++;
        }

        if (empty($_POST["ano"])) {
            $anoErr = "Requiere Año";
        } else {
                $ano = ($_POST["ano"]);
                $verificador++;
            }

        if ($verificador == 4) {
            $select = "SELECT * FROM peliculaUsuarios WHERE ISAN = '$isan';"; 
            $result = $conn->query($select); 
            if($result->num_rows>0){ 
                $update = "UPDATE peliculaUsuarios SET nombre_pelicula = '$nombrePelicula' , puntuacion = '$puntuacion' , ano = '$ano' WHERE isan = '$isan';"; 
                $conn->query($update); 
                echo "Actualizada la pelicula";
            }else{
                $sql ="INSERT INTO peliculaUsuarios (nombre, ISAN, nombre_pelicula, puntuacion, ano) VALUES ('$nombre', '$isan', '$nombrePelicula', '$puntuacion', '$ano')"; 
                if ($conn->query($sql)) { 
                    echo "Registro insertado correctamente"; 
                } else { 
                    echo "Error al insertar: " . $conn->error; 
                } 
            } 
        } else { 
            echo "Algun dato incorrecto. Verifique los errores: "; 
            echo $isanErr . " " . $nombrePeliculaErr . " " . $puntuacionErr . " " . $anoErr; 
        } 
    } 
    $conn->close(); 
} 

?>
<html>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    ISAN: <input type="text" name="isan">
    <span class="error">* <?php echo $isanErr; ?>
    <br><br>
    Nombre Pelicula:
    <input type="text" name="nombrePelicula">
    <span class="error">* <?php echo $nombrePeliculaErr; ?></span>
    <br><br>
    Puntuacion:
    <select name="puntuacion">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <span class="error">* <?php echo $puntuacionErr; ?></span>
    <br><br>
    Año:
    <input type="text" name="ano">
    <span class="error">* <?php echo $anoErr; ?></span>
    <br><br>
    <input type="submit" name="submit">
</form>

</html>
