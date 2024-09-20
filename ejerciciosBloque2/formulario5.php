<?php
$usuario = $_POST["usuario"];
$valoracion = $_POST["valoracion"];
$comentario = $_POST["comentario"];

class Usuario{
    private $usuario;
    private $valoracion;
    private $comentario;

    function __construct($usuario, $valoracion, $comentario){
        $this->usuario = $usuario;
        $this->valoracion = $valoracion;
        $this->comentario = $comentario;
    }

    function toString(){
        echo "Usuario: {$this->usuario} <br> Valoracion: {$this->valoracion} <br> Comentario: {$this->comentario}";
    }

}
$usuario1 = new Usuario($usuario, $valoracion, $comentario);
$usuario1->toString();

?>