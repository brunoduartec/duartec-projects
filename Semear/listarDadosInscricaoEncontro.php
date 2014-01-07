<html>

<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>
<body>
Inscritos Semeares 2013

<table border="1">
<tr>
<th>Nr</th>
<th>nome</th>
<th>email</th>
<th>telefone</th>
<th>instituicao</th>
<th>inscricao</th>
<th>motivo</th>
</tr>

<?  
	//$conexao = mysql_connect("10.58.204.184","root","harpia");
    //mysql_select_db("test",$conexao);
	$conexao = mysql_connect("localhost","abraaoba_isemear","abraao123");
    mysql_select_db("abraaoba_isemear",$conexao);
	
	
	$oResultCount = mysql_query("SELECT count(*) as count from encontro where year(enct_dt_inscricao) = 2013 order by enct_nome ", $conexao);
	$rowcount = mysql_fetch_array($oResultCount);
	echo "<tr><td>Inscritos:".$rowcount['count']."</td></tr>";
	
	
	$oResult = mysql_query("SELECT * from encontro where year(enct_dt_inscricao) = 2013 order by enct_nome", $conexao);
	
	$idx = 1;

	while($row = mysql_fetch_array($oResult))
  {
	echo "<tr><td>" . $idx . "</td><td>" .$row['enct_nome'] . "</td><td>" .$row['enct_email']. "</td><td>" .$row['enct_telefone']. "</td><td>" .$row['enct_instituicao']. "</td><td>" .$row['enct_dt_inscricao']."</td><td>" .$row['enct_motivo']."</td></tr>";
	$idx++;  
}
   
   mysql_close($conexao);

?>

</table>
<br><br>
</body>
</html>
