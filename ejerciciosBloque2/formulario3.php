<?php
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$contraseña = $_POST["contraseña"];
$repitacontra = $_POST["repitacontra"];

class Usuario{
    private $nombre;
    private $email;
    private $contraseña;
    private $repitacontra;

    function __construct($nombre, $email, $contraseña, $repitacontra){
        $this->nombre = $nombre;
        $this->email = $email;
        $this->contraseña = $contraseña;
        $this->repitacontra = $repitacontra;
    }
    function getNombre(){
        return $this->nombre;
    }
    function getEmail(){
        return $this->email;
    }
    function getContraseña(){
        return $this->contraseña;
    }
    function getRepitacontra(){
        return $this->repitacontra;
    }
}

$usuario1 = new Usuario($nombre, $email, $contraseña, $repitacontra);
echo "Nombre: ".$usuario1->getNombre(). "<br> Email: ".$usuario1->getEmail();

if($usuario1->getContraseña()==$usuario1->getRepitacontra()){
    echo "<br>";
    echo "La contraseña coincide";
}else{
    echo "<br>";
    echo "La contraseña no coincide";
}
?>