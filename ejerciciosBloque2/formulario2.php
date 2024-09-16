<?php
$num1 = $_POST["num1"];
$random = rand(1,5);
if($num1==$random){
    echo "Has acertado el numero es el mismo";
}else{
    echo "No has acertado el numero no es el mismo";
}
?>