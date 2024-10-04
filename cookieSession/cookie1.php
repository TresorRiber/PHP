<?php 
if(isset($_COOKIE["usuario"])){
    $contador= $_COOKIE["usuario"]+1;
}else{
    $contador=1;
}
setcookie("usuario" , $contador);

if(isset($_POST['reiniciar'])){
        setcookie('usuario','');
        $contador =1;
        header("Refresh:0");
    }
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