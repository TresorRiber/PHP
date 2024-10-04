<?php 
session_start();
if(isset($_POST['reiniciar'])){
        session_unset();
    }
if(isset($_SESSION["usuario"])){
    $contador= $_SESSION["usuario"]+1;
}else{
    $contador=1;
}
$_SESSION["usuario"] = $contador;




?>
<html>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
        <input type="submit" name="reiniciar" value="Reiniciar contador">
    </form>
<?php

    if($contador>1){
        echo "Has visitado la pagina: ".$contador. " veces.";
    }else{
        echo "La primera visita";
    }
?>
</body>
</html>