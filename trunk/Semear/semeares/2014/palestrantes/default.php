
<html><!-- #BeginTemplate "../master.dwt" --><!-- DW6 -->

<head>
<!-- #BeginEditable "doctitle" -->
<title>Semeares 2014 - Programação</title>
<!-- #EndEditable -->
<link href="../styles/style1.css" media="screen" rel="stylesheet" title="CSS" type="text/css" />
<style type="text/css">
.style1 {
	font-size: xx-small;
}
.style2 {
	font-family: "Univers LT Std 39 Thin UltraCn";
	font-size: xx-large;
	color: #000000;
}
</style>

<script src="../jquery.js"></script> 
    <script> 
    $(function(){
      $("#includedContent").load("http://www.w3schools.com"); 
    });
    </script> 

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
			<li><a href="../programacao/default.php">Programação</a></li>
			<li><a href="default.php">Palestantes</a></li>
			<li><a href="../sobre/default.php">Sobre o Instituto</a></li>
			<!--<li><a href="galeria/default.php">Galeria</a></li>-->
<!--			<li><a href="inscricao/default.php">Inscrições</a></li>-->

			<!--<li><a href="local/default.php">Local</a></li>-->
            <li><a href="../facilitadores/colaboradores.php">Contato</a></li>
            
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
<br><br>
<img src="images/SITE ALEXANDRE ROBAZZA.png"><br><br>
<img src="images/SITE%20AMANDA%20LECHINSKI.png"><br><br>
<img src="images/SITE%20EDUARDO%20MIGLIANO.png"><br><br>
<img src="images/SITE%20GUSTAVO%20CUNHA.png"><br><br>
<img src="images/SITE%20LEONARDO%20CARVALHO.png"><br><br>
<img src="images/SITE%20MARC%20KIRST.png"><br><br>
<img src="images/SITE%20MYRIAN%20CASTELLO.png"><br><br>
<img src="images/SITE%20RAFAEL%20XAVIER.png"><br><br>
<img src="images/SITE%20TIAGO%20PEREIRA.png"><br><br>
<img src="images/SITE%20THAIS%20JULIANA%20RIBEIRO.png"><br><br>
<img src="images/SITE%20THIAGO%20VINICIUS.png"><br><br>
<img src="images/SITE%20WELLINGTON%20SANTOS.png"><br><br>

<br><br>

		
		
			<!-- #EndEditable --></div>
		<!-- End Left Column -->
		<!-- Begin Right Column -->
		
		
		
		
		
		
	<!-- End Page Content -->
	<!-- Begin Footer -->
<div id="footer">
		<!--<h5>Patrocinador</h5>-->
		<h5>Parceria</h5>	
		<img src="../facilitadores/images/Dello.gif" class="facil">
		<img src="../facilitadores/images/PaperMate.jpg" class="facil">
		<img src="../facilitadores/images/cabrillano.jpg"  class="facil">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<img src="../facilitadores/images/Eventick.png"  class="facilmenor">
		
		<table align="center">
		<tr>
		<td><h5>Patrocínio Prata</h5></td>
		<td class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</td>
		<td><h5>Colaboração</h5></td>
				<td class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</td>
		<td><h5>Apoio</h5></td>
		</tr>
		
		<tr>
		<td class="style1">

		<img src="../facilitadores/images/sygma.jpg"  class="facil">
		</td>
		<td class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</td>
		<td class="style1">

		<img src="../facilitadores/images/HenriqueFerro.png"  class="facilmenor">
		</td>
		<td class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</td>
		<td class="style1">
		<img src="../facilitadores/images/CVB.jpg"  class="facil">
		</td>
		
		</tr>
		</table>
		
		<h5>Apoio Institucional</h5>
		
		<table align="center">
		<tr>
		<td class="style1"><img src="../facilitadores/images/vicentina.png" class="facil"></td>
		
		<td class="style1"><img src="../facilitadores/images/casd.png"  class="facil"></td>
		<td class="style1"><img src="../facilitadores/images/colegioriobranco.jpg"  class="facil"></td>
		<td class="style1"><img src="../facilitadores/images/Marca-Fatos.jpg"  class="facil"></td>

		</tr>
		<tr>
		<td class="style1"><img src="../facilitadores/images/institutoembraer.jpg"  class="facil"></td>
		<td class="style1"><img src="../facilitadores/images/pwc.jpg"  class="facil"></td>
		<td class="style1"><img src="../facilitadores/images/sesc.jpg"  class="facil"></td>
		<td class="style1"><img src="../facilitadores/images/wallaby.jpg"  class="facil"></td>
		<td class="style1"><img src="../facilitadores/images/TARPON.jpg"  class="facilmenor"></td>
		
		</tr>
		<tr>
		<td class="style1"><img src="../facilitadores/images/LRNG.jpg"  class="facil"></td>
		</tr>
		
		</table>
		
		
		</table>

		<table align="center">
		<tr>
		<td><h5>Realizador</h5></td>
		<td class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</td>
		<td><h5>Organizador</h5></td>
				
		</tr>
		
		<tr>
		<td class="style1">

		<img src="../facilitadores/images/semear.png"  class="facil">
		</td>
		<td class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</td>
		<td class="style1">

		<img src="../facilitadores/images/cge.jpg"  class="facil">

		</td>
	
		</td>
		
		</tr>
		</table>


			
		<p><strong>Copyright © Semear. All Rights Reserved.</strong></p>
	</div>
	<!-- End Footer --></div>
<!-- End Container -->

<div id="includedContent"></div>
</body>

<!-- #EndTemplate --></html>
