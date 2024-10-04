<?php 
if(isset($_POST['iniciar'])){
    if(isset($_POST["idioma"])){
        $idioma = $_POST["idioma"];
        setcookie("idioma",$idioma);
    }
    if(isset($_POST["tema"])){
        $tema = $_POST["tema"];
        setcookie("tema", $tema);
    }
    header("Location:guardar.php");
}
?>
<html>
<body>
    <form action="<?php "guardar.php"?>" method="POST">
        <p>CONFIGURACIÓN:</p>
        <p>Claro:</p><input type="radio" name="tema" value="claro">
        <p>Oscuro:</p><input type="radio" name="tema" value="oscuro">
        <br>
        <p>Español:</p><input type="radio" name="idioma" value="espanol">
        <p>Euskera:</p><input type="radio" name="idioma" value="euskera">
        <br><br>
        <input type="submit" name="iniciar">
    </form>
<?php 

?>
</body>
</html>