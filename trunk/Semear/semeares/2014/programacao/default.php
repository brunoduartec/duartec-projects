<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

<!-- #BeginTemplate "../master.dwt" -->

<head>
<!-- #BeginEditable "doctitle" -->
<title>Semeares 2014 - Programa��o</title>
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
			<li><a href="default.php">Programa��o</a></li>
			<li><a href="../facilitadores/default.php">Facilitadores</a></li>
			<li><a href="../sobre/default.php">Sobre o Instituto</a></li>
			<li><a href="../imprensa/default.php">Na imprensa</a></li>
			<li><a href="../galeria/default.php">Galeria</a></li>
			<li><a href="../inscricao/default.php">Inscri��es</a></li>
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
		<h1>Programa��o</h1>



<?php
/*
$dbname='abraaoba_isemear';
$usuario='abraaoba_fortal';
$password='isemear13';
$localhost = 'localhost';
$id = mysql_connect($localhost,$usuario,$password);

$con=mysql_select_db($dbname,$id);

mysql_select_db($banco); //seleciona o banco a ser usado

$sql = "select * from palestrante";

//ALTER TABLE tablename AUTO_INCREMENT = 1

$res = mysql_query($sql); 


while($escrever=mysql_fetch_array($res))
{


echo "<table style=\"background-image:url('../images/bkg.png'); background-repeat:repeat;\"   >";
echo "<tr>";
echo "<td width='30%'><h1>".$escrever['name']."</h1></td><td></td></tr>";
echo "<td><img src=\"images\\".$escrever['image']. "\" /></td>";
echo "<td>".$escrever['info']."</td><td></td></tr>";

echo "</table>";
echo "<br>";
}
*/
?>

Programa��o Preliminar 
<br><br>
<strong>Abertura </strong>
<ul>
<li>Carlos Abranches - Jornalista - TV Vanguarda</li>
</ul>
<strong>1 Bloco</strong>
<ul>
<li>Wellington Santos Silva - EmpreendEscola</li>
<li>Myrian Castello - F�brica de Sorrisos</li>
<li>Aline - Jovem-semente/ Instituto Semear</li>
<li>Artemisia</li>
</ul>
<strong>2 Bloco</strong>
<ul>
<li>CASDVest - Instituto Semear</li>
<li>Banco Comunit�rio Uni�o Sampaio</li>
<li>Rafael Xavier - Gerasol</li>
<li>Geekie</li>
</ul>
			<strong>3 Bloco</strong>
<ul> 
<li>Marc Kirst</li>
<li>Imagina na Copa</li> 
<li>Du Migliano (99Jobs)</li> 
</ul>

		
		
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
		<td class="style1">Clo�gio Rio Branco,</td>
		<td class="style1">Fatos Contabilidade,</td>
		<td class="style1">Grupo Sygma,</td>
		<td class="style1">Instituto Embraer,</td>
		<td class="style1">PwC,</td>
		<td class="style1">SESC S�o Jos� dos Campos,</td>
		<td class="style1">Unitower Escola de Idiomas,</td>
		<td class="style1">Wallaby Escola de Idiomas</td>
		</tr>
		</table>
		<p><strong>Realizador</strong></p>
		<p><strong>Organizador:</strong> Cida Gouv�a Eventos</p>
		
		<p><strong>Copyright � Semear. All Rights Reserved.</strong></p>
	</div>
	<!-- End Footer --></div>
<!-- End Container -->

</body>

<!-- #EndTemplate -->

</html>
