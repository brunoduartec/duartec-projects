<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

<!-- #BeginTemplate "../master.dwt" -->

<head>
<!-- #BeginEditable "doctitle" -->
<title>HomePrograma&#65533;&#65533;oFacilitadoresSobr</title>
<!-- #EndEditable -->
<link href="../styles/style1.css" media="screen" rel="stylesheet" title="CSS" type="text/css" />
</head>

<body>

<!-- Begin Container -->
<div id="container">
	<!-- Begin Masthead -->
	<div id="masthead">
<table>
<tr>
<td><img alt="" src="../images/logo-2014.png"/></td>
<td><img src="../images/tema.png"/></td>
</tr>
</table>
		

	</div>
	<!-- End Masthead -->
	<!-- Begin Navigation -->
	
	<div id="navigation">
		<ul>
			<li><a href="../default.htm">Home</a></li>
			<li><a href="../programacao/default.php">Programação</a></li>
			<li><a href="../facilitadores/default.php">Facilitadores</a></li>
			<li><a href="../sobre/default.php">Sobre o Instituto</a></li>
			<li><a href="../imprensa/default.php">Na imprensa</a></li>
			<li><a href="../galeria/default.php">Galeria</a></li>
			<li><a href="default.php">Inscrições</a></li>
			<li><a href="../local/default.php">Local</a></li>
			<li><a href="../contato/default.php">Contato</a></li>
		</ul>
	</div>
	
	
	<!-- End Navigation -->
	<!-- Begin Page Content -->
	<div id="page_content">
		<!-- Begin Left Column -->
		<div id="column_l">
			<!-- #BeginEditable "content" -->
			<h2>Inscrição</h2>
		<?
error_reporting(E_ERROR | E_PARSE);
if (getenv("REQUEST_METHOD") == "POST") {
   // Configura as vari&#65533;veis do m&#65533;todo POST para virarem vari&#65533;veis
   // "normais" do PHP (Requer apenas nas vers&#65533;es do PHP acima da 4.1)
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$escola = $_POST['escola'];
	$motivo = $_POST['motivo'];
	$motivo2= $_POST['motivo2'];
	
	$age = 	$_POST['age'];
	$gender = 	$_POST['gender'];

	
   // Caso todos os campos forem preenchidos, inclui a mensagem no
   // banco de dados. Caso isso n&#65533;o aconte&#65533;a, gera uma mensagem de
   // erro que ser&#65533; impressa no browser mais a frente.
   if ($nome and $email) {
    
	//$conexao = mysql_connect("10.58.204.184","root","harpia");
    //mysql_select_db("test",$conexao);
	$conexao = mysql_connect("localhost","abraaoba_isemear","abraao123");
    mysql_select_db("abraaoba_isemear",$conexao);
	
	
	{
		$query = "INSERT INTO encontro(enct_additional,enct_age,enct_gender,enct_name,enct_email,enct_phone,enct_institution,enct_reason) values('$motivo2','$age','$gender','$nome','$email','$telefone','$escola','$motivo')";
		mysql_query($query,$conexao);
    
		$err = "Dados Cadastrados com sucesso!<br> Aguardamos você; no dia 9 de agosto.<br> Caso ocorra algum imprevisto, e você não possa participar,<br> pedimos a gentileza de nos comunicar por e-mail para que possamos liberar seu lugar a outra pessoa: contato@isemear.org.br. <br> Obrigado!<br> Equipe de organização do SemeAres";	
	}
   } else {
      $err = "Preencha todos os campos obrigat&#65533;rios!";
   }
   
   mysql_close($conexao);
}

?>
<h1>Resultado:</h1>
<p.page>
<?=$err
?>

</p>

			
			
			<!-- #EndEditable --></div>
		<!-- End Left Column -->
		<!-- Begin Right Column -->
		
		<!-- End Right Column --></div>
	<!-- End Page Content -->
	<!-- Begin Footer -->
<div id="footer">
		<p>Patrocinadores</p>
		<p>Parceria</p>
		<p>Apoio Institucional</p>
		<p>Realizador</p>
		<p>Organizador: Cida Gouvêa Eventos</p>
		
		<p>Copyright © Semear. All Rights Reserved.</p>
	</div>
	<!-- End Footer --></div>
<!-- End Container -->

</body>

<!-- #EndTemplate -->

</html>
