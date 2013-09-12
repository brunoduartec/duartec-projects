<html>
<body>
<table border="1">
<tr><th>Nr</th><th>cadt_cpf</th><th> cadt_nome</th><th> cadt_email</th><th> cadt_dataNascimento</th><th> cadt_telefone1</th><th> cadt_telefone2</th><th> cadt_telefone3</th><th> cadt_endereco</th><th> cadt_universidade</th><th> cadt_curso</th><th> cadt_dataInicio</th><th> cadt_cidade</th><th> cadt_estado</th><th> cadt_escola</th><th> cadt_cursinho</th><th> cadt_motivo</th><th> cadt_dt_inscricao</th></tr>

<?  
	//$conexao = mysql_connect("10.58.204.184","root","harpia");
    //mysql_select_db("test",$conexao);
	$conexao = mysql_connect("localhost","abraaoba_isemear","abraao123");
    mysql_select_db("abraaoba_isemear",$conexao);
	
	$oResult = mysql_query("SELECT * from candidato", $conexao);
	
	$idx = 1;

	while($row = mysql_fetch_array($oResult))
  {
	echo "<tr><td>" . $idx . "</td><td>" . sprintf('%011s',$row['cadt_cpf']) . "</td><td>" .  $row['cadt_nome'] . "</td><td>" .  $row['cadt_email'] . "</td><td>" .  $row['cadt_dataNascimento'] . "</td><td>" .  $row['cadt_telefone1'] . "</td><td>" .  $row['cadt_telefone2'] . "</td><td>" .  $row['cadt_telefone3'] . "</td><td>" .  $row['cadt_endereco'] . "</td><td>" .  $row['cadt_universidade'] . "</td><td>" .  $row['cadt_curso'] . "</td><td>" .  $row['cadt_dataInicio'] . "</td><td>" .  $row['cadt_cidade'] . "</td><td>" . $row['cadt_estado'] . "</td><td>" .  $row['cadt_escola'] . "</td><td>" .  $row['cadt_cursinho'] . "</td><td>" .  $row['cadt_motivo'] . "</td><td>" .  $row['cadt_dt_inscricao'] . "</td></tr>";
	$idx++;  
}
   
   mysql_close($conexao);

?>

</table>
<br><br>
<form method="post" name="dados" action="limparDadosInscricao.php" onSubmit="return perguntaLimpar();" >
<table border="0">
<tr>
   <td>Senha:<input type="password" size="10" name="senha">&nbsp;<input type="submit" value="Limpar dados"></td>
</tr>

</table>
</form>
</body>
</html>
