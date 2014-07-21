<html>

<head>

</head>
<body>
Inscritos Semeares 2014

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
	
	$StartSubscribe = '2014-05-11';
	$Registrations = '400';
	
//verificando se j&#65533; estouraram as inscri&#65533;&#65533;es
	//$oResult = mysql_query("SELECT * from encontro WHERE (enct_dt_registration >= "+StartSubscribe+ ")", $conexao);
//$oResult = mysql_query("SELECT distinct `enct_name`, `enct_email`, `enct_phone`, `enct_institution`, `enct_dt_registration`, `enct_reason`, `enct_age`, `enct_gender`, `enct_additional`, `enct_certification` FROM `encontro` WHERE enct_dt_registration >='2014-05-11' ORDER BY 'enct_dt_registration'",$conexao);
$oResult = mysql_query("SELECT distinct `enct_name`, `enct_email`,`enct_institution`  FROM `encontro` WHERE enct_dt_registration >='2014-05-11' ORDER BY `enct_name` ASC",$conexao);

	
	$oResultCount = mysql_query("SELECT count(distinct `enct_name`, `enct_email`) as count FROM `encontro` WHERE enct_dt_registration >='2014-05-11'",$conexao);

	$rowcount = mysql_fetch_array($oResultCount);
	echo "<tr><td>Inscritos:".$rowcount['count']."</td></tr>";
	
	
//	$oResult = mysql_query("SELECT * from encontro where year(enct_dt_inscricao) = 2013 order by enct_nome", $conexao);
	
	$idx = 1;

	while($row = mysql_fetch_array($oResult))
  {
	echo "<tr><td>" . $idx . "</td><td>" .$row['enct_name'] . "</td><td>" .$row['enct_email']. "</td><td>" .$row['enct_phone']. "</td><td>" .$row['enct_institution']. "</td><td>" .$row['enct_dt_registration']."</td><td>" .$row['enct_reason']."</td></tr>";
	$idx++;  
}
   
   mysql_close($conexao);

?>

</table>
<br><br>
</body>
</html>
