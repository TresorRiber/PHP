<?php
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$contraseña = $_POST["contraseña"];
$repitacontra = $_POST["repitacontra"];



echo "Nombre: ".$nombre. " Email: ".$email." ";

if($contraseña==$repitacontra){
    echo "<br>";
    echo "La contraseña coincide";
}else{
    echo "<br>";
    echo "La contraseña no coincide";
}
?>