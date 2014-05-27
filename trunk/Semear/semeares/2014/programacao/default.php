<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

<!-- #BeginTemplate "../master.dwt" -->

<head>
<!-- #BeginEditable "doctitle" -->
<title>Semeares 2014 - Programa&#65533;&#65533;o</title>
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
	<div id="masthead" align="center">
<!--
<td><img alt="" src="images/logo-2014.png"/></td>
<td><img src="images/tema.png"/></td>-->
<img alt="" src="../images/topo.png"/>
		

	</div>
	<!-- End Masthead -->
	<!-- Begin Navigation -->
	
	<div id="navigation">
		<ul>
			<li><a href="../default.htm">Home</a></li>
			<li><a href="default.php">Programação</a></li>
			<li><a href="../sobre/default.php">Sobre o Instituto</a></li>
			<li><a href="../imprensa/default.php">Na imprensa</a></li>
			<li><a href="../galeria/default.php">Galeria</a></li>
			<li><a href="../inscricao/default.php">Inscrições</a></li>
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

Programação Preliminar 
<br><br>
<strong>Abertura </strong>
<ul>
<li>Carlos Abranches - Jornalista - TV Vanguarda</li>
</ul>
<strong>1 Bloco</strong>
<ul>
<li>Wellington Santos Silva - EmpreendEscola</li>
<li>Myrian Castello - Fábrica de Sorrisos</li>
<li>Aline - Jovem-semente/ Instituto Semear</li>
<li>Artemisia</li>
</ul>
<strong>2 Bloco</strong>
<ul>
<li>CASDVest - Instituto Semear</li>
<li>Banco Comunitário União Sampaio</li>
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
		<h5>Patrocinador</h5>
		<h5>Parceria</h5>	
		<h5>Apoio Institucional</h5>
		
		<table align="center">
		<tr>
		<td class="style1">
		<img src="../facilitadores/images/vicentina.png" class="facil"></td>
		
		<td class="style1">
		<img src="../facilitadores/images/casd.png"  class="facil"></td>
		<td class="style1">
		<img src="../facilitadores/images/colegioriobranco.jpg"  class="facil"></td>
		<td class="style1">
		<img src="../facilitadores/images/Marca-Fatos.jpg"  class="facil"></td>
		<td class="style1">
		<img src="../facilitadores/images/sygma.jpg"  class="facil"></td>
		</tr>
		<tr>
		<td class="style1">
		<img src="../facilitadores/images/institutoembraer.jpg"  class="facil"></td>
		<td class="style1">
		<img src="../facilitadores/images/pwc.jpg"  class="facil"></td>
		<td class="style1">
		<img src="../facilitadores/images/sesc.jpg"  class="facil"></td>
		<td class="style1">
		<img src="../facilitadores/images/unitower.jpg"  class="facil"></td>
		<td class="style1">
		<img src="../facilitadores/images/wallaby.jpg"  class="facil"></td>
		</tr>
		</table>
		
		<h5>Apoio Semeares</h5>
		<table align="center">
		<tr>
	
		<td class="style1" >
		<img src="../facilitadores/images/cabrillano.png"  class="facil"></td>
		
		</tr>
		</table>

		<h5>Realizador</h5>
		<img src="../facilitadores/images/semear.png"  class="facil">
		<h5>Organizador:</h5> 
		<img src="../facilitadores/images/cge.jpg"  class="facil">		
		<p><strong>Copyright © Semear. All Rights Reserved.</strong></p>
	</div>
	<!-- End Footer --></div>
<!-- End Container -->

</body>

<!-- #EndTemplate -->

</html>
