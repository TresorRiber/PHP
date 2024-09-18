<?php
$texto = $_POST["texto"];
$fecha = array();
$pattern = "/\b([0-2][0-9]|(3)[0-1])\/(0[1-9]|1[0-2])\/([0-9]{4})\b/";
preg_match_all($pattern, $texto, $fecha);

print_r($fecha[0]);
?>