<html>
<head>

<title>Untitled 1</title>
</head>

<body>

<?php
$dbname='abraaoba_isemear';
$usuario='abraaoba_fortal';
$password='isemear13';

$id = mysql_connect('localhost',$usuario,$password);

$con=mysql_select_db($dbname,$id);

mysql_select_db($banco); /*seleciona o banco a ser usado*/

$sql = "select * from palestrante";

//ALTER TABLE tablename AUTO_INCREMENT = 1

$res = mysql_query($sql); 


while($escrever=mysql_fetch_array($res))
{

echo "<table>";
echo "<tr>";
echo "<td>".$escrever['name']."</td>";
echo "<td><img src=\"images\\".$escrever['image']. "\" /></td>";

echo "<tr><td>".$escrever['info']."</td></tr>";



echo "</tr>";
echo "</table>";
}

?>



</body>

</html>
