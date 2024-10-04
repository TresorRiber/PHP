<?php 
if(isset($_POST['iniciar'])){
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

if($usuario == "admin" && $contrasena == "1234"){
    setcookie("usuario", $usuario);
    header("Location: sesionIniciadaCookie.php");
}else{
    echo "Error al inicio de sesión";
}
}
?>
<html>
<body>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
        <p>Usuario:</p><input type="text" name="usuario">
        <p>Contraseña:</p><input type="password" name="contrasena">
        <input type="submit" name="iniciar">
    </form>
<?php 

?>
</body>
</html>