<?php
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$numTelefono = $_POST["numTelefono"];

class Usuario{
    private $nombre;
    private $apellido;
    private $email;
    private $numTelefono;

    function __construct($nombre, $apellido, $email, $numTelefono){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->numTelefono = $numTelefono;
    }

    function __toString(){
        echo "Nombre: {$this->nombre} <br> Apellido: {$this->apellido} <br> Email: {$this->email} <br> Telefono: {$this->numTelefono}";
    }

}

$usuario1 = new Usuario($nombre, $apellido, $email, $numTelefono);
$usuario1->__toString();
?>