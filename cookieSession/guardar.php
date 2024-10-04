<?php 
if($_COOKIE["tema"] == "oscuro"){
    echo '<body style="background-color:black">';
    echo '<font color="white">';
}
if($_COOKIE["idioma"] == "espanol"){
    echo "Bienvenido";
}else{
    echo "Ongi Etorri";
}

?>
</html>