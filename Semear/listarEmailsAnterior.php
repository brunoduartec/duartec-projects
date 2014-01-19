<html>

<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
Inscritos Semeares 2013

<table border="1">
<tr>
<th>Nr</th>
<th>nome</th>
<th>email</th>
</tr>

<?  
	//$conexao = mysql_connect("10.58.204.184","root","harpia");
    //mysql_select_db("test",$conexao);
	$conexao = mysql_connect("localhost","abraaoba_isemear","abraao123");
    mysql_select_db("abraaoba_isemear",$conexao);
	
	
	$oResultCount = mysql_query("SELECT count(*) as count from pes_encontro", $conexao);
	$rowcount = mysql_fetch_array($oResultCount);
	echo "<tr><td>Inscritos:".$rowcount['count']."</td></tr>";
	
	
	$oResult = mysql_query("SELECT * from pes_encontro", $conexao);
	
	$idx = 1;

	while($row = mysql_fetch_array($oResult))
  {
	echo "<tr><td>" . $idx . "</td><td>" .$row['penct_nome'] . "</td><td>" .$row['penct_email']."</td></tr>";
	$idx++;  
}
   
   mysql_close($conexao);

?>

</table>
<br><br>
</body>
</html>
