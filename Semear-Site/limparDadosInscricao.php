<html>

<body>
<?
if (getenv("REQUEST_METHOD") == "POST") {
   // Configura as variáveis do método POST para virarem variáveis
   // "normais" do PHP (Requer apenas nas versões do PHP acima da 4.1)
	$senha = $_POST['senha'];
	if ($senha == "Mathias!2013") {
    
		$conexao = mysql_connect("localhost","abraaoba_isemear","abraao123");
		mysql_select_db("abraaoba_isemear",$conexao);
	
		$query = "DELETE FROM  candidato";
		mysql_query($query,$conexao);
    
		$err = "Todos os dados foram removidos com sucesso.";

		mysql_close($conexao);
		
   } else {
      $err = "Senha incorreta!";
   }
   
   
}

?>
	
Resultado:
<?=$err
?>
    </body>
    
</html>