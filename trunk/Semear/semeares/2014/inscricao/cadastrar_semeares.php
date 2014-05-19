<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

<!-- #BeginTemplate "../master.dwt" -->

<head>
<!-- #BeginEditable "doctitle" -->
<title>Inscrição Semeares 2014</title>
<!-- #EndEditable -->
<link href="../styles/style1.css" media="screen" rel="stylesheet" title="CSS" type="text/css" />
<style type="text/css">
.style1 {
	font-size: xx-small;
}
</style>
 <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
  <script>
      function initialize() {
        var map_canvas = document.getElementById('map_canvas');
        var map_options = {
          center: new google.maps.LatLng(-23.192175, -45.889431),
          zoom: 18,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(map_canvas, map_options)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
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
	$certification = $_POST['certification'];
	
	$StartSubscribe = '2014-05-11';
	$Registrations = '400';
	
//verificando se j&#65533; estouraram as inscri&#65533;&#65533;es
	$oResult = mysql_query("SELECT * from encontro WHERE (enct_dt_registration >= "+StartSubscribe+ ")", $conexao);
	
	if(mysql_num_rows($oResult) > $Registrations )
	{
		$err = "O número de inscritos já excedeu a capacidade máxima expecificada";
	}
	else
	{ 

		  if ($nome and $email) 
		   {
		
				$conexao = mysql_connect("localhost","abraaoba_isemear","abraao123");
			    mysql_select_db("abraaoba_isemear",$conexao);
				$query = "INSERT INTO encontro(enct_additional,enct_age,enct_gender,enct_name,enct_email,enct_phone,enct_institution,enct_reason,enct_certification) values('$motivo2','$age','$gender','$nome','$email','$telefone','$escola','$motivo','$certification')";
				mysql_query($query,$conexao);    
				$err = "Dados Cadastrados com sucesso!<br> Aguardamos você; no dia 9 de agosto.<br> Caso ocorra algum imprevisto, e você não possa participar,<br> pedimos a gentileza de nos comunicar por e-mail para que possamos liberar seu lugar a outra pessoa: contato@isemear.org.br. <br> Obrigado!<br> Equipe de organização do SemeAres";	
		
		   } else {
		      $err = "Preencha todos os campos obrigatórios!";
		   }
   
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
		
		
		
		
		
		
	<!-- End Page Content -->
	<!-- Begin Footer -->
<div id="footer">
		<p><strong>Patrocinadores</strong></p>
		<p><strong>Parceria</strong></p>
		<p><strong>Apoio Institucional</strong></p>
		
		<table align="center">
		<tr>
		<td class="style1">AJFAC - Parque Vicentina Aranha,</td>
		<td class="style1">Cabrillano,</td>
		<td class="style1">CASD,</td>
		<td class="style1">Cloégio Rio Branco,</td>
		<td class="style1">Fatos Contabilidade,</td>
		<td class="style1">Grupo Sygma,</td>
		<td class="style1">Instituto Embraer,</td>
		<td class="style1">PwC,</td>
		<td class="style1">SESC São José dos Campos,</td>
		<td class="style1">Unitower Escola de Idiomas,</td>
		<td class="style1">Wallaby Escola de Idiomas</td>
		</tr>
		</table>
		<p><strong>Realizador</strong></p>
		<p><strong>Organizador:</strong> Cida Gouvêa Eventos</p>
		
		<p><strong>Copyright © Semear. All Rights Reserved.</strong></p>
	</div>
	<!-- End Footer --></div>
<!-- End Container -->

</body>

<!-- #EndTemplate -->

</html>
