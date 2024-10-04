<?php 
session_start();
if(isset($_POST['iniciar'])){
    $usuario = $_POST['usuario'];
    $contrasena = $_POST["contrasena"];
        if($usuario='admin' && $contrasena='1234'){
            $_SESSION['usuario']=$_POST['usuario'];
            header('Location: sesionIniciadaSession.php');
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
</body>
</html>