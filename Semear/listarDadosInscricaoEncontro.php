<html>

<head>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
Inscritos Semeares 2013

<table border="1">
<tr>
<th>Nr</th>
<th>enct_nome</th>
<th>enct_email</th>
<th>enct_telefone</th>
<th>enct_instituicao</th>
<th>enct_dt_inscricao</th>
</tr>

<?  
	//$conexao = mysql_connect("10.58.204.184","root","harpia");
    //mysql_select_db("test",$conexao);
	$conexao = mysql_connect("localhost","abraaoba_isemear","abraao123");
    mysql_select_db("abraaoba_isemear",$conexao);
	
	$oResult = mysql_query("SELECT * from encontro where year(enct_dt_inscricao) = 2013", $conexao);
	
	$idx = 1;

	while($row = mysql_fetch_array($oResult))
  {
	echo "<tr><td>" . $idx . "</td><td>" .sprintf('%011s',$row['enct_nome']) . "</td><td>" .sprintf('%011s',$row['enct_email']). "</td><td>" .sprintf('%011s',$row['enct_telefone']). "</td><td>" .sprintf('%011s',$row['enct_instituicao']). "</td><td>" .sprintf('%011s',$row['enct_dt_inscricao'])."</td></tr>";
	$idx++;  
}
   
   mysql_close($conexao);

?>

</table>
<br><br>
</body>
</html>
