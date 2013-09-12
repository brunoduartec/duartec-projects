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
	$cpf = $_POST['cpf'];
	$email = $_POST['email'];
	$dataNascimento = $_POST['dataNascimento'];
	$cpfPai = $_POST['cpfPai'];
	$cpfMae = $_POST['cpfMae'];
	$telefone1 = $_POST['telefone1'];
	$telefone2 = $_POST['telefone2'];
	$telefone3 = $_POST['telefone3'];
	$endereco = $_POST['endereco'];
	$universidade = $_POST['universidade'];
	$curso = $_POST['curso'];
	$dataInicio = $_POST['dataInicio'];

	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	
	$escola = $_POST['escola'];
	$cursinho = $_POST['cursinho'];
	$motivo = $_POST['motivo'];

	
   // Caso todos os campos forem preenchidos, inclui a mensagem no
   // banco de dados. Caso isso não aconteça, gera uma mensagem de
   // erro que será impressa no browser mais a frente.
   if ($cpf and $nome and $email and $dataNascimento and $telefone1 and $telefone2 and $universidade and $curso) {
    
	//$conexao = mysql_connect("10.58.204.184","root","harpia");
    //mysql_select_db("test",$conexao);
	$conexao = mysql_connect("localhost","abraaoba_isemear","abraao123");
    mysql_select_db("abraaoba_isemear",$conexao);
	
	$oResult = mysql_query("SELECT * from candidato WHERE cadt_cpf=$cpf", $conexao);
	
	if (mysql_num_rows($oResult) > 0) {
		$err = "Já existem dados cadastrados para o CPF informado!";
	}else{
		$query = "INSERT INTO candidato(cadt_cpf, cadt_nome, cadt_email, cadt_dataNascimento, cadt_cpfPai, cadt_cpfMae, cadt_telefone1, cadt_telefone2, cadt_telefone3, cadt_endereco, cadt_universidade, cadt_curso, cadt_dataInicio, cadt_cidade, cadt_estado, cadt_escola, cadt_cursinho, cadt_motivo) values($cpf,'$nome','$email','$dataNascimento','$cpfPai','$cpfMae','$telefone1','$telefone2','$telefone3','$endereco','$universidade','$curso','$dataInicio','$cidade','$estado','$escola','$cursinho','$motivo')";
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