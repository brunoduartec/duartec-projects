<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link href="style/960.css" media="screen" rel="stylesheet" type="text/css"/>
        <link href="style/style.css" media="screen" rel="stylesheet" type="text/css"/>
		
        <title></title>
    </head>
    <body style="background: url(images/background.png) repeat-x 0 -197px;">
   

<?
if (getenv("REQUEST_METHOD") == "POST") {
   // Configura as variáveis do método POST para virarem variáveis
   // "normais" do PHP (Requer apenas nas versões do PHP acima da 4.1)
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$escola = $_POST['escola'];
	
	

	
   // Caso todos os campos forem preenchidos, inclui a mensagem no
   // banco de dados. Caso isso não aconteça, gera uma mensagem de
   // erro que será impressa no browser mais a frente.
   if ($nome and $email and $telefone and $escola) {
    
	//$conexao = mysql_connect("10.58.204.184","root","harpia");
    //mysql_select_db("test",$conexao);
	$conexao = mysql_connect("localhost","abraaoba_isemear","abraao123");
    mysql_select_db("abraaoba_isemear",$conexao);
	
	
	{
		$query = "INSERT INTO encontro(enct_nome,enct_email,enct_telefone,enct_instituicao) values('$nome','$email','$telefone','$escola')";
		mysql_query($query,$conexao);
    
		$err = "Dados Cadastrados com sucesso!";	
	}
   } else {
      $err = "Preencha todos os campos obrigatórios!";
   }
   
   mysql_close($conexao);
}

?>
<h1>Resultado:</h1>
<p.page>
<?=$err
?>
</p>

    </body>
    
</html>