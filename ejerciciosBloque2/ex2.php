
<?php
$i=0;
$personas = array (
  array("Jon",20,"Bilbo"),
  array("Ane",32,"Donosti"),
  array("Urko",14,"Gasteiz"),
  array("Miren",23,"Donosti")
);

echo "<table border='1' style= 'border-collapse: collapse'>";
echo "<tr>";
    echo "<td>Nombre</td>";
    echo "<td>Edad</td>";
    echo "<td>Ciudad</td>";
echo "</tr>";

while($i<count($personas)){
    $i++;
    echo "<tr>";
    echo "<td>".$personas[$i][0]."</td>";
    echo "<td>".$personas[$i][1]."</td>";
    echo "<td>".$personas[$i][2]."</td>";
    echo "</tr>";
}
echo "</table>";
?>
