
<html><!-- #BeginTemplate "../master.dwt" --><!-- DW6 -->

<head>
<!-- #BeginEditable "doctitle" -->
<title>Semeares 2014 - Inscrição</title>
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
			<li><a href="../palestrantes/default.php">Palestantes</a></li>
			<li><a href="../sobre/default.php">Sobre o Instituto</a></li>
			<li><a href="../galeria/default.php">Galeria</a></li>
<!--			<li><a href="inscricao/default.php">Inscrições</a></li>-->

			<!--<li><a href="local/default.php">Local</a></li>-->
            <li><a href="../facilitadores/colaboradores.php">Colaboradores</a></li>
            
			<li><a href="../contato/default.php">Contato</a></li>
		</ul>
	</div>
	
	
	<!-- End Navigation -->
	<!-- Begin Page Content -->
	<div id="page_content">
		<!-- Begin Left Column -->
		<div id="column_l">
			<!-- #BeginEditable "content" -->


			
			<form method="post" name="dados" action="cadastrar_semeares.php" onSubmit="return enviardados();" >
			<br>
			<table border="0">
<tr>
   <td>Nome completo *:</td>
  
</tr>
<tr>
   <td><input type="text" size="80" name="nome" maxlength="100"></td>
   
</tr>

<tr>
   <td>Email *:</td>
   
   
</tr>
<tr>
   <td><input type="text" size="80" name="email" maxlength="100"></td>
  
</tr>

<tr>
   <td>Idade *:</td>
   
   
</tr>
<tr>
   <td><input type="text" size="80" name="age" maxlength="100"></td>
  
</tr>

<tr>
   <td>Sexo *:</td>
   
   
</tr>
<tr>
   <td><select name="gender">
<option value="M">Masculino</option>
<option value="F">Feminino</option>
</select></td>
  
</tr>


<tr>
   <td>telefone(DD-XXXXX.XXXX):</td>
   
</tr>
<tr>
   <td><input type="text" size="11" name="telefone" maxlength="13" OnKeyUp="mascaraFone(this);"  onkeypress="return somenteNumeros(event);" ></td>
    
</tr>

<tr>
   <td>&nbsp;</td>
</tr>

<tr>
   <td>Instituição</td>
   
</tr>
<tr>
   <td><input type="text" size="30" name="escola" maxlength="100"></td>
   
</tr>

<tr>
   <td>&nbsp;</td>
</tr>
<tr>
   <td>Por que deseja participar do quarto Semeares ?</td>
   
</tr>
<tr>
   <td>
   <select name="motivo">
<option value="Conhecer">Conhecer o Instituto Semear</option>
<option value="Tema">Ouvir sobre o Tema</option>
<option value="Palestrante">Ouvir um Palestrante</option>
<option value="Outro">Outro</option>
</select>
<br>
Informações adicionais:<br>
   <input type="text" size="30" name="motivo2" maxlength="300" style="width: 301px; height: 134px"></td>
   
</tr>

<tr>
   <td>&nbsp;</td>
</tr>

<tr>
   <td>Deseja receber certificado:</td>
   
   
</tr>
<tr>
   <td><select name="certification">
<option value="1">Sim</option>
<option value="0">Não</option>
</select></td>
  
</tr>


</table>
<input type="submit" value="Cadastrar">
<br/> * Lembre-se de levar um quilo de alimento no dia do evento
</form>

(*) Campos Obrigatórios
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
