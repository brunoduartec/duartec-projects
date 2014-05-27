<?
if (getenv("REQUEST_METHOD") == "POST") 
{

	$email = $_POST['email'];
	$conexao = mysql_connect("localhost","abraaoba_isemear","abraao123");
    mysql_select_db("abraaoba_isemear",$conexao);
	
	$oResult = mysql_query("SELECT * from newsletter WHERE (email=$email)", $conexao);
	
	if (mysql_num_rows($oResult) == 0)
	{
	
		$query = "INSERT INTO newsletter(email) values('$email')";
		mysql_query($query,$conexao);
	
	
	}
	
mysql_close($conexao);
	
}

?>