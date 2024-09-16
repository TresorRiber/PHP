
<?php
$num=2;

echo "<table border= '1px' style= 'border-collapse: collapse'>";
for ($i=1;$i<10;$i++) {
  echo "<tr>";
    echo "<td> $num x $i </td>";
    $res = $num*$i;
    echo "<td> $res </td>";
  echo "</tr>";
}
echo "</table>";

?>
